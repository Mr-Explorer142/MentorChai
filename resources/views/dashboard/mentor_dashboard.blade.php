<x-layout>
    <div class="min-h-screen bg-linear-to-br from-base-200 via-base-100 to-base-200 py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Welcome Header Card --}}
            <div
                class="card bg-linear-to-br from-primary to-secondary text-primary-content shadow-2xl overflow-hidden">
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItaDJhMiAyIDAgMCAxIDAgNGgtMmEyIDIgMCAwIDEtMi0ydi0yYTIgMiAwIDAgMSAyLTJoMnYtMmgtMmEyIDIgMCAwIDEgMC00aDJhMiAyIDAgMCAxIDIgMnYyYTIgMiAwIDAgMS0yIDJoLTJ6bTAtMTZ2LTJoLTJhMiAyIDAgMCAxIDAtNGgyYTIgMiAwIDAgMSAyIDJ2MmEyIDIgMCAwIDEtMiAyaC0ydi0yaDF6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-10">
                </div>

                <div class="card-body relative">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">

                        <div class="flex-1 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-16 bg-white/50 rounded-full"></div>
                                <div>
                                    <h1 class="text-3xl sm:text-4xl font-bold mb-2 drop-shadow-lg">
                                        স্বাগতম, {{ $mentor->name }}
                                    </h1>
                                    <div class="flex flex-wrap gap-4 text-sm opacity-90">
                                        <div
                                            class="flex items-center gap-2 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-sm">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                            </svg>
                                            মেন্টর আইডি: #{{ $mentor->id }}
                                        </div>
                                        <div
                                            class="flex items-center gap-2 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-sm">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                            </svg>
                                            যোগদানের তারিখ: {{ $mentor->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="avatar online">
                            <div
                                class="w-20 h-20 rounded-full ring ring-white ring-offset-4 ring-offset-primary shadow-2xl">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=ffffff&color=0D8ABC&size=200&font-size=0.4&bold=true"
                                    alt="Mentor Avatar" class="object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Cards Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Sessions Card --}}
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border border-base-200">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-linear-to-br from-primary/20 to-primary/10 rounded-xl">
                                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-base-content">মোট সেশন</h2>
                                    <p class="text-sm text-base-content/60">সকল সেশনের সারসংক্ষেপ</p>
                                </div>
                            </div>
                            <div class="badge badge-primary badge-lg gap-2 shadow-lg">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5" />
                                </svg>
                                ২০
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div
                                class="bg-linear-to-br from-success/10 to-success/5 rounded-xl p-4 border border-success/20 hover:scale-105 transition-transform">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-success" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-success">১০</p>
                                        <p class="text-xs text-base-content/70 mt-1">সম্পন্ন</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-linear-to-br from-warning/10 to-warning/5 rounded-xl p-4 border border-warning/20 hover:scale-105 transition-transform">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-warning" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-warning">১০</p>
                                        <p class="text-xs text-base-content/70 mt-1">প্রক্রিয়াধীন</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-linear-to-br from-error/10 to-error/5 rounded-xl p-4 border border-error/20 hover:scale-105 transition-transform">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-error" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-error">০</p>
                                        <p class="text-xs text-base-content/70 mt-1">বাতিলকৃত</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment Card --}}
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border border-base-200">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-linear-to-br from-secondary/20 to-secondary/10 rounded-xl">
                                    <svg class="w-6 h-6 text-secondary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-base-content">মোট আয়</h2>
                                    <p class="text-sm text-base-content/60">সর্বমোট পরিশোধিত অর্থ</p>
                                </div>
                            </div>
                            <div class="badge badge-secondary badge-lg gap-2 shadow-lg font-bold">
                                ৳১০,০০০
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div
                                class="flex justify-between items-center bg-linear-to-r from-base-200 to-base-100 p-4 rounded-xl hover:shadow-md transition-shadow border border-base-300">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-info/10 rounded-lg">
                                        <svg class="w-5 h-5 text-info" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-base-content/80">বিগত সপ্তাহ</span>
                                </div>
                                <span class="font-bold text-lg">৳১,০০০</span>
                            </div>

                            <div
                                class="flex justify-between items-center bg-linear-to-r from-base-200 to-base-100 p-4 rounded-xl hover:shadow-md transition-shadow border border-base-300">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-primary/10 rounded-lg">
                                        <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-base-content/80">বিগত মাস</span>
                                </div>
                                <span class="font-bold text-lg">৳১,০০০</span>
                            </div>

                            <div
                                class="flex justify-between items-center bg-linear-to-r from-base-200 to-base-100 p-4 rounded-xl hover:shadow-md transition-shadow border border-base-300">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-success/10 rounded-lg">
                                        <svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-base-content/80">বিগত বছর</span>
                                </div>
                                <span class="font-bold text-lg">৳১,০০,০০০</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Recent Sessions Table --}}
            <div class="card bg-base-100 shadow-xl border border-base-200">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 bg-linear-to-b from-primary to-secondary rounded-full"></div>
                            <div>
                                <h2 class="text-xl font-bold text-base-content flex items-center gap-2">
                                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    সাম্প্রতিক সেশনসমূহ
                                </h2>
                                <p class="text-sm text-base-content/60 mt-1">শেষ কয়েকটি সেশনের বিবরণ</p>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            নতুন সেশন
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-base-200">
                        <table class="table">
                            <thead class="bg-linear-to-r from-primary to-primary/80 text-primary-content">
                                <tr>
                                    <th class="rounded-tl-lg">
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
                                    <th class="rounded-tr-lg">
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
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১২</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-primary/10 text-primary">
                                                    <span class="text-sm">সা</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">সাদিবুল হাসান</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-medium">Laravel Basics</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ২ ঘন্টা
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success">৳১,০০০</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১৫</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-secondary/10 text-secondary">
                                                    <span class="text-sm">আ</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">আনিসুল ইসলাম</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-medium">API Design</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ১.৫ ঘন্টা
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success">৳৭৫০</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১৮</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-accent/10 text-accent">
                                                    <span class="text-sm">রি</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">রিফাত হাসান</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-medium">Vue Integration</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ২ ঘন্টা
                                        </span>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success">৳১,২০০</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Recent Payments Table --}}
            <div class="card bg-base-100 shadow-xl border border-base-200">
                <div class="card-body">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-10 bg-linear-to-b from-secondary to-accent rounded-full"></div>
                            <div>
                                <h2 class="text-xl font-bold text-base-content flex items-center gap-2">
                                    <svg class="w-6 h-6 text-secondary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                    সাম্প্রতিক পেমেন্টসমূহ
                                </h2>
                                <p class="text-sm text-base-content/60 mt-1">সর্বশেষ লেনদেনের তালিকা</p>
                            </div>
                        </div>
                        <button class="btn btn-secondary btn-sm gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            রিপোর্ট ডাউনলোড
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-base-200">
                        <table class="table">
                            <thead class="bg-linear-to-r from-secondary to-secondary/80 text-secondary-content">
                                <tr>
                                    <th class="rounded-tl-lg">
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
                                    <th class="rounded-tr-lg">
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
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১২</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-primary/10 text-primary">
                                                    <span class="text-sm">সা</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">সাদিবুল হাসান</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success text-lg">৳১,০০০</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                            বিকাশ
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-sm text-base-content/70">১২ সেপ্টেম্বর ২০২৬</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১৫</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-secondary/10 text-secondary">
                                                    <span class="text-sm">আ</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">আনিসুল ইসলাম</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success text-lg">৳৭৫০</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                            নগদ
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-sm text-base-content/70">১২ সেপ্টেম্বর ২০২৬</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-base-200/50 transition-colors">
                                    <td>
                                        <span class="badge badge-ghost">#১৮</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="w-10 rounded-full bg-accent/10 text-accent">
                                                    <span class="text-sm">রি</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-semibold">রিফাত হাসান</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-bold text-success text-lg">৳১,২০০</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info gap-2">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                            </svg>
                                            ব্যাংক
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-sm text-base-content/70">১২ সেপ্টেম্বর ২০২৬</span>
                                    </td>
                                </tr>
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
