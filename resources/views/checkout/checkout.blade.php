<x-layout>
    <div class="min-h-screen flex items-center justify-center p-5 md:p-10 transition-colors duration-300"
        style="background-color: var(--mc-bg);">

        {{-- Subtle grid texture overlay --}}
        <div class="fixed inset-0 pointer-events-none opacity-[0.025]"
            style="background-image: linear-gradient(var(--mc-chart-stroke) 1px, transparent 1px), linear-gradient(90deg, var(--mc-chart-stroke) 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="w-full max-w-3xl relative z-10">

            {{-- Page Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 shadow-xl"
                    style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,143,0.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">
                    পেমেন্টের বিবরণ
                </h2>
                <p class="text-sm mt-1" style="color: var(--mc-text-faint);">সেশন নিশ্চিত করতে পেমেন্ট সম্পন্ন করুন</p>
            </div>

            {{-- Main Card --}}
            <div class="rounded-2xl border"
                style="background: var(--mc-surface); border-color: var(--mc-border); box-shadow: var(--mc-shadow-lg);">
                <div class="p-6 sm:p-8 flex flex-col gap-6">

                    {{-- Student & Mentor Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- Student --}}
                        <div class="rounded-xl p-4 border"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <h3 class="font-bold text-sm mb-3 flex items-center gap-2"
                                style="color: var(--mc-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                শিক্ষার্থীর তথ্য
                            </h3>
                            <p class="text-sm" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">আইডি:</span> #১০২৪
                            </p>
                            <p class="text-sm mt-1" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">নাম:</span> রাহেলা বেগম
                            </p>
                        </div>

                        {{-- Mentor --}}
                        <div class="rounded-xl p-4 border"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <h3 class="font-bold text-sm mb-3 flex items-center gap-2"
                                style="color: var(--mc-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                মেন্টরের তথ্য
                            </h3>
                            <p class="text-sm" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">আইডি:</span> #৩০৫
                            </p>
                            <p class="text-sm mt-1" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">নাম:</span> ড. করিম আহমেদ
                            </p>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest"
                            style="color: var(--mc-text-faint);">সেশনের ধরন</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                    </div>

                    {{-- Session Type Toggle (Alpine.js) --}}
                    <div x-data="{ sessionType: 'live' }">

                        {{-- Toggle Pills --}}
                        <div class="flex gap-3 p-1.5 rounded-2xl border"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">

                            {{-- Live Session --}}
                            <button type="button" @click="sessionType = 'live'" :style="sessionType === 'live'
                                    ? 'background: linear-gradient(135deg, #1A9998, #155665); color: white; box-shadow: 0 4px 14px rgba(26,153,143,0.35);'
                                    : 'background: transparent; color: var(--mc-text-muted);'"
                                class="flex-1 flex items-center justify-center gap-2.5 py-3 px-4 rounded-xl font-bold text-sm transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                                লাইভ সেশন
                                <span
                                    :style="sessionType === 'live' ? 'background: rgba(255,255,255,0.2); color: white;' : 'background: var(--mc-border); color: var(--mc-text-muted);'"
                                    class="text-xs px-2 py-0.5 rounded-full font-semibold transition-all duration-300">এখনই</span>
                            </button>

                            {{-- Custom Session --}}
                            <button type="button" @click="sessionType = 'custom'" :style="sessionType === 'custom'
                                    ? 'background: linear-gradient(135deg, #1A9998, #155665); color: white; box-shadow: 0 4px 14px rgba(26,153,143,0.35);'
                                    : 'background: transparent; color: var(--mc-text-muted);'"
                                class="flex-1 flex items-center justify-center gap-2.5 py-3 px-4 rounded-xl font-bold text-sm transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                                কাস্টম সেশন
                                <span
                                    :style="sessionType === 'custom' ? 'background: rgba(255,255,255,0.2); color: white;' : 'background: var(--mc-border); color: var(--mc-text-muted);'"
                                    class="text-xs px-2 py-0.5 rounded-full font-semibold transition-all duration-300">তারিখ
                                    বেছে নিন</span>
                            </button>
                        </div>

                        {{-- Live Session Info Badge --}}
                        <div x-show="sessionType === 'live'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="mt-3 flex items-center gap-2.5 px-4 py-3 rounded-xl border"
                            style="background: rgba(26,153,143,0.08); border-color: var(--mc-border-teal);">
                            <span class="relative flex h-2.5 w-2.5 shrink-0">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"
                                    style="background-color: var(--mc-primary);"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5"
                                    style="background-color: var(--mc-primary);"></span>
                            </span>
                            <p class="text-sm font-medium" style="color: var(--mc-primary);">
                                লাইভ সেশন — পেমেন্ট সম্পন্ন হলে মেন্টর সাথে সাথে সংযুক্ত হবেন
                            </p>
                        </div>

                        {{-- Custom Session: Date / Time / Duration --}}
                        <div x-show="sessionType === 'custom'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="mt-3 rounded-xl border p-5 space-y-4"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">

                            <p class="text-xs font-bold uppercase tracking-widest" style="color: var(--mc-text-faint);">
                                সেশনের তারিখ ও সময় নির্ধারণ করুন
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Date --}}
                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold flex items-center gap-1.5"
                                            style="color: var(--mc-text-muted);">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                style="color: var(--mc-primary);">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5" />
                                            </svg>
                                            তারিখ
                                        </span>
                                    </label>
                                    <input type="date" name="session_date" value="2025-05-20"
                                        class="input input-bordered input-sm w-full h-11 rounded-xl text-sm px-4"
                                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); color: var(--mc-text);" />
                                </div>

                                {{-- Time --}}
                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold flex items-center gap-1.5"
                                            style="color: var(--mc-text-muted);">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                style="color: var(--mc-primary);">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            সময়
                                        </span>
                                    </label>
                                    <input type="time" name="session_time" value="18:00"
                                        class="input input-bordered input-sm w-full h-11 rounded-xl text-sm px-4"
                                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); color: var(--mc-text);" />
                                </div>
                            </div>

                            {{-- Duration Pills --}}
                            <div class="form-control gap-2">
                                <label class="label py-0">
                                    <span class="label-text text-xs font-bold flex items-center gap-1.5"
                                        style="color: var(--mc-text-muted);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            style="color: var(--mc-primary);">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        সেশনের মেয়াদ
                                    </span>
                                </label>
                                <div class="flex gap-2 flex-wrap">
                                    @foreach(['৩০ মিনিট' => '30', '১ ঘণ্টা' => '60', '১.৫ ঘণ্টা' => '90', '২ ঘণ্টা' =>
                                    '120'] as $label => $val)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="duration" value="{{ $val }}" class="peer hidden" {{
                                            $val==='60' ? 'checked' : '' }}>
                                        <span
                                            class="inline-block px-4 py-2 rounded-xl text-xs font-bold border transition-all duration-200 cursor-pointer"
                                            style="background: var(--mc-surface); border-color: var(--mc-border); color: var(--mc-text-muted);"
                                            x-ref="durationPill">
                                            {{ $label }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                                {{-- Duration pills active state via JS since peer-checked needs Tailwind classes --}}
                                <script>
                                    document.querySelectorAll('input[name="duration"]').forEach(radio => {
                                        const updateStyles = () => {
                                            document.querySelectorAll('input[name="duration"]').forEach(r => {
                                                const span = r.nextElementSibling;
                                                if (r.checked) {
                                                    span.style.borderColor = '#1A9998';
                                                    span.style.background = 'rgba(26,153,143,0.1)';
                                                    span.style.color = '#1A9998';
                                                } else {
                                                    span.style.borderColor = 'var(--mc-border)';
                                                    span.style.background = 'var(--mc-surface)';
                                                    span.style.color = 'var(--mc-text-muted)';
                                                }
                                            });
                                        };
                                        radio.addEventListener('change', updateStyles);
                                        if (radio.checked) updateStyles();
                                    });
                                </script>
                            </div>

                            {{-- Warning note --}}
                            <div class="flex items-start gap-2.5 px-4 py-3 rounded-xl border"
                                style="background: rgba(245,158,11,0.08); border-color: rgba(245,158,11,0.2);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 mt-0.5" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="#f59e0b">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                                <p class="text-xs leading-relaxed" style="color: rgba(245,158,11,0.85);">
                                    মেন্টর তারিখ নিশ্চিত করার পরই সেশন চূড়ান্ত হবে। পেমেন্টের পর ২৪ ঘণ্টার মধ্যে জানানো
                                    হবে।
                                </p>
                            </div>

                        </div>

                    </div>{{-- end x-data --}}

                    {{-- Section Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest"
                            style="color: var(--mc-text-faint);">সেশনের বিস্তারিত</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                    </div>

                    {{-- Session Details Grid --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="rounded-xl p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-xs font-semibold mb-1" style="color: var(--mc-text-faint);">বিষয়</p>
                            <p class="text-sm font-bold" style="color: var(--mc-text);">Laravel</p>
                        </div>
                        <div class="rounded-xl p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-xs font-semibold mb-1" style="color: var(--mc-text-faint);">ঘণ্টাপ্রতি</p>
                            <p class="text-sm font-bold" style="color: var(--mc-primary);">৳৮০০.০০</p>
                        </div>
                        <div class="rounded-xl p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-xs font-semibold mb-1" style="color: var(--mc-text-faint);">মোট সময়</p>
                            <p class="text-sm font-bold" style="color: var(--mc-text);">২.০০ ঘণ্টা</p>
                        </div>
                        <div class="rounded-xl p-3 border text-center"
                            style="background: rgba(26,153,143,0.08); border-color: var(--mc-border-teal);">
                            <p class="text-xs font-semibold mb-1" style="color: var(--mc-primary); opacity: 0.7;">
                                পরিশোধযোগ্য</p>
                            <p class="text-sm font-bold" style="color: var(--mc-primary);">৳১,৬০০.০০</p>
                        </div>
                    </div>

                    {{-- Payment Methods --}}
                    <div>
                        <h3 class="font-bold text-sm mb-4 flex items-center gap-2" style="color: var(--mc-text-muted);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" style="color: var(--mc-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                            পেমেন্ট মেথড সিলেক্ট করুন
                        </h3>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                            {{-- Payment method cards driven by JS for active state --}}
                            @php
                            $methods = [
                            ['value'=>'bkash', 'label'=>'বিকাশ', 'img'=>'bkash.svg', 'fallback'=>'bKash',
                            'active_border'=>'#ec4899', 'active_bg'=>'rgba(236,72,153,0.08)',
                            'fallback_color'=>'#ec4899'],
                            ['value'=>'nagad', 'label'=>'নগদ', 'img'=>'nagad.svg', 'fallback'=>'Nagad',
                            'active_border'=>'#f97316', 'active_bg'=>'rgba(249,115,22,0.08)',
                            'fallback_color'=>'#f97316'],
                            ['value'=>'rocket', 'label'=>'রকেট', 'img'=>'rocket.png', 'fallback'=>'Rocket',
                            'active_border'=>'#a855f7', 'active_bg'=>'rgba(168,85,247,0.08)',
                            'fallback_color'=>'#a855f7'],
                            ['value'=>'card', 'label'=>'ডেবিট/ক্রেডিট কার্ড','img'=>'cards.svg', 'fallback'=>null,
                            'active_border'=>'#1A9998', 'active_bg'=>'rgba(26,153,143,0.08)',
                            'fallback_color'=>'#1A9998'],
                            ['value'=>'pathao_pay','label'=>'পাঠাও পে', 'img'=>'pathao_pay.svg','fallback'=>'Pathao
                            Pay', 'active_border'=>'#ef4444', 'active_bg'=>'rgba(239,68,68,0.08)',
                            'fallback_color'=>'#ef4444'],
                            ];
                            @endphp

                            @foreach($methods as $i => $m)
                            <label class="cursor-pointer payment-label" data-active-border="{{ $m['active_border'] }}"
                                data-active-bg="{{ $m['active_bg'] }}">
                                <input type="radio" name="payment_method" value="{{ $m['value'] }}"
                                    class="payment-radio hidden" {{ $i===0 ? 'checked' : '' }}>
                                <div class="payment-card rounded-xl p-4 border-2 text-center transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                                    style="background: var(--mc-bg); border-color: var(--mc-border);">
                                    <div class="h-7 flex items-center justify-center mb-2">
                                        @if($m['fallback'])
                                        <img src="{{ asset('images/Checkout Page/' . $m['img']) }}"
                                            class="{{ $m['value'] === 'pathao_pay' ? 'h-6' : 'h-7' }} mx-auto"
                                            alt="{{ $m['label'] }}"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                        <span
                                            class="{{ $m['value'] === 'pathao_pay' ? 'text-base' : 'text-lg' }} font-black hidden"
                                            style="color: {{ $m['fallback_color'] }};">{{ $m['fallback'] }}</span>
                                        @else
                                        <img src="{{ asset('images/Checkout Page/' . $m['img']) }}" class="h-7 mx-auto"
                                            alt="{{ $m['label'] }}"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 hidden" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="#1A9998">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                                        @endif
                                    </div>
                                    <p class="text-xs font-semibold" style="color: var(--mc-text-muted);">{{ $m['label']
                                        }}</p>
                                </div>
                            </label>
                            @endforeach

                        </div>
                    </div>

                    {{-- Bottom Divider --}}
                    <div class="h-px w-full" style="background-color: var(--mc-border);"></div>

                    {{-- Total & Pay Button --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-5">
                        <div>
                            <p class="text-xs font-semibold mb-1 uppercase tracking-wider"
                                style="color: var(--mc-text-faint);">
                                সর্বমোট পরিশোধযোগ্য
                            </p>
                            <p class="text-3xl font-bold" style="color: var(--mc-primary); font-family:'Lora',serif;">
                                ৳১,৬০০.০০
                            </p>
                        </div>

                        <a href="{{ route('success') }}"
                            class="btn btn-wide font-bold text-base rounded-xl text-white border-0 hover:opacity-90 hover:-translate-y-0.5 transition-all duration-200"
                            style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,143,0.35);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            পরিশোধ করুন
                        </a>
                    </div>

                    {{-- Security Note --}}
                    <p class="text-center text-xs flex items-center justify-center gap-1.5"
                        style="color: var(--mc-text-faint);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        SSL এনক্রিপশন দ্বারা সুরক্ষিত পেমেন্ট গেটওয়ে
                    </p>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Payment method active state
        function updatePaymentCards() {
            document.querySelectorAll('.payment-label').forEach(label => {
                const radio = label.querySelector('.payment-radio');
                const card  = label.querySelector('.payment-card');
                if (radio.checked) {
                    card.style.borderColor = label.dataset.activeBorder;
                    card.style.background  = label.dataset.activeBg;
                } else {
                    card.style.borderColor = 'var(--mc-border)';
                    card.style.background  = 'var(--mc-bg)';
                }
            });
        }
        document.querySelectorAll('.payment-radio').forEach(r => r.addEventListener('change', updatePaymentCards));
        updatePaymentCards();
    </script>

    @push('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

</x-layout>
