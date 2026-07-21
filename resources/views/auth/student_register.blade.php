<x-layout>

    {{-- ═══════════════════════════════════════════
    STUDENT REGISTER PAGE
    ═══════════════════════════════════════════ --}}

    <div class="relative min-h-screen overflow-hidden flex items-center justify-center px-4 py-8 sm:py-16
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

        <div class="w-full max-w-[340px] sm:max-w-[420px] relative z-10 mx-auto">

            {{-- Brand Header --}}
            <div class="text-center mb-5 sm:mb-8">
                <div class="hidden sm:flex w-[60px] h-[60px] rounded-[18px] mx-auto mb-4
                            bg-linear-to-br from-[#3d8a8f] to-[#7c9885]
                            dark:from-[#4db6c1] dark:to-[#9ab8a5]
                            items-center justify-center
                            shadow-[0_6px_20px_rgba(61,138,143,0.28)] dark:shadow-[0_6px_20px_rgba(77,182,193,0.2)]">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <h1 class="font-[Lora,serif] text-xl sm:text-[1.85rem] font-bold block
                           bg-linear-to-br from-[#28666e] via-[#033f63] to-[#7c9885]
                           dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                           bg-clip-text text-transparent">স্টুডেন্ট অ্যাকাউন্ট</h1>
                <p class="text-xs sm:text-sm mt-0.5 text-[#033f63]/50 dark:text-[#7ec8e3]/50">শেখার যাত্রা শুরু করুন আজই</p>
            </div>

            {{-- Card Container --}}
            <div class="bg-white dark:bg-[#1a2e3b]
                        rounded-3xl border border-[#28666e]/10 dark:border-[#4db6c1]/15
                        shadow-[0_8px_40px_rgba(40,102,110,0.1)] dark:shadow-[0_8px_40px_rgba(0,0,0,0.4)]
                        p-5 sm:p-9
                        animate-[authFadeUp_0.4s_ease_both]
                        transition-colors duration-300">

                {{-- Social Signup (Side by side on mobile) --}}
                <div class="grid grid-cols-2 gap-2.5 mb-1">

                    {{-- Google --}}
                    <a href="{{ route('social.redirect', ['provider' => 'google', 'role' => 'student']) }}"
                        class="flex items-center justify-center gap-1.5
                                  px-3 py-2 rounded-xl
                                  border border-[#28666e]/18 dark:border-[#4db6c1]/20
                                  bg-white dark:bg-[#0f1f2e]/40
                                  text-[#033f63] dark:text-[#7ec8e3]
                                  text-xs sm:text-sm font-semibold font-[Nunito,sans-serif] no-underline
                                  cursor-pointer transition-all duration-200
                                  hover:bg-white dark:hover:bg-[#243d4d]
                                  hover:border-[#28666e]/35 dark:hover:border-[#4db6c1]/40">
                        <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        Google
                    </a>

                    {{-- GitHub --}}
                    <a href="{{ route('social.redirect', ['provider' => 'github', 'role' => 'student']) }}"
                        class="flex items-center justify-center gap-1.5
                                  px-3 py-2 rounded-xl
                                  border border-[#28666e]/18 dark:border-[#4db6c1]/20
                                  bg-white dark:bg-[#0f1f2e]/40
                                  text-[#033f63] dark:text-[#7ec8e3]
                                  text-xs sm:text-sm font-semibold font-[Nunito,sans-serif] no-underline
                                  cursor-pointer transition-all duration-200
                                  hover:bg-white dark:hover:bg-[#243d4d]
                                  hover:border-[#28666e]/35 dark:hover:border-[#4db6c1]/40">
                        <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.085 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.76-1.604-2.665-.305-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.3 1.23a11.52 11.52 0 013.003-.404c1.02.005 2.046.138 3.003.404 2.29-1.552 3.297-1.23 3.297-1.23.653 1.652.242 2.873.118 3.176.77.84 1.233 1.91 1.233 3.22 0 4.61-2.804 5.622-5.476 5.92.43.372.814 1.103.814 2.222 0 1.606-.015 2.898-.015 3.293 0 .322.216.695.825.577C20.565 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                        </svg>
                        GitHub
                    </a>

                </div>

                {{-- Social auth error message --}}
                @error('social')
                    <div class="mt-1 mb-1 px-4 py-2.5 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700/40 text-xs text-red-600 dark:text-red-400 font-[Nunito,sans-serif]">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-3.5 sm:my-5
                            text-[#033f63]/40 dark:text-[#7ec8e3]/40 text-xs
                            before:flex-1 before:h-px before:bg-[#28666e]/12 dark:before:bg-[#4db6c1]/15
                            after:flex-1 after:h-px after:bg-[#28666e]/12 dark:after:bg-[#4db6c1]/15">
                    অথবা
                </div>

                {{-- Registration Form --}}
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-3.5">
                    @csrf
                    <input type="hidden" name="role" value="student">

                    {{-- Name --}}
                    <div>
                        <label
                            class="hidden sm:flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            সম্পূর্ণ নাম
                        </label>
                        <input type="text" name="name" placeholder="আপনার সম্পূর্ণ নাম" required class="w-full px-4 py-2 sm:py-2.5 rounded-xl text-xs sm:text-[0.9rem]
                                      font-[Nunito,sans-serif] outline-none
                                      border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                      bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                      text-[#033f63] dark:text-[#7ec8e3]
                                      placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                      transition-all duration-200
                                      focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                      focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                      focus:bg-white dark:focus:bg-[#243d4d]" />
                    </div>

                    {{-- Email --}}
                    <div>
                        <label
                            class="hidden sm:flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            ই-মেইল
                        </label>
                        <input type="email" name="email" placeholder="আপনার ই-মেইল" required class="w-full px-4 py-2 sm:py-2.5 rounded-xl text-xs sm:text-[0.9rem]
                                      font-[Nunito,sans-serif] outline-none
                                      border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                      bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                      text-[#033f63] dark:text-[#7ec8e3]
                                      placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                      transition-all duration-200
                                      focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                      focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                      focus:bg-white dark:focus:bg-[#243d4d]" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <label
                            class="hidden sm:flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            পাসওয়ার্ড
                        </label>
                        <input type="password" name="password" placeholder="পাসওয়ার্ড" required class="w-full px-4 py-2 sm:py-2.5 rounded-xl text-xs sm:text-[0.9rem]
                                      font-[Nunito,sans-serif] outline-none
                                      border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                      bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                      text-[#033f63] dark:text-[#7ec8e3]
                                      placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                      transition-all duration-200
                                      focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                      focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                      focus:bg-white dark:focus:bg-[#243d4d]" />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label
                            class="hidden sm:flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            কনফার্ম পাসওয়ার্ড
                        </label>
                        <input type="password" name="password_confirmation" placeholder="কনফার্ম পাসওয়ার্ড" required
                            class="w-full px-4 py-2 sm:py-2.5 rounded-xl text-xs sm:text-[0.9rem]
                                      font-[Nunito,sans-serif] outline-none
                                      border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                      bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                      text-[#033f63] dark:text-[#7ec8e3]
                                      placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                      transition-all duration-200
                                      focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                      focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                      focus:bg-white dark:focus:bg-[#243d4d]" />
                    </div>

                    {{-- Terms --}}
                    <label class="flex items-start gap-2 cursor-pointer">
                        <input type="checkbox" required
                            class="accent-[#28666e] dark:accent-[#4db6c1] w-[14px] h-[14px] mt-0.5 cursor-pointer" />
                        <span class="text-[10px] leading-relaxed text-[#033f63]/70 dark:text-[#7ec8e3]/60">
                            আমি <a href="{{ route('terms') }}"
                                class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">শর্তাবলী এবং গোপনীয়তা নীতি</a>-তে সম্মত আছি
                        </span>
                    </label>

                    {{-- Register Button --}}
                    <button type="submit" class="w-full flex items-center justify-center gap-2
                                   px-4 py-2.5 rounded-xl
                                   bg-[#28666e] dark:bg-[#4db6c1]
                                   text-white dark:text-[#0f1f2e]
                                   text-xs sm:text-[0.9rem] font-bold font-[Nunito,sans-serif]
                                   border-none cursor-pointer no-underline
                                   transition-all duration-200
                                   hover:bg-[#1a4a52] dark:hover:bg-[#38a8b5]
                                   hover:shadow-[0_6px_18px_rgba(40,102,110,0.28)] dark:hover:shadow-[0_6px_18px_rgba(77,182,193,0.25)]
                                   hover:-translate-y-px active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        রেজিস্টার করুন
                    </button>
                </form>

                {{-- Clean Inline Link Footer --}}
                <div class="mt-6 text-center text-xs space-y-2.5 text-[#033f63]/60 dark:text-[#7ec8e3]/60">
                    <p>
                        মেন্টর হিসেবে যুক্ত হতে চান? 
                        <a href="{{ route('teacher_register') }}" class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">মেন্টর অ্যাকাউন্ট খুলুন</a>
                    </p>
                    <p>
                        ইতিমধ্যে অ্যাকাউন্ট আছে? 
                        <a href="{{ route('login') }}" class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">লগইন করুন</a>
                    </p>
                </div>

            </div>
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
