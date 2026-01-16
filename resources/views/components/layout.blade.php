<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])


</head>

<body>
    {{-- Header --}}
    <header>
        <nav>
            <div class="navbar bg-base-100 shadow-sm md:px-20">
                {{-- Left Part --}}
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul tabindex="-1"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                            <li><a href="{{ route('mentors') }}"
                                    class="{{ Route::is('mentors') ? 'text-primary font-bold' : '' }}">Mentors</a></li>
                            @auth
                                @if (isMentor())
                                    <li><a href="{{ route('mentor_profile', auth()->user()->id) }}"
                                            class="{{ Route::is('mentor_profile') ? 'text-primary font-bold' : '' }}">Profile</a>
                                    </li>
                                    <li><a href="{{ route('mentor_dashboard') }}"
                                            class="{{ Route::is('mentor_dashboard') ? 'text-primary font-bold' : '' }}">Dashboard</a>
                                    </li>
                                @elseif (isStudent())
                                    <li><a href="{{ route('student_dashboard') }}"
                                            class="{{ Route::is('student_dashboard') ? 'text-primary font-bold' : '' }}">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('student_profile', auth()->user()->id) }}"
                                            class="{{ Route::is('student_profile') ? 'text-primary font-bold' : '' }}">Profile</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <a class="font-bold text-primary text-lg font-mono md:mx-3"
                        href="{{ route('home') }}">MentorChai</a>
                </div>
                {{-- Center Part --}}
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <li><a href="{{ route('mentors') }}"
                                class="btn md:mx-2 {{ Route::is('mentors') ? 'btn-primary' : '' }}">Mentors</a></li>
                        @auth
                            @if (isMentor())
                                <li><a href="{{ route('mentor_dashboard') }}"
                                        class="btn {{ Route::is('mentor_dashboard') ? 'btn-primary' : '' }}">Dashboard</a>
                                </li>
                                <li><a href="{{ route('mentor_profile', auth()->user()->id) }}"
                                        class="btn md:mx-2 {{ Route::is('mentor_profile') ? 'btn-primary' : '' }}">Profile</a>
                                </li>
                            @elseif (isStudent())
                                <li><a href="{{ route('student_dashboard') }}"
                                        class="btn {{ Route::is('student_dashboard') ? 'btn-primary' : '' }}">Dashboard</a>
                                </li>
                                <li><a href="{{ route('student_profile', auth()->user()->id) }}"
                                        class="btn md:mx-2 {{ Route::is('student_profile') ? 'btn-primary' : '' }}">Profile</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
                {{-- Right Part --}}
                <div class="navbar-end">
                    <label class="swap swap-rotate">
                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" class="theme-controller" value="dark" />

                        <!-- sun icon -->
                        <svg class="swap-off mr-2 h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>

                        <!-- moon icon -->
                        <svg class="swap-on mr-2 h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>
                    </label>
                    @guest
                        <a href="{{ route('login') }}"
                            class="btn btn-soft btn-primary md:mx-2 {{ Route::is('login') ? 'btn-active btn-primary' : '' }}">Login</a>
                        <a class="btn btn-soft btn-success ml-2 {{ Route::is('student_register') ? 'btn-active btn-primary' : '' }}"
                            href="{{ route('student_register') }}">Sign Up</a>
                    @endguest
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-soft btn-warning md:mx-2" type="submit">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    {{-- Main --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="footer footer-horizontal footer-center bg-base-100 text-base-content rounded-xl p-10 shadow-sm">
        <nav class="grid grid-flow-col gap-4">
            {{-- About --}}
            <a href="{{ route('about') }}"
                class="link link-hover {{ Route::is('about') ? 'text-primary font-bold' : '' }}">About
                us</a>
            {{-- Contact --}}
            <a href="{{ route('contact') }}"
                class="link link-hover {{ Route::is('contact') ? 'text-primary font-bold' : '' }}">Contact us</a>
            {{-- FAQ --}}
            <a href="{{ route('faq') }}"
                class="link link-hover {{ Route::is('faq') ? 'text-primary font-bold' : '' }}">FAQ</a>
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
