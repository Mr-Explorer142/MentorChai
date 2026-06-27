<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Enums\SessionStatus;
use App\Models\MentoringSession;
use App\Models\Payment;
use App\Models\SessionTopic;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function getBengaliMonthLabels(): array
    {
        $bengaliMonths = [
            '01' => 'জানুয়ারি',
            '02' => 'ফেব্রুয়ারি',
            '03' => 'মার্চ',
            '04' => 'এপ্রিল',
            '05' => 'মে',
            '06' => 'জুন',
            '07' => 'জুলাই',
            '08' => 'আগস্ট',
            '09' => 'সেপ্টেম্বর',
            '10' => 'অক্টোবর',
            '11' => 'নভেম্বর',
            '12' => 'ডিসেম্বর',
        ];

        $labels = [];
        for ($i = 11; $i >= 0; $i--) {
            $labels[] = $bengaliMonths[now()->subMonths($i)->format('m')];
        }
        return $labels;
    }

    public function studentDashboard()
    {
        $student = Auth::user()->load('profile');

        $sessionTopics = SessionTopic::where('student_id', $student->id)
            ->with(['mentor.profile'])
            ->latest()
            ->get();

        // MentoringSession counts (actual session state)
        $mentoringSessions = MentoringSession::where('student_id', $student->id)
            ->get();

        $totalRequests    = $sessionTopics->count();
        $pendingRequests  = $sessionTopics->where('status', SessionStatus::Pending)->count();
        $approvedRequests = $sessionTopics->where('status', SessionStatus::Approved)->count();

        $payments = Payment::where('student_id', $student->id)
            ->with(['session.mentor.profile', 'session.topic'])
            ->latest()
            ->get();

        $totalSpent   = $payments->where('status', PaymentStatus::Paid)->sum('amount');
        $weeklySpent  = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subWeek())->sum('amount');
        $monthlySpent = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subMonth())->sum('amount');
        $yearlySpent  = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subYear())->sum('amount');

        $monthlyChartData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyChartData[] = $payments
                ->where('status', PaymentStatus::Paid)
                ->filter(fn($p) => $p->paid_at && $p->paid_at->format('Y-m') === $month->format('Y-m'))
                ->sum('amount');
        }

        $monthLabels    = $this->getBengaliMonthLabels();
        $recentPayments = $payments->take(5);

        return view('dashboard.student_dashboard', compact(
            'student',
            'sessionTopics',
            'mentoringSessions',
            'totalRequests',
            'pendingRequests',
            'approvedRequests',
            'payments',
            'recentPayments',
            'totalSpent',
            'weeklySpent',
            'monthlySpent',
            'yearlySpent',
            'monthlyChartData',
            'monthLabels'
        ));
    }

    public function mentorDashboard()
    {
        $mentor = Auth::user()->load('profile');

        $sessionTopics = SessionTopic::where('mentor_id', $mentor->id)
            ->with(['student.profile', 'mentor.profile'])
            ->latest()
            ->get();

        // MentoringSession counts (actual session state)
        $mentoringSessions = MentoringSession::where('mentor_id', $mentor->id)
            ->get();

        $totalSessions     = $mentoringSessions->count();
        $completedSessions = $mentoringSessions->where('status', SessionStatus::Completed)->count();
        $ongoingSessions   = $mentoringSessions->where('status', SessionStatus::Ongoing)->count();
        $pendingRequests   = $sessionTopics->where('status', SessionStatus::Pending)->count();
        $cancelledRequests = $sessionTopics->where('status', SessionStatus::Rejected)->count();

        $payments = Payment::where('mentor_id', $mentor->id)
            ->with(['session.topic', 'student.profile'])
            ->latest()
            ->get();

        $totalEarnings   = $payments->where('status', PaymentStatus::Paid)->sum('mentor_earning');
        $weeklyEarnings  = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subWeek())->sum('mentor_earning');
        $monthlyEarnings = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subMonth())->sum('mentor_earning');
        $yearlyEarnings  = $payments->where('status', PaymentStatus::Paid)
            ->where('paid_at', '>=', now()->subYear())->sum('mentor_earning');

        $monthlyChartData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyChartData[] = $payments
                ->where('status', PaymentStatus::Paid)
                ->filter(fn($p) => $p->paid_at && $p->paid_at->format('Y-m') === $month->format('Y-m'))
                ->sum('mentor_earning');
        }

        $monthLabels    = $this->getBengaliMonthLabels();
        $recentPayments = $payments->take(5);

        return view('dashboard.mentor_dashboard', compact(
            'mentor',
            'sessionTopics',
            'mentoringSessions',
            'totalSessions',
            'completedSessions',
            'ongoingSessions',
            'pendingRequests',
            'cancelledRequests',
            'payments',
            'recentPayments',
            'totalEarnings',
            'weeklyEarnings',
            'monthlyEarnings',
            'yearlyEarnings',
            'monthlyChartData',
            'monthLabels'
        ));
    }
}
