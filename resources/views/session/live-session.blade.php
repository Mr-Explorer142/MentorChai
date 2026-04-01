<x-layout>
    <div class="min-h-screen p-4 md:p-8"
        style="background: linear-gradient(160deg, #f0fafa 0%, #e8f7f6 50%, #f0fafa 100%);">

        {{-- ── Page Header ── --}}
        <div class="mb-6">
            <p class="text-xs font-bold uppercase tracking-widest mb-1" style="color:#1A9998;">সক্রিয় সেশন</p>
            <h1 class="text-2xl font-extrabold" style="color:#0d3d3d;">লাইভ মেন্টরিং সেশন</h1>
            <div class="flex items-center gap-2 mt-2">
                <span class="text-sm font-semibold" style="color:rgba(21,86,101,0.6);">Topic :</span>
                <span class="text-sm font-bold px-3 py-0.5 rounded-full"
                    style="background: rgba(26,153,152,0.1); color:#155665; border:1px solid rgba(26,153,152,0.2);">
                    Laravel Authentication &amp; Authorization
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            {{-- ══════════ MAIN VIDEO AREA ══════════ --}}
            <div class="lg:col-span-8 space-y-5">

                {{-- Live Video Card --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm"
                    style="border: 1px solid rgba(26,153,152,0.15); box-shadow: 0 4px 20px rgba(26,153,152,0.08);">

                    {{-- Video area --}}
                    <div class="relative">
                        <div class="aspect-video rounded-t-2xl flex items-center justify-center"
                            style="background: linear-gradient(135deg, #0d2137, #0a2e2e);">
                            {{-- Placeholder icon --}}
                            <div class="flex flex-col items-center gap-3 opacity-40">
                                <svg class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                                <span class="text-white text-sm font-medium">Live Video Stream</span>
                            </div>
                        </div>

                        {{-- LIVE badge --}}
                        <div class="absolute top-4 left-4 flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold text-white"
                            style="background: rgba(239,68,68,0.9); backdrop-filter: blur(8px);">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                            LIVE
                        </div>

                        {{-- Controls --}}
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-3">
                            {{-- Mic --}}
                            <button
                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                style="background: rgba(255,255,255,0.15); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.2);">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                                </svg>
                            </button>

                            {{-- Camera --}}
                            <button
                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                style="background: rgba(255,255,255,0.15); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.2);">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </button>

                            {{-- Leave --}}
                            <button
                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                style="background: rgba(239,68,68,0.85); backdrop-filter:blur(8px);">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Session meta --}}
                    <div class="px-5 py-4 flex flex-wrap justify-between items-center gap-3">
                        <div>
                            <p class="font-bold" style="color:#0d3d3d;">Laravel Auth Deep Dive</p>
                            <p class="text-sm mt-0.5" style="color:rgba(21,86,101,0.6);">Started at 10:00 AM · Duration:
                                1h 30m</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold"
                            style="background: rgba(26,153,152,0.1); color:#1A9998; border:1px solid rgba(26,153,152,0.25);">
                            32 Participants
                        </span>
                    </div>
                </div>

                {{-- Mentor Info --}}
                <div class="bg-white rounded-2xl px-5 py-5 shadow-sm" style="border: 1px solid rgba(26,153,152,0.15);">
                    <div class="flex flex-col sm:flex-row gap-4 items-center sm:items-start">
                        <div class="avatar placeholder shrink-0">
                            <div class="w-16 rounded-full font-bold text-2xl grid place-items-center text-white"
                                style="background: linear-gradient(135deg, #1A9998, #155665);">M</div>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <p class="font-bold text-lg" style="color:#0d3d3d;">Mahmud Hasan</p>
                            <p class="text-sm" style="color:rgba(21,86,101,0.6);">Senior Laravel Mentor</p>
                            <p class="text-sm mt-2" style="color:#4a7070;">8+ years experience in Laravel &amp; system
                                architecture.</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold"
                            style="background: rgba(26,153,152,0.1); color:#1A9998; border:1px solid rgba(26,153,152,0.25);">
                            Host
                        </span>
                    </div>
                </div>

            </div>

            {{-- ══════════ RIGHT SIDEBAR ══════════ --}}
            <div class="lg:col-span-4 space-y-5">

                {{-- Live Chat --}}
                <div class="bg-white rounded-2xl shadow-sm flex flex-col"
                    style="border: 1px solid rgba(26,153,152,0.15); min-height: 340px;">

                    {{-- Chat header --}}
                    <div class="px-5 py-4" style="border-bottom: 1px solid rgba(26,153,152,0.12);">
                        <h2 class="font-bold text-sm" style="color:#0d3d3d;">সরাসরি প্রশ্ন করুন
                            <span class="ml-1 text-xs font-normal" style="color:rgba(21,86,101,0.5);">(Optional
                                feature)</span>
                        </h2>
                    </div>

                    {{-- Messages --}}
                    <div class="flex-1 overflow-y-auto p-4 space-y-4 text-sm">
                        @foreach([
                        ['Ahsan','Sir, can you explain middleware again?',false],
                        ['Mentor','Sure, I\'ll cover it after this example.',true],
                        ['Sara','Is Sanctum better than Passport?',false],
                        ] as $msg)
                        <div class="flex flex-col {{ $msg[2] ? 'items-end' : 'items-start' }}">
                            <p class="text-xs font-bold mb-1 {{ $msg[2] ? 'text-right' : '' }}"
                                style="color:{{ $msg[2] ? '#1A9998' : '#0d3d3d' }};">{{ $msg[0] }}</p>
                            <div class="max-w-[85%] px-3 py-2 rounded-2xl text-sm leading-relaxed
                                        {{ $msg[2] ? 'rounded-tr-sm' : 'rounded-tl-sm' }}"
                                style="{{ $msg[2]
                                    ? 'background: linear-gradient(135deg, #1A9998, #155665); color:white;'
                                    : 'background: rgba(26,153,152,0.07); color:#2d6e6e; border:1px solid rgba(26,153,152,0.12);' }}">
                                {{ $msg[1] }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Input --}}
                    <div class="p-4" style="border-top: 1px solid rgba(26,153,152,0.12);">
                        <div class="flex gap-2">
                            <input type="text" placeholder="মেসেজ লিখুন..."
                                class="input input-sm flex-1 focus:outline-none"
                                style="background:#f7fdfd; border:1px solid rgba(26,153,152,0.25); color:#2d6e6e; border-radius:12px;" />
                            <button class="btn btn-sm gap-1.5 text-white border-0 shrink-0"
                                style="background: linear-gradient(135deg, #1A9998, #155665); border-radius:12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                পাঠান
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Session Details --}}
                <div class="bg-white rounded-2xl px-5 py-5 shadow-sm" style="border: 1px solid rgba(26,153,152,0.15);">
                    <h2 class="font-bold text-sm mb-4" style="color:#0d3d3d;">সেশন বিবরণ</h2>

                    <div class="space-y-2.5 pt-4" style="border-top: 1px solid rgba(26,153,152,0.1);">
                        @foreach([
                        ['Topic','Laravel Authentication'],
                        ['Date','15 Jan 2026'],
                        ['Time','10:00 AM – 11:30 AM'],
                        ['Level','Intermediate'],
                        ] as $detail)
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold w-14 shrink-0" style="color:rgba(21,86,101,0.5);">{{
                                $detail[0] }}</span>
                            <span class="text-sm font-medium" style="color:#2d6e6e;">{{ $detail[1] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <button
                        class="mt-5 flex items-center gap-2 w-full justify-center py-2.5 rounded-xl text-sm font-semibold transition-all hover:-translate-y-0.5"
                        style="border: 1.5px solid rgba(26,153,152,0.35); color:#1A9998; background:rgba(26,153,152,0.05);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12M12 16.5V3" />
                        </svg>
                        রিসোর্স ডাউনলোড করুন
                    </button>
                </div>

            </div>
        </div>

        {{-- ══════════ REVIEW SECTION ══════════ --}}
        <div class="mt-8">
            <div class="bg-white rounded-2xl shadow-sm max-w-2xl mx-auto overflow-hidden"
                style="border: 1px solid rgba(26,153,152,0.15);">

                {{-- Top accent --}}
                <div class="h-1" style="background: linear-gradient(90deg, #1A9998, #155665);"></div>

                <div class="p-7 space-y-6">

                    {{-- Header --}}
                    <div>
                        <h2 class="text-lg font-bold" style="color:#0d3d3d;">রিভিউ সাবমিট করুন</h2>
                        <p class="text-sm mt-1" style="color:rgba(21,86,101,0.6);">সেশন সম্পর্কে আপনার মতামত শেয়ার করুন
                        </p>
                    </div>

                    <form method="POST" action="#" class="space-y-5">
                        @csrf

                        {{-- Rating --}}
                        <div>
                            <label class="block text-sm font-bold mb-2" style="color:#155665;">আপনার রেটিং</label>
                            <div class="rating rating-lg">
                                <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-warning" />
                            </div>
                        </div>

                        {{-- Comment --}}
                        <div>
                            <label class="block text-sm font-bold mb-2" style="color:#155665;">বিস্তারিত লিখুন</label>
                            <textarea class="textarea w-full resize-none text-sm focus:outline-none" rows="4"
                                name="comment" placeholder="সেশন সম্পর্কে আপনার মতামত শেয়ার করুন..."
                                style="background:#f7fdfd; border:1px solid rgba(26,153,152,0.25); color:#2d6e6e; border-radius:14px;"></textarea>
                        </div>

                        {{-- Submit --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white transition-all hover:-translate-y-0.5"
                                style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 4px 14px rgba(26,153,152,0.3);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0l-4.725 2.885a.562.562 0 01-.84-.61l1.285-5.385a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                রিভিউ দিন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-layout>
