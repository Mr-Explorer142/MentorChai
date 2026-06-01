<x-layout>
    <div
        class="min-h-screen flex items-center justify-center
                bg-linear-to-br from-teal-50 via-white to-white
                dark:from-[#0f1f2e] dark:via-[#1a2e3b] dark:to-[#0f1f2e]
                px-4">

        <div
            class="bg-white dark:bg-[#1a2e3b]
                    rounded-2xl shadow-sm dark:shadow-[0_1px_3px_rgba(0,0,0,0.4)]
                    border border-teal-100 dark:border-teal-900/40
                    p-8 max-w-md w-full text-center">

            {{-- Icon --}}
            <div
                class="w-16 h-16 rounded-full bg-teal-100 dark:bg-teal-900/40
                        flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor"
                    stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
            </div>

            <h2 class="text-xl font-extrabold text-gray-900 dark:text-gray-100 mb-2">
                ইমেইল যাচাই করুন
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                আপনার অ্যাকাউন্ট সক্রিয় করতে
                <span class="font-semibold text-teal-600 dark:text-teal-400">
                    {{ auth()->user()->email }}
                </span>
                এ পাঠানো যাচাইকরণ লিঙ্কে ক্লিক করুন।
            </p>

            {{-- Success messages --}}
            @if (session('resent'))
                <div
                    class="bg-teal-50 dark:bg-teal-900/20
                            border border-teal-200 dark:border-teal-800
                            text-teal-700 dark:text-teal-300
                            rounded-xl px-4 py-3 text-sm mb-5">
                    ✅ যাচাইকরণ ইমেইল পুনরায় পাঠানো হয়েছে।
                </div>
            @endif

            {{-- Resend form --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-teal-600 dark:bg-teal-500 text-white
                               py-2.5 rounded-xl font-semibold text-sm
                               hover:bg-teal-700 dark:hover:bg-teal-400
                               transition-colors duration-200 mb-3">
                    যাচাইকরণ ইমেইল পুনরায় পাঠান
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs text-gray-400 dark:text-gray-500 hover:underline">
                    লগআউট করুন
                </button>
            </form>

        </div>
    </div>
</x-layout>
