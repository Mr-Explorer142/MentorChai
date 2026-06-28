<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- ══════════════════════════════════════════
        HERO / ABOUT SECTION
        ══════════════════════════════════════════ --}}
        <section class="relative overflow-hidden pt-20 pb-24 px-5 md:px-14">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute -top-32 -right-32 w-96 h-96 rounded-full"
                style="background: radial-gradient(circle, rgba(26,153,143,0.1), transparent 70%); filter: blur(60px);">
            </div>
            <div class="pointer-events-none absolute bottom-0 left-0 w-72 h-72 rounded-full"
                style="background: radial-gradient(circle, rgba(21,86,101,0.08), transparent 70%); filter: blur(50px);">
            </div>

            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                {{-- Text Content --}}
                <div class="space-y-6">
                    <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3"
                        style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                        📚 আমাদের সম্পর্কে
                    </span>

                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold leading-snug"
                        style="color: var(--mc-text); font-family: 'Lora', serif;">
                        পরীক্ষার আগের রাতে হঠাৎ কোনো টপিক বুঝতে অসুবিধা হচ্ছে?
                        <span style="color: var(--mc-primary);">কিছুক্ষণের জন্য একজন শিক্ষকের সহায়তা প্রয়োজন?</span>
                    </h1>

                    <p class="text-lg font-bold" style="color: var(--mc-primary);">
                        এমন পরিস্থিতিতেই পাশে আছে MentorChai...
                    </p>

                    <p class="text-base leading-loose" style="color: var(--mc-text-muted);">
                        গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও
                        <strong style="color: var(--mc-primary);">MentorChai</strong>
                        আপনাকে প্রদান করছে ইন্সট্যান্ট মেন্টরশিপ সুবিধা। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী
                        ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।
                    </p>

                    {{-- Quote block --}}
                    <div class="rounded-2xl p-5 border-l-4"
                        style="background: var(--mc-surface); border-left-color: var(--mc-primary); border-top: 1px solid var(--mc-border-teal-sub); border-right: 1px solid var(--mc-border-teal-sub); border-bottom: 1px solid var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                        <p class="text-base leading-loose" style="color: var(--mc-text-muted);">
                            পরীক্ষার আগের রাতে হঠাৎ
                            <strong style="color: var(--mc-primary);">Calculus</strong> বুঝতে অসুবিধা হচ্ছে? কিংবা
                            <strong style="color: var(--mc-navy);">Binary Search Algorithm</strong>?
                            শুধুমাত্র <strong style="color: var(--mc-sage);">Kirchhoff's Laws</strong> বুঝতে মাত্র
                            এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?
                        </p>
                        <p class="text-base font-bold mt-3" style="color: var(--mc-primary);">
                            ভয় নেই, MentorChai আছে আপনার সাথে!
                        </p>
                    </div>

                    {{-- Stat chips --}}
                    <div class="grid grid-cols-3 gap-3 pt-2">
                        @foreach([['২৪/৭','সাপোর্ট','var(--mc-primary)'],['১০০+','মেন্টর','#187F87'],['৫০+','টপিক','#155665']]
                        as $stat)
                        <div class="card border text-center py-4 px-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                            <span class="text-2xl font-extrabold" style="color: {{ $stat[2] }};">{{ $stat[0] }}</span>
                            <span class="text-xs mt-1 block" style="color: var(--mc-text-muted);">{{ $stat[1] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Images --}}
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md">
                        <div class="pointer-events-none absolute inset-0 rounded-3xl"
                            style="background: radial-gradient(ellipse, rgba(26,153,143,0.15), transparent 70%); filter: blur(35px);">
                        </div>
                        <img src="{{ asset('images/About Page/edteacher.png') }}" alt="Mentorship session"
                            class="relative w-full rounded-2xl hover:scale-[1.02] transition-transform duration-300"
                            style="box-shadow: var(--mc-shadow-lg); border: 1px solid var(--mc-border-teal);" />
                        <div class="absolute -bottom-7 -right-6 w-2/5 rounded-xl z-10 overflow-hidden hover:scale-105 transition-transform duration-300"
                            style="border: 3px solid var(--mc-surface); box-shadow: var(--mc-shadow-md);">
                            <img src="{{ asset('images/About Page/edtec.png') }}" alt="Online teaching"
                                class="w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════
        FEATURES SECTION
        ══════════════════════════════════════════ --}}
        <section class="py-20 transition-colors duration-300"
            style="background: linear-gradient(180deg, var(--mc-surface) 0%, var(--mc-bg) 100%);">
            <div class="max-w-6xl mx-auto px-5">

                <div class="text-center mb-14">
                    <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3 mb-4"
                        style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                        কেন MentorChai
                    </span>
                    <h2 class="text-2xl lg:text-4xl font-extrabold mt-3 mb-3"
                        style="color: var(--mc-text); font-family: 'Lora', serif;">
                        আমাদের
                        <span
                            style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            সুবিধাসমূহ
                        </span>
                    </h2>
                    <div class="mx-auto h-1 w-14 rounded-full mb-4"
                        style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                    
                </div>

                @php
                $features = [
                ['icon'=>'payasyougo.png', 'cf'=>'#1A9998', 'ct'=>'#187F87',
                'title'=>'যতটুকু সময়, ঠিক ততটুকুর খরচ',
                'desc'=>'৩০, ৪৫ বা ৬০ মিনিটের জন্য মেন্টর বুক করুন এবং শুধুমাত্র সেটুকু সময়ের জন্যই ফি প্রদান করুন।
                মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।'],
                ['icon'=>'cheap.png', 'cf'=>'#187F87', 'ct'=>'#155665',
                'title'=>'সাধ্যের ভেতরে সাশ্রয়ী সেশন',
                'desc'=>'ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম সময়ের
                সেশন হওয়ায় খরচও একদম হাতের নাগালে।'],
                ['icon'=>'topic.png', 'cf'=>'#155665', 'ct'=>'#102E3C',
                'title'=>'পুরো কোর্স নয়, নির্দিষ্ট টপিক',
                'desc'=>'ঠিক যে টপিকটিতে আপনার সমস্যা রয়েছে, শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে
                পারবেন।'],
                ['icon'=>'24-hours-support.png', 'cf'=>'#102E3C', 'ct'=>'#155665',
                'title'=>'২৪/৭ মেন্টরশিপ',
                'desc'=>'গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত - যেকোনো সময়েই সাহায্য নিতে পারবেন মেন্টরদের।'],
                ['icon'=>'flexibleincome.png', 'cf'=>'#1A9998', 'ct'=>'#102E3C',
                'title'=>'মেন্টরদের ফ্লেক্সিবল শিডিউল',
                'desc'=>'বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা অবসর সময়ে মেন্টর হিসেবে ঘরে বসেই অর্থ উপার্জন করতে
                পারবেন।'],
                ['icon'=>'findteacher.png', 'cf'=>'#187F87', 'ct'=>'#1A9998',
                'title'=>'দ্রুততম সময়ে মেন্টর ম্যাচিং',
                'desc'=>'দীর্ঘ অপেক্ষা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই মেন্টর খুঁজে পাবেন।'],
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($features as $f)
                    <div class="card group border relative overflow-hidden cursor-pointer
                                hover:-translate-y-2 hover:shadow-xl transition-all duration-300"
                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">

                        {{-- Top accent bar on hover --}}
                        <div class="absolute top-0 left-0 right-0 h-0.5 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: linear-gradient(90deg, {{ $f['cf'] }}, {{ $f['ct'] }});"></div>

                        {{-- Hover bg tint --}}
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"
                            style="background: linear-gradient(135deg, {{ $f['cf'] }}08, {{ $f['ct'] }}04);"></div>

                        <div class="card-body p-6 relative gap-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-md
                                        group-hover:scale-110 group-hover:rotate-3 transition-all duration-300"
                                style="background: linear-gradient(135deg, {{ $f['cf'] }}, {{ $f['ct'] }}); box-shadow: 0 6px 18px {{ $f['cf'] }}30;">
                                <img src="{{ asset('images/Home Page/' . $f['icon']) }}" alt="{{ $f['title'] }}"
                                    class="w-8 h-8 object-contain" />
                            </div>
                            <h3 class="font-bold text-base leading-snug" style="color: var(--mc-text);">{{ $f['title']
                                }}</h3>
                            <p class="text-sm leading-relaxed" style="color: var(--mc-text-muted);">{{ $f['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════
        TEAM SECTION
        ══════════════════════════════════════════ --}}
        <section class="py-20 pb-28" style="background-color: var(--mc-bg);">
            <div class="max-w-5xl mx-auto px-5">

                <div class="text-center mb-16">
                    
                    <h2 class="text-2xl lg:text-4xl font-bold mt-3"
                        style="color: var(--mc-text); font-family: 'Lora', serif;">
                        
                        <span
                            style="background: linear-gradient(135deg, #1A9998, #155665); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            ডেভেলপার টিম
                        </span>
                    </h2>
                    <div class="mx-auto mt-4 h-1 w-14 rounded-full"
                        style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                    
                </div>

                @php
                $team = [
                ['img'=>'tamim.jpg', 'name'=>'তাহমিদ আলম তামিম', 'role'=>'Bsc in CSE', 'color'=>'#1A9998',
                'li'=>'https://linkedin.com/in/xyz', 'gh'=>'https://github.com/xyz', 'em'=>'xyz@example.com'],
                ['img'=>'adib.jpg', 'name'=>'ওয়াসিফ খাঁন লোদী আদিব', 'role'=>'Bsc in CSE', 'color'=>'#187F87',
                'li'=>'https://linkedin.com/in/abc', 'gh'=>'https://github.com/abc', 'em'=>'abc@example.com'],
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-3xl mx-auto">
                    @foreach($team as $member)
                    <div class="card group border relative overflow-hidden text-center
                                hover:-translate-y-2 hover:shadow-xl transition-all duration-300 cursor-pointer"
                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">

                        {{-- Top accent bar --}}
                        <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl"
                            style="background: linear-gradient(90deg, {{ $member['color'] }}, #102E3C);"></div>

                        <div class="card-body items-center pt-10 pb-8 gap-4">
                            {{-- Avatar --}}
                            <div class="w-28 h-28 rounded-full overflow-hidden border-4 group-hover:scale-105 transition-transform duration-300"
                                style="border-color: {{ $member['color'] }}50; box-shadow: var(--mc-shadow-md);">
                                <img src="{{ asset('images/About Page/' . $member['img']) }}"
                                    alt="{{ $member['name'] }}" class="w-full h-full object-cover" />
                            </div>

                            {{-- Name --}}
                            <h3 class="font-bold text-xl" style="color: var(--mc-text); font-family: 'Lora', serif;">
                                {{ $member['name'] }}
                            </h3>

                            {{-- Role badge --}}
                            <span class="badge text-xs font-bold px-3 py-2"
                                style="background: {{ $member['color'] }}18; color: {{ $member['color'] }}; border: 1px solid {{ $member['color'] }}30;">
                                {{ $member['role'] }}
                            </span>

                            {{-- Divider --}}
                            <div class="w-12 h-px rounded-full" style="background: var(--mc-border-teal);"></div>

                            {{-- Social links --}}
                            <div class="flex justify-center gap-3">
                                {{-- LinkedIn --}}
                                <a href="{{ $member['li'] }}" target="_blank"
                                    class="btn btn-circle btn-sm border hover:border-blue-600 hover:-translate-y-0.5 transition-all duration-200"
                                    style="background: rgba(29,78,216,0.08); border-color: rgba(29,78,216,0.2);">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4 fill-blue-600">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.062-2.065 2.062 2.062 0 114.124 0 2.062 2.062 0 01-2.062 2.065zM6.814 20.452H3.861V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>

                                {{-- GitHub --}}
                                <a href="{{ $member['gh'] }}" target="_blank"
                                    class="btn btn-circle btn-sm border hover:-translate-y-0.5 transition-all duration-200"
                                    style="background: var(--mc-bg); border-color: var(--mc-border);">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4" style="fill: var(--mc-text-sub);">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.469-2.381 1.236-3.221-.123-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.102.814 2.222 0 1.606-.014 2.898-.014 3.293 0 .322.218.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>

                                {{-- Email --}}
                                <a href="mailto:{{ $member['em'] }}"
                                    class="btn btn-circle btn-sm border hover:-translate-y-0.5 transition-all duration-200"
                                    style="background: rgba(185,28,28,0.08); border-color: rgba(185,28,28,0.2);">
                                    <svg class="w-4 h-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</x-layout>
