<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    // function showProfile(User $user) {
    //     $user->load('profile');
    //     return view('show_profile', compact('user'));
    // }

    function showStudentProfile(int $id)
    {
        $student = User::with('profile')->findOrFail($id);
        return view('profile.student_profile', compact('student'));
    }

    function showMentorProfile(int $id)
    {
        $mentor = User::with(['profile', 'achievements', 'reviews.student.profile', 'reviews.session.topic'])->findOrFail($id);

        $isAdmin = Auth::user() && Auth::user()->isAdmin();
        
        // Block access to unverified or inactive mentors unless the user is viewing their own profile or is an admin
        if (!$isAdmin && (!$mentor->profile || !$mentor->profile->is_verified || $mentor->status !== UserStatus::ACTIVE) && Auth::id() !== $mentor->id) {
            abort(404);
        }

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

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_bio' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:2000',
            'highgest_education_level' => 'nullable|string|max:50',
            'institution_name' => 'nullable|string|max:200',
            'department' => 'nullable|string|max:200',
            'skills' => 'nullable|string|max:200',
            'hourly_rate' => 'nullable|string|max:200',
            'learning_style' => 'nullable|string|max:2000',
            'preferred_teaching_medium' => 'nullable|string|max:100',
            'preferred_language' => 'nullable|string|max:100',
            'teaching_experience_years' => 'nullable|integer|min:0|max:99',
            'teaching_experience_months' => 'nullable|integer|min:0|max:11',
            'nid_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'nid_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'student_id_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'student_id_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'demo_video_link' => ['nullable', 'url', 'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be|drive\.google\.com)\/.+$/i'],
        ]);

        // Get only the fields that passed validation
        $validData = $validator->valid();

        if (isset($validData['name'])) {
            $user->update(['name' => $validData['name']]);
        }

        $profileData = collect($validData)->except(['name', 'nid_front', 'nid_back', 'student_id_front', 'student_id_back', 'cv'])->toArray();

        foreach (['nid_front', 'nid_back', 'student_id_front', 'student_id_back', 'cv'] as $field) {
            // Check if removal was requested
            if ($request->input('remove_' . $field) == '1') {
                if ($user->profile && $user->profile->$field) {
                    Storage::disk('public')->delete($user->profile->$field);
                }
                $profileData[$field] = null;
            }
            // Only process the file if it actually passed validation
            elseif ($request->hasFile($field) && isset($validData[$field])) {
                if ($user->profile && $user->profile->$field) {
                    Storage::disk('public')->delete($user->profile->$field);
                }
                $profileData[$field] = $request->file($field)->store('documents', 'public');
            }
        }

        // Save all valid data to the database
        $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);

        // If mentor uploaded new documents, mark as pending verification
        $docFields = ['nid_front', 'nid_back', 'student_id_front', 'student_id_back', 'cv'];
        $uploadedNewDoc = false;
        foreach ($docFields as $field) {
            if ($request->hasFile($field) && isset($validData[$field])) {
                $uploadedNewDoc = true;
                break;
            }
        }
        if ($uploadedNewDoc && $user->role === \App\Enums\UserRole::Mentor) {
            $user->profile()->updateOrCreate(['user_id' => $user->id], [
                'is_verified'            => false,
                'documents_submitted_at' => now(),
            ]);
        }

        // If there were any errors in other fields, redirect back with those errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $route = $user->role === \App\Enums\UserRole::Mentor ? 'mentor_profile' : 'student_profile';
        return redirect()->route($route, $user->id)->with('success', 'Profile updated successfully.');
    }

    function storeAchievement(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $request->user()->achievements()->create($data);

        return back()->with('success', 'Achievement added successfully.');
    }

    function updateAchievement(Request $request, Achievement $achievement)
    {
        $this->authorize('update', $request->user());
        if ($achievement->user_id !== $request->user()->id) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image) {
                Storage::disk('public')->delete($achievement->image);
            }
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($data);

        return back()->with('success', 'Achievement updated successfully.');
    }

    function deleteAchievement(Request $request, Achievement $achievement)
    {
        $this->authorize('update', $request->user());
        if ($achievement->user_id !== $request->user()->id) {
            abort(403);
        }

        if ($achievement->image) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        return back()->with('success', 'Achievement deleted successfully.');
    }

    function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = Auth::user();

        // Delete old avatar if it was one we stored (not the ui-avatars fallback)
        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
        }

        // Store new avatar
        $path = $request->file('avatar')->store('avatars', 'public');

        // Update or create profile record
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            ['avatar' => $path]
        );

        return back()->with('avatar_success', 'Profile picture updated successfully! 🎉');
    }

    function removeAvatar()
    {
        $user = Auth::user();

        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
            $user->profile->update(['avatar' => null]);
        }

        return back()->with('avatar_success', 'Profile picture removed successfully.');
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return back()->with('password_success', 'Password updated successfully.');
    }
}
