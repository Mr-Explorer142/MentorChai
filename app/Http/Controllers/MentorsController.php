<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', UserRole::Mentor)
            ->with('profile'); // eager load profile to avoid N+1 queries

        // Search by name or skills
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('profile', function ($q) use ($request) {
                        $q->where('skills', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Sorting
        if ($request->sort === 'price_asc') {
            $query->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->orderBy('profiles.hourly_rate', 'asc')
                ->select('users.*');
        } elseif ($request->sort === 'price_desc') {
            $query->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->orderBy('profiles.hourly_rate', 'desc')
                ->select('users.*');
        } else {
            $query->latest();
        }

        $mentors = $query->paginate(9)->withQueryString(); // withQueryString keeps search/sort in pagination links
        $totalMentors = $mentors->total();

        return view('mentors', compact('mentors', 'totalMentors'));
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
