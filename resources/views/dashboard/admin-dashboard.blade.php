<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>MentorChai - Admin</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"/>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-dashboard-view">

{{-- ═══════════════════ SIDEBAR ═══════════════════ --}}
<div class="sidebar-overlay" onclick="document.body.classList.remove('sidebar-open')"></div>
<aside id="sidebar" class="sidebar-wrap">
  <a href="{{ route('home') }}" class="logo-wrap" title="Go to homepage">
    <div class="logo-icon"><x-heroicon name="academic-cap" class="h-icon" style="width:17px;height:17px" /></div>
    <div>
      <div class="logo-name">MentorChai</div>
      <div class="logo-role">Admin Console</div>
    </div>
  </a>
  <div style="flex:1;overflow-y:auto;padding:6px 0">
    <div class="nav-section">Overview</div>
    <a class="nav-item @if(($adminInitialSection ?? 'dashboard') === 'dashboard') active @endif" href="{{ route('admin_dashboard') }}" onclick="nav('dashboard',this)"><x-heroicon name="squares-2x2" class="h-icon" style="width:20px;height:20px" />Dashboard</a>
    <div class="nav-section">Management</div>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'users') active @endif" href="{{ route('admin_users') }}" onclick="nav('users',this)"><x-heroicon name="users" class="h-icon" style="width:20px;height:20px" />Students</a>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'mentors') active @endif" href="{{ route('admin_mentors') }}" onclick="nav('mentors',this)"><x-heroicon name="user-group" class="h-icon" style="width:20px;height:20px" />Mentors</a>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'topics') active @endif" onclick="nav('topics',this)"><x-heroicon name="book-open" class="h-icon" style="width:20px;height:20px" />Topics</a>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'sessions') active @endif" href="{{ route('admin_sessions') }}" onclick="nav('sessions',this)"><x-heroicon name="video-camera" class="h-icon" style="width:20px;height:20px" />Sessions</a>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'payments') active @endif" href="{{ route('admin_payments') }}" onclick="nav('payments',this)"><x-heroicon name="credit-card" class="h-icon" style="width:20px;height:20px" />Payments</a>
    <div class="nav-section">System</div>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'security') active @endif" href="{{ route('admin_security') }}" onclick="nav('security',this)"><x-heroicon name="shield-exclamation" class="h-icon" style="width:20px;height:20px" />Security Events</a>
    <a class="nav-item @if(($adminInitialSection ?? '') === 'settings') active @endif" onclick="nav('settings',this)"><x-heroicon name="cog-6-tooth" class="h-icon" style="width:20px;height:20px" />Settings</a>
  </div>
  <div class="sidebar-bottom">
    <div class="admin-row">
      @php $adminUser = auth()->user(); @endphp
      <div class="admin-av">
        @if($adminUser?->profile?->avatar)
          <img src="{{ media_url($adminUser->profile->avatar) }}" alt="{{ $adminUser->name }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($adminUser->name ?? 'A', 0, 2)) }}'">
        @else
          {{ strtoupper(substr($adminUser?->name ?? 'A', 0, 2)) }}
        @endif
      </div>
      <div>
        <div style="font-size:13px;font-weight:600">{{ $adminUser?->name ?? 'Admin' }}</div>
        <div style="font-size:11px;color:var(--text3)">{{ $adminUser?->isSuperAdmin() ? 'Super Admin' : 'Admin' }}</div>
      </div>
    </div>
    <form method="POST" action="{{ route('admin_logout') }}" style="margin-top:6px">
      @csrf
      <button type="submit" class="btn btn-ghost btn-sm" style="width:100%"><x-heroicon name="arrow-left-on-rectangle" class="h-icon h-icon--sm" />Logout</button>
    </form>
  </div>
</aside>

