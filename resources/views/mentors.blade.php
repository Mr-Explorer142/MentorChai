<x-layout>
    <div class="flex flex-col p-5 min-h-screen bg-base-200">
        {{-- Success Message --}}
        <div class="my-3">
            @if (session('success'))
                <div id="success-alert" role="alert"
                    class="alert alert-success w-full max-w-2xl mx-auto transition-opacity duration-700 opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($mentors as $mentor)
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border border-base-200 hover:border-primary/50 group">
                    <div class="card-body p-6">

                        {{-- Header with Avatar and Status --}}
                        <div class="flex items-start gap-4 mb-4">
                            <div class="avatar {{ $mentor->is_online ? 'online' : 'offline' }} placeholder">
                                <div
                                    class="w-16 h-16 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 ring ring-primary/20 ring-offset-2 ring-offset-base-100 group-hover:ring-primary/40 transition-all">
                                    <span class="text-2xl font-bold text-primary">
                                        {{ substr($mentor->name, 0, 1) }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-1 min-w-0">
                                <h3 class="card-title text-lg font-bold text-base-content mb-1 truncate">
                                    {{ $mentor->name }}
                                </h3>
                                <div class="flex items-center gap-2">
                                    @if ($mentor->is_online)
                                        <span class="flex items-center gap-1.5 text-xs font-medium text-success">
                                            <span class="w-2 h-2 bg-success rounded-full animate-pulse"></span>
                                            অনলাইনে আছেন
                                        </span>
                                    @else
                                        <span
                                            class="flex items-center gap-1.5 text-xs font-medium text-base-content/60">
                                            <span class="w-2 h-2 bg-base-content/40 rounded-full"></span>
                                            অফলাইনে আছেন
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Institution & Education --}}
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center gap-2 text-sm">
                                <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                </svg>
                                <span class="font-medium text-base-content/80 truncate">
                                    {{ $mentor->profile->institution_name ?? 'প্রতিষ্ঠান নাম যোগ করা হয়নি' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                <svg class="w-4 h-4 text-secondary flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                <span class="font-medium text-base-content/80 truncate">
                                    {{ $mentor->profile->highgest_education_level ?? 'শিক্ষাগত যোগ্যতা যোগ করা হয়নি' }}
                                </span>
                            </div>
                        </div>

                        {{-- Hourly Rate --}}
                        <div
                            class="bg-gradient-to-r from-warning/10 to-warning/5 border border-warning/30 rounded-xl p-3 mb-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-base-content/70">ঘণ্টা প্রতি চার্জ</span>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-warning" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-lg font-bold text-warning">
                                        ৳{{ $mentor->profile->hourly_rate ? number_format($mentor->profile->hourly_rate) : 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Skills --}}
                        <div class="mb-4">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                </svg>
                                <span class="text-sm font-semibold text-base-content/70">দক্ষতা</span>
                            </div>
                            @if (!empty($mentor->profile->skills))
                                <div class="flex gap-2 flex-wrap max-h-20 overflow-y-auto custom-scrollbar">
                                    @foreach (array_slice(explode(',', $mentor->profile->skills), 0, 6) as $skill)
                                        <span
                                            class="badge badge-sm badge-outline hover:badge-primary transition-colors">
                                            {{ trim($skill) }}
                                        </span>
                                    @endforeach
                                    @if (count(explode(',', $mentor->profile->skills)) > 6)
                                        <span class="badge badge-sm badge-ghost">
                                            +{{ count(explode(',', $mentor->profile->skills)) - 6 }}
                                        </span>
                                    @endif
                                </div>
                            @else
                                <p class="text-xs text-base-content/50 italic">কোনো দক্ষতা যোগ করা হয়নি</p>
                            @endif
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-2 pt-4 border-t border-base-200">
                            <a class="btn btn-outline btn-primary flex-1 gap-2 hover:scale-105 transition-transform text-sm"
                                href="{{ route('mentor_profile', $mentor->id) }}">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                প্রোফাইল
                            </a>
                            <a href="{{ route('checkout') }}"
                                class="btn btn-secondary flex-1 gap-2 hover:scale-105 transition-transform text-sm shadow-lg">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                                হায়ার করুন
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 px-4">
                    <div class="text-center space-y-4">
                        <svg class="w-24 h-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24"
                            stroke-width="1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                        <div>
                            <h3 class="text-xl font-bold text-base-content mb-2">কোনো মেন্টর পাওয়া যায়নি</h3>
                            <p class="text-base-content/60">দয়া করে পরে আবার চেষ্টা করুন বা ফিল্টার পরিবর্তন করুন</p>
                        </div>
                        <button class="btn btn-primary gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            রিফ্রেশ করুন
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

</x-layout>
