<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">
        <section class="max-w-6xl mx-auto px-5 py-16 md:py-20">

            {{-- Section Header --}}
            <div class="text-center mb-14">
                <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3 mb-4"
                    style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                    📬 সংযোগ
                </span>
                <h2 class="text-3xl md:text-4xl font-bold mt-3"
                    style="color: var(--mc-text); font-family: 'Lora', serif;">
                    যোগাযোগ করুন
                </h2>
                <div class="mx-auto mt-4 mb-4 h-1 w-14 rounded-full"
                    style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                <p class="text-sm max-w-md mx-auto" style="color: var(--mc-text-muted);">
                    যেকোনো তথ্যের জন্য নিচের ফর্মটি পূরণ করুন অথবা সরাসরি আমাদের সাথে যোগাযোগ করুন।
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-8 items-start">

                {{-- LEFT: Contact Info Cards --}}
                <div class="w-full md:w-5/12 flex flex-col gap-4 order-2 md:order-1">

                    @php
                    $contacts = [
                    [
                    'label' => 'মোবাইল',
                    'value' => '+8801122334455',
                    'color' => 'rgba(26,153,143,0.12)',
                    'stroke'=> 'var(--mc-primary)',
                    'icon' => '
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.636a2.25 2.25 0 00-1.72-2.184l-2.51-.627a2.25 2.25 0 00-2.54 1.09l-.53.928a12.035 12.035 0 01-5.318-5.318l.928-.53a2.25 2.25 0 001.09-2.54l-.627-2.51A2.25 2.25 0 007.386 2.25H4.75A2.25 2.25 0 002.5 4.5v2.25z" />
                    ',
                    ],
                    [
                    'label' => 'ইমেইল',
                    'value' => 'abcd@example.com',
                    'color' => 'rgba(24,127,135,0.12)',
                    'stroke'=> '#187F87',
                    'icon' => '
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.375L2.25 6.75" />
                    ',
                    ],
                    [
                    'label' => 'টেলিগ্রাম / হোয়াটসঅ্যাপ',
                    'value' => '+8801122334455',
                    'color' => 'rgba(21,86,101,0.12)',
                    'stroke'=> '#155665',
                    'icon' => '
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12a9.75 9.75 0 1117.812 5.567L21.75 21l-3.433-1.688A9.708 9.708 0 0112 21.75c-5.385 0-9.75-4.365-9.75-9.75z" />
                    ',
                    ],
                    [
                    'label' => 'ঠিকানা',
                    'value' => '123 Business Avenue, Dhaka',
                    'color' => 'rgba(16,46,60,0.1)',
                    'stroke'=> '#102E3C',
                    'icon' => '
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />',
                    ],
                    ];
                    @endphp

                    @foreach($contacts as $item)
                    <div class="card border hover:-translate-y-1 transition-all duration-200 cursor-default"
                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                        <div class="card-body p-4 flex-row items-center gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                style="background: {{ $item['color'] }};">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="{{ $item['stroke'] }}">{!! $item['icon'] !!}</svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-sm" style="color: var(--mc-text);">{{ $item['label'] }}</p>
                                <p class="text-sm mt-0.5 truncate" style="color: var(--mc-text-muted);">{{
                                    $item['value'] }}</p>
                            </div>
                            <button class="btn btn-ghost btn-sm btn-circle copy-btn" data-copy="{{ $item['value'] }}"
                                title="কপি করুন" style="color: var(--mc-text-faint);">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach

                </div>

                {{-- RIGHT: Contact Form --}}
                <div class="w-full md:w-7/12 order-1 md:order-2">
                    <div class="card border"
                        style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-md);">
                        <div class="card-body p-7 md:p-8 gap-5">

                            <h3 class="card-title text-lg" style="color: var(--mc-text); font-family: 'Lora', serif;">
                                সরাসরি বার্তা পাঠান
                            </h3>

                            <form class="flex flex-col gap-4">
                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold uppercase tracking-wide"
                                            style="color: var(--mc-text-muted);">সম্পূর্ণ নাম</span>
                                    </label>
                                    <input type="text" placeholder="আপনার নাম লিখুন"
                                        class="input input-bordered w-full text-sm"
                                        style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text);" />
                                </div>

                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold uppercase tracking-wide"
                                            style="color: var(--mc-text-muted);">ইমেইল</span>
                                    </label>
                                    <input type="email" placeholder="আপনার ইমেইল অ্যাড্রেস লিখুন"
                                        class="input input-bordered w-full text-sm"
                                        style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text);" />
                                </div>

                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold uppercase tracking-wide"
                                            style="color: var(--mc-text-muted);">বিষয়</span>
                                    </label>
                                    <input type="text" placeholder="বিষয় লিখুন"
                                        class="input input-bordered w-full text-sm"
                                        style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text);" />
                                </div>

                                <div class="form-control gap-1.5">
                                    <label class="label py-0">
                                        <span class="label-text text-xs font-bold uppercase tracking-wide"
                                            style="color: var(--mc-text-muted);">বার্তা</span>
                                    </label>
                                    <textarea placeholder=" আপনার প্রশ্ন কিংবা বার্তাটি লিখুন....." rows="5"
                                        class="textarea textarea-bordered w-full text-sm resize-y"
                                        style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text); min-height: 130px;"></textarea>
                                </div>

                                <button type="submit"
                                    class="btn w-full text-white border-0 font-bold hover:-translate-y-0.5 transition-all duration-200"
                                    style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 4px 14px rgba(26,153,143,0.28);">
                                    বার্তাটি প্রেরণ করুন →
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            {{-- Map --}}
            <div class="mt-14 text-center">
                <p class="text-sm font-semibold mb-4" style="color: var(--mc-text-muted);">
                    📍 আমাদের খুঁজে পেতে গুগল ম্যাপের সহায়তা নিন
                </p>
                <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z" target="_blank"
                    rel="noopener noreferrer">
                    <div class="rounded-2xl overflow-hidden inline-block w-full max-w-3xl border hover:shadow-xl transition-shadow duration-300"
                        style="height: 260px; border-color: var(--mc-border-teal); box-shadow: var(--mc-shadow-md);">
                        <img src="{{ asset('images/Contact Page/map.png') }}" alt="Location Map"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                    </div>
                </a>
            </div>

        </section>
    </div>

    <script>
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const text = btn.dataset.copy;
                navigator.clipboard.writeText(text).then(() => {
                    const original = btn.innerHTML;
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>`;
                    setTimeout(() => { btn.innerHTML = original; }, 2000);
                });
            });
        });
    </script>
</x-layout>
