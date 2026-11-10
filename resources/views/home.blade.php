<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- ═══════════════════════════════════════════
        HERO SECTION  —  Immersive animated hero
        ═══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden" style="background-color: var(--mc-bg);">

            {{-- ── Grid pattern overlay ── --}}
            <div class="hero-grid-pattern pointer-events-none absolute inset-0 z-0 opacity-40"></div>

            {{-- ── Animated glowing blobs (adapt to light/dark via CSS vars) ── --}}
            <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden">
                <div class="hero-animate-float absolute -top-20 -right-20 h-[400px] w-[400px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.18), transparent 65%); filter: blur(70px);"></div>
                <div class="hero-animate-float-rev absolute -bottom-32 -left-32 h-[500px] w-[500px] rounded-full"
                    style="background: radial-gradient(circle, rgba(21,86,101,0.14), transparent 65%); filter: blur(80px);"></div>
                <div class="hero-animate-float hero-delay-500 absolute top-1/2 left-1/2 h-[300px] w-[300px] -translate-x-1/2 -translate-y-1/2 rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.09), transparent 65%); filter: blur(60px);"></div>
            </div>

            {{-- ── Animated particles ── --}}
            <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden">
                <span class="hero-particle hero-animate-particle" style="width:6px;height:6px;top:12%;left:8%;animation-delay:0s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:4px;height:4px;top:28%;left:18%;animation-delay:1.2s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:5px;height:5px;top:55%;left:5%;animation-delay:2.1s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:7px;height:7px;top:75%;left:22%;animation-delay:0.6s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:4px;height:4px;top:18%;left:88%;animation-delay:1.8s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:6px;height:6px;top:65%;left:92%;animation-delay:0.3s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:3px;height:3px;top:40%;left:95%;animation-delay:2.5s;"></span>
                <span class="hero-particle hero-animate-particle" style="width:5px;height:5px;top:85%;left:72%;animation-delay:1.0s;"></span>
            </div>

            {{-- ── Floating pen and paper doodles ── --}}
            <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
                @php
                    $doodlePaths = [
                        'academic-cap' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',
                        'computer-desktop' => 'M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25',
                        'video-camera' => 'M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z',
                        'chat-bubble' => 'M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155',
                        'light-bulb' => 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18',
                        'play-circle' => 'M21 12a9 9 0 11-18 0 9 9 0 0118 0z M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z',
                        'wifi' => 'M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z',
                        'check-badge' => 'M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z',
                    ];
                    $heroDoodles = [
                        ['path' => 'M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10', 'pos' => 'top:9%;left:3%;', 'size' => 44, 'rot' => -12, 'duration' => 9, 'delay' => 0, 'opacity' => '.20', 'm' => ['top' => '3%', 'left' => '4%', 's' => 26]],
                        ['path' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z', 'pos' => 'top:6%;left:46%;', 'size' => 38, 'rot' => 10, 'duration' => 11, 'delay' => 1.2, 'opacity' => '.16', 'alt' => true],
                        ['path' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25', 'pos' => 'top:62%;left:44%;', 'size' => 50, 'rot' => -8, 'duration' => 10, 'delay' => .6, 'opacity' => '.16', 'md' => true],
                        ['path' => 'M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125', 'pos' => 'top:80%;left:7%;', 'size' => 36, 'rot' => 18, 'duration' => 8.5, 'delay' => 2, 'opacity' => '.18', 'alt' => true, 'md' => true],
                        ['path' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z', 'pos' => 'top:12%;right:5%;', 'size' => 46, 'rot' => -14, 'duration' => 12, 'delay' => .8, 'opacity' => '.18'],
                        ['path' => 'M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10', 'pos' => 'top:72%;right:4%;', 'size' => 40, 'rot' => 8, 'duration' => 9.5, 'delay' => 1.6, 'opacity' => '.18', 'alt' => true, 'm' => ['top' => '70%', 'right' => '3%', 's' => 26]],
                        ['path' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25', 'pos' => 'top:42%;right:1.5%;', 'size' => 42, 'rot' => -6, 'duration' => 13, 'delay' => 2.4, 'opacity' => '.14', 'md' => true],
                        ['path' => $doodlePaths['computer-desktop'], 'pos' => 'top:34%;left:2%;', 'size' => 48, 'rot' => -6, 'duration' => 10.5, 'delay' => .9, 'opacity' => '.16', 'm' => ['top' => '22%', 'left' => '2%', 's' => 28]],
                        ['path' => $doodlePaths['video-camera'], 'pos' => 'top:4%;right:30%;', 'size' => 42, 'rot' => 8, 'duration' => 9, 'delay' => 1.4, 'opacity' => '.16', 'alt' => true, 'live' => true, 'm' => ['top' => '6%', 'right' => '5%', 's' => 28]],
                        ['path' => $doodlePaths['academic-cap'], 'pos' => 'top:88%;left:30%;', 'size' => 52, 'rot' => -10, 'duration' => 12, 'delay' => .3, 'opacity' => '.16', 'md' => true, 'm' => ['top' => '86%', 'left' => '4%', 's' => 28]],
                        ['path' => $doodlePaths['light-bulb'], 'pos' => 'top:55%;right:12%;', 'size' => 36, 'rot' => 12, 'duration' => 8, 'delay' => 2.2, 'opacity' => '.18', 'alt' => true, 'md' => true, 'm' => ['top' => '38%', 'right' => '3%', 's' => 24]],
                        ['path' => $doodlePaths['chat-bubble'], 'pos' => 'top:90%;right:24%;', 'size' => 44, 'rot' => -8, 'duration' => 11, 'delay' => 1.1, 'opacity' => '.16', 'md' => true],
                        ['path' => $doodlePaths['play-circle'], 'pos' => 'top:70%;left:25%;', 'size' => 40, 'rot' => 6, 'duration' => 9.5, 'delay' => 1.9, 'opacity' => '.16', 'alt' => true, 'md' => true],
                        ['path' => $doodlePaths['wifi'], 'pos' => 'top:16%;left:20%;', 'size' => 36, 'rot' => 0, 'duration' => 7, 'delay' => .5, 'opacity' => '.18', 'pulse' => true, 'md' => true, 'm' => ['top' => '54%', 'left' => '3%', 's' => 24]],
                        ['path' => $doodlePaths['check-badge'], 'pos' => 'top:55%;left:14%;', 'size' => 38, 'rot' => 10, 'duration' => 10, 'delay' => 1.3, 'opacity' => '.16', 'alt' => true, 'md' => true],
                    ];
                @endphp
                @foreach ($heroDoodles as $doodle)
                    <span class="hero-doodle{{ !empty($doodle['alt']) ? ' hero-doodle--alt' : '' }}{{ !empty($doodle['md']) ? ' hidden md:block' : '' }}{{ !empty($doodle['live']) ? ' hero-doodle--live' : '' }}{{ !empty($doodle['pulse']) ? ' hero-doodle--pulse' : '' }}{{ !empty($doodle['m']) ? ' hero-doodle--m' : '' }}" style="{{ $doodle['pos'] }}--s:{{ $doodle['size'] }}px;--r:{{ $doodle['rot'] }}deg;--t:{{ $doodle['duration'] }}s;--d:{{ $doodle['delay'] }}s;--o:{{ $doodle['opacity'] }};{{ !empty($doodle['m']) ? '--m-top:' . $doodle['m']['top'] . ';--m-' . (isset($doodle['m']['left']) ? 'left' : 'right') . ':' . ($doodle['m']['left'] ?? $doodle['m']['right']) . ';--m-s:' . $doodle['m']['s'] . 'px;' : '' }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $doodle['path'] }}" /></svg></span>
                @endforeach
                <span class="hero-doodle hero-doodle-write hero-doodle--alt hidden md:block" style="top:50%;left:47%;--s:110px;--r:-4deg;--t:10s;--d:0.4s;--o:.22;"><svg viewBox="0 0 96 32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path pathLength="100" d="M2 22 C 10 6, 18 30, 26 16 S 42 6, 50 18 S 62 26, 68 18" /><g transform="translate(68 2) scale(1)"><path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></g></svg></span>
            </div>

            {{-- ── Spinning decorative ring (top-right corner) ── --}}
            <div class="pointer-events-none absolute -top-16 -right-16 z-0 opacity-10 hidden lg:block">
                <div class="hero-animate-spin-slow h-[320px] w-[320px] rounded-full"
                    style="border: 2px dashed rgba(26,153,152,0.6);"></div>
            </div>
            <div class="pointer-events-none absolute -bottom-20 -left-20 z-0 opacity-10 hidden lg:block">
                <div class="hero-animate-spin-slow h-[260px] w-[260px] rounded-full"
                    style="border: 2px dashed rgba(26,153,152,0.5); animation-direction: reverse;"></div>
            </div>

            {{-- ── MAIN CONTENT ── --}}
            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-16 pb-10 sm:pt-24 sm:pb-16 lg:pt-28 lg:pb-20">
                <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">

                    {{-- ══ LEFT: Text content ══ --}}
                    <div class="flex flex-col items-center sm:items-start text-center sm:text-left space-y-6 sm:space-y-8">

                        {{-- Live badge --}}
                        <div class="hero-animate-bounce-in hero-delay-100 inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs sm:text-sm font-bold tracking-wide"
                            style="background: color-mix(in srgb, var(--mc-primary) 12%, transparent); border: 1.5px solid color-mix(in srgb, var(--mc-primary) 35%, transparent); color: var(--mc-primary);">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"
                                    style="background: var(--mc-primary);"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full"
                                    style="background: #4ade80;"></span>
                            </span>
                            পরীক্ষার আগে শেষ মুহূর্তের সহায়তা • এখনই পাওয়া যাচ্ছে
                        </div>

                        {{-- Main heading --}}
                        <div class="space-y-2 sm:space-y-3">
                            <h1 class="hero-animate-slide-up hero-delay-200 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.12] tracking-tight"
                                style="color: var(--mc-text);">
                                জরুরি মুহূর্তে হঠাৎ
                            </h1>
                            <h1 class="hero-animate-slide-up hero-delay-300 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.12] tracking-tight">
                                <span class="hero-text-shimmer">শিক্ষকের সাহায্য</span>
                                <span style="color: var(--mc-text);"> প্রয়োজন?</span>
                            </h1>
                            <h1 class="hero-animate-slide-up hero-delay-400 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-[1.15] tracking-tight"
                                style="color: var(--mc-primary);">
                                MentorChai আছে আপনার সাথে
                            </h1>
                        </div>

                        {{-- Subtext --}}
                        <p class="hero-animate-slide-up hero-delay-500 max-w-xl text-sm sm:text-base lg:text-lg leading-relaxed"
                            style="color: var(--mc-text-muted);">
                            পরীক্ষার আগের রাতে হঠাৎ Calculus বুঝতে অসুবিধা হচ্ছে? কিংবা Binary Search Algorithm?
                            শুধুমাত্র Kirchhoff's Laws বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>

                        {{-- Mobile image placement: keep it directly after the hero description. --}}
                        <div class="hero-animate-float relative w-full max-w-[300px] sm:max-w-[420px] mx-auto lg:hidden">
                            <div class="relative rounded-3xl overflow-hidden"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: 0 0 0 4px color-mix(in srgb, var(--mc-primary) 10%, transparent), 0 32px 80px rgba(26,153,152,0.18), 0 8px 24px rgba(0,0,0,0.08);">
                                <img src="{{ asset('images/Home Page/Homepagetop.jpg') }}"
                                    alt="Mentorship session"
                                    class="relative w-full object-cover"
                                    style="max-height: 460px;" />
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="hero-animate-slide-up hero-delay-600 flex flex-col sm:flex-row gap-3 sm:gap-4 w-full max-w-sm sm:max-w-none">
                            <a href="{{ route('mentors') }}"
                                class="hero-cta-glow inline-flex items-center justify-center gap-2 rounded-2xl px-6 py-3.5 sm:px-8 sm:py-4 text-sm sm:text-base font-bold text-white shadow-2xl">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                এখনই শিক্ষক খুঁজুন
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-2xl px-6 py-3.5 sm:px-8 sm:py-4 text-sm sm:text-base font-semibold transition-all duration-300 hover:-translate-y-1"
                                style="border: 1.5px solid color-mix(in srgb, var(--mc-primary) 40%, transparent); color: var(--mc-primary); background: var(--mc-surface);">
                                কীভাবে কাজ করে?
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </div>

                        {{-- Trust pills --}}
                        <div class="hero-animate-fade-in hero-delay-800 flex flex-wrap justify-center sm:justify-start gap-2 sm:gap-3">
                            @php
                            $trustPills = [
                                ['icon' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', 'text' => '২৪/৭ সাপোর্ট'],
                                ['icon' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', 'text' => 'সাশ্রয়ী মূল্য'],
                                ['icon' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>', 'text' => 'টপিক ভিত্তিক'],
                                ['icon' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>', 'text' => 'যাচাইকৃত মেন্টর'],
                            ];
                            @endphp
                            @foreach($trustPills as $pill)
                            <div class="flex cursor-pointer items-center gap-1.5 rounded-full px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold transition-all duration-300 hover:scale-105 hover:shadow-md"
                                style="background: color-mix(in srgb, var(--mc-primary) 10%, var(--mc-surface)); border: 1.5px solid color-mix(in srgb, var(--mc-primary) 30%, transparent); color: var(--mc-primary);">
                                {!! $pill['icon'] !!}
                                <span>{{ $pill['text'] }}</span>
                            </div>
                            @endforeach
                        </div>

                        {{-- Stats row --}}
                        <div class="hero-animate-fade-in hero-delay-900 flex flex-wrap justify-center sm:justify-start gap-6 sm:gap-10 pt-3 border-t w-full"
                            style="border-color: var(--mc-border-teal-sub);">
                            @php
                            $stats = [
                                ['num' => '৫০০+', 'label' => 'যাচাইকৃত মেন্টর'],
                                ['num' => '৯৮%',  'label' => 'সন্তুষ্টির হার'],
                                ['num' => '৩০+',  'label' => 'বিষয় উপলব্ধ'],
                            ];
                            @endphp
                            @foreach($stats as $stat)
                            <div class="flex flex-col items-center sm:items-start">
                                <span class="text-xl sm:text-2xl font-extrabold leading-tight"
                                    style="color: var(--mc-primary);">{{ $stat['num'] }}</span>
                                <span class="text-[11px] sm:text-xs font-medium"
                                    style="color: var(--mc-text-muted);">{{ $stat['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- ══ RIGHT: Floating card visual ══ --}}
                    <div class="hidden lg:flex relative justify-center lg:justify-end mt-6 lg:mt-0">

                        {{-- Glow behind card --}}
                        <div class="absolute inset-6 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(26,153,152,0.2), transparent 70%); filter: blur(50px);">
                        </div>

                        {{-- Main image card --}}
                        <div class="hero-animate-float relative w-full max-w-[300px] sm:max-w-[420px] lg:max-w-none mx-auto">
                            <div class="relative rounded-3xl overflow-hidden"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: 0 0 0 4px color-mix(in srgb, var(--mc-primary) 10%, transparent), 0 32px 80px rgba(26,153,152,0.18), 0 8px 24px rgba(0,0,0,0.08);">
                                <img src="{{ asset('images/Home Page/Homepagetop.jpg') }}"
                                    alt="Mentorship session"
                                    class="relative w-full object-cover"
                                    style="max-height: 460px;" />
                            </div>

                            {{-- Floating rating badge --}}
                            <div class="hero-animate-bounce-in hero-delay-700 absolute -bottom-5 -left-4 sm:-bottom-8 sm:-left-8 flex items-center gap-3 rounded-2xl px-4 py-3 shadow-2xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl flex-shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-extrabold" style="color: var(--mc-primary);">4.9 ★ রেটিং</p>
                                    <p class="text-[11px] font-medium" style="color: var(--mc-text-muted);">যাচাইকৃত মেন্টরদের দ্বারা</p>
                                </div>
                            </div>

                            {{-- Online indicator badge --}}
                            <div class="hero-animate-bounce-in hero-delay-800 absolute -top-4 -right-2 sm:-top-6 sm:-right-6 flex items-center gap-2 rounded-xl px-3 py-2 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <span class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"
                                        style="background: #4ade80;"></span>
                                    <span class="relative inline-flex h-3 w-3 rounded-full"
                                        style="background: #4ade80;"></span>
                                </span>
                                <span class="text-xs font-bold" style="color: var(--mc-primary);">৩২ জন অনলাইন</span>
                            </div>

                            {{-- Session card (floating top-left) --}}
                            <div class="hero-animate-float-rev hero-delay-300 absolute -top-6 left-4 sm:-top-10 sm:left-2 items-center gap-2.5 rounded-2xl px-3.5 py-2.5 shadow-xl hidden sm:flex"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.361a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[11px] font-bold" style="color: var(--mc-primary);">লাইভ সেশন</p>
                                    <p class="text-[10px]" style="color: var(--mc-text-muted);">এখনই শুরু করুন</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ── SVG wave at the bottom ── --}}
            <div class="absolute bottom-0 left-0 right-0 z-10 overflow-hidden leading-none" style="height: 60px;">
                <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-full"
                    style="display:block;">
                    <path d="M0,40 C360,80 1080,0 1440,40 L1440,60 L0,60 Z"
                        style="fill: var(--mc-bg);"></path>
                </svg>
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
                                            <img src="{{ media_url($mentor['avatar']) }}"
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
