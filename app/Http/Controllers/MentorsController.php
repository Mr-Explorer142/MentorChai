<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function index(Request $request)
    {
        // Get top 10 most common skills for filter sidebar
        $allSkills = \App\Models\Profile::whereNotNull('skills')
            ->pluck('skills')
            ->flatMap(fn($s) => array_map('trim', explode(',', $s)))
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10)
            ->keys();

        // Get top 10 most common departments
        $allDepartments = \App\Models\Profile::whereNotNull('department')
            ->pluck('department')
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10)
            ->keys();

        $query = User::where('role', UserRole::Mentor)
            ->where('users.status', UserStatus::ACTIVE)
            ->select('users.*')
            ->with('profile')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('profiles.is_verified', true)
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('users.name', 'like', '%' . $request->search . '%')
                    ->orWhere('profiles.skills', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by price range
        if ($request->filled('price_min')) {
            $query->where('profiles.hourly_rate', '>=', (int) $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('profiles.hourly_rate', '<=', (int) $request->price_max);
        }

        // Filter by skills (multiple checkboxes)
        if ($request->filled('skills') && is_array($request->skills)) {
            foreach ($request->skills as $skill) {
                $query->where('profiles.skills', 'like', '%' . $skill . '%');
            }
        }

        // Filter by department
        if ($request->filled('departments') && is_array($request->departments)) {
            $query->whereIn('profiles.department', $request->departments);
        }

        // Filter by language
        if ($request->filled('languages') && is_array($request->languages)) {
            $query->whereIn('profiles.preferred_language', $request->languages);
        }

        // Filter by rating
        if ($request->filled('rating') && $request->rating > 0) {
            $query->whereRaw('(SELECT COALESCE(AVG(rating), 0) FROM reviews WHERE reviews.mentor_id = users.id) >= ?', [$request->rating]);
        }

        // Filter by online status
        if ($request->filled('online_status')) {
            if ($request->online_status === 'online') {
                $query->where('users.last_seen_at', '>=', now()->subMinutes(5));
            } elseif ($request->online_status === 'offline') {
                $query->where(function ($q) {
                    $q->whereNull('users.last_seen_at')
                      ->orWhere('users.last_seen_at', '<', now()->subMinutes(5));
                });
            }
        }

        // Sorting
        if ($request->sort === 'price_asc') {
            $query->orderByRaw('CAST(profiles.hourly_rate AS UNSIGNED) asc');
        } elseif ($request->sort === 'price_desc') {
            $query->orderByRaw('CAST(profiles.hourly_rate AS UNSIGNED) desc');
        } else {
            $query->orderBy('users.created_at', 'desc');
        }

        $mentors = $query->paginate(9)->withQueryString();
        $totalMentors = $mentors->total();

        return view('mentors', compact('mentors', 'totalMentors', 'allSkills', 'allDepartments'));
    }

    public function suggestions(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];

        // Check if query matches any mentor name
        $nameMatches = User::where('role', UserRole::Mentor)
            ->where('status', UserStatus::ACTIVE)
            ->whereHas('profile', function ($q) {
                $q->where('is_verified', true);
            })
            ->where('name', 'like', '%' . $query . '%')
            ->with('profile')
            ->limit(5)
            ->get();

        if ($nameMatches->isNotEmpty()) {
            // Return mentor names
            foreach ($nameMatches as $mentor) {
                $results[] = [
                    'type'  => 'mentor',
                    'label' => $mentor->name,
                ];
            }
        } else {
            // Check skills instead
            $skillMatches = User::where('role', UserRole::Mentor)
                ->where('status', UserStatus::ACTIVE)
                ->whereHas('profile', function ($q) use ($query) {
                    $q->where('skills', 'like', '%' . $query . '%')
                      ->where('is_verified', true);
                })
                ->with('profile')
                ->limit(5)
                ->get();

            $skillsSeen = [];

            foreach ($skillMatches as $mentor) {
                $skills = explode(',', $mentor->profile?->skills ?? '');
                foreach ($skills as $skill) {
                    $skill = trim($skill);
                    // Only show skills that actually match the query
                    if (stripos($skill, $query) !== false && !in_array(strtolower($skill), $skillsSeen)) {
                        $results[] = [
                            'type'  => 'skill',
                            'label' => $skill,
                        ];
                        $skillsSeen[] = strtolower($skill);
                    }
                }
            }
        }

        return response()->json($results);
    }
}
