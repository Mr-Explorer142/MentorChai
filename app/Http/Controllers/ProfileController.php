<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
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
        $mentor = User::with('profile')->findOrFail($id);

        // Block access to unverified mentors unless the user is viewing their own profile
        if ((!$mentor->profile || !$mentor->profile->is_verified) && Auth::id() !== $mentor->id) {
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
            'nid_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'nid_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'student_id_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'student_id_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        // Get only the fields that passed validation
        $validData = $validator->valid();

        if (isset($validData['name'])) {
            $user->update(['name' => $validData['name']]);
        }

        $profileData = collect($validData)->except(['name', 'nid_front', 'nid_back', 'student_id_front', 'student_id_back'])->toArray();

        foreach (['nid_front', 'nid_back', 'student_id_front', 'student_id_back'] as $field) {
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

        // If there were any errors in other fields, redirect back with those errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        return back()->with('success', 'প্রোফাইল সফলভাবে আপডেট করা হয়েছে 😁');
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

        return back()->with('success', 'অর্জন সফলভাবে যোগ করা হয়েছে।');
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

        return back()->with('success', 'অর্জন সফলভাবে আপডেট করা হয়েছে।');
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

        return back()->with('success', 'অর্জন সফলভাবে মুছে ফেলা হয়েছে।');
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

        return back()->with('avatar_success', 'প্রোফাইল ছবি সফলভাবে আপডেট করা হয়েছে! 🎉');
    }

    function removeAvatar()
    {
        $user = Auth::user();

        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
            $user->profile->update(['avatar' => null]);
        }

        return back()->with('avatar_success', 'প্রোফাইল ছবি সফলভাবে সরানো হয়েছে।');
    }
}