{{-- ═══════════════════ MAIN ═══════════════════ --}}
<div id="main" class="main-wrap">

  {{-- TOPBAR --}}
  <div id="topbar" class="topbar-wrap">
    <button class="tb-btn mobile-menu-btn" style="display:none" onclick="document.body.classList.add('sidebar-open')" title="Menu">
      <svg class="h-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path></svg>
    </button>
    <span class="topbar-title" id="pg-title">Dashboard</span>
    <div class="searchbar">
      <x-heroicon name="magnifying-glass" class="h-icon h-icon--md" style="color:var(--text3)" />
      <input type="text" placeholder="Search anything…"/>
    </div>
    <button class="tb-btn" title="Notifications"><x-heroicon name="bell" class="h-icon" /></button>
    <button class="tb-btn" id="theme-btn" onclick="toggleTheme()" title="Toggle dark mode"><span id="theme-icon-moon"><x-heroicon name="moon" class="h-icon" /></span><span id="theme-icon-sun" style="display:none"><x-heroicon name="sun" class="h-icon" /></span></button>
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="tb-av">
        @if($adminUser?->profile?->avatar)
          <img src="{{ media_url($adminUser->profile->avatar) }}" alt="{{ $adminUser->name }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($adminUser->name ?? 'A', 0, 1)) }}'">
        @else
          {{ strtoupper(substr($adminUser?->name ?? 'A', 0, 1)) }}
        @endif
      </div>
      <ul tabindex="0" class="dropdown-content menu bg-[var(--surface)] text-[var(--text)] rounded-box z-50 w-52 p-2 shadow-lg border border-[var(--border)] mt-2">
        <div style="padding:8px 12px;border-bottom:1px solid var(--border)">
          <div style="font-weight:600;font-size:13px">{{ $adminUser?->name ?? 'Admin' }}</div>
          <div style="font-size:11px;color:var(--text3);margin-top:2px">{{ $adminUser?->email ?? '' }}</div>
        </div>
        <li style="margin-top:4px">
          <form method="POST" action="{{ route('admin_logout') }}" style="display:block;width:100%;margin:0;padding:0">
            @csrf
            <button type="submit" style="width:100%;text-align:left;display:flex;align-items:center;gap:8px;color:var(--red);background:none;border:none;cursor:pointer;padding:8px 12px;font-size:12px;font-weight:500" class="hover:bg-[var(--surface2)] rounded-md">
              <x-heroicon name="arrow-left-on-rectangle" class="h-icon h-icon--sm" style="color:var(--red)" />Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>

  {{-- Flash messages --}}
  @if(session('success'))
  <div style="padding:10px 22px 0">
    <div class="flash-success">✓ {{ session('success') }}</div>
  </div>
  @endif
  @if(session('error'))
  <div style="padding:10px 22px 0">
    <div class="flash-error">✗ {{ session('error') }}</div>
  </div>
  @endif

  {{-- ═══════════════════════════════════
       PAGE: DASHBOARD
  ═══════════════════════════════════ --}}
  <div class="page active" id="p-dashboard">
    <div class="pg-hd">
      <div>
        <h2>Dashboard</h2>
        <div class="pg-hd-sub">Welcome, {{ $adminUser?->name ?? 'Admin' }}</div>
      </div>
    </div>

    {{-- Top stats --}}
    <div class="sgrid g4">
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">Total Students</div><span class="stat-icon"><x-heroicon name="users" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ number_format($stats['totalStudents'] ?? 0) }}</div>
        <div class="s-sub">Registered Students</div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">Total Mentors</div><span class="stat-icon"><x-heroicon name="user-group" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ number_format($stats['totalMentors'] ?? 0) }}</div>
        <div class="s-sub">Approved Mentors</div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">Live Sessions</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="video-camera" class="h-icon h-icon--md" /></span></div>
        <div class="s-val" style="color:var(--red)">{{ $stats['liveSessions'] ?? 0 }}</div>
        <div class="s-sub"><span class="live-dot"></span>Active Right Now</div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">Total Profit</div><span class="stat-icon"><x-heroicon name="currency-bangladeshi" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ $stats['totalRevenue'] ?? '৳0' }}</div>
        <div class="s-sub">Platform Transactions</div>
      </div>
    </div>

    {{-- Mini preview grids --}}
    <div class="sgrid g2">

      {{-- Pending User Approvals --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="user-plus" class="h-icon h-icon--lg" style="color:var(--amber)" />
          <h4>Students - Pending Approval</h4>
          <span class="mini-count">{{ $pendingUsersCount ?? 0 }}</span>
        </div>
        @forelse($dashboardPendingUsers ?? [] as $user)
        <div class="mini-row">
          <div class="av av-amber">
            @if($user['avatar'])
              <img src="{{ media_url($user['avatar']) }}" alt="{{ $user['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($user['name'], 0, 1)) }}'">
            @else
              {{ strtoupper(substr($user['name'], 0, 1)) }}{{ strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}
            @endif
          </div>
          <div style="flex:1">
            <div class="mini-name">{{ $user['name'] }}</div>
            <div class="mini-sub">{{ $user['dept'] }} · Applied: {{ $user['applied_date'] }}</div>
          </div>
          <span class="badge b-pending">Pending</span>
        </div>
        @empty
        <div class="mini-row"><div style="font-size:12px;color:var(--text3);padding:4px 0">No pending applications</div></div>
        @endforelse
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="localStorage.setItem('mc-admin-tab-users', 'pending-users'); window.location.href = '{{ route('admin_users') }}'">
            View All <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- All Students --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="users" class="h-icon h-icon--lg" style="color:var(--accent)" />
          <h4>All Students</h4>
          <span class="mini-count">{{ number_format($stats['totalStudents'] ?? 0) }}</span>
        </div>
        @forelse($dashboardStudents ?? [] as $student)
        <div class="mini-row">
          <div class="av av-blue">
            @if($student['avatar'])
              <img src="{{ media_url($student['avatar']) }}" alt="{{ $student['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($student['name'], 0, 1)) }}'">
            @else
              {{ strtoupper(substr($student['name'], 0, 1)) }}{{ strtoupper(substr(strstr($student['name'], ' '), 1, 1)) }}
            @endif
          </div>
          <div style="flex:1">
            <div class="mini-name">{{ $student['name'] }}</div>
            <div class="mini-sub">{{ $student['uid'] }} · {{ $student['dept'] }}</div>
          </div>
          <span class="badge b-active">Active</span>
        </div>
        @empty
        <div class="mini-row"><div style="font-size:12px;color:var(--text3);padding:4px 0">No students found</div></div>
        @endforelse
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="localStorage.setItem('mc-admin-tab-users', 'all-students'); window.location.href = '{{ route('admin_users') }}'">
            View All <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- Mentor Pending Approvals --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="user-group" class="h-icon h-icon--lg" style="color:var(--amber)" />
          <h4>Mentors - Verification Pending</h4>
          <span class="mini-count">{{ $pendingMentorsCount ?? 0 }}</span>
        </div>
        @forelse($dashboardPendingMentors ?? [] as $mentor)
        <div class="mini-row">
          <div class="av av-amber">
            @if($mentor['avatar'])
              <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($mentor['name'], 0, 1)) }}'">
            @else
              {{ strtoupper(substr($mentor['name'], 0, 1)) }}{{ strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}
            @endif
          </div>
          <div style="flex:1">
            <div class="mini-name">{{ $mentor['name'] }}</div>
            <div class="mini-sub">{{ $mentor['institution'] }} · {{ $mentor['dept'] }}</div>
          </div>
          <span class="badge b-pending">Pending</span>
        </div>
        @empty
        <div class="mini-row"><div style="font-size:12px;color:var(--text3);padding:4px 0">No pending requests</div></div>
        @endforelse
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="localStorage.setItem('mc-admin-tab-mentors', 'pending-mentors'); window.location.href = '{{ route('admin_mentors') }}'">
            View All <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- Banned accounts --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="no-symbol" class="h-icon h-icon--lg" style="color:var(--red)" />
          <h4>Recent Bans</h4>
          <span class="mini-count">{{ ($bannedUsersCount ?? 0) + ($bannedMentorsCount ?? 0) }}</span>
        </div>
        @forelse($dashboardBanned ?? [] as $banned)
        <div class="mini-row">
          <div class="av av-red">
            @if($banned['avatar'])
              <img src="{{ media_url($banned['avatar']) }}" alt="{{ $banned['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($banned['name'], 0, 1)) }}'">
            @else
              {{ strtoupper(substr($banned['name'], 0, 1)) }}{{ strtoupper(substr(strstr($banned['name'], ' '), 1, 1)) }}
            @endif
          </div>
          <div style="flex:1">
            <div class="mini-name">{{ $banned['name'] }}</div>
            <div class="mini-sub">{{ $banned['role'] }} · Banned {{ $banned['date'] }}</div>
          </div>
          <span class="badge b-banned">Banned</span>
        </div>
        @empty
        <div class="mini-row"><div style="font-size:12px;color:var(--text3);padding:4px 0">No banned accounts</div></div>
        @endforelse
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="localStorage.setItem('mc-admin-tab-users', 'banned-users'); window.location.href = '{{ route('admin_users') }}'">
            View All <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>
    </div>

    {{-- Active Mentors preview --}}
    <div class="mini-card">
      <div class="mini-head">
        <x-heroicon name="check-circle" class="h-icon h-icon--lg" style="color:var(--green)" />
        <h4>Active Mentors Right Now</h4>
        <span class="mini-count">{{ $onlineMentorsCount ?? 0 }} Online</span>
      </div>
      <div class="tbl">
        <table>
          <thead><tr><th>ID</th><th>Name</th><th>Department</th><th>Today's Sessions</th><th>Status</th></tr></thead>
          <tbody>
            @forelse($onlineMentors ?? [] as $mentor)
            <tr>
              <td class="td-mono">{{ $mentor['id'] }}</td>
              <td>
                <div class="td-with-av">
                  <span class="t-av">
                    @if($mentor['avatar'])
                      <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($mentor['name'], 0, 1)) }}'">
                    @else
                      {{ strtoupper(substr($mentor['name'], 0, 1)) }}
                    @endif
                  </span>
                  {{ $mentor['name'] }}
                </div>
              </td>
              <td>{{ $mentor['dept'] }}</td>
              <td>{{ $mentor['sessions_today'] }}</td>
              <td><span class="badge b-ongoing">Online</span></td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:20px;color:var(--text3);font-size:13px">No mentors online right now</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mini-foot">
        <button class="btn btn-ghost btn-sm" style="width:100%" onclick="localStorage.setItem('mc-admin-tab-mentors', 'active-mentors'); window.location.href = '{{ route('admin_mentors') }}'">
          View All <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
        </button>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: USERS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-users">
    <div class="pg-hd"><h2>Student Management</h2></div>

    <div class="tab-bar" id="tbar-users">
      <button class="tab active" onclick="switchTab('users','all-students',this)">All Students<span class="t-count">{{ number_format($stats['totalStudents'] ?? 0) }}</span></button>
      <button class="tab" onclick="switchTab('users','pending-users',this)">Pending Approval<span class="t-count">{{ $pendingUsersCount ?? 0 }}</span></button>
      <button class="tab" onclick="switchTab('users','banned-users',this)">Banned<span class="t-count">{{ $bannedUsersCount ?? 0 }}</span></button>
    </div>

    {{-- All Students --}}
    <div class="tab-panel active" id="tp-all-students">
      <div class="card">
        <div class="card-head">
          <h3>All Students</h3>
        </div>
        <div class="tbl">
          <table>
            <thead><tr><th>User ID</th><th>Name</th><th>Department</th><th>Joined Date</th><th>Total Sessions</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
              @forelse($students ?? [] as $student)
              <tr>
                <td class="td-mono">{{ $student['uid'] }}</td>
                <td>
                  <div class="td-with-av">
                    <span class="t-av">
                      @if($student['avatar'])
                        <img src="{{ media_url($student['avatar']) }}" alt="{{ $student['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($student['name'], 0, 1)) }}'">
                      @else
                        {{ strtoupper(substr($student['name'], 0, 1)) }}
                      @endif
                    </span>
                    {{ $student['name'] }}
                  </div>
                </td>
                <td>{{ $student['dept'] }}</td>
                <td>{{ $student['joined'] }}</td>
                <td>{{ $student['sessions'] }}</td>
                <td><span class="badge b-active">Active</span></td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" onclick="openBan('{{ addslashes($student['name']) }}', '{{ $student['uid'] }}', '{{ route('admin_user.ban', $student['id']) }}')">
                    <x-heroicon name="no-symbol" class="h-icon h-icon--sm" />Ban
                  </button>
                </td>
              </tr>
              @empty
              <tr><td colspan="7" style="text-align:center;padding:20px;color:var(--text3)">No students found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-foot">
          <span style="font-size:12px;color:var(--text3)">Total {{ number_format($stats['totalStudents'] ?? 0) }} students</span>
        </div>
      </div>
    </div>

    {{-- Pending Users --}}
    <div class="tab-panel" id="tp-pending-users">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $pendingUsersCount ?? 0 }} pending approval</span>
      </div>
      @forelse($pendingUsers ?? [] as $user)
      <div class="appr-card">
        <div class="appr-av av-amber">
          @if($user['avatar'])
            <img src="{{ media_url($user['avatar']) }}" alt="{{ $user['name'] }}">
          @else
            {{ strtoupper(substr($user['name'], 0, 1)) }}{{ strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}
          @endif
        </div>
        <div class="appr-info">
          <h4>{{ $user['name'] }}</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />{{ $user['institution'] }}</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />{{ $user['dept'] }}</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />{{ $user['applied_date'] }}</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />{{ $user['email'] }}</span>
          </div>
          <span class="badge b-pending">Pending</span>
        </div>
        <div class="appr-actions">
          <form method="POST" action="{{ route('admin_user.approve', $user['id']) }}">@csrf
            <button type="submit" class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />Approve</button>
          </form>
          <button type="button" class="btn btn-danger btn-sm" onclick="openBan('{{ addslashes($user['name']) }}', '{{ $user['uid'] }}', '{{ route('admin_user.ban', $user['id']) }}')">
            <x-heroicon name="x-mark" class="h-icon h-icon--sm" />Ban
          </button>
        </div>
      </div>
      @empty
      <div style="text-align:center;padding:30px;color:var(--text3);background:var(--surface);border:1px solid var(--border);border-radius:10px">
        No pending requests ✓
      </div>
      @endforelse
    </div>

    {{-- Banned Users --}}
    <div class="tab-panel" id="tp-banned-users">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $bannedUsersCount ?? 0 }} banned accounts</span>
      </div>
      @forelse($bannedUsers ?? [] as $user)
      <div class="ban-card">
        <div class="ban-av">
          @if($user['avatar'])
            <img src="{{ media_url($user['avatar']) }}" alt="{{ $user['name'] }}">
          @else
            {{ strtoupper(substr($user['name'], 0, 1)) }}{{ strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}
          @endif
        </div>
        <div style="flex:1">
          <div class="ban-uid">User ID: {{ $user['uid'] }}</div>
          <div class="ban-name">{{ $user['name'] }}</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> Banned Date: {{ $user['banned_date'] }}</div>
          <div class="ban-reason">{{ $user['reason'] }}</div>
        </div>
        <form method="POST" action="{{ route('admin_user.unban', $user['id']) }}">@csrf
          <button type="submit" class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />Unban</button>
        </form>
      </div>
      @empty
      <div style="text-align:center;padding:30px;color:var(--text3);background:var(--surface);border:1px solid var(--border);border-radius:10px">
        No banned accounts ✓
      </div>
      @endforelse
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: MENTORS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-mentors">
    <div class="pg-hd"><h2>Mentor Management</h2></div>

    <div class="tab-bar" id="tbar-mentors">
      <button class="tab active" onclick="switchTab('mentors','all-mentors',this)">All Mentors<span class="t-count">{{ $stats['totalMentors'] ?? 0 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','pending-mentors',this)">Document Approval<span class="t-count">{{ $pendingMentorsCount ?? 0 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','banned-mentors',this)">Banned<span class="t-count">{{ $bannedMentorsCount ?? 0 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','active-mentors',this)">Active Right Now<span class="t-count">{{ $onlineMentorsCount ?? 0 }}</span></button>
    </div>

    {{-- All Mentors --}}
    <div class="tab-panel active" id="tp-all-mentors">
      <div class="card">
        <div class="card-head"><h3>All Mentors</h3></div>
        <div class="tbl">
          <table>
            <thead><tr><th>ID</th><th>Name</th><th>Institution</th><th>Department</th><th>Total Sessions</th><th>Verified</th><th>Online/Offline</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
              @forelse($mentors ?? [] as $mentor)
              <tr>
                <td class="td-mono"><a href="{{ route('mentor_profile', $mentor['user_id']) }}" target="_blank" style="color: var(--mc-primary); text-decoration: underline; font-weight: 500;">{{ $mentor['id'] }}</a></td>
                <td>
                  <div class="td-with-av">
                    <span class="t-av">
                      @if($mentor['avatar'])
                        <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($mentor['name'], 0, 1)) }}'">
                      @else
                        {{ strtoupper(substr($mentor['name'], 0, 1)) }}
                      @endif
                    </span>
                    {{ $mentor['name'] }}
                  </div>
                </td>
                <td>{{ $mentor['institution'] }}</td>
                <td>{{ $mentor['dept'] }}</td>
                <td>{{ $mentor['total_sessions'] }}</td>
                <td><span class="badge {{ $mentor['is_verified'] ? 'b-verified' : 'b-pending' }}">{{ $mentor['is_verified'] ? 'Verified ✓' : 'Unverified' }}</span></td>
                <td><span class="badge {{ $mentor['online'] ? 'b-ongoing' : 'b-offline' }}">{{ $mentor['online'] ? 'Online' : 'Offline' }}</span></td>
                <td><span class="badge {{ $mentor['status'] === 'Active' ? 'b-active' : 'b-banned' }}">{{ $mentor['status'] === 'Active' ? 'Active' : 'Banned' }}</span></td>
                <td>
                  <div class="row-acts">
                    @if($mentor['status'] === 'Active')
                    <button type="button" class="btn btn-danger btn-sm" onclick="openBan('{{ addslashes($mentor['name']) }}', '{{ $mentor['id'] }}', '{{ route('admin_user.ban', $mentor['user_id']) }}')">
                      <x-heroicon name="no-symbol" class="h-icon h-icon--sm" />Ban
                    </button>
                    @else
                    <form method="POST" action="{{ route('admin_user.unban', $mentor['user_id']) }}">@csrf
                      <button type="submit" class="btn btn-warning btn-sm"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />Unban</button>
                    </form>
                    @endif
                  </div>
                </td>
              </tr>
              @empty
              <tr><td colspan="9" style="text-align:center;padding:20px;color:var(--text3)">No mentors found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="info-tip"><x-heroicon name="information-circle" class="h-icon h-icon--md" />Click on the User ID to view full mentor profile</div>
        <div class="card-foot">
          <span style="font-size:12px;color:var(--text3)">Total {{ $stats['totalMentors'] ?? 0 }} mentors</span>
        </div>
      </div>
    </div>

    {{-- Pending Mentors - Document Verification --}}
    <div class="tab-panel" id="tp-pending-mentors">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $pendingMentorsCount ?? 0 }} mentors waiting for document review</span>
      </div>
      @forelse($pendingMentors ?? [] as $mentor)
      <div class="appr-card">
        <div class="appr-av av-amber">
          @if($mentor['avatar'])
            <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}">
          @else
            {{ strtoupper(substr($mentor['name'], 0, 1)) }}{{ strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}
          @endif
        </div>
        <div class="appr-info">
          <h4>{{ $mentor['name'] }}</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />{{ $mentor['institution'] }}</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />{{ $mentor['dept'] }}</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />{{ $mentor['phone'] }}</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />{{ $mentor['email'] }}</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />Submitted: {{ $mentor['submitted_at'] }}</span>
          </div>
          @if(!empty($mentor['topics']))
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">Interested in teaching the following topics:</div>
          <div class="chips">
            @foreach(array_slice($mentor['topics'], 0, 6) as $topic)
            <span class="chip">{{ $topic }}</span>
            @endforeach
          </div>
          @endif
          {{-- Documents --}}
          <div style="margin-top:10px">
            <div style="font-size:11px;font-weight:600;color:var(--text3);text-transform:uppercase;letter-spacing:.08em;margin-bottom:6px">Submitted Documents</div>
            <div class="doc-imgs">
              @if($mentor['nid_front'])
              <div class="doc-img-box" onclick="openDocViewer('{{ media_url($mentor['nid_front']) }}','NID Front')">
                <img src="{{ media_url($mentor['nid_front']) }}" alt="NID Front">
                <div class="doc-label">NID Front</div>
              </div>
              @endif
              @if($mentor['nid_back'])
              <div class="doc-img-box" onclick="openDocViewer('{{ media_url($mentor['nid_back']) }}','NID Back')">
                <img src="{{ media_url($mentor['nid_back']) }}" alt="NID Back">
                <div class="doc-label">NID Back</div>
              </div>
              @endif
              @if($mentor['student_id_front'])
              <div class="doc-img-box" onclick="openDocViewer('{{ media_url($mentor['student_id_front']) }}','Student ID Front')">
                <img src="{{ media_url($mentor['student_id_front']) }}" alt="Student ID Front">
                <div class="doc-label">ID Front</div>
              </div>
              @endif
              @if($mentor['student_id_back'])
              <div class="doc-img-box" onclick="openDocViewer('{{ media_url($mentor['student_id_back']) }}','Student ID Back')">
                <img src="{{ media_url($mentor['student_id_back']) }}" alt="Student ID Back">
                <div class="doc-label">ID Back</div>
              </div>
              @endif
              @if($mentor['cv'])
              <div class="doc-img-box" style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:10px;text-align:center" onclick="window.open('{{ media_url($mentor['cv']) }}', '_blank')">
                <x-heroicon name="document-text" class="h-icon" style="width:32px;height:32px;color:var(--accent)" />
                <div class="doc-label" style="position:static;background:none;color:var(--text);padding-top:4px">View CV</div>
              </div>
              @endif
              @if(!$mentor['nid_front'] && !$mentor['nid_back'] && !$mentor['student_id_front'] && !$mentor['student_id_back'] && !$mentor['cv'])
              <span class="doc-no-img"><x-heroicon name="document" class="h-icon h-icon--sm" />No documents uploaded</span>
              @endif
            </div>
          </div>
        </div>
        <div class="appr-actions">
          <form method="POST" action="{{ route('admin_mentor.approve', $mentor['id']) }}">@csrf
            <button type="submit" class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />Approve</button>
          </form>
          <form method="POST" action="{{ route('admin_mentor.reject', $mentor['id']) }}" onsubmit="event.preventDefault(); customConfirm('Are you sure you want to reject these documents?', this)">@csrf
            <button type="submit" class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />Reject</button>
          </form>
        </div>
      </div>
      @empty
      <div style="text-align:center;padding:30px;color:var(--text3);background:var(--surface);border:1px solid var(--border);border-radius:10px">
        No pending document verifications ✓
      </div>
      @endforelse
    </div>

    {{-- Banned Mentors --}}
    <div class="tab-panel" id="tp-banned-mentors">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $bannedMentorsCount ?? 0 }} banned mentor accounts</span>
      </div>
      @forelse($bannedMentors ?? [] as $mentor)
      <div class="ban-card">
        <div class="ban-av">
          @if($mentor['avatar'])
            <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}">
          @else
            {{ strtoupper(substr($mentor['name'], 0, 1)) }}{{ strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}
          @endif
        </div>
        <div style="flex:1">
          <div class="ban-uid">User ID: {{ $mentor['uid'] }}</div>
          <div class="ban-name">{{ $mentor['name'] }}</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> Banned Date: {{ $mentor['banned_date'] }}</div>
          <div class="ban-reason">{{ $mentor['reason'] }}</div>
        </div>
        <form method="POST" action="{{ route('admin_user.unban', $mentor['id']) }}">@csrf
          <button type="submit" class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />Unban</button>
        </form>
      </div>
      @empty
      <div style="text-align:center;padding:30px;color:var(--text3);background:var(--surface);border:1px solid var(--border);border-radius:10px">
        No banned mentors ✓
      </div>
      @endforelse
    </div>

    {{-- Active Mentors --}}
    <div class="tab-panel" id="tp-active-mentors">
      <div class="card">
        <div class="card-head"><h3>Active Right Now</h3></div>
        <div class="tbl">
          <table>
            <thead><tr><th>ID</th><th>Name</th><th>Institution</th><th>Department</th><th>Today's Sessions</th><th>Status</th></tr></thead>
            <tbody>
              @forelse($onlineMentors ?? [] as $mentor)
              <tr>
                <td class="td-mono">{{ $mentor['id'] }}</td>
                <td>
                  <div class="td-with-av">
                    <span class="t-av">
                      @if($mentor['avatar'])
                        <img src="{{ media_url($mentor['avatar']) }}" alt="{{ $mentor['name'] }}" onerror="this.style.display='none'; this.parentNode.innerText='{{ strtoupper(substr($mentor['name'], 0, 1)) }}'">
                      @else
                        {{ strtoupper(substr($mentor['name'], 0, 1)) }}
                      @endif
                    </span>
                    {{ $mentor['name'] }}
                  </div>
                </td>
                <td>{{ $mentor['institution'] ?? '-' }}</td>
                <td>{{ $mentor['dept'] }}</td>
                <td>{{ $mentor['sessions_today'] }}</td>
                <td><span class="badge b-ongoing">Online</span></td>
              </tr>
              @empty
              <tr><td colspan="6" style="text-align:center;padding:20px;color:var(--text3)">No mentors online right now</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: TOPICS (static UI preserved)
  ═══════════════════════════════════ --}}
  <div class="page" id="p-topics">
    <div class="pg-hd">
      <h2>Topics & Categories</h2>
    </div>
    
    <div class="card">
      <div class="card-head">
        <h3>Platform Topics</h3>
      </div>
      <div class="tbl">
        <table>
          <thead>
            <tr>
              <th style="width:60px">#</th>
              <th>Topic Name</th>
              <th>Associated Mentors</th>
              <th>Total Session Bookings</th>
              <th>Status</th>
              <th style="width:180px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($topicsList ?? [] as $index => $topic)
            <tr>
              <td class="td-mono">{{ $index + 1 }}</td>
              <td style="font-weight: 600">{{ $topic['name'] }}</td>
              <td>{{ $topic['mentor_count'] }} mentors</td>
              <td>{{ $topic['session_count'] }} sessions</td>
              <td>
                @if($topic['mentor_count'] > 0)
                  <span class="badge b-verified">Active</span>
                @else
                  <span class="badge b-pending">Unused</span>
                @endif
              </td>
              <td>
                <div class="row-acts">
                  <button type="button" class="btn btn-ghost btn-sm" onclick="openEditTopic('{{ addslashes($topic['name']) }}')">
                    <x-heroicon name="pencil-square" class="h-icon h-icon--sm" />Edit
                  </button>
                  <form method="POST" action="{{ route('admin_topics.delete') }}" style="display:inline" onsubmit="event.preventDefault(); customConfirm('Are you sure you want to delete this topic?', this)">
                    @csrf
                    <input type="hidden" name="name" value="{{ $topic['name'] }}" />
                    <button type="submit" class="btn btn-danger btn-sm">
                      <x-heroicon name="trash" class="h-icon h-icon--sm" />Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" style="text-align:center;padding:30px;color:var(--text3)">No topics found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Total {{ count($topicsList ?? []) }} unique topics</span>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: SESSIONS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-sessions">
    <div class="pg-hd"><h2>Session Monitoring</h2></div>

    <div class="sgrid g3">
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0"><span class="live-dot"></span>Active Right Now</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="video-camera" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val" style="color:var(--red)">{{ $stats['liveSessions'] ?? 0 }}</div>
      </div>
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0">Total Sessions</div><span class="stat-icon"><x-heroicon name="clipboard-document-list" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val">{{ number_format($stats['totalSessions'] ?? 0) }}</div>
      </div>
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0">Cancelled</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="no-symbol" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val" style="color:var(--amber)">{{ $stats['cancelledSessions'] ?? 0 }}</div>
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>All Sessions</h3>
      </div>
      <div class="tbl">
        <table>
          <thead><tr><th>Session ID</th><th>Teacher/Mentor</th><th>Student</th><th>Topic</th><th>Date & Time</th><th>Duration</th><th>Amount</th><th>Status</th></tr></thead>
          <tbody>
            @forelse($sessions ?? [] as $session)
            <tr>
              <td class="td-mono">{{ $session['id'] }}</td>
              <td>{{ $session['teacher'] }}</td>
              <td>{{ $session['student'] }}</td>
              <td>{{ $session['topic'] }}</td>
              <td>{{ $session['datetime'] }}</td>
              <td>{{ $session['duration'] }}</td>
              <td class="{{ $session['status'] === 'Cancelled' ? 'td-neg' : 'td-pos' }}">{{ $session['amount'] }}</td>
              <td>
                @if($session['raw_status'] === 'approved' || $session['raw_status'] === 'ongoing')
                  <div class="dropdown dropdown-bottom">
                    <div tabindex="0" role="button" class="badge {{ $session['raw_status'] === 'approved' ? 'b-verified' : 'b-ongoing' }} cursor-pointer hover:opacity-80">{{ $session['status'] }} ▾</div>
                    <ul tabindex="0" class="dropdown-content menu bg-[var(--surface)] text-[var(--text)] rounded-box z-50 w-44 p-2 shadow-lg border border-[var(--border)] mt-1">
                      <li>
                        <form method="POST" action="{{ route('admin_session.end', $session['db_id']) }}" style="margin:0;padding:0;width:100%" onsubmit="event.preventDefault(); customConfirm('Are you sure you want to end/cancel this session?', this)">
                          @csrf
                          <button type="submit" style="width:100%;text-align:left;color:var(--red);background:none;border:none;cursor:pointer;padding:8px 12px;font-size:12px;font-weight:500" class="hover:bg-[var(--surface2)] rounded-md">
                            End session / cancel
                          </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                @elseif($session['raw_status'] === 'ended_by_admin')
                  <span class="badge b-cancelled" style="background-color: var(--red-bg); color: var(--red)">End by Admin</span>
                @elseif($session['raw_status'] === 'completed')
                  <span class="badge" style="background-color: var(--mc-badge-blue-bg); color: var(--mc-badge-blue-text); border: 1px solid var(--mc-badge-blue-border);">Completed</span>
                @elseif($session['raw_status'] === 'rejected')
                  <span class="badge b-cancelled">Cancelled</span>
                @else
                  <span class="badge b-pending">Pending</span>
                @endif
              </td>
            </tr>
            @empty
            <tr><td colspan="8" style="text-align:center;padding:20px;color:var(--text3)">No sessions found</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Total {{ number_format($stats['totalSessions'] ?? 0) }} sessions</span>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: PAYMENTS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-payments">
    <div class="pg-hd"><h2>Payment Management</h2></div>

    <div class="sgrid g5">
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">Total Transactions</div><span class="stat-icon"><x-heroicon name="arrows-up-down" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px">{{ $payments['total'] ?? '৳0' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">Platform Profit</div><span class="stat-icon" style="background:var(--green-bg);color:var(--green)"><x-heroicon name="currency-bangladeshi" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--green)">{{ $payments['profit'] ?? '৳0' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">Pending Payments</div><span class="stat-icon" style="background:var(--amber-bg);color:var(--amber)"><x-heroicon name="calendar-days" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--amber)">{{ $payments['pending'] ?? '৳0' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">Refunds Issued</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="arrow-path" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--red)">{{ $payments['refunds'] ?? '৳0' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">Mentor Payouts</div><span class="stat-icon"><x-heroicon name="user-group" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px">{{ $payments['payouts'] ?? '৳0' }}</div></div>
    </div>

    <div class="card">
      <div class="card-head"><h3>All Transactions</h3></div>
      <div class="tbl">
        <table>
          <thead><tr><th>Transaction ID</th><th>Type</th><th>Method</th><th>Amount</th><th>Date</th><th>Time</th><th>Note</th></tr></thead>
          <tbody>
            @forelse($transactions ?? [] as $txn)
            <tr>
              <td class="td-mono">{{ $txn['id'] }}</td>
              <td><button class="btn btn-ghost btn-sm" onclick="openTxn('{{ $txn['id'] }}','{{ $txn['type'] }}','{{ addslashes($txn['detail']) }}')">{{ $txn['type'] }} <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td>
              <td><span class="badge" style="background-color: var(--accent-bg); color: var(--accent-txt)">{{ $txn['method'] }}</span></td>
              <td class="{{ str_starts_with($txn['amount'], '+') ? 'td-pos' : 'td-neg' }}">{{ $txn['amount'] }}</td>
              <td>{{ $txn['date'] }}</td>
              <td>{{ $txn['time'] }}</td>
              <td style="font-size:12px;color:var(--text3)">{{ $txn['note'] }}</td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:20px;color:var(--text3)">No transactions found</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Total {{ number_format($stats['totalTransactions'] ?? 0) }} transactions</span>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: SETTINGS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-settings">
    <div class="pg-hd"><h2>Settings</h2></div>
    <div class="sgrid g2">
      <div class="card">
        <div class="card-head"><h3>Admin Account</h3></div>
        <div style="padding:18px;display:flex;flex-direction:column;gap:13px">
          <div class="fg"><label>Full Name</label><input type="text" class="fc" value="{{ auth()->user()?->name ?? '' }}" readonly /></div>
          <div class="fg"><label>Email</label><input type="email" class="fc" value="{{ auth()->user()?->email ?? '' }}" readonly /></div>
          <div class="fg" style="margin:0"><label>Role</label><input type="text" class="fc" value="{{ auth()->user()?->isSuperAdmin() ? 'Super Admin' : 'Admin' }}" readonly /></div>
        </div>
      </div>

      {{-- Admin Management - only for super admin --}}
      @if(auth()->user()?->isSuperAdmin())
      <div class="card">
        <div class="card-head"><h3>Add Admin</h3></div>
        <div style="padding:18px">
          <form method="POST" action="{{ route('admin_admin.add') }}">
            @csrf
            <input type="hidden" name="role_type" id="add-admin-role-type" value="admin" />
            <div class="fg"><label>Full Name</label><input type="text" class="fc" name="name" required placeholder="Admin Name" /></div>
            <div class="fg"><label>Email</label><input type="email" class="fc" name="email" required placeholder="admin@example.com" /></div>
            <div class="fg"><label>Password</label><input type="password" class="fc" name="password" required placeholder="••••••••" /></div>
            <div class="fg" style="margin-bottom:14px"><label>Confirm Password</label><input type="password" class="fc" name="password_confirmation" required placeholder="••••••••" /></div>
            <div style="display:flex;gap:10px;flex-wrap:wrap">
              <button type="submit" onclick="document.getElementById('add-admin-role-type').value='admin'" class="btn btn-primary">
                <x-heroicon name="user-plus" class="h-icon h-icon--sm" />Add New Admin
              </button>
              <button type="submit" onclick="document.getElementById('add-admin-role-type').value='super_admin'" class="btn btn-warning" style="background:var(--amber);color:#000;border:none">
                <x-heroicon name="shield-check" class="h-icon h-icon--sm" />Add New Super Admin
              </button>
            </div>
          </form>
        </div>
      </div>

      {{-- Existing Admins list --}}
      <div class="card" style="grid-column:span 2">
        <div class="card-head"><h3>All Admins</h3></div>
        <div class="tbl">
          <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Joined Date</th><th>Role</th><th>Action</th></tr></thead>
            <tbody>
              @forelse($adminsList ?? [] as $admin)
              <tr>
                <td class="td-mono">#{{ $admin['id'] }}</td>
                <td>{{ $admin['name'] }}</td>
                <td>{{ $admin['email'] }}</td>
                <td>{{ $admin['created_at'] }}</td>
                <td><span class="badge {{ $admin['is_super_admin'] ? 'b-active' : 'b-offline' }}">{{ $admin['is_super_admin'] ? 'Super Admin' : 'Admin' }}</span></td>
                <td>
                  @php
                    $isTargetSuper = $admin['is_super_admin'];
                    $isSelf = $admin['id'] === auth()->id();
                    $canRemoveTarget = false;
                    $removeConfirmMsg = 'Are you sure you want to remove this admin?';
                    $buttonLabel = 'Remove';
                    
                    if (auth()->user()?->isSuperAdmin()) {
                        if (!$isTargetSuper) {
                            $canRemoveTarget = true;
                            $removeConfirmMsg = "Are you sure you want to remove {$admin['name']}'s admin account?";
                        } elseif ($isTargetSuper) {
                            if (($superAdminCount ?? 1) > 1) {
                                $canRemoveTarget = true;
                                if ($isSelf) {
                                    $buttonLabel = 'Leave Super Admin Access';
                                    $removeConfirmMsg = "Are you sure you want to remove your own Super Admin access? You will be logged out.";
                                } else {
                                    $removeConfirmMsg = "Are you sure you want to remove Super Admin access for {$admin['name']}?";
                                }
                            }
                        }
                    }
                  @endphp

                  @if($canRemoveTarget)
                  <form method="POST" action="{{ route('admin_admin.remove', $admin['id']) }}" onsubmit="event.preventDefault(); customConfirm('{{ addslashes($removeConfirmMsg) }}', this)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                      <x-heroicon name="trash" class="h-icon h-icon--sm" />{{ $buttonLabel }}
                    </button>
                  </form>
                  @elseif($isTargetSuper && ($superAdminCount ?? 1) <= 1)
                  <span class="badge b-pending" title="Cannot remove the only Super Admin" style="font-size:11px">Sole Super Admin</span>
                  @else
                  <span style="font-size:11px;color:var(--text3)">-</span>
                  @endif
                </td>
              </tr>
              @empty
              <tr><td colspan="6" style="text-align:center;padding:20px;color:var(--text3)">No admins found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      @else
      <div class="card">
        <div class="card-head"><h3>Platform Settings</h3></div>
        <div style="padding:18px;color:var(--text3);font-size:13px">Only super admins can change these settings.</div>
      </div>
      @endif
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: SECURITY EVENTS (Audio Detection)
  ═══════════════════════════════════ --}}
  <div class="page @if(($adminInitialSection ?? '') === 'security') active @endif" id="p-security">
    <div class="pg-hd">
      <div>
        <h2>Security Events</h2>
        <div class="pg-hd-sub">Audio Detection — Contact Info Sharing Detection</div>
      </div>
    </div>

    {{-- Stats --}}
    <div class="sgrid g3" style="margin-bottom:20px">
      <div class="stat-card">
        <div class="stat-head">
          <div class="s-label" style="margin-bottom:0">Total Events</div>
          <span class="stat-icon" style="background:var(--red-bg);color:var(--red)">
            <x-heroicon name="shield-exclamation" class="h-icon h-icon--md" />
          </span>
        </div>
        <div class="s-val" style="color:var(--red)">{{ number_format($totalSecurityEvents ?? 0) }}</div>
        <div class="s-sub">Overall Detections</div>
      </div>
      <div class="stat-card">
        <div class="stat-head">
          <div class="s-label" style="margin-bottom:0">Today's Events</div>
          <span class="stat-icon"><x-heroicon name="calendar-days" class="h-icon h-icon--md" /></span>
        </div>
        <div class="s-val">{{ number_format(collect($securityEvents ?? [])->filter(fn($e) => str_starts_with($e['detected_at'], now()->format('d M Y')))->count()) }}</div>
        <div class="s-sub">Detected Today</div>
      </div>
    </div>

    {{-- Table --}}
    <div class="card">
      <div class="card-head">
        <h3>Recent Security Events</h3>
        <span style="font-size:12px;color:var(--text3)">Latest 200 events · Audio detection</span>
      </div>
      <div class="tbl">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Time</th>
              <th>Session Code</th>
              <th>User</th>
              <th>Role</th>
              <th>Detection Type</th>
              <th>Source</th>
            </tr>
          </thead>
          <tbody>
            @forelse($securityEvents ?? [] as $event)
            <tr>
              <td class="td-mono">#{{ $event['id'] }}</td>
              <td style="font-size:12px;white-space:nowrap">{{ $event['detected_at'] }}</td>
              <td class="td-mono">{{ $event['session_code'] }}</td>
              <td>
                <div class="td-with-av">
                  <span class="t-av">{{ strtoupper(substr($event['user_name'], 0, 1)) }}</span>
                  {{ $event['user_name'] }}
                </div>
              </td>
              <td>
                <span class="badge {{ $event['participant_role'] === 'mentor' ? 'b-active' : 'b-offline' }}">
                  {{ $event['participant_role'] === 'mentor' ? 'Mentor' : ($event['participant_role'] === 'student' ? 'Student' : $event['participant_role']) }}
                </span>
              </td>
              <td>
                @php
                  $dtLabels = [
                    'phone_number'         => ['label' => 'Phone Number',     'class' => 'b-banned'],
                    'phone_number_context' => ['label' => 'Phone Context',    'class' => 'b-pending'],
                    'email_address'        => ['label' => 'Email Address',    'class' => 'b-banned'],
                    'email_context'        => ['label' => 'Email Context',    'class' => 'b-pending'],
                    'whatsapp'             => ['label' => 'WhatsApp',         'class' => 'b-cancelled'],
                    'telegram'             => ['label' => 'Telegram',         'class' => 'b-cancelled'],
                  ];
                  $dt = $dtLabels[$event['detection_type']] ?? ['label' => $event['detection_type'], 'class' => 'b-offline'];
                @endphp
                <span class="badge {{ $dt['class'] }}">{{ $dt['label'] }}</span>
              </td>
              <td><span class="badge b-offline">{{ $event['source'] }}</span></td>
            </tr>
            @empty
            <tr>
              <td colspan="7" style="text-align:center;padding:30px;color:var(--text3)">
                No security events ✓
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">
          Showing {{ count($securityEvents ?? []) }} events · Audio-based contact info detection
        </span>
      </div>
    </div>

    {{-- Info box --}}
    <div class="info-tip" style="margin-top:16px">
      <x-heroicon name="information-circle" class="h-icon h-icon--md" />
      This panel displays contact information detected during live calls using rule-based audio analysis. Full transcripts or phone numbers are not stored.
    </div>
  </div>

</div>

{{-- ═══════════════ MODALS ═══════════════ --}}

{{-- Ban Modal --}}
<div class="modal-ov" id="m-ban">
  <div class="mc-modal">
    <div class="modal-hd">
      <x-heroicon name="no-symbol" class="h-icon" style="width:18px;height:18px;color:var(--red)" />
      <h3>Ban Account</h3>
      <button type="button" style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-ban')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <form method="POST" id="ban-form" action="" style="margin:0">
      @csrf
      <div class="modal-bd">
        <p style="font-size:13px;color:var(--text2);margin-bottom:14px;line-height:1.6"><strong id="ban-name"></strong> (<span id="ban-uid" style="font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3)"></span>) will immediately lose access to the platform upon being banned.</p>
        <div class="fg">
          <label>Ban Reason</label>
          <select class="fc" id="ban-reason-preset" onchange="updateBanReason()">
            <option value="">Select a reason…</option>
            <option value="Attempting off-platform contact">Attempting off-platform contact</option>
            <option value="Abusive or offensive language">Abusive or offensive language</option>
            <option value="Violation of Terms & Policies">Violation of Terms & Policies</option>
            <option value="Fraudulent activity">Fraudulent activity</option>
            <option value="False information or credentials">False information or credentials</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="fg" style="margin:0">
          <label>Additional Note / Details (Optional)</label>
          <textarea class="fc" id="ban-reason-custom" oninput="updateBanReason()" placeholder="Additional context, proof reference, etc…"></textarea>
          <input type="hidden" name="reason" id="ban-reason-hidden" value="Policy violation" />
        </div>
      </div>
      <div class="modal-ft">
        <button type="button" class="btn btn-ghost" onclick="closeModal('m-ban')">Cancel</button>
        <button type="submit" class="btn btn-danger"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />Confirm Ban</button>
      </div>
    </form>
  </div>
</div>

{{-- Transaction Detail Modal --}}
<div class="modal-ov" id="m-txn">
  <div class="mc-modal">
    <div class="modal-hd">
      <x-heroicon name="clipboard-document-list" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3>Transaction Details</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-txn')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <div style="font-size:11px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3);margin-bottom:5px" id="txn-id"></div>
      <div style="font-size:14px;font-weight:600;margin-bottom:12px" id="txn-type"></div>
      <div style="font-size:13px;color:var(--text2);line-height:1.9;background:var(--bg);padding:12px 14px;border-radius:8px;border:1px solid var(--border);white-space:pre-line" id="txn-detail"></div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-ghost" onclick="closeModal('m-txn')">Close</button>
    </div>
  </div>
</div>

{{-- Document Viewer Modal --}}
<div class="modal-ov" id="m-doc-viewer">
  <div class="mc-modal" style="max-width:700px">
    <div class="modal-hd">
      <x-heroicon name="document-text" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3 id="doc-viewer-title">View Document</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-doc-viewer')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd" style="padding:12px;text-align:center">
      <img id="doc-viewer-img" src="" alt="Document" style="max-width:100%;max-height:70vh;border-radius:8px;border:1px solid var(--border)">
    </div>
    <div class="modal-ft">
      <a id="doc-viewer-link" href="" target="_blank" class="btn btn-ghost"><x-heroicon name="arrow-top-right-on-square" class="h-icon h-icon--sm" />Open in new tab</a>
      <button class="btn btn-ghost" onclick="closeModal('m-doc-viewer')">Close</button>
    </div>
  </div>
</div>

{{-- Edit Topic Modal --}}
<div class="modal-ov" id="m-edit-topic">
  <div class="mc-modal">
    <div class="modal-hd">
      <x-heroicon name="pencil-square" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3>Edit Topic</h3>
      <button type="button" style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-edit-topic')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <form method="POST" action="{{ route('admin_topics.edit') }}" style="margin:0">
      @csrf
      <div class="modal-bd">
        <input type="hidden" name="old_name" id="edit-topic-old-name" />
        <div class="fg" style="margin:0">
          <label>New Topic Name</label>
          <input type="text" class="fc" name="new_name" id="edit-topic-new-name" required placeholder="Enter new name…" />
        </div>
      </div>
      <div class="modal-ft">
        <button type="button" class="btn btn-ghost" onclick="closeModal('m-edit-topic')">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

{{-- Generic Confirm Modal --}}
<div class="modal-ov" id="m-confirm">
  <div class="mc-modal">
    <div class="modal-hd">
      <x-heroicon name="exclamation-triangle" class="h-icon" style="width:18px;height:18px;color:var(--primary)" />
      <h3>Confirm</h3>
      <button type="button" style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-confirm')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <p id="m-confirm-msg" style="font-size:14px;color:var(--text2);margin:0;padding-bottom:10px;"></p>
    </div>
    <div class="modal-ft">
      <button type="button" class="btn btn-ghost" onclick="closeModal('m-confirm')">Cancel</button>
      <button type="button" class="btn btn-primary" id="m-confirm-btn">Yes, Confirm</button>
    </div>
  </div>
</div>

<script>
/* ── helpers ── */
const qs = s => document.querySelector(s);
const later = fn => setTimeout(fn, 60);

/* ── navigation ── */
const titles = {dashboard:'Dashboard',users:'Student Management',mentors:'Mentor Management',topics:'Topics & Categories',sessions:'Session Monitoring',payments:'Payment Management',security:'Security Events',settings:'Settings'};
function nav(id, el){
  document.body.classList.remove('sidebar-open');
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('p-'+id).classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  if(el) el.classList.add('active');
  document.getElementById('pg-title').textContent = titles[id] || id;
  try { localStorage.setItem('mc-admin-section', id); } catch(e){}
  
  // Activate saved tab for this section
  try {
    const savedTab = localStorage.getItem('mc-admin-tab-' + id);
    if (savedTab) {
      switchTab(id, savedTab);
    }
  } catch(e){}
}

/* ── tabs ── */
function switchTab(section, tabId, btn){
  document.querySelectorAll('#p-'+section+' .tab-panel').forEach(p => p.classList.remove('active'));
  const target = document.getElementById('tp-'+tabId);
  if(target) target.classList.add('active');
  document.querySelectorAll('#tbar-'+section+' .tab').forEach(t => t.classList.remove('active'));
  if(btn){
    btn.classList.add('active');
  } else {
    document.querySelectorAll('#tbar-'+section+' .tab').forEach(t => {
      const oc = t.getAttribute('onclick') || '';
      if(oc.includes("'"+tabId+"'") || oc.includes('"'+tabId+'"')) t.classList.add('active');
    });
  }
  try { localStorage.setItem('mc-admin-tab-' + section, tabId); } catch(e){}
}

/* ── modals ── */
function openModal(id){ document.getElementById(id).classList.add('open') }
function closeModal(id){ document.getElementById(id).classList.remove('open') }
document.querySelectorAll('.modal-ov').forEach(o => o.addEventListener('click', function(e){ if(e.target===this) this.classList.remove('open') }));

function customConfirm(msg, formEl) {
  document.getElementById('m-confirm-msg').innerText = msg;
  document.getElementById('m-confirm-btn').onclick = function() {
    formEl.submit();
  };
  openModal('m-confirm');
}

/* ── ban ── */
function openBan(name, uid, actionUrl){
  document.getElementById('ban-name').textContent = name;
  document.getElementById('ban-uid').textContent = uid;
  document.getElementById('ban-form').action = actionUrl;
  document.getElementById('ban-reason-preset').value = '';
  document.getElementById('ban-reason-custom').value = '';
  document.getElementById('ban-reason-hidden').value = 'Policy violation';
  openModal('m-ban');
}
function updateBanReason(){
  const preset = document.getElementById('ban-reason-preset').value;
  const custom = document.getElementById('ban-reason-custom').value;
  let finalReason = preset;
  if(custom.trim()){
    if(finalReason) finalReason += ' - ' + custom.trim();
    else finalReason = custom.trim();
  }
  if(!finalReason) finalReason = 'Policy violation';
  document.getElementById('ban-reason-hidden').value = finalReason;
}

/* ── transaction detail ── */
function openTxn(id, type, detail){
  document.getElementById('txn-id').textContent = id;
  document.getElementById('txn-type').textContent = type;
  document.getElementById('txn-detail').textContent = detail;
  openModal('m-txn');
}

/* ── document viewer ── */
function openDocViewer(src, title){
  document.getElementById('doc-viewer-title').textContent = title;
  document.getElementById('doc-viewer-img').src = src;
  document.getElementById('doc-viewer-link').href = src;
  openModal('m-doc-viewer');
}

/* ── edit topic ── */
function openEditTopic(name){
  document.getElementById('edit-topic-old-name').value = name;
  document.getElementById('edit-topic-new-name').value = name;
  openModal('m-edit-topic');
}

/* ── dark mode ── */
function syncThemeIcons(){
  var d = document.documentElement.classList.contains('dark');
  var m = document.getElementById('theme-icon-moon');
  var u = document.getElementById('theme-icon-sun');
  if(m) m.style.display = d ? 'none' : '';
  if(u) u.style.display = d ? '' : 'none';
}
function toggleTheme(){
  document.documentElement.classList.toggle('dark');
  try { localStorage.setItem('mc-admin-dark', document.documentElement.classList.contains('dark') ? '1' : ''); } catch(e) {}
  syncThemeIcons();
}
(function(){
  try { if(localStorage.getItem('mc-admin-dark')) document.documentElement.classList.add('dark'); } catch(e) {}
  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', syncThemeIcons);
  else syncThemeIcons();
})();

/* ── deep-link: /admin/dashboard/sessions, /users, etc. ── */
(function(){
  var phpSection = @json(session('active_section') ?? $adminInitialSection ?? 'dashboard');
  function go(){
    let section = phpSection;
    
    // Always navigate to the resolved section
    var items = document.querySelectorAll('#sidebar a.nav-item');
    let matchedEl = null;
    for(var i = 0; i < items.length; i++){
      var a = items[i];
      var oc = a.getAttribute('onclick') || '';
      var m = oc.match(/nav\(\s*'([^']+)'/);
      if(m && m[1] === section){ matchedEl = a; break; }
    }
    nav(section, matchedEl);
  }
  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', go);
  else go();
})();

/* ── live search ── */
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initLiveSearch);
} else {
  initLiveSearch();
}

function initLiveSearch() {
  const searchInput = document.querySelector('.searchbar input');
  if (!searchInput) return;

  searchInput.addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase().trim();
    const activePage = document.querySelector('.page.active');
    if (!activePage) return;

    // Search target is either the active tab-panel or the page itself
    const activePanel = activePage.querySelector('.tab-panel.active');
    const container = activePanel || activePage;

    // Filter table rows
    const rows = container.querySelectorAll('tbody tr');
    rows.forEach(row => {
      // Check if it's an empty state row (colspan)
      if (row.cells.length === 1 && row.cells[0].getAttribute('colspan')) return;

      const text = row.textContent.toLowerCase();
      if (text.includes(query)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });

    // Filter list/approval cards
    const cards = container.querySelectorAll('.appr-card, .ban-card');
    cards.forEach(card => {
      const text = card.textContent.toLowerCase();
      if (text.includes(query)) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
}

/* ── toast feedback ── */
function showToast(message) {
  let toast = document.getElementById('mc-toast');
  if(!toast) {
    toast = document.createElement('div');
    toast.id = 'mc-toast';
    toast.style.cssText = `
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: var(--surface);
      color: var(--text);
      padding: 12px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      border: 1px solid var(--border);
      z-index: 10000;
      font-size: 13px;
      font-weight: 500;
      transition: opacity 0.3s, transform 0.3s;
      transform: translateY(20px);
      opacity: 0;
    `;
    document.body.appendChild(toast);
  }
  toast.textContent = message;
  toast.style.transform = 'translateY(0)';
  toast.style.opacity = '1';
  setTimeout(() => {
    toast.style.transform = 'translateY(20px)';
    toast.style.opacity = '0';
  }, 3000);
}

// Bind notification bell
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    const bellBtn = document.querySelector('.tb-btn[title="Notifications"]');
    if (bellBtn) {
      bellBtn.addEventListener('click', () => {
        showToast('No new notifications.');
      });
    }
  });
} else {
  const bellBtn = document.querySelector('.tb-btn[title="Notifications"]');
  if (bellBtn) {
    bellBtn.addEventListener('click', () => {
      showToast('No new notifications.');
    });
  }
}

/* ── auto-dismiss flash messages ── */
setTimeout(function(){
  document.querySelectorAll('.flash-success,.flash-error').forEach(function(el){
    el.style.transition='opacity .5s';
    el.style.opacity='0';
    setTimeout(function(){ el.remove(); }, 500);
  });
}, 4000);
</script>
</body>
</html>
