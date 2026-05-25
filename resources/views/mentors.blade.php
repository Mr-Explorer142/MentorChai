<x-layout>

    <div
        class="min-h-screen bg-linear-to-br from-teal-50 via-white to-white dark:from-[#0f1f2e] dark:via-[#1a2e3b] dark:to-[#0f1f2e] px-4 py-8 md:px-10 transition-colors duration-300">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-teal-600 dark:text-teal-400 mb-1">ব্রাউজ করুন
                </p>
                <h1 class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">মেন্টর খুঁজুন</h1>
            </div>

            <div class="flex items-center gap-3">
                {{-- Search --}}
                <div class="relative hidden sm:block">
                    <input type="text" placeholder="নাম বা দক্ষতা খুঁজুন..." class="border border-teal-200 dark:border-teal-800
                               rounded-xl pl-10 pr-4 py-2 text-sm
                               text-gray-600 dark:text-gray-300
                               bg-white dark:bg-[#1a2e3b]
                               placeholder:text-gray-400 dark:placeholder:text-gray-500
                               focus:outline-none focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500
                               w-56 transition-colors duration-200">
                    <svg class="absolute left-3 top-2.5 w-4 h-4 text-teal-400 dark:text-teal-500" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                </div>

                {{-- Sort --}}
                <select class="border border-teal-200 dark:border-teal-800
                           rounded-xl px-4 py-2 text-sm
                           text-gray-600 dark:text-gray-300
                           bg-white dark:bg-[#1a2e3b]
                           focus:outline-none focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500
                           transition-colors duration-200">
                    <option>মূল্য অনুযায়ী বাছাই</option>
                    <option>মূল্য: কম থেকে বেশি</option>
                    <option>মূল্য: বেশি থেকে কম</option>
                    <option>রেটিং অনুযায়ী</option>
                </select>
            </div>
        </div>

        <div class="flex gap-8">

            {{-- Sidebar Filters --}}
            <aside class="hidden lg:block w-72 shrink">
                <div class="bg-white dark:bg-[#1a2e3b]
                            rounded-2xl shadow-sm dark:shadow-[0_1px_3px_rgba(0,0,0,0.4)]
                            border border-teal-100 dark:border-teal-900/40
                            p-5 space-y-6 sticky top-6 transition-colors duration-300">

                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm">ফিল্টার</h3>
                        <button class="text-xs text-teal-600 dark:text-teal-400 hover:underline">রিসেট</button>
                    </div>

                    {{-- Price Range --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">মূল্য পরিসীমা (ঘণ্টা)</p>
                        <div class="flex items-center gap-2">
                            <input type="number" placeholder="৳ সর্বনিম্ন" class="w-full border border-gray-200 dark:border-gray-700
                                       text-gray-600 dark:text-gray-300
                                       bg-white dark:bg-[#243d4d]
                                       placeholder:text-gray-400 dark:placeholder:text-gray-500
                                       rounded-lg px-3 py-1.5 text-sm
                                       focus:outline-none focus:ring-1 focus:ring-teal-400 dark:focus:ring-teal-500
                                       transition-colors duration-200">
                            <span class="text-gray-400 dark:text-gray-500 text-xs">—</span>
                            <input type="number" placeholder="৳ সর্বোচ্চ" class="w-full border border-gray-200 dark:border-gray-700
                                       text-gray-600 dark:text-gray-300
                                       bg-white dark:bg-[#243d4d]
                                       placeholder:text-gray-400 dark:placeholder:text-gray-500
                                       rounded-lg px-3 py-1.5 text-sm
                                       focus:outline-none focus:ring-1 focus:ring-teal-400 dark:focus:ring-teal-500
                                       transition-colors duration-200">
                        </div>
                    </div>

                    {{-- Skills --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">দক্ষতা</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> PHP
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Laravel
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> JavaScript
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Python
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> React
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Machine
                                Learning
                            </label>
                        </div>
                    </div>

                    {{-- Department --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">ডিপার্টমেন্ট</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> CSE
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> EEE
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> BBA
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> ME
                            </label>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">স্ট্যাটাস</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 dark:accent-teal-400 w-4 h-4"
                                    checked> সবাই
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                অনলাইন
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                অফলাইন
                            </label>
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">সর্বনিম্ন রেটিং</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                যেকোনো
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★★★</span> ৫.০
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★★☆</span> ৪.০+
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs">★★★☆☆</span> ৩.০+
                            </label>
                        </div>
                    </div>

                    <button class="w-full bg-teal-600 dark:bg-teal-500 text-white
                               py-2.5 rounded-xl font-semibold
                               hover:bg-teal-700 dark:hover:bg-teal-400
                               transition text-sm">
                        ফিল্টার প্রয়োগ করুন
                    </button>
                </div>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 min-w-0">

                {{-- Results count & mobile filter --}}
                <div class="flex items-center justify-between mb-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $totalMentors }} জন</span>
                        মেন্টর পাওয়া গেছে
                    </p>
                    <button class="lg:hidden flex items-center gap-2 text-sm
                               border border-teal-300 dark:border-teal-700
                               text-teal-600 dark:text-teal-400
                               px-3 py-1.5 rounded-lg
                               hover:bg-teal-50 dark:hover:bg-teal-900/20
                               transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M7 8h10M11 12h4" />
                        </svg>
                        ফিল্টার
                    </button>
                </div>

                {{-- Mentor Cards Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

                    @forelse ($mentors as $mentor)
                    <div class="bg-white dark:bg-[#1a2e3b]
                                rounded-2xl border border-teal-100 dark:border-teal-900/40
                                shadow-sm dark:shadow-[0_1px_3px_rgba(0,0,0,0.4)]
                                hover:shadow-md dark:hover:shadow-[0_4px_12px_rgba(0,0,0,0.5)]
                                transition-all duration-200 p-5 flex flex-col">

                        {{-- Avatar + Name --}}
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative shrink-0">
                                {{-- Avatar Circle --}}
                                <div class="w-14 h-14 rounded-full
                                            bg-teal-100 dark:bg-teal-900/40
                                            flex items-center justify-center
                                            text-xl font-bold text-teal-600 dark:text-teal-400">
                                    {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                </div>

                                {{-- Online / Offline dot --}}
                                @if ($mentor->isOnline())
                                <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400
                                                 border-2 border-white dark:border-[#1a2e3b] rounded-full"></span>
                                @else
                                <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-gray-300 dark:bg-gray-600
                                                 border-2 border-white dark:border-[#1a2e3b] rounded-full"></span>
                                @endif
                            </div>

                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-900 dark:text-gray-100 text-sm leading-tight">
                                    {{ $mentor->name }}
                                </h3>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">
                                    মেন্টর
                                </p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★★★★★</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                        ({{ $mentor->reviews_count ?? 0 }})
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- University / Degree / Students --}}
                        <div class="space-y-1.5 text-xs text-gray-600 dark:text-gray-400 mb-4">
                            <p class="flex items-center gap-2">
                                <span>🎓</span> {{ $mentor->profile?->institution_name ?? 'N/A' }}
                            </p>
                            <p class="flex items-center gap-2">
                                <span>📘</span> {{ $mentor->profile?->highgest_education_level ?? 'N/A' }}
                            </p>
                            <p class="flex items-center gap-2">
                                <span>🧑‍🎓</span> {{ $mentor->students_count ?? 0 }} জন শিক্ষার্থী
                            </p>
                        </div>

                        {{-- Skills --}}
                        {{-- Skills --}}
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @if (!empty($mentor->profile->skills))
                            @foreach (explode(',', $mentor->profile->skills) as $skill)
                            <span class="text-xs bg-teal-50 dark:bg-teal-900/30
                         text-teal-700 dark:text-teal-300
                         border border-teal-100 dark:border-teal-800/50
                         px-2 py-0.5 rounded-full">
                                {{ trim($skill) }}
                            </span>
                            @endforeach
                            @else
                            <span class="text-xs text-gray-400 dark:text-gray-500 italic">
                                কোনো দক্ষতা যোগ করা হয়নি
                            </span>
                            @endif
                        </div>

                        {{-- Price + Buttons --}}
                        <div class="mt-auto">
                            <div class="flex justify-between items-center
                                        bg-teal-50 dark:bg-teal-900/20
                                        px-4 py-2 rounded-xl mb-3">
                                <span class="text-xs text-gray-500 dark:text-gray-400">ঘণ্টা প্রতি</span>
                                <span class="text-base font-bold text-teal-600 dark:text-teal-400">
                                    ৳{{ $mentor->profile?->hourly_rate ?? '—' }}
                                </span>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('mentor_profile', $mentor->id) }}" class="flex-1 text-center
                                          border border-teal-400 dark:border-teal-600
                                          text-teal-600 dark:text-teal-400
                                          py-2 rounded-lg text-xs font-semibold
                                          hover:bg-teal-50 dark:hover:bg-teal-900/20
                                          transition-colors duration-200">
                                    প্রোফাইল
                                </a>
                                <a href="{{ route('checkout') }}" class="flex-1 text-center
                                          bg-teal-600 dark:bg-teal-500 text-white
                                          py-2 rounded-lg text-xs font-semibold
                                          hover:bg-teal-700 dark:hover:bg-teal-400
                                          transition-colors duration-200">
                                    হায়ার করুন
                                </a>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center">
                        <span class="text-4xl mb-3">🔍</span>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">কোনো মেন্টর পাওয়া যায়নি</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">অনুগ্রহ করে পরে আবার চেষ্টা করুন</p>
                    </div>
                    @endforelse

                </div>

                {{-- Pagination --}}
                @if ($mentors->hasPages())
                <div class="flex items-center justify-center gap-2 mt-10">

                    {{-- Previous Button --}}
                    @if ($mentors->onFirstPage())
                    <span class="w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-700
                         text-gray-300 dark:text-gray-600
                         flex items-center justify-center text-sm cursor-not-allowed">
                        ‹
                    </span>
                    @else
                    <a href="{{ $mentors->previousPageUrl() }}" class="w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-700
                      text-gray-400 dark:text-gray-500
                      hover:border-teal-400 dark:hover:border-teal-600
                      hover:text-teal-600 dark:hover:text-teal-400
                      transition-colors duration-200 flex items-center justify-center text-sm">
                        ‹
                    </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($mentors->links()->offsetGet('elements') ?? [] as $element)

                    {{-- Dots --}}
                    @if (is_string($element))
                    <span class="text-gray-400 dark:text-gray-600 text-sm">...</span>
                    @endif

                    {{-- Page Links --}}
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $mentors->currentPage())
                    <span class="w-9 h-9 rounded-lg bg-teal-600 dark:bg-teal-500
                                     text-white font-bold text-sm
                                     flex items-center justify-center">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}" class="w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-700
                                  text-gray-600 dark:text-gray-400
                                  hover:border-teal-400 dark:hover:border-teal-600
                                  hover:text-teal-600 dark:hover:text-teal-400
                                  transition-colors duration-200
                                  flex items-center justify-center text-sm">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach
                    @endif

                    @endforeach

                    {{-- Next Button --}}
                    @if ($mentors->hasMorePages())
                    <a href="{{ $mentors->nextPageUrl() }}" class="w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-700
                      text-gray-400 dark:text-gray-500
                      hover:border-teal-400 dark:hover:border-teal-600
                      hover:text-teal-600 dark:hover:text-teal-400
                      transition-colors duration-200 flex items-center justify-center text-sm">
                        ›
                    </a>
                    @else
                    <span class="w-9 h-9 rounded-lg border border-gray-200 dark:border-gray-700
                         text-gray-300 dark:text-gray-600
                         flex items-center justify-center text-sm cursor-not-allowed">
                        ›
                    </span>
                    @endif

                </div>
                @endif

            </div>
        </div>
    </div>

</x-layout>