<?php

namespace App\Http\Controllers;

use App\Enums\SessionStatus;
use App\Models\SessionTopic;
use App\Models\User;
use Illuminate\Http\Request;

class SessionTopicController extends Controller
{
    public function create(User $mentor)
    {
        return view('session.request', compact('mentor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:users,id',
            'topic'     => 'required|string|max:255',
            'note'      => 'nullable|string|max:1000',
        ]);

        SessionTopic::create([
            'student_id' => $request->user()->id,
            'mentor_id'  => $request->mentor_id,
            'topic'      => $request->topic,
            'status'     => SessionStatus::Pending,
        ]);

        return redirect()->route('student_dashboard')
            ->with('success', 'সেশনের অনুরোধ সফলভাবে পাঠানো হয়েছে!');
    }
}
