<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SessionTopicController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $excludedKeywords = ['React', 'Next.js', 'Tailwind'];

    $skills = \App\Models\Profile::whereNotNull('skills')
        ->pluck('skills')
        ->flatMap(fn($s) => array_map('trim', explode(',', $s)))
        ->filter(function ($skill) use ($excludedKeywords) {
            if (empty($skill)) {
                return false;
            }
            foreach ($excludedKeywords as $keyword) {
                if (stripos($skill, $keyword) !== false) {
                    return false;
                }
            }
            return true;
        })
        ->countBy()
        ->sortDesc()
        ->take(8)
        ->keys();

    $popularTopics = $skills->map(function ($skillName) {
        $mentors = \App\Models\User::where('role', \App\Enums\UserRole::Mentor)
            ->whereHas('profile', function ($q) use ($skillName) {
                $q->where('skills', 'like', '%' . $skillName . '%')
                    ->where('is_verified', true);
            })
            ->with('profile')
            ->limit(5)
            ->get();

        $subSkills = $mentors->flatMap(function ($m) use ($skillName) {
            return array_map('trim', explode(',', $m->profile->skills ?? ''));
        })
            ->filter(fn($s) => !empty($s) && strcasecmp($s, $skillName) !== 0)
            ->countBy()
            ->sortDesc()
            ->take(3)
            ->keys()
            ->toArray();

        return (object)[
            'name'          => $skillName,
            'mentors_count' => $mentors->count(),
            'skills'        => $subSkills,
            'mentors'       => $mentors->map(fn($m) => [
                'name'   => $m->name,
                'avatar' => $m->profile->avatar ?? null,
            ])->toArray(),
        ];
    });

    return view('home', compact('popularTopics'));
})->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/faq', fn() => view('faq'))->name('faq');
Route::get('/terms', fn() => view('terms'))->name('terms');
Route::get('/mentors', [MentorsController::class, 'index'])->name('mentors');
Route::get('/mentors/suggestions', [MentorsController::class, 'suggestions'])->name('mentors.suggestions');

