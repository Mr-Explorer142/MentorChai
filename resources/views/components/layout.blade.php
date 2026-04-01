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

    <style>
        :root {
            --mc-deep: #1a4a52;
            --mc-primary: #28666e;
            --mc-mid: #3d8a8f;
            --mc-light: #b8dde1;
            --mc-pale: #eef7f8;
            --mc-navy: #033f63;
            --mc-sage: #7c9885;
            --mc-white: #ffffff;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--mc-pale);
        }

        .brand-font {
            font-family: 'Lora', serif;
        }

        /* ---- Navbar ---- */
        .mc-navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(40, 102, 110, 0.12);
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 2px 16px rgba(40, 102, 110, 0.07);
        }

        .mc-brand {
            font-family: 'Lora', serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--mc-primary) 0%, var(--mc-navy) 55%, var(--mc-sage) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.3px;
        }

        /* Nav links */
        .mc-nav-link {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--mc-primary);
            padding: 0.45rem 1rem;
            border-radius: 10px;
            border: 1.5px solid var(--mc-primary);
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            text-decoration: none;
        }

        .mc-nav-link:hover {
            background: var(--mc-primary);
            color: white;
            box-shadow: 0 4px 12px rgba(40, 102, 110, 0.22);
        }

        /* Search input */
        .mc-search {
            border: 1.5px solid rgba(40, 102, 110, 0.25);
            border-radius: 12px;
            padding: 0.4rem 0.85rem 0.4rem 2.4rem;
            font-size: 0.875rem;
            outline: none;
            background: rgba(238, 247, 248, 0.7);
            color: var(--mc-navy);
            transition: border-color 0.2s, box-shadow 0.2s;
            width: 200px;
        }

        .mc-search::placeholder {
            color: rgba(3, 63, 99, 0.4);
        }

        .mc-search:focus {
            border-color: var(--mc-primary);
            box-shadow: 0 0 0 3px rgba(40, 102, 110, 0.1);
            background: white;
        }

        /* Login btn */
        .mc-btn-login {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--mc-primary);
            padding: 0.45rem 1.1rem;
            border-radius: 10px;
            border: 1.5px solid rgba(40, 102, 110, 0.35);
            background: transparent;
            transition: background 0.18s, color 0.18s, border-color 0.18s, box-shadow 0.18s;
            text-decoration: none;
            cursor: pointer;
        }

        .mc-btn-login:hover,
        .mc-btn-login.active {
            background: var(--mc-primary);
            color: white;
            border-color: var(--mc-primary);
            box-shadow: 0 4px 12px rgba(40, 102, 110, 0.22);
        }

        /* Avatar dropdown */
        .mc-avatar-ring {
            border: 2px solid rgba(40, 102, 110, 0.3);
            border-radius: 9999px;
            padding: 1px;
            transition: border-color 0.2s;
        }

        .mc-avatar-ring:hover {
            border-color: var(--mc-primary);
        }

        .mc-dropdown {
            background: white;
            border: 1px solid rgba(40, 102, 110, 0.15);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(40, 102, 110, 0.14);
            padding: 0.5rem;
            min-width: 200px;
        }

        .mc-dropdown a,
        .mc-dropdown button {
            display: block;
            width: 100%;
            text-align: center;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.55rem 1rem;
            border-radius: 10px;
            color: var(--mc-navy);
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
            border: none;
            background: none;
            cursor: pointer;
        }

        .mc-dropdown a:hover,
        .mc-dropdown button:hover {
            background: rgba(40, 102, 110, 0.08);
            color: var(--mc-primary);
        }

        .mc-dropdown a.active-link {
            background: var(--mc-primary);
            color: white;
        }

        /* Divider */
        .mc-divider {
            width: 1px;
            height: 28px;
            background: rgba(40, 102, 110, 0.18);
            border-radius: 2px;
        }

        /* Mobile drawer */
        .mc-drawer-panel {
            background: white;
            border-right: 1px solid rgba(40, 102, 110, 0.12);
            box-shadow: 4px 0 24px rgba(40, 102, 110, 0.1);
        }

        .mc-drawer-link {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            color: var(--mc-navy);
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .mc-drawer-link:hover {
            background: rgba(40, 102, 110, 0.08);
            color: var(--mc-primary);
        }

        .mc-drawer-link.active-link {
            background: var(--mc-primary);
            color: white;
        }

        /* Footer */
        .mc-footer {
            background: white;
            border-top: 1px solid rgba(40, 102, 110, 0.1);
            box-shadow: 0 -2px 16px rgba(40, 102, 110, 0.05);
        }

        .mc-footer-link {
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(3, 63, 99, 0.7);
            text-decoration: none;
            transition: color 0.15s;
        }

        .mc-footer-link:hover,
        .mc-footer-link.active-link {
            color: var(--mc-primary);
            font-weight: 700;
        }

        .mc-social-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--mc-primary);
            border: 1.5px solid rgba(40, 102, 110, 0.2);
            transition: background 0.18s, color 0.18s, border-color 0.18s, box-shadow 0.18s;
        }

        .mc-social-btn:hover {
            background: var(--mc-primary);
            color: white;
            border-color: var(--mc-primary);
            box-shadow: 0 4px 12px rgba(40, 102, 110, 0.25);
        }

        /* Main content breathing room */
        main {
            min-height: 70vh;
        }

        /* Smooth page fade-in */
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

        main {
            animation: fadeUp 0.35s ease both;
        }
    </style>
