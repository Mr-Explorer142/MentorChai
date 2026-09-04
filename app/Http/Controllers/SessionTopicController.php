<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceivedNotification;
use App\Notifications\SessionRequestedNotification;
use App\Notifications\SessionApprovedNotification;
use App\Enums\SessionStatus;
use App\Enums\UserStatus;
use App\Models\SessionTopic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTopicController extends Controller
{
    public function create(User $mentor)
    {
        // Block booking sessions with unverified or inactive mentors
        if (!$mentor->profile || !$mentor->profile->is_verified || $mentor->status !== UserStatus::ACTIVE) {
            abort(404, 'This mentor\'s profile is not verified or the mentor is currently inactive.');
        }

        return view('session.request', compact('mentor'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'mentor_id'      => 'required|exists:users,id',
            'topic'          => 'required|string|max:255',
            'note'           => 'nullable|string|max:1000',
            'duration_hours' => 'required|integer|min:1|max:4',
        ]);

        $mentor = User::findOrFail($request->mentor_id);
        if (!$mentor->profile || !$mentor->profile->is_verified || $mentor->status !== UserStatus::ACTIVE) {
            abort(404, 'This mentor\'s profile is not verified or the mentor is currently inactive.');
        }

        $session = SessionTopic::create([
            'student_id'     => $request->user()->id,
            'mentor_id'      => $request->mentor_id,
            'topic'          => $request->topic,
            'note'           => $request->note,
            'duration_hours' => $request->duration_hours ?? 1,
            'status'         => SessionStatus::Pending,
        ]);

        // Notify the mentor
        $session->mentor->notify(new SessionRequestedNotification($session));

        return redirect()->route('student_dashboard')
            ->with('success', 'Session request sent successfully!');
    }

    // Session approval
    public function approve(SessionTopic $session)
    {
        if ($session->status !== SessionStatus::Pending) {
            return back()->with('error', 'This session request has already been processed.');
        }

        $session->update([
            'status'      => SessionStatus::Approved,
            'approved_at' => now(),
        ]);

        // Notify the student
        $session->student->notify(new SessionApprovedNotification($session));

        return back()->with('success', 'Session approved.');
    }

    // checkout
    public function checkout(SessionTopic $sessionTopic)
    {
        // Make sure only the student who owns this session can access it
        abort_unless((int) Auth::id() === (int) $sessionTopic->student_id, 403);

        // Check if session has already been paid for or completed
        $isPaid = $sessionTopic->status === SessionStatus::Completed ||
            \App\Models\MentoringSession::where('topic_id', $sessionTopic->id)
                ->where(function ($q) {
                    $q->whereIn('status', [
                        SessionStatus::Ongoing,
                        SessionStatus::Completed,
                        SessionStatus::EndedByAdmin
                    ])->orWhereHas('payment', function ($pq) {
                        $pq->where('status', \App\Enums\PaymentStatus::Paid);
                    });
                })->exists();

        if ($isPaid) {
            return redirect()->route('student_dashboard')
                ->with('error', 'Payment for this session has already been completed.');
        }

        // Make sure session is approved before allowing payment
        abort_if($sessionTopic->status !== SessionStatus::Approved, 403);

        $hourlyRate    = (float) $sessionTopic->mentor->profile->hourly_rate;
        $durationHours = (int) $sessionTopic->duration_hours ?? 1;
        $totalAmount   = $hourlyRate * $durationHours;

        return view('checkout.checkout', [
            'sessionTopic'  => $sessionTopic,
            'mentor'        => $sessionTopic->mentor->load('profile'),
            'student'       => $sessionTopic->student,
            'topic'         => $sessionTopic->topic,
            'hourlyRate'    => $hourlyRate,
            'durationHours' => $durationHours,
            'totalAmount'   => $totalAmount,
        ]);
    }

    // Payment notification
    public function paymentSuccess(SessionTopic $session)
    {
        $session->update([
            'status' => SessionStatus::Completed,
        ]);

        // Notify the mentor
        $session->mentor->notify(new PaymentReceivedNotification($session));

        return redirect()->route('success');
    }
}
