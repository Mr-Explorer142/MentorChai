<x-layout>

    {{-- ═══════════════════════════════════════════
    MENTOR REGISTER PAGE
    ═══════════════════════════════════════════ --}}

    <div class="relative min-h-screen overflow-hidden flex items-center justify-center px-4 py-16
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

        <div class="w-full max-w-[420px] relative z-10">

            {{-- Brand Header --}}
            <div class="text-center mb-7">
                <div class="w-[60px] h-[60px] rounded-[18px] mx-auto mb-4
                            bg-linear-to-br from-[#28666e] to-[#033f63]
                            dark:from-[#4db6c1] dark:to-[#28666e]
                            flex items-center justify-center
                            shadow-[0_6px_20px_rgba(40,102,110,0.25)] dark:shadow-[0_6px_20px_rgba(77,182,193,0.2)]">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                </div>
                <h1 class="font-[Lora,serif] text-[1.6rem] font-bold block
                           bg-linear-to-br from-[#28666e] via-[#033f63] to-[#7c9885]
                           dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                           bg-clip-text text-transparent">মেন্টর অ্যাকাউন্ট</h1>
                <p class="text-sm mt-1 text-[#033f63]/50 dark:text-[#7ec8e3]/50">শিক্ষার্থীদের পথপ্রদর্শক হন</p>
            </div>

            {{-- Card --}}
            <div class="bg-white dark:bg-[#1a2e3b]
                        rounded-3xl border border-[#28666e]/10 dark:border-[#4db6c1]/15
                        shadow-[0_8px_40px_rgba(40,102,110,0.1)] dark:shadow-[0_8px_40px_rgba(0,0,0,0.4)]
                        p-9
                        animate-[authFadeUp_0.4s_ease_both]
                        transition-colors duration-300">

                {{-- Social Signup --}}
                <div class="flex flex-col gap-2.5 mb-1">
                    <button
                        class="w-full flex items-center justify-center gap-2.5
                                  px-4 py-2.5 rounded-xl
                                  border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                  bg-[#eef7f8]/40 dark:bg-[#0f1f2e]/40
                                  text-[#033f63] dark:text-[#7ec8e3]
                                  text-sm font-semibold font-[Nunito,sans-serif]
                                  cursor-pointer transition-all duration-200
                                  hover:bg-white dark:hover:bg-[#243d4d]
                                  hover:border-[#28666e]/35 dark:hover:border-[#4db6c1]/40
                                  hover:shadow-[0_3px_12px_rgba(40,102,110,0.1)] dark:hover:shadow-[0_3px_12px_rgba(0,0,0,0.3)]">
                        <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="currentColor">
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
                        Google দিয়ে শুরু করুন
                    </button>
                    <button
                        class="w-full flex items-center justify-center gap-2.5
                                  px-4 py-2.5 rounded-xl
                                  border-[1.5px] border-[#28666e]/18 dark:border-[#4db6c1]/20
                                  bg-[#eef7f8]/40 dark:bg-[#0f1f2e]/40
                                  text-[#033f63] dark:text-[#7ec8e3]
                                  text-sm font-semibold font-[Nunito,sans-serif]
                                  cursor-pointer transition-all duration-200
                                  hover:bg-white dark:hover:bg-[#243d4d]
                                  hover:border-[#28666e]/35 dark:hover:border-[#4db6c1]/40
                                  hover:shadow-[0_3px_12px_rgba(40,102,110,0.1)] dark:hover:shadow-[0_3px_12px_rgba(0,0,0,0.3)]">
                        <svg class="w-5 h-5 shrink-0" fill="#1877F2" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        Facebook দিয়ে শুরু করুন
                    </button>
                </div>

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-5
                            text-[#033f63]/40 dark:text-[#7ec8e3]/40 text-xs
                            before:flex-1 before:h-px before:bg-[#28666e]/12 dark:before:bg-[#4db6c1]/15
                            after:flex-1 after:h-px after:bg-[#28666e]/12 dark:after:bg-[#4db6c1]/15">
                    অথবা ই-মেইল দিয়ে
                </div>

                {{-- Registration Form --}}
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="role" value="mentor">

                    {{-- Name --}}
                    <div>
                        <label
                            class="flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            সম্পূর্ণ নাম
                        </label>
                        <input type="text" name="name" placeholder="আপনার পুরো নাম দিন" required class="w-full px-4 py-2.5 rounded-xl text-[0.9rem]
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
                            class="flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            ই-মেইল
                        </label>
                        <input type="email" name="email" placeholder="আপনার ই-মেইল দিন" required class="w-full px-4 py-2.5 rounded-xl text-[0.9rem]
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
                            class="flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            পাসওয়ার্ড
                        </label>
                        <input type="password" name="password" placeholder="শক্তিশালী পাসওয়ার্ড দিন" required class="w-full px-4 py-2.5 rounded-xl text-[0.9rem]
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
                            class="flex items-center gap-1.5 text-[0.82rem] font-bold text-[#033f63] dark:text-[#7ec8e3] mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            কনফার্ম পাসওয়ার্ড
                        </label>
                        <input type="password" name="password_confirmation" placeholder="পাসওয়ার্ড আবার দিন" required
                            class="w-full px-4 py-2.5 rounded-xl text-[0.9rem]
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

                    {{-- Mentor Benefits info box --}}
                    <div class="px-4 py-3.5 rounded-xl
                                bg-[#28666e]/5 dark:bg-[#4db6c1]/10
                                border border-[#28666e]/13 dark:border-[#4db6c1]/20
                                text-[0.8rem] text-[#033f63]/75 dark:text-[#7ec8e3]/70">
                        <p class="font-bold text-xs mb-1 text-[#28666e] dark:text-[#4db6c1]">✦ মেন্টর হিসেবে পাবেন</p>
                        <p>নিজের রেট সেট করার সুবিধা এবং সম্পূর্ণ নমনীয় সময়সূচী</p>
                    </div>

                    {{-- Terms --}}
                    <label class="flex items-start gap-2.5 cursor-pointer">
                        <input type="checkbox" required
                            class="accent-[#28666e] dark:accent-[#4db6c1] w-[15px] h-[15px] mt-0.5 cursor-pointer" />
                        <span class="text-xs leading-relaxed text-[#033f63]/70 dark:text-[#7ec8e3]/60">
                            আমি <a href="#"
                                class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">শর্তাবলী</a> এবং
                            <a href="#" class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">গোপনীয়তা
                                নীতি</a>-তে সম্মত আছি
                        </span>
                    </label>

                    {{-- Register Button --}}
                    <button type="submit" class="w-full flex items-center justify-center gap-2
                                   px-4 py-[0.72rem] rounded-xl
                                   bg-[#28666e] dark:bg-[#4db6c1]
                                   text-white dark:text-[#0f1f2e]
                                   text-[0.9rem] font-bold font-[Nunito,sans-serif]
                                   border-none cursor-pointer no-underline
                                   transition-all duration-200
                                   hover:bg-[#1a4a52] dark:hover:bg-[#38a8b5]
                                   hover:shadow-[0_6px_18px_rgba(40,102,110,0.28)] dark:hover:shadow-[0_6px_18px_rgba(77,182,193,0.25)]
                                   hover:-translate-y-px active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                        </svg>
                        মেন্টর হিসেবে যুক্ত হন
                    </button>
                </form>

                {{-- Switch to Student --}}
                <div class="mt-4 rounded-2xl text-center px-5 py-4
                            bg-[#eef7f8]/60 dark:bg-[#0f1f2e]/50
                            border border-[#28666e]/10 dark:border-[#4db6c1]/10">
                    <p class="text-xs mb-3 text-[#033f63]/55 dark:text-[#7ec8e3]/50">স্টুডেন্ট হিসেবে যুক্ত হতে চান?</p>
                    <a href="{{ route('student_register') }}" class="w-full flex items-center justify-center gap-2
                              px-4 py-[0.55rem] rounded-xl
                              bg-transparent text-[#28666e] dark:text-[#4db6c1]
                              text-[0.82rem] font-bold font-[Nunito,sans-serif] no-underline
                              border-[1.5px] border-[#28666e] dark:border-[#4db6c1]/60
                              cursor-pointer transition-all duration-200
                              hover:bg-[#28666e]/6 dark:hover:bg-[#4db6c1]/10
                              hover:shadow-[0_4px_12px_rgba(40,102,110,0.12)]
                              hover:-translate-y-px active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        স্টুডেন্ট অ্যাকাউন্ট খুলুন
                    </a>
                </div>

                {{-- Login link --}}
                <p class="text-center text-xs mt-4 text-[#033f63]/55 dark:text-[#7ec8e3]/50">
                    ইতিমধ্যে অ্যাকাউন্ট আছে?
                    <a href="{{ route('login') }}"
                        class="text-[#28666e] dark:text-[#4db6c1] font-bold hover:underline">লগইন করুন</a>
                </p>

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