/*
|--------------------------------------------------------------------------
| Auth Routes (Guest)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/student', [RegisterController::class, 'showStudentForm'])->name('student_register');
Route::get('/register/teacher', [RegisterController::class, 'showTeacherForm'])->name('teacher_register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/auth/{provider}/redirect/{role}', [SocialAuthController::class, 'redirect'])
    ->where('provider', 'google|github')
    ->where('role', 'student|mentor|login')
    ->name('social.redirect');

Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])
    ->where('provider', 'google|github')
    ->name('social.callback');

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('mentors')->with('verified', true);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin_')->group(function () {
    Route::get('/login', fn() => view('admin_login'))->name('login');
    Route::get('/dashboard', fn() => view('dashboard.admin-dashboard', ['adminInitialSection' => 'dashboard']))->name('dashboard');
    Route::get('/dashboard/sessions', fn() => view('dashboard.admin-dashboard', ['adminInitialSection' => 'sessions']))->name('sessions');
    Route::get('/dashboard/users', fn() => view('dashboard.admin-dashboard', ['adminInitialSection' => 'users']))->name('users');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Profile — no verification needed to view profiles
    Route::get('/profile/student/{id}', [ProfileController::class, 'showStudentProfile'])->name('student_profile');
    Route::get('/profile/mentor/{id}', [ProfileController::class, 'showMentorProfile'])->name('mentor_profile');

    // zegocloud - return server secret for client-side token generation
    Route::get('/zego/token', function () {
        return response()->json(['serverSecret' => env('ZEGOCLOUD_SERVER_SECRET')]);
    })->name('zego.token');

    // Routes that require verified email
    Route::middleware('verified')->group(function () {

        Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
        Route::put('/profile', [ProfileController::class, 'updateprofile'])->name('update_profile');
        Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('update_avatar');
        Route::delete('/profile/avatar', [ProfileController::class, 'removeAvatar'])->name('remove_avatar');

        Route::post('/profile/achievements', [ProfileController::class, 'storeAchievement'])->name('achievements.store');
        Route::put('/profile/achievements/{achievement}', [ProfileController::class, 'updateAchievement'])->name('achievements.update');
        Route::delete('/profile/achievements/{achievement}', [ProfileController::class, 'deleteAchievement'])->name('achievements.delete');

        Route::get('/live-session', function () {
            $roomId = request('room');

            if (!$roomId) {
                return redirect()->route('student_dashboard')
                    ->with('error', 'সেশন কোড পাওয়া যায়নি।');
            }

            $session = \App\Models\MentoringSession::where('session_code', $roomId)
                ->with(['mentor', 'student', 'topic'])
                ->firstOrFail();

            // Only mentor or student of this session can enter
            $user = request()->user();
            if ($user->id !== $session->mentor_id && $user->id !== $session->student_id) {
                abort(403);
            }

            return view('session.live-session', [
                'session'  => $session,
                'roomId'   => $roomId,
                'userId'   => (string) $user->id,
                'userName' => $user->name,
                'appId'    => (int) env('ZEGOCLOUD_APP_ID'),
                'appSign'  => env('ZEGOCLOUD_APP_SIGN'),
                'userRole' => $user->id === $session->mentor_id ? 'mentor' : 'student',
            ]);
        })->name('live-session');

        Route::post('/session/complete', function (Request $request) {
            $roomId  = str_replace(['mc-', '-'], ['', ''], $request->room);

            $session = \App\Models\MentoringSession::where('session_code', 'like', '%' . substr($roomId, 2) . '%')
                ->first();

            if (!$session) {
                // Try direct match
                $session = \App\Models\MentoringSession::where('session_code', $request->room)->first();
            }

            if ($session && $session->status === \App\Enums\SessionStatus::Ongoing) {
                $user = $request->user();
                // Only complete if mentor leaves (mentor ends the session)
                if ($user && $user->id === $session->mentor_id) {
                    $session->update([
                        'status'   => \App\Enums\SessionStatus::Completed,
                        'ended_at' => now(),
                    ]);
                }
            }

            return response()->json(['success' => true]);
        })->name('session.complete');

        // ✏️ CHANGED: approve route moved here (both mentor and student need access)
        Route::post('/session/{session}/approve', [SessionTopicController::class, 'approve'])->name('session.approve');

        // Notification routes
        Route::post('/notifications/mark-all-read', function (Request $request) {
            $request->user()->unreadNotifications->markAsRead();
            return response()->json(['success' => true]);
        })->name('notifications.markAllRead');

        Route::post('/notifications/{id}/mark-read', function (Request $request, $id) {
            $request->user()->notifications()->where('id', $id)->update(['read_at' => now()]);
            return response()->json(['success' => true]);
        })->name('notifications.markRead');

        // Student-only routes
        Route::middleware('student')->group(function () {
            Route::get('/dashboard/student', [DashboardController::class, 'studentDashboard'])->name('student_dashboard');

            Route::get('/checkout/{sessionTopic}', [SessionTopicController::class, 'checkout'])->name('checkout');

            Route::post('/payment/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');

            Route::get('/success', function () {
                $tranId  = request('tran_id');
                $payment = \App\Models\Payment::with(['session.mentor', 'session.topic'])
                    ->where('transaction_id', $tranId)
                    ->first();

                if (!$payment) {
                    return redirect()->route('student_dashboard')
                        ->with('error', 'পেমেন্ট তথ্য পাওয়া যায়নি।');
                }

                return view('checkout.success', [
                    'paymentMethod'  => $payment->method->value,
                    'amount'         => $payment->amount,
                    'transactionId'  => $payment->transaction_id,
                    'mentorName'     => $payment->session->mentor->name,
                    'topic'          => $payment->session->topic->topic,
                    'sessionCode'    => $payment->session->session_code,
                ]);
            })->middleware(['auth', 'verified'])->name('success');

            // ✏️ EXISTING — already here, kept as is
            Route::get('/session/request/{mentor}', [SessionTopicController::class, 'create'])->name('session.request.create');
            Route::post('/session/request', [SessionTopicController::class, 'store'])->name('session.request.store');

            // ✏️ NEW — payment success handler for student
            Route::post('/session/{session}/payment', [SessionTopicController::class, 'paymentSuccess'])->name('session.payment.success');
        });

        // Mentor-only routes
        Route::middleware('mentor')->group(function () {
            Route::get('/dashboard/mentor', [DashboardController::class, 'mentorDashboard'])->name('mentor_dashboard');
        });
    });
});

// Outside ALL middleware
Route::post('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::post('/payment/fail',    [PaymentController::class, 'fail'])->name('payment.fail');
Route::post('/payment/cancel',  [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/payment/ipn',     [PaymentController::class, 'ipn'])->name('payment.ipn');
