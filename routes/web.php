<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* General Routes */
// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// mentors' route
Route::get('/mentors', function () {
    $mentors = User::where('role', UserRole::Mentor)->get();
    return view('mentors', compact('mentors'));
})->name('mentors');

// About route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Register routes
Route::get('/register/student', [RegisterController::class, 'showStudentForm'])->name('student_register');

Route::get('/register/teacher', [RegisterController::class, 'showTeacherForm'])->name('teacher_register');

Route::post("/register", [RegisterController::class, "register"])->name('register');

// Dashboard 
Route::get('/dashboard/student', [DashboardController::class, 'studentDashboard'])->name('student_dashboard')->middleware('student');

Route::get('/dashboard/mentor', [DashboardController::class, 'mentorDashboard'])->name('mentor_dashboard')->middleware('mentor');

// Proifle routes
// Route::get('/profile/{user}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('showProfile');

Route::get('/profile/student/{id}', [ProfileController::class, 'showStudentProfile'])->name('student_profile');

Route::get('/profile/mentor/{id}',  [ProfileController::class, 'showMentorProfile'])->name('mentor_profile');

Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->middleware('auth')->name('edit_profile');

Route::put('profile', [ProfileController::class, 'updateprofile'])->middleware('auth')->name('update_profile');

/* checkout routes */
Route::get('/checkout', function () {
    return view('checkout.checkout', [
        'student' => (object)[
            'id' => 'STU-101',
            'name' => 'John Doe',
        ],
        'mentor' => (object)[
            'id' => 'MEN-55',
            'name' => 'Jane Smith',
        ],
        'topic' => 'Laravel Basics',
        'hourlyRate' => 50,
        'hours' => 2,
        'paidAmount' => 100,
    ]);
})->name('checkout')->middleware('student');

/* success route */
Route::get('/success', function () {
    return view('checkout.success', [
        'paymentMethod' => session('payment_method', 'bKash'),
        'amount' => session('amount', 0),
    ]);
})->name('success')->middleware('student');

/* Video Calling route */
Route::get('/live-session', function() {
    return view('session.live-session');
})->name('live-session')->middleware('student');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
