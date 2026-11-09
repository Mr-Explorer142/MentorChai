<x-layout>

    {{-- ═══════════════════════════════════════════
    FORGOT PASSWORD PAGE
    ═══════════════════════════════════════════ --}}

    <div class="relative min-h-screen overflow-hidden flex items-center justify-center px-4 sm:px-6 lg:px-8 py-8 sm:py-16
                bg-linear-to-br from-[#eef7f8] via-[#f8fdfe] to-[#f0f9f4]
                dark:from-[#0f1f2e] dark:via-[#1a2e3b] dark:to-[#0f2a20]
                transition-colors duration-300">

        {{-- Blob 1 --}}
        <div class="pointer-events-none absolute -top-16 -left-16 w-80 h-80 rounded-full
                    bg-[radial-gradient(circle,rgba(40,102,110,0.08),transparent_70%)]
                    dark:bg-[radial-gradient(circle,rgba(77,182,193,0.08),transparent_70%)]"></div>

        {{-- Blob 2 --}}
        <div class="pointer-events-none absolute -bottom-20 -right-16 w-[420px] h-[420px] rounded-full
                    bg-[radial-gradient(circle,rgba(124,152,133,0.07),transparent_70%)]
                    dark:bg-[radial-gradient(circle,rgba(154,184,165,0.06),transparent_70%)]"></div>

        <div class="w-full max-w-[340px] sm:max-w-[440px] relative z-10 mx-auto">

            {{-- Brand Header --}}
            <div class="text-center mb-5 sm:mb-8">
                <div class="hidden sm:flex w-[60px] h-[60px] rounded-[18px] mx-auto mb-4
                            bg-linear-to-br from-[#28666e] to-[#033f63]
                            dark:from-[#4db6c1] dark:to-[#28666e]
                            items-center justify-center
                            shadow-[0_6px_20px_rgba(40,102,110,0.25)] dark:shadow-[0_6px_20px_rgba(77,182,193,0.2)]">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                </div>
                <h1 class="font-[Lora,serif] text-xl sm:text-[1.85rem] font-bold block
                           bg-linear-to-br from-[#28666e] via-[#033f63] to-[#7c9885]
                           dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                           bg-clip-text text-transparent">Reset Password</h1>
                <p class="text-xs sm:text-sm mt-2 text-[#033f63]/60 dark:text-[#7ec8e3]/60 leading-relaxed">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
                </p>
            </div>

            {{-- Card Container --}}
            <div class="bg-white dark:bg-[#1a2e3b]
                        rounded-3xl border border-[#28666e]/10 dark:border-[#4db6c1]/15
                        shadow-[0_8px_40px_rgba(40,102,110,0.1)] dark:shadow-[0_8px_40px_rgba(0,0,0,0.4)]
                        p-5 sm:p-9
                        animate-[authFadeUp_0.4s_ease_both]
                        transition-colors duration-300">

                <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="hidden sm:flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            Email Address
                        </label>
                        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 sm:py-2.5 rounded-xl text-xs sm:text-[0.9rem]
                                      font-[Nunito,sans-serif] outline-none
                                      border-[1.5px] @error('email') border-red-500 dark:border-red-400 focus:border-red-500 dark:focus:border-red-400 focus:ring-red-500/10 @else border-[#28666e]/18 dark:border-[#4db6c1]/20 focus:border-[#28666e] dark:focus:border-[#4db6c1] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10 @enderror
                                      bg-white dark:bg-[#0f1f2e]/50
                                      text-[#033f63] dark:text-[#7ec8e3]
                                      placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                      transition-all duration-200
                                      focus:ring-[3px]
                                      focus:bg-white dark:focus:bg-[#243d4d]" />
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1 font-[Nunito,sans-serif]">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="w-full flex items-center justify-center gap-2 mt-2
                                   px-4 py-2.5 sm:py-[0.72rem] rounded-xl
                                   bg-[#28666e] dark:bg-[#4db6c1]
                                   text-white dark:text-[#0f1f2e]
                                   text-xs sm:text-[0.9rem] font-bold font-[Nunito,sans-serif]
                                   border-none cursor-pointer no-underline
                                   transition-all duration-200
                                   hover:bg-[#1a4a52] dark:hover:bg-[#38a8b5]
                                   hover:shadow-[0_6px_18px_rgba(40,102,110,0.28)] dark:hover:shadow-[0_6px_18px_rgba(77,182,193,0.25)]
                                   hover:-translate-y-px active:translate-y-0">
                        Email Password Reset Link
                    </button>
                    
                    {{-- Back to login --}}
                    <div class="text-center mt-3 text-xs">
                        <a href="{{ route('login') }}" class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline flex items-center justify-center gap-1">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            Back to Login
                        </a>
                    </div>
                </form>

            </div>

            {{-- Status/Success Message --}}
            @if (session('status'))
            <div class="flex items-start gap-2.5 mt-4
                        px-4 py-3.5 rounded-xl
                        bg-green-50 dark:bg-green-900/20
                        border border-green-200/60 dark:border-green-700/40
                        text-xs sm:text-sm text-green-700 dark:text-green-400">
                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
            @endif

        </div>
    </div>

    <style>
        @keyframes authFadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</x-layout>
