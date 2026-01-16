<x-layout>

    <div class="min-h-screen bg-base-200 px-6 md:px-14 space-y-6">
        <!-- Hero / About Section -->
        <section class="max-w-7xl mx-auto px-6 py-20 relative overflow-hidden">


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
                <div class="space-y-6">
                    <h1
                        class="text-2xl lg:text-4xl font-extrabold leading-tight  from-cyan-400 via-blue-400 to-purple-400 bg-clip-text drop-shadow-lg">
                        পরীক্ষার আগের রাতে শিক্ষক খোজার ভয় ? আর নয়,আর নয়...
                    </h1>
                    <p class="text-gray-500 text-lg leading-relaxed">
                        পরীক্ষার আগের রাতে হঠাৎ <strong>Calculus</strong> বুঝতে অসুবিধা হচ্ছে?কিংবা <strong>Binary
                            Search
                            Algorithm</strong>?শুধুমাত্র <strong>Kirchhoff's Laws</strong> বুঝতে মাত্র একঘন্টার জন্য
                        একজন
                        শিক্ষকের সহায়তা দরকার?
                    </p>
                    <p class="text-cyan-500 text-xl font-semibold">
                        ভয় নেই, MentorChai আছে আপনার সাথে
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6">
                        <div
                            class="group relative bg-linear-to-br from-cyan-500/10 to-blue-500/10 backdrop-blur-sm border border-cyan-500/20 p-6 rounded-2xl transform transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-cyan-500/50 cursor-pointer overflow-hidden">
                            <div
                                class="absolute inset-0 bg-linear-to-br from-cyan-500/0 to-blue-500/0 group-hover:from-cyan-500/20 group-hover:to-blue-500/20 transition-all duration-500">
                            </div>
                            <div class="relative flex flex-col items-center text-center space-y-4">
                                <div
                                    class="w-20 h-20 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-125">
                                    <img src="{{ asset('images/Home Page/24-7-night.png') }}" alt="24/7"
                                        class="w-full h-full object-contain drop-shadow-lg">
                                </div>
                                <p class="text-sm font-medium">দুপুর ৩টা হোক বা রাত ৩টা,টিচার খুজে নিন যেকোনো
                                    সময়</p>
                            </div>
                        </div>

                        <div
                            class="group relative bg-linear-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-sm border border-purple-500/20 p-6 rounded-2xl transform transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-purple-500/50 cursor-pointer overflow-hidden">
                            <div
                                class="absolute inset-0 bg-linear-to-br from-purple-500/0 to-pink-500/0 group-hover:from-purple-500/20 group-hover:to-pink-500/20 transition-all duration-500">
                            </div>
                            <div class="relative flex flex-col items-center text-center space-y-4">
                                <div
                                    class="w-20 h-20 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-125">
                                    <img src="{{ asset('images/Home Page/cheap.png') }}" alt="Affordable"
                                        class="w-full h-full object-contain drop-shadow-lg">
                                </div>
                                <p class="text-sm font-medium">মাস কিংবা বছর নয়,স্বল্পখরচে টিচার হায়ার করুন
                                    মিনিট কিংবা ঘণ্টা হিসেবে</p>
                            </div>
                        </div>

                        <div
                            class="group relative bg-linear-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-sm border border-green-500/20 p-6 rounded-2xl transform transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-green-500/50 cursor-pointer overflow-hidden">
                            <div
                                class="absolute inset-0 bg-linear-to-br from-green-500/0 to-emerald-500/0 group-hover:from-green-500/20 group-hover:to-emerald-500/20 transition-all duration-500">
                            </div>
                            <div class="relative flex flex-col items-center text-center space-y-4">
                                <div
                                    class="w-20 h-20 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-12 group-hover:scale-125">
                                    <img src="{{ asset('images/Home Page/topic.png') }}" alt="Topic-based"
                                        class="w-full h-full object-contain drop-shadow-lg">
                                </div>
                                <p class="text-sm font-medium">সম্পূর্ণ কোর্স নয়,টিচার খুজে নিন নিজের পছন্দসই
                                    টপিকের জন্য</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative">
                        <div class="absolute inset-0  from-cyan-500 to-purple-500 rounded-3xl blur-2xl opacity-30">
                        </div>
                        <img src="{{ asset('images/Home Page/darkroom.png') }}" alt="Mentorship session"
                            class="relative w-full rounded-3xl shadow-2xl border-4 border-cyan-500/30 transform hover:scale-105 transition-transform duration-500" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Topics -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <h2
                class="text-2xl lg:text-4xl font-extrabold text-center mb-16  from-cyan-400 via-blue-400 to-purple-400 bg-clip-text ">
                জনপ্রিয় টপিকসমূহ</h2>

            <div class="relative">
                <div id="scrollContainer" class="overflow-hidden">
                    <div id="cardsContainer" class="flex gap-8 pb-4 transition-transform duration-500 ease-out"
                        style="width: max-content;">

                        {{-- Card 1 --}}
                        <div
                            class="w-80 cursor-pointer shrink group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-cyan-500/30 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/cse.png') }}" alt="CSE"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-cyan-300">Functions & Array in C</h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্ট : CSE,SWE</p>
                                <button
                                    class="w-full cursor-pointer from-cyan-500 to-blue-500 text-white font-semibold py-3 rounded-xl hover:from-cyan-600 hover:to-blue-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-cyan-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        {{-- Card 2 --}}
                        <div
                            class="w-80 cursor-pointer shrink group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-purple-500/30 shadow-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/eee.png') }}" alt="EEE"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-purple-300">KVL-KCL</h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্টঃEEE,CSE</p>
                                <button
                                    class="w-full cursor-pointer from-purple-500 to-pink-500 text-white font-semibold py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-purple-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        <div
                            class="w-80 shrink cursor-pointer group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-blue-500/30 shadow-lg hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/swe.png') }}" alt="SWE"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-blue-300">Dijkstra's Algorithm</h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্টঃCSE,SWE</p>
                                <button
                                    class="w-full cursor-pointer from-blue-500 to-cyan-500 text-white font-semibold py-3 rounded-xl hover:from-blue-600 hover:to-cyan-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-blue-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        <div
                            class="w-80 shrink cursor-pointer group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-green-500/30 shadow-lg hover:shadow-2xl hover:shadow-green-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/textile.png') }}" alt="Textile"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-green-300">Fabric Mechanics(Stress-Strain
                                    Behavior of Fabrics)</h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টপমেন্টঃTE</p>
                                <button
                                    class="w-full cursor-pointer from-green-500 to-emerald-500 text-white font-semibold py-3 rounded-xl hover:from-green-600 hover:to-emerald-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-green-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        <div
                            class="w-80 shrink cursor-pointer group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-pink-500/30 shadow-lg hover:shadow-2xl hover:shadow-pink-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/pharmacy.png') }}" alt="Pharmacy"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-pink-300">Drug Receptor Interaction
                                    Mechanisms
                                </h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্টঃPharmacy</p>
                                <button
                                    class="w-full cursor-pointer from-pink-500 to-rose-500 text-white font-semibold py-3 rounded-xl hover:from-pink-600 hover:to-rose-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-pink-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        <div
                            class="w-80 shrink cursor-pointer group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-orange-500/30 shadow-lg hover:shadow-2xl hover:shadow-orange-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/nfe.png') }}" alt="NFE"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-orange-300">Nutrient Bioavailability &
                                    Absorption Mechanisms </h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্টঃNFE</p>
                                <button
                                    class="w-full cursor-pointer from-orange-500 to-amber-500 text-white font-semibold py-3 rounded-xl hover:from-orange-600 hover:to-amber-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-orange-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>

                        <div
                            class="w-80 shrink cursor-pointer group relative bg-linear-to-br from-slate-800 to-slate-900 rounded-2xl overflow-hidden border border-teal-500/30 shadow-lg hover:shadow-2xl hover:shadow-teal-500/50 transition-all duration-500 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('images/Home Page/environmentalsc.png') }}"
                                    alt="Environmental Science"
                                    class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-linear-to-t from-slate-900 via-transparent to-transparent">
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <h3 class="font-bold text-xl text-center text-teal-300">Environmental Fate & Transport
                                    of
                                    Pollutants</h3>
                                <p class="text-gray-400 text-sm text-center">ডিপার্টমেন্টঃEnvironmental Science</p>
                                <button
                                    class="w-full cursor-pointer from-teal-500 to-cyan-500 text-white font-semibold py-3 rounded-xl hover:from-teal-600 hover:to-cyan-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-teal-500/50">অ্যাভেইলেবল
                                    টিচারলিস্ট দেখুন</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="scrollLeft"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4  from-cyan-500 to-blue-500 rounded-full p-4 shadow-2xl hover:shadow-cyan-500/50 transition-all duration-300 hover:scale-110 z-10 backdrop-blur-sm">
                    <svg class="cursor-pointer w-6 h-6 text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>

                <button id="scrollRight"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4  from-blue-500 to-purple-500 rounded-full p-4 shadow-2xl hover:shadow-purple-500/50 transition-all duration-300 hover:scale-110 z-10 backdrop-blur-sm">
                    <svg class="cursor-pointer w-6 h-6 text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </button>
            </div>
        </section>

        <!-- Popular Departments -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <h2
                class="text-2xl lg:text-4xl font-extrabold text-center mb-16  from-cyan-400 via-blue-400 to-purple-400 bg-clip-text ">
                প্রায়শই অনুসন্ধানকৃত ডিপার্টমেন্টসমূহ</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto">

                {{-- Card 1 --}}
                <div
                    class="group relative bg-linear-to-br from-cyan-500/0 to-blue-500/0 rounded-2xl p-6 border border-cyan-500/30 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-cyan-500/0 to-blue-500/0 group-hover:from-cyan-500/20 group-hover:to-blue-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/cseicon.png') }}" alt="CSE"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Computer Science &
                            Engineering</h3>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div
                    class="group relative bg-linear-to-br from-purple-500/0 to-pink-500/0 rounded-2xl p-6 border border-purple-500/30 shadow-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-purple-500/0 to-pink-500/0 group-hover:from-purple-500/20 group-hover:to-pink-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/eeeicon.png') }}" alt="EEE"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Electrical &
                            Electronics Engineering</h3>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div
                    class="group relative bg-linear-to-br from-pink-500/0 to-rose-500/0 rounded-2xl p-6 border border-pink-500/30 shadow-lg hover:shadow-2xl hover:shadow-pink-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-pink-500/0 to-rose-500/0 group-hover:from-pink-500/20 group-hover:to-rose-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/pharmacyicon.png') }}" alt="Pharmacy"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Pharmacy</h3>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div
                    class="group relative bg-linear-to-br from-green-500/0 to-emerald-500/0 rounded-2xl p-6 border border-green-500/30 shadow-lg hover:shadow-2xl hover:shadow-green-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-green-500/0 to-emerald-500/0 group-hover:from-green-500/20 group-hover:to-emerald-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/textileicon.png') }}" alt="Textile"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Textile Engineering
                        </h3>
                    </div>
                </div>

                {{-- Card 5 --}}
                <div
                    class="group relative bg-linear-to-br from-blue-500/0 to-cyan-500/0 rounded-2xl p-6 border border-blue-500/30 shadow-lg hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-blue-500/0 to-cyan-500/0 group-hover:from-blue-500/20 group-hover:to-cyan-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/sweicon.png') }}" alt="SWE"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Software Engineering
                        </h3>
                    </div>
                </div>

                {{-- Card 6 --}}
                <div
                    class="group relative bg-linear-to-br from-orange-500/0 to-amber-500/0 rounded-2xl p-6 border border-orange-500/30 shadow-lg hover:shadow-2xl hover:shadow-orange-500/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-orange-500/0 to-amber-500/0 group-hover:from-orange-500/20 group-hover:to-amber-500/20 transition-all duration-500">
                    </div>
                    <div class="relative flex flex-col items-center space-y-4">
                        <div
                            class="w-20 h-20 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-500">
                            <img src="{{ asset('images/Home Page/nfeicon.png') }}" alt="NFE"
                                class="w-full h-full object-contain drop-shadow-lg">
                        </div>
                        <h3 class="font-semibold text-xs md:text-sm text-center leading-tight">Nutrition & Food
                            Engineering</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 relative overflow-hidden">


            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <h2
                    class="text-2xl lg:text-4xl font-extrabold text-center mb-16  from-cyan-400 via-blue-400 to-purple-400 bg-clip-text ">
                    আমাদের সুবিধাসমূহ
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Card 1 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-cyan-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-cyan-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-cyan-500/0 to-blue-500/0 group-hover:from-cyan-500/10 group-hover:to-blue-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/payasyougo.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-blue-400">যতটুকু সময়, ঠিক ততটুকুর খরচ</h3>
                            <p class="text-sm leading-relaxed">
                                ৩০ বা ৬০ মিনিটের জন্য মেন্টর বুক করুন এবং শুধুমাত্র সেটুকু সময়ের জন্যই ফি প্রদান
                                করুন।মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।
                            </p>
                        </div>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-green-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-green-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-green-500/0 to-emerald-500/0 group-hover:from-green-500/10 group-hover:to-emerald-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/cheap.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-green-400">সাধ্যের ভেতরে সাশ্রয়ী সেশন</h3>
                            <p class="text-sm leading-relaxed">
                                ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে।কম
                                সময়ের সেশন হওয়ায় খরচও একদম হাতের নাগালে।
                            </p>
                        </div>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-purple-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-purple-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-purple-500/0 to-pink-500/0 group-hover:from-purple-500/10 group-hover:to-pink-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/topic.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-purple-400">পুরো কোর্স নয়, শিখুন নির্দিষ্ট টপিক</h3>
                            <p class="text-sm leading-relaxed">
                                অপ্রয়োজনীয় কনটেন্ট বা পুরো কোর্সে ভর্তি হওয়ার কোনোই প্রয়োজন নেই।ঠিক যে টপিকটিতে
                                আপনার
                                সমস্যা রয়েছে,শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।
                            </p>
                        </div>
                    </div>

                    {{-- Card 4 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-orange-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-orange-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-orange-500/0 to-amber-500/0 group-hover:from-orange-500/10 group-hover:to-amber-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-orange-500 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/24-hours-support.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-orange-400">২৪/৭ মেন্টরশিপ</h3>
                            <p class="text-sm leading-relaxed">
                                গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত-যেকোনো সময়েই সাহায্য নিতে পারবেন
                                মেন্টরদের।
                            </p>
                        </div>
                    </div>

                    {{-- Card 5 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-indigo-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-indigo-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-indigo-500/0 to-purple-500/0 group-hover:from-indigo-500/10 group-hover:to-purple-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/flexibleincome.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-indigo-400">মেন্টরদের জন্য ফ্লেক্সিবল শিডিউল</h3>
                            <p class="text-sm leading-relaxed">
                                বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা নিজেদের অবসর সময়ে মেন্টর হিসেবে কাজ করতে পারেন
                                এবং
                                ঘরে বসেই অর্থ উপার্জন করতে পারেন।
                            </p>
                        </div>
                    </div>

                    {{-- Card 6 --}}
                    <div
                        class="group cursor-pointer relative bg-linear-to-br backdrop-blur-sm p-6 rounded-2xl border border-pink-500/30 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-pink-500/50 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-pink-500/0 to-rose-500/0 group-hover:from-pink-500/10 group-hover:to-rose-500/10 transition-all duration-500">
                        </div>
                        <div class="relative space-y-4">
                            <div
                                class="w-16 h-16 bg-linear-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg shadow-pink-500/50 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <img src="{{ asset('images/Home Page/findteacher.png') }}" alt="feature icon"
                                    class="w-10 h-10 object-contain" />
                            </div>
                            <h3 class="font-bold text-lg text-pink-400">দ্রুততম সময়ে মেন্টর ম্যাচিং</h3>
                            <p class="text-sm leading-relaxed">
                                দীর্ঘ অপেক্ষা বা জটিল কোনো প্রক্রিয়ার ঝামেলা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই
                                মেন্টর খুঁজে পাবেন।
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Join as Mentor Section -->
        <section class="max-w-7xl mx-auto px-6 py-20 relative overflow-hidden">


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
                <div class="space-y-6">
                    <h1 class="text-2xl lg:text-4xl font-extrabold">
                        যুক্ত হোন আমাদের মেন্টর হিসেবে এবং ঘরে বসে উপার্জন করুন
                    </h1>
                    <p class="text-lg">
                        পড়াতে ভালোবাসেন?টিউশনি করানোর সু্যোগ কিংবা উপযুক্ত সময় মিলছেনা?কিংবা ঘরের বাইরে টিউশনি করানো
                        কষ্টসাধ্য?
                    </p>
                    <p class="text-lg">
                        MentorChai এর সাথে যুক্ত হোন মেন্টর হিসেবে,নিজের সুবিধামতো সময় অনুযায়ী দিন-রাত যেকোনো সময়ে
                        মেন্টরশিপ প্রদান করুন,দেশব্যাপী শিক্ষার্থীদের সাথে সংযুক্ত হওয়ার মাধ্যমে ঘরে বসেই অর্থ উপার্জন
                        করুন।
                    </p>

                    <button class="w-full cursor-pointer btn btn-outline btn-primary shadow-sm">বিস্তারিত
                        জানতে এখানে ক্লিক করুন</button>
                </div>

                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative">
                        <img src="{{ asset('images/Home Page/onlineteaching.png') }}" alt="Mentorship session"
                            class="relative w-full rounded-3xl border border-blue-200" />
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-layout>
