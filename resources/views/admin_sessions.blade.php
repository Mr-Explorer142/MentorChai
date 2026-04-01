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

        .live-dot {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 9999px;
            flex-shrink: 0;
            animation: livepulse 1.6s ease-in-out infinite;
        }

        @keyframes livepulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .4;
                transform: scale(.7);
            }
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

        .bar-red::before {
            background: linear-gradient(90deg, #ef4444, #f97316);
        }

        .bar-blue::before {
            background: linear-gradient(90deg, #0ea5e9, #6366f1);
        }

        .bar-green::before {
            background: linear-gradient(90deg, #10b981, #0ea5e9);
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
                        <p class="font-bold text-base leading-tight" style="color:#0d3d3d;">Sessions</p>
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
                                style="color:rgba(21,86,101,0.6);">Total Sessions</div>
                            <span>🎬</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#1A9998;">1,284</div>
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm text-white border-0" style="background:#10b981;">↑ +12% this
                                month</span>
                        </div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-red"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Live Now</div>
                            <span>🔴</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-error">3</div>
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm badge-error badge-outline">In progress</span>
                        </div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-blue"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Recorded</div>
                            <span>📹</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#187F87;">947</div>
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm"
                                style="background:rgba(26,153,152,0.1); color:#155665; border:1px solid rgba(26,153,152,0.2);">Available
                                on-demand</span>
                        </div>
                    </div>
                    <div class="stat bg-white rounded-2xl shadow-sm stat-bar bar-green"
                        style="border:1px solid rgba(26,153,152,0.12);">
                        <div class="flex justify-between items-start">
                            <div class="stat-title text-xs font-semibold uppercase tracking-widest"
                                style="color:rgba(21,86,101,0.6);">Scheduled</div>
                            <span>📅</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1" style="color:#155665;">42</div>
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm badge-outline"
                                style="color:#155665; border-color:rgba(21,86,101,0.3);">Upcoming</span>
                        </div>
                    </div>
                </div>

                {{-- TOOLBAR --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="join rounded-xl overflow-hidden" style="border:1px solid rgba(26,153,152,0.2);">
                        <button class="btn btn-sm join-item border-0 text-white" id="filter-all"
                            style="background:#1A9998;" onclick="filterSessions('all')">All</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-live"
                            onclick="filterSessions('live')">Live</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-recorded"
                            onclick="filterSessions('recorded')">Recorded</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-scheduled"
                            onclick="filterSessions('scheduled')">Scheduled</button>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label class="input input-sm input-bordered flex items-center gap-2 flex-1 sm:w-64"
                            style="background:white; border-color:rgba(26,153,152,0.25);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8" style="color:rgba(21,86,101,0.4);">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Search sessions…"
                                class="grow bg-transparent outline-none text-sm" style="color:#2d6e6e;" />
                        </label>
                        <button class="btn btn-sm gap-1.5 text-white border-0"
                            style="background: linear-gradient(135deg, #1A9998, #155665);"
                            onclick="document.getElementById('create-modal').showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            New Session
                        </button>
                    </div>
                </div>

                {{-- LIVE SESSION CARDS --}}
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-3 flex items-center gap-2"
                        style="color:rgba(21,86,101,0.5);">
                        <span class="live-dot"></span> Live Sessions
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4" id="live-sessions">

                        @foreach([
                        ['Python Bootcamp – Ep. 12','Dr. Ahmed R.','42 min ago','142'],
                        ['UI Design Fundamentals','Sara K.','18 min ago','87'],
                        ['React Masterclass – Hooks','Lena T.','5 min ago','63'],
                        ] as $sess)
                        <div class="bg-white rounded-2xl shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md"
                            data-type="live" style="border:1px solid rgba(26,153,152,0.15);">
                            <div class="p-4 flex flex-col gap-3">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="w-10 h-10 rounded-xl grid place-items-center flex-shrink-0"
                                        style="background:rgba(239,68,68,0.08);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-error" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <span class="badge badge-sm badge-error gap-1 font-bold flex-shrink-0">
                                        <span class="live-dot !w-1.5 !h-1.5"></span> LIVE
                                    </span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm leading-tight" style="color:#0d3d3d;">{{ $sess[0] }}
                                    </h3>
                                    <p class="text-xs mt-0.5 font-mono-custom" style="color:rgba(21,86,101,0.5);">{{
                                        $sess[1] }} · Started {{ $sess[2] }}</p>
                                </div>
                                <div class="flex items-center justify-between pt-2"
                                    style="border-top:1px solid rgba(26,153,152,0.1);">
                                    <span class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">👥 {{
                                        $sess[3] }} watching</span>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-ghost" style="color:#2d6e6e;">View</button>
                                        <button class="btn btn-xs btn-error btn-outline">End</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                {{-- ALL SESSIONS TABLE --}}
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col gap-4"
                    style="border:1px solid rgba(26,153,152,0.12);">
                    <h2 class="text-xs font-bold uppercase tracking-widest" style="color:rgba(21,86,101,0.5);">All
                        Sessions</h2>
                    <div class="overflow-x-auto">
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-xs uppercase tracking-widest" style="color:rgba(21,86,101,0.45);">
                                    <th>Title</th>
                                    <th class="hidden md:table-cell">Instructor</th>
                                    <th>Type</th>
                                    <th class="hidden sm:table-cell">Date</th>
                                    <th class="hidden lg:table-cell">Enrolled</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                ['Python Bootcamp – Ep. 12','Dr. Ahmed R.','LIVE','Today · 4:00 PM','142','running'],
                                ['Web Design Essentials','Sara K.','LIVE','Today · 6:00 PM','98','upcoming'],
                                ['Data Science 101','Prof. Nabil M.','LIVE','Tmrw · 10:00 AM','210','scheduled'],
                                ['JavaScript Advanced','Lena T.','LIVE','Tmrw · 2:00 PM','176','scheduled'],
                                ['Machine Learning Basics','Prof. Nabil M.','REC','Mar 25 · 3:00 PM','534','recorded'],
                                ['Figma for Developers','Sara K.','REC','Mar 22 · 5:00 PM','289','recorded'],
                                ] as $row)
                                <tr class="hover">
                                    <td class="font-semibold text-sm" style="color:#0d3d3d;">{{ $row[0] }}</td>
                                    <td class="hidden md:table-cell text-xs font-mono-custom"
                                        style="color:rgba(21,86,101,0.6);">{{ $row[1] }}</td>
                                    <td>
                                        <span
                                            class="badge badge-xs font-mono-custom {{ $row[2]==='LIVE' ? 'badge-outline' : 'badge-ghost' }}"
                                            style="{{ $row[2]==='LIVE' ? 'color:#1A9998; border-color:rgba(26,153,152,0.35);' : '' }}">
                                            {{ $row[2] }}
                                        </span>
                                    </td>
                                    <td class="hidden sm:table-cell font-mono-custom text-xs"
                                        style="color:rgba(21,86,101,0.6);">{{ $row[3] }}</td>
                                    <td class="hidden lg:table-cell text-xs" style="color:#2d6e6e;">{{ $row[4] }}</td>
                                    <td>
                                        @if($row[5]==='running')
                                        <span class="badge badge-sm badge-success gap-1">● Running</span>
                                        @elseif($row[5]==='upcoming')
                                        <span class="badge badge-sm badge-warning">Upcoming</span>
                                        @elseif($row[5]==='scheduled')
                                        <span class="badge badge-sm badge-outline"
                                            style="color:#1A9998; border-color:rgba(26,153,152,0.4);">Scheduled</span>
                                        @else
                                        <span class="badge badge-sm"
                                            style="background:rgba(21,86,101,0.08); color:#4a7070;">Recorded</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            <button class="btn btn-xs btn-ghost" style="color:#2d6e6e;">Edit</button>
                                            <button class="btn btn-xs btn-ghost text-error">Delete</button>
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
                        <p class="text-xs font-mono-custom" style="color:rgba(21,86,101,0.5);">Showing 1–6 of 1,284
                            sessions</p>
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
                        <a class="font-medium text-sm rounded-xl text-white"
                            style="background: linear-gradient(135deg, #1A9998, #155665);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                            </svg>
                            Sessions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_users') }}" class="font-medium text-sm rounded-xl"
                            style="color:#2d6e6e;">
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

    {{-- CREATE SESSION MODAL --}}
    <dialog id="create-modal" class="modal">
        <div class="modal-box max-w-md bg-white" style="border:1px solid rgba(26,153,152,0.2);">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 opacity-50">✕</button>
            </form>
            <h3 class="font-bold text-base mb-4" style="color:#0d3d3d;">Create New Session</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Title</label>
                    <input type="text" placeholder="e.g. Python for Beginners"
                        class="input input-sm input-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Instructor</label>
                    <select class="select select-sm select-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);">
                        <option>Dr. Ahmed R.</option>
                        <option>Sara K.</option>
                        <option>Prof. Nabil M.</option>
                        <option>Lena T.</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold uppercase tracking-wider"
                            style="color:rgba(21,86,101,0.5);">Type</label>
                        <select class="select select-sm select-bordered w-full"
                            style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);">
                            <option>Live</option>
                            <option>Recorded</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold uppercase tracking-wider"
                            style="color:rgba(21,86,101,0.5);">Max Students</label>
                        <input type="number" placeholder="250" class="input input-sm input-bordered w-full"
                            style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);" />
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Scheduled Time</label>
                    <input type="datetime-local" class="input input-sm input-bordered w-full"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider"
                        style="color:rgba(21,86,101,0.5);">Description</label>
                    <textarea class="textarea textarea-bordered textarea-sm w-full resize-none" rows="2"
                        placeholder="Short description…"
                        style="background:#f7fdfd; border-color:rgba(26,153,152,0.25);"></textarea>
                </div>
            </div>
            <div class="modal-action mt-4">
                <form method="dialog" class="flex gap-2 w-full">
                    <button class="btn btn-sm btn-ghost flex-1">Cancel</button>
                    <button class="btn btn-sm flex-1 text-white border-0"
                        style="background: linear-gradient(135deg, #1A9998, #155665);">Create Session</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <script>
        const filterColors = { active: '#1A9998', inactive: '' };
        function filterSessions(type) {
            ['all','live','recorded','scheduled'].forEach(t => {
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
