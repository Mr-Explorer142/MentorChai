<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use App\Models\Achievement;
use App\Services\CloudinaryStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegisterController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private CloudinaryStorage $cloud) {}

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
            'hourly_rate' => 'nullable|numeric|min:0|max:450',
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
            $oldValue = $user->profile?->$field;

            // Removal requested
            if ($request->input('remove_' . $field) == '1') {
                $this->cloud->delete($oldValue);
                $profileData[$field] = null;
            }
            // New file that passed validation: upload first, then delete the old one
            elseif ($request->hasFile($field) && isset($validData[$field])) {
                $profileData[$field] = $this->cloud->upload(
                    $request->file($field),
                    'documents',
                    $field === 'cv' ? 'raw' : 'image'
                );
                $this->cloud->delete($oldValue);
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
        if ($uploadedNewDoc && $user->role === UserRole::Mentor) {
            $user->profile()->updateOrCreate(['user_id' => $user->id], [
                'is_verified'            => false,
                'documents_submitted_at' => now(),
            ]);
        }

        // If there were any errors in other fields, redirect back with those errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $route = $user->role === UserRole::Mentor ? 'mentor_profile' : 'student_profile';
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
            $data['image'] = $this->cloud->upload($request->file('image'), 'achievements');
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
            $newUrl = $this->cloud->upload($request->file('image'), 'achievements');
            $this->cloud->delete($achievement->image);
            $data['image'] = $newUrl;
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

        $this->cloud->delete($achievement->image);
        $achievement->delete();

        return back()->with('success', 'Achievement deleted successfully.');
    }

    function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = Auth::user();

        // Upload the new avatar first, then remove the old one
        $newUrl = $this->cloud->upload($request->file('avatar'), 'avatars');
        $this->cloud->delete($user->profile?->avatar);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            ['avatar' => $newUrl]
        );

        return back()->with('avatar_success', 'Profile picture updated successfully! 🎉');
    }

    function removeAvatar()
    {
        $user = Auth::user();

        if ($user->profile && $user->profile->avatar) {
            $this->cloud->delete($user->profile->avatar);
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
