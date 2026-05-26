<!DOCTYPE html>
<html lang="bn" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MentorChai</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600;700&family=Nunito:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])

    {{-- Prevent flash of wrong theme: runs before page renders --}}
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body
    class="font-[Nunito,sans-serif] bg-[#eef7f8] dark:bg-[#0f1f2e] min-h-screen flex flex-col transition-colors duration-300">

    {{-- ═══════════════ HEADER ═══════════════ --}}
    <header class="sticky top-0 z-50">
        <nav>
            <div class="drawer">
                <input id="mobile-menu" type="checkbox" class="drawer-toggle" />

                {{-- ── Navbar Bar ── --}}
                <div class="drawer-content sticky top-0 z-40
                            bg-white/85 dark:bg-[#1a2e3b]/90
                            backdrop-blur-[14px]
                            border-b border-[#28666e]/12 dark:border-[#4db6c1]/15
                            shadow-[0_2px_16px_rgba(40,102,110,0.07)] dark:shadow-[0_2px_16px_rgba(0,0,0,0.3)]
                            transition-colors duration-300">

                    <div class="flex items-center justify-between px-2 sm:px-10 py-3 mx-auto w-full">

                        {{-- LEFT: Hamburger + Brand --}}
                        <div class="flex items-center gap-1.5 sm:gap-3">

                            {{-- Hamburger (mobile only) --}}
                            <label for="mobile-menu"
                                class="md:hidden cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#28666e" class="w-6 h-6 dark:hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#4db6c1" class="w-6 h-6 hidden dark:block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </label>

                            {{-- Brand --}}
                            <a href="{{ route('home') }}" class="font-[Lora,serif] text-xl sm:text-2xl font-bold tracking-[-0.3px]
                                      bg-linear-to-r from-[#28666e] via-[#033f63] to-[#7c9885]
                                      dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                                      bg-clip-text text-transparent">
                                MentorChai
                            </a>
                        </div>

                        {{-- RIGHT --}}
                        <div class="flex items-center gap-1.5 sm:gap-3">

                            {{-- Mentor browse link (desktop) --}}
                            <a href="{{ route('mentors') }}" class="hidden md:inline-flex items-center
                                      text-sm font-semibold text-[#28666e] dark:text-[#4db6c1]
                                      px-4 py-[0.45rem] rounded-[10px]
                                      border-[1.5px] border-[#28666e] dark:border-[#4db6c1]
                                      transition-all duration-200
                                      hover:bg-[#28666e] hover:text-white hover:shadow-[0_4px_12px_rgba(40,102,110,0.22)]
                                      dark:hover:bg-[#4db6c1] dark:hover:text-[#0f1f2e] dark:hover:border-[#4db6c1]">
                                মেন্টর দেখুন
                            </a>

                            {{-- Vertical divider (desktop) --}}
                            <div class="hidden md:block w-px h-7 bg-#28666e/0.18 dark:bg-#4db6c1/0.25 rounded-sm">
                            </div>

                            {{-- Search (desktop) --}}
                            <div class="relative hidden md:block">
                                <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-teal-500 dark:text-teal-400"
                                    fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.35-4.35" />
                                </svg>
                                <input type="search" placeholder="সার্চ করুন..." class="w-[200px] pl-9 pr-3 py-[0.4rem] text-sm rounded-xl
                                              bg-[#eef7f8]/70 dark:bg-[#0f1f2e]/70
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              border-[1.5px] border-[#28666e]/25 dark:border-[#4db6c1]/25
                                              placeholder:text-[#033f63]/40 dark:placeholder:text-[#7ec8e3]/40
                                              outline-none transition-all duration-200
                                              focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                              focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                              focus:bg-white dark:focus:bg-[#1a2e3b]" />
                            </div>

                            {{-- Search icon (mobile) --}}
                            <label for="mobile-search"
                                class="md:hidden cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="#28666e" class="w-6 h-6 dark:hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="#4db6c1" class="w-6 h-6 hidden dark:block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </label>

                            @auth
                            {{-- Vertical divider --}}
                            <div class="hidden sm:block w-px h-7 bg-#28666e/0.18 dark:bg-#4db6c1/0.25 rounded-sm"></div>

                            {{-- Notification button --}}
                            <div class="relative">
                                <button id="notificationToggle" onclick="toggleNotifications()"
                                    class="relative p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors"
                                    title="নোটিফিকেশন">
                                    <span id="notificationDot"
                                        class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-[#ef4444] border border-white dark:border-[#0f1f2e]"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="#28666e" class="w-5 h-5 dark:stroke-[#4db6c1]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>

                                <div id="notificationPanel"
                                    class="hidden fixed md:absolute left-4 right-4 md:left-auto md:right-0 top-[4rem] md:top-auto md:mt-2 w-auto md:w-[22rem] rounded-3xl bg-white dark:bg-[#122333] border border-[#28666e]/15 dark:border-[#4db6c1]/20 shadow-[0_20px_45px_rgba(40,102,110,0.12)] dark:shadow-[0_20px_45px_rgba(0,0,0,0.35)] z-[999] overflow-hidden">
                                    <div
                                        class="px-4 py-3 bg-[#eaf7f8] dark:bg-[#102d3b] border-b border-[#28666e]/10 dark:border-[#4db6c1]/10">
                                        <div class="flex items-center justify-between gap-3">
                                            <p class="font-semibold text-[#033f63] dark:text-[#7ec8e3]">নোটিফিকেশন</p>
                                            <div class="flex items-center gap-2">
                                                <button onclick="markAllAsRead()"
                                                    class="text-[0.7rem] font-semibold text-[#033f63] dark:text-[#d2f1ff] bg-[#28666e]/10 dark:bg-[#4db6c1]/15 px-2 py-1 rounded-full hover:bg-[#28666e]/15 dark:hover:bg-[#4db6c1]/25 transition-colors">
                                                    সবগুলো পড়া চিহ্নিত করুন
                                                </button>
                                                <span id="notificationCount"
                                                    class="badge badge-sm bg-[#28666e] text-white border-0">৩</span>
                                            </div>
                                        </div>
                                        <p class="text-xs text-[#28666e]/70 dark:text-[#7ec8e3]/70 mt-1">সর্বশেষ আপডেট
                                        </p>
                                    </div>
                                    <div class="p-3 space-y-2">
                                        <div
                                            class="rounded-3xl bg-[#f6fbfb] dark:bg-[#0f2430] p-3 border border-[#28666e]/10 dark:border-[#4db6c1]/10">
                                            <p class="text-sm text-[#033f63] dark:text-[#d2f1ff]">নতুন সেশন “রিয়্যাক্ট
                                                মাস্টারক্লাস” এখন লাইভ।</p>
                                            <p class="text-xs text-[#28666e]/60 dark:text-[#7ec8e3]/70 mt-1">৫ মিনিট আগে
                                            </p>
                                        </div>
                                        <div
                                            class="rounded-3xl bg-[#f6fbfb] dark:bg-[#0f2430] p-3 border border-[#28666e]/10 dark:border-[#4db6c1]/10">
                                            <p class="text-sm text-[#033f63] dark:text-[#d2f1ff]">১২ জন নতুন শিক্ষার্থী
                                                আজ সাইন আপ করেছেন।</p>
                                            <p class="text-xs text-[#28666e]/60 dark:text-[#7ec8e3]/70 mt-1">২০ মিনিট
                                                আগে</p>
                                        </div>
                                        <div
                                            class="rounded-3xl bg-[#f6fbfb] dark:bg-[#0f2430] p-3 border border-[#28666e]/10 dark:border-[#4db6c1]/10">
                                            <p class="text-sm text-[#033f63] dark:text-[#d2f1ff]">নতুন নিরাপত্তা আপডেট
                                                সফলভাবে ইনস্টল হয়েছে।</p>
                                            <p class="text-xs text-[#28666e]/60 dark:text-[#7ec8e3]/70 mt-1">১ ঘন্টা আগে
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endauth

                            {{-- Dark Mode Toggle --}}
                            <button id="theme-toggle"
                                class="p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors"
                                title="ডার্ক মোড">
                                {{-- Sun icon — shown in dark mode --}}
                                <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg"
                                    class="hidden w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.7.7M6.34 17.66l-.7.7m12.02 0-.7-.7M6.34 6.34l-.7-.7M12 7a5 5 0 1 0 0 10A5 5 0 0 0 12 7Z" />
                                </svg>
                                {{-- Moon icon — shown in light mode --}}
                                <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#28666e]"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                                </svg>
                            </button>

                            {{-- Vertical divider --}}
                            <div class="hidden sm:block w-px h-7 bg-#28666e/0.18 dark:bg-#4db6c1/0.25 rounded-sm"></div>

                            {{-- Guest: Login --}}
                            @guest
                            <a href="{{ route('login') }}" class="text-xs sm:text-sm font-semibold text-[#28666e] dark:text-[#4db6c1]
                                      px-3 sm:px-[1.1rem] py-[0.45rem] rounded-[10px]
                                      border-[1.5px] border-[#28666e]/35 dark:border-[#4db6c1]/35
                                      bg-transparent
                                      transition-all duration-200
                                      hover:bg-[#28666e] hover:text-white hover:border-[#28666e] hover:shadow-[0_4px_12px_rgba(40,102,110,0.22)]
                                      dark:hover:bg-[#4db6c1] dark:hover:text-[#0f1f2e] dark:hover:border-[#4db6c1]
                                      {{ Route::is('login') ? 'bg-[#28666e] border-[#28666e]' : '' }}">
                                লগইন করুন
                            </a>
                            @endguest

                            {{-- Auth: Avatar dropdown (Vanilla JS fallback) --}}
                            @auth
                            <div class="relative" id="profile-dropdown">
                                <div onclick="toggleDropdown()"
                                    class="cursor-pointer w-10 h-10 rounded-full overflow-hidden
                                            border-2 border-[#28666e]/30 dark:border-[#4db6c1]/30 p-px
                                            transition-all duration-200 hover:border-[#28666e] dark:hover:border-[#4db6c1]">
                                    @php $navProfile = auth()->user()->profile; @endphp
                                    <img src="{{ $navProfile && $navProfile->avatar ? asset('storage/' . $navProfile->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=1A998F&color=ffffff&size=80&font-size=0.4&bold=true' }}"
                                        alt="avatar" class="w-full h-full object-cover rounded-full" />
                                </div>

                                <div id="dropdown-menu"
                                    class="hidden absolute right-0 mt-3 z-50 flex flex-col gap-1 p-2
                                            bg-white dark:bg-[#1a2e3b]
                                            rounded-2xl min-w-[200px]
                                            border border-[#28666e]/15 dark:border-[#4db6c1]/15
                                            shadow-[0_8px_30px_rgba(40,102,110,0.14)] dark:shadow-[0_8px_30px_rgba(0,0,0,0.4)]">

                                    @if (isMentor())
                                    <a href="{{ route('mentor_profile', auth()->user()->id) }}" class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('mentor_profile') ? 'bg-![#28666e] text-gray-500!' : '' }}">
                                        প্রোফাইল
                                    </a>
                                    <a href="{{ route('mentor_dashboard') }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('mentor_dashboard') ? 'bg-![#28666e] text-gray-500!' : '' }}">
                                        ড্যাশবোর্ড
                                    </a>
                                    @elseif (isStudent())
                                    <a href="{{ route('student_profile', auth()->user()->id) }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('student_profile') ? 'bg-![#28666e] text-gray-500!' : '' }}">
                                        প্রোফাইল
                                    </a>
                                    <a href="{{ route('student_dashboard') }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('student_dashboard') ? 'bg-![#28666e] text-gray-500!' : '' }}">
                                        ড্যাশবোর্ড
                                    </a>
                                    @endif

                                    {{-- Dropdown divider --}}
                                    <div class="h-px bg-[#28666e]/10 dark:bg-[#4db6c1]/10 mx-1 my-0.5 rounded-full">
                                    </div>

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-center text-sm font-semibold
                                                       text-[#033f63] dark:text-[#7ec8e3]
                                                       px-4 py-[0.55rem] rounded-[10px]
                                                       transition-all duration-150 bg-transparent border-0 cursor-pointer
                                                       hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]">
                                            লগআউট
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>

                {{-- ═══════════════ Mobile Drawer ═══════════════ --}}
                <div class="drawer-side z-50">
                    <label for="mobile-menu" class="drawer-overlay"></label>

                    <aside class="w-[78%] max-w-xs min-h-screen flex flex-col
                                  bg-white dark:bg-[#1a2e3b]
                                  border-r border-[#28666e]/12 dark:border-[#4db6c1]/12
                                  shadow-[4px_0_24px_rgba(40,102,110,0.1)] dark:shadow-[4px_0_24px_rgba(0,0,0,0.4)]
                                  transition-colors duration-300">

                        {{-- Drawer Header --}}
                        <div
                            class="flex items-center justify-between px-5 py-4 border-b border-teal-100 dark:border-teal-900/40">
                            <span class="font-[Lora,serif] text-2xl font-bold tracking-[-0.3px]
                                         bg-linear-to-r from-[#28666e] via-[#033f63] to-[#7c9885]
                                         dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                                         bg-clip-text text-transparent">
                                MentorChai
                            </span>
                            <label for="mobile-menu" class="cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors
                                          text-teal-700 dark:text-teal-400 text-lg font-bold leading-none">✕</label>
                        </div>

                        {{-- Drawer Links --}}
                        <div class="flex-1 overflow-y-auto p-4 flex flex-col gap-1.5 mt-2">
                            <a href="{{ route('mentors') }}" class="block text-[0.9rem] font-semibold text-[#033f63] dark:text-[#7ec8e3] no-underline
                                      px-4 py-[0.65rem] rounded-xl
                                      transition-all duration-150
                                      hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                      {{ Route::is('mentors') ? 'bg-![#28666e] text-white!' : '' }}">
                                🎓 মেন্টর দেখুন
                            </a>
                            <a href="{{ route('home') }}" class="block text-[0.9rem] font-semibold text-[#033f63] dark:text-[#7ec8e3] no-underline
                                      px-4 py-[0.65rem] rounded-xl
                                      transition-all duration-150
                                      hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                      {{ Route::is('home') ? 'bg-![#28666e] text-white!' : '' }}">
                                🏠 হোম
                            </a>
                            @guest
                            <a href="{{ route('student_register') }}" class="block text-[0.9rem] font-semibold text-[#033f63] dark:text-[#7ec8e3] no-underline
                                      px-4 py-[0.65rem] rounded-xl
                                      transition-all duration-150
                                      hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                      {{ Route::is('student_register') ? 'bg-![#28666e] text-white!' : '' }}">
                                ✨ অ্যাকাউন্ট খুলুন
                            </a>
                            @endguest
                        </div>

                        {{-- Drawer Footer --}}
                        <div class="p-4 border-t border-teal-100 dark:border-teal-900/40">
                            <p class="text-xs text-center text-[#033f63]/40 dark:text-[#7ec8e3]/40">© MentorChai</p>
                        </div>
                    </aside>
                </div>
            </div>
        </nav>

        {{-- ═══════════════ Mobile Search Modal ═══════════════ --}}
        <input type="checkbox" id="mobile-search" class="modal-toggle" />
        <div class="modal">
            <div
                class="modal-box w-full max-w-none rounded-none bg-white dark:bg-[#1a2e3b] min-h-screen transition-colors duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-[Lora,serif] font-bold text-lg text-[#033f63] dark:text-[#7ec8e3]">সার্চ করুন
                    </h3>
                    <label for="mobile-search"
                        class="cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors font-bold text-teal-700 dark:text-teal-400 leading-none">✕</label>
                </div>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-teal-500 dark:text-teal-400"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="search" placeholder="মেন্টর, বিষয় বা দক্ষতা খুঁজুন..." class="w-full text-base pl-10 pr-4 py-3 rounded-2xl outline-none
                                  bg-[#eef7f8] dark:bg-[#0f1f2e]
                                  text-[#033f63] dark:text-[#7ec8e3]
                                  border-[1.5px] border-[#28666e]/25 dark:border-[#4db6c1]/25
                                  placeholder:text-[#033f63]/40 dark:placeholder:text-[#7ec8e3]/40
                                  transition-all duration-200
                                  focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                  focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                  focus:bg-white dark:focus:bg-[#1a2e3b]" />
                </div>
            </div>
        </div>
    </header>

    {{-- ═══════════════ MAIN CONTENT ═══════════════ --}}
    <main class="flex-1 animate-[fadeUp_0.35s_ease_both]">{{ $slot }}</main>

    {{-- ═══════════════ FOOTER ═══════════════ --}}
    <footer class="bg-white dark:bg-[#1a2e3b] border-t border-[#28666e]/10 dark:border-[#4db6c1]/10
                   shadow-[0_-2px_16px_rgba(40,102,110,0.05)] dark:shadow-[0_-2px_16px_rgba(0,0,0,0.2)]
                   mt-auto transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col items-center gap-6">

            {{-- Brand --}}
            <span class="font-[Lora,serif] text-xl font-bold tracking-[-0.3px]
                         bg-linear-to-r from-[#28666e] via-[#033f63] to-[#7c9885]
                         dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                         bg-clip-text text-transparent">
                MentorChai
            </span>

            {{-- Nav links --}}
            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                <a href="{{ route('about') }}"
                    class="text-sm font-medium text-[#033f63]/70 dark:text-[#7ec8e3]/70 no-underline
                          relative pb-0.5
                          transition-all duration-300 ease-in-out
                          hover:text-[#28666e] dark:hover:text-[#4db6c1] hover:font-bold
                          after:absolute after:bottom-0 after:left-0 after:h-[1.5px] after:w-0
                          after:bg-[#28666e] dark:after:bg-[#4db6c1] after:rounded-full
                          after:transition-[width] after:duration-300 hover:after:w-full
                          {{ Route::is('about') ? 'text-![#28666e] dark:text-![#4db6c1] font-bold! after:w-full!' : '' }}">
                    আমাদের সম্পর্কে
                </a>
                <span class="text-[#28666e]/25 dark:text-[#4db6c1]/25 text-xs leading-6">•</span>
                <a href="{{ route('contact') }}"
                    class="text-sm font-medium text-[#033f63]/70 dark:text-[#7ec8e3]/70 no-underline
                          relative pb-0.5
                          transition-all duration-300 ease-in-out
                          hover:text-[#28666e] dark:hover:text-[#4db6c1] hover:font-bold
                          after:absolute after:bottom-0 after:left-0 after:h-[1.5px] after:w-0
                          after:bg-[#28666e] dark:after:bg-[#4db6c1] after:rounded-full
                          after:transition-[width] after:duration-300 hover:after:w-full
                          {{ Route::is('contact') ? 'text-![#28666e] dark:text-![#4db6c1] font-bold! after:w-full!' : '' }}">
                    যোগাযোগ করুন
                </a>
                <span class="text-[#28666e]/25 dark:text-[#4db6c1]/25 text-xs leading-6">•</span>
                <a href="{{ route('faq') }}"
                    class="text-sm font-medium text-[#033f63]/70 dark:text-[#7ec8e3]/70 no-underline
                          relative pb-0.5
                          transition-all duration-300 ease-in-out
                          hover:text-[#28666e] dark:hover:text-[#4db6c1] hover:font-bold
                          after:absolute after:bottom-0 after:left-0 after:h-[1.5px] after:w-0
                          after:bg-[#28666e] dark:after:bg-[#4db6c1] after:rounded-full
                          after:transition-[width] after:duration-300 hover:after:w-full
                          {{ Route::is('faq') ? 'text-![#28666e] dark:text-![#4db6c1] font-bold! after:w-full!' : '' }}">
                    প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী
                </a>
            </nav>

            {{-- Social icons --}}
            <div class="flex items-center gap-3">

                {{-- Instagram --}}
                <a href="https://www.instagram.com/accounts/login/" target="_blank"
                    class="w-[38px] h-[38px] rounded-full flex items-center justify-center
                          text-[#28666e] dark:text-[#4db6c1]
                          border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                          transition-all duration-200
                          hover:bg-[#28666e] dark:hover:bg-[#4db6c1] hover:text-white dark:hover:text-[#0f1f2e]
                          hover:border-[#28666e] dark:hover:border-[#4db6c1]
                          hover:shadow-[0_4px_12px_rgba(40,102,110,0.25)] dark:hover:shadow-[0_4px_12px_rgba(77,182,193,0.25)]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M7.5 2.25h9A5.25 5.25 0 0 1 21.75 7.5v9a5.25 5.25 0 0 1-5.25 5.25h-9A5.25 5.25 0 0 1 2.25 16.5v-9A5.25 5.25 0 0 1 7.5 2.25Zm4.5 5.25a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9Zm0 1.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm4.875-.375a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>

                {{-- YouTube --}}
                <a href="https://accounts.google.com/ServiceLogin?service=youtube" target="_blank"
                    class="w-[38px] h-[38px] rounded-full flex items-center justify-center
                          text-[#28666e] dark:text-[#4db6c1]
                          border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                          transition-all duration-200
                          hover:bg-[#28666e] dark:hover:bg-[#4db6c1] hover:text-white dark:hover:text-[#0f1f2e]
                          hover:border-[#28666e] dark:hover:border-[#4db6c1]
                          hover:shadow-[0_4px_12px_rgba(40,102,110,0.25)] dark:hover:shadow-[0_4px_12px_rgba(77,182,193,0.25)]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M23.498 6.186a3.012 3.012 0 0 0-2.12-2.132C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.378.554a3.012 3.012 0 0 0-2.12 2.132A31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .502 5.814 3.012 3.012 0 0 0 2.12 2.132C4.495 20.5 12 20.5 12 20.5s7.505 0 9.378-.554a3.012 3.012 0 0 0 2.12-2.132A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.502-5.814ZM9.75 15.02v-6.04L15.5 12l-5.75 3.02Z" />
                    </svg>
                </a>

                {{-- Facebook --}}
                <a href="https://www.facebook.com/login/" target="_blank"
                    class="w-[38px] h-[38px] rounded-full flex items-center justify-center
                          text-[#28666e] dark:text-[#4db6c1]
                          border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                          transition-all duration-200
                          hover:bg-[#28666e] dark:hover:bg-[#4db6c1] hover:text-white dark:hover:text-[#0f1f2e]
                          hover:border-[#28666e] dark:hover:border-[#4db6c1]
                          hover:shadow-[0_4px_12px_rgba(40,102,110,0.25)] dark:hover:shadow-[0_4px_12px_rgba(77,182,193,0.25)]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M13.5 9H16l.375-3H13.5V4.5c0-.87.24-1.5 1.5-1.5h1.875V0H14.25C11.625 0 10.5 1.575 10.5 4.125V6H8v3h2.5v15h3V9Z" />
                    </svg>
                </a>
            </div>

            {{-- Copyright --}}
            <p class="text-xs text-[#033f63]/50 dark:text-[#7ec8e3]/40">Copyright © MentorChai — All rights reserved
            </p>
        </div>
    </footer>

    {{-- Page fade-in animation --}}
    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    {{-- ═══════════════ DARK MODE TOGGLE SCRIPT ═══════════════ --}}
    <script>
        // Profile dropdown functionality
        function toggleDropdown() {
            const menu = document.getElementById('dropdown-menu');
            menu.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profile-dropdown');
            const menu = document.getElementById('dropdown-menu');
            const panel = document.getElementById('notificationPanel');
            const notifyToggle = document.getElementById('notificationToggle');

            if (dropdown && menu && !dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }

            if (panel && notifyToggle && !notifyToggle.contains(event.target) && !panel.contains(event.target)) {
                panel.classList.add('hidden');
            }
        });

        function toggleNotifications() {
            const panel = document.getElementById('notificationPanel');
            if (!panel) return;
            panel.classList.toggle('hidden');
        }

        function markAllAsRead() {
            const dot = document.getElementById('notificationDot');
            const count = document.getElementById('notificationCount');
            if (dot) dot.classList.add('hidden');
            if (count) count.textContent = '০';
        }

        const toggle = document.getElementById('theme-toggle');
        const sun    = document.getElementById('icon-sun');
        const moon   = document.getElementById('icon-moon');
        const html   = document.documentElement;

        // Sync icons with current state on page load
        if (localStorage.theme === 'dark') {
            sun.classList.remove('hidden');
            moon.classList.add('hidden');
        } else {
            sun.classList.add('hidden');
            moon.classList.remove('hidden');
        }

        toggle.addEventListener('click', () => {
            const isDark = html.classList.toggle('dark');
            localStorage.theme = isDark ? 'dark' : 'light';

            // Swap icons
            sun.classList.toggle('hidden', !isDark);
            moon.classList.toggle('hidden', isDark);
        });
    </script>

    @stack('scripts')

</body>

</html>