<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function index()
    {
        $mentors = User::where('role', UserRole::Mentor)->paginate(9);
        $totalMentors = $mentors->count();

        return view('mentors', compact('mentors', 'totalMentors'));
    }
}
