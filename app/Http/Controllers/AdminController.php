<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Enums\SessionStatus;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Payment;
use App\Models\SecurityEvent;
use App\Models\SessionTopic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /* ──────────────────────────────────────────
     | Auth
    ────────────────────────────────────────── */

    public function showLogin()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin_dashboard');
        }
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                $request->session()->regenerate();
                return redirect()->route('admin_dashboard');
            }
            Auth::logout();
            return back()->withErrors(['email' => 'This account does not have admin permissions.'])->withInput();
        }

        $adminExists = User::where('email', $request->email)->exists();
        if (!$adminExists) {
            return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
        }

        return back()->withErrors(['password' => 'Incorrect password. Please try again.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin_login');
    }

    /* ──────────────────────────────────────────
     | Dashboard — main overview
    ────────────────────────────────────────── */

    public function dashboard()
    {
        $base = $this->baseData();

        // Dashboard preview cards (top 3–5 records each)
        $dashboardPendingUsers = User::where('role', UserRole::Student)
            ->where('status', 'pending')
            ->with('profile')
            ->latest()
            ->take(5)
            ->get()
            ->map(fn($u) => [
                'id'           => $u->id,
                'name'         => $u->name,
                'email'        => $u->email,
                'dept'         => $u->profile->department ?? '—',
                'applied_date' => $u->created_at->format('d/m/y'),
                'avatar'       => $u->profile->avatar ?? null,
            ])->toArray();

        $dashboardStudents = User::where('role', UserRole::Student)
            ->where('status', 'active')
            ->with('profile')
            ->latest()
            ->take(5)
            ->get()
            ->map(fn($u) => [
                'id'   => $u->id,
                'uid'  => 'U' . str_pad($u->id, 4, '0', STR_PAD_LEFT),
                'name' => $u->name,
                'dept' => $u->profile->department ?? '—',
                'avatar' => $u->profile->avatar ?? null,
            ])->toArray();

        $dashboardPendingMentors = User::where('role', UserRole::Mentor)
            ->whereHas('profile', fn($q) => $q->whereNotNull('documents_submitted_at')->where('is_verified', false))
            ->with('profile')
            ->latest()
            ->take(3)
            ->get()
            ->map(fn($u) => [
                'id'          => $u->id,
                'name'        => $u->name,
                'institution' => $u->profile->institution_name ?? '—',
                'dept'        => $u->profile->department ?? '—',
                'avatar'      => $u->profile->avatar ?? null,
            ])->toArray();

        $dashboardBanned = User::whereIn('role', [UserRole::Student->value, UserRole::Mentor->value])
            ->where('status', 'banned')
            ->with('profile')
            ->latest('banned_at')
            ->take(5)
            ->get()
            ->map(fn($u) => [
                'id'   => $u->id,
                'name' => $u->name,
                'role' => $u->role === UserRole::Student ? 'Student' : 'Mentor',
                'date' => $u->banned_at ? \Carbon\Carbon::parse($u->banned_at)->format('d/m/y') : '—',
                'avatar' => $u->profile->avatar ?? null,
            ])->toArray();

        $onlineMentors = User::where('role', UserRole::Mentor)
            ->where('last_seen_at', '>=', now()->subMinutes(5))
            ->with('profile')
            ->take(8)
            ->get()
            ->map(fn($u) => [
                'id'            => 'T' . str_pad($u->id, 3, '0', STR_PAD_LEFT),
                'name'          => $u->name,
                'institution'   => $u->profile->institution_name ?? '—',
                'dept'          => $u->profile->department ?? '—',
                'sessions_today'=> $u->mentoringSessions()->whereDate('created_at', today())->count(),
                'rating'        => '5.0',
                'avatar'        => $u->profile->avatar ?? null,
            ])->toArray();

        return view('dashboard.admin-dashboard', array_merge($base, [
            'dashboardPendingUsers'   => $dashboardPendingUsers,
            'dashboardStudents'       => $dashboardStudents,
            'dashboardPendingMentors' => $dashboardPendingMentors,
            'dashboardBanned'         => $dashboardBanned,
            'onlineMentors'           => $onlineMentors,
            'adminInitialSection'     => 'dashboard',
        ]));
    }

    /* ──────────────────────────────────────────
     | Full pages (passed via the same view)
    ────────────────────────────────────────── */

    public function users()
    {
        $base = $this->baseData();

        $students = User::where('role', UserRole::Student)
            ->where('status', UserStatus::ACTIVE)
            ->with('profile')
            ->latest()
            ->paginate(20)
            ->map(fn($u) => [
                'id'       => $u->id,
                'uid'      => 'U' . str_pad($u->id, 4, '0', STR_PAD_LEFT),
                'name'     => $u->name,
                'email'    => $u->email,
                'dept'     => $u->profile->department ?? '—',
                'joined'   => $u->created_at->format('d/m/y'),
                'sessions' => $u->sessionTopicsAsStudent()->count(),
                'status'   => 'Active',
                'avatar'   => $u->profile->avatar ?? null,
            ]);

        $pendingUsers = User::where('role', UserRole::Student)
            ->where('status', UserStatus::PENDING)
            ->with('profile')
            ->latest()
            ->get()
            ->map(fn($u) => [
                'id'           => $u->id,
                'uid'          => 'U' . str_pad($u->id, 4, '0', STR_PAD_LEFT),
                'name'         => $u->name,
                'email'        => $u->email,
                'institution'  => $u->profile->institution_name ?? '—',
                'dept'         => $u->profile->department ?? '—',
                'applied_date' => $u->created_at->format('d/m/y'),
                'avatar'       => $u->profile->avatar ?? null,
            ]);

        $bannedUsers = User::where('role', UserRole::Student)
            ->where('status', UserStatus::BANNED)
            ->with('profile')
            ->latest('banned_at')
            ->get()
            ->map(fn($u) => [
                'id'          => $u->id,
                'uid'         => 'U' . str_pad($u->id, 4, '0', STR_PAD_LEFT),
                'name'        => $u->name,
                'banned_date' => $u->banned_at ? \Carbon\Carbon::parse($u->banned_at)->format('d/m/y') : '—',
                'reason'      => $u->banned_reason ?? '—',
                'avatar'      => $u->profile->avatar ?? null,
            ]);

        return view('dashboard.admin-dashboard', array_merge($base, [
            'students'          => $students,
            'pendingUsers'      => $pendingUsers,
            'bannedUsers'       => $bannedUsers,
            'adminInitialSection' => 'users',
        ]));
    }

    public function mentors()
    {
        $base = $this->baseData();

        $mentors = User::where('role', UserRole::Mentor)
            ->with('profile')
            ->latest()
            ->get()
            ->map(fn($u) => [
                'id'            => 'T' . str_pad($u->id, 3, '0', STR_PAD_LEFT),
                'user_id'       => $u->id,
                'name'          => $u->name,
                'email'         => $u->email,
                'phone'         => $u->profile->phone ?? '—',
                'institution'   => $u->profile->institution_name ?? '—',
                'dept'          => $u->profile->department ?? '—',
                'total_sessions'=> $u->mentoringSessions()->count(),
                'online'        => $u->isOnline(),
                'status'        => $u->status === UserStatus::BANNED ? 'Banned' : 'Active',
                'avatar'        => $u->profile->avatar ?? null,
                'is_verified'   => $u->profile->is_verified ?? false,
            ]);

        $pendingMentors = User::where('role', UserRole::Mentor)
            ->whereHas('profile', fn($q) => $q->whereNotNull('documents_submitted_at')->where('is_verified', false))
            ->with('profile')
            ->get()
            ->map(fn($u) => [
                'id'               => $u->id,
                'mentor_id'        => 'T' . str_pad($u->id, 3, '0', STR_PAD_LEFT),
                'name'             => $u->name,
                'email'            => $u->email,
                'phone'            => $u->profile->phone ?? '—',
                'institution'      => $u->profile->institution_name ?? '—',
                'dept'             => $u->profile->department ?? '—',
                'topics'           => array_filter(array_map('trim', explode(',', $u->profile->skills ?? ''))),
                'submitted_at'     => $u->profile->documents_submitted_at ? $u->profile->documents_submitted_at->format('d/m/y') : '—',
                'avatar'           => $u->profile->avatar ?? null,
                'nid_front'        => $u->profile->nid_front ?? null,
                'nid_back'         => $u->profile->nid_back ?? null,
                'student_id_front' => $u->profile->student_id_front ?? null,
                'student_id_back'  => $u->profile->student_id_back ?? null,
                'cv'               => $u->profile->cv ?? null,
            ]);

        $bannedMentors = User::where('role', UserRole::Mentor)
            ->where('status', UserStatus::BANNED)
            ->with('profile')
            ->get()
            ->map(fn($u) => [
                'id'          => $u->id,
                'uid'         => 'T' . str_pad($u->id, 3, '0', STR_PAD_LEFT),
                'name'        => $u->name,
                'banned_date' => $u->banned_at ? \Carbon\Carbon::parse($u->banned_at)->format('d/m/y') : '—',
                'reason'      => $u->banned_reason ?? '—',
                'avatar'      => $u->profile->avatar ?? null,
            ]);

        $onlineMentors = User::where('role', UserRole::Mentor)
            ->where('last_seen_at', '>=', now()->subMinutes(5))
            ->with('profile')
            ->take(8)
            ->get()
            ->map(fn($u) => [
                'id'            => 'T' . str_pad($u->id, 3, '0', STR_PAD_LEFT),
                'name'          => $u->name,
                'institution'   => $u->profile->institution_name ?? '—',
                'dept'          => $u->profile->department ?? '—',
                'sessions_today'=> $u->mentoringSessions()->whereDate('created_at', today())->count(),
                'rating'        => '5.0',
                'avatar'        => $u->profile->avatar ?? null,
            ]);

        return view('dashboard.admin-dashboard', array_merge($base, [
            'mentors'           => $mentors,
            'pendingMentors'    => $pendingMentors,
            'bannedMentors'     => $bannedMentors,
            'onlineMentors'     => $onlineMentors,
            'adminInitialSection' => 'mentors',
        ]));
    }

    public function sessions()
    {
        $base = $this->baseData();

        $sessions = SessionTopic::with(['mentor', 'student', 'mentoringSession'])
            ->latest()
            ->get()
            ->map(fn($s) => [
                'id'       => '#SS-' . $s->id,
                'db_id'    => $s->id,
                'teacher'  => $s->mentor->name ?? '—',
                'student'  => $s->student->name ?? '—',
                'topic'    => $s->topic ?? '—',
                'datetime' => $s->created_at->format('d M, H:i'),
                'duration' => ($s->duration_hours ?? 1) . ' hours',
                'amount'   => $s->mentoringSession ? ('৳' . number_format($s->mentoringSession->amount)) : '—',
                'status'   => match($s->mentoringSession?->status ?? $s->status) {
                    SessionStatus::Approved    => 'Approved',
                    SessionStatus::Ongoing     => 'Ongoing',
                    SessionStatus::Completed   => 'Completed',
                    SessionStatus::Rejected    => 'Cancelled',
                    SessionStatus::EndedByAdmin => 'End by Admin',
                    default                    => 'Pending',
                },
                'raw_status' => ($s->mentoringSession?->status ?? $s->status)?->value ?? null,
            ]);

        return view('dashboard.admin-dashboard', array_merge($base, [
            'sessions'            => $sessions,
            'adminInitialSection' => 'sessions',
        ]));
    }

    public function payments()
    {
        $base = $this->baseData();

        $allPayments = Payment::with(['session.mentor', 'session.topic', 'student'])
            ->latest()
            ->get();

        $paidPayments = $allPayments->where('status', PaymentStatus::Paid);

        $paymentsStats = [
            'total'   => '৳' . number_format($paidPayments->sum('amount')),
            'profit'  => '৳' . number_format($paidPayments->sum('platform_fee')),
            'pending' => '৳' . number_format($allPayments->where('status', PaymentStatus::Pending)->sum('amount')),
            'refunds' => '৳' . number_format($allPayments->where('status', PaymentStatus::Failed)->sum('amount')),
            'payouts' => '৳' . number_format($paidPayments->sum('mentor_earning')),
        ];

        $transactions = $allPayments->map(fn($p) => [
            'id'     => $p->transaction_id ?? ('TRX-' . $p->id),
            'type'   => $p->status === PaymentStatus::Paid ? 'Session Fee' : 'Pending',
            'method' => $p->method ? strtoupper($p->method->value) : '—',
            'amount' => ($p->status === PaymentStatus::Paid ? '+' : '') . '৳' . number_format($p->amount),
            'date'   => $p->paid_at ? $p->paid_at->format('d/m/y') : $p->created_at->format('d/m/y'),
            'time'   => $p->paid_at ? $p->paid_at->format('H:i') : $p->created_at->format('H:i'),
            'note'   => $p->session->topic->topic ?? '—',
            'detail' => "Student: " . ($p->student->name ?? '—') . "\nMentor: " . ($p->session->mentor->name ?? '—') . "\nMethod: " . ($p->method ? strtoupper($p->method->value) : '—') . "\nAmount: ৳" . number_format($p->amount),
        ]);

        return view('dashboard.admin-dashboard', array_merge($base, [
            'payments'            => $paymentsStats,
            'transactions'        => $transactions,
            'adminInitialSection' => 'payments',
        ]));
    }

    /* ──────────────────────────────────────────
     | Actions
    ────────────────────────────────────────── */

    public function approveMentor($id)
    {
        $user = User::where('role', UserRole::Mentor)->findOrFail($id);
        if ($user->profile) {
            $user->profile->update([
                'is_verified'           => true,
                'documents_submitted_at'=> null,
            ]);
        }
        return back()->with('success', $user->name . '\'s profile has been verified.');
    }

    public function rejectMentor(Request $request, $id)
    {
        $user = User::where('role', UserRole::Mentor)->findOrFail($id);
        if ($user->profile) {
            // Delete document files
            foreach (['nid_front', 'nid_back', 'student_id_front', 'student_id_back', 'cv'] as $field) {
                if ($user->profile->$field) {
                    Storage::disk('public')->delete($user->profile->$field);
                }
            }
            $user->profile->update([
                'nid_front'             => null,
                'nid_back'              => null,
                'student_id_front'      => null,
                'student_id_back'       => null,
                'cv'                    => null,
                'is_verified'           => false,
                'documents_submitted_at'=> null,
            ]);
        }
        return back()->with('success', $user->name . '\'s application has been rejected.');
    }

    public function approveUser($id)
    {
        $user = User::where('role', UserRole::Student)->findOrFail($id);
        $user->update(['status' => UserStatus::ACTIVE]);
        return back()->with('success', $user->name . '\'s account has been approved.');
    }

    public function banUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status'        => UserStatus::BANNED,
            'banned_at'     => now(),
            'banned_reason' => $request->input('reason', 'Policy violation'),
        ]);
        return back()->with('success', $user->name . ' has been banned.');
    }

    public function unbanUser($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status'        => UserStatus::ACTIVE,
            'banned_at'     => null,
            'banned_reason' => null,
        ]);
        return back()->with('success', $user->name . '\'s ban has been lifted.');
    }

    public function addAdmin(Request $request)
    {
        // Only super admin can add admins
        if (!Auth::user()->isSuperAdmin()) {
            abort(403);
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'role'              => UserRole::Admin,
            'is_super_admin'    => false,
            'email_verified_at' => now(),
        ]);

        return back()->with('active_section', 'settings')->with('success', $request->name . ' has been added as a new admin.');
    }

    public function removeAdmin($id)
    {
        if (!Auth::user()->isSuperAdmin()) {
            abort(403);
        }
        $admin = User::whereIn('role', [UserRole::Admin, UserRole::SuperAdmin])->where('is_super_admin', false)->findOrFail($id);
        $admin->delete();
        return back()->with('active_section', 'settings')->with('success', $admin->name . '\'s admin account has been removed.');
    }

    public function endSession($id)
    {
        $session = SessionTopic::findOrFail($id);
        $session->update(['status' => SessionStatus::EndedByAdmin]);
        
        $mentoringSession = \App\Models\MentoringSession::where('topic_id', $id)->first();
        if ($mentoringSession) {
            $mentoringSession->update(['status' => SessionStatus::EndedByAdmin, 'ended_at' => now()]);
        }
        
        return back()->with('success', 'Session ended successfully.');
    }

    public function editTopic(Request $request)
    {
        $request->validate([
            'old_name' => 'required|string',
            'new_name' => 'required|string',
        ]);

        $oldName = trim($request->old_name);
        $newName = trim($request->new_name);

        if ($oldName === $newName) {
            return back()->with('active_section', 'topics')->with('success', 'No changes were made.');
        }

        // 1. Update profiles skills list
        $profiles = \App\Models\Profile::whereNotNull('skills')->get();
        foreach ($profiles as $profile) {
            $skills = array_map('trim', explode(',', $profile->skills));
            $replaced = false;
            foreach ($skills as $key => $skill) {
                if (strcasecmp($skill, $oldName) === 0) {
                    $skills[$key] = $newName;
                    $replaced = true;
                }
            }
            if ($replaced) {
                $skills = array_unique(array_filter($skills));
                $profile->update(['skills' => implode(', ', $skills)]);
            }
        }

        // 2. Update session topics
        SessionTopic::where('topic', $oldName)->update(['topic' => $newName]);

        return back()->with('active_section', 'topics')->with('success', 'Topic name updated successfully.');
    }

    public function deleteTopic(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $name = trim($request->name);

        // 1. Remove from profiles skills list
        $profiles = \App\Models\Profile::whereNotNull('skills')->get();
        foreach ($profiles as $profile) {
            $skills = array_map('trim', explode(',', $profile->skills));
            $removed = false;
            foreach ($skills as $key => $skill) {
                if (strcasecmp($skill, $name) === 0) {
                    unset($skills[$key]);
                    $removed = true;
                }
            }
            if ($removed) {
                $skills = array_unique(array_filter($skills));
                $profile->update(['skills' => implode(', ', $skills)]);
            }
        }

        // 2. Set topic to null in session topics
        // Removed: We should keep the historical topic name in session_topics even if the topic is deleted from global list.

        return back()->with('active_section', 'topics')->with('success', 'Topic deleted successfully.');
    }

    /* ──────────────────────────────────────────
     | Security Events (Audio Detection)
    ────────────────────────────────────────── */

    public function securityEvents()
    {
        $base = $this->baseData();

        $events = SecurityEvent::with('user')
            ->latest('detected_at')
            ->take(200)
            ->get()
            ->map(fn($e) => [
                'id'               => $e->id,
                'detected_at'      => $e->detected_at?->format('d M Y, H:i:s') ?? '—',
                'session_code'     => $e->session_code,
                'user_name'        => $e->user?->name ?? '—',
                'user_id'          => $e->user_id,
                'participant_role' => $e->participant_role ?? '—',
                'detection_type'   => $e->detection_type,
                'source'           => $e->source,
            ]);

        $totalEvents = SecurityEvent::count();

        return view('dashboard.admin-dashboard', array_merge($base, [
            'securityEvents'      => $events,
            'totalSecurityEvents' => $totalEvents,
            'adminInitialSection' => 'security',
        ]));
    }

    /* ──────────────────────────────────────────
     | Private helpers
    ────────────────────────────────────────── */

    private function baseData(): array
    {
        $totalStudents      = User::where('role', UserRole::Student)->count();
        $totalMentors       = User::where('role', UserRole::Mentor)->count();
        $bannedUsersCount   = User::where('role', UserRole::Student)->where('status', UserStatus::BANNED)->count();
        $bannedMentorsCount = User::where('role', UserRole::Mentor)->where('status', UserStatus::BANNED)->count();
        $pendingUsersCount  = User::where('role', UserRole::Student)->where('status', UserStatus::PENDING)->count();
        $pendingMentorsCount = User::where('role', UserRole::Mentor)
            ->whereHas('profile', fn($q) => $q->whereNotNull('documents_submitted_at')->where('is_verified', false))
            ->count();
        $onlineMentorsCount = User::where('role', UserRole::Mentor)
            ->where('last_seen_at', '>=', now()->subMinutes(5))
            ->count();

        $stats = [
            'totalStudents'    => $totalStudents,
            'totalMentors'     => $totalMentors,
            'liveSessions'     => SessionTopic::where('status', SessionStatus::Approved)->count(),
            'totalRevenue'     => $this->formatCurrency(Payment::where('status', PaymentStatus::Paid)->sum('platform_fee')),
            'totalSessions'    => SessionTopic::count(),
            'cancelledSessions'=> SessionTopic::where('status', SessionStatus::Rejected)->count(),
            'totalTransactions'=> Payment::count(),
        ];

        $adminsList = User::whereIn('role', [UserRole::Admin, UserRole::SuperAdmin])->get()->map(fn($a) => [
            'id'            => $a->id,
            'name'          => $a->name,
            'email'         => $a->email,
            'is_super_admin'=> $a->isSuperAdmin(),
            'created_at'    => $a->created_at->format('d/m/y'),
        ]);

        // Retrieve all unique skills/topics from profiles
        $profileSkills = \App\Models\Profile::whereNotNull('skills')
            ->pluck('skills')
            ->flatMap(fn($s) => array_map('trim', explode(',', $s)))
            ->filter()
            ->countBy();

        // Get session counts grouped by topic name
        $sessionTopicCounts = SessionTopic::pluck('topic')
            ->filter()
            ->countBy();

        // Merge and build a unified topics list
        $topicsList = [];
        foreach ($profileSkills as $name => $mentorCount) {
            $sessionCount = $sessionTopicCounts->get($name, 0);
            $topicsList[] = [
                'name'          => $name,
                'mentor_count'  => $mentorCount,
                'session_count' => $sessionCount,
            ];
        }

        foreach ($sessionTopicCounts as $name => $sessionCount) {
            if (!isset($profileSkills[$name])) {
                $topicsList[] = [
                    'name'          => $name,
                    'mentor_count'  => 0,
                    'session_count' => $sessionCount,
                ];
            }
        }

        usort($topicsList, function($a, $b) {
            if ($b['mentor_count'] === $a['mentor_count']) {
                return $b['session_count'] <=> $a['session_count'];
            }
            return $b['mentor_count'] <=> $a['mentor_count'];
        });

        return compact('stats', 'pendingUsersCount', 'pendingMentorsCount',
            'bannedUsersCount', 'bannedMentorsCount', 'onlineMentorsCount', 'adminsList', 'topicsList');
    }

    private function formatCurrency($amount)
    {
        if ($amount >= 100000) {
            return '৳' . number_format($amount / 100000, 1) . 'L';
        } elseif ($amount >= 1000) {
            return '৳' . number_format($amount / 1000, 1) . 'K';
        } else {
            return '৳' . number_format($amount);
        }
    }
}
