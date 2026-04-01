<x-layout>
    <div class="min-h-screen" style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfe 55%, #f0f9f4 100%);">

        {{-- ── Hero / About Section ── --}}
        <section class="mx-auto px-5 md:px-14 py-16 md:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                {{-- Text Content --}}
                <div class="space-y-7">
                    <p class="text-xs font-bold uppercase tracking-widest" style="color:#28666e;">📚 আমাদের সম্পর্কে</p>

                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold leading-snug"
                        style="color:#033f63; font-family:'Lora',serif;">
                        পরীক্ষার আগের রাতে হঠাৎ কোনো টপিক বুঝতে অসুবিধা হচ্ছে? কিছুক্ষণের জন্য একজন শিক্ষকের সহায়তা
                        প্রয়োজন?
                    </h1>

                    <p class="text-lg font-bold" style="color:#28666e;">
                        এমন পরিস্থিতিতেই পাশে আছে MentorChai...
                    </p>

                    <p class="text-base leading-loose" style="color:rgba(3,63,99,0.75);">
                        গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও
                        <span class="font-bold" style="color:#28666e;">MentorChai</span>
                        আপনাকে প্রদান করছে ইন্সট্যান্ট মেন্টরশিপ সুবিধা। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী
                        ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।
                    </p>

                    <div class="p-5 rounded-2xl border-l-4 bg-white shadow-sm" style="border-color:#28666e;">
                        <p class="text-base leading-loose" style="color:rgba(3,63,99,0.75);">
                            পরীক্ষার আগের রাতে হঠাৎ
                            <span class="font-bold" style="color:#28666e;">Calculus</span> বুঝতে অসুবিধা হচ্ছে? কিংবা
                            <span class="font-bold" style="color:#3d8a8f;">Binary Search Algorithm</span>?
                            শুধুমাত্র <span class="font-bold" style="color:#7c9885;">Kirchhoff's Laws</span> বুঝতে মাত্র
                            এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>
                        <p class="text-base font-bold mt-3" style="color:#28666e;">
                            ভয় নেই, MentorChai আছে আপনার সাথে!
                        </p>
                    </div>
                </div>

                {{-- Overlapping Images --}}
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md">
                        <img src="{{ asset('images/About Page/edteacher.png') }}" alt="Mentorship session"
                            class="w-full rounded-2xl shadow-xl hover:scale-105 transition-transform duration-300" />
                        <img src="{{ asset('images/About Page/edtec.png') }}" alt="Online teaching"
                            class="absolute bottom-[-28px] right-[-24px] w-2/5 rounded-xl shadow-xl z-10 border-4 border-white hover:scale-110 transition-transform duration-300" />
                    </div>
                </div>
            </div>
        </section>

        {{-- ── Features Section ── --}}
        <section class="py-20">
            <div class="max-w-6xl mx-auto px-5">

                <div class="text-center mb-14">
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#28666e;">✦ কেন MentorChai
                    </p>
                    <h2 class="text-2xl lg:text-4xl font-extrabold mb-3"
                        style="color:#033f63; font-family:'Lora',serif;">
                        আমাদের সুবিধাসমূহ
                    </h2>
                    <p class="text-base max-w-xl mx-auto" style="color:rgba(3,63,99,0.6);">
                        যা MentorChai কে অনন্য করে তুলেছে
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    {{-- Feature Card 1 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(26,153,143,0.06), rgba(24,127,135,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #1A998F, #155665);">
                                <img src="{{ asset('images/Home Page/payasyougo.png') }}" alt="Pay as you go"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #1A998F;">যতটুকু সময়, ঠিক ততটুকুর খরচ</h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                ৩০, ৪৫ বা ৬০ মিনিটের জন্য মেন্টর বুক করুন এবং শুধুমাত্র সেটুকু সময়ের জন্যই ফি প্রদান
                                করুন। মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 2 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(24,127,135,0.06), rgba(26,153,143,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #187F87, #1A998F);">
                                <img src="{{ asset('images/Home Page/cheap.png') }}" alt="Affordable"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #187F87;">সাধ্যের ভেতরে সাশ্রয়ী সেশন</h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম
                                সময়ের সেশন হওয়ায় খরচও একদম হাতের নাগালে।
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 3 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(21,86,101,0.06), rgba(26,153,143,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #155665, #187F87);">
                                <img src="{{ asset('images/Home Page/topic.png') }}" alt="Specific topics"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #155665;">পুরো কোর্স নয়, শিখুন নির্দিষ্ট টপিক
                            </h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                অপ্রয়োজনীয় কনটেন্ট বা পুরো কোর্সে ভর্তি হওয়ার কোনোই প্রয়োজন নেই। ঠিক যে টপিকটিতে
                                আপনার সমস্যা রয়েছে, শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 4 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(16,46,60,0.05), rgba(21,86,101,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #102E3C, #155665);">
                                <img src="{{ asset('images/Home Page/24-hours-support.png') }}" alt="24/7 support"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #102E3C;">২৪/৭ মেন্টরশিপ</h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত — যেকোনো সময়েই সাহায্য নিতে পারবেন
                                মেন্টরদের।
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 5 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(26,153,143,0.06), rgba(21,86,101,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #1A998F, #102E3C);">
                                <img src="{{ asset('images/Home Page/flexibleincome.png') }}" alt="Flexible schedule"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #1A998F;">মেন্টরদের জন্য ফ্লেক্সিবল শিডিউল</h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা নিজেদের অবসর সময়ে মেন্টর হিসেবে কাজ করতে পারবেন
                                এবং ঘরে বসেই অর্থ উপার্জন করতে পারবেন।
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 6 --}}
                    <div class="group cursor-pointer relative p-7 rounded-2xl border-2 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 overflow-hidden"
                        style="background-color: #ffffff; border-color: #C4CFCE;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, rgba(24,127,135,0.06), rgba(16,46,60,0.03));">
                        </div>
                        <div class="relative space-y-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300"
                                style="background: linear-gradient(135deg, #187F87, #102E3C);">
                                <img src="{{ asset('images/Home Page/findteacher.png') }}" alt="Quick matching"
                                    class="w-9 h-9 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg" style="color: #187F87;">দ্রুততম সময়ে মেন্টর ম্যাচিং</h3>
                            <p class="text-sm leading-relaxed" style="color: rgba(16,46,60,0.65);">
                                দীর্ঘ অপেক্ষা বা জটিল কোনো প্রক্রিয়ার ঝামেলা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই
                                মেন্টর খুঁজে পাবেন।
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ── Team Section ── --}}
        <section class="py-20 pb-24">
            <div class="max-w-4xl mx-auto px-5">

                <div class="text-center mb-14">
                    <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#28666e;">👥 দলের সদস্য</p>
                    <h2 class="text-2xl lg:text-4xl font-bold" style="color:#033f63; font-family:'Lora',serif;">
                        ডেভেলপারগণ
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Team Member 1 --}}
                    <div
                        class="group cursor-pointer bg-white p-8 rounded-2xl border-2 border-teal-100 hover:border-teal-300 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 text-center">
                        <div
                            class="w-32 h-32 mx-auto mb-5 rounded-full overflow-hidden border-4 border-teal-200 group-hover:border-teal-400 transition-all duration-300 group-hover:scale-105 shadow-md">
                            <img src="{{ asset('images/About Page/tamim.jpg') }}" alt="Tamim"
                                class="w-full h-full object-cover" />
                        </div>
                        <h3 class="font-bold text-xl mb-1" style="color:#033f63; font-family:'Lora',serif;">তাহমিদ আলম
                            তামিম</h3>
                        <p class="text-sm font-semibold mb-5" style="color:#28666e;">সিনিয়র ডেভেলপার</p>
                        <div class="flex justify-center gap-3">
                            {{-- LinkedIn --}}
                            <a href="https://linkedin.com/in/xyz" target="_blank"
                                class="w-10 h-10 bg-blue-50 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-5 h-5 fill-blue-600 group-hover/icon:fill-white transition-colors">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.062-2.065 2.062 2.062 0 114.124 0 2.062 2.062 0 01-2.062 2.065zM6.814 20.452H3.861V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            {{-- GitHub --}}
                            <a href="https://github.com/xyz" target="_blank"
                                class="w-10 h-10 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-5 h-5 fill-gray-700 group-hover/icon:fill-white transition-colors">
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.469-2.381 1.236-3.221-.123-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.102.814 2.222 0 1.606-.014 2.898-.014 3.293 0 .322.218.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>
                            {{-- Email --}}
                            <a href="mailto:xyz@example.com"
                                class="w-10 h-10 bg-red-50 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-red-500 group-hover/icon:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Team Member 2 --}}
                    <div
                        class="group cursor-pointer bg-white p-8 rounded-2xl border-2 border-teal-100 hover:border-teal-300 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-2 text-center">
                        <div
                            class="w-32 h-32 mx-auto mb-5 rounded-full overflow-hidden border-4 border-teal-200 group-hover:border-teal-400 transition-all duration-300 group-hover:scale-105 shadow-md">
                            <img src="{{ asset('images/About Page/adib.jpg') }}" alt="Adib"
                                class="w-full h-full object-cover" />
                        </div>
                        <h3 class="font-bold text-xl mb-1" style="color:#033f63; font-family:'Lora',serif;">ওয়াসিফ খাঁন
                            লোদী আদিব</h3>
                        <p class="text-sm font-semibold mb-5" style="color:#28666e;">সহকারী ডেভেলপার</p>
                        <div class="flex justify-center gap-3">
                            {{-- LinkedIn --}}
                            <a href="https://linkedin.com/in/abc" target="_blank"
                                class="w-10 h-10 bg-blue-50 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-5 h-5 fill-blue-600 group-hover/icon:fill-white transition-colors">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.062-2.065 2.062 2.062 0 114.124 0 2.062 2.062 0 01-2.062 2.065zM6.814 20.452H3.861V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            {{-- GitHub --}}
                            <a href="https://github.com/abc" target="_blank"
                                class="w-10 h-10 bg-gray-100 hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-5 h-5 fill-gray-700 group-hover/icon:fill-white transition-colors">
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.469-2.381 1.236-3.221-.123-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.102.814 2.222 0 1.606-.014 2.898-.014 3.293 0 .322.218.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>
                            {{-- Email --}}
                            <a href="mailto:abc@example.com"
                                class="w-10 h-10 bg-red-50 hover:bg-red-600 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-sm group/icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-red-500 group-hover/icon:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
</x-layout>
