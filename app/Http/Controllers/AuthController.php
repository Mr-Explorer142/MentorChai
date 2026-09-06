<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
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
            'email' => 'required|email',
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

        // Check if account with email exists to determine specific error box
        $userExists = User::where('email', $request->email)->exists();

        if (!$userExists) {
            return back()->withErrors(['email' => 'No account found with this email address.'])->withInput();
        }

        return back()->withErrors(['password' => 'Incorrect password. Please try again.'])->withInput();
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
