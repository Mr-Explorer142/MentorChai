<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
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
            ->with('profile')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*');

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
        if ($request->filled('skills')) {
            foreach ($request->skills as $skill) {
                $query->where('profiles.skills', 'like', '%' . $skill . '%');
            }
        }

        // Filter by department
        if ($request->filled('departments')) {
            $query->whereIn('profiles.department', $request->departments);
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
                ->whereHas('profile', function ($q) use ($query) {
                    $q->where('skills', 'like', '%' . $query . '%');
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
