<x-layout>

    <div
        class="min-h-screen overflow-x-clip bg-[#f4f9f8] dark:bg-[#0f1f2e] transition-colors duration-300">
        <div class="mx-auto max-w-[90rem] px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12">

        {{-- Directory heading --}}
        <div class="mb-7 flex flex-col gap-5 lg:mb-9 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <p class="mb-2 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#28666e] dark:text-[#71c6c8]">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#4b9b8f]"></span>
                    Browse our community
                </p>
                <h1 class="text-3xl font-extrabold tracking-tight text-[#123f4a] dark:text-[#e2f1f2] sm:text-4xl">
                    Find your mentor
                </h1>
                <p class="mt-2 max-w-xl text-sm leading-6 text-slate-600 dark:text-slate-400 sm:text-base">
                    Learn one-to-one from experienced mentors, on your schedule and at your pace.
                </p>
            </div>

            <form method="GET" action="{{ route('mentors') }}" class="grid w-full grid-cols-[minmax(0,1fr)_auto_auto] gap-2 sm:flex sm:w-auto sm:items-center">
                @if(request('per_page'))
                <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif

                <div class="relative col-span-3 min-w-0 sm:col-span-1 sm:w-72 sm:flex-none lg:w-80">
                    <div class="flex items-center
                    rounded-2xl overflow-hidden
                    border border-[#c8ddda] dark:border-[#31545b]
                    focus-within:ring-4 focus-within:ring-[#28666e]/10 dark:focus-within:ring-[#4db6c1]/10
                    bg-white dark:bg-[#172b38] shadow-sm">

                        <div class="relative flex items-center w-full">
                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-[#488b87] dark:text-[#71c6c8] pointer-events-none"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>

                            <input type="text" id="search-input" value="{{ request('search') }}" name="search"
                                placeholder="Search mentors or subjects..." autocomplete="off" class="pl-10 pr-9 py-3 text-sm
                              w-full
                              text-slate-700 dark:text-slate-200
                              bg-transparent
                              placeholder:text-slate-400 dark:placeholder:text-slate-500
                              focus:outline-none">

                            <button type="button" id="clear-search" class="absolute right-2.5 top-1/2 -translate-y-1/2 z-20 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 focus:outline-none p-0.5 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800/40 transition-colors duration-150 {{ request('search') ? '' : 'hidden' }}">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <button type="submit" class="bg-[#28666e] dark:bg-[#347f86]
                           hover:bg-[#1e535b] dark:hover:bg-[#42949a]
                           text-white px-4 py-3 text-sm font-semibold
                           transition-colors duration-200
                           flex items-center gap-1 shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <span class="hidden sm:inline">Search</span>
                        </button>
                    </div>

                    {{-- Suggestions Dropdown --}}
                    <div id="search-suggestions" class="absolute top-full left-0 mt-2 w-full z-50
                    bg-white dark:bg-[#172b38]
                    border border-[#d6e6e3] dark:border-[#31545b]
                    rounded-2xl shadow-xl dark:shadow-[0_12px_30px_rgba(0,0,0,0.35)]
                    overflow-hidden hidden">
                    </div>
                </div>

                <div class="relative shrink-0">
                    <select name="sort" onchange="this.form.submit()" aria-label="Sort mentors" class="border border-[#c8ddda] dark:border-[#31545b]
                   rounded-2xl py-3 text-sm
                   text-slate-700 dark:text-slate-200
                   bg-white dark:bg-[#172b38]
                   focus:outline-none focus:ring-4 focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                   transition-colors duration-200
                   pl-3 pr-7
                   w-full sm:w-auto
                   appearance-none cursor-pointer">
                        <option value="" {{ request('sort')=='' ? 'selected' : '' }}>Sort by</option>
                        <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>

                    {{-- Dropdown arrow shown on all screens --}}
                    <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                        <svg class="w-3 h-3 text-[#488b87] dark:text-[#71c6c8]" fill="none" stroke="currentColor"
                            stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                {{-- Mobile Filter Trigger --}}
                <button type="button"
                    onclick="const panel = document.getElementById('mobile-filter-panel'); const drawer = panel.querySelector('[data-mobile-filter-drawer]'); panel.classList.remove('opacity-0', 'pointer-events-none'); requestAnimationFrame(() => drawer.classList.remove('translate-x-full'))"
                    aria-label="Open filters"
                    class="lg:hidden flex items-center justify-center shrink-0 w-12 h-12
                    border border-[#c8ddda] dark:border-[#31545b]
                    text-[#28666e] dark:text-[#71c6c8]
                    bg-white dark:bg-[#172b38] rounded-2xl shadow-sm
                    hover:bg-[#eaf4f2] dark:hover:bg-[#203d48]
                    transition-colors duration-200 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M7 8h10M11 12h4" />
                    </svg>
                </button>

            </form>
        </div>

        <div class="flex items-start gap-8">

            {{-- Sidebar Filters --}}
            {{-- Sidebar Filters --}}
            <aside class="hidden lg:block w-64 shrink-0 xl:w-72">
                <form method="GET" action="{{ route('mentors') }}" id="filter-form">

                    {{-- Keep search and sort values when filtering --}}
                    @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    @if(request('per_page'))
                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                    @endif

                    <div class="bg-white dark:bg-[#172b38]
                    rounded-3xl shadow-sm dark:shadow-[0_8px_24px_rgba(0,0,0,0.18)]
                    border border-[#d6e5e2] dark:border-[#294650]
                    p-5 space-y-6 sticky top-6 transition-colors duration-300">

                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm">Filters</h3>
                            <a href="{{ route('mentors', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
                                class="text-xs text-teal-600 dark:text-teal-400 hover:underline">
                                Reset
                            </a>
                        </div>

                        {{-- Price Range --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Price Range (Hourly)</p>
                            <div class="flex items-center gap-2">
                                <input type="number" name="price_min" value="{{ request('price_min') }}"
                                    placeholder="Min ৳" class="w-full border border-gray-200 dark:border-gray-700
                                  text-gray-600 dark:text-gray-300
                                  bg-white dark:bg-[#243d4d]
                                  placeholder:text-gray-400 dark:placeholder:text-gray-500
                                  rounded-lg px-3 py-1.5 text-sm
                                  focus:outline-none focus:ring-1 focus:ring-teal-400
                                  transition-colors duration-200">
                                <span class="text-gray-400 dark:text-gray-500 text-xs shrink-0">-</span>
                                <input type="number" name="price_max" value="{{ request('price_max') }}"
                                    placeholder="Max ৳" class="w-full border border-gray-200 dark:border-gray-700
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
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Skills</p>
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
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Department</p>
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

                        {{-- Language --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Language</p>
                            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                @php
                                    $languages = ['Bengali', 'English', 'Bengali-English Mixed'];
                                @endphp
                                @foreach ($languages as $lang)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="languages[]" value="{{ $lang }}" {{ in_array($lang,
                                        request('languages', [])) ? 'checked' : '' }}
                                        class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    {{ $lang }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Rating --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                                Minimum Rating
                            </p>
                            <div
                                class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="rating" value="0" {{ request('rating', '0') == '0' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Any
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="rating" value="5" {{ request('rating') == '5' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    <span class="text-yellow-400 text-xs tracking-widest">★★★★★</span> ৫.০
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="rating" value="4" {{ request('rating') == '4' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    <span class="text-yellow-400 text-xs tracking-widest">★★★★☆</span> ৪.০+
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="rating" value="3" {{ request('rating') == '3' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                    <span class="text-yellow-400 text-xs tracking-widest">★★★☆☆</span> ৩.০+
                                </label>
                            </div>
                        </div>

                        {{-- Online Status --}}
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                                Online Status
                            </p>
                            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="online_status" value="both" {{ request('online_status', 'both') == 'both' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Any
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="online_status" value="online" {{ request('online_status') == 'online' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Online
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="online_status" value="offline" {{ request('online_status') == 'offline' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Offline
                                </label>
                            </div>
                        </div>



                        {{-- Apply Button --}}
                        <button type="submit" class="w-full bg-teal-600 dark:bg-teal-500 text-white
                           py-2.5 rounded-xl font-semibold
                           hover:bg-teal-700 dark:hover:bg-teal-400
                           transition text-sm cursor-pointer">
                            Apply Filters
                        </button>

                    </div>
                </form>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 min-w-0">

                {{-- Results count & mobile filter --}}
                <div class="mb-4 flex items-center justify-between sm:mb-5">
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                        @if (request('search'))
                        <span class="font-bold text-[#123f4a] dark:text-[#e2f1f2]">{{ $totalMentors }}</span> mentors found related to
                        "<span class="font-semibold text-[#28666e] dark:text-[#71c6c8]">{{ request('search') }}</span>"
                        @elseif (request('skills') || request('departments') || request('languages') || request('price_min') ||
                        request('price_max'))
                        <span class="font-bold text-[#123f4a] dark:text-[#e2f1f2]">{{ $totalMentors }}</span>
                        mentors found based on filters
                        @else
                        <span class="font-bold text-[#123f4a] dark:text-[#e2f1f2]">{{ $totalMentors }}</span>
                        mentors found
                        @endif
                    </p>
                </div>

                {{-- Mentor Cards Grid --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 2xl:grid-cols-3">

                    @forelse ($mentors as $mentor)
                    <div class="group relative flex flex-col overflow-hidden rounded-3xl border border-[#d6e5e2] bg-white shadow-[0_8px_24px_rgba(18,63,74,0.06)] transition-all duration-200 hover:-translate-y-1 hover:border-[#9fc5bd] hover:shadow-[0_16px_34px_rgba(18,63,74,0.12)] dark:border-[#294650] dark:bg-[#172b38] dark:shadow-[0_10px_28px_rgba(0,0,0,0.2)] dark:hover:border-[#4a8587] dark:hover:shadow-[0_16px_34px_rgba(0,0,0,0.3)]">

                        {{-- Top Accent Strip --}}
                        <div class="h-1 w-full bg-linear-to-r from-[#28666e] via-[#4b9b8f] to-[#9ab8a5] dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#4db6c1]"></div>

                        <div class="flex flex-1 flex-col p-4 sm:p-5 lg:p-6">

                            {{-- Avatar + Name + Rating --}}
                            <div class="mb-4 flex items-start gap-3">
                                {{-- Avatar with gradient ring --}}
                                <div class="relative shrink-0">
                                    <div class="h-14 w-14 rounded-2xl bg-linear-to-tr from-[#28666e] to-[#9ab8a5] p-0.5 shadow-sm sm:h-16 sm:w-16 dark:from-[#4db6c1] dark:to-[#7ec8e3]">
                                        <div class="h-full w-full overflow-hidden
                                                    rounded-[0.85rem] bg-[#edf6f3] dark:bg-[#102a35]
                                                    flex items-center justify-center
                                                    text-lg sm:text-xl font-bold text-[#28666e] dark:text-[#71c6c8]">
                                            @if($mentor->profile && $mentor->profile->avatar)
                                            <img src="{{ asset('storage/' . $mentor->profile->avatar) }}" alt="Avatar"
                                                class="w-full h-full object-cover">
                                            @else
                                            {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Online / Offline Badge --}}
                                    @if ($mentor->isOnline())
                                    <span class="absolute -bottom-1 -right-1 h-4 w-4 bg-emerald-500
                                                     border-[3px] border-white dark:border-[#172b38] rounded-full" title="Online"></span>
                                    @else
                                    <span class="absolute -bottom-1 -right-1 h-4 w-4 bg-slate-300 dark:bg-slate-600
                                                     border-[3px] border-white dark:border-[#172b38] rounded-full" title="Offline"></span>
                                    @endif
                                </div>

                                {{-- Details --}}
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-1">
                                        <h3 class="truncate text-sm font-bold leading-snug text-[#123f4a] dark:text-[#e2f1f2] sm:text-base">
                                            {{ $mentor->name }}
                                        </h3>
                                        @if($mentor->profile && $mentor->profile->is_verified)
                                        <svg class="w-3.5 h-3.5 text-teal-500 dark:text-teal-400 shrink-0" fill="currentColor" viewBox="0 0 20 20" title="Verified Mentor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>

                                    {{-- Department Tag --}}
                                    <span class="mt-1 inline-block max-w-full truncate rounded-full bg-[#eaf4f2] px-2.5 py-1 text-[10px] font-bold text-[#28666e] dark:bg-[#203d45] dark:text-[#71c6c8] sm:text-[11px]">
                                        {{ $mentor->profile?->department ?? 'General' }}
                                    </span>

                                    {{-- Rating --}}
                                    @php
                                        $avg = round($mentor->reviews_avg_rating ?? 0, 1);
                                    @endphp
                                    <div class="mt-1.5 flex items-center gap-1.5">
                                        <span class="inline-flex items-center gap-0.5 text-xs font-bold text-amber-500 dark:text-amber-400">
                                            ★ {{ $avg > 0 ? $avg : 'New' }}
                                        </span>
                                        <span class="text-xs text-slate-400 dark:text-slate-500">
                                            ({{ $mentor->reviews_count ?? 0 }})
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- University & Stats --}}
                            <div class="mb-4 space-y-2 rounded-2xl border border-[#e1ece9] bg-[#f7fbfa] p-3 text-xs text-[#365e63] dark:border-[#294650] dark:bg-[#122631] dark:text-[#a8c7c9] sm:p-3.5">
                                <div class="flex items-center gap-1.5 truncate">
                                    <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1] shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147L12 14.6l7.74-4.453a.75.75 0 000-1.294L12 4.4 4.26 8.853a.75.75 0 000 1.294z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12v4.5a3 3 0 003 3h6a3 3 0 003-3V12" />
                                    </svg>
                                    <span class="truncate font-medium">{{ $mentor->profile?->institution_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center justify-between gap-2 text-[11px] sm:text-xs">
                                    <span class="flex min-w-0 items-center gap-1.5">
                                        <svg class="w-3 h-3 text-[#28666e] dark:text-[#4db6c1] shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        <span class="truncate">{{ $mentor->students_count ?? 0 }} Students</span>
                                    </span>
                                    <span class="flex min-w-0 items-center gap-1.5">
                                        <svg class="w-3 h-3 text-[#28666e] dark:text-[#4db6c1] shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="truncate">{{ $mentor->profile?->teaching_experience_years ? $mentor->profile->teaching_experience_years . ' yrs exp' : 'Experienced' }}</span>
                                    </span>
                                </div>
                            </div>

                            {{-- Skills Pills --}}
                            <div class="mb-4 flex min-h-7 flex-wrap gap-1.5">
                                @if (!empty($mentor->profile->skills))
                                @foreach (array_slice(explode(',', $mentor->profile->skills), 0, 2) as $skill)
                                <span class="rounded-full border border-[#d8e8e4] bg-white px-2.5 py-1 text-[10px] font-medium text-[#365e63] transition-colors dark:border-[#31545b] dark:bg-[#1a3440] dark:text-[#a8c7c9] sm:text-[11px]">
                                    {{ trim($skill) }}
                                </span>
                                @endforeach
                                @else
                                <span class="text-xs italic text-slate-400 dark:text-slate-500">
                                    Skills not specified
                                </span>
                                @endif
                            </div>

                            {{-- Price & Actions --}}
                            <div class="mt-auto border-t border-[#e5eeec] pt-4 dark:border-[#294650]">
                                <div class="flex justify-between items-center
                                            bg-[#f2f8f6] dark:bg-[#122631]
                                            border border-[#e1ece9] dark:border-[#294650]
                                            px-3.5 py-2.5 rounded-2xl mb-3">
                                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Rate / Hr</span>
                                    <span class="text-base font-extrabold text-[#28666e] dark:text-[#71c6c8]">
                                        ৳{{ $mentor->profile?->hourly_rate ?? '-' }}
                                    </span>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('mentor_profile', $mentor->id) }}" class="flex-1 rounded-xl border border-[#b8d2cd] py-2.5 text-center text-xs font-bold text-[#28666e] transition-all duration-200 hover:border-[#28666e] hover:bg-[#edf6f3] dark:border-[#3d676d] dark:text-[#8bd0d0] dark:hover:bg-[#203d45]">
                                        View Profile
                                    </a>
                                    @if ($mentor->isOnline())
                                    <a href="{{ route('session.request.create', $mentor->id) }}" class="flex-1 rounded-xl border border-[#28666e] bg-[#28666e] py-2.5 text-center text-xs font-bold text-white transition-all duration-200 hover:border-[#1e535b] hover:bg-[#1e535b] active:scale-[0.98] dark:border-[#347f86] dark:bg-[#347f86] dark:hover:border-[#42949a] dark:hover:bg-[#42949a]">
                                        Hire Now
                                    </a>
                                    @else
                                    <button type="button" disabled class="flex-1 cursor-not-allowed rounded-xl border border-slate-200 bg-slate-100 py-2.5 text-center text-xs font-bold text-slate-400 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-500">
                                        Offline
                                    </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    @empty
                    <div class="col-span-full flex flex-col items-center justify-center rounded-3xl border border-dashed border-[#c8ddda] bg-white/70 px-5 py-16 text-center dark:border-[#31545b] dark:bg-[#172b38]/70">
                        <span class="mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#eaf4f2] text-2xl text-[#28666e] dark:bg-[#203d45] dark:text-[#71c6c8]">⌕</span>
                        <p class="font-semibold text-slate-600 dark:text-slate-300">Sorry, no mentors found for your search.</p>
                        <p class="mt-1 text-xs text-slate-400 dark:text-slate-500">Please try again with a different keyword or filter.</p>
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
        class="lg:hidden pointer-events-none fixed inset-0 z-50 flex justify-end overflow-hidden opacity-0 transition-opacity duration-200">

        {{-- Backdrop --}}
        <div onclick="const panel = document.getElementById('mobile-filter-panel'); panel.querySelector('[data-mobile-filter-drawer]').classList.add('translate-x-full'); panel.classList.add('opacity-0', 'pointer-events-none')"
            class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

        {{-- Panel --}}
        <div data-mobile-filter-drawer class="relative h-full w-80 max-w-full translate-x-full overflow-y-auto
                    bg-white shadow-xl transition-transform duration-300 dark:bg-[#172b38] dark:shadow-[0_0_40px_rgba(0,0,0,0.6)]">

            <form method="GET" action="{{ route('mentors') }}">

                {{-- Keep search and sort --}}
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('sort'))
                <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                @if(request('per_page'))
                <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif

                {{-- Panel Header --}}
                <div class="flex items-center justify-between px-5 py-4
                            border-b border-[#e1ece9] dark:border-[#294650] sticky top-0
                            bg-white dark:bg-[#172b38] z-10">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200">Filters</h3>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('mentors', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
                            class="text-xs text-teal-600 dark:text-teal-400 hover:underline">
                            Reset
                        </a>
                        <button type="button"
                            onclick="const panel = document.getElementById('mobile-filter-panel'); panel.querySelector('[data-mobile-filter-drawer]').classList.add('translate-x-full'); panel.classList.add('opacity-0', 'pointer-events-none')"
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
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Price Range (Hourly)</p>
                        <div class="flex items-center gap-2">
                            <input type="number" name="price_min" value="{{ request('price_min') }}"
                                placeholder="Min ৳" class="w-full border border-gray-200 dark:border-gray-700
                                          text-gray-600 dark:text-gray-300
                                          bg-white dark:bg-[#243d4d]
                                          placeholder:text-gray-400 dark:placeholder:text-gray-500
                                          rounded-lg px-3 py-1.5 text-sm
                                          focus:outline-none focus:ring-1 focus:ring-teal-400
                                          transition-colors duration-200">
                            <span class="text-gray-400 dark:text-gray-500 text-xs shrink-0">-</span>
                            <input type="number" name="price_max" value="{{ request('price_max') }}"
                                placeholder="Max ৳" class="w-full border border-gray-200 dark:border-gray-700
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
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Skills</p>
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
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Department</p>
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

                    {{-- Language --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">Language</p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            @php
                                $languages = ['Bengali', 'English', 'Bengali-English Mixed'];
                            @endphp
                            @foreach ($languages as $lang)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="{{ $lang }}" {{ in_array($lang,
                                    request('languages', [])) ? 'checked' : '' }}
                                    class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                {{ $lang }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                            Minimum Rating
                        </p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" value="0" {{ request('rating', '0') == '0' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Any
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" value="5" {{ request('rating') == '5' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs tracking-widest">★★★★★</span> ৫.০
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" value="4" {{ request('rating') == '4' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs tracking-widest">★★★★☆</span> ৪.০+
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" value="3" {{ request('rating') == '3' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4">
                                <span class="text-yellow-400 text-xs tracking-widest">★★★☆☆</span> ৩.০+
                            </label>
                        </div>
                    </div>

                    {{-- Online Status --}}
                    <div>
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-3">
                            Status
                        </p>
                        <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="online_status" value="both" {{ request('online_status', 'both') == 'both' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Any
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="online_status" value="online" {{ request('online_status') == 'online' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Online
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="online_status" value="offline" {{ request('online_status') == 'offline' ? 'checked' : '' }} class="accent-teal-600 dark:accent-teal-400 w-4 h-4"> Offline
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
                                   transition text-sm cursor-pointer">
                        Apply Filters
                    </button>
                </div>

            </form>
        </div>
    </div>

    @push('scripts')
    <script>


    const input = document.getElementById('search-input');
    const dropdown = document.getElementById('search-suggestions');
    const clearBtn = document.getElementById('clear-search');
    let debounceTimer;

    input.addEventListener('input', function () {
        if (this.value.length > 0) {
            clearBtn.classList.remove('hidden');
        } else {
            clearBtn.classList.add('hidden');
            
            const url = new URL(window.location.href);
            if (url.searchParams.has('search')) {
                url.searchParams.delete('search');
                url.searchParams.delete('page');
                window.location.href = url.pathname + url.search;
            }
        }

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
                        const badgeLabel = isMentor ? 'Mentor' : 'Skill';

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

    clearBtn.addEventListener('click', function () {
        input.value = '';
        clearBtn.classList.add('hidden');
        dropdown.classList.add('hidden');
        dropdown.innerHTML = '';
        
        const url = new URL(window.location.href);
        if (url.searchParams.has('search')) {
            url.searchParams.delete('search');
            url.searchParams.delete('page');
            window.location.href = url.pathname + url.search;
        } else {
            input.focus();
        }
    });

    const searchForm = input.closest('form');
    searchForm.addEventListener('submit', function (e) {
        if (input.value.trim() === '') {
            e.preventDefault();
            const url = new URL(window.location.href);
            if (url.searchParams.has('search')) {
                url.searchParams.delete('search');
                url.searchParams.delete('page');
                window.location.href = url.pathname + url.search;
            } else {
                window.location.href = url.pathname + url.search;
            }
        }
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