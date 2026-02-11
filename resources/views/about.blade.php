<x-layout>

    <div class="min-h-screen bg-base-200 px-6 md:px-20 space-y-6">
        <!-- Hero / About Section -->
        <section class="max-w-7xl mx-auto px-6 py-16 md:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Text Content -->
                <div class="space-y-8">
                    <h1 class="text-3xl md:text-2xl lg:text-4xl font-bold">
                        পরীক্ষার আগের রাতে হঠাৎ কোনো টপিক বুঝতে অসুবিধা হচ্ছে? কিছুক্ষণের জন্য একজন শিক্ষকের সহায়তা
                        প্রয়োজন?
                    </h1>
                    <p class="text-xl md:text-2xl font-semibold text-purple-600">
                        এমন পরিস্থিতিতেই পাশে আছে MentorChai...
                    </p>
                    <p class="text-lg leading-loose">
                        গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও <span
                            class="font-semibold text-blue-600">MentorChai</span> আপনাকে প্রদান করছে ইন্সট্যান্ট
                        মেন্টরশিপ
                        সুবিধা। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।
                    </p>
                    <div class="p-6 rounded-2xl border-l-4 border-purple-500 shadow-lg">
                        <p class="text-lg leading-loose">
                            পরীক্ষার আগের রাতে হঠাৎ <span class="font-semibold text-blue-600">Calculus</span> বুঝতে
                            অসুবিধা
                            হচ্ছে? কিংবা <span class="font-semibold text-purple-600">Binary Search Algorithm</span>?
                            শুধুমাত্র <span class="font-semibold text-green-600">Kirchhoff's Laws</span> বুঝতে মাত্র এক
                            ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>
                        <p class="text-xl font-bold text-purple-600 mt-4">
                            ভয় নেই, MentorChai আছে আপনার সাথে!
                        </p>
                    </div>
                </div>

                <!-- Overlapping Images -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md">
                        <img src="{{ asset('images/About Page/edteacher.png') }}" alt="Mentorship session"
                            class="w-full rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-300" />
                        <img src="{{ asset('images/About Page/edtec.png') }}" alt="Online teaching"
                            class="absolute bottom-[-30px] right-[-30px] w-2/5 rounded-xl shadow-2xl z-10 border-4 border-white transform hover:scale-110 transition-transform duration-300" />
                    </div>
                </div>

            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-2xl lg:text-4xl font-extrabold mb-4">
                        আমাদের সুবিধাসমূহ
                    </h2>
                    <p class="text-lg max-w-2xl mx-auto leading-relaxed">
                        যা MentorChai কে অনন্য করে তুলেছে
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Feature Card 1 -->
                    <div
                        class="group cursor-pointer relative backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-cyan-200 hover:border-cyan-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-cyan-50/50 to-blue-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/payasyougo.png') }}" alt="Pay as you go"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-cyan-400">যতটুকু সময়, ঠিক ততটুকুর খরচ</h3>
                            <p class=" leading-relaxed">
                                ৩০, ৪৫ বা ৬০ মিনিটের জন্য মেন্টর বুক করুন এবং শুধুমাত্র সেটুকু সময়ের জন্যই ফি প্রদান
                                করুন।
                                মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।
                            </p>
                        </div>
                    </div>

                    <!-- Feature Card 2 -->
                    <div
                        class="group cursor-pointer relative  backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-green-200 hover:border-green-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-green-50/50 to-emerald-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/cheap.png') }}" alt="Affordable"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-green-400">সাধ্যের ভেতরে সাশ্রয়ী সেশন</h3>
                            <p class=" leading-relaxed">
                                ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম
                                সময়ের সেশন হওয়ায় খরচও একদম হাতের নাগালে।
                            </p>
                        </div>
                    </div>

                    <!-- Feature Card 3 -->
                    <div
                        class="group cursor-pointer relative  backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-purple-200 hover:border-purple-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-purple-50/50 to-pink-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/topic.png') }}" alt="Specific topics"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-purple-400">পুরো কোর্স নয়, শিখুন নির্দিষ্ট টপিক</h3>
                            <p class=" leading-relaxed">
                                অপ্রয়োজনীয় কনটেন্ট বা পুরো কোর্সে ভর্তি হওয়ার কোনোই প্রয়োজন নেই। ঠিক যে টপিকটিতে
                                আপনার
                                সমস্যা রয়েছে, শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।
                            </p>
                        </div>
                    </div>

                    <!-- Feature Card 4 -->
                    <div
                        class="group cursor-pointer relative  backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-orange-200 hover:border-orange-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-orange-50/50 to-amber-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-orange-400 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/24-hours-support.png') }}" alt="24/7 support"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-orange-400">২৪/৭ মেন্টরশিপ</h3>
                            <p class=" leading-relaxed">
                                গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত - যেকোনো সময়েই সাহায্য নিতে পারবেন
                                মেন্টরদের।
                            </p>
                        </div>
                    </div>

                    <!-- Feature Card 5 -->
                    <div
                        class="group cursor-pointer relative  backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-indigo-200 hover:border-indigo-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-indigo-50/50 to-purple-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-indigo-400 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/flexibleincome.png') }}" alt="Flexible schedule"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-indigo-400">মেন্টরদের জন্য ফ্লেক্সিবল শিডিউল</h3>
                            <p class=" leading-relaxed">
                                বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা নিজেদের অবসর সময়ে মেন্টর হিসেবে কাজ করতে পারবেন
                                এবং
                                ঘরে বসেই অর্থ উপার্জন করতে পারবেন।
                            </p>
                        </div>
                    </div>

                    <!-- Feature Card 6 -->
                    <div
                        class="group cursor-pointer relative  backdrop-blur-sm p-8 rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border-2 border-pink-200 hover:border-pink-400">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-pink-50/50 to-rose-50/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative space-y-5">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-pink-400 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/findteacher.png') }}" alt="Quick matching"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-xl text-pink-400">দ্রুততম সময়ে মেন্টর ম্যাচিং</h3>
                            <p class=" leading-relaxed">
                                দীর্ঘ অপেক্ষা বা জটিল কোনো প্রক্রিয়ার ঝামেলা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই
                                মেন্টর খুঁজে পাবেন।
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-2xl lg:text-4xl font-bold mb-4">
                        ডেভেলপারগণ
                    </h2>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <!-- ================= TEAM MEMBER 1 ================= -->
                    <div
                        class="cursor-pointer backdrop-blur-sm p-10 rounded-2xl shadow-xl transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border-2 border-blue-200 hover:border-blue-400 group">

                        <div
                            class="w-36 h-36 mx-auto mb-6 rounded-full overflow-hidden border-4 border-blue-400 group-hover:border-purple-400 transition-all duration-300 group-hover:scale-110 shadow-lg">
                            <img src="{{ asset('images/About Page/tamim.jpg') }}" alt="Tamim"
                                class="w-full h-full object-cover" />
                        </div>

                        <h3 class="font-bold text-2xl mb-2 text-center">তাহমিদ আলম তামিম</h3>
                        <p class="text-lg mb-6 text-center">সিনিয়র ডেভেলপার</p>
                        <div class="flex justify-center gap-4">

                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/in/xyz" target="_blank"
                                class="w-12 h-12 bg-blue-100 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-blue-600 group-hover/icon:fill-white">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.062-2.065 2.062 2.062 0 114.124 0 2.062 2.062 0 01-2.062 2.065zM6.814 20.452H3.861V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>

                            <!-- GitHub -->
                            <a href="https://github.com/xyz" target="_blank"
                                class="w-12 h-12 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-gray-800 group-hover/icon:fill-white">
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.469-2.381 1.236-3.221-.123-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.102.814 2.222 0 1.606-.014 2.898-.014 3.293 0 .322.218.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>

                            <!-- Email -->
                            <a href="mailto:xyz@example.com"
                                class="w-12 h-12 bg-red-100 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-red-600 group-hover/icon:text-white" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5H4.5A2.25 2.25 0 012.25 17.25V6.75M21.75 6.75l-9.75 6.75-9.75-6.75" />
                                </svg>
                            </a>

                        </div>
                    </div>

                    <!-- ================= TEAM MEMBER 2 ================= -->
                    <div
                        class="cursor-pointer backdrop-blur-sm p-10 rounded-2xl shadow-xl transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border-2 border-purple-200 hover:border-purple-400 group">

                        <div
                            class="w-36 h-36 mx-auto mb-6 rounded-full overflow-hidden border-4 border-purple-400 group-hover:border-blue-400 transition-all duration-300 group-hover:scale-110 shadow-lg">
                            <img src="{{ asset('images/About Page/adib.jpg') }}" alt="Adib"
                                class="w-full h-full object-cover" />
                        </div>

                        <h3 class="font-bold text-2xl mb-2 text-center">ওয়াসিফ খাঁন লোদী আদিব</h3>
                        <p class="text-lg mb-6 text-center">সহকারী ডেভেলপার</p>

                        <div class="flex justify-center gap-4">

                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/in/abc" target="_blank"
                                class="w-12 h-12 bg-blue-100 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-blue-600 group-hover/icon:fill-white">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.062-2.065 2.062 2.062 0 114.124 0 2.062 2.062 0 01-2.062 2.065zM6.814 20.452H3.861V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>

                            <!-- GitHub -->
                            <a href="https://github.com/abc" target="_blank"
                                class="w-12 h-12 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-gray-800 group-hover/icon:fill-white">
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.469-2.381 1.236-3.221-.123-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.102.814 2.222 0 1.606-.014 2.898-.014 3.293 0 .322.218.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>

                            <!-- Email -->
                            <a href="mailto:abc@example.com"
                                class="w-12 h-12 bg-red-100 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-300 group/icon transform hover:scale-110 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-red-600 group-hover/icon:text-white" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5H4.5A2.25 2.25 0 012.25 17.25V6.75M21.75 6.75l-9.75 6.75-9.75-6.75" />
                                </svg>
                            </a>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
</x-layout>