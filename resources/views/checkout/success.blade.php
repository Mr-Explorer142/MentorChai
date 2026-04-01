<x-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden"
        style="background: linear-gradient(135deg, #f0fafa 0%, #e6f7f7 50%, #f0fafa 100%);">

        {{-- Background blobs --}}
        <div class="absolute top-20 left-10 w-72 h-72 rounded-full blur-3xl animate-pulse pointer-events-none"
            style="background: rgba(26,153,152,0.08);"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full blur-3xl animate-pulse pointer-events-none"
            style="background: rgba(21,86,101,0.06); animation-delay: 1s;"></div>

        <div class="relative w-full max-w-lg">

            {{-- ── Loader ── --}}
            <div id="loader" class="flex flex-col items-center gap-6 transition-all duration-300">
                <div class="relative">
                    <span class="loading loading-spinner loading-lg w-20 h-20" style="color:#1A9998;"></span>
                    <div class="absolute inset-0 rounded-full blur-xl" style="background: rgba(26,153,152,0.12);"></div>
                </div>
                <div class="text-center space-y-1.5">
                    <p class="text-lg font-semibold" style="color:#0d3d3d;">পেমেন্ট প্রসেস করা হচ্ছে...</p>
                    <p class="text-sm" style="color:rgba(21,86,101,0.6);">অনুগ্রহ করে অপেক্ষা করুন</p>
                </div>
            </div>

            {{-- ── Success Card ── --}}
            <div id="successCard" class="hidden opacity-0 scale-95 transition-all duration-700 ease-out">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden"
                    style="border: 1px solid rgba(26,153,152,0.15); box-shadow: 0 24px 60px rgba(26,153,152,0.12), 0 4px 16px rgba(0,0,0,0.05);">

                    {{-- Top accent bar --}}
                    <div class="h-1.5 w-full" style="background: linear-gradient(90deg, #1A9998, #155665);"></div>

                    <div class="p-8 sm:p-10">

                        {{-- Success icon --}}
                        <div class="flex justify-center mb-7">
                            <div class="relative">
                                {{-- Ping ring --}}
                                <div class="absolute inset-0 w-28 h-28 rounded-full animate-ping"
                                    style="background: rgba(26,153,152,0.15); animation-duration: 2s;"></div>
                                {{-- Outer ring --}}
                                <div class="relative w-28 h-28 rounded-full flex items-center justify-center"
                                    style="background: rgba(26,153,152,0.08); border: 3px solid rgba(26,153,152,0.25);">
                                    {{-- Inner circle --}}
                                    <div class="w-20 h-20 rounded-full flex items-center justify-center shadow-lg"
                                        style="background: linear-gradient(135deg, #1A9998, #155665);">
                                        <svg class="w-11 h-11 text-white animate-bounce"
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
                            <h2 class="text-3xl sm:text-4xl font-extrabold"
                                style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                পেমেন্ট সফল!
                            </h2>
                            <p class="text-base font-medium" style="color:#4a7070;">আপনার লেনদেন সম্পূর্ণ হয়েছে 🎉</p>
                        </div>

                        {{-- Payment details --}}
                        <div class="rounded-2xl p-5 mb-6 space-y-4"
                            style="background: linear-gradient(135deg, #f7fdfd, #f0fafa); border: 1px solid rgba(26,153,152,0.15);">

                            {{-- Payment method --}}
                            <div class="flex items-center justify-between pb-4"
                                style="border-bottom: 1px solid rgba(26,153,152,0.12);">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-xl" style="background: rgba(26,153,152,0.1);">
                                        <svg class="w-5 h-5" style="color:#1A9998;" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium" style="color:rgba(21,86,101,0.7);">পেমেন্ট
                                        মাধ্যম</span>
                                </div>
                                <span class="font-bold" style="color:#0d3d3d;">{{ ucfirst($paymentMethod) }}</span>
                            </div>

                            {{-- Amount --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-xl" style="background: rgba(26,153,152,0.1);">
                                        <svg class="w-5 h-5" style="color:#1A9998;" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium" style="color:rgba(21,86,101,0.7);">পরিশোধিত
                                        পরিমাণ</span>
                                </div>
                                <span class="text-2xl font-extrabold" style="color:#1A9998;">৳{{ number_format($amount,
                                    2) }}</span>
                            </div>

                            {{-- Transaction ID --}}
                            <div class="pt-4 flex items-center justify-between"
                                style="border-top: 1px solid rgba(26,153,152,0.12);">
                                <span class="text-xs" style="color:rgba(21,86,101,0.5);">লেনদেন আইডি</span>
                                <span class="text-xs font-mono" style="color:#2d6e6e;">#TXN{{
                                    strtoupper(substr(md5(time()), 0, 10)) }}</span>
                            </div>
                        </div>

                        {{-- Session active alert --}}
                        <div class="flex items-start gap-3 rounded-2xl px-4 py-3.5 mb-7"
                            style="background: rgba(26,153,152,0.08); border: 1px solid rgba(26,153,152,0.25);">
                            <svg class="w-5 h-5 shrink-0 mt-0.5" style="color:#1A9998;" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="text-sm font-bold" style="color:#155665;">সেশন সক্রিয়!</p>
                                <p class="text-xs mt-0.5" style="color:rgba(21,86,101,0.7);">আপনার সেশনটি সফলভাবে বুক
                                    করা হয়েছে এবং এখনই শুরু করতে পারবেন</p>
                            </div>
                        </div>

                        {{-- Action buttons --}}
                        <div class="space-y-3">
                            <a href="{{ route('live-session') }}"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl font-bold text-white text-sm transition-all duration-300 hover:-translate-y-0.5"
                                style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 6px 20px rgba(26,153,152,0.35);">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                </svg>
                                সেশনে যুক্ত হন
                            </a>

                            <a href="{{ route('student_dashboard') }}"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5"
                                style="border: 1.5px solid rgba(26,153,152,0.35); color:#1A9998; background:rgba(26,153,152,0.04);">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                ড্যাশবোর্ডে ফিরে যান
                            </a>
                        </div>

                        {{-- Footer --}}
                        <div class="text-center mt-6 pt-5" style="border-top: 1px solid rgba(26,153,152,0.1);">
                            <p class="text-xs" style="color:rgba(21,86,101,0.45);">পেমেন্ট রিসিট আপনার ইমেইলে পাঠানো
                                হয়েছে</p>
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
