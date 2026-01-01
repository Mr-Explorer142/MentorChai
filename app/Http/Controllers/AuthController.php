<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        // Credentials
        $creds = $request->only('email', 'password');

        // Remember 
        $remember = $request->has('remember');

        $request->session()->regenerate();

        if(Auth::attempt($creds, $remember)) {
            $user = Auth::user();

            if($user->role === UserRole::Mentor) {
                return redirect()->route('mentor_dashboard');
            }

            return redirect()->route('student_dashboard');
        }

        // Error message
        return back()->withErrors(['email' => 'Invalid Credentials!', 'password' => 'Incorrect Password, Please re-check!']);
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
