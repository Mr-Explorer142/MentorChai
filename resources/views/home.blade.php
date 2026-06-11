<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- ═══════════════════════════════════════════
        HERO SECTION
        ═══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden py-28 lg:py-36" style="background-color: var(--mc-bg);">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-32 -right-32 h-[500px] w-[500px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.18), transparent 70%); filter: blur(60px);">
                </div>
                <div class="absolute -bottom-24 -left-24 h-[380px] w-[380px] rounded-full"
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

            <div class="container relative z-10 mx-auto px-6 lg:px-12">
                <div class="grid items-center gap-14 lg:grid-cols-2">

                    {{-- LEFT CONTENT --}}
                    <div class="space-y-8">
                        {{-- Badge --}}
                        <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-sm font-semibold"
                            style="background: rgba(26,153,152,0.12); border: 1px solid rgba(26,153,152,0.3); color: var(--mc-primary);">
                            <span class="h-1.5 w-1.5 animate-pulse rounded-full"
                                style="background: var(--mc-primary);"></span>
                            পরীক্ষার আগে শেষ মুহূর্তের সহায়তা
                        </span>

                        {{-- Heading --}}
                        <h1 class="text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl"
                            style="color: var(--mc-text);">
                            <span
                                style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                জরুরি মূহুর্তে হঠাৎ একজন শিক্ষকের সাহায্য প্রয়োজন?
                            </span>
                            <br />
                            <span style="color: var(--mc-text);">MentorChai আছে আপনার সাথে </span>
                        </h1>

                        {{-- Subtext --}}
                        <p class="max-w-xl text-lg leading-relaxed" style="color: var(--mc-text-muted);">
                            পরীক্ষার আগের রাতে হঠাৎ Calculus বুঝতে অসুবিধা হচ্ছে? কিংবা Binary Search Algorithm? শুধুমাত্র Kirchhoff's Laws বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>

                        {{-- CTA Buttons --}}
                        <div class="flex flex-col gap-4 pt-2 sm:flex-row">
                            <a href="#"
                                class="inline-flex items-center justify-center gap-2 rounded-xl px-7 py-3.5 text-base font-bold text-white shadow-lg transition-all duration-300 hover:-translate-y-0.5"
                                style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,152,0.35);">
                                এখনই শিক্ষক খুঁজুন
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center gap-2 rounded-xl px-7 py-3.5 text-base font-semibold transition-all duration-300 hover:-translate-y-0.5"
                                style="border: 1.5px solid rgba(26,153,152,0.4); color: var(--mc-primary); background: var(--mc-surface);">
                                কীভাবে কাজ করে?
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>

                        {{-- Trust pills --}}
                        <div class="flex flex-wrap gap-5 pt-3">
                            @foreach(['⏱ ২৪/৭ সাপোর্ট', '💸 সাশ্রয়ী', '🎯 টপিক ভিত্তিক'] as $pill)
                            <div class="flex cursor-pointer items-center gap-2 rounded-full px-6 py-3 text-base font-extrabold tracking-wide transition-all duration-300 hover:-translate-y-2 hover:scale-105 hover:shadow-2xl"
                                style="background: linear-gradient(135deg, rgba(26,153,152,0.15), rgba(21,86,101,0.08)); border: 2px solid rgba(26,153,152,0.75); color: var(--mc-primary); box-shadow: 0 4px 20px rgba(26,153,152,0.25);">
                                {{ $pill }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- RIGHT IMAGE --}}
                    <div class="relative flex justify-center lg:justify-end">
                        <div class="absolute inset-4 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(26,153,152,0.2), transparent 70%); filter: blur(40px);">
                        </div>

                        <div class="relative w-full">
                            <img src="{{ asset('images/Home Page/mentorship-session.png') }}" alt="Mentorship session"
                                class="relative w-full rounded-3xl"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: 0 24px 60px rgba(26,153,152,0.15), 0 4px 16px rgba(0,0,0,0.08);" />

                            {{-- Floating rating --}}
                            <div class="absolute -bottom-14 -left-5 flex items-center gap-3 rounded-2xl px-4 py-3 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold" style="color: var(--mc-primary);">4.9 Rated</p>
                                    <p class="text-xs" style="color: var(--mc-text-muted);">Verified Mentors</p>
                                </div>
                            </div>

                            {{-- Online badge --}}
                            <div class="absolute -right-4 -top-6 flex items-center gap-2 rounded-xl px-3 py-2 shadow-lg"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <span class="h-2 w-2 animate-pulse rounded-full"
                                    style="background: var(--mc-online);"></span>
                                <span class="text-xs font-semibold" style="color: var(--mc-primary);">৩২ জন
                                    অনলাইন</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Divider wave --}}
        <div style="line-height:0; background-color: var(--mc-bg);">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                style="width:100%; display:block;">
                <path id="hero-wave" d="M0 60 C360 0 1080 0 1440 60 L1440 0 L0 0 Z" />
            </svg>
        </div>

        {{-- ═══════════════════════════════════════════
        POPULAR TOPICS CAROUSEL
        ═══════════════════════════════════════════ --}}
        <section class="py-24 transition-colors duration-300" style="background-color: var(--mc-bg);">
            <div class="mx-auto max-w-7xl px-6">

                {{-- Heading --}}
                <div class="mb-14 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">
                        এক্সপ্লোর করুন</p>
                    <h2 class="text-3xl font-extrabold tracking-tight lg:text-4xl" style="color: var(--mc-text);">
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
                        <div id="cardsContainer" class="flex gap-6 pb-4 transition-transform duration-500 ease-out"
                            style="width: max-content;">

                            @php
                            $topics = [
                            ['img'=>'cse.png', 'title'=>'Functions & Array in C', 'dept'=>'CSE, SWE',
                            'color'=>'#1A9998'],
                            ['img'=>'eee.png', 'title'=>'KVL & KCL', 'dept'=>'EEE, CSE', 'color'=>'#187F87'],
                            ['img'=>'swe.png', 'title'=>"Dijkstra's Algorithm", 'dept'=>'CSE, SWE', 'color'=>'#155665'],
                            ['img'=>'textile.png', 'title'=>'Fabric Mechanics (Stress-Strain)', 'dept'=>'TE',
                            'color'=>'#1A9998'],
                            ['img'=>'pharmacy.png', 'title'=>'Drug Receptor Interaction Mechanisms', 'dept'=>'Pharmacy',
                            'color'=>'#187F87'],
                            ['img'=>'nfe.png', 'title'=>'Nutrient Bioavailability & Absorption', 'dept'=>'NFE',
                            'color'=>'#155665'],
                            ['img'=>'environmentalsc.png','title'=>'Environmental Fate & Transport of
                            Pollutants','dept'=>'Environmental Science','color'=>'#1A9998'],
                            ];
                            @endphp

                            @foreach($topics as $topic)
                            <div class="group relative w-72 shrink-0 cursor-pointer overflow-hidden rounded-2xl
                                        transition-all duration-500 hover:-translate-y-2"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-md);">

                                {{-- Image --}}
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/Home Page/' . $topic['img']) }}"
                                        alt="{{ $topic['title'] }}"
                                        class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    <div class="absolute inset-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                        style="background: linear-gradient(to top, {{ $topic['color'] }}55, transparent 60%);">
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="space-y-3 p-5">
                                    <h3 class="text-center text-base font-bold leading-snug"
                                        style="color: var(--mc-text);">
                                        {{ $topic['title'] }}
                                    </h3>
                                    <p class="text-center text-xs font-semibold" style="color: {{ $topic['color'] }};">
                                        ডিপার্টমেন্ট: {{ $topic['dept'] }}
                                    </p>
                                    <button
                                        class="w-full rounded-xl py-2.5 text-sm font-bold text-white transition-all duration-300 hover:scale-[1.02] hover:shadow-lg"
                                        style="background: linear-gradient(135deg, {{ $topic['color'] }}, #102E3C); box-shadow: 0 4px 12px {{ $topic['color'] }}30;">
                                        অ্যাভেইলেবল টিচারলিস্ট দেখুন
                                    </button>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    {{-- Scroll buttons --}}
                    <button id="scrollLeft"
                        class="absolute -left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full shadow-xl transition-all duration-300 hover:scale-110"
                        style="background: var(--mc-surface); border: 1.5px solid var(--mc-border-teal); box-shadow: var(--mc-shadow-lg);">
                        <svg class="h-5 w-5" fill="none" stroke="var(--mc-primary)" viewBox="0 0 24 24"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="scrollRight"
                        class="absolute -right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full shadow-xl transition-all duration-300 hover:scale-110"
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
        POPULAR DEPARTMENTS
        ═══════════════════════════════════════════ --}}
        <section class="py-24 transition-colors duration-300"
            style="background: linear-gradient(180deg, var(--mc-surface) 0%, var(--mc-bg) 100%);">

            <div class="relative mx-auto max-w-7xl px-6">

                {{-- Heading --}}
                <div class="mb-14 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">
                        ডিপার্টমেন্ট</p>
                    <h2 class="text-3xl font-extrabold tracking-tight lg:text-4xl" style="color: var(--mc-text);">
                        প্রায়শই অনুসন্ধানকৃত
                        <span
                            style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            ডিপার্টমেন্টসমূহ
                        </span>
                    </h2>
                    <div class="mx-auto mt-4 h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                </div>

                @php
                $departments = [
                ['icon'=>'cseicon.png', 'name'=>'Computer Science & Engineering', 'color'=>'#1A9998'],
                ['icon'=>'eeeicon.png', 'name'=>'Electrical & Electronics Engg.', 'color'=>'#187F87'],
                ['icon'=>'pharmacyicon.png', 'name'=>'Pharmacy', 'color'=>'#155665'],
                ['icon'=>'textileicon.png', 'name'=>'Textile Engineering', 'color'=>'#1A9998'],
                ['icon'=>'sweicon.png', 'name'=>'Software Engineering', 'color'=>'#187F87'],
                ['icon'=>'nfeicon.png', 'name'=>'Nutrition & Food Engineering', 'color'=>'#155665'],
                ];
                @endphp

                <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-6">
                    @foreach($departments as $dept)
                    <div class="group cursor-pointer overflow-hidden rounded-2xl p-6 text-center transition-all duration-500 hover:-translate-y-2 hover:shadow-xl"
                        style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                        <div class="flex flex-col items-center gap-4">
                            <div class="flex h-20 w-20 items-center justify-center rounded-2xl transition-all duration-500 group-hover:scale-110"
                                style="background: {{ $dept['color'] }}18; border: 1.5px solid {{ $dept['color'] }}30;">
                                <img src="{{ asset('images/Home Page/' . $dept['icon']) }}" alt="{{ $dept['name'] }}"
                                    class="h-12 w-12 object-contain drop-shadow" />
                            </div>
                            <h3 class="text-xs font-semibold leading-tight transition-colors duration-300 md:text-sm"
                                style="color: var(--mc-text-sub);">
                                {{ $dept['name'] }}
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════
        FEATURES SECTION
        ═══════════════════════════════════════════ --}}
        <section class="py-24 transition-colors duration-300" style="background-color: var(--mc-bg);">
            <div class="mx-auto max-w-6xl px-6">

                {{-- Heading --}}
                <div class="mb-14 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">কেন
                        আমরা?</p>
                    <h2 class="text-3xl font-extrabold tracking-tight lg:text-4xl" style="color: var(--mc-text);">
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
                'desc'=>'৩০ বা ৬০ মিনিটের জন্য মেন্টর বুক করুন এবং শুধুমাত্র সেটুকু সময়ের জন্যই ফি প্রদান করুন। মাসিক
                সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।'],
                ['icon'=>'cheap.png', 'cf'=>'#187F87', 'ct'=>'#155665',
                'title'=>'সাধ্যের ভেতরে সাশ্রয়ী সেশন',
                'desc'=>'শিক্ষার্থীদের সাধ্যের ব্যাপারটি মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম সময়ের
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

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($features as $f)
                    <div class="group relative cursor-pointer overflow-hidden rounded-2xl p-6
                                transition-all duration-500 hover:-translate-y-2 hover:shadow-xl"
                        style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">

                        {{-- Top color bar on hover --}}
                        <div class="absolute left-0 right-0 top-0 h-0.5 rounded-t-2xl opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                            style="background: linear-gradient(90deg, {{ $f['cf'] }}, {{ $f['ct'] }});"></div>

                        <div class="space-y-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl shadow-md transition-all duration-500 group-hover:scale-110 group-hover:rotate-3"
                                style="background: linear-gradient(135deg, {{ $f['cf'] }}, {{ $f['ct'] }}); box-shadow: 0 6px 18px {{ $f['cf'] }}30;">
                                <img src="{{ asset('images/Home Page/' . $f['icon']) }}" alt="{{ $f['title'] }}"
                                    class="h-8 w-8 object-contain" />
                            </div>

                            <h3 class="text-base font-bold leading-snug" style="color: var(--mc-text);">{{ $f['title']
                                }}</h3>
                            <p class="text-sm leading-relaxed" style="color: var(--mc-text-muted);">{{ $f['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════
        JOIN AS MENTOR SECTION
        ═══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden py-24 transition-colors duration-300"
            style="background: linear-gradient(135deg, var(--mc-surface) 0%, var(--mc-surface-hover) 50%, var(--mc-bg) 100%);">

            {{-- Decorative shapes --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -right-32 -top-32 h-[400px] w-[400px] rounded-full"
                    style="background: radial-gradient(circle, rgba(26,153,152,0.1), transparent 70%); filter: blur(50px);">
                </div>
                <div class="absolute -bottom-20 left-1/4 h-[300px] w-[300px] rounded-full"
                    style="background: radial-gradient(circle, rgba(21,86,101,0.08), transparent 70%); filter: blur(50px);">
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-6">

                {{-- Heading --}}
                <div class="mb-12 text-center">
                    <p class="mb-2 text-sm font-bold uppercase tracking-widest" style="color: var(--mc-primary);">মেন্টর
                        হোন</p>
                    <div class="mx-auto h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, var(--mc-primary), var(--mc-sage));"></div>
                </div>

                <div class="grid items-center gap-14 lg:grid-cols-2">

                    {{-- LEFT --}}
                    <div class="space-y-7">
                        <h2 class="text-3xl font-extrabold leading-tight tracking-tight lg:text-4xl"
                            style="color: var(--mc-text);">
                            যুক্ত হোন আমাদের
                            <span
                                style="background: linear-gradient(135deg, var(--mc-primary), var(--mc-sage)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                মেন্টর হিসেবে
                            </span>
                            <br />এবং ঘরে বসে উপার্জন করুন
                        </h2>

                        <div class="space-y-3">
                            <p class="text-base leading-relaxed" style="color: var(--mc-text-muted);">
                                পড়াতে ভালোবাসেন? টিউশনি করানোর সুযোগ অথবা উপযুক্ত সময় মিলছেনা? কিংবা ঘরের বাইরে
                                টিউশনি করানো কষ্টসাধ্য?
                            </p>
                            <p class="text-base leading-relaxed" style="color: var(--mc-text-muted);">
                                MentorChai এর সাথে যুক্ত হোন মেন্টর হিসেবে। নিজের সুবিধামতো সময় অনুযায়ী দিন কিংবা রাত যেকোনো
                                সময়ে মেন্টরশিপ প্রদান করুন। দেশব্যাপী শিক্ষার্থীদের সাথে সংযুক্ত হয়ে ঘরে বসেই অর্থ
                                উপার্জন করুন।
                            </p>
                        </div>

                        {{-- Perks --}}
                        <div class="grid grid-cols-2 gap-3">
                            @foreach(['ফ্লেক্সিবল স্কেডিউল', 'ঘরে বসে আয়', 'দ্রুত পেমেন্ট', 'যেকোনো বিষয়'] as $perk)
                            <div class="flex items-center gap-2.5 rounded-xl px-4 py-3"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                                <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full"
                                    style="background: rgba(26,153,152,0.12);">
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"
                                            stroke="var(--mc-primary)" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold" style="color: var(--mc-text-sub);">{{ $perk
                                    }}</span>
                            </div>
                            @endforeach
                        </div>

                        <a href="{{ route('terms') }}"
                            class="inline-flex items-center gap-3 rounded-2xl px-8 py-4 text-base font-bold text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl"
                            style="background: linear-gradient(135deg, var(--mc-primary), var(--mc-sage)); box-shadow: 0 8px 28px rgba(40,102,110,0.3);">
                            বিস্তারিত জানতে এখানে ক্লিক করুন
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    {{-- RIGHT IMAGE --}}
                    <div class="relative flex justify-center lg:justify-end">
                        <div class="absolute inset-4 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(40,102,110,0.15), transparent 70%); filter: blur(40px);">
                        </div>

                        <div class="relative w-full max-w-md">
                            <img src="{{ asset('images/Home Page/mentor-earning.png') }}"
                                alt="Mentor teaching from home"
                                class="relative w-full rounded-3xl transition-all duration-500 hover:scale-[1.01]"
                                style="border: 1px solid var(--mc-border-teal); box-shadow: var(--mc-shadow-lg), 0 4px 16px rgba(0,0,0,0.06);" />

                            {{-- Badge --}}
                            <div class="absolute -right-4 -top-4 flex items-center gap-2.5 rounded-2xl px-4 py-3 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <div class="h-2.5 w-2.5 animate-pulse rounded-full" style="background: #f59e0b;"></div>
                                <span class="text-sm font-bold" style="color: var(--mc-primary);">ঘরে বসে আয়</span>
                            </div>

                            {{-- Earnings card --}}
                            <div class="absolute -bottom-5 -left-4 rounded-2xl px-5 py-3.5 shadow-xl"
                                style="background: var(--mc-surface); border: 1px solid var(--mc-border-teal);">
                                <p class="text-xs" style="color: var(--mc-text-muted);">এই মাসে উপার্জন</p>
                                <p class="text-xl font-extrabold" style="color: var(--mc-primary);">৳ ১২,৫০০</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    {{-- Wave color sync script --}}
    <script>
        function syncWave() {
            const isDark = document.documentElement.classList.contains('dark');
            const wavePath = document.getElementById('hero-wave');
            if (wavePath) {
                wavePath.setAttribute('fill', isDark ? '#1a2e3b' : '#e6f7f7');
            }
        }
        syncWave();

        // Watch for dark mode toggle
        const observer = new MutationObserver(syncWave);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    </script>

    {{-- Carousel script --}}
    <script>
        let scrollPos = 0;
        const container = document.getElementById('cardsContainer');
        const wrapper   = document.getElementById('scrollContainer');
        const cardWidth = 312;

        document.getElementById('scrollRight').addEventListener('click', () => {
            const max = container.scrollWidth - wrapper.offsetWidth;
            scrollPos = Math.min(scrollPos + cardWidth, max);
            container.style.transform = `translateX(-${scrollPos}px)`;
        });

        document.getElementById('scrollLeft').addEventListener('click', () => {
            scrollPos = Math.max(scrollPos - cardWidth, 0);
            container.style.transform = `translateX(-${scrollPos}px)`;
        });
    </script>
</x-layout>