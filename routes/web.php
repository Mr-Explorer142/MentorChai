<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\SessionTopicController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/faq', fn() => view('faq'))->name('faq');
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

// Social Authentication (Google, GitHub)
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

    // Routes that require verified email
    Route::middleware('verified')->group(function () {

        Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
        Route::put('/profile', [ProfileController::class, 'updateprofile'])->name('update_profile');
        Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('update_avatar');
        Route::delete('/profile/avatar', [ProfileController::class, 'removeAvatar'])->name('remove_avatar');


        Route::get('/live-session', fn() => view('session.live-session'))->name('live-session');

        // Student-only routes
        Route::middleware('student')->group(function () {
            Route::get('/dashboard/student', [DashboardController::class, 'studentDashboard'])->name('student_dashboard');
            Route::get('/checkout', function () {
                return view('checkout.checkout', [
                    'student'    => (object)['id' => 'STU-101', 'name' => 'Wasif Khan Lodi Adib'],
                    'mentor'     => (object)['id' => 'MEN-55',  'name' => 'Walid Ahmed Samy Sorkar'],
                    'topic'      => 'Laravel Basics',
                    'hourlyRate' => 50,
                    'hours'      => 2,
                    'paidAmount' => 100,
                ]);
            })->name('checkout.checkout');

            Route::get('/success', function () {
                return view('checkout.success', [
                    'paymentMethod' => session('payment_method', 'bKash'),
                    'amount'        => session('amount', 0),
                ]);
            })->name('success');
            Route::get('/session/request/{mentor}', [SessionTopicController::class, 'create'])->name('session.request.create');
            Route::post('/session/request', [SessionTopicController::class, 'store'])->name('session.request.store');
        });

        // Mentor-only routes
        Route::middleware('mentor')->group(function () {
            Route::get('/dashboard/mentor', [DashboardController::class, 'mentorDashboard'])->name('mentor_dashboard');
        });
    });
});
