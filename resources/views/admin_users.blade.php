<x-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Sora', sans-serif;
        }

        .font-mono-custom {
            font-family: 'DM Mono', monospace;
        }

        .stat-bar {
            position: relative;
            overflow: hidden;
        }

        .stat-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 1rem 1rem 0 0;
        }

        .bar-teal::before {
            background: linear-gradient(90deg, #1A9998, #187F87);
        }

        .bar-blue::before {
            background: linear-gradient(90deg, #0ea5e9, #6366f1);
        }

        .bar-green::before {
            background: linear-gradient(90deg, #10b981, #0ea5e9);
        }

        .bar-red::before {
            background: linear-gradient(90deg, #ef4444, #f97316);
        }
    </style>

    <div class="drawer lg:drawer-open">
        <input id="sidebar-drawer" type="checkbox" class="drawer-toggle" />

        {{-- ══════════════ PAGE CONTENT ══════════════ --}}
        <div class="drawer-content flex flex-col min-h-screen bg-[#f0fafa]">

            {{-- NAVBAR --}}
            <header class="navbar bg-white border-b sticky top-0 z-30 px-4 lg:px-6 shadow-sm"
                style="border-color:rgba(26,153,152,0.15);">
                <div class="navbar-start gap-2">
                    <label for="sidebar-drawer" class="btn btn-ghost btn-sm btn-square lg:hidden drawer-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                    <div>
                        <p class="font-bold text-base leading-tight" style="color:#0d3d3d;">Users</p>
                        <p class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">Saturday, 28 March 2026
                        </p>
                    </div>
                </div>
                <div class="navbar-end gap-3">
                    <button class="btn btn-ghost btn-sm btn-circle">
                        <div class="indicator">
                            <span class="indicator-item badge badge-xs border-0" style="background:#1A9998;"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8" style="color:#4a7070;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </button>
                    <div class="avatar placeholder">
                        <div class="w-9 rounded-full font-bold text-sm grid place-items-center text-white"
                            style="background: linear-gradient(135deg, #1A9998, #155665);">A</div>
                    </div>
                </div>
            </header>

            {{-- MAIN --}}
            <main class="flex-1 p-4 lg:p-6 flex flex-col gap-6">

                {{-- STATS --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-teal"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Total Users</div>
                            <span>👥</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#1A9998;">13,195</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm text-white border-0"
                                style="background:#10b981;">↑ +8% this month</span></div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-blue"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Students</div>
                            <span>🎒</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#187F87;">12,847</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm"
                                style="background:rgba(26,153,152,0.1); color:#155665; border:1px solid rgba(26,153,152,0.2);">Enrolled
                                learners</span></div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-green"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Teachers</div>
                            <span>🎓</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#155665;">348</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm badge-outline"
                                style="color:#155665; border-color:rgba(21,86,101,0.3);">Active mentors</span></div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-red"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Banned</div>
                            <span>🚫</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-error">12</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm badge-error badge-outline">Suspended
                                accounts</span></div>
                    </div>
                </div>

                {{-- TOOLBAR --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="join rounded-xl overflow-hidden" style="border:1px solid rgba(26,153,152,0.2);">
                        <button class="btn btn-sm join-item border-0 text-white" id="filter-all"
                            style="background:#1A9998;" onclick="filterUsers('all')">All</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-student"
                            onclick="filterUsers('student')">Students</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-teacher"
                            onclick="filterUsers('teacher')">Teachers</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-banned"
                            onclick="filterUsers('banned')">Banned</button>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label class="input input-sm input-bordered flex items-center gap-2 flex-1 sm:w-64"
                            style="background:white; border-color:rgba(26,153,152,0.25);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8" style="color:rgba(21,86,101,0.4);">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Search users…"
                                class="grow bg-transparent outline-none text-sm" style="color:#2d6e6e;" />
                        </label>
                        <button class="btn btn-sm gap-1.5 text-white border-0"
                            style="background: linear-gradient(135deg, #1A9998, #155665);"
                            onclick="document.getElementById('invite-modal').showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Invite User
                        </button>
                    </div>
                </div>

                {{-- TEACHER CARDS --}}
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-3" style="color:rgba(21,86,101,0.5);">
                        Featured Teachers</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                        @foreach([
                        ['A','Dr. Ahmed R.','Python · Data Science','4.9','142','from-[#1A9998] to-[#155665]'],
                        ['S','Sara K.','UI/UX · Figma · CSS','4.8','98','from-[#187F87] to-[#1A9998]'],
                        ['N','Prof. Nabil M.','ML · AI · Statistics','5.0','210','from-[#155665] to-[#187F87]'],
                        ['L','Lena T.','React · Node · TypeScript','4.7','176','from-[#102E3C] to-[#155665]'],
                        ] as $t)
                        <div class="bg-white rounded-2xl shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md"
                            style="border:1px solid rgba(26,153,152,0.15);">
                            <div class="p-5 flex flex-col items-center text-center gap-2">
                                <div class="avatar placeholder mb-1">
                                    <div
                                        class="w-14 rounded-full font-bold text-xl grid place-items-center text-white bg-gradient-to-br {{ $t[5] }}">
                                        {{ $t[0] }}
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold text-sm" style="color:#0d3d3d;">{{ $t[1] }}</p>
                                    <p class="text-xs mt-0.5" style="color:rgba(21,86,101,0.5);">{{ $t[2] }}</p>
                                </div>
                                <span class="badge badge-sm badge-outline"
                                    style="color:#1A9998; border-color:rgba(26,153,152,0.35);">Teacher</span>
                                <div class="flex items-center gap-3 text-xs font-mono-custom mt-1"
                                    style="color:rgba(21,86,101,0.5);">
                                    <span>⭐ {{ $t[3] }}</span>
                                    <span>·</span>
                                    <span>{{ $t[4] }} students</span>
                                </div>
                                <div class="flex gap-2 w-full mt-1">
                                    <button class="btn btn-xs btn-ghost flex-1" style="color:#2d6e6e;">Profile</button>
                                    <button class="btn btn-xs flex-1 border-0"
                                        style="background:rgba(26,153,152,0.1); color:#1A9998;">Message</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- USERS TABLE --}}
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col gap-4"
                    style="border:1px solid rgba(26,153,152,0.12);">
                    <h2 class="text-xs font-bold uppercase tracking-widest" style="color:rgba(21,86,101,0.5);">All Users
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-xs uppercase tracking-widest" style="color:rgba(21,86,101,0.45);">
                                    <th>User</th>
                                    <th>Role</th>
                                    <th class="hidden sm:table-cell">Joined</th>
                                    <th class="hidden md:table-cell">Sessions</th>
                                    <th class="hidden lg:table-cell">Last Active</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $users = [
                                ['R','Rafiq Hassan','rafiq@email.com','from-[#1A9998] to-[#155665]','Student','Jan 12,
                                2025','24','2 hrs ago','active'],
                                ['F','Fatima Malik','fatima@email.com','from-[#187F87] to-[#1A9998]','Teacher','Mar 3,
                                2024','87','1 day ago','active'],
                                ['K','Karim Uddin','karim@email.com','from-[#155665] to-[#187F87]','Student','Feb 19,
                                2025','11','3 days ago','active'],
                                ['T','Tariq Hossain','tariq@email.com','','Student','Nov 5, 2024','3','14 days
                                ago','banned'],
                                ['N','Nadia Islam','nadia@email.com','from-[#102E3C] to-[#155665]','Student','Dec 30,
                                2024','38','5 hrs ago','inactive'],
                                ['J','Jabir Chowdhury','jabir@email.com','from-[#1A9998] to-[#187F87]','Teacher','Aug
                                14, 2023','63','Just now','active'],
                                ];
                                @endphp
                                @foreach($users as $u)
                                <tr class="hover {{ $u[8]==='banned' ? 'opacity-60' : '' }}">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div
                                                    class="w-8 rounded-full font-bold text-xs grid place-items-center text-white {{ $u[8]==='banned' ? 'bg-base-300 !text-base-content' : 'bg-gradient-to-br '.$u[3] }}">
                                                    {{ $u[0] }}
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-sm {{ $u[8]==='banned' ? 'line-through' : '' }}"
                                                    style="color:#0d3d3d;">{{ $u[1] }}</p>
                                                <p class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">
                                                    {{ $u[2] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($u[4]==='Teacher')
                                        <span class="badge badge-sm badge-outline"
                                            style="color:#1A9998; border-color:rgba(26,153,152,0.35);">Teacher</span>
                                        @else
                                        <span class="badge badge-sm"
                                            style="background:rgba(21,86,101,0.07); color:#4a7070;">Student</span>
                                        @endif
                                    </td>
                                    <td class="hidden sm:table-cell font-mono-custom text-xs"
                                        style="color:rgba(21,86,101,0.6);">{{ $u[5] }}</td>
                                    <td class="hidden md:table-cell text-xs" style="color:#2d6e6e;">{{ $u[6] }}</td>
                                    <td class="hidden lg:table-cell font-mono-custom text-xs"
                                        style="color:rgba(21,86,101,0.6);">{{ $u[7] }}</td>
                                    <td>
                                        @if($u[8]==='active')
                                        <span class="badge badge-sm badge-success">Active</span>
                                        @elseif($u[8]==='banned')
                                        <span class="badge badge-sm badge-error">Banned</span>
                                        @else
                                        <span class="badge badge-sm badge-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            <button class="btn btn-xs btn-ghost" style="color:#2d6e6e;"
                                                onclick="document.getElementById('view-modal').showModal()">View</button>
                                            @if($u[8]==='banned')
                                            <button class="btn btn-xs btn-ghost text-success">Unban</button>
                                            @else
                                            <button class="btn btn-xs btn-ghost text-error">Ban</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="flex items-center justify-between flex-wrap gap-2 pt-3"
                        style="border-top:1px solid rgba(26,153,152,0.1);">
                        <p class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">Showing 1–6 of 13,195
                            users</p>
                        <div class="join">
                            <button class="btn btn-xs join-item btn-ghost opacity-40" disabled>«</button>
                            <button class="btn btn-xs join-item text-white border-0"
                                style="background:#1A9998;">1</button>
                            <button class="btn btn-xs join-item btn-ghost">2</button>
                            <button class="btn btn-xs join-item btn-ghost">3</button>
                            <button class="btn btn-xs join-item btn-ghost">»</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        {{-- ══════════════ SIDEBAR ══════════════ --}}
        <div class="drawer-side z-40">
            <label for="sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside class="w-60 min-h-full flex flex-col p-4 bg-white"
                style="border-right:1px solid rgba(26,153,152,0.12);">
                <div class="flex items-center gap-3 px-2 py-3 mb-3"
                    style="border-bottom:1px solid rgba(26,153,152,0.12);">
                    <div class="w-9 h-9 rounded-xl grid place-items-center flex-shrink-0"
                        style="background: linear-gradient(135deg, #1A9998, #155665);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-3h8" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-sm leading-tight" style="color:#0d3d3d;">MentorChai</h2>
                        <p class="text-xs" style="color:rgba(21,86,101,0.5);">Admin Panel</p>
                    </div>
                </div>
                <ul class="menu menu-sm flex-1 gap-0.5 px-0">
                    <li class="menu-title text-xs tracking-widest" style="color:rgba(21,86,101,0.4);">Main</li>
                    <li>
                        <a href="{{ route('admin_dashboard') }}" class="font-medium text-sm rounded-xl"
                            style="color:#2d6e6e;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10l9-7 9 7v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2v-9z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_sessions') }}" class="font-medium text-sm rounded-xl"
                            style="color:#2d6e6e;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                            </svg>
                            Sessions
                        </a>
                    </li>
                    <li>
                        <a class="font-medium text-sm rounded-xl text-white"
                            style="background: linear-gradient(135deg, #1A9998, #155665);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-4a4 4 0 11-8 0 4 4 0 018 0zM9 10a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Users
                        </a>
                    </li>
                </ul>
                <a href="{{ route('admin_login') }}" class="btn btn-sm gap-2 mt-4 border-0 text-white"
                    style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </aside>
        </div>
    </div>

    {{-- INVITE USER MODAL --}}
    <dialog id="invite-modal" class="modal">
        <div class="modal-box max-w-md bg-white" style="border:1px solid rgba(26,153,152,0.2);">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 opacity-50">✕</button>
            </form>
            <h3 class="font-bold text-base mb-4" style="color:#0d3d3d;">Invite User</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Full Name</label>
                    <input type="text" placeholder="e.g. John Doe" class="input input-sm input-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Email</label>
                    <input type="email" placeholder="john@example.com" class="input input-sm input-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Role</label>
                    <select class="select select-sm select-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);">
                        <option>Student</option>
                        <option>Teacher</option>
                    </select>
                </div>
            </div>
            <div class="modal-action mt-4">
                <form method="dialog" class="flex gap-2 w-full">
                    <button class="btn btn-sm btn-ghost flex-1">Cancel</button>
                    <button class="btn btn-sm flex-1 text-white border-0"
                        style="background: linear-gradient(135deg, #1A9998, #155665);">Send Invite</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    {{-- VIEW USER MODAL --}}
    <dialog id="view-modal" class="modal">
        <div class="modal-box max-w-sm bg-white" style="border:1px solid rgba(26,153,152,0.2);">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 opacity-50">✕</button>
            </form>
            <div class="flex flex-col items-center gap-3 py-2">
                <div class="avatar placeholder">
                    <div class="w-16 rounded-full font-bold text-2xl grid place-items-center text-white"
                        style="background: linear-gradient(135deg, #1A9998, #155665);">R</div>
                </div>
                <div class="text-center">
                    <p class="font-bold text-base" style="color:#0d3d3d;">Rafiq Hassan</p>
                    <p class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">rafiq@email.com</p>
                </div>
                <span class="badge badge-sm" style="background:rgba(21,86,101,0.07); color:#4a7070;">Student</span>
            </div>
            <div class="divider my-2" style="border-color:rgba(26,153,152,0.1);"></div>
            <div class="grid grid-cols-3 gap-2 text-center mb-4">
                <div class="rounded-xl p-3" style="background:#f7fdfd; border:1px solid rgba(26,153,152,0.12);">
                    <p class="font-bold font-mono-custom text-lg" style="color:#1A9998;">24</p>
                    <p class="text-xs" style="color:rgba(21,86,101,0.5);">Sessions</p>
                </div>
                <div class="rounded-xl p-3" style="background:#f7fdfd; border:1px solid rgba(26,153,152,0.12);">
                    <p class="font-bold font-mono-custom text-lg" style="color:#187F87;">4.6</p>
                    <p class="text-xs" style="color:rgba(21,86,101,0.5);">Avg Score</p>
                </div>
                <div class="rounded-xl p-3" style="background:#f7fdfd; border:1px solid rgba(26,153,152,0.12);">
                    <p class="font-bold font-mono-custom text-lg" style="color:#155665;">68h</p>
                    <p class="text-xs" style="color:rgba(21,86,101,0.5);">Watch Time</p>
                </div>
            </div>
            <div class="modal-action mt-0">
                <form method="dialog" class="flex gap-2 w-full">
                    <button class="btn btn-sm btn-ghost flex-1">Close</button>
                    <button class="btn btn-sm btn-error btn-outline flex-1">Ban User</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <script>
        function filterUsers(type) {
            ['all','student','teacher','banned'].forEach(t => {
                const el = document.getElementById('filter-' + t);
                if (t === type) {
                    el.style.background = '#1A9998';
                    el.className = 'btn btn-sm join-item border-0 text-white';
                } else {
                    el.style.background = '';
                    el.className = 'btn btn-sm join-item btn-ghost border-0';
                }
            });
        }
    </script>

</x-layout>
