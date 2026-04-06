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

            {{-- নেভবার --}}
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
                        <p class="font-bold text-base leading-tight text-(--mc-text)">সেশনসমূহ</p>
                        <p class="text-xs font-mono-custom text-(--mc-text-muted)">শনিবার, ২৮ মার্চ ২০২৬</p>
                    </div>
                </div>
                <div class="navbar-end gap-3">
                    <button class="btn btn-ghost btn-sm btn-circle">
                        <div class="indicator">
                            <span class="indicator-item badge badge-xs border-0 bg-(--mc-primary)"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-(--mc-text-muted)" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </button>
                    <div class="avatar placeholder">
                        <div
                            class="w-9 rounded-full font-bold text-sm grid place-items-center text-white bg-linear-to-br from-[#1A9998] to-[#155665]">
                            অ</div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-6 flex flex-col gap-6 font-[Sora,sans-serif]">

                {{-- পরিসংখ্যান --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-teal">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                মোট সেশন</div>
                            <span>🎬</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-teal-text)">১,২৮৪</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm text-white border-0 bg-emerald-500">↑ এই
                                মাসে +১২%</span></div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-red">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                এখন লাইভ</div>
                            <span>🔴</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-red-text)">৩</div>
                        <div class="stat-desc mt-1"><span class="badge badge-sm badge-error badge-outline">চলমান</span>
                        </div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-blue">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                রেকর্ডকৃত</div>
                            <span>📹</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-blue-text)">৯৪৭</div>
                        <div class="stat-desc mt-1"><span
                                class="badge badge-sm bg-(--mc-badge-teal-bg) text-(--mc-badge-teal-text) border border-(--mc-badge-teal-border)">অন-ডিমান্ড
                                উপলব্ধ</span></div>
                    </div>
                    <div
                        class="stat bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) stat-bar bar-green">
                        <div class="flex justify-between items-start">
                            <div
                                class="stat-title text-xs font-semibold uppercase tracking-widest text-(--mc-text-muted)">
                                নির্ধারিত</div>
                            <span>📅</span>
                        </div>
                        <div class="stat-value font-mono-custom text-3xl mt-1 text-(--mc-stat-green-text)">৪২</div>
                        <div class="stat-desc mt-1"><span
                                class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">আসন্ন</span>
                        </div>
                    </div>
                </div>

                {{-- টুলবার --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="join rounded-xl overflow-hidden border border-(--mc-border-teal)">
                        <button class="btn btn-sm join-item border-0 text-white bg-(--mc-primary)" id="filter-all"
                            onclick="filterSessions('all')">সব</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-live"
                            onclick="filterSessions('live')">লাইভ</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-recorded"
                            onclick="filterSessions('recorded')">রেকর্ডকৃত</button>
                        <button class="btn btn-sm join-item btn-ghost border-0" id="filter-scheduled"
                            onclick="filterSessions('scheduled')">নির্ধারিত</button>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label
                            class="input input-sm input-bordered flex items-center gap-2 flex-1 sm:w-64 bg-(--mc-surface) border-(--mc-border-teal)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-(--mc-text-muted)" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="সেশন খুঁজুন…"
                                class="grow bg-transparent outline-none text-sm text-(--mc-text) placeholder:text-(--mc-text-faint)" />
                        </label>
                        <button
                            class="btn btn-sm gap-1.5 text-white border-0 bg-linear-to-br from-[#1A9998] to-[#155665] hover:-translate-y-0.5 transition-transform"
                            onclick="document.getElementById('create-modal').showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            নতুন সেশন
                        </button>
                    </div>
                </div>

                {{-- লাইভ সেশন কার্ড --}}
                <div>
                    <p
                        class="text-xs font-semibold uppercase tracking-widest mb-3 flex items-center gap-2 text-(--mc-text-muted)">
                        <span class="live-dot"></span> লাইভ সেশনসমূহ
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach([
                        ['পাইথন বুটক্যাম্প — পর্ব ১২', 'ড. আহমেদ আর.', '৪২ মিনিট আগে', '১৪২'],
                        ['UI ডিজাইনের মূল বিষয়', 'সারা কে.', '১৮ মিনিট আগে', '৮৭'],
                        ['React মাস্টারক্লাস — হুকস', 'লেনা টি.', '৫ মিনিট আগে', '৬৩'],
                        ] as $sess)
                        <div class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) transition-all duration-300 hover:-translate-y-1 hover:shadow-(--mc-shadow-md)"
                            data-type="live">
                            <div class="p-4 flex flex-col gap-3">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="w-10 h-10 rounded-xl grid place-items-center shrink-0 bg-red-500/10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-error" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10l4.5-4.5v13L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <span class="badge badge-sm badge-error gap-1 font-bold shrink-0">
                                        <span class="live-dot w-1.5! h-1.5!"></span> লাইভ
                                    </span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm leading-tight text-(--mc-text)">{{ $sess[0] }}</h3>
                                    <p class="text-xs mt-0.5 font-mono-custom text-(--mc-text-muted)">{{ $sess[1] }} ·
                                        {{ $sess[2] }} শুরু</p>
                                </div>
                                <div
                                    class="flex items-center justify-between pt-2 border-t border-(--mc-border-teal-sub)">
                                    <span class="text-xs font-mono-custom text-(--mc-text-muted)">👥 {{ $sess[3] }} জন
                                        দেখছেন</span>
                                    <div class="flex gap-1">
                                        <button class="btn btn-xs btn-ghost text-(--mc-text-sub)">দেখুন</button>
                                        <button class="btn btn-xs btn-error btn-outline">শেষ করুন</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- সকল সেশন টেবিল --}}
                <div
                    class="bg-(--mc-surface) rounded-2xl shadow-(--mc-shadow-sm) border border-(--mc-border-teal-sub) p-6 flex flex-col gap-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-(--mc-text-muted)">সকল সেশন</h2>
                    <div class="overflow-x-auto">
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-xs uppercase tracking-widest text-(--mc-text-muted)">
                                    <th>শিরোনাম</th>
                                    <th class="hidden md:table-cell">মেন্টর</th>
                                    <th>ধরন</th>
                                    <th class="hidden sm:table-cell">তারিখ</th>
                                    <th class="hidden lg:table-cell">নিবন্ধিত</th>
                                    <th>অবস্থা</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                ['পাইথন বুটক্যাম্প — পর্ব ১২', 'ড. আহমেদ আর.', 'লাইভ', 'আজ · বিকাল ৪:০০', '১৪২',
                                'running'],
                                ['ওয়েব ডিজাইনের মূল বিষয়', 'সারা কে.', 'লাইভ', 'আজ · সন্ধ্যা ৬:০০', '৯৮', 'upcoming'],
                                ['ডেটা সায়েন্স ১০১', 'প্রফেসর নাবিল.', 'লাইভ', 'আগামীকাল · সকাল ১০:০০', '২১০',
                                'scheduled'],
                                ['জাভাস্ক্রিপ্ট অ্যাডভান্সড', 'লেনা টি.', 'লাইভ', 'আগামীকাল · দুপুর ২:০০', '১৭৬',
                                'scheduled'],
                                ['মেশিন লার্নিং বেসিকস', 'প্রফেসর নাবিল.', 'রেক', '২৫ মার্চ · বিকাল ৩:০০', '৫৩৪',
                                'recorded'],
                                ['ডেভেলপারদের জন্য Figma', 'সারা কে.', 'রেক', '২২ মার্চ · বিকাল ৫:০০', '২৮৯',
                                'recorded'],
                                ] as $row)
                                <tr class="hover">
                                    <td class="font-semibold text-sm text-(--mc-text)">{{ $row[0] }}</td>
                                    <td class="hidden md:table-cell text-xs font-mono-custom text-(--mc-text-muted)">{{
                                        $row[1] }}</td>
                                    <td>
                                        <span
                                            class="badge badge-xs font-mono-custom {{ $row[2]==='লাইভ' ? 'badge-outline border-(--mc-border-teal) text-(--mc-primary)' : 'badge-ghost' }}">
                                            {{ $row[2] }}
                                        </span>
                                    </td>
                                    <td class="hidden sm:table-cell font-mono-custom text-xs text-(--mc-text-muted)">{{
                                        $row[3] }}</td>
                                    <td class="hidden lg:table-cell text-xs text-(--mc-text-sub)">{{ $row[4] }}</td>
                                    <td>
                                        @if($row[5]==='running')
                                        <span class="badge badge-sm badge-success gap-1">● চলমান</span>
                                        @elseif($row[5]==='upcoming')
                                        <span class="badge badge-sm badge-warning">আসন্ন</span>
                                        @elseif($row[5]==='scheduled')
                                        <span
                                            class="badge badge-sm badge-outline border-(--mc-border-teal) text-(--mc-primary)">নির্ধারিত</span>
                                        @else
                                        <span
                                            class="badge badge-sm bg-(--mc-badge-teal-bg) text-(--mc-text-muted)">রেকর্ডকৃত</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            <button class="btn btn-xs btn-ghost text-(--mc-text-sub)">সম্পাদনা</button>
                                            <button class="btn btn-xs btn-ghost text-error">মুছুন</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="flex items-center justify-between flex-wrap gap-2 pt-3 border-t border-(--mc-border-teal-sub)">
                        <p class="text-xs font-mono-custom text-(--mc-text-muted)">১–৬ দেখানো হচ্ছে মোট ১,২৮৪টির মধ্যে
                        </p>
                        <div class="join">
                            <button class="btn btn-xs join-item btn-ghost opacity-40" disabled>«</button>
                            <button class="btn btn-xs join-item text-white border-0 bg-(--mc-primary)">১</button>
                            <button class="btn btn-xs join-item btn-ghost">২</button>
                            <button class="btn btn-xs join-item btn-ghost">৩</button>
                            <button class="btn btn-xs join-item btn-ghost">»</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        {{-- সাইডবার --}}
        <div class="drawer-side z-40">
            <label for="sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside class="w-60 min-h-full flex flex-col p-4 bg-(--mc-surface) border-r border-(--mc-border-teal-sub)">
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
                        <h2 class="font-bold text-sm leading-tight text-(--mc-text)">মেন্টরচাই</h2>
                        <p class="text-xs text-(--mc-text-muted)">অ্যাডমিন প্যানেল</p>
                    </div>
                </div>
                <ul class="menu menu-sm flex-1 gap-0.5 px-0">
                    <li class="menu-title text-xs tracking-widest text-(--mc-text-faint)">প্রধান মেনু</li>
                    <li>
                        <a href="{{ route('admin_dashboard') }}"
                            class="font-medium text-sm rounded-xl text-(--mc-text-sub) hover:bg-(--mc-bg)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10l9-7 9 7v9a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2v-9z" />
                            </svg>
                            ড্যাশবোর্ড
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
                            সেশনসমূহ
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
                            ব্যবহারকারী
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
                    লগ আউট
                </a>
            </aside>
        </div>
    </div>

    {{-- নতুন সেশন তৈরি মোডাল --}}
    <dialog id="create-modal" class="modal">
        <div class="modal-box max-w-md bg-(--mc-surface) border border-(--mc-border-teal)">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 opacity-50">✕</button>
            </form>
            <h3 class="font-bold text-base mb-4 text-(--mc-text)">নতুন সেশন তৈরি করুন</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">শিরোনাম</label>
                    <input type="text" placeholder="যেমন: পাইথন প্রোগ্রামিং — শুরু থেকে শেষ"
                        class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">মেন্টর</label>
                    <select
                        class="select select-sm select-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)">
                        <option>ড. আহমেদ আর.</option>
                        <option>সারা কে.</option>
                        <option>প্রফেসর নাবিল.</option>
                        <option>লেনা টি.</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">ধরন</label>
                        <select
                            class="select select-sm select-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)">
                            <option>লাইভ</option>
                            <option>রেকর্ডকৃত</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">সর্বোচ্চ
                            শিক্ষার্থী</label>
                        <input type="number" placeholder="২৫০"
                            class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">নির্ধারিত
                        সময়</label>
                    <input type="datetime-local"
                        class="input input-sm input-bordered w-full bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold uppercase tracking-wider text-(--mc-text-muted)">বিবরণ</label>
                    <textarea
                        class="textarea textarea-bordered textarea-sm w-full resize-none bg-(--mc-bg) border-(--mc-border-teal) text-(--mc-text)"
                        rows="2" placeholder="সংক্ষিপ্ত বিবরণ…"></textarea>
                </div>
            </div>
            <div class="modal-action mt-4">
                <form method="dialog" class="flex gap-2 w-full">
                    <button class="btn btn-sm btn-ghost flex-1">বাতিল</button>
                    <button
                        class="btn btn-sm flex-1 text-white border-0 bg-linear-to-br from-[#1A9998] to-[#155665]">সেশন
                        তৈরি করুন</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>

    <script>
        function filterSessions(type) {
            ['all','live','recorded','scheduled'].forEach(t => {
                const el = document.getElementById('filter-' + t);
                el.className = 'btn btn-sm join-item border-0 ' + (t === type ? 'text-white' : 'btn-ghost');
                el.style.background = t === type ? 'var(--mc-primary)' : '';
            });
        }
    </script>

</x-layout>
