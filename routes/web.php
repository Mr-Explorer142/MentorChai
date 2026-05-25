<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/faq', fn() => view('faq'))->name('faq');

Route::get('/mentors', function () {
    $mentors = User::where('role', UserRole::Mentor)->get();
    return view('mentors', compact('mentors'));
})->name('mentors');

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

    // Profile
    Route::get('/profile/student/{id}', [ProfileController::class, 'showStudentProfile'])->name('student_profile');
    Route::get('/profile/mentor/{id}', [ProfileController::class, 'showMentorProfile'])->name('mentor_profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
    Route::put('/profile', [ProfileController::class, 'updateprofile'])->name('update_profile');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('update_avatar');
    Route::delete('/profile/avatar', [ProfileController::class, 'removeAvatar'])->name('remove_avatar');
    Route::get('/checkout', function () {
        return view('checkout.checkout', [
            'student' => (object)['id' => 'STU-101', 'name' => 'Wasif Khan Lodi Adib'],
            'mentor'  => (object)['id' => 'MEN-55',  'name' => 'Walid Ahmed Samy Sorkar'],
            'topic'      => 'Laravel Basics',
            'hourlyRate' => 50,
            'hours'      => 2,
            'paidAmount' => 100,
        ]);
    })->name('checkout');
    Route::get('/success', function () {
        return view('checkout.success', [
            'paymentMethod' => session('payment_method', 'bKash'),
            'amount'        => session('amount', 0),
        ]);
    })->name('success');
    Route::get('/live-session', fn() => view('session.live-session'))->name('live-session');

    // Student-only routes
    Route::middleware('student')->group(function () {
        Route::get('/dashboard/student', [DashboardController::class, 'studentDashboard'])->name('student_dashboard');
        // Route::get('/checkout', function () {
        //     return view('checkout.checkout', [
        //         'student' => (object)['id' => 'STU-101', 'name' => 'Wasif Khan Lodi Adib'],
        //         'mentor'  => (object)['id' => 'MEN-55',  'name' => 'Walid Ahmed Samy Sorkar'],
        //         'topic'      => 'Laravel Basics',
        //         'hourlyRate' => 50,
        //         'hours'      => 2,
        //         'paidAmount' => 100,
        //     ]);
        // })->name('checkout');
        // Route::get('/success', function () {
        //     return view('checkout.success', [
        //         'paymentMethod' => session('payment_method', 'bKash'),
        //         'amount'        => session('amount', 0),
        //     ]);
        // })->name('success');
        // Route::get('/live-session', fn() => view('session.live-session'))->name('live-session');
    });

    // Mentor-only routes
    Route::middleware('mentor')->group(function () {
        Route::get('/dashboard/mentor', [DashboardController::class, 'mentorDashboard'])->name('mentor_dashboard');
    });
});
