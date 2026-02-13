<x-layout>
    <div
        class="min-h-screen bg-gradient-to-br from-base-200 via-base-100 to-base-200 flex items-center justify-center px-4 py-8">

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-success/5 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="relative w-full max-w-lg">
            <!-- Loader -->
            <div id="loader" class="flex flex-col items-center gap-6">
                <div class="relative">
                    <span class="loading loading-spinner loading-lg text-success w-20 h-20"></span>
                    <div class="absolute inset-0 bg-success/10 rounded-full blur-xl"></div>
                </div>
                <div class="text-center space-y-2">
                    <p class="text-lg font-semibold text-base-content">
                        পেমেন্ট প্রসেস করা হচ্ছে...
                    </p>
                    <p class="text-sm text-base-content/60">
                        অনুগ্রহ করে অপেক্ষা করুন
                    </p>
                </div>
            </div>

            <!-- Success Card -->
            <div id="successCard" class="hidden opacity-0 scale-95 transition-all duration-700 ease-out">
                <div class="card bg-base-100 shadow-2xl border border-base-200">
                    <div class="card-body p-8 sm:p-10">

                        <!-- Success Icon with Animation -->
                        <div class="flex justify-center mb-6">
                            <div id="checkWrapper" class="relative">
                                <!-- Outer Ring -->
                                <div class="absolute inset-0 w-28 h-28 rounded-full bg-gradient-to-br from-success/30 to-success/10 animate-ping"
                                    style="animation-duration: 2s;"></div>

                                <!-- Middle Ring -->
                                <div
                                    class="relative w-28 h-28 rounded-full bg-gradient-to-br from-success/20 to-success/5 flex items-center justify-center border-4 border-success/30">
                                    <!-- Inner Circle -->
                                    <div
                                        class="w-20 h-20 rounded-full bg-gradient-to-br from-success to-success/80 flex items-center justify-center shadow-lg">
                                        <svg class="w-12 h-12 text-white animate-bounce"
                                            style="animation-duration: 1s; animation-iteration-count: 3;" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        <div class="text-center space-y-3 mb-6">
                            <h2
                                class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-success to-success/70 bg-clip-text text-transparent">
                                পেমেন্ট সফল!
                            </h2>
                            <p class="text-lg font-medium text-base-content/80">
                                আপনার লেনদেন সম্পূর্ণ হয়েছে 🎉
                            </p>
                        </div>

                        <!-- Payment Details Card -->
                        <div
                            class="bg-gradient-to-br from-base-200 to-base-100 rounded-2xl p-6 mb-6 border border-base-300 shadow-sm">
                            <div class="space-y-4">
                                <!-- Payment Method -->
                                <div class="flex items-center justify-between pb-4 border-b border-base-300">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-primary/10 rounded-lg">
                                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-base-content/70">পেমেন্ট মাধ্যম</span>
                                    </div>
                                    <span class="font-bold text-base-content">{{ ucfirst($paymentMethod) }}</span>
                                </div>

                                <!-- Amount -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-success/10 rounded-lg">
                                            <svg class="w-5 h-5 text-success" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-base-content/70">পরিশোধিত পরিমাণ</span>
                                    </div>
                                    <span
                                        class="text-2xl font-bold text-success">৳{{ number_format($amount, 2) }}</span>
                                </div>

                                <!-- Transaction ID -->
                                <div class="pt-4 border-t border-base-300">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-base-content/60">লেনদেন আইডি</span>
                                        <span
                                            class="text-xs font-mono text-base-content/80">#TXN{{ strtoupper(substr(md5(time()), 0, 10)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Success Note -->
                        <div class="alert alert-success mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm">
                                <h3 class="font-bold">সেশন সক্রিয়!</h3>
                                <div class="text-xs opacity-90">আপনার সেশনটি সফলভাবে বুক করা হয়েছে এবং এখনই শুরু করতে
                                    পারবেন</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('live-session') }}"
                                class="btn btn-success btn-block gap-2 shadow-lg hover:shadow-xl transition-all">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                </svg>
                                সেশনে যুক্ত হন
                            </a>

                            <a href="{{ route('student_dashboard') }}"
                                class="btn btn-outline btn-block gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                ড্যাশবোর্ডে ফিরে যান
                            </a>
                        </div>

                        <!-- Footer Note -->
                        <div class="text-center mt-6 pt-6 border-t border-base-200">
                            <p class="text-xs text-base-content/50">
                                পেমেন্ট রিসিট আপনার ইমেইলে পাঠানো হয়েছে
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Simulate payment processing
        setTimeout(() => {
            const loader = document.getElementById('loader');
            const successCard = document.getElementById('successCard');

            // Hide loader
            loader.style.opacity = '0';
            loader.style.transform = 'scale(0.9)';

            setTimeout(() => {
                loader.classList.add('hidden');

                // Show success card
                successCard.classList.remove('hidden');

                // Trigger animation
                setTimeout(() => {
                    successCard.style.opacity = '1';
                    successCard.style.transform = 'scale(1)';
                }, 50);
            }, 300);
        }, 2000); // 2 seconds delay for demo
    </script>
</x-layout>
