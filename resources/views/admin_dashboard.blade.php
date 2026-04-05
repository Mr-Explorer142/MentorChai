<x-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    {{-- Only what Tailwind cannot express: pseudo-element gradients + keyframe animation --}}
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

        /* Stat card top accent bar — requires ::before pseudo-element */
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

        .bar-red::before {
            background: linear-gradient(90deg, #ef4444, #f97316);
        }

        .bar-green::before {
            background: linear-gradient(90deg, #10b981, #0ea5e9);
        }
    </style>

    <div class="drawer lg:drawer-open">
        <input id="sidebar-drawer" type="checkbox" class="drawer-toggle" />

        {{-- ══════════════ PAGE CONTENT ══════════════ --}}
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
                        <p class="font-bold text-base leading-tight text-(--mc-text)">Dashboard</p>
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

            {{-- MAIN --}}
            <main class="flex-1 p-4 lg:p-6 flex flex-col gap-6 font-[Sora,sans-serif]">

                {{-- STATS --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">

                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-teal">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Students</div>
                            <span>👥</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-teal-text)">12,847
                        </div>
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm text-white border-0 bg-emerald-500">↑ +8% this month</span>
                        </div>
                    </div>

                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-blue">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Teachers</div>
                            <span>🎓</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-blue-text)">348</div>
                        <div class="stat-desc mt-1">
                            <span
                                class="badge badge-sm bg-(--mc-badge-teal-bg) text-(--mc-badge-teal-text) border border-(--mc-badge-teal-border)">Active
                                mentors</span>
                        </div>
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
                        <div class="stat-desc mt-1">
                            <span class="badge badge-sm badge-error badge-outline">Sessions running</span>
                        </div>
                    </div>

                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-green">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                Today</div>
                            <span>📅</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-green-text)">18</div>
                        <div class="stat-desc mt-1">
                            <span
                                class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">Sessions
                                total</span>
                        </div>
                    </div>

                </div>

                {{-- TWO COLUMNS --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Create Session --}}
                    <div
                        class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-4">
                        <h2 class="text-xs font-bold uppercase tracking-widest text-(--mc-text-muted)">Create
                            Session</h2>

                        <div class="flex flex-col gap-1">
                            <label
                                class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Title</label>
                            <input type="text" placeholder="e.g. Python for Beginners"
                                class="input input-sm input-bordered w-full focus:outline-none bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text) placeholder:text-(--mc-text-faint)" />
                        </div>

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
                            <label
                                class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">Scheduled
                                Time</label>
                            <input type="datetime-local"
                                class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                        </div>

                        <button
                            class="btn btn-sm w-full gap-2 mt-1 text-white border-0 bg-linear-to-br from-[#1A9998] to-[#155665] shadow-[0_4px_14px_rgba(26,153,152,0.3)] hover:shadow-[0_6px_20px_rgba(26,153,152,0.4)] hover:-translate-y-0.5 transition-all">
                            Create Session
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>

                    {{-- Live Sessions --}}
                    <div
                        class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xs font-bold uppercase tracking-widest text-(--mc-text-muted)">Live
                                Sessions</h2>
                            <span class="badge badge-sm badge-error badge-outline gap-1.5 font-bold">
                                <span class="live-dot w-1.5! h-1.5!"></span> 3 Active
                            </span>
                        </div>

                        <div class="flex flex-col gap-2">
                            @foreach([['Python Bootcamp','142'],['UI Design Fundamentals','87'],['React
                            Masterclass','63']] as $s)
                            <div
                                class="flex items-center justify-between p-3 rounded-xl transition-colors cursor-default bg-(--mc-bg) border border-(--mc-border-teal-sub)">
                                <div class="flex items-center gap-3">
                                    <span class="live-dot"></span>
                                    <div>
                                        <p class="text-sm font-semibold text-(--mc-text)">{{ $s[0] }}</p>
                                        <p class="text-xs font-mono-custom text-(--mc-text-muted)">{{ $s[1] }}
                                            participants</p>
                                    </div>
                                </div>
                                <span class="badge badge-sm badge-error font-bold">LIVE</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- TABLE --}}
                <div
                    class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-(--mc-text-muted)">Upcoming
                        Sessions</h2>
                    <div class="overflow-x-auto">
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-xs uppercase tracking-widest text-(--mc-text-muted)">
                                    <th>Session</th>
                                    <th class="hidden md:table-cell">Instructor</th>
                                    <th>Date & Time</th>
                                    <th class="hidden sm:table-cell">Enrolled</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                ['Python Bootcamp','Dr. Ahmed R.','Today · 4:00 PM','142','running'],
                                ['Web Design Essentials','Sara K.','Today · 6:00 PM','98','upcoming'],
                                ['Data Science 101','Prof. Nabil M.','Tmrw · 10:00 AM','210','scheduled'],
                                ['JavaScript Advanced','Lena T.','Tmrw · 2:00 PM','176','scheduled'],
                                ] as $row)
                                <tr class="hover">
                                    <td class="font-semibold text-sm text-(--mc-text)">{{ $row[0] }}</td>
                                    <td class="hidden md:table-cell text-xs text-(--mc-text-muted)">{{ $row[1] }}
                                    </td>
                                    <td class="font-mono-custom text-xs text-(--mc-text-muted)">{{ $row[2] }}</td>
                                    <td class="hidden sm:table-cell text-xs text-(--mc-text-sub)">{{ $row[3] }}
                                    </td>
                                    <td>
                                        @if($row[4]==='running')
                                        <span class="badge badge-sm badge-success gap-1">● Running</span>
                                        @elseif($row[4]==='upcoming')
                                        <span class="badge badge-sm badge-warning">Upcoming</span>
                                        @else
                                        <span
                                            class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">Scheduled</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- CHART --}}
                <div
                    class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-4">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <h2
                            class="text-xs font-bold uppercase tracking-widest flex items-center gap-2 text-(--mc-text-muted)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-(--mc-primary)" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M7 14l3-3 4 4 5-7" />
                            </svg>
                            Analytics Overview
                        </h2>
                        <div class="join">
                            <button id="tab-week" onclick="switchChart('week')"
                                class="btn btn-xs join-item text-white border-0 bg-(--mc-primary)">Week</button>
                            <button id="tab-month" onclick="switchChart('month')"
                                class="btn btn-xs join-item btn-ghost">Month</button>
                        </div>
                    </div>
                    <div class="relative h-64">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>

            </main>
        </div>

        {{-- ══════════════ SIDEBAR ══════════════ --}}
        <div class="drawer-side z-40">
            <label for="sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside
                class="w-60 min-h-full flex flex-col p-4 bg-(--mc-surface) border-r border-(--mc-border-teal-sub)">

                {{-- Logo --}}
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
                        <a
                            class="font-medium text-sm rounded-xl text-white bg-linear-to-br from-[#1A9998] to-[#155665]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10l9-7 9 7v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2v-9z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_sessions') }}"
                            class="font-medium text-sm rounded-xl text-(--mc-text-sub) hover:bg-(--mc-bg)">
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const isDark = () => document.documentElement.classList.contains('dark');
        const TICK = () => isDark() ? 'rgba(156,163,175,0.7)' : 'rgba(21,86,101,0.4)';
        const GRID = () => isDark() ? 'rgba(55,65,81,0.5)'   : 'rgba(26,153,152,0.08)';

        const weekData  = { labels:['Sat','Sun','Mon','Tue','Wed','Thu','Fri'], students:[120,150,170,200,220,250,280], sessions:[30,45,50,65,70,80,90] };
        const monthData = { labels:['Week 1','Week 2','Week 3','Week 4'], students:[820,1050,1200,1480], sessions:[210,280,330,410] };

        function buildDatasets(data, ctx) {
            const g1 = ctx.createLinearGradient(0,0,0,260);
            g1.addColorStop(0, isDark() ? 'rgba(26,153,152,0.35)' : 'rgba(26,153,152,0.22)');
            g1.addColorStop(1, 'rgba(26,153,152,0)');
            const g2 = ctx.createLinearGradient(0,0,0,260);
            g2.addColorStop(0, isDark() ? 'rgba(21,86,101,0.30)' : 'rgba(21,86,101,0.15)');
            g2.addColorStop(1, 'rgba(21,86,101,0)');
            return [
                { label:'Students', data:data.students, borderColor:'#1A9998', backgroundColor:g1,
                  tension:.4, fill:true, pointRadius:5, pointHoverRadius:7,
                  pointBackgroundColor:'#1A9998', pointBorderColor: isDark() ? '#1a2e3b' : '#fff', pointBorderWidth:2 },
                { label:'Sessions', data:data.sessions, borderColor:'#155665', backgroundColor:g2,
                  tension:.4, fill:true, pointRadius:5, pointHoverRadius:7,
                  pointBackgroundColor:'#155665', pointBorderColor: isDark() ? '#1a2e3b' : '#fff', pointBorderWidth:2 },
            ];
        }

        const canvas = document.getElementById('dashboardChart');
        const ctx    = canvas.getContext('2d');

        const chart = new Chart(canvas, {
            type: 'line',
            data: { labels: weekData.labels, datasets: buildDatasets(weekData, ctx) },
            options: {
                responsive:true, maintainAspectRatio:false,
                interaction: { mode:'index', intersect:false },
                plugins: {
                    legend: { labels:{ color:TICK(), font:{family:"'Sora',sans-serif",size:12,weight:'600'}, usePointStyle:true, pointStyleWidth:8, padding:20 } },
                    tooltip: {
                        backgroundColor: isDark() ? '#1a2e3b' : '#fff',
                        borderColor: isDark() ? 'rgba(26,153,152,0.3)' : 'rgba(26,153,152,0.2)',
                        borderWidth:1, titleColor: isDark() ? '#f3f4f6' : '#0d3d3d',
                        bodyColor: isDark() ? '#9ca3af' : '#4a7070',
                        titleFont:{family:"'Sora',sans-serif",size:13,weight:'700'},
                        bodyFont:{family:"'DM Mono',monospace",size:12},
                        padding:12, cornerRadius:10, boxWidth:8, boxHeight:8, boxPadding:4
                    }
                },
                scales: {
                    x:{ ticks:{color:TICK(),font:{family:"'Sora',sans-serif",size:11}}, grid:{color:GRID()}, border:{display:false} },
                    y:{ ticks:{color:TICK(),font:{family:"'Sora',sans-serif",size:11}}, grid:{color:GRID()}, border:{display:false} }
                }
            }
        });

        function switchChart(range) {
            const d = range === 'week' ? weekData : monthData;
            chart.data.labels   = d.labels;
            chart.data.datasets = buildDatasets(d, ctx);
            chart.update('active');
            const primary = getComputedStyle(document.documentElement).getPropertyValue('--mc-primary').trim();
            document.getElementById('tab-week').className  = 'btn btn-xs join-item ' + (range==='week'  ? 'text-white border-0 bg-(--mc-primary)' : 'btn-ghost');
            document.getElementById('tab-month').className = 'btn btn-xs join-item ' + (range==='month' ? 'text-white border-0 bg-(--mc-primary)' : 'btn-ghost');
        }
    </script>

</x-layout>
