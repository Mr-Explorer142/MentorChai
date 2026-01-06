<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    // function showProfile(User $user) {
    //     $user->load('profile');
    //     return view('show_profile', compact('user'));
    // }

    function showStudentProfile($id)
    {
        $student = User::with('profile')->findOrFail($id);
        return view('profile.student_profile', compact('student'));
    }

    function showMentorProfile($id)
    {
        $mentor = User::with('profile')->findOrFail($id);
        return view('profile.mentor_profile', compact('mentor'));
    }

    function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit_profile', compact('user'));
    }

    function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->authorize('update', $user);

        $data = request()->validate([
            'name' => 'required | string | max:255',
            'bio' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'highgest_education_level' => 'nullable|string|max:50',
            'skills' => 'nullable|string|max:200',
            'institution_name' => 'nullable|string|max:200',
            'hourly_rate' => 'nullable|string|max:200',
        ]);

        $user = $request->user();
        $user->update(['name' => $data['name']]);

        $user->profile->updateOrCreate(['user_id' => $user->id], collect($data)->except('name')->toArray());

        return redirect()->route('mentors')->with('success', 'Profile updated successfuly😁');
    }
}
