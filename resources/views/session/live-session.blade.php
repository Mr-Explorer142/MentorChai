<x-layout>
    <div
        class="min-h-screen p-4 md:p-8 transition-colors duration-300 bg-gradient-to-br from-[#f0fafa] via-[#e8f7f6] to-[#f0fafa] dark:from-[#0f1f2e] dark:via-[#152a3b] dark:to-[#0f1f2e]">

        {{-- ── Page Header ── --}}
        <div class="mb-6">
            <p class="text-xs font-bold uppercase tracking-widest mb-1 text-[#1A9998] dark:text-[#4db6c1]">সক্রিয় সেশন
            </p>
            <h1 class="text-2xl font-extrabold text-[#0d3d3d] dark:text-[#d2f1ff]">লাইভ মেন্টরিং সেশন</h1>
            <div class="flex items-center gap-2 mt-2">
                <span class="text-sm font-semibold text-[#155665]/60 dark:text-[#7ec8e3]/60">Topic :</span>
                <span
                    class="text-sm font-bold px-3 py-0.5 rounded-full bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#155665] dark:text-[#7ec8e3] border border-[#1a9998]/20 dark:border-[#4db6c1]/20">
                    {{ $session->topic->topic }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            {{-- ══════════ MAIN VIDEO AREA ══════════ --}}
            <div class="lg:col-span-8 space-y-5">

                {{-- Live Video Card --}}
                <div
                    class="bg-white dark:bg-[#1a2e3b] rounded-2xl overflow-hidden shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15 shadow-[0_4px_20px_rgba(26,153,152,0.08)] dark:shadow-[0_4px_20px_rgba(0,0,0,0.3)]">

                    {{-- ZegoCloud mounts here --}}
                    <div id="zego-container"
                        style="width:100%;height:520px;border-radius:1rem 1rem 0 0;overflow:hidden;"></div>

                    {{-- Session meta --}}
                    <div class="px-5 py-4 flex flex-wrap justify-between items-center gap-3">
                        <div>
                            <p class="font-bold text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->topic->topic }}</p>
                            <p class="text-sm mt-0.5 text-[#155665]/60 dark:text-[#7ec8e3]/60">
                                শুরু হয়েছে {{ $session->started_at?->format('h:i A') ?? 'এখনই' }}
                            </p>
                        </div>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#1A9998] dark:text-[#4db6c1] border border-[#1a9998]/25 dark:border-[#4db6c1]/25">
                            {{ $roomId }}
                        </span>
                    </div>
                </div>

                {{-- Mentor Info --}}
                <div
                    class="bg-white dark:bg-[#1a2e3b] rounded-2xl px-5 py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <div class="flex flex-col sm:flex-row gap-4 items-center sm:items-start">
                        <div class="avatar placeholder shrink-0">
                            @if($session->mentor->profile?->avatar)
                            <img src="{{ asset('storage/' . $session->mentor->profile->avatar) }}"
                                class="w-16 rounded-full object-cover" alt="{{ $session->mentor->name }}">
                            @else
                            <div
                                class="w-16 rounded-full font-bold text-2xl grid place-items-center text-white bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#155665]">
                                {{ strtoupper(substr($session->mentor->name, 0, 1)) }}
                            </div>
                            @endif
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <p class="font-bold text-lg text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->mentor->name }}
                            </p>
                            <p class="text-sm text-[#155665]/60 dark:text-[#7ec8e3]/60">মেন্টর</p>
                            @if($session->mentor->profile?->bio)
                            <p class="text-sm mt-2 text-[#4a7070] dark:text-[#7ec8e3]/80">
                                {{ Str::limit($session->mentor->profile->bio, 100) }}
                            </p>
                            @endif
                        </div>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#1A9998] dark:text-[#4db6c1] border border-[#1a9998]/25 dark:border-[#4db6c1]/25">
                            Host
                        </span>
                    </div>
                </div>

            </div>

            {{-- ══════════ RIGHT SIDEBAR ══════════ --}}
            <div class="lg:col-span-4 space-y-5">

                {{-- Session Details --}}
                <div
                    class="bg-white dark:bg-[#1a2e3b] rounded-2xl px-5 py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <h2 class="font-bold text-sm mb-4 text-[#0d3d3d] dark:text-[#d2f1ff]">সেশন বিবরণ</h2>

                    <div class="space-y-3 pt-4 border-t border-[#1a9998]/10 dark:border-[#4db6c1]/15">

                        <div class="flex items-start gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 pt-0.5 text-[#155665]/50 dark:text-[#7ec8e3]/50">Topic</span>
                            <span class="text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{
                                $session->topic->topic }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">মেন্টর</span>
                            <span class="text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{
                                $session->mentor->name }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">শিক্ষার্থী</span>
                            <span class="text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{
                                $session->student->name }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">শুরু</span>
                            <span class="text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">
                                {{ $session->started_at?->format('d M Y, h:i A') ?? 'এখনই' }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Room</span>
                            <span class="text-sm font-mono text-[#1A9998] dark:text-[#4db6c1]">{{ $roomId }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-bold w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">পরিমাণ</span>
                            <span class="text-sm font-bold text-[#2d6e6e] dark:text-[#d2f1ff]">৳{{
                                number_format($session->amount, 2) }}</span>
                        </div>

                    </div>
                </div>

                {{-- Participants --}}
                <div
                    class="bg-white dark:bg-[#1a2e3b] rounded-2xl px-5 py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <h2 class="font-bold text-sm mb-4 text-[#0d3d3d] dark:text-[#d2f1ff]">অংশগ্রহণকারী</h2>

                    <div class="space-y-3">
                        {{-- Mentor --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-full grid place-items-center text-sm font-bold text-white bg-gradient-to-br from-[#1A9998] to-[#155665] shrink-0">
                                {{ strtoupper(substr($session->mentor->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold truncate text-[#0d3d3d] dark:text-[#d2f1ff]">{{
                                    $session->mentor->name }}</p>
                                <p class="text-xs text-[#155665]/50 dark:text-[#7ec8e3]/50">মেন্টর · Host</p>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                        </div>

                        {{-- Student --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-full grid place-items-center text-sm font-bold text-white bg-gradient-to-br from-[#155665] to-[#0d3d3d] shrink-0">
                                {{ strtoupper(substr($session->student->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold truncate text-[#0d3d3d] dark:text-[#d2f1ff]">{{
                                    $session->student->name }}</p>
                                <p class="text-xs text-[#155665]/50 dark:text-[#7ec8e3]/50">শিক্ষার্থী</p>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ══════════ REVIEW SECTION (student only) ══════════ --}}
        @if(auth()->id() === $session->student_id)
        <div class="mt-8">
            <div
                class="bg-white dark:bg-[#1a2e3b] rounded-2xl shadow-sm max-w-2xl mx-auto overflow-hidden transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">

                <div class="h-1 bg-gradient-to-r from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#7ec8e3]">
                </div>

                <div class="p-7 space-y-6">
                    <div>
                        <h2 class="text-lg font-bold text-[#0d3d3d] dark:text-[#d2f1ff]">রিভিউ সাবমিট করুন</h2>
                        <p class="text-sm mt-1 text-[#155665]/60 dark:text-[#7ec8e3]/60">সেশন সম্পর্কে আপনার মতামত
                            শেয়ার করুন</p>
                    </div>

                    <form method="POST" action="#" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold mb-2 text-[#155665] dark:text-[#7ec8e3]">আপনার
                                রেটিং</label>
                            <div class="rating rating-lg">
                                <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-warning" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold mb-2 text-[#155665] dark:text-[#7ec8e3]">বিস্তারিত
                                লিখুন</label>
                            <textarea
                                class="textarea w-full resize-none text-sm focus:outline-none rounded-2xl bg-[#f7fdfd] dark:bg-[#122333] text-[#2d6e6e] dark:text-[#d2f1ff] border border-[#1a9998]/25 dark:border-[#4db6c1]/25"
                                rows="4" name="comment"
                                placeholder="সেশন সম্পর্কে আপনার মতামত শেয়ার করুন..."></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white dark:text-[#0f1f2e] transition-all hover:-translate-y-0.5 bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#28666e] shadow-[0_4px_14px_rgba(26,153,152,0.3)]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0l-4.725 2.885a.562.562 0 01-.84-.61l1.285-5.385a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                রিভিউ দিন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    </div>

    {{-- TEMP DEBUG - remove after fixing --}}
    <div style="display:none" id="zego-debug">
        appID: {{ $appId }} |
        appSign length: {{ strlen($appSign) }} |
        roomID: mc-{{ $roomId }} |
        userID: {{ $userId }}
    </div>

    <script>
        window.ZEGO_CONFIG = {
        appID:    {{ $appId }},
        appSign:  "{{ $appSign }}",
        roomID:   "mc-{{ $roomId }}",
        userID:   "{{ $userId }}",
        userName: "{{ $userName }}",
        userRole: "{{ $userRole }}",
    };
    </script>
    @vite(['resources/js/video-call.js'])
</x-layout>