<x-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden transition-colors duration-300 bg-gradient-to-br from-[#f0fafa] via-[#e6f7f7] to-[#f0fafa] dark:from-[#0f1f2e] dark:via-[#152a3b] dark:to-[#0f1f2e]">

        {{-- Background blobs --}}
        <div class="absolute top-20 left-10 w-72 h-72 rounded-full blur-3xl animate-pulse pointer-events-none bg-[#1a9998]/10 dark:bg-[#4db6c1]/10"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full blur-3xl animate-pulse pointer-events-none bg-[#155665]/10 dark:bg-[#7ec8e3]/10" style="animation-delay: 1s;"></div>

        <div class="relative w-full max-w-lg">

            {{-- ── Loader ── --}}
            <div id="loader" class="flex flex-col items-center gap-6 transition-all duration-300">
                <div class="relative">
                    <span class="loading loading-spinner loading-lg w-20 h-20 text-[#1A9998] dark:text-[#4db6c1]"></span>
                    <div class="absolute inset-0 rounded-full blur-xl bg-[#1a9998]/15 dark:bg-[#4db6c1]/15"></div>
                </div>
                <div class="text-center space-y-1.5">
                    <p class="text-lg font-semibold text-[#0d3d3d] dark:text-[#d2f1ff]">পেমেন্ট প্রসেস করা হচ্ছে...</p>
                    <p class="text-sm text-[#155665]/60 dark:text-[#7ec8e3]/60">অনুগ্রহ করে অপেক্ষা করুন</p>
                </div>
            </div>

            {{-- ── Success Card ── --}}
            <div id="successCard" class="hidden opacity-0 scale-95 transition-all duration-700 ease-out">
                <div class="bg-white dark:bg-[#1a2e3b] rounded-3xl shadow-xl overflow-hidden border border-[#1a9998]/15 dark:border-[#4db6c1]/15 shadow-[0_24px_60px_rgba(26,153,152,0.12),0_4px_16px_rgba(0,0,0,0.05)] dark:shadow-[0_24px_60px_rgba(0,0,0,0.4),0_4px_16px_rgba(0,0,0,0.2)]">

                    {{-- Top accent bar --}}
                    <div class="h-1.5 w-full bg-gradient-to-r from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#7ec8e3]"></div>

                    <div class="p-8 sm:p-10">

                        {{-- Success icon --}}
                        <div class="flex justify-center mb-7">
                            <div class="relative">
                                {{-- Ping ring --}}
                                <div class="absolute inset-0 w-28 h-28 rounded-full animate-ping bg-[#1a9998]/15 dark:bg-[#4db6c1]/15"
                                    style="animation-duration: 2s;"></div>
                                {{-- Outer ring --}}
                                <div class="relative w-28 h-28 rounded-full flex items-center justify-center bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 border-[3px] border-[#1a9998]/25 dark:border-[#4db6c1]/25">
                                    {{-- Inner circle --}}
                                    <div class="w-20 h-20 rounded-full flex items-center justify-center shadow-lg bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#155665]">
                                        <svg class="w-11 h-11 text-white dark:text-[#0f1f2e] animate-bounce"
                                            style="animation-duration:1s; animation-iteration-count:3;" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Heading --}}
                        <div class="text-center space-y-2 mb-7">
                            <h2 class="text-3xl sm:text-4xl font-extrabold bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#7ec8e3] bg-clip-text text-transparent">
                                পেমেন্ট সফল!
                            </h2>
                            <p class="text-base font-medium text-[#4a7070] dark:text-[#7ec8e3]/80">আপনার লেনদেন সম্পূর্ণ হয়েছে 🎉</p>
                        </div>

                        {{-- Payment details --}}
                        <div class="rounded-2xl p-5 mb-6 space-y-4 border border-[#1a9998]/15 dark:border-[#4db6c1]/15 bg-gradient-to-br from-[#f7fdfd] to-[#f0fafa] dark:from-[#122333] dark:to-[#1a2e3b]">

                            {{-- Payment method --}}
                            <div class="flex items-center justify-between pb-4 border-b border-[#1a9998]/10 dark:border-[#4db6c1]/15">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-xl bg-[#1a9998]/10 dark:bg-[#4db6c1]/10">
                                        <svg class="w-5 h-5 text-[#1A9998] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-[#155665]/70 dark:text-[#7ec8e3]/70">পেমেন্ট মাধ্যম</span>
                                </div>
                                <span class="font-bold text-[#0d3d3d] dark:text-[#d2f1ff]">{{ ucfirst($paymentMethod) }}</span>
                            </div>

                            {{-- Amount --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-xl bg-[#1a9998]/10 dark:bg-[#4db6c1]/10">
                                        <svg class="w-5 h-5 text-[#1A9998] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-[#155665]/70 dark:text-[#7ec8e3]/70">পরিশোধিত পরিমাণ</span>
                                </div>
                                <span class="text-2xl font-extrabold text-[#1A9998] dark:text-[#4db6c1]">৳{{ number_format($amount, 2) }}</span>
                            </div>

                            {{-- Transaction ID --}}
                            <div class="pt-4 flex items-center justify-between border-t border-[#1a9998]/10 dark:border-[#4db6c1]/15">
                                <span class="text-xs text-[#155665]/50 dark:text-[#7ec8e3]/50">লেনদেন আইডি</span>
                                <span class="text-xs font-mono text-[#2d6e6e] dark:text-[#4db6c1]">#TXN{{ strtoupper(substr(md5(time()), 0, 10)) }}</span>
                            </div>
                        </div>

                        {{-- Session active alert --}}
                        <div class="flex items-start gap-3 rounded-2xl px-4 py-3.5 mb-7 bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 border border-[#1a9998]/25 dark:border-[#4db6c1]/25">
                            <svg class="w-5 h-5 shrink-0 mt-0.5 text-[#1A9998] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="text-sm font-bold text-[#155665] dark:text-[#d2f1ff]">সেশন সক্রিয়!</p>
                                <p class="text-xs mt-0.5 text-[#155665]/70 dark:text-[#7ec8e3]/70">আপনার সেশনটি সফলভাবে বুক করা হয়েছে এবং এখনই শুরু করতে পারবেন</p>
                            </div>
                        </div>

                        {{-- Action buttons --}}
                        <div class="space-y-3">
                            <a href="{{ route('live-session') }}"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl font-bold text-white text-sm transition-all duration-300 hover:-translate-y-0.5 bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#28666e] dark:text-[#0f1f2e] shadow-[0_6px_20px_rgba(26,153,152,0.35)] dark:shadow-[0_6px_20px_rgba(77,182,193,0.2)]">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                </svg>
                                সেশনে যুক্ত হন
                            </a>

                            <a href="{{ route('student_dashboard') }}"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5 border-[1.5px] border-[#1a9998]/35 dark:border-[#4db6c1]/35 text-[#1A9998] dark:text-[#4db6c1] bg-[#1a9998]/5 dark:bg-transparent hover:bg-[#1a9998]/10 dark:hover:bg-[#4db6c1]/10">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                ড্যাশবোর্ডে ফিরে যান
                            </a>
                        </div>

                        {{-- Footer --}}
                        <div class="text-center mt-6 pt-5 border-t border-[#1a9998]/10 dark:border-[#4db6c1]/15">
                            <p class="text-xs text-[#155665]/45 dark:text-[#7ec8e3]/50">পেমেন্ট রিসিট আপনার ইমেইলে পাঠানো হয়েছে</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        setTimeout(() => {
            const loader = document.getElementById('loader');
            const successCard = document.getElementById('successCard');

            loader.style.opacity = '0';
            loader.style.transform = 'scale(0.9)';

            setTimeout(() => {
                loader.classList.add('hidden');
                successCard.classList.remove('hidden');
                setTimeout(() => {
                    successCard.style.opacity = '1';
                    successCard.style.transform = 'scale(1)';
                }, 50);
            }, 300);
        }, 2000);
    </script>
</x-layout>
