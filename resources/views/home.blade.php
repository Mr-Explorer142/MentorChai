<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- ═══════════════════════════════════════════
        HERO SECTION
        ═══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden pt-8 pb-14 sm:pt-12 sm:pb-28 lg:pt-16 lg:pb-36" style="background-color: var(--mc-bg);">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-32 -right-32 h-[250px] w-[250px] sm:h-[500px] sm:w-[500px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.18), transparent 70%); filter: blur(60px);">
                </div>
                <div class="absolute -bottom-24 -left-24 h-[200px] w-[200px] sm:h-[380px] sm:w-[380px] rounded-full"
                    style="background: radial-gradient(circle, rgba(21,86,101,0.12), transparent 70%); filter: blur(50px);">
                </div>
                <div class="absolute right-1/3 top-1/4 h-[250px] w-[250px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.1), transparent 70%); filter: blur(70px);">
                </div>
            </div>

            {{-- Subtle dot pattern --}}
            <div class="pointer-events-none absolute inset-0"
                style="background-image: radial-gradient(rgba(26,153,152,0.1) 1px, transparent 1px); background-size: 28px 28px; opacity: 0.6;">
            </div>

            <div class="container relative z-10 mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-8 sm:gap-14 lg:grid-cols-2">

                    {{-- LEFT CONTENT --}}
                    <div
                        class="flex flex-col items-center sm:items-start text-center sm:text-left space-y-5 sm:space-y-8">
                        {{-- Badge --}}
                        <span
                            class="inline-flex items-center gap-1.5 sm:gap-2 rounded-full px-3.5 py-1.5 text-xs sm:text-sm font-bold tracking-wide shadow-xs"
                            style="background: linear-gradient(135deg, rgba(26,153,152,0.12), rgba(21,86,101,0.06)); border: 1.5px solid rgba(26,153,152,0.3); color: var(--mc-primary);">
                            <span class="h-2 w-2 animate-pulse rounded-full shadow-[0_0_8px_rgba(26,153,152,0.8)]"
                                style="background: var(--mc-primary);"></span>
                            পরীক্ষার আগে শেষ মুহূর্তের সহায়তা
                        </span>

                        {{-- Heading --}}
                        <h1 class="text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl md:text-5xl lg:text-6xl"
                            style="color: var(--mc-text);">
                            জরুরি মূহুর্তে হঠাৎ <br class="inline sm:hidden" />
                            <span
                                class="bg-gradient-to-r from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#7ec8e3] bg-clip-text text-transparent">
                                শিক্ষকের সাহায্য
                            </span> প্রয়োজন?
                            <br class="hidden sm:inline" />
                            <span class="text-slate-800 dark:text-slate-200">MentorChai আছে আপনার সাথে</span>
                        </h1>

                        {{-- Subtext --}}
                        <p class="max-w-xl mx-auto sm:mx-0 text-sm sm:text-lg leading-relaxed font-medium"
                            style="color: var(--mc-text-muted);">
                            পরীক্ষার আগের রাতে হঠাৎ Calculus বুঝতে অসুবিধা হচ্ছে? কিংবা Binary Search Algorithm?
                            শুধুমাত্র Kirchhoff's Laws বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>

                        {{-- CTA Buttons --}}
                        <div
                            class="grid grid-cols-2 gap-2 sm:flex sm:flex-row sm:gap-4 pt-1 sm:pt-2 w-full max-w-md sm:max-w-none justify-center sm:justify-start">
                            <a href="{{ route('mentors') }}"
                                class="inline-flex items-center justify-center gap-1.5 sm:gap-2 rounded-xl px-3 py-2.5 text-xs sm:px-7 sm:py-3.5 sm:text-base font-bold text-white shadow-lg transition-all duration-300 hover:-translate-y-0.5"
                                style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,152,0.35);">
                                এখনই শিক্ষক খুঁজুন
                                <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center justify-center gap-1.5 sm:gap-2 rounded-xl px-3 py-2.5 text-xs sm:px-7 sm:py-3.5 sm:text-base font-semibold transition-all duration-300 hover:-translate-y-0.5"
                                style="border: 1.5px solid rgba(26,153,152,0.4); color: var(--mc-primary); background: var(--mc-surface);">
                                কীভাবে কাজ করে?
                                <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>

                        {{-- Trust pills --}}
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 pt-1.5 sm:gap-5 sm:pt-3">
                            @php
                            $trustPills = [
                                ['icon' => '<svg class="w-3.5 h-3.5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', 'text' => '২৪/৭ সাপোর্ট'],
                                ['icon' => '<svg class="w-3.5 h-3.5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', 'text' => 'সাশ্রয়ী'],
                                ['icon' => '<svg class="w-3.5 h-3.5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>', 'text' => 'টপিক ভিত্তিক']
                            ];
                            @endphp
                            @foreach($trustPills as $pill)
                            <div class="flex cursor-pointer items-center gap-1 sm:gap-1.5 rounded-full px-2.5 py-1.5 sm:px-6 sm:py-3 text-[11px] sm:text-base font-extrabold tracking-wide transition-all duration-300 hover:-translate-y-1 hover:scale-105 hover:shadow-lg border border-[#1A9998]/50 sm:border-2 sm:border-[#1A9998]/75 shadow-md sm:shadow-lg"
                                style="background: linear-gradient(135deg, rgba(26,153,152,0.15), rgba(21,86,101,0.08)); color: var(--mc-primary);">
                                {!! $pill['icon'] !!}
                                <span>{{ $pill['text'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- RIGHT IMAGE --}}
                    <div class="relative flex justify-center lg:justify-end mt-4 lg:mt-0">
                        <div class="absolute inset-4 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(26,153,152,0.2), transparent 70%); filter: blur(40px);">
                        </div>

                        <div class="relative w-full max-w-[260px] sm:max-w-none mx-auto sm:mx-0">
                            <img src="{{ asset('images/Home Page/Homepagetop.jpg') }}" alt="Mentorship session"
                                class="relative w-full rounded-3xl"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: 0 24px 60px rgba(26,153,152,0.15), 0 4px 16px rgba(0,0,0,0.08);" />

                            {{-- Floating rating --}}
                            <div class="absolute -bottom-10 left-2 sm:-bottom-14 sm:-left-5 flex items-center gap-2 sm:gap-3 rounded-xl sm:rounded-2xl px-3 py-2 sm:px-4 sm:py-3 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="flex h-7 w-7 sm:h-9 sm:w-9 items-center justify-center rounded-lg sm:rounded-xl"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-white" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-primary);">4.9 Rated
                                    </p>
                                    <p class="text-[10px] sm:text-xs" style="color: var(--mc-text-muted);">Verified
                                        Mentors</p>
                                </div>
                            </div>

                            {{-- Online badge --}}
                            <div class="absolute right-2 -top-4 sm:-right-4 sm:-top-6 flex items-center gap-1.5 sm:gap-2 rounded-lg sm:rounded-xl px-2.5 py-1.5 sm:px-3 sm:py-2 shadow-lg"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <span class="h-2 w-2 animate-pulse rounded-full"
                                    style="background: var(--mc-online);"></span>
                                <span class="text-[10px] sm:text-xs font-semibold" style="color: var(--mc-primary);">৩২
                                    জন
                                    অনলাইন</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════
        POPULAR TOPICS CAROUSEL
        ═══════════════════════════════════════════ --}}
        <section class="py-12 sm:py-24 transition-colors duration-300" style="background-color: var(--mc-surface);">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                {{-- Heading --}}
                <div class="mb-8 sm:mb-14 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">
                        এক্সপ্লোর করুন</p>
                    <h2 class="text-xl sm:text-3xl font-extrabold tracking-tight lg:text-4xl"
                        style="color: var(--mc-text);">
                        জনপ্রিয়
                        <span
                            style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            টপিকসমূহ
                        </span>
                    </h2>
                    <div class="mx-auto mt-4 h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                </div>

                {{-- Carousel --}}
                <div class="relative">
                    <div id="scrollContainer" class="overflow-hidden">
                        <div id="cardsContainer"
                            class="flex gap-4 sm:gap-6 pb-4 transition-transform duration-500 ease-out"
                            style="width: max-content;">

                            @forelse($popularTopics as $index => $topic)
                            @php
                            $palettes = [
                            [
                            'from' => '#1A9998',
                            'to' => '#105857',
                            'icon' => '<svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.263 8.535l8.737-3.745 8.737 3.745-8.737 3.745-8.737-3.745zm0 0v4.615c0 2.215 3.91 4.01 8.737 4.01s8.737-1.795 8.737-4.01V8.535m-17.474 0L13 12.28" />
                            </svg>'
                            ], // Graduation Cap
                            [
                            'from' => '#1E63B8',
                            'to' => '#0F3C75',
                            'icon' => '<svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925-3.546 5.974 5.974 0 00-2.133-1A3.75 3.75 0 004 9.5a3.75 3.75 0 00.322 1.503A5.992 5.992 0 003 14.5a5.976 5.976 0 001 2.135A3.75 3.75 0 007.5 20h.017a3.75 3.75 0 003.483-2.5z" />
                            </svg>'
                            ], // Lightbulb
                            [
                            'from' => '#6D31ED',
                            'to' => '#40179C',
                            'icon' => '<svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>'
                            ], // Compass / Guide Badge
                            ];
                            $pal = $palettes[$index % count($palettes)];
                            $color = $pal['from'];
                            @endphp

                            <div class="group relative w-44 sm:w-64 shrink-0 overflow-hidden rounded-2xl transition-all duration-500 hover:-translate-y-3 bg-[var(--mc-surface)] dark:bg-[#253e50]"
                                style="border: 1px solid {{ $color }}45;
                                        box-shadow: 0 8px 30px {{ $color }}20, 0 2px 8px rgba(0,0,0,0.12);">

                                {{-- Shimmer sweep --}}
                                <div class="pointer-events-none absolute inset-0 z-30 -translate-x-full skew-x-12
                                            transition-transform duration-700 group-hover:translate-x-full"
                                    style="background: linear-gradient(90deg, transparent, rgba(255,255,255,0.07), transparent);">
                                </div>

                                {{-- ── HEADER ── --}}
                                <div class="relative flex h-32 sm:h-44 w-full flex-col justify-between overflow-hidden p-2.5 sm:p-4"
                                    style="background: linear-gradient(145deg, {{ $pal['from'] }} 0%, {{ $pal['to'] }} 100%);">

                                    {{-- Dot-grid texture --}}
                                    <div class="pointer-events-none absolute inset-0" style="background-image: radial-gradient(rgba(255,255,255,0.07) 1px, transparent 1px);
                                                background-size: 18px 18px;"></div>

                                    {{-- Decorative circles --}}
                                    <div class="pointer-events-none absolute -right-9 -top-9 h-32 w-32 rounded-full"
                                        style="border: 1px solid rgba(255,255,255,0.07); background: rgba(255,255,255,0.03);">
                                    </div>
                                    <div class="pointer-events-none absolute -right-3 -top-3 h-20 w-20 rounded-full"
                                        style="border: 1px solid rgba(255,255,255,0.10); background: rgba(255,255,255,0.04);">
                                    </div>

                                    {{-- Top row: icon + live dot --}}
                                    <div class="relative z-10 flex items-center justify-between">
                                        {{-- Translucent rounded icon container --}}
                                        <div class="flex h-8 w-8 items-center justify-center rounded-xl text-white"
                                            style="background: rgba(255, 255, 255, 0.12);
                                                    border: 1px solid rgba(255, 255, 255, 0.22);
                                                    backdrop-filter: blur(6px);">
                                            {!! $pal['icon'] !!}
                                        </div>
                                        <span class="flex h-2.5 w-2.5 rounded-full"
                                            style="background: #4ade80; box-shadow: 0 0 0 3px rgba(74,222,128,0.2), 0 0 8px 2px rgba(74,222,128,0.25);">
                                        </span>
                                    </div>

                                    {{-- Topic name --}}
                                    <div class="relative z-10 flex flex-1 items-center justify-center py-1 sm:py-2">
                                        <h3 class="text-center text-xs sm:text-[1.05rem] font-extrabold leading-snug tracking-tight"
                                            style="color: #ffffff; font-family: 'Nunito', sans-serif; text-shadow: 0 2px 16px rgba(0,0,0,0.35);">
                                            {{ $topic->name }}
                                        </h3>
                                    </div>

                                    {{-- Stats pill --}}
                                    <div class="relative z-10 flex justify-center">
                                        <div class="inline-flex items-center gap-1.5 sm:gap-3 rounded-full px-2.5 py-1 sm:px-4 sm:py-1.5"
                                            style="background: rgba(0,0,0,0.28); border: 1px solid rgba(255,255,255,0.12);">
                                            <span
                                                style="font-size: 9px; sm:font-size:10px; color:rgba(255,255,255,0.80); font-weight:700;">
                                                {{ $topic->mentors_count ?? '40+' }} মেন্টর
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- ── MENTOR AVATARS ── --}}
                                @if(!empty($topic->mentors))
                                <div class="flex items-center gap-2 px-4 py-3">
                                    <div class="flex">
                                        @foreach(array_slice($topic->mentors, 0, 3) as $i => $mentor)
                                        <div class="h-7 w-7 rounded-full overflow-hidden border-2 border-[var(--mc-surface)] dark:border-[#253e50]"
                                            style="margin-left: {{ $i > 0 ? '-8px' : '0' }};">
                                            @if(!empty($mentor['avatar']))
                                            <img src="{{ asset('storage/' . $mentor['avatar']) }}"
                                                alt="{{ $mentor['name'] }}" class="h-full w-full object-cover">
                                            @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($mentor['name']) }}&background={{ str_replace('#', '', $pal['from']) }}&color=ffffff&size=28&font-size=0.38&bold=true"
                                                alt="{{ $mentor['name'] }}" class="h-full w-full object-cover">
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <span class="text-[9px] sm:text-[11px] leading-tight"
                                        style="color: var(--mc-text-muted);">
                                        <strong style="color: var(--mc-primary);">{{ $topic->mentors[0]['name']
                                            }}</strong>
                                        এবং আরও {{ max(0, count($topic->mentors) - 1) }} জন পড়াচ্ছেন
                                    </span>
                                </div>
                                @endif

                                {{-- ── CTA ── --}}
                                <div class="px-3 pb-3 sm:px-4 sm:pb-4 @if(empty($topic->mentors)) pt-3 @endif">
                                    <a href="{{ route('mentors', ['skills[]' => $topic->name]) }}"
                                        class="group/btn relative block w-full overflow-hidden rounded-lg sm:rounded-xl py-1.5 sm:py-2.5
                                              text-center text-[10px] sm:text-sm font-bold text-white transition-all duration-300 hover:scale-[1.02]" style="background: linear-gradient(135deg, {{ $pal['from'] }}, {{ $pal['to'] }});
                                              box-shadow: 0 4px 16px {{ $color }}45;">
                                        <span
                                            class="pointer-events-none absolute inset-0 -translate-x-full skew-x-12
                                                     transition-transform duration-500 group-hover/btn:translate-x-full"
                                            style="background: linear-gradient(90deg, transparent, rgba(255,255,255,0.18), transparent);">
                                        </span>

                                        <span class="relative">অ্যাভেইলেবল টিচারলিস্ট দেখুন</span>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <p class="py-12 text-center text-sm" style="color: var(--mc-text-muted);">কোনো টপিক পাওয়া
                                যায়নি।</p>
                            @endforelse

                        </div>
                    </div>

                    {{-- Scroll buttons --}}
                    <button id="scrollLeft"
                        class="cursor-pointer absolute -left-2 sm:-left-5 top-1/2 z-10 flex h-9 w-9 sm:h-11 sm:w-11 -translate-y-1/2 items-center justify-center rounded-full shadow-xl transition-all duration-300 hover:scale-110"
                        style="background: var(--mc-surface); border: 1.5px solid var(--mc-border-teal); box-shadow: var(--mc-shadow-lg);">
                        <svg class="h-5 w-5" fill="none" stroke="var(--mc-primary)" viewBox="0 0 24 24"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="scrollRight"
                        class="cursor-pointer absolute -right-2 sm:-right-5 top-1/2 z-10 flex h-9 w-9 sm:h-11 sm:w-11 -translate-y-1/2 items-center justify-center rounded-full shadow-xl transition-all duration-300 hover:scale-110"
                        style="background: var(--mc-surface); border: 1.5px solid var(--mc-border-teal); box-shadow: var(--mc-shadow-lg);">
                        <svg class="h-5 w-5" fill="none" stroke="var(--mc-primary)" viewBox="0 0 24 24"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>


        {{-- ═══════════════════════════════════════════
        FEATURES SECTION
        ═══════════════════════════════════════════ --}}
        <section class="py-12 sm:py-24 transition-colors duration-300" >
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

                {{-- Heading --}}
                <div class="mb-8 sm:mb-14 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">কেন
                        আমরা?</p>
                    <h2 class="text-xl sm:text-3xl font-extrabold tracking-tight lg:text-4xl"
                        style="color: var(--mc-text);">
                        আমাদের
                        <span
                            style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            সুবিধাসমূহ
                        </span>
                    </h2>
                    <div class="mx-auto mt-4 h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                </div>

                @php
                $features = [
                ['icon'=>'payasyougo.png', 'cf'=>'#1A9998', 'ct'=>'#187F87',
                'title'=>'যতটুকু সময়, ঠিক ততটুকুর খরচ',
                'desc'=>'সর্বনিম্ন ১ ঘন্টা থেকে সর্বোচ্চ ৪ ঘন্টার জন্য মেন্টর বুক করুন এবং শুধুমাত্র নির্ধারিত সময়টুকুর জন্যই ফি প্রদান করুন। মাসিক
                সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।'],
                ['icon'=>'cheap.png', 'cf'=>'#187F87', 'ct'=>'#155665',
                'title'=>'সাধ্যের ভেতরে সাশ্রয়ী সেশন',
                'desc'=>'শিক্ষার্থীদের সাধ্যের ব্যাপারটি মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম
                সময়ের
                সেশন হওয়ায় খরচও একদম হাতের নাগালে।'],
                ['icon'=>'topic.png', 'cf'=>'#155665', 'ct'=>'#102E3C',
                'title'=>'পুরো কোর্স নয়, শিখুন নির্দিষ্ট টপিক',
                'desc'=>'অপ্রয়োজনীয় কনটেন্ট বা পুরো কোর্সে ভর্তি হওয়ার প্রয়োজন নেই। ঠিক যে টপিকটিতে সমস্যা রয়েছে,
                শুধুমাত্র সেটির সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।'],
                ['icon'=>'24-hours-support.png', 'cf'=>'#102E3C', 'ct'=>'#155665',
                'title'=>'২৪/৭ মেন্টরশিপ',
                'desc'=>'গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত - যেকোনো সময়েই সাহায্য নিতে পারবেন মেন্টরদের।'],
                ['icon'=>'flexibleincome.png', 'cf'=>'#155665', 'ct'=>'#187F87',
                'title'=>'মেন্টরদের জন্য ফ্লেক্সিবল স্কেডিউল',
                'desc'=>'বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা নিজেদের অবসর সময়ে মেন্টর হিসেবে কাজ করতে পারেন এবং ঘরে
                বসেই অর্থ উপার্জন করতে পারেন।'],
                ['icon'=>'findteacher.png', 'cf'=>'#187F87', 'ct'=>'#1A9998',
                'title'=>'দ্রুততম সময়ে মেন্টর ম্যাচিং',
                'desc'=>'দীর্ঘ অপেক্ষা বা জটিল কোনো প্রক্রিয়ার ঝামেলা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই মেন্টর
                খুঁজে পাবেন।'],
                ];
                @endphp

                <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 md:grid md:grid-cols-2 lg:grid-cols-3 md:overflow-x-visible md:pb-0 scroll-smooth"
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach($features as $f)
                    <div class="group relative shrink-0 w-[270px] md:w-auto snap-center overflow-hidden rounded-xl sm:rounded-2xl p-4 sm:p-6
                                transition-all duration-500 hover:-translate-y-2 hover:shadow-xl
                                border border-[#ccecee] dark:border-[#172f33] dark:max-sm:border-[#1A9998]/50"
                        style="background: var(--mc-surface); box-shadow: var(--mc-shadow-sm);">

                        {{-- Top color bar on hover --}}
                        <div class="absolute left-0 right-0 top-0 h-0.5 rounded-t-2xl opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                            style="background: linear-gradient(90deg, {{ $f['cf'] }}, {{ $f['ct'] }});"></div>

                        <div class="space-y-3 sm:space-y-4">
                            <div class="flex h-11 w-11 sm:h-14 sm:w-14 items-center justify-center rounded-xl sm:rounded-2xl shadow-md transition-all duration-500 group-hover:scale-110 group-hover:rotate-3"
                                style="background: linear-gradient(135deg, {{ $f['cf'] }}, {{ $f['ct'] }}); box-shadow: 0 6px 18px {{ $f['cf'] }}30;">
                                <img src="{{ asset('images/Home Page/' . $f['icon']) }}" alt="{{ $f['title'] }}"
                                    class="h-6 w-6 sm:h-8 sm:w-8 object-contain" />
                            </div>

                            <h3 class="text-sm sm:text-base font-bold leading-snug" style="color: var(--mc-text);">{{
                                $f['title']
                                }}</h3>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted);">{{
                                $f['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════
        JOIN AS MENTOR SECTION
        ═══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden py-12 sm:py-24 transition-colors duration-300"
            style="background-color: var(--mc-surface);">

            {{-- Decorative shapes --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -right-32 -top-32 h-[400px] w-[400px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.1), transparent 70%); filter: blur(50px);">
                </div>
                <div class="absolute -bottom-20 left-1/4 h-[300px] w-[300px] rounded-full"
                    style="background: radial-gradient(circle, rgba(21,86,101,0.08), transparent 70%); filter: blur(50px);">
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                {{-- Heading --}}
                <div class="mb-8 sm:mb-12 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">মেন্টর
                        হোন</p>
                    <div class="mx-auto h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, var(--mc-primary), var(--mc-sage));"></div>
                </div>

                <div class="grid items-center gap-8 sm:gap-14 lg:grid-cols-2">

                    {{-- LEFT --}}
                    <div
                        class="flex flex-col items-center sm:items-start text-center sm:text-left space-y-5 sm:space-y-7">
                        <h2 class="text-xl sm:text-3xl font-extrabold leading-tight tracking-tight lg:text-4xl"
                            style="color: var(--mc-text);">
                            আমাদের
                            <span
                                style="background: linear-gradient(135deg, var(--mc-primary), var(--mc-sage)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                মেন্টর হিসেবে
                            </span>
                            <br />যুক্ত হোন এবং ঘরে বসে উপার্জন করুন
                        </h2>

                        <div class="space-y-2 sm:space-y-3 max-w-xl mx-auto sm:mx-0">
                            <p class="text-sm sm:text-base leading-relaxed" style="color: var(--mc-text-muted);">
                                পড়াতে ভালোবাসেন? টিউশনি করানোর সুযোগ অথবা উপযুক্ত সময় মিলছেনা? কিংবা ঘরের বাইরে
                                টিউশনি করানো কষ্টসাধ্য?
                            </p>
                            <p class="text-sm sm:text-base leading-relaxed" style="color: var(--mc-text-muted);">
                                MentorChai এর সাথে যুক্ত হোন মেন্টর হিসেবে। নিজের সুবিধামতো সময় অনুযায়ী দিন কিংবা রাত
                                যেকোনো
                                সময়ে মেন্টরশিপ প্রদান করুন। দেশব্যাপী শিক্ষার্থীদের সাথে সংযুক্ত হয়ে ঘরে বসেই অর্থ
                                উপার্জন করুন।
                            </p>
                        </div>

                        {{-- Perks --}}
                        <div class="grid grid-cols-2 gap-2 sm:gap-3 w-full max-w-md">
                            @foreach(['ফ্লেক্সিবল স্কেডিউল', 'ঘরে বসে আয়', 'দ্রুত পেমেন্ট', 'যেকোনো বিষয়'] as $perk)
                            <div class="group flex items-center gap-2 sm:gap-2.5 rounded-lg sm:rounded-xl px-2.5 py-2 sm:px-4 sm:py-3"
                                style="background: var(--mc-surface); border: 1.5px solid var(--mc-primary); box-shadow: 0 4px 12px rgba(26,153,152,0.15);">
                                <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full transition-transform duration-300 group-hover:scale-110"
                                    style="background: rgba(26,153,152,0.12);">
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"
                                            stroke="var(--mc-primary)" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold" style="color: var(--mc-text-sub);">{{
                                    $perk
                                    }}</span>
                            </div>
                            @endforeach
                        </div>

                        <a href="{{ route('terms') }}"
                            class="inline-flex items-center justify-center gap-2 sm:gap-3 rounded-xl sm:rounded-2xl px-5 py-3 sm:px-8 sm:py-4 text-sm sm:text-base font-bold text-white border border-black transition-all duration-500 ease-in-out hover:-translate-y-2 hover:shadow-2xl w-full sm:w-auto"
                            style="background: linear-gradient(135deg, var(--mc-primary), var(--mc-sage)); box-shadow: 0 8px 28px rgba(40,102,110,0.3);">
                            বিস্তারিত জানতে এখানে ক্লিক করুন
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    {{-- RIGHT IMAGE --}}
                    <div class="relative flex justify-center lg:justify-end mt-4 lg:mt-0">
                        <div class="absolute inset-4 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(40,102,110,0.15), transparent 70%); filter: blur(40px);">
                        </div>

                        <div class="relative w-full max-w-[260px] sm:max-w-md mx-auto sm:mx-0">
                            <img src="{{ asset('images/Home Page/mentor-earning.png') }}"
                                alt="Mentor teaching from home"
                                class="relative w-full rounded-3xl transition-all duration-500 hover:scale-[1.01]"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: var(--mc-shadow-lg), 0 4px 16px rgba(0,0,0,0.06);" />

                            {{-- Badge --}}
                            <div class="absolute right-2 -top-3 sm:-right-4 sm:-top-4 flex items-center gap-1.5 sm:gap-2.5 rounded-xl sm:rounded-2xl px-3 py-2 sm:px-4 sm:py-3 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="h-2.5 w-2.5 animate-pulse rounded-full" style="background: #f59e0b;"></div>
                                <span class="text-xs sm:text-sm font-bold" style="color: var(--mc-primary);">ঘরে বসে
                                    আয়</span>
                            </div>

                            {{-- Earnings card --}}
                            <div class="absolute -bottom-4 left-2 sm:-bottom-5 sm:-left-4 rounded-xl sm:rounded-2xl px-3.5 py-2.5 sm:px-5 sm:py-3.5 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <p class="text-xs" style="color: var(--mc-text-muted);">এই মাসে উপার্জন</p>
                                <p class="text-base sm:text-xl font-extrabold" style="color: var(--mc-primary);">৳
                                    ১২,৫০০</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>



    {{-- Carousel script --}}
    <script>
        let scrollPos = 0;
        const container = document.getElementById('cardsContainer');
        const wrapper   = document.getElementById('scrollContainer');
        const getCardWidth = () => window.innerWidth < 640 ? 192 : 280;

        document.getElementById('scrollRight').addEventListener('click', () => {
            const max = container.scrollWidth - wrapper.offsetWidth;
            scrollPos = Math.min(scrollPos + getCardWidth(), max);
            container.style.transform = `translateX(-${scrollPos}px)`;
        });

        document.getElementById('scrollLeft').addEventListener('click', () => {
            scrollPos = Math.max(scrollPos - getCardWidth(), 0);
            container.style.transform = `translateX(-${scrollPos}px)`;
        });
    </script>
</x-layout>
