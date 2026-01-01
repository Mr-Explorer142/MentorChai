<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showStudentForm()
    {
        return view('auth.student_register');
    }

    public function showTeacherForm()
    {
        return view('auth.teacher_register');
    }

    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed | min:8',
            'role' => 'required | in:student,mentor',
        ]);

        // creating a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Create a user profile during User Creation
        $user->profile()->create([
            'bio' => null,
        ]);

        // redirect
        return redirect()->route('login');
    }
}
