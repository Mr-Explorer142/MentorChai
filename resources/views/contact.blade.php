<x-layout>
    <div class="min-h-screen bg-base-200 px-6 md:px-18 space-y-6">

        <!-- Contact Section -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <h2
                class="text-3xl font-bold text-center mb-12 bg-linear-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Contact Us
            </h2>

            <div class="flex flex-col md:flex-row md:gap-10">

                <!-- Contact Info Cards -->
                <div class="w-full md:w-1/2 order-2 md:order-1 mt-8 md:mt-0">
                    <div class="grid grid-cols-1 gap-4">

                        <!-- Phone -->
                        <div
                            class="relative p-5 rounded-xl shadow-md border-l-4 border-blue-500 cursor-pointer
                                    transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg flex items-center gap-4">
                            <button
                                class="copy-btn absolute top-2 right-2 text-gray-400 hover:text-gray-700 transition text-lg"
                                data-copy="+8801122334455">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 16h12M8 12h12M8 8h12M4 4h16v16H4V4z" />
                                </svg>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.636a2.25 2.25 0 00-1.72-2.184l-2.51-.627a2.25 2.25 0 00-2.54 1.09l-.53.928a12.035 12.035 0 01-5.318-5.318l.928-.53a2.25 2.25 0 001.09-2.54l-.627-2.51A2.25 2.25 0 007.386 2.25H4.75A2.25 2.25 0 002.5 4.5v2.25z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Phone</p>
                                <p class="text-sm opacity-70">+8801122334455</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div
                            class="relative p-5 rounded-xl shadow-md border-l-4 border-blue-500 cursor-pointer
                                    transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg flex items-center gap-4">
                            <button
                                class="copy-btn absolute top-2 right-2 text-gray-400 hover:text-gray-700 transition text-lg"
                                data-copy="abcd@example.com">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 16h12M8 12h12M8 8h12M4 4h16v16H4V4z" />
                                </svg>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.375L2.25 6.75" />
                            </svg>
                            <div>
                                <p class="font-semibold">Email</p>
                                <p class="text-sm opacity-70">abcd@example.com</p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div
                            class="relative p-5 rounded-xl shadow-md border-l-4 border-green-500 cursor-pointer
                                    transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg flex items-center gap-4">
                            <button
                                class="copy-btn absolute top-2 right-2 text-gray-400 hover:text-gray-700 transition text-lg"
                                data-copy="+8801122334455">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 16h12M8 12h12M8 8h12M4 4h16v16H4V4z" />
                                </svg>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12a9.75 9.75 0 1117.812 5.567L21.75 21l-3.433-1.688A9.708 9.708 0 0112 21.75c-5.385 0-9.75-4.365-9.75-9.75z" />
                            </svg>
                            <div>
                                <p class="font-semibold">WhatsApp</p>
                                <p class="text-sm opacity-70">+8801122334455</p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div
                            class="relative p-5 rounded-xl shadow-md border-l-4 border-red-500 cursor-pointer
                                    transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg flex items-center gap-4">
                            <button
                                class="copy-btn absolute top-2 right-2 text-gray-400 hover:text-gray-700 transition text-lg"
                                data-copy="123 Business Avenue, Dhaka">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 16h12M8 12h12M8 8h12M4 4h16v16H4V4z" />
                                </svg>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Location</p>
                                <p class="text-sm opacity-70">123 Business Avenue, Dhaka</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Form -->
                <div class="w-full md:w-1/2 order-1 md:order-2">
                    <div class="rounded-xl shadow-md p-6">
                        <form class="space-y-4">

                            <input type="text" placeholder="Name"
                                class="input w-full text-gray-900 border border-gray-300
                       placeholder-gray-500 focus:border-blue-500 focus:outline-none" />

                            <input type="email" placeholder="Email"
                                class="input w-full text-gray-900 border border-gray-300
                       placeholder-gray-500 focus:border-blue-500 focus:outline-none" />

                            <input type="text" placeholder="Subject"
                                class="input w-full text-gray-900 border border-gray-300
                       placeholder-gray-500 focus:border-blue-500 focus:outline-none" />

                            <textarea rows="5" placeholder="Message"
                                class="textarea w-full text-gray-900 border border-gray-300
                       placeholder-gray-500 focus:border-blue-500 focus:outline-none"></textarea>

                            <button type="submit" class="btn w-full btn-primary">
                                Send Message
                            </button>

                        </form>
                    </div>
                </div>

            </div>

            <!-- Map -->
            <div class="mt-14 text-center">
                <h3 class="text-center font-medium mb-4 text-base-content">Find Us on Google Map</h3>
                <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z/data=!3m1!4b1!4m6!3m5!1s0x3755c5d05e7074dd:0xd1c58803049f00c7!8m2!3d23.8758547!4d90.3795438!16s%2Fm%2F02phgnn?entry=ttu&g_ep=EgoyMDI2MDEwNy4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank" rel="noopener noreferrer">
                    <div class="shadow-md rounded-xl overflow-hidden inline-block w-full max-w-3xl h-64">
                        <img src="{{ asset('images/Contact Page/map.png') }}" alt="Location Map"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                    </div>
                </a>
            </div>

        </section>
    </div>
</x-layout>
