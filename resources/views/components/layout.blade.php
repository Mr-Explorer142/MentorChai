<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MentorChai</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Hind+Siliguri:wght@400;500;600;700&family=Lora:wght@400;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&family=Nunito:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])

    {{-- Prevent flash of wrong theme: runs before page renders --}}
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
        }
    </script>
</head>

<body
    class="font-[Nunito,'Hind_Siliguri','Noto_Sans_Bengali','SolaimanLipi','Kalpurush','Nikosh','Siyam_Rupali','Vrinda',sans-serif] bg-[#eef7f8] dark:bg-[#0f1f2e] min-h-screen flex flex-col transition-colors duration-300">

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

                    <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3 mx-auto w-full">

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
                                {{ Route::is('home', 'about', 'faq', 'terms') ? 'শিক্ষক খুঁজুন' : 'Find Mentors' }}
                            </a>

                            {{-- Vertical divider (desktop) --}}
                            <div class="hidden md:block w-px h-7 bg-#28666e/0.18 dark:bg-#4db6c1/0.25 rounded-sm">
                            </div>
                            @auth
                            {{-- Vertical divider --}}
                            <div class="hidden sm:block w-px h-7 bg-[#28666e]/20 dark:bg-[#4db6c1]/25 rounded-sm"></div>

                            {{-- Notification button --}}
                            <div class="relative">
                                <button id="notificationToggle" onclick="toggleNotifications()"
                                    class="relative p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors"
                                    title="Notifications">

                                    <span id="notificationDot" class="{{ $unreadCount > 0 ? '' : 'hidden' }} absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full
                                 bg-[#ef4444] border border-white dark:border-[#0f1f2e]"></span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="#28666e" class="w-5 h-5 dark:stroke-[#4db6c1]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>

                                {{-- Notification Panel --}}
                                <div id="notificationPanel" class="hidden fixed md:absolute left-auto right-2 md:right-0
        top-14 md:top-full md:mt-2 w-[290px] sm:w-80
        rounded-xl bg-white dark:bg-[#122333]
        border border-[#28666e]/15 dark:border-[#4db6c1]/20
        shadow-[0_8px_24px_rgba(40,102,110,0.15)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.4)]
        z-[999] overflow-hidden">

                                    {{-- Panel Header --}}
                                    <div class="px-3 py-2 bg-[#eaf7f8] dark:bg-[#102d3b]
            border-b border-[#28666e]/10 dark:border-[#4db6c1]/10">
                                        <div class="flex items-center justify-between gap-2">
                                            <p class="font-bold text-xs text-[#033f63] dark:text-[#7ec8e3]">Notifications</p>
                                            <div class="flex items-center gap-1.5">
                                                <button id="markAllBtn" onclick="markAllAsRead()"
                                                    class="flex items-center justify-center gap-1 text-[10px] font-semibold text-[#033f63] dark:text-[#d2f1ff]
                                                           bg-[#28666e]/10 dark:bg-[#4db6c1]/15 px-2 py-0.5 rounded-md
                                                           hover:bg-[#28666e]/15 dark:hover:bg-[#4db6c1]/25 transition-colors">
                                                    <svg class="w-2.5 h-2.5 text-[#28666e] dark:text-[#4db6c1] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span class="whitespace-nowrap">Mark all read</span>
                                                </button>
                                                <span id="notificationCount"
                                                    class="{{ $unreadCount > 0 ? '' : 'hidden' }} badge badge-xs bg-[#28666e] text-white border-0 shrink-0">
                                                    {{ $unreadCount }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Notification List --}}
                                    <div class="p-2 space-y-1.5 max-h-56 sm:max-h-72 overflow-y-auto" id="notificationList">
                                        @include('partials.notification-items', ['notifications' => $notifications])
                                    </div>

                                </div>
                            </div>
                            @endauth

                            {{-- Dark Mode Toggle --}}
                            <button id="theme-toggle"
                                class="p-1.5 rounded-lg hover:bg-teal-50 dark:hover:bg-teal-900/30 transition-colors"
                                title="Dark Mode">
                                {{-- Sun icon - shown in dark mode --}}
                                <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg"
                                    class="hidden w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.7.7M6.34 17.66l-.7.7m12.02 0-.7-.7M6.34 6.34l-.7-.7M12 7a5 5 0 1 0 0 10A5 5 0 0 0 12 7Z" />
                                </svg>
                                {{-- Moon icon - shown in light mode --}}
                                <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#28666e]"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                                </svg>
                            </button>

                            {{-- Language Toggle --}}
                            <button id="language-toggle" type="button" data-language-toggle
                                class="relative inline-flex h-9 w-20 items-center rounded-full bg-[#e3efed] p-1 text-xs font-bold shadow-inner transition-colors hover:bg-[#d6e8e5] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#28666e] focus-visible:ring-offset-2 dark:bg-[#203d45] dark:hover:bg-[#294b54] dark:focus-visible:ring-[#4db6c1] cursor-pointer"
                                aria-label="Switch to Bengali" title="Switch to Bengali">
                                <span id="language-toggle-indicator" aria-hidden="true"
                                    class="absolute left-1 top-1 h-7 w-9 rounded-full bg-[#28666e] shadow-sm transition-transform duration-200 dark:bg-[#4db6c1]"></span>
                                <span data-language-option="en"
                                    class="relative z-10 flex-1 text-center text-white dark:text-[#0f1f2e]">EN</span>
                                <span data-language-option="bn"
                                    class="relative z-10 flex-1 text-center text-[#28666e] dark:text-[#4db6c1]">বাংলা</span>
                                <span id="language-toggle-label" class="sr-only">বাংলা</span>
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
                                Login
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
                                              {{ Route::is('mentor_profile') ? '!bg-[#28666e] !text-white' : '' }}">
                                        Profile
                                    </a>
                                    <a href="{{ route('mentor_dashboard') }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('mentor_dashboard') ? '!bg-[#28666e] !text-white' : '' }}">
                                        Dashboard
                                    </a>
                                    @elseif (isStudent())
                                    <a href="{{ route('student_profile', auth()->user()->id) }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('student_profile') ? '!bg-[#28666e] !text-white' : '' }}">
                                        Profile
                                    </a>
                                    <a href="{{ route('student_dashboard') }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('student_dashboard') ? '!bg-[#28666e] !text-white' : '' }}">
                                        Dashboard
                                    </a>
                                    @elseif (auth()->user()->isAdmin())
                                    <a href="{{ route('admin_dashboard') }}"
                                        class="block w-full text-center text-sm font-semibold
                                              text-[#033f63] dark:text-[#7ec8e3]
                                              px-4 py-[0.55rem] rounded-[10px] no-underline
                                              transition-all duration-150
                                              hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                              {{ Route::is('admin_dashboard') ? '!bg-[#28666e] !text-white' : '' }}">
                                        Dashboard
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
                                            Logout
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
                            <a href="{{ route('mentors') }}" onclick="document.getElementById('mobile-menu').checked = false;" class="flex items-center justify-between text-[0.9rem] font-bold no-underline
                                      px-4 py-2.5 rounded-xl
                                      bg-linear-to-r from-[#28666e] to-[#033f63] dark:from-[#4db6c1] dark:to-[#7ec8e3]
                                      text-white dark:text-[#0f1f2e]
                                      shadow-sm shadow-[#28666e]/20 dark:shadow-[#4db6c1]/20
                                      hover:opacity-95 active:scale-[0.98]
                                      transition-all duration-150">
                                <span>{{ Route::is('home', 'about', 'faq', 'terms') ? 'শিক্ষক খুঁজুন' : 'Find Mentors' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                            @guest
                            <a href="{{ route('student_register') }}" onclick="document.getElementById('mobile-menu').checked = false;" class="block text-[0.9rem] font-semibold text-[#033f63] dark:text-[#7ec8e3] no-underline
                                      px-4 py-[0.65rem] rounded-xl
                                      transition-all duration-150
                                      hover:bg-[#28666e]/8 dark:hover:bg-[#4db6c1]/12 hover:text-[#28666e] dark:hover:text-[#4db6c1]
                                      {{ Route::is('student_register') ? '!bg-[#28666e] !text-white' : '' }}">
                                Register
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
    </header>

    {{-- ═══════════════ MAIN CONTENT ═══════════════ --}}
    <main class="flex-1 animate-fade-up">{{ $slot }}</main>

    {{-- ═══════════════ FOOTER ═══════════════ --}}
    <footer class="border-t border-[#28666e]/10 dark:border-[#4db6c1]/10
                   shadow-[0_-2px_16px_rgba(40,102,110,0.05)] dark:shadow-[0_-2px_16px_rgba(0,0,0,0.2)]
                   mt-auto transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col items-center gap-6">

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
                    About Us
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
                    Contact Us
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
                    FAQs
                </a>
                <span class="text-[#28666e]/25 dark:text-[#4db6c1]/25 text-xs leading-6">•</span>
                <a href="{{ route('terms') }}"
                    class="text-sm font-medium text-[#033f63]/70 dark:text-[#7ec8e3]/70 no-underline
                          relative pb-0.5
                          transition-all duration-300 ease-in-out
                          hover:text-[#28666e] dark:hover:text-[#4db6c1] hover:font-bold
                          after:absolute after:bottom-0 after:left-0 after:h-[1.5px] after:w-0
                          after:bg-[#28666e] dark:after:bg-[#4db6c1] after:rounded-full
                          after:transition-[width] after:duration-300 hover:after:w-full
                          {{ Route::is('terms') ? 'text-![#28666e] dark:text-![#4db6c1] font-bold! after:w-full!' : '' }}">
                    Terms & Conditions
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
            <p class="text-xs text-[#033f63]/50 dark:text-[#7ec8e3]/40">Copyright © MentorChai - All rights reserved
            </p>
    </footer>

    {{-- ═══════════════ NOTIFICATION INFO MODAL ═══════════════ --}}
    <dialog id="notificationInfoModal" class="modal modal-bottom sm:modal-middle z-[99999]">
        <div class="modal-box p-5 max-w-sm rounded-2xl bg-white dark:bg-[#162a38] border border-[#28666e]/20 dark:border-[#4db6c1]/20 shadow-xl">
            <div class="flex items-center justify-between pb-2.5 mb-3 border-b border-teal-100 dark:border-teal-900/40">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-teal-50 dark:bg-teal-900/40 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#28666e] dark:text-[#4db6c1]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-sm text-[#033f63] dark:text-[#d2f1ff]">Notification</h3>
                </div>
                <form method="dialog">
                    <button class="w-7 h-7 rounded-lg flex items-center justify-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">✕</button>
                </form>
            </div>
            <p id="notificationInfoModalText" class="text-xs sm:text-sm text-[#033f63]/80 dark:text-[#7ec8e3]/90 py-1 leading-relaxed"></p>
            <div class="modal-action mt-4 justify-end">
                <form method="dialog">
                    <button class="px-4 py-1.5 rounded-lg text-xs font-semibold text-white bg-[#28666e] hover:bg-[#1f5057] dark:bg-[#4db6c1] dark:hover:bg-[#3ba0ab] dark:text-[#0f1f2e] transition-colors shadow-sm cursor-pointer">
                        Got it
                    </button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop bg-black/40 backdrop-blur-xs">
            <button>close</button>
        </form>
    </dialog>

    <script>
        // ─── Notification Info Modal ──────────────────────────────────────
        window.showNotificationModal = function(message) {
            const modal = document.getElementById('notificationInfoModal');
            const textEl = document.getElementById('notificationInfoModalText');
            if (modal && textEl) {
                textEl.textContent = message;
                if (typeof modal.showModal === 'function') {
                    modal.showModal();
                } else {
                    modal.classList.remove('hidden');
                }
            } else {
                alert(message);
            }
        };

        // ─── Profile Dropdown ───────────────────────────────────────────
    function toggleDropdown() {
        const menu = document.getElementById('dropdown-menu');
        if (menu) menu.classList.toggle('hidden');
    }

    @auth
    // ─── Notification Panel ─────────────────────────────────────────
    function toggleNotifications() {
        const panel = document.getElementById('notificationPanel');
        if (!panel) return;
        panel.classList.toggle('hidden');
    }

function markAsRead(id) {
fetch(`/notifications/${id}/mark-read`, {
method: 'POST',
headers: {
'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
'Content-Type': 'application/json',
}
}).then(() => {
const el = document.getElementById('notification-' + id);
if (el) {
el.classList.remove(
'bg-teal-50', 'border-[#28666e]/20'
);
el.classList.add(
'bg-[#f6fbfb]', 'border-[#28666e]/10'
);
const btn = el.querySelector('button[title="Mark as read"]');
if (btn) btn.remove();
}
updateUnreadCount(-1);
}).catch(err => console.error('Mark read failed:', err));
}

function markAllAsRead() {
fetch('/notifications/mark-all-read', {
method: 'POST',
headers: {
'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
'Content-Type': 'application/json',
}
}).then(() => {
document.querySelectorAll('#notificationList > div').forEach(el => {
el.classList.remove(
'bg-teal-50', 'dark:bg-teal-900/20',
'border-[#28666e]/20', 'dark:border-[#4db6c1]/20'
);
el.classList.add(
'bg-[#f6fbfb]', 'dark:bg-[#0f2430]',
'border-[#28666e]/10', 'dark:border-[#4db6c1]/10'
);
const btn = el.querySelector('button[title="Mark as read"]');
if (btn) btn.remove();
});

// Hide unread badge and dot (not remove!)
const count = document.getElementById('notificationCount');
const dot = document.getElementById('notificationDot');
if (count) count.classList.add('hidden');
if (dot) dot.classList.add('hidden');
}).catch(err => console.error('Mark all read failed:', err));
}

function updateUnreadCount(delta) {
const badge = document.getElementById('notificationCount');
const dot = document.getElementById('notificationDot');
if (badge) {
const current = parseInt(badge.textContent) + delta;
if (current <= 0) { badge.classList.add('hidden'); if (dot) dot.classList.add('hidden'); } else {
    badge.textContent=current; badge.classList.remove('hidden'); if (dot) dot.classList.remove('hidden'); } } else { if
    (dot) dot.classList.add('hidden'); } }


// ─── Auto-refresh notifications (polling) ────────────────────────
    let previousUnreadCount = {{ $unreadCount }};
    const notificationSound = new Audio('{{ asset("sounds/notification.mp3") }}');

    // Unlock audio autoplay on first user interaction
    document.addEventListener('click', function unlockAudio() {
        notificationSound.play().then(() => {
            notificationSound.pause();
            notificationSound.currentTime = 0;
        }).catch(() => {});
        document.removeEventListener('click', unlockAudio);
    }, { once: true });

    function refreshNotifications() {
        fetch('{{ route("notifications.poll") }}', {
            headers: { 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('notificationList');
            if (list) list.innerHTML = data.html;

            const badge   = document.getElementById('notificationCount');
            const dot     = document.getElementById('notificationDot');

            if (data.unreadCount > 0) {
                if (badge) { badge.textContent = data.unreadCount; badge.classList.remove('hidden'); }
                if (dot)   dot.classList.remove('hidden');
            } else {
                if (badge) badge.classList.add('hidden');
                if (dot)   dot.classList.add('hidden');
            }

            if (data.unreadCount > previousUnreadCount) {
                notificationSound.play().catch(err => {
                    console.warn('Notification sound blocked until user interacts with page:', err);
                });
            }
            previousUnreadCount = data.unreadCount;
        })
        .catch(err => console.error('Notification poll failed:', err));
    }

    setInterval(refreshNotifications, 12000);
    @endauth

    // ─── Close dropdowns when clicking outside ──────────────────────
    document.addEventListener('click', function (event) {
        // Profile dropdown
        const dropdown = document.getElementById('profile-dropdown');
        const menu     = document.getElementById('dropdown-menu');
        if (dropdown && menu && !dropdown.contains(event.target)) {
            menu.classList.add('hidden');
        }

        // Notification panel
        const panel        = document.getElementById('notificationPanel');
        const notifyToggle = document.getElementById('notificationToggle');
        if (panel && notifyToggle
            && !notifyToggle.contains(event.target)
            && !panel.contains(event.target)) {
            panel.classList.add('hidden');
        }
    });

    // ─── Dark Mode Toggle ───────────────────────────────────────────
    const toggle = document.getElementById('theme-toggle');
    const sun    = document.getElementById('icon-sun');
    const moon   = document.getElementById('icon-moon');
    const html   = document.documentElement;

    // Sync icons on page load
    if (localStorage.theme === 'dark') {
        sun.classList.remove('hidden');
        moon.classList.add('hidden');
    } else {
        sun.classList.add('hidden');
        moon.classList.remove('hidden');
    }

    toggle.addEventListener('click', () => {
        const isDark = html.classList.toggle('dark');
        html.setAttribute('data-theme', isDark ? 'dark' : 'light');
        localStorage.theme = isDark ? 'dark' : 'light';
        sun.classList.toggle('hidden', !isDark);
        moon.classList.toggle('hidden', isDark);
    });
    </script>

    {{-- ── Online Heartbeat: keeps last_seen_at fresh every 60s ── --}}
    @auth
    <script>
        (function () {
            const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
            function ping() {
                fetch('/ping', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json' },
                    keepalive: true,
                }).catch(() => {});
            }
            ping(); // immediate ping on page load
            setInterval(ping, 60000); // then every 60 seconds
        })();
    </script>
    @endauth

    @stack('scripts')

</body>

</html>
