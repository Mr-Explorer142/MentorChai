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

            <form method="GET" action="{{ route('mentors') }}" class="flex items-center gap-3">

                <div class="relative">
                    <div class="flex items-center
                    rounded-xl overflow-hidden
                    border border-teal-200 dark:border-teal-800
                    focus-within:ring-2 focus-within:ring-teal-400 dark:focus-within:ring-teal-500
                    bg-white dark:bg-[#1a2e3b]">

                        <svg class="absolute left-3 w-4 h-4 text-teal-400 dark:text-teal-500 pointer-events-none"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>

                        <input type="text" id="search-input" value="{{ request('search') }}" name="search"
                            placeholder="নাম বা দক্ষতা খুঁজুন..." autocomplete="off" class="pl-10 pr-2 py-2 text-sm
                          w-32 sm:w-44 md:w-56
                          text-gray-600 dark:text-gray-300
                          bg-transparent
                          placeholder:text-gray-400 dark:placeholder:text-gray-500
                          focus:outline-none">

                        <button type="submit" class="bg-teal-600 dark:bg-teal-500
                           hover:bg-teal-700 dark:hover:bg-teal-400
                           text-white px-3 sm:px-4 py-2 text-sm font-semibold
                           transition-colors duration-200
                           flex items-center gap-1.5 shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <span class="hidden sm:inline">খুঁজুন</span>
                        </button>
                    </div>

                    {{-- Suggestions Dropdown --}}
                    <div id="search-suggestions" class="absolute top-full left-0 mt-1 w-full z-50
                    bg-white dark:bg-[#1a2e3b]
                    border border-teal-100 dark:border-teal-800
                    rounded-xl shadow-lg dark:shadow-[0_4px_12px_rgba(0,0,0,0.4)]
                    overflow-hidden hidden">
                    </div>
                </div>

                {{-- Sort --}}
                <div class="relative">
                    <select name="sort" onchange="this.form.submit()" class="border border-teal-200 dark:border-teal-800
                   rounded-xl py-2 text-sm
                   text-gray-600 dark:text-gray-300
                   bg-white dark:bg-[#1a2e3b]
                   focus:outline-none focus:ring-2 focus:ring-teal-400 dark:focus:ring-teal-500
                   transition-colors duration-200
                   pl-8 pr-2 sm:pl-4 sm:pr-8
                   w-9 sm:w-auto
                   appearance-none cursor-pointer">
                        <option value="" {{ request('sort')=='' ? 'selected' : '' }}>মূল্য অনুযায়ী বাছাই</option>
                        <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>মূল্য: কম থেকে
                            বেশি</option>
                        <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>মূল্য: বেশি
                            থেকে কম</option>
                    </select>

                    {{-- Icon shown on small screens --}}
                    <div class="pointer-events-none absolute inset-0 flex items-center justify-center sm:hidden">
                        <svg class="w-4 h-4 text-teal-500 dark:text-teal-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                        </svg>
                    </div>

                    {{-- Default dropdown arrow shown on larger screens --}}
                    <div class="pointer-events-none absolute inset-y-0 right-3 hidden sm:flex items-center">
                        <svg class="w-4 h-4 text-teal-500 dark:text-teal-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

            </form>
        </div>

        <div class="flex gap-8">

            {{-- Sidebar Filters --}}
            {{-- Sidebar Filters --}}
            <aside class="hidden lg:block w-72 shrink-0">
                <form method="GET" action="{{ route('mentors') }}" id="filter-form">

                    {{-- Keep search and sort values when filtering --}}
                    @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    <div class="bg-white dark:bg-[#1a2e3b]
                    rounded-2xl shadow-sm dark:shadow-[0_1px_3px_rgba(0,0,0,0.4)]
                    border border-teal-100 dark:border-teal-900/40
                    p-5 space-y-6 sticky top-6 transition-colors duration-300">

                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm">ফিল্টার</h3>
                            <a href="{{ route('mentors', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
                                class="text-xs text-teal-600 dark:text-teal-400 hover:underline">
                                রিসেট
                            </a>
                        </div>

                        {{-- Price Range --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">মূল্য পরিসীমা (ঘণ্টা)</p>
                            <div class="flex items-center gap-2">
                                <input type="number" name="price_min" value="{{ request('price_min') }}"
                                    placeholder="৳ সর্বনিম্ন" class="w-full border border-gray-200 dark:border-gray-700
                                  text-gray-600 dark:text-gray-300
                                  bg-white dark:bg-[#243d4d]
                                  placeholder:text-gray-400 dark:placeholder:text-gray-500
                                  rounded-lg px-3 py-1.5 text-sm
                                  focus:outline-none focus:ring-1 focus:ring-teal-400
                                  transition-colors duration-200">
                                <span class="text-gray-400 dark:text-gray-500 text-xs shrink-0">—</span>
                                <input type="number" name="price_max" value="{{ request('price_max') }}"
                                    placeholder="৳ সর্বোচ্চ" class="w-full border border-gray-200 dark:border-gray-700
                                  text-gray-600 dark:text-gray-300
                                  bg-white dark:bg-[#243d4d]
                                  placeholder:text-gray-400 dark:placeholder:text-gray-500
                                  rounded-lg px-3 py-1.5 text-sm
                                  focus:outline-none focus:ring-1 focus:ring-teal-400
                                  transition-colors duration-200">
                            </div>
                        </div>

                        {{-- Skills --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">দক্ষতা</p>
                            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                @foreach ($allSkills as $skill)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="skills[]" value="{{ $skill }}" {{ in_array($skill,
                                        request('skills', [])) ? 'checked' : '' }}
                                        class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    {{ $skill }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Department --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">ডিপার্টমেন্ট</p>
                            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                @foreach ($allDepartments as $dept)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="departments[]" value="{{ $dept }}" {{ in_array($dept,
                                        request('departments', [])) ? 'checked' : '' }}
                                        class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    {{ $dept }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Rating (placeholder for later) --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                                সর্বনিম্ন রেটিং
                                <span class="text-gray-300 dark:text-gray-600 font-normal">(শীঘ্রই আসছে)</span>
                            </p>
                            <div
                                class="space-y-2 text-sm text-gray-400 dark:text-gray-600 cursor-not-allowed select-none">
                                <label class="flex items-center gap-2">
                                    <input type="radio" disabled class="w-4 h-4"> যেকোনো
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" disabled class="w-4 h-4">
                                    <span class="text-yellow-300 text-xs">★★★★★</span> ৫.০
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" disabled class="w-4 h-4">
                                    <span class="text-yellow-300 text-xs">★★★★☆</span> ৪.০+
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" disabled class="w-4 h-4">
                                    <span class="text-yellow-300 text-xs">★★★☆☆</span> ৩.০+
                                </label>
                            </div>
                        </div>

                        {{-- Apply Button --}}
                        <button type="submit" class="w-full bg-teal-600 dark:bg-teal-500 text-white
                           py-2.5 rounded-xl font-semibold
                           hover:bg-teal-700 dark:hover:bg-teal-400
                           transition text-sm">
                            ফিল্টার প্রয়োগ করুন
                        </button>

                    </div>
                </form>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 min-w-0">

                {{-- Results count & mobile filter --}}
                {{-- Results count & mobile filter --}}
                <div class="flex items-center justify-between mb-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        @if (request('search'))
                        "<span class="font-semibold text-teal-600 dark:text-teal-400">{{ request('search') }}</span>"
                        নামে / টপিকে
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $totalMentors }} জন</span>
                        মেন্টর পাওয়া গিয়েছে
                        @elseif (request('skills') || request('departments') || request('price_min') ||
                        request('price_max'))
                        ফিল্টার অনুযায়ী
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $totalMentors }} জন</span>
                        মেন্টর পাওয়া গেছে
                        @else
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $totalMentors }} জন</span>
                        মেন্টর পাওয়া গেছে
                        @endif
                    </p>

                    {{-- Mobile filter button --}}
                    <button
                        onclick="document.getElementById('mobile-filter-panel').classList.remove('translate-x-full')"
                        class="lg:hidden flex items-center gap-2 text-sm
                   border border-teal-300 dark:border-teal-700
                   text-teal-600 dark:text-teal-400
                   px-3 py-1.5 rounded-lg
                   hover:bg-teal-50 dark:hover:bg-teal-900/20
                   transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M7 8h10M11 12h4" />
                        </svg>
                        ফিল্টার
                        {{-- Active filter dot --}}
                        @if(request('skills') || request('departments') || request('price_min') || request('price_max'))
                        <span class="w-2 h-2 rounded-full bg-teal-500 inline-block"></span>
                        @endif
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
                                            text-xl font-bold text-teal-600 dark:text-teal-400 overflow-hidden">
                                    @if($mentor->profile && $mentor->profile->avatar)
                                        <img src="{{ asset('storage/' . $mentor->profile->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                                    @else
                                        {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                    @endif
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
                                <span>✏️</span> {{ $mentor->students_count ?? 0 }} জন শিক্ষার্থী
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
                                <a href="{{ route('session.request.create', $mentor->id) }}" class="flex-1 text-center
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

    {{-- Mobile Filter Panel (slide-in from right) --}}
    <div id="mobile-filter-panel"
        class="lg:hidden fixed inset-0 z-50 flex justify-end translate-x-full transition-transform duration-300">

        {{-- Backdrop --}}
        <div onclick="document.getElementById('mobile-filter-panel').classList.add('translate-x-full')"
            class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

        {{-- Panel --}}
        <div class="relative w-80 max-w-full h-full overflow-y-auto
                    bg-white dark:bg-[#1a2e3b]
                    shadow-xl dark:shadow-[0_0_40px_rgba(0,0,0,0.6)]">

            <form method="GET" action="{{ route('mentors') }}">

                {{-- Keep search and sort --}}
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('sort'))
                <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif

                {{-- Panel Header --}}
                <div class="flex items-center justify-between px-5 py-4
                            border-b border-teal-100 dark:border-teal-900/40 sticky top-0
                            bg-white dark:bg-[#1a2e3b] z-10">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200">ফিল্টার</h3>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('mentors', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
                            class="text-xs text-teal-600 dark:text-teal-400 hover:underline">
                            রিসেট
                        </a>
                        <button type="button"
                            onclick="document.getElementById('mobile-filter-panel').classList.add('translate-x-full')"
                            class="w-8 h-8 flex items-center justify-center rounded-lg
                                       text-gray-400 dark:text-gray-500
                                       hover:bg-gray-100 dark:hover:bg-teal-900/30
                                       transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-5 space-y-6">

                    {{-- Price Range --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">মূল্য পরিসীমা (ঘণ্টা)</p>
                        <div class="flex items-center gap-2">
                            <input type="number" name="price_min" value="{{ request('price_min') }}"
                                placeholder="৳ সর্বনিম্ন" class="w-full border border-gray-200 dark:border-gray-700
                                          text-gray-600 dark:text-gray-300
                                          bg-white dark:bg-[#243d4d]
                                          placeholder:text-gray-400 dark:placeholder:text-gray-500
                                          rounded-lg px-3 py-1.5 text-sm
                                          focus:outline-none focus:ring-1 focus:ring-teal-400
                                          transition-colors duration-200">
                            <span class="text-gray-400 dark:text-gray-500 text-xs shrink-0">—</span>
                            <input type="number" name="price_max" value="{{ request('price_max') }}"
                                placeholder="৳ সর্বোচ্চ" class="w-full border border-gray-200 dark:border-gray-700
                                          text-gray-600 dark:text-gray-300
                                          bg-white dark:bg-[#243d4d]
                                          placeholder:text-gray-400 dark:placeholder:text-gray-500
                                          rounded-lg px-3 py-1.5 text-sm
                                          focus:outline-none focus:ring-1 focus:ring-teal-400
                                          transition-colors duration-200">
                        </div>
                    </div>

                    {{-- Skills --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">দক্ষতা</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            @foreach ($allSkills as $skill)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="skills[]" value="{{ $skill }}" {{ in_array($skill,
                                    request('skills', [])) ? 'checked' : '' }}
                                    class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                {{ $skill }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Department --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">ডিপার্টমেন্ট</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            @foreach ($allDepartments as $dept)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="departments[]" value="{{ $dept }}" {{ in_array($dept,
                                    request('departments', [])) ? 'checked' : '' }}
                                    class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                {{ $dept }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Rating placeholder --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                            সর্বনিম্ন রেটিং
                            <span class="text-gray-300 dark:text-gray-600 font-normal">(শীঘ্রই আসছে)</span>
                        </p>
                        <div class="space-y-2 text-sm text-gray-400 dark:text-gray-600 cursor-not-allowed select-none">
                            <label class="flex items-center gap-2">
                                <input type="radio" disabled class="w-4 h-4"> যেকোনো
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" disabled class="w-4 h-4">
                                <span class="text-yellow-300 text-xs">★★★★★</span> ৫.০
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" disabled class="w-4 h-4">
                                <span class="text-yellow-300 text-xs">★★★★☆</span> ৪.০+
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" disabled class="w-4 h-4">
                                <span class="text-yellow-300 text-xs">★★★☆☆</span> ৩.০+
                            </label>
                        </div>
                    </div>

                </div>

                {{-- Sticky Apply Button at bottom --}}
                <div class="sticky bottom-0 px-5 py-4
                            border-t border-teal-100 dark:border-teal-900/40
                            bg-white dark:bg-[#1a2e3b]">
                    <button type="submit" class="w-full bg-teal-600 dark:bg-teal-500 text-white
                                   py-2.5 rounded-xl font-semibold
                                   hover:bg-teal-700 dark:hover:bg-teal-400
                                   transition text-sm">
                        ফিল্টার প্রয়োগ করুন
                    </button>
                </div>

            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const input = document.getElementById('search-input');
    const dropdown = document.getElementById('search-suggestions');
    let debounceTimer;

    input.addEventListener('input', function () {
        clearTimeout(debounceTimer);
        const query = this.value.trim();

        if (query.length < 2) {
            dropdown.classList.add('hidden');
            dropdown.innerHTML = '';
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch(`/mentors/suggestions?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        dropdown.classList.add('hidden');
                        dropdown.innerHTML = '';
                        return;
                    }

                    const isDark = document.documentElement.classList.contains('dark');

                    dropdown.innerHTML = data.map(item => {
                        const isMentor = item.type === 'mentor';

                        const icon = isMentor
                            ? `<svg style="width:14px;height:14px;flex-shrink:0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                               </svg>`
                            : `<svg style="width:14px;height:14px;flex-shrink:0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                               </svg>`;

                        // Use inline styles so dark mode works inside JS-injected HTML
                        const iconColor  = isDark ? '#2dd4bf' : '#0d9488';   // teal-400 / teal-600
                        const textColor  = isDark ? '#d1d5db' : '#374151';   // gray-300 / gray-700
                        const hoverBg   = isDark ? '#0f2d3a' : '#f0fdfa';    // dark teal / teal-50
                        const badgeBg   = isMentor
                            ? (isDark ? '#0d2d2a' : '#f0fdfa')
                            : (isDark ? '#1e1040' : '#faf5ff');
                        const badgeText = isMentor
                            ? (isDark ? '#2dd4bf' : '#0d9488')
                            : (isDark ? '#c084fc' : '#9333ea');
                        const badgeBorder = isMentor
                            ? (isDark ? '#134e4a' : '#99f6e4')
                            : (isDark ? '#4c1d95' : '#e9d5ff');
                        const badgeLabel = isMentor ? 'মেন্টর' : 'দক্ষতা';
                        const divider    = isDark ? '#1e3a47' : '#f0fdfa';

                        return `
                            <button type="button"
                                    onclick="selectSuggestion('${item.label.replace(/'/g, "\\'")}')"
                                    style="width:100%;text-align:left;padding:10px 16px;
                                           display:flex;align-items:center;justify-content:space-between;gap:8px;
                                           background:transparent;border:none;cursor:pointer;
                                           transition:background 0.15s;"
                                    onmouseover="this.style.background='${hoverBg}'"
                                    onmouseout="this.style.background='transparent'">
                                <span style="display:flex;align-items:center;gap:8px;
                                             font-size:14px;font-weight:500;color:${textColor}">
                                    <span style="color:${iconColor}">${icon}</span>
                                    ${item.label}
                                </span>
                                <span style="font-size:11px;padding:2px 8px;border-radius:999px;
                                             border:1px solid ${badgeBorder};
                                             background:${badgeBg};color:${badgeText};
                                             white-space:nowrap;flex-shrink:0">
                                    ${badgeLabel}
                                </span>
                            </button>
                        `;
                    }).join(`<hr style="border-color:${document.documentElement.classList.contains('dark') ? '#1e3a47' : '#f0fdfa'};margin:0">`);

                    dropdown.classList.remove('hidden');
                })
                .catch(() => {
                    dropdown.classList.add('hidden');
                });
        }, 300);
    });

    function selectSuggestion(label) {
        input.value = label;
        dropdown.classList.add('hidden');
        input.closest('form').submit();
    }

    document.addEventListener('click', function (e) {
        if (!input.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
    </script>
    @endpush

</x-layout>
