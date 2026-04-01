<x-layout>

    <div class="min-h-screen bg-linear-to-br from-teal-50 via-white to-white px-4 py-8 md:px-10">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-teal-600 mb-1">ব্রাউজ করুন</p>
                <h1 class="text-2xl font-extrabold text-gray-900">মেন্টর খুঁজুন</h1>
            </div>

            <div class="flex items-center gap-3">
                {{-- Search --}}
                <div class="relative hidden sm:block">
                    <input type="text" placeholder="নাম বা দক্ষতা খুঁজুন..."
                        class="border border-teal-200 rounded-xl pl-10 pr-4 py-2 text-sm text-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-400 w-56">
                    <svg class="absolute left-3 top-2.5 w-4 h-4 text-teal-400" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                </div>

                {{-- Sort --}}
                <select
                    class="border border-teal-200 rounded-xl px-4 py-2 text-sm text-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-400 bg-white">
                    <option>মূল্য অনুযায়ী বাছাই</option>
                    <option>মূল্য: কম থেকে বেশি</option>
                    <option>মূল্য: বেশি থেকে কম</option>
                    <option>রেটিং অনুযায়ী</option>
                </select>
            </div>
        </div>

        <div class="flex gap-8">

            {{-- Sidebar Filters --}}
            <aside class="hidden lg:block w-72 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-teal-100 p-5 space-y-6 sticky top-6">

                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-gray-800 text-sm">ফিল্টার</h3>
                        <button class="text-xs text-teal-600 hover:underline">রিসেট</button>
                    </div>

                    {{-- Price Range --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-3">মূল্য পরিসীমা (ঘণ্টা)</p>
                        <div class="flex items-center gap-2">
                            <input type="number" placeholder="৳ সর্বনিম্ন"
                                class="w-full border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-teal-400">
                            <span class="text-gray-400 text-xs">—</span>
                            <input type="number" placeholder="৳ সর্বোচ্চ"
                                class="w-full border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-teal-400">
                        </div>
                    </div>

                    {{-- Skills --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-3">দক্ষতা</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> PHP
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> Laravel
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> JavaScript
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> Python
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> React
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> Machine Learning
                            </label>
                        </div>
                    </div>

                    {{-- Department --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-3">ডিপার্টমেন্ট</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> CSE
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> EEE
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> BBA
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 w-4 h-4"> ME
                            </label>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-3">স্ট্যাটাস</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 w-4 h-4" checked> সবাই
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 w-4 h-4"> অনলাইন
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 w-4 h-4"> অফলাইন
                            </label>
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-3">সর্বনিম্ন রেটিং</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 w-4 h-4"> যেকোনো
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★★★</span> ৫.০
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★★☆</span> ৪.০+
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★☆☆</span> ৩.০+
                            </label>
                        </div>
                    </div>

                    <button
                        class="w-full bg-teal-600 text-white py-2.5 rounded-xl font-semibold hover:bg-teal-700 transition text-sm">
                        ফিল্টার প্রয়োগ করুন
                    </button>
                </div>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 min-w-0">

                {{-- Results count & mobile filter --}}
                <div class="flex items-center justify-between mb-5">
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold text-gray-800">৬ জন</span> মেন্টর পাওয়া গেছে
                    </p>
                    <button
                        class="lg:hidden flex items-center gap-2 text-sm border border-teal-300 text-teal-600 px-3 py-1.5 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M7 8h10M11 12h4" />
                        </svg>
                        ফিল্টার
                    </button>
                </div>

                {{-- Mentor Cards Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

                    {{-- Card 1 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center text-xl font-bold text-teal-600">
                                    A
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Ahmed Rahman</h3>
                                <p class="text-xs text-gray-400 mt-0.5">সিনিয়র মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★★</span>
                                    <span class="text-xs text-gray-500">(৪৮)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2">
                                <span>🎓</span> BUET
                            </p>
                            <p class="flex items-center gap-2">
                                <span>📘</span> BSc in CSE
                            </p>
                            <p class="flex items-center gap-2">
                                <span>🧑‍🎓</span> ১২ জন শিক্ষার্থী
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-teal-50 text-teal-700 border border-teal-100 px-2 py-0.5 rounded-full">PHP</span>
                            <span
                                class="text-xs bg-teal-50 text-teal-700 border border-teal-100 px-2 py-0.5 rounded-full">Laravel</span>
                            <span
                                class="text-xs bg-teal-50 text-teal-700 border border-teal-100 px-2 py-0.5 rounded-full">MySQL</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৫০০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center text-xl font-bold text-purple-600">
                                    F
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Fatema Begum</h3>
                                <p class="text-xs text-gray-400 mt-0.5">মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★☆</span>
                                    <span class="text-xs text-gray-500">(৩২)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2"><span>🎓</span> DU</p>
                            <p class="flex items-center gap-2"><span>📘</span> BSc in EEE</p>
                            <p class="flex items-center gap-2"><span>🧑‍🎓</span> ৮ জন শিক্ষার্থী</p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-purple-50 text-purple-700 border border-purple-100 px-2 py-0.5 rounded-full">Python</span>
                            <span
                                class="text-xs bg-purple-50 text-purple-700 border border-purple-100 px-2 py-0.5 rounded-full">ML</span>
                            <span
                                class="text-xs bg-purple-50 text-purple-700 border border-purple-100 px-2 py-0.5 rounded-full">NumPy</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৪০০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-orange-100 flex items-center justify-center text-xl font-bold text-orange-600">
                                    R
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-gray-300 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Rahim Hossain</h3>
                                <p class="text-xs text-gray-400 mt-0.5">প্রো মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★★</span>
                                    <span class="text-xs text-gray-500">(৬১)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2"><span>🎓</span> KUET</p>
                            <p class="flex items-center gap-2"><span>📘</span> BSc in CSE</p>
                            <p class="flex items-center gap-2"><span>🧑‍🎓</span> ২০ জন শিক্ষার্থী</p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-orange-50 text-orange-700 border border-orange-100 px-2 py-0.5 rounded-full">React</span>
                            <span
                                class="text-xs bg-orange-50 text-orange-700 border border-orange-100 px-2 py-0.5 rounded-full">Node.js</span>
                            <span
                                class="text-xs bg-orange-50 text-orange-700 border border-orange-100 px-2 py-0.5 rounded-full">MongoDB</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৭০০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card 4 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-xl font-bold text-blue-600">
                                    S
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Sumaiya Akter</h3>
                                <p class="text-xs text-gray-400 mt-0.5">মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★☆</span>
                                    <span class="text-xs text-gray-500">(২৭)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2"><span>🎓</span> SUST</p>
                            <p class="flex items-center gap-2"><span>📘</span> BBA in Finance</p>
                            <p class="flex items-center gap-2"><span>🧑‍🎓</span> ৬ জন শিক্ষার্থী</p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-blue-50 text-blue-700 border border-blue-100 px-2 py-0.5 rounded-full">Excel</span>
                            <span
                                class="text-xs bg-blue-50 text-blue-700 border border-blue-100 px-2 py-0.5 rounded-full">Accounting</span>
                            <span
                                class="text-xs bg-blue-50 text-blue-700 border border-blue-100 px-2 py-0.5 rounded-full">Finance</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৩৫০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card 5 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center text-xl font-bold text-green-600">
                                    K
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Karim Uddin</h3>
                                <p class="text-xs text-gray-400 mt-0.5">সিনিয়র মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★★</span>
                                    <span class="text-xs text-gray-500">(৮৩)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2"><span>🎓</span> RUET</p>
                            <p class="flex items-center gap-2"><span>📘</span> BSc in CSE</p>
                            <p class="flex items-center gap-2"><span>🧑‍🎓</span> ৩০ জন শিক্ষার্থী</p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-green-50 text-green-700 border border-green-100 px-2 py-0.5 rounded-full">JavaScript</span>
                            <span
                                class="text-xs bg-green-50 text-green-700 border border-green-100 px-2 py-0.5 rounded-full">Vue.js</span>
                            <span
                                class="text-xs bg-green-50 text-green-700 border border-green-100 px-2 py-0.5 rounded-full">Laravel</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৬০০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card 6 --}}
                    <div
                        class="bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-200 p-5 flex flex-col">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center text-xl font-bold text-pink-600">
                                    N
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-gray-300 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 text-sm leading-tight">Nusrat Jahan</h3>
                                <p class="text-xs text-gray-400 mt-0.5">মেন্টর</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★☆</span>
                                    <span class="text-xs text-gray-500">(১৯)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                            <p class="flex items-center gap-2"><span>🎓</span> IUT</p>
                            <p class="flex items-center gap-2"><span>📘</span> BSc in ME</p>
                            <p class="flex items-center gap-2"><span>🧑‍🎓</span> ৫ জন শিক্ষার্থী</p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span
                                class="text-xs bg-pink-50 text-pink-700 border border-pink-100 px-2 py-0.5 rounded-full">MATLAB</span>
                            <span
                                class="text-xs bg-pink-50 text-pink-700 border border-pink-100 px-2 py-0.5 rounded-full">AutoCAD</span>
                            <span
                                class="text-xs bg-pink-50 text-pink-700 border border-pink-100 px-2 py-0.5 rounded-full">Thermodynamics</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center bg-teal-50 px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600">৳৩০০</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="flex-1 text-center border border-teal-400 text-teal-600 py-2 rounded-lg text-xs font-semibold hover:bg-teal-50 transition">
                                    প্রোফাইল
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-teal-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-teal-700 transition">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Pagination --}}
                <div class="flex items-center justify-center gap-2 mt-10">
                    <button
                        class="w-9 h-9 rounded-lg border border-gray-200 text-gray-400 hover:border-teal-400 hover:text-teal-600 transition flex items-center justify-center text-sm">
                        ‹
                    </button>
                    <button class="w-9 h-9 rounded-lg bg-teal-600 text-white font-bold text-sm">১</button>
                    <button
                        class="w-9 h-9 rounded-lg border border-gray-200 text-gray-600 hover:border-teal-400 hover:text-teal-600 transition text-sm">২</button>
                    <button
                        class="w-9 h-9 rounded-lg border border-gray-200 text-gray-600 hover:border-teal-400 hover:text-teal-600 transition text-sm">৩</button>
                    <span class="text-gray-400 text-sm">...</span>
                    <button
                        class="w-9 h-9 rounded-lg border border-gray-200 text-gray-600 hover:border-teal-400 hover:text-teal-600 transition text-sm">৮</button>
                    <button
                        class="w-9 h-9 rounded-lg border border-gray-200 text-gray-400 hover:border-teal-400 hover:text-teal-600 transition flex items-center justify-center text-sm">
                        ›
                    </button>
                </div>

            </div>
        </div>
    </div>

</x-layout>
