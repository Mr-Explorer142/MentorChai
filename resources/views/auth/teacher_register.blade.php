<x-layout>
    <div
        class="min-h-screen bg-linear-to-br from-base-200 via-base-100 to-base-200 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary/5 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary/5 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="relative w-full max-w-md">
            {{-- Logo/Brand Section --}}
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-linear-to-br from-primary to-secondary rounded-2xl shadow-lg mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                </div>
                <h1
                    class="text-3xl font-bold bg-linear-to-r from-primary to-secondary bg-clip-text text-transparent mb-2">
                    মেন্টর একাউন্ট
                </h1>
                <p class="text-base-content/60">শিক্ষার্থীদের পথপ্রদর্শক হন</p>
            </div>

            {{-- Main Card --}}
            <div class="card bg-base-100 shadow-2xl border border-base-200">
                <div class="card-body p-8">

                    {{-- Social Signup Buttons --}}
                    <div class="space-y-3 mb-6">
                        <button class="btn btn-outline w-full gap-3 hover:bg-base-200 transition-all">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
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
                            <span class="font-medium">Google দিয়ে শুরু করুন</span>
                        </button>

                        <button class="btn btn-outline w-full gap-3 hover:bg-base-200 transition-all">
                            <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            <span class="font-medium">Facebook দিয়ে শুরু করুন</span>
                        </button>
                    </div>

                    {{-- Divider --}}
                    <div class="divider text-sm text-base-content/60">অথবা ই-মেইল দিয়ে</div>

                    {{-- Registration Form --}}
                    <form action="{{ route('register') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="role" value="mentor">

                        {{-- Name --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    সম্পূর্ণ নাম
                                </span>
                            </label>
                            <input type="text" name="name"
                                class="input input-bordered focus:input-primary transition-all"
                                placeholder="আপনার পুরো নাম দিন" required />
                        </div>

                        {{-- Email --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                    ই-মেইল
                                </span>
                            </label>
                            <input type="email" name="email"
                                class="input input-bordered focus:input-primary transition-all"
                                placeholder="আপনার ই-মেইল দিন" required />
                        </div>

                        {{-- Password --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                    পাসওয়ার্ড
                                </span>
                            </label>
                            <input type="password" name="password"
                                class="input input-bordered focus:input-primary transition-all"
                                placeholder="শক্তিশালী পাসওয়ার্ড দিন" required />
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    কনফার্ম পাসওয়ার্ড
                                </span>
                            </label>
                            <input type="password" name="password_confirmation"
                                class="input input-bordered focus:input-primary transition-all"
                                placeholder="পাসওয়ার্ড আবার দিন" required />
                        </div>

                        {{-- Mentor Benefits Info --}}
                        <div class="alert alert-info">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <div class="text-xs">
                                <h3 class="font-bold">মেন্টর হিসেবে পাবেন</h3>
                                <div class="text-xs">নিজের রেট সেট করার সুবিধা এবং নমনীয় সময়সূচী</div>
                            </div>
                        </div>

                        {{-- Terms Checkbox --}}
                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-3">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" required />
                                <span class="label-text text-sm">
                                    আমি <a href="#" class="link link-primary">শর্তাবলী</a> এবং <a
                                        href="#" class="link link-primary">গোপনীয়তা নীতি</a> সম্মত
                                </span>
                            </label>
                        </div>

                        {{-- Register Button --}}
                        <button class="btn btn-primary w-full gap-2 shadow-lg hover:shadow-xl transition-all"
                            type="submit">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            মেন্টর হিসেবে যুক্ত হন
                        </button>
                    </form>

                    {{-- Switch to Student --}}
                    <div class="mt-6 p-4 bg-base-200 rounded-xl text-center">
                        <p class="text-sm text-base-content/70 mb-3">
                            স্টুডেন্ট হিসেবে যুক্ত হতে চান?
                        </p>
                        <a href="{{ route('student_register') }}"
                            class="btn btn-outline btn-primary btn-sm gap-2 hover:scale-105 transition-transform">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            স্টুডেন্ট একাউন্ট খুলুন
                        </a>
                    </div>

                    {{-- Login Link --}}
                    <div class="text-center mt-4">
                        <p class="text-sm text-base-content/70">
                            ইতিমধ্যে একাউন্ট আছে?
                            <a href="{{ route('login') }}" class="link link-primary font-semibold">লগইন করুন</a>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layout>
