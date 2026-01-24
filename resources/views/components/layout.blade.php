<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MentorChai</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])


</head>

<body>
    {{-- Header --}}
    <header>
        <nav>
            <!-- MOBILE DRAWER ROOT -->
            <div class="drawer">
                <input id="mobile-menu" type="checkbox" class="drawer-toggle" />

                <!-- NAVBAR CONTENT -->
                <div class="drawer-content">
                    <div class="navbar bg-base-100 shadow-sm p-6">

                        <!-- LEFT -->
                        <div class="flex-1 items-center gap-3">

                            <!-- HAMBURGER -->
                            <label for="mobile-menu" class="md:hidden cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </label>

                            <!-- LOGO -->
                            <a href="{{ route('home') }}" class="btn btn-ghost hidden md:inline
                               text-xl md:text-2xl font-mono text-primary">
                                MentorChai
                            </a>
                        </div>

                        <!-- RIGHT -->
                        <div class="flex items-center gap-3">

                            <!-- DESKTOP MENTORS -->
                            <a href="{{ route('mentors') }}" class="btn btn-secondary btn-outline hidden md:flex">
                                মেন্টর দেখুন
                            </a>

                            <div class="divider divider-horizontal hidden md:flex"></div>

                            <!-- DESKTOP SEARCH -->
                            <label class="input hidden md:flex input-primary border-2">
                                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="3" fill="none"
                                        stroke="currentColor">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </g>
                                </svg>
                                <input type="search" placeholder="সার্চ করুন..." />
                            </label>

                            <!-- MOBILE SEARCH ICON -->
                            <label for="mobile-search" class="md:hidden cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0
                                   A7.5 7.5 0 1 0 5.196 5.196
                                   a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </label>

                            <div class="divider divider-horizontal"></div>

                            <!-- AUTH -->
                            @guest
                            <a href="{{ route('login') }}"
                                class="btn btn-primary btn-outline {{ Route::is('login') ? 'bg-primary text-primary-content' : '' }}">
                                লগইন করুন
                            </a>
                            @endguest

                            @auth
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img
                                            src="{{ asset('images/About Page/tamim.jpg') }}" />
                                    </div>
                                </div>

                                <ul tabindex="-1" class="menu menu-sm dropdown-content
                                       bg-base-100 rounded-box z-10
                                       mt-3 w-52 p-2 shadow gap-2">
                                    @if (isMentor())
                                    <li><a href="{{ route('mentor_profile', auth()->user()->id) }}"
                                            class="font-bold justify-center {{ Route::is('mentor_profile') ? 'bg-primary text-primary-content' : '' }}">প্রোফাইল</a>
                                    </li>
                                    <li><a href="{{ route('mentor_dashboard') }}"
                                            class="font-bold justify-center {{ Route::is('mentor_dashboard') ? 'bg-primary text-primary-content' : '' }}">ড্যাশবোর্ড</a>
                                    </li>
                                    @elseif (isStudent())
                                    <li><a href="{{ route('student_profile', auth()->user()->id) }}"
                                            class="justify-center font-bold {{ Route::is('student_profile') ? 'bg-primary text-primary-content' : '' }}">প্রোফাইল</a>
                                    </li>
                                    <li><a href="{{ route('student_dashboard') }}"
                                            class="justify-center font-bold {{ Route::is('student_dashboard') ? 'bg-primary text-primary-content' : '' }}">ড্যাশবোর্ড</a>
                                    </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="justify-center">
                                            @csrf
                                            <button type="submit" class="font-bold">
                                                লগআউট
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- MOBILE DRAWER -->
                <div class="drawer-side z-50">
                    <label for="mobile-menu" class="drawer-overlay"></label>

                    <aside class="w-[75%] min-h-screen bg-base-100 flex flex-col">

                        <!-- DRAWER HEADER -->
                        <div class="flex items-center justify-between
                            p-6 border-b border-gray-600">
                            <h2 class="text-xl font-bold text-primary">
                                MentorChai
                            </h2>

                            <!-- CLOSE BUTTON -->
                            <label for="mobile-menu" class="btn  btn-ghost btn-circle">
                                ✕
                            </label>
                        </div>

                        <!-- SCROLLABLE MENU -->
                        <div class="flex-1 overflow-y-auto p-6">
                            <ul class="menu gap-2">

                                <li>
                                    <a href="{{ route('mentors') }}"
                                        class="font-semibold {{ Route::is('mentors') ? 'bg-secondary text-secondary-content' : '' }}">
                                        মেন্টর দেখুন
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('home') }}"
                                        class="{{ Route::is('home') ? 'bg-primary text-primary-content' : '' }}">
                                        হোম
                                    </a>
                                </li>

                                @guest
                                <li>
                                    <a href="{{ route('student_register') }}"
                                        class="{{ Route::is('student_register') ? 'bg-success text-success-content' : '' }}">
                                        অ্যাকাউন্ট খুলুন
                                    </a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </nav>

        <!-- MOBILE SEARCH MODAL -->
        <input type="checkbox" id="mobile-search" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box w-full h-full max-w-none rounded-none">
                <label for="mobile-search" class="btn btn-sm btn-circle absolute right-4 top-4">
                    ✕
                </label>

                <h3 class="font-bold text-lg mb-4">
                    সার্চ করুন
                </h3>

                <input type="search" placeholder="সার্চ করুন..." class="input input-bordered w-full text-lg" />
            </div>
        </div>
    </header>

    {{-- Main --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="footer footer-horizontal footer-center bg-base-100 text-base-content rounded-xl p-10 shadow-sm">
        <nav class="flex flex-col md:flex-row gap-4">
            {{-- About --}}
            <a href="{{ route('about') }}"
                class="link link-hover {{ Route::is('about') ? 'text-primary font-bold' : '' }}">আমাদের সম্পর্কে</a>
            {{-- Contact --}}
            <a href="{{ route('contact') }}"
                class="link link-hover {{ Route::is('contact') ? 'text-primary font-bold' : '' }}">যোগাযোগ করুন</a>
            {{-- FAQ --}}
            <a href="{{ route('faq') }}"
                class="link link-hover {{ Route::is('faq') ? 'text-primary font-bold' : '' }}">প্রায়শই জিজ্ঞাসিত
                প্রশ্নাবলী</a>
        </nav>
        <nav>
            <div class="grid grid-flow-col gap-4">
                <div class="flex gap-3">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/accounts/login/" target="_blank"
                        class="p-2 rounded-full cursor-pointer transition-all duration-300 hover:bg-primary hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path
                                d="M7.5 2.25h9A5.25 5.25 0 0 1 21.75 7.5v9a5.25 5.25 0 0 1-5.25 5.25h-9A5.25 5.25 0 0 1 2.25 16.5v-9A5.25 5.25 0 0 1 7.5 2.25Zm4.5 5.25a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9Zm0 1.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm4.875-.375a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a href="https://accounts.google.com/ServiceLogin?service=youtube" target="_blank"
                        class="p-2 rounded-full cursor-pointer transition-all duration-300 hover:bg-primary hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path
                                d="M23.498 6.186a3.012 3.012 0 0 0-2.12-2.132C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.378.554a3.012 3.012 0 0 0-2.12 2.132A31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .502 5.814 3.012 3.012 0 0 0 2.12 2.132C4.495 20.5 12 20.5 12 20.5s7.505 0 9.378-.554a3.012 3.012 0 0 0 2.12-2.132A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.502-5.814ZM9.75 15.02v-6.04L15.5 12l-5.75 3.02Z" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/login/" target="_blank"
                        class="p-2 rounded-full cursor-pointer transition-all duration-300 hover:bg-primary hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path
                                d="M13.5 9H16l.375-3H13.5V4.5c0-.87.24-1.5 1.5-1.5h1.875V0H14.25C11.625 0 10.5 1.575 10.5 4.125V6H8v3h2.5v15h3V9Z" />
                        </svg>
                    </a>
                </div>

            </div>
        </nav>
        <aside>
            <p>Copyright © MentorChai - All rights reserved by MentorChai</p>
        </aside>
    </footer>
</body>

</html>