</head>

<body>

    {{-- ======= HEADER ======= --}}
    <header>
        <nav>
            <div class="drawer">
                <input id="mobile-menu" type="checkbox" class="drawer-toggle" />

                <div class="drawer-content mc-navbar">
                    <div class="flex items-center justify-between sm:px-10 py-3 mx-auto">

                        {{-- LEFT: Hamburger + Brand --}}
                        <div class="flex items-center gap-3">
                            {{-- Hamburger (mobile only) --}}
                            <label for="mobile-menu"
                                class="md:hidden cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#28666e" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </label>

                            {{-- Brand --}}
                            <a href="{{ route('home') }}" class="mc-brand">MentorChai</a>
                        </div>

                        {{-- RIGHT --}}
                        <div class="flex items-center gap-3">

                            {{-- Mentor browse link (desktop) --}}
                            <a href="{{ route('mentors') }}" class="mc-nav-link hidden md:inline-flex items-center">
                                মেন্টর দেখুন
                            </a>

                            <div class="mc-divider hidden md:block"></div>

                            {{-- Search (desktop) --}}
                            <div class="relative hidden md:block">
                                <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-teal-500"
                                    fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.35-4.35" />
                                </svg>
                                <input type="search" placeholder="সার্চ করুন..." class="mc-search" />
                            </div>

                            {{-- Search icon (mobile) --}}
                            <label for="mobile-search"
                                class="md:hidden cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="#28666e" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </label>

                            <div class="mc-divider"></div>

                            {{-- Guest: Login --}}
                            @guest
                            <a href="{{ route('login') }}"
                                class="mc-btn-login {{ Route::is('login') ? 'active' : '' }}">
                                লগইন করুন
                            </a>
                            @endguest

                            {{-- Auth: Avatar dropdown --}}
                            @auth
                            <div class="dropdown dropdown-end">
                                <div tabindex="0"
                                    class="mc-avatar-ring cursor-pointer w-10 h-10 rounded-full overflow-hidden">
                                    <img src="{{ asset('images/About Page/tamim.jpg') }}" alt="avatar"
                                        class="w-full h-full object-cover" />
                                </div>
                                <div tabindex="-1" class="mc-dropdown dropdown-content z-50 mt-3 flex flex-col gap-1">
                                    @if (isMentor())
                                    <a href="{{ route('mentor_profile', auth()->user()->id) }}"
                                        class="{{ Route::is('mentor_profile') ? 'active-link' : '' }}">
                                        প্রোফাইল
                                    </a>
                                    <a href="{{ route('mentor_dashboard') }}"
                                        class="{{ Route::is('mentor_dashboard') ? 'active-link' : '' }}">
                                        ড্যাশবোর্ড
                                    </a>
                                    @elseif (isStudent())
                                    <a href="{{ route('student_profile', auth()->user()->id) }}"
                                        class="{{ Route::is('student_profile') ? 'active-link' : '' }}">
                                        প্রোফাইল
                                    </a>
                                    <a href="{{ route('student_dashboard') }}"
                                        class="{{ Route::is('student_dashboard') ? 'active-link' : '' }}">
                                        ড্যাশবোর্ড
                                    </a>
                                    @endif
                                    <div style="height:1px; background: rgba(40,102,110,0.1); margin: 2px 4px;"></div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">লগআউট</button>
                                    </form>
                                </div>
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>

                {{-- ======= Mobile Drawer ======= --}}
                <div class="drawer-side z-50">
                    <label for="mobile-menu" class="drawer-overlay"></label>
                    <aside class="mc-drawer-panel w-[78%] max-w-xs min-h-screen flex flex-col">

                        {{-- Drawer Header --}}
                        <div class="flex items-center justify-between px-5 py-4 border-b border-teal-100">
                            <span class="mc-brand">MentorChai</span>
                            <label for="mobile-menu"
                                class="cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 transition text-teal-700 text-lg font-bold">✕</label>
                        </div>

                        {{-- Drawer Links --}}
                        <div class="flex-1 overflow-y-auto p-4 flex flex-col gap-1.5 mt-2">
                            <a href="{{ route('mentors') }}"
                                class="mc-drawer-link {{ Route::is('mentors') ? 'active-link' : '' }}">
                                🎓 মেন্টর দেখুন
                            </a>
                            <a href="{{ route('home') }}"
                                class="mc-drawer-link {{ Route::is('home') ? 'active-link' : '' }}">
                                🏠 হোম
                            </a>
                            @guest
                            <a href="{{ route('student_register') }}"
                                class="mc-drawer-link {{ Route::is('student_register') ? 'active-link' : '' }}">
                                ✨ অ্যাকাউন্ট খুলুন
                            </a>
                            @endguest
                        </div>

                        {{-- Drawer Footer --}}
                        <div class="p-4 border-t border-teal-100">
                            <p class="text-xs text-center" style="color: rgba(3,63,99,0.4);">© MentorChai</p>
                        </div>
                    </aside>
                </div>
            </div>
        </nav>

        {{-- ======= Mobile Search Modal ======= --}}
        <input type="checkbox" id="mobile-search" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box w-full max-w-none rounded-none bg-white" style="min-height: 100vh;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-lg brand-font" style="color: var(--mc-navy);">সার্চ করুন</h3>
                    <label for="mobile-search"
                        class="cursor-pointer p-1.5 rounded-lg hover:bg-teal-50 transition font-bold text-teal-700">✕</label>
                </div>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-teal-500" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="search" placeholder="মেন্টর, বিষয় বা দক্ষতা খুঁজুন..."
                        class="w-full text-base pl-10 pr-4 py-3 rounded-2xl outline-none transition"
                        style="border: 1.5px solid rgba(40,102,110,0.25); color: var(--mc-navy); background: var(--mc-pale);"
                        onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                        onblur="this.style.borderColor='rgba(40,102,110,0.25)'; this.style.boxShadow='none'" />
                </div>
            </div>
        </div>
    </header>

    {{-- ======= MAIN CONTENT ======= --}}
    <main>{{ $slot }}</main>

    {{-- ======= FOOTER ======= --}}
    <footer class="mc-footer mt-auto">
        <div class="max-w-screen-xl mx-auto px-6 py-10 flex flex-col items-center gap-6">

            {{-- Brand --}}
            <span class="mc-brand text-xl">MentorChai</span>

            {{-- Nav links --}}
            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                <a href="{{ route('about') }}" class="mc-footer-link {{ Route::is('about') ? 'active-link' : '' }}">
                    আমাদের সম্পর্কে
                </a>
                <span style="color: rgba(40,102,110,0.25); font-size: 0.75rem; line-height: 1.5rem;">•</span>
                <a href="{{ route('contact') }}" class="mc-footer-link {{ Route::is('contact') ? 'active-link' : '' }}">
                    যোগাযোগ করুন
                </a>
                <span style="color: rgba(40,102,110,0.25); font-size: 0.75rem; line-height: 1.5rem;">•</span>
                <a href="{{ route('faq') }}" class="mc-footer-link {{ Route::is('faq') ? 'active-link' : '' }}">
                    প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী
                </a>
            </nav>

            {{-- Social icons --}}
            <div class="flex items-center gap-3">
                {{-- Instagram --}}
                <a href="https://www.instagram.com/accounts/login/" target="_blank" class="mc-social-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M7.5 2.25h9A5.25 5.25 0 0 1 21.75 7.5v9a5.25 5.25 0 0 1-5.25 5.25h-9A5.25 5.25 0 0 1 2.25 16.5v-9A5.25 5.25 0 0 1 7.5 2.25Zm4.5 5.25a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9Zm0 1.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm4.875-.375a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>
                {{-- YouTube --}}
                <a href="https://accounts.google.com/ServiceLogin?service=youtube" target="_blank"
                    class="mc-social-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M23.498 6.186a3.012 3.012 0 0 0-2.12-2.132C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.378.554a3.012 3.012 0 0 0-2.12 2.132A31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .502 5.814 3.012 3.012 0 0 0 2.12 2.132C4.495 20.5 12 20.5 12 20.5s7.505 0 9.378-.554a3.012 3.012 0 0 0 2.12-2.132A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.502-5.814ZM9.75 15.02v-6.04L15.5 12l-5.75 3.02Z" />
                    </svg>
                </a>
                {{-- Facebook --}}
                <a href="https://www.facebook.com/login/" target="_blank" class="mc-social-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path
                            d="M13.5 9H16l.375-3H13.5V4.5c0-.87.24-1.5 1.5-1.5h1.875V0H14.25C11.625 0 10.5 1.575 10.5 4.125V6H8v3h2.5v15h3V9Z" />
                    </svg>
                </a>
            </div>

            {{-- Copyright --}}
            <p class="text-xs" style="color: rgba(3,63,99,0.5);">
                Copyright © MentorChai — All rights reserved
            </p>
        </div>
    </footer>

</body>

</html>
