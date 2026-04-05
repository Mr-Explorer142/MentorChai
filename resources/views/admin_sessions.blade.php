<x-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    <style>
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

        <div class="drawer-content flex flex-col min-h-screen bg-(--mc-bg)">

            {{-- NAVBAR --}}
            <header
                class="navbar bg-(--mc-surface) border-b border-(--mc-border-teal-sub) sticky top-0 z-30 px-4 lg:px-6 shadow-(--mc-shadow-sm)">
                <div class="navbar-start gap-2">
                    <label for="sidebar-drawer"
                        class="btn btn-ghost btn-sm btn-square lg:hidden drawer-button text-(--mc-text-muted)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                    <div>
                        <p class="font-bold text-base leading-tight text-(--mc-text)">Sessions</p>
                        <p class="text-xs font-mono-custom text-(--mc-text-muted)">Saturday, 28 March 2026</p>
                    </div>
                </div>
                <div class="navbar-end gap-3">
                    <button class="btn btn-ghost btn-sm btn-circle">
                        <div class="indicator">
                            <span class="indicator-item badge badge-xs border-0 bg-(--mc-primary)"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-(--mc-text-muted)"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </button>
                    <div class="avatar placeholder">
                        <div
                            class="w-9 rounded-full font-bold text-sm grid place-items-center text-white bg-linear-to-br from-[#1A9998] to-[#155665]">
                            A</div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-6 flex flex-col gap-6 font-[Sora,sans-serif]">

                {{-- STATS --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-teal">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Total Sessions</div>
                            <span>🎬</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-teal-text)">1,284
                        </div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm text-white border-0 bg-emerald-500">↑
                                +12% this month</span></div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-red">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Live Now</div>
                            <span>🔴</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-red-text)">3</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm badge-error badge-outline">In
                                progress</span></div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-blue">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Recorded</div>
                            <span>📹</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-blue-text)">947</div>
                        <div class="stat-desc mt-1"><span
                                class="badge badge-sm bg-(--mc-badge-teal-bg) text-(--mc-badge-teal-text) border border-(--mc-badge-teal-border)">Available
                                on-demand</span></div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-green">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Scheduled</div>
                            <span>📅</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-green-text)">42</div>
                        <div class="stat-desc mt-1"><span
                                class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">Upcoming</span>
                        </div>
                    </div>
                </div>

                {{-- TOOLBAR --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="join rounded-xl overflow-hidden border border-(--mc-border-teal)">
                        <button class="btn btn-sm join-item border-0 text-white bg-(--mc-primary)" id="filter-all"
                            onclick="filterSessions('all')">All</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-live"
                            onclick="filterSessions('live')">Live</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-recorded"
                            onclick="filterSessions('recorded')">Recorded</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-scheduled"
                            onclick="filterSessions('scheduled')">Scheduled</button>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label
                            class="input input-sm input-bordered flex items-center gap-2 flex-1 sm:w-64 bg-(--mc-surface) border-(--mc-border-teal)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-(--mc-text-muted)"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Search sessions…"
                                class="grow bg-transparent outline-none text-sm text-(--mc-text) placeholder:text-(--mc-text-faint)" />
                        </label>
                        <button
                            class="btn btn-sm gap-1.5 text-white border-0 bg-linear-to-br from-[#1A9998] to-[#155665] hover:-translate-y-0.5 transition-transform"
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
                    <p
                        class="text-xs font-semibold uppercase tracking-widest mb-3 flex items-center gap-2 text-(--mc-text-muted)">
                        <span class="live-dot"></span> Live Sessions
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach([
                        ['Python Bootcamp – Ep. 12','Dr. Ahmed R.','42 min ago','142'],
                        ['UI Design Fundamentals','Sara K.','18 min ago','87'],
                        ['React Masterclass – Hooks','Lena T.','5 min ago','63'],
                        ] as $sess)
                        <div class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) transition-all duration-300 hover:-translate-y-1 hover:shadow-(--mc-shadow-md)"
                            data-type="live">
                            <div class="p-4 flex flex-col gap-3">
                                <div class="flex items-start justify-between gap-2">
                                    <div
                                        class="w-10 h-10 rounded-xl grid place-items-center shrink-0 bg-red-500/10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-error" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <span class="badge badge-sm badge-error gap-1 font-bold shrink-0">
                                        <span class="live-dot w-1.5! h-1.5!"></span> LIVE
                                    </span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm leading-tight text-(--mc-text)">{{ $sess[0] }}
                                    </h3>
                                    <p class="text-xs mt-0.5 font-mono-custom text-(--mc-text-muted)">{{ $sess[1]
                                        }} · Started {{ $sess[2] }}</p>
                                </div>
                                <div
                                    class="flex items-center justify-between pt-2 border-t border-(--mc-border-teal-sub)">
                                    <span class="text-xs font-mono-custom text-(--mc-text-muted)">👥 {{ $sess[3] }}
                                        watching</span>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-ghost text-(--mc-text-sub)">View</button>
                                        <button class="btn btn-xs btn-error btn-outline">End</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- ALL SESSIONS TABLE --}}
                <div
                    class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-(--mc-text-muted)">All Sessions
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-xs uppercase tracking-widest text-(--mc-text-muted)">
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
                                    <td class="font-semibold text-sm text-(--mc-text)">{{ $row[0] }}</td>
                                    <td
                                        class="hidden md:table-cell text-xs font-mono-custom text-(--mc-text-muted)">
                                        {{ $row[1] }}</td>
                                    <td>
                                        <span
                                            class="badge badge-xs font-mono-custom {{ $row[2]==='LIVE' ? 'badge-outline border-(--mc-border-teal) text-(--mc-primary)' : 'badge-ghost' }}">
                                            {{ $row[2] }}
                                        </span>
                                    </td>
                                    <td
                                        class="hidden sm:table-cell font-mono-custom text-xs text-(--mc-text-muted)">
                                        {{ $row[3] }}</td>
                                    <td class="hidden lg:table-cell text-xs text-(--mc-text-sub)">{{ $row[4] }}
                                    </td>
                                    <td>
                                        @if($row[5]==='running')
                                        <span class="badge badge-sm badge-success gap-1">● Running</span>
                                        @elseif($row[5]==='upcoming')
                                        <span class="badge badge-sm badge-warning">Upcoming</span>
                                        @elseif($row[5]==='scheduled')
                                        <span
                                            class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">Scheduled</span>
                                        @else
                                        <span
                                            class="badge badge-sm bg-(--mc-badge-teal-bg) text-(--mc-text-muted)">Recorded</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            <button class="btn btn-xs btn-ghost text-(--mc-text-sub)">Edit</button>
                                            <button class="btn btn-xs btn-ghost text-error">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="flex items-center justify-between flex-wrap gap-2 pt-3 border-t border-(--mc-border-teal-sub)">
                        <p class="text-xs font-mono-custom text-(--mc-text-muted)">Showing 1–6 of 1,284 sessions
                        </p>
                        <div class="join">
                            <button class="btn btn-xs join-item btn-ghost opacity-40" disabled>«</button>
                            <button class="btn btn-xs join-item text-white border-0 bg-(--mc-primary)">1</button>
                            <button class="btn btn-xs join-item btn-ghost">2</button>
                            <button class="btn btn-xs join-item btn-ghost">3</button>
                            <button class="btn btn-xs join-item btn-ghost">»</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        {{-- SIDEBAR --}}
        <div class="drawer-side z-40">
            <label for="sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside
                class="w-60 min-h-full flex flex-col p-4 bg-(--mc-surface) border-r border-(--mc-border-teal-sub)">
                <div class="flex items-center gap-3 px-2 py-3 mb-3 border-b border-(--mc-border-teal-sub)">
                    <div
                        class="w-9 h-9 rounded-xl grid place-items-center shrink-0 bg-linear-to-br from-[#1A9998] to-[#155665]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-3h8" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-sm leading-tight text-(--mc-text)">MentorChai</h2>
                        <p class="text-xs text-(--mc-text-muted)">Admin Panel</p>
                    </div>
                </div>
                <ul class="menu menu-sm flex-1 gap-0.5 px-0">
                    <li class="menu-title text-xs tracking-widest text-(--mc-text-faint)">Main</li>
                    <li>
                        <a href="{{ route('admin_dashboard') }}"
                            class="font-medium text-sm rounded-xl text-(--mc-text-sub) hover:bg-(--mc-bg)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10l9-7 9 7v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2v-9z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a
                            class="font-medium text-sm rounded-xl text-white bg-linear-to-br from-[#1A9998] to-[#155665]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                            </svg>
                            Sessions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_users') }}"
                            class="font-medium text-sm rounded-xl text-(--mc-text-sub) hover:bg-(--mc-bg)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-4a4 4 0 11-8 0 4 4 0 018 0zM9 10a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Users
                        </a>
                    </li>
                </ul>
                <a href="{{ route('admin_login') }}"
                    class="btn btn-sm gap-2 mt-4 border-0 text-white bg-linear-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700">
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
        <div class="modal-box max-w-md bg-(--mc-surface) border border-(--mc-border-teal)">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 opacity-50">✕</button>
            </form>
            <h3 class="font-bold text-base mb-4 text-(--mc-text)">Create New Session</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label
                        class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Title</label>
                    <input type="text" placeholder="e.g. Python for Beginners"
                        class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                </div>
                <div class="flex flex-col gap-1">
                    <label
                        class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Instructor</label>
                    <select
                        class="select select-sm select-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)">
                        <option>Dr. Ahmed R.</option>
                        <option>Sara K.</option>
                        <option>Prof. Nabil M.</option>
                        <option>Lena T.</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1">
                        <label
                            class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Type</label>
                        <select
                            class="select select-sm select-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)">
                            <option>Live</option>
                            <option>Recorded</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Max
                            Students</label>
                        <input type="number" placeholder="250"
                            class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Scheduled
                        Time</label>
                    <input type="datetime-local"
                        class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                </div>
                <div class="flex flex-col gap-1">
                    <label
                        class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Description</label>
                    <textarea
                        class="textarea textarea-bordered textarea-sm w-full resize-none bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)"
                        rows="2" placeholder="Short description…"></textarea>
                </div>
            </div>
            <div class="modal-action mt-4">
                <form method="dialog" class="flex gap-2 w-full">
                    <button class="btn btn-sm btn-ghost flex-1">Cancel</button>
                    <button
                        class="btn btn-sm flex-1 text-white border-0 bg-linear-to-br from-[#1A9998] to-[#155665]">Create
                        Session</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <script>
        function filterSessions(type) {
            ['all','live','recorded','scheduled'].forEach(t => {
                const el = document.getElementById('filter-' + t);
                const primary = getComputedStyle(document.documentElement).getPropertyValue('--mc-primary').trim();
                el.className = 'btn btn-sm join-item border-0 ' + (t === type ? 'text-white bg-(--mc-primary)' : 'btn-ghost');
                el.style.background = t === type ? `var(--mc-primary)` : '';
            });
        }
    </script>

</x-layout>
