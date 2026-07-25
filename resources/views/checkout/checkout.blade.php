<x-layout>
    <div class="min-h-screen flex items-center justify-center p-3 sm:p-6 md:p-10 py-6 sm:py-10 transition-colors duration-300"
        style="background-color: var(--mc-bg);">

        {{-- Subtle grid texture overlay --}}
        <div class="fixed inset-0 pointer-events-none opacity-[0.025]"
            style="background-image: linear-gradient(var(--mc-chart-stroke) 1px, transparent 1px), linear-gradient(90deg, var(--mc-chart-stroke) 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="w-full max-w-3xl relative z-10">

            {{-- Page Header --}}
            <div class="text-center mb-6 sm:mb-8">
                <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl mb-3 sm:mb-4 shadow-xl"
                    style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,143,0.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>
                </div>
                <h2 class="text-xl sm:text-3xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">
                    পেমেন্টের বিবরণ
                </h2>
                <p class="text-xs sm:text-sm mt-1" style="color: var(--mc-text-faint);">সেশন নিশ্চিত করতে পেমেন্ট সম্পন্ন করুন</p>
            </div>

            {{-- Main Card --}}
            <div class="rounded-xl sm:rounded-2xl border"
                style="background: var(--mc-surface); border-color: var(--mc-border); box-shadow: var(--mc-shadow-lg);">
                <div class="p-4 sm:p-8 flex flex-col gap-4 sm:gap-6">

                    {{-- Student & Mentor Info --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">

                        {{-- Student --}}
                        <div class="rounded-xl p-3.5 sm:p-4 border"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <h3 class="font-bold text-xs sm:text-sm mb-2 sm:mb-3 flex items-center gap-1.5 sm:gap-2"
                                style="color: var(--mc-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                শিক্ষার্থীর তথ্য
                            </h3>
                            <p class="text-xs sm:text-sm" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">আইডি:</span>
                                #{{ $student->id }}
                            </p>
                            <p class="text-xs sm:text-sm mt-0.5 sm:mt-1 truncate" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">নাম:</span>
                                {{ $student->name }}
                            </p>
                            <p class="text-xs sm:text-sm mt-0.5 sm:mt-1 truncate" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">ইমেইল:</span>
                                {{ $student->email }}
                            </p>
                        </div>

                        {{-- Mentor --}}
                        <div class="rounded-xl p-3.5 sm:p-4 border"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <h3 class="font-bold text-xs sm:text-sm mb-2 sm:mb-3 flex items-center gap-1.5 sm:gap-2"
                                style="color: var(--mc-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                মেন্টরের তথ্য
                            </h3>
                            <p class="text-xs sm:text-sm" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">আইডি:</span>
                                #{{ $mentor->id }}
                            </p>
                            <p class="text-xs sm:text-sm mt-0.5 sm:mt-1 truncate" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">নাম:</span>
                                {{ $mentor->name }}
                            </p>
                            <p class="text-xs sm:text-sm mt-0.5 sm:mt-1 truncate" style="color: var(--mc-text-muted);">
                                <span class="font-semibold" style="color: var(--mc-text);">প্রতিষ্ঠান:</span>
                                {{ $mentor->profile?->institution_name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                        <span class="text-[10px] sm:text-xs font-semibold uppercase tracking-widest"
                            style="color: var(--mc-text-faint);">সেশনের ধরন</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                    </div>

                    {{-- Live Session Badge --}}
                    <div class="flex items-center gap-2.5 px-3.5 py-2.5 sm:px-4 sm:py-3 rounded-xl border"
                        style="background: rgba(26,153,143,0.08); border-color: var(--mc-border-teal);">
                        <span class="relative flex h-2.5 w-2.5 shrink-0">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"
                                style="background-color: var(--mc-primary);"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5"
                                style="background-color: var(--mc-primary);"></span>
                        </span>
                        <p class="text-xs sm:text-sm font-medium" style="color: var(--mc-primary);">
                            লাইভ সেশন - পেমেন্ট সম্পন্ন হলে মেন্টর সাথে সাথে সংযুক্ত হবেন
                        </p>
                    </div>

                    {{-- Section Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                        <span class="text-[10px] sm:text-xs font-semibold uppercase tracking-widest"
                            style="color: var(--mc-text-faint);">সেশনের বিস্তারিত</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border);"></div>
                    </div>

                    {{-- Session Details Grid --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3">
                        <div class="rounded-xl p-2.5 sm:p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-[10px] sm:text-xs font-semibold mb-0.5 sm:mb-1" style="color: var(--mc-text-faint);">বিষয়</p>
                            <p class="text-xs sm:text-sm font-bold truncate" style="color: var(--mc-text);">{{ $topic }}</p>
                        </div>
                        <div class="rounded-xl p-2.5 sm:p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-[10px] sm:text-xs font-semibold mb-0.5 sm:mb-1" style="color: var(--mc-text-faint);">ঘণ্টাপ্রতি</p>
                            <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-primary);">
                                ৳{{ number_format($hourlyRate, 2) }}
                            </p>
                        </div>
                        <div class="rounded-xl p-2.5 sm:p-3 border text-center"
                            style="background: var(--mc-bg); border-color: var(--mc-border);">
                            <p class="text-[10px] sm:text-xs font-semibold mb-0.5 sm:mb-1" style="color: var(--mc-text-faint);">মোট সময়</p>
                            <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-text);">
                                {{ $durationHours }}.০০ ঘণ্টা
                            </p>
                        </div>
                        <div class="rounded-xl p-2.5 sm:p-3 border text-center"
                            style="background: rgba(26,153,143,0.08); border-color: var(--mc-border-teal);">
                            <p class="text-[10px] sm:text-xs font-semibold mb-0.5 sm:mb-1" style="color: var(--mc-primary); opacity: 0.7;">
                                পরিশোধযোগ্য
                            </p>
                            <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-primary);">
                                ৳{{ number_format($totalAmount, 2) }}
                            </p>
                        </div>
                    </div>

                    {{-- Payment Methods --}}
                    {{-- ✅ Fixed: action now points to payment.initiate route --}}
                    <form method="POST" action="{{ route('payment.initiate') }}" id="payment-form">
                        @csrf
                        <input type="hidden" name="session_topic_id" value="{{ $sessionTopic->id }}">
                        <input type="hidden" name="payment_method" id="selected-payment-method" value="bkash">

                        <div>
                            <h3 class="font-bold text-xs sm:text-sm mb-3 sm:mb-4 flex items-center gap-1.5 sm:gap-2"
                                style="color: var(--mc-text-muted);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" style="color: var(--mc-primary);">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                </svg>
                                পেমেন্ট মেথড সিলেক্ট করুন
                            </h3>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 sm:gap-3">
                                @php
                                $methods = [
                                ['value' => 'bkash', 'label' => 'বিকাশ', 'img' => 'bkash.svg', 'fallback' => 'bKash',
                                'active_border' => '#ec4899', 'active_bg' => 'rgba(236,72,153,0.08)', 'fallback_color'
                                => '#ec4899'],
                                ['value' => 'nagad', 'label' => 'নগদ', 'img' => 'nagad.svg', 'fallback' => 'Nagad',
                                'active_border' => '#f97316', 'active_bg' => 'rgba(249,115,22,0.08)', 'fallback_color'
                                => '#f97316'],
                                ['value' => 'rocket', 'label' => 'রকেট', 'img' => 'rocket.png', 'fallback' =>
                                'Rocket','active_border' => '#a855f7', 'active_bg' => 'rgba(168,85,247,0.08)',
                                'fallback_color' => '#a855f7'],
                                ['value' => 'card', 'label' => 'ডেবিট/ক্রেডিট কার্ড', 'img' => 'cards.svg', 'fallback'
                                => null, 'active_border' => '#1A9998', 'active_bg' => 'rgba(26,153,143,0.08)',
                                'fallback_color' => '#1A9998'],
                                ['value' => 'bank', 'label' => 'ব্যাংক ট্রান্সফার', 'img' => 'bank.svg', 'fallback' =>
                                'Bank', 'active_border' => '#0284c7', 'active_bg' => 'rgba(2,132,199,0.08)',
                                'fallback_color' => '#0284c7'],
                                ['value' => 'pathaopay', 'label' => 'পাঠাও পে', 'img' => 'Pathao_Pay.svg', 'fallback' => 'Pathao Pay',
                                'active_border' => '#e84525', 'active_bg' => 'rgba(232,69,37,0.08)', 'fallback_color' => '#e84525',
                                'link' => 'https://pathaopay.me/@mr_explorer142/' . ($totalAmount + 0)],
                                ];
                                @endphp

                                @foreach($methods as $i => $m)
                                @if(isset($m['link']))
                                <a href="{{ $m['link'] }}" target="_blank" class="cursor-pointer payment-label block" style="text-decoration: none;"
                                    data-active-border="{{ $m['active_border'] }}"
                                    data-active-bg="{{ $m['active_bg'] }}">
                                    <div class="payment-card rounded-xl p-2.5 sm:p-4 border-2 text-center transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                                        style="background: var(--mc-bg); border-color: var(--mc-border);">
                                        <div class="h-6 sm:h-7 flex items-center justify-center mb-1.5 sm:mb-2">
                                            @if($m['fallback'])
                                            <img src="{{ asset('images/Checkout Page/' . $m['img']) }}"
                                                class="h-6 sm:h-7 mx-auto" alt="{{ $m['label'] }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                            <span class="text-base sm:text-lg font-black hidden"
                                                style="color: {{ $m['fallback_color'] }};">{{ $m['fallback'] }}</span>
                                            @else
                                            <img src="{{ asset('images/Checkout Page/' . $m['img']) }}"
                                                class="h-6 sm:h-7 mx-auto" alt="{{ $m['label'] }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 sm:w-7 sm:h-7 hidden" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.8" stroke="#1A9998">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                            </svg>
                                            @endif
                                        </div>
                                        <p class="text-[11px] sm:text-xs font-semibold" style="color: var(--mc-text-muted);">
                                            {{ $m['label'] }}
                                        </p>
                                    </div>
                                </a>
                                @else
                                <label class="cursor-pointer payment-label"
                                    data-active-border="{{ $m['active_border'] }}"
                                    data-active-bg="{{ $m['active_bg'] }}">
                                    <input type="radio" name="_payment_display" value="{{ $m['value'] }}"
                                        class="payment-radio hidden" {{ $i===0 ? 'checked' : '' }}>
                                    <div class="payment-card rounded-xl p-2.5 sm:p-4 border-2 text-center transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                                        style="background: var(--mc-bg); border-color: var(--mc-border);">
                                        <div class="h-6 sm:h-7 flex items-center justify-center mb-1.5 sm:mb-2">
                                            @if($m['fallback'])
                                            <img src="{{ asset('images/Checkout Page/' . $m['img']) }}"
                                                class="h-6 sm:h-7 mx-auto" alt="{{ $m['label'] }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                            <span class="text-base sm:text-lg font-black hidden"
                                                style="color: {{ $m['fallback_color'] }};">{{ $m['fallback'] }}</span>
                                            @else
                                            <img src="{{ asset('images/Checkout Page/' . $m['img']) }}"
                                                class="h-6 sm:h-7 mx-auto" alt="{{ $m['label'] }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 sm:w-7 sm:h-7 hidden" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.8" stroke="#1A9998">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                            </svg>
                                            @endif
                                        </div>
                                        <p class="text-[11px] sm:text-xs font-semibold" style="color: var(--mc-text-muted);">
                                            {{ $m['label'] }}
                                        </p>
                                    </div>
                                </label>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- Bottom Divider --}}
                        <div class="h-px w-full mt-4 sm:mt-6" style="background-color: var(--mc-border);"></div>

                        {{-- Total & Pay Button --}}
                        <div class="flex flex-col sm:flex-row justify-between items-center sm:items-end gap-3 sm:gap-5 mt-4 sm:mt-6 text-center sm:text-left">
                            <div>
                                <p class="text-[10px] sm:text-xs font-semibold mb-0.5 sm:mb-1 uppercase tracking-wider"
                                    style="color: var(--mc-text-faint);">
                                    সর্বমোট পরিশোধযোগ্য
                                </p>
                                <p class="text-2xl sm:text-3xl font-bold"
                                    style="color: var(--mc-primary); font-family:'Lora',serif;">
                                    ৳{{ number_format($totalAmount, 2) }}
                                </p>
                            </div>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-xl text-sm sm:text-base font-bold text-white border-0
                   flex items-center justify-center gap-2
                   hover:opacity-90 hover:-translate-y-0.5 transition-all duration-200" style="background: linear-gradient(135deg, #1A9998, #155665);
                   box-shadow: 0 8px 24px rgba(26,153,143,0.35);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                পরিশোধ করুন
                            </button>
                        </div>

                    </form>

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
        function updatePaymentCards() {
        document.querySelectorAll('.payment-label').forEach(label => {
            const radio = label.querySelector('.payment-radio');
            const card  = label.querySelector('.payment-card');
            if (radio && radio.checked) {
                card.style.borderColor = label.dataset.activeBorder;
                card.style.background  = label.dataset.activeBg;
                // ✅ sync hidden input whenever a card is active
                document.getElementById('selected-payment-method').value = radio.value;
            } else if (radio) {
                card.style.borderColor = 'var(--mc-border)';
                card.style.background  = 'var(--mc-bg)';
            } else {
                card.style.borderColor = 'var(--mc-border)';
                card.style.background  = 'var(--mc-bg)';
            }
        });
    }

    document.querySelectorAll('.payment-radio').forEach(r => {
        r.addEventListener('change', updatePaymentCards);
    });

    // Run on page load to set default selected method
    updatePaymentCards();
    </script>

</x-layout>