<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function studentDashboard()
    {
        $student = Auth::user();
        return view('dashboard.student_dashboard', compact('student'));
    }

    public function mentorDashboard()
    {
        $mentor = Auth::user();
        return view('dashboard.mentor_dashboard', compact('mentor'));
    }
}
