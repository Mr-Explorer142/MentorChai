<x-layout>
    <div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8
                bg-[#f0f4f4] dark:bg-[#0f1f2e] transition-colors duration-300">
        <div class="mx-auto space-y-6">

            {{-- ═══ Welcome Header Card ═══ --}}
            <div class="card shadow-2xl overflow-hidden border-0
                        bg-linear-to-br from-[#102E3C] via-[#155665] to-[#1A998F]
                        dark:from-[#0f2a38] dark:via-[#1a3d4d] dark:to-[#1a5560]">
                <div class="absolute inset-0 opacity-10"
                     style="background-image: radial-gradient(circle at 20% 50%, #1A998F 0%, transparent 50%), radial-gradient(circle at 80% 20%, #187F87 0%, transparent 40%);">
                </div>
                <div class="card-body relative">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div class="flex-1 space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-1.5 h-16 rounded-full bg-linear-to-b from-[#C4CFCE]/80 to-[#C4CFCE]/20"></div>
                                <div>
                                    <h1 class="text-3xl sm:text-4xl font-bold mb-2 text-white drop-shadow-lg">
                                        স্বাগতম, {{ $mentor->name }}
                                    </h1>
                                    <div class="flex flex-wrap gap-3 text-sm text-[#C4CFCE]">
                                        <div class="flex items-center gap-2 px-3 py-1.5 rounded-full backdrop-blur-sm
                                                    bg-[#C4CFCE]/10 border border-[#C4CFCE]/20">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                            </svg>
                                            মেন্টর আইডি: #{{ $mentor->id }}
                                        </div>
                                        <div class="flex items-center gap-2 px-3 py-1.5 rounded-full backdrop-blur-sm
                                                    bg-[#C4CFCE]/10 border border-[#C4CFCE]/20">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                            </svg>
                                            যোগদানের তারিখ: {{ $mentor->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="avatar online">
                            <div class="w-20 h-20 rounded-full shadow-2xl">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=1A998F&color=ffffff&size=200&font-size=0.4&bold=true"
                                     alt="Mentor Avatar"
                                     class="object-cover rounded-full border-4 border-[#C4CFCE]" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ Stats Cards Grid ═══ --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Sessions Card --}}
                <div class="card shadow-lg border hover:shadow-xl transition-all duration-300
                            bg-white dark:bg-[#1a2e3b]
                            border-[#C4CFCE] dark:border-[#4db6c1]/15">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 rounded-xl bg-[#1A998F]/10 dark:bg-[#4db6c1]/10">
                                    <svg class="w-6 h-6 text-[#1A998F] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-[#102E3C] dark:text-[#7ec8e3]">মোট সেশন</h2>
                                    <p class="text-sm text-[#155665]/70 dark:text-[#4db6c1]/60">সকল সেশনের সারসংক্ষেপ</p>
                                </div>
                            </div>
                            <div class="badge badge-lg gap-2 shadow font-semibold text-white bg-[#1A998F] border-[#1A998F]">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5" />
                                </svg>
                                ২০
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            {{-- Completed --}}
                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform
                                        bg-[#1A998F]/8 dark:bg-[#4db6c1]/10
                                        border-[#1A998F]/20 dark:border-[#4db6c1]/20">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-[#1A998F] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#1A998F] dark:text-[#4db6c1]">১০</p>
                                        <p class="text-xs mt-1 text-[#155665] dark:text-[#7ec8e3]/70">সম্পন্ন</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Pending --}}
                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform
                                        bg-[#155665]/8 dark:bg-[#28666e]/20
                                        border-[#155665]/20 dark:border-[#28666e]/30">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-[#155665] dark:text-[#7ec8e3]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#155665] dark:text-[#7ec8e3]">১০</p>
                                        <p class="text-xs mt-1 text-[#155665] dark:text-[#7ec8e3]/70">প্রক্রিয়াধীন</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Cancelled --}}
                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform
                                        bg-[#102E3C]/8 dark:bg-[#0f1f2e]/60
                                        border-[#102E3C]/15 dark:border-gray-700/50">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-[#102E3C] dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#102E3C] dark:text-gray-300">০</p>
                                        <p class="text-xs mt-1 text-[#155665] dark:text-[#7ec8e3]/70">বাতিলকৃত</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Earnings Card --}}
                <div class="card shadow-lg border hover:shadow-xl transition-all duration-300
                            bg-white dark:bg-[#1a2e3b]
                            border-[#C4CFCE] dark:border-[#4db6c1]/15">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 rounded-xl bg-[#187F87]/10 dark:bg-[#4db6c1]/10">
                                    <svg class="w-6 h-6 text-[#187F87] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-[#102E3C] dark:text-[#7ec8e3]">মোট আয়</h2>
                                    <p class="text-sm text-[#155665]/70 dark:text-[#4db6c1]/60">সর্বমোট পরিশোধিত অর্থ</p>
                                </div>
                            </div>
                            <div class="badge badge-lg shadow font-bold text-white bg-[#187F87] border-[#187F87]">৳১০,০০০</div>
                        </div>
                        <div class="space-y-3">
                            @foreach([
                                ['label'=>'বিগত সপ্তাহ', 'amount'=>'৳১,০০০', 'color'=>'#1A998F', 'dark'=>'#4db6c1'],
                                ['label'=>'বিগত মাস',    'amount'=>'৳১,০০০', 'color'=>'#187F87', 'dark'=>'#4db6c1'],
                                ['label'=>'বিগত বছর',    'amount'=>'৳১,০০,০০০','color'=>'#155665','dark'=>'#7ec8e3'],
                            ] as $row)
                            <div class="flex justify-between items-center p-4 rounded-xl border
                                        bg-linear-to-r from-[#f5f9f9] to-white dark:from-[#243d4d] dark:to-[#1a2e3b]
                                        border-[#C4CFCE] dark:border-[#4db6c1]/10
                                        hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg" style="background: rgba(26,153,143,0.1);">
                                        <svg class="w-5 h-5 text-[#1A998F] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-[#155665] dark:text-[#7ec8e3]">{{ $row['label'] }}</span>
                                </div>
                                <span class="font-bold text-lg text-[#102E3C] dark:text-gray-100">{{ $row['amount'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ Recent Sessions Table ═══ --}}
            <div class="card shadow-lg border bg-white dark:bg-[#1a2e3b] border-[#C4CFCE] dark:border-[#4db6c1]/15 transition-colors duration-300">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 rounded-full bg-linear-to-b from-[#1A998F] to-[#155665]"></div>
                            <div>
                                <h2 class="text-xl font-bold flex items-center gap-2 text-[#102E3C] dark:text-[#7ec8e3]">
                                    <svg class="w-6 h-6 text-[#1A998F] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    সাম্প্রতিক সেশনসমূহ
                                </h2>
                                <p class="text-sm mt-1 text-[#155665]/70 dark:text-[#4db6c1]/60">শেষ কয়েকটি সেশনের বিবরণ</p>
                            </div>
                        </div>
                        <button class="btn btn-sm gap-2 text-white border-0 bg-[#1A998F] hover:bg-[#155665] dark:bg-[#4db6c1] dark:text-[#0f1f2e] dark:hover:bg-[#38a8b5]">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            নতুন সেশন
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-[#C4CFCE] dark:border-[#4db6c1]/15">
                        <table class="table">
                            <thead>
                                <tr class="text-white" style="background: linear-gradient(to right, #155665, #1A998F);">
                                    <th class="rounded-tl-xl"><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" /></svg>আইডি</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>শিক্ষার্থী</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>টপিক/বিষয়</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>সময়কাল</div></th>
                                    <th class="rounded-tr-xl"><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>সেশন ফি</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                    ['id'=>'#১২','init'=>'সা','name'=>'সাদিবুল হাসান','topic'=>'Laravel Basics','dur'=>'২ ঘন্টা', 'fee'=>'৳১,০০০','bg'=>'rgba(26,153,143,0.15)','tc'=>'#1A998F','bc'=>'#187F87'],
                                    ['id'=>'#১৫','init'=>'আ','name'=>'আনিসুল ইসলাম', 'topic'=>'API Design',    'dur'=>'১.৫ ঘন্টা','fee'=>'৳৭৫০',  'bg'=>'rgba(24,127,135,0.15)','tc'=>'#187F87','bc'=>'#155665'],
                                    ['id'=>'#১৮','init'=>'রি','name'=>'রিফাত হাসান',   'topic'=>'Vue Integration','dur'=>'২ ঘন্টা', 'fee'=>'৳১,২০০','bg'=>'rgba(21,86,101,0.15)', 'tc'=>'#155665','bc'=>'#102E3C'],
                                ] as $row)
                                <tr class="hover:bg-teal-50 dark:hover:bg-[#243d4d] transition-colors">
                                    <td><span class="badge bg-[#f0f4f4] dark:bg-[#243d4d] text-[#155665] dark:text-[#7ec8e3] border-[#C4CFCE] dark:border-[#4db6c1]/20">{{ $row['id'] }}</span></td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full" style="background-color: {{ $row['bg'] }}; color: {{ $row['tc'] }};">
                                                    <span class="text-sm">{{ $row['init'] }}</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold text-[#102E3C] dark:text-gray-100">{{ $row['name'] }}</div>
                                        </div>
                                    </td>
                                    <td><span class="font-medium text-[#155665] dark:text-[#7ec8e3]">{{ $row['topic'] }}</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white border-0" style="background-color: {{ $row['bc'] }};">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $row['dur'] }}
                                        </span>
                                    </td>
                                    <td><span class="font-bold text-[#1A998F] dark:text-[#4db6c1]">{{ $row['fee'] }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ═══ Recent Payments Table ═══ --}}
            <div class="card shadow-lg border bg-white dark:bg-[#1a2e3b] border-[#C4CFCE] dark:border-[#4db6c1]/15 transition-colors duration-300">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 rounded-full bg-linear-to-b from-[#187F87] to-[#102E3C]"></div>
                            <div>
                                <h2 class="text-xl font-bold flex items-center gap-2 text-[#102E3C] dark:text-[#7ec8e3]">
                                    <svg class="w-6 h-6 text-[#187F87] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                    সাম্প্রতিক পেমেন্টসমূহ
                                </h2>
                                <p class="text-sm mt-1 text-[#155665]/70 dark:text-[#4db6c1]/60">সর্বশেষ লেনদেনের তালিকা</p>
                            </div>
                        </div>
                        <button class="btn btn-sm gap-2 text-white border-0 bg-[#187F87] hover:bg-[#155665] dark:bg-[#4db6c1] dark:text-[#0f1f2e] dark:hover:bg-[#38a8b5]">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            রিপোর্ট ডাউনলোড
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-[#C4CFCE] dark:border-[#4db6c1]/15">
                        <table class="table">
                            <thead>
                                <tr class="text-white" style="background: linear-gradient(to right, #102E3C, #187F87);">
                                    <th class="rounded-tl-xl"><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" /></svg>আইডি</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>শিক্ষার্থী</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>পরিমাণ</div></th>
                                    <th><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" /></svg>মাধ্যম</div></th>
                                    <th class="rounded-tr-xl"><div class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>তারিখ</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                    ['id'=>'#১২','init'=>'সা','name'=>'সাদিবুল হাসান','amount'=>'৳১,০০০','method'=>'বিকাশ','date'=>'১২ সেপ্টেম্বর ২০২৬','bg'=>'rgba(26,153,143,0.15)','tc'=>'#1A998F','bc'=>'#1A998F'],
                                    ['id'=>'#১৫','init'=>'আ','name'=>'আনিসুল ইসলাম', 'amount'=>'৳৭৫০',  'method'=>'নগদ',   'date'=>'১২ সেপ্টেম্বর ২০২৬','bg'=>'rgba(24,127,135,0.15)','tc'=>'#187F87','bc'=>'#155665'],
                                    ['id'=>'#১৮','init'=>'রি','name'=>'রিফাত হাসান',   'amount'=>'৳১,২০০','method'=>'ব্যাংক', 'date'=>'১২ সেপ্টেম্বর ২০২৬','bg'=>'rgba(21,86,101,0.15)', 'tc'=>'#155665','bc'=>'#102E3C'],
                                ] as $row)
                                <tr class="hover:bg-teal-50 dark:hover:bg-[#243d4d] transition-colors">
                                    <td><span class="badge bg-[#f0f4f4] dark:bg-[#243d4d] text-[#155665] dark:text-[#7ec8e3] border-[#C4CFCE] dark:border-[#4db6c1]/20">{{ $row['id'] }}</span></td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full" style="background-color: {{ $row['bg'] }}; color: {{ $row['tc'] }};">
                                                    <span class="text-sm">{{ $row['init'] }}</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold text-[#102E3C] dark:text-gray-100">{{ $row['name'] }}</div>
                                        </div>
                                    </td>
                                    <td><span class="font-bold text-lg text-[#1A998F] dark:text-[#4db6c1]">{{ $row['amount'] }}</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white border-0" style="background-color: {{ $row['bc'] }};">
                                            {{ $row['method'] }}
                                        </span>
                                    </td>
                                    <td><span class="text-sm text-[#155665] dark:text-[#7ec8e3]/70">{{ $row['date'] }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Chart --}}
            @include('dashboard.mentor-earnings-chart')

        </div>
    </div>
</x-layout>
