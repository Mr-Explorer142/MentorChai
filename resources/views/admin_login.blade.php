<x-layout>

    {{-- ═══════════════════════════════════════════
    ADMIN LOGIN PAGE
    ═══════════════════════════════════════════ --}}

    <div class="relative min-h-screen overflow-hidden flex items-center justify-center px-4 py-16
                bg-[#f0f4f4] dark:bg-[#0f1f2e]
                transition-colors duration-300">

        {{-- Background Glows --}}
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-28 -left-28 w-[400px] h-[400px] rounded-full
                        bg-[radial-gradient(circle,rgba(26,153,143,0.12),transparent_70%)]
                        dark:bg-[radial-gradient(circle,rgba(77,182,193,0.1),transparent_70%)]
                        blur-[120px]"></div>
            <div class="absolute -bottom-28 -right-28 w-[400px] h-[400px] rounded-full
                        bg-[radial-gradient(circle,rgba(16,46,60,0.15),transparent_70%)]
                        dark:bg-[radial-gradient(circle,rgba(15,42,56,0.5),transparent_70%)]
                        blur-[120px]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full
                        bg-[radial-gradient(circle,rgba(24,127,135,0.06),transparent_70%)]
                        dark:bg-[radial-gradient(circle,rgba(77,182,193,0.05),transparent_70%)]
                        blur-[100px]"></div>
        </div>

        <div class="relative w-full max-w-md">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl shadow-xl mb-4 text-white
                            bg-linear-to-br from-[#102E3C] to-[#1A998F]
                            dark:from-[#1a2e3b] dark:to-[#4db6c1]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-[#102E3C] dark:text-[#7ec8e3]">
                    অ্যাডমিন প্যানেল
                </h1>
                <p class="text-sm mt-1 text-[#155665]/70 dark:text-[#4db6c1]/70">
                    নিরাপদ অ্যাডমিন লগইন
                </p>
            </div>

            {{-- Card --}}
            <div class="rounded-2xl shadow-2xl
                        border border-[#C4CFCE] dark:border-[#4db6c1]/15
                        bg-white/75 dark:bg-[#1a2e3b]/80
                        backdrop-blur-[20px]
                        transition-colors duration-300">

                <div class="p-8 space-y-6">

                    {{-- Form --}}
                    <form method="POST" action="{{ route('admin_login_post') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label class="block text-xs font-semibold mb-1.5
                                          text-[#155665] dark:text-[#7ec8e3]">
                                অ্যাডমিন ই-মেইল
                            </label>
                            <div class="relative">
                                <input type="email" name="email" placeholder="admin@email.com" required
                                       value="{{ old('email') }}"
                                       class="w-full pl-10 pr-4 py-2.5 rounded-xl
                                              text-sm font-[Nunito,sans-serif] outline-none
                                              border-[1.5px] @error('email') border-red-500 dark:border-red-400 focus:border-red-500 dark:focus:border-red-400 focus:ring-red-500/10 @else border-[#C4CFCE] dark:border-[#4db6c1]/20 focus:border-[#1A998F] dark:focus:border-[#4db6c1] focus:ring-[#1A998F]/15 dark:focus:ring-[#4db6c1]/10 @enderror
                                              bg-[#fafcfc] dark:bg-[#0f1f2e]/60
                                              text-[#102E3C] dark:text-[#7ec8e3]
                                              placeholder:text-[#155665]/40 dark:placeholder:text-[#7ec8e3]/30
                                              transition-all duration-200
                                              focus:ring-[3px]
                                              focus:bg-white dark:focus:bg-[#243d4d]" />
                                <span class="absolute left-3 top-1/2 -translate-y-1/2
                                             text-[#155665]/50 dark:text-[#4db6c1]/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75" />
                                    </svg>
                                </span>
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1 font-[Nunito,sans-serif]">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label class="block text-xs font-semibold mb-1.5
                                          text-[#155665] dark:text-[#7ec8e3]">
                                পাসওয়ার্ড
                            </label>
                            <div class="relative">
                                <input type="password" name="password" placeholder="••••••••" required
                                       class="w-full pl-10 pr-4 py-2.5 rounded-xl
                                              text-sm font-[Nunito,sans-serif] outline-none
                                              border-[1.5px] @error('password') border-red-500 dark:border-red-400 focus:border-red-500 dark:focus:border-red-400 focus:ring-red-500/10 @else border-[#C4CFCE] dark:border-[#4db6c1]/20 focus:border-[#1A998F] dark:focus:border-[#4db6c1] focus:ring-[#1A998F]/15 dark:focus:ring-[#4db6c1]/10 @enderror
                                              bg-[#fafcfc] dark:bg-[#0f1f2e]/60
                                              text-[#102E3C] dark:text-[#7ec8e3]
                                              placeholder:text-[#155665]/40 dark:placeholder:text-[#7ec8e3]/30
                                              transition-all duration-200
                                              focus:ring-[3px]
                                              focus:bg-white dark:focus:bg-[#243d4d]" />
                                <span class="absolute left-3 top-1/2 -translate-y-1/2
                                             text-[#155665]/50 dark:text-[#4db6c1]/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 10.5h16.5v9.75H3.75z" />
                                    </svg>
                                </span>
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1 font-[Nunito,sans-serif]">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <div class="flex items-center justify-between text-sm">
                            <label class="flex items-center gap-2 cursor-pointer
                                          text-[#155665] dark:text-[#7ec8e3]">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded cursor-pointer
                                              accent-[#1A998F] dark:accent-[#4db6c1]" />
                                তথ্য সেভ রাখুন
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="w-full flex items-center justify-center gap-2
                                  py-3 rounded-xl
                                  bg-gradient-to-br from-[#155665] to-[#1A998F]
                                  dark:from-[#28666e] dark:to-[#4db6c1]
                                  text-white dark:text-[#0f1f2e]
                                  text-sm font-bold font-[Nunito,sans-serif]
                                  shadow-lg border-none cursor-pointer
                                  transition-all duration-200
                                  hover:opacity-90
                                  hover:shadow-[0_8px_24px_rgba(26,153,143,0.3)] dark:hover:shadow-[0_8px_24px_rgba(77,182,193,0.25)]
                                  hover:-translate-y-px active:translate-y-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                            অ্যাডমিন হিসেবে লগইন করুন
                        </button>

                    </form>


                    {{-- Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px bg-[#C4CFCE] dark:bg-[#4db6c1]/15"></div>
                        <span class="text-xs text-[#155665]/60 dark:text-[#7ec8e3]/40">অথবা</span>
                        <div class="flex-1 h-px bg-[#C4CFCE] dark:bg-[#4db6c1]/15"></div>
                    </div>

                    {{-- Back link --}}
                    <p class="text-center text-sm text-[#155665]/80 dark:text-[#7ec8e3]/60">
                        অ্যাডমিন নন?
                        <a href="{{ route('login') }}"
                            class="font-semibold text-[#1A998F] dark:text-[#4db6c1] hover:underline">
                            ইউজার লগইন
                        </a>
                    </p>

                </div>
            </div>

            {{-- Error --}}
            @if ($errors->any())
            <div class="flex items-start gap-3 p-4 rounded-xl mt-6 shadow-lg
                        bg-white/85 dark:bg-[#1a2e3b]
                        border border-[#155665]/30 dark:border-red-700/40">
                <svg class="w-5 h-5 shrink-0 mt-0.5 text-[#102E3C] dark:text-red-400" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span class="text-sm font-medium text-[#102E3C] dark:text-red-400">
                    {{ $errors->first() }}
                </span>
            </div>
            @endif

        </div>
    </div>

</x-layout>
