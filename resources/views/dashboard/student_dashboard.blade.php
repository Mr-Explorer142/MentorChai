<x-layout>
    <div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8" style="background-color: #f0f4f4;">
        <div class="mx-auto space-y-6">

            {{-- Welcome Header Card --}}
            <div class="card shadow-2xl overflow-hidden border-0"
                style="background: linear-gradient(135deg, #102E3C 0%, #155665 50%, #187F87 100%);">
                <div class="absolute inset-0 opacity-10"
                    style="background-image: radial-gradient(circle at 20% 50%, #1A998F 0%, transparent 50%), radial-gradient(circle at 80% 20%, #187F87 0%, transparent 40%);">
                </div>

                <div class="card-body relative">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">

                        <div class="flex-1 space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-1.5 h-16 rounded-full"
                                    style="background: linear-gradient(to bottom, #C4CFCE, rgba(196,207,206,0.3));">
                                </div>
                                <div>
                                    <h1 class="text-3xl sm:text-4xl font-bold mb-2 text-white drop-shadow-lg">
                                        স্বাগতম, {{ $student->name }}
                                    </h1>
                                    <div class="flex flex-wrap gap-3 text-sm" style="color: #C4CFCE;">
                                        <div class="flex items-center gap-2 px-3 py-1.5 rounded-full backdrop-blur-sm border"
                                            style="background: rgba(196,207,206,0.1); border-color: rgba(196,207,206,0.2);">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                            </svg>
                                            স্টুডেন্ট আইডি: #{{ $student->id }}
                                        </div>
                                        <div class="flex items-center gap-2 px-3 py-1.5 rounded-full backdrop-blur-sm border"
                                            style="background: rgba(196,207,206,0.1); border-color: rgba(196,207,206,0.2);">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                            </svg>
                                            যোগদানের তারিখ: {{ $student->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="avatar online">
                            <div class="w-20 h-20 rounded-full shadow-2xl"
                                style="ring: 3px solid #C4CFCE; ring-offset: 4px; ring-offset-color: #155665;">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=1A998F&color=ffffff&size=200&font-size=0.4&bold=true"
                                    alt="Student Avatar" class="object-cover rounded-full border-4"
                                    style="border-color: #C4CFCE;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Cards Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Sessions Card --}}
                <div class="card shadow-lg border hover:shadow-xl transition-all duration-300"
                    style="background-color: #ffffff; border-color: #C4CFCE;">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 rounded-xl"
                                    style="background: linear-gradient(135deg, rgba(26,153,143,0.15), rgba(26,153,143,0.05));">
                                    <svg class="w-6 h-6" style="color: #1A998F;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold" style="color: #102E3C;">মোট সেশন</h2>
                                    <p class="text-sm" style="color: #155665; opacity: 0.7;">সকল সেশনের সারসংক্ষেপ</p>
                                </div>
                            </div>
                            <div class="badge badge-lg gap-2 shadow font-semibold text-white"
                                style="background-color: #1A998F; border-color: #1A998F;">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5" />
                                </svg>
                                ২০
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform"
                                style="background: linear-gradient(135deg, rgba(26,153,143,0.08), rgba(26,153,143,0.03)); border-color: rgba(26,153,143,0.2);">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8" style="color: #1A998F;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold" style="color: #1A998F;">১০</p>
                                        <p class="text-xs mt-1" style="color: #155665;">সম্পন্ন</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform"
                                style="background: linear-gradient(135deg, rgba(21,86,101,0.08), rgba(21,86,101,0.03)); border-color: rgba(21,86,101,0.2);">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8" style="color: #155665;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold" style="color: #155665;">১০</p>
                                        <p class="text-xs mt-1" style="color: #155665;">প্রক্রিয়াধীন</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-xl p-4 border hover:scale-105 transition-transform"
                                style="background: linear-gradient(135deg, rgba(16,46,60,0.08), rgba(16,46,60,0.03)); border-color: rgba(16,46,60,0.15);">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8" style="color: #102E3C;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold" style="color: #102E3C;">০</p>
                                        <p class="text-xs mt-1" style="color: #155665;">বাতিলকৃত</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment Card --}}
                <div class="card shadow-lg border hover:shadow-xl transition-all duration-300"
                    style="background-color: #ffffff; border-color: #C4CFCE;">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 rounded-xl"
                                    style="background: linear-gradient(135deg, rgba(24,127,135,0.15), rgba(24,127,135,0.05));">
                                    <svg class="w-6 h-6" style="color: #187F87;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold" style="color: #102E3C;">মোট ব্যয়</h2>
                                    <p class="text-sm" style="color: #155665; opacity: 0.7;">সর্বমোট পরিশোধিত অর্থ</p>
                                </div>
                            </div>
                            <div class="badge badge-lg shadow font-bold text-white"
                                style="background-color: #187F87; border-color: #187F87;">
                                ৳১০,০০০
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-4 rounded-xl border hover:shadow-md transition-shadow"
                                style="background: linear-gradient(to right, #f5f9f9, #ffffff); border-color: #C4CFCE;">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg" style="background: rgba(26,153,143,0.1);">
                                        <svg class="w-5 h-5" style="color: #1A998F;" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium" style="color: #155665;">বিগত সপ্তাহ</span>
                                </div>
                                <span class="font-bold text-lg" style="color: #102E3C;">৳১,০০০</span>
                            </div>

                            <div class="flex justify-between items-center p-4 rounded-xl border hover:shadow-md transition-shadow"
                                style="background: linear-gradient(to right, #f5f9f9, #ffffff); border-color: #C4CFCE;">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg" style="background: rgba(24,127,135,0.1);">
                                        <svg class="w-5 h-5" style="color: #187F87;" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium" style="color: #155665;">বিগত মাস</span>
                                </div>
                                <span class="font-bold text-lg" style="color: #102E3C;">৳১,০০০</span>
                            </div>

                            <div class="flex justify-between items-center p-4 rounded-xl border hover:shadow-md transition-shadow"
                                style="background: linear-gradient(to right, #f5f9f9, #ffffff); border-color: #C4CFCE;">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg" style="background: rgba(21,86,101,0.1);">
                                        <svg class="w-5 h-5" style="color: #155665;" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium" style="color: #155665;">বিগত বছর</span>
                                </div>
                                <span class="font-bold text-lg" style="color: #102E3C;">৳১,০০,০০০</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Recent Sessions Table --}}
            <div class="card shadow-lg border" style="background-color: #ffffff; border-color: #C4CFCE;">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 rounded-full"
                                style="background: linear-gradient(to bottom, #1A998F, #155665);"></div>
                            <div>
                                <h2 class="text-xl font-bold flex items-center gap-2" style="color: #102E3C;">
                                    <svg class="w-6 h-6" style="color: #1A998F;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    সাম্প্রতিক সেশনসমূহ
                                </h2>
                                <p class="text-sm mt-1" style="color: #155665; opacity: 0.7;">শেষ কয়েকটি সেশনের বিবরণ
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-sm gap-2 text-white border-0" style="background-color: #1A998F;">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            নতুন সেশন
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border" style="border-color: #C4CFCE;">
                        <table class="table">
                            <thead>
                                <tr style="background: linear-gradient(to right, #155665, #1A998F); color: white;">
                                    <th class="rounded-tl-xl">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                            </svg>
                                            আইডি
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                            মেন্টর
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                            </svg>
                                            টপিক/বিষয়
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            সময়কাল
                                        </div>
                                    </th>
                                    <th class="rounded-tr-xl">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            সেশন ফি
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১২</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(26,153,143,0.15); color: #1A998F;">
                                                    <span class="text-sm">সা</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">সাদিবুল হাসান</div>
                                        </div>
                                    </td>
                                    <td><span class="font-medium" style="color: #155665;">Laravel Basics</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #187F87; border-color: #187F87;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ২ ঘন্টা
                                        </span>
                                    </td>
                                    <td><span class="font-bold" style="color: #1A998F;">৳১,০০০</span></td>
                                </tr>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১৫</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(24,127,135,0.15); color: #187F87;">
                                                    <span class="text-sm">আ</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">আনিসুল ইসলাম</div>
                                        </div>
                                    </td>
                                    <td><span class="font-medium" style="color: #155665;">API Design</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #155665; border-color: #155665;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ১.৫ ঘন্টা
                                        </span>
                                    </td>
                                    <td><span class="font-bold" style="color: #1A998F;">৳৭৫০</span></td>
                                </tr>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১৮</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(21,86,101,0.15); color: #155665;">
                                                    <span class="text-sm">রি</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">রিফাত হাসান</div>
                                        </div>
                                    </td>
                                    <td><span class="font-medium" style="color: #155665;">Vue Integration</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #102E3C; border-color: #102E3C;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ২ ঘন্টা
                                        </span>
                                    </td>
                                    <td><span class="font-bold" style="color: #1A998F;">৳১,২০০</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Recent Payments Table --}}
            <div class="card shadow-lg border" style="background-color: #ffffff; border-color: #C4CFCE;">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 rounded-full"
                                style="background: linear-gradient(to bottom, #187F87, #102E3C);"></div>
                            <div>
                                <h2 class="text-xl font-bold flex items-center gap-2" style="color: #102E3C;">
                                    <svg class="w-6 h-6" style="color: #187F87;" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                    সাম্প্রতিক পেমেন্টসমূহ
                                </h2>
                                <p class="text-sm mt-1" style="color: #155665; opacity: 0.7;">সর্বশেষ লেনদেনের তালিকা
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-sm gap-2 text-white border-0" style="background-color: #187F87;">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            রিপোর্ট ডাউনলোড
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border" style="border-color: #C4CFCE;">
                        <table class="table">
                            <thead>
                                <tr style="background: linear-gradient(to right, #102E3C, #187F87); color: white;">
                                    <th class="rounded-tl-xl">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                            </svg>
                                            আইডি
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                            মেন্টর
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            পরিমাণ
                                        </div>
                                    </th>
                                    <th>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                            </svg>
                                            মাধ্যম
                                        </div>
                                    </th>
                                    <th class="rounded-tr-xl">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                            </svg>
                                            তারিখ
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১২</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(26,153,143,0.15); color: #1A998F;">
                                                    <span class="text-sm">সা</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">সাদিবুল হাসান</div>
                                        </div>
                                    </td>
                                    <td><span class="font-bold text-lg" style="color: #1A998F;">৳১,০০০</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #1A998F; border-color: #1A998F;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                            বিকাশ
                                        </span>
                                    </td>
                                    <td><span class="text-sm" style="color: #155665;">১২ সেপ্টেম্বর ২০২৬</span></td>
                                </tr>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১৫</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(24,127,135,0.15); color: #187F87;">
                                                    <span class="text-sm">আ</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">আনিসুল ইসলাম</div>
                                        </div>
                                    </td>
                                    <td><span class="font-bold text-lg" style="color: #1A998F;">৳৭৫০</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #155665; border-color: #155665;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                            নগদ
                                        </span>
                                    </td>
                                    <td><span class="text-sm" style="color: #155665;">১২ সেপ্টেম্বর ২০২৬</span></td>
                                </tr>
                                <tr class="hover:bg-teal-50 transition-colors">
                                    <td><span class="badge"
                                            style="background-color: #f0f4f4; color: #155665; border-color: #C4CFCE;">#১৮</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full"
                                                    style="background-color: rgba(21,86,101,0.15); color: #155665;">
                                                    <span class="text-sm">রি</span>
                                                </div>
                                            </div>
                                            <div class="font-semibold" style="color: #102E3C;">রিফাত হাসান</div>
                                        </div>
                                    </td>
                                    <td><span class="font-bold text-lg" style="color: #1A998F;">৳১,২০০</span></td>
                                    <td>
                                        <span class="badge gap-2 text-white"
                                            style="background-color: #102E3C; border-color: #102E3C;">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                            </svg>
                                            ব্যাংক
                                        </span>
                                    </td>
                                    <td><span class="text-sm" style="color: #155665;">১২ সেপ্টেম্বর ২০২৬</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Chart --}}
            @include('dashboard.student-spending-chart')

        </div>
    </div>
</x-layout>
