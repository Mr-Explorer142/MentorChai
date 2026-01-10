<x-layout>
    <!-- Wrapper with consistent gradient background -->
    <div class="bg-linear-to-br from-blue-50 via-white to-purple-50 text-gray-800">

        <!-- Hero / About Section -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Text Content -->
                <div>
                    <h1
                        class="text-4xl font-bold mb-6 bg-linear-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Get a Mentor When You're Stuck, Not a Course You Don't Need
                    </h1>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Traditional courses force students to commit for months, even when they only need help with one
                        topic.
                        We offer instant, one-to-one mentorship for exactly what you're struggling with-anytime, day or
                        night.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Whether it's a single concept, a problem you can't solve, or last minute exam confusion,
                        get direct help without subscriptions or long-term commitments.
                    </p>
                </div>

                <!-- Overlapping Images -->
                <div class="relative flex justify-center">
                    <img src="{{ asset('images/About Page/edteacher.png') }}" alt="Mentorship session"
                        class="w-3/4 rounded-xl shadow-lg" />
                    <img src="{{ asset('images/About Page/edtec.png') }}" alt="Online teaching"
                        class="absolute -bottom-10 right-0 w-2/5 rounded-xl shadow-xl z-10" />
                </div>

            </div>
        </section>

        <!-- Features Section -->
        <section class="bg-linear-to-br from-gray-50 to-blue-50 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <h2
                    class="text-3xl font-bold text-center mb-12 bg-linear-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Why Choose Us
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Card 1 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-200 border-l-4 border-blue-500">
                        <div class="w-16 h-16 mb-4 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-blue-900">Pay Only for the Time You Use</h3>
                        <p class="text-gray-600">Book a mentor for 15, 30, or 60 minutes. No subscriptions.</p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 cursor-pointer
            transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-green-200">
                        <div class="w-16 h-16 mb-4 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v2m14 0v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6h16z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 13h10" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-green-900">Affordable, Short Session Pricing</h3>
                        <p class="text-gray-600">Short sessions keep costs low and accessible.</p>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500 cursor-pointer
            transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-purple-200">
                        <div class="w-16 h-16 mb-4 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006.75 3.75v14.25A8.967 8.967 0 0112 20.25m0-14.208A8.967 8.967 0 0117.25 3.75v14.25A8.967 8.967 0 0012 20.25" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-purple-900">Learn by Topic</h3>
                        <p class="text-gray-600">Focus on exactly what you need—nothing extra.</p>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-l-4 border-orange-500 cursor-pointer
            transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-200">
                        <div class="w-16 h-16 mb-4 bg-orange-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0112 21.75c-5.385 0-9.75-4.365-9.75-9.75 0-4.012 2.424-7.458 5.89-8.958a7.5 7.5 0 0013.612 11.96z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-orange-900">Available 24/7</h3>
                        <p class="text-gray-600">Late night or last minute—mentors are available.</p>
                    </div>

                    <!-- Card 5 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-500 cursor-pointer
            transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-200">
                        <div class="w-16 h-16 mb-4 bg-indigo-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 12v3m-6-3v3m12-3v3M3 7.5h18M5.25 7.5V6a2.25 2.25 0 012.25-2.25h9A2.25 2.25 0 0118.75 6v1.5" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-indigo-900">Flexible Mentorship</h3>
                        <p class="text-gray-600">Mentor on your own schedule, from anywhere.</p>
                    </div>

                    <!-- Card 6 -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border-l-4 border-pink-500 cursor-pointer
            transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-pink-200">
                        <div class="w-16 h-16 mb-4 bg-pink-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5l7.5-9v6h6l-7.5 9v-6h-6z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-pink-900">Fast Mentor Matching</h3>
                        <p class="text-gray-600">Find the right mentor instantly—no waiting.</p>
                    </div>


                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-20 bg-linear-to-br from-purple-50 via-white to-blue-50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2
                    class="text-3xl font-bold mb-4 bg-linear-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Developers
                </h2>
                <p class="text-gray-600 text-md max-w-2xl mx-auto mb-12">
                    We are educators, students, and developers who believe learning should be flexible, affordable for
                    everyone.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

                    <!-- Developer 1 -->
                    <div
                        class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl hover:shadow-blue-200 border-t-4 border-blue-500 group">
                        <div
                            class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-blue-500 group-hover:border-purple-500 transition-all duration-300 group-hover:scale-110">
                            <img src="{{ asset('images/About Page/tamim.jpg') }}" alt="team member"
                                class="w-full h-full object-cover" />
                        </div>
                        <h3 class="font-semibold text-xl mb-1">Tahmid Alam Tamim</h3>
                        <p class="text-gray-500 mb-4">Senior Dev</p>
                        {{-- Social profiles --}}
                        <div class="flex justify-center gap-4">
                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/in/tamim" target="_blank"
                                class="w-10 h-10 bg-blue-100 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 hover:text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8h5v16H0V8zm7.5 0h4.8v2.2h.1c.67-1.27 2.3-2.6 4.7-2.6 5 0 5.9 3.3 5.9 7.6V24h-5V16c0-1.9 0-4.3-2.6-4.3-2.6 0-3 2-3 4.1V24h-5V8z" />
                                </svg>
                            </a>

                            <!-- GitHub -->
                            <a href="https://github.com/tamim" target="_blank"
                                class="w-10 h-10 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-800 hover:text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.11.82-.26.82-.577v-2.234c-3.338.724-4.033-1.415-4.033-1.415-.546-1.387-1.333-1.756-1.333-1.756-1.09-.744.082-.728.082-.728 1.205.085 1.838 1.238 1.838 1.238 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.304.762-1.604-2.665-.304-5.466-1.332-5.466-5.932 0-1.31.47-2.382 1.236-3.222-.124-.303-.536-1.523.117-3.176 0 0 1.008-.322 3.3 1.23a11.513 11.513 0 013.003-.404c1.02.005 2.046.138 3.003.404 2.29-1.552 3.296-1.23 3.296-1.23.655 1.653.243 2.873.12 3.176.77.84 1.234 1.912 1.234 3.222 0 4.61-2.807 5.625-5.48 5.922.43.37.814 1.102.814 2.222v3.293c0 .32.217.694.825.576C20.565 21.796 24 17.298 24 12c0-6.63-5.37-12-12-12z" />
                                </svg>
                            </a>

                            <!-- Email -->
                            <a href="mailto:tamim@example.com"
                                class="w-10 h-10 bg-red-100 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600 hover:text-white"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0L12 13 3 8" />
                                </svg>
                            </a>
                        </div>

                    </div>

                    <!-- Developer 2 -->
                    <div
                        class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl hover:shadow-purple-200 border-t-4 border-purple-500 group">
                        <div
                            class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-purple-500 group-hover:border-blue-500 transition-all duration-300 group-hover:scale-110">
                            <img src="{{ asset('images/About Page/adib.jpg') }}" alt="team member"
                                class="w-full h-full object-cover" />
                        </div>
                        <h3 class="font-semibold text-xl mb-1">Wasif Khan Lodi</h3>
                        <p class="text-gray-500 mb-4">Developer</p>
                        <div class="flex justify-center gap-4">
                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/in/tamim" target="_blank"
                                class="w-10 h-10 bg-blue-100 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 hover:text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8h5v16H0V8zm7.5 0h4.8v2.2h.1c.67-1.27 2.3-2.6 4.7-2.6 5 0 5.9 3.3 5.9 7.6V24h-5V16c0-1.9 0-4.3-2.6-4.3-2.6 0-3 2-3 4.1V24h-5V8z" />
                                </svg>
                            </a>

                            <!-- GitHub -->
                            <a href="https://github.com/tamim" target="_blank"
                                class="w-10 h-10 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-800 hover:text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.11.82-.26.82-.577v-2.234c-3.338.724-4.033-1.415-4.033-1.415-.546-1.387-1.333-1.756-1.333-1.756-1.09-.744.082-.728.082-.728 1.205.085 1.838 1.238 1.838 1.238 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.304.762-1.604-2.665-.304-5.466-1.332-5.466-5.932 0-1.31.47-2.382 1.236-3.222-.124-.303-.536-1.523.117-3.176 0 0 1.008-.322 3.3 1.23a11.513 11.513 0 013.003-.404c1.02.005 2.046.138 3.003.404 2.29-1.552 3.296-1.23 3.296-1.23.655 1.653.243 2.873.12 3.176.77.84 1.234 1.912 1.234 3.222 0 4.61-2.807 5.625-5.48 5.922.43.37.814 1.102.814 2.222v3.293c0 .32.217.694.825.576C20.565 21.796 24 17.298 24 12c0-6.63-5.37-12-12-12z" />
                                </svg>
                            </a>

                            <!-- Email -->
                            <a href="mailto:tamim@example.com"
                                class="w-10 h-10 bg-red-100 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600 hover:text-white"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0L12 13 3 8" />
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </section>
</x-layout>
