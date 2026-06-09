<x-layout>
    <div class="min-h-screen transition-colors duration-300 pb-16" style="background-color: var(--mc-bg);">
        <section class="max-w-6xl mx-auto px-5 pt-16 md:pt-20">

            {{-- Section Header --}}
            <div class="text-center mb-14">
                <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3 mb-4"
                    style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                    📬 যোগাযোগ
                </span>
                <h2 class="text-3xl md:text-4xl font-bold mt-3"
                    style="color: var(--mc-text); font-family: 'Lora', serif;">
                    আমাদের সাথে সংযোগ করুন
                </h2>
                <div class="mx-auto mt-4 mb-4 h-1 w-14 rounded-full"
                    style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                <p class="text-sm max-w-lg mx-auto" style="color: var(--mc-text-muted);">
                    যেকোনো জিজ্ঞাসা, সাহায্য অথবা সহযোগিতার জন্য সরাসরি যোগাযোগ করুন। আমাদের টিম দ্রুত আপনার সাথে যোগাযোগ করবে।
                </p>
            </div>

            {{-- Contact Cards Grid --}}
            @php
            $contacts = [
                [
                    'label' => 'সাধারণ জিজ্ঞাসা',
                    'value' => 'info@mentorchai.com',
                    'description' => 'যেকোনো সাধারণ তথ্য, জিজ্ঞাসা ও সহযোগিতার জন্য ইমেল করুন।',
                    'color' => 'rgba(26,153,143,0.08)',
                    'stroke'=> 'var(--mc-primary)',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.375L2.25 6.75" />',
                ],
                [
                    'label' => 'সহায়তা ও সাপোর্ট ডেস্ক',
                    'value' => 'support@mentorchai.com',
                    'description' => 'পেমেন্ট, অ্যাকাউন্ট কিংবা টেকনিক্যাল সমস্যার তাৎক্ষণিক সমাধান।',
                    'color' => 'rgba(24,127,135,0.08)',
                    'stroke'=> '#187F87',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />',
                ],
                [
                    'label' => 'জরুরী হটলাইন',
                    'value' => '01234567891',
                    'description' => 'সরাসরি কথা বলতে শনি - বৃহস্পতি, সকাল ৯টা থেকে রাত ৯টা পর্যন্ত কল করুন।',
                    'color' => 'rgba(21,86,101,0.08)',
                    'stroke'=> '#155665',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.636a2.25 2.25 0 00-1.72-2.184l-2.51-.627a2.25 2.25 0 00-2.54 1.09l-.53.928a12.035 12.035 0 01-5.318-5.318l.928-.53a2.25 2.25 0 001.09-2.54l-.627-2.51A2.25 2.25 0 007.386 2.25H4.75A2.25 2.25 0 002.5 4.5v2.25z" />',
                ],
                [
                    'label' => 'হোয়াটসঅ্যাপ ও টেলিগ্রাম',
                    'value' => '01234567891',
                    'description' => 'দ্রুত যোগাযোগের জন্য আমাদের সাথে মেসেজ আদান-প্রদান করতে পারেন।',
                    'color' => 'rgba(16,46,60,0.08)',
                    'stroke'=> '#102E3C',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.322.083-.657-.018-.974A8.348 8.348 0 013 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />',
                ],
                [
                    'label' => 'কর্পোরেট অংশীদারিত্ব',
                    'value' => 'partner@mentorchai.com',
                    'description' => 'প্রাতিষ্ঠানিক সহযোগিতা এবং প্রমোশনের জন্য যোগাযোগ করুন।',
                    'color' => 'rgba(26,153,143,0.08)',
                    'stroke'=> 'var(--mc-primary)',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 .621-.504 1.125-1.125 1.125H4.875A1.125 1.125 0 013.75 18.4v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v1.277m7.5 0a48.667 48.667 0 00-7.5 0" />',
                ],
                [
                    'label' => 'প্রধান কার্যালয়',
                    'value' => 'ঢাকা, বাংলাদেশ',
                    'description' => 'সরাসরি আমাদের সাথে দেখা করার জন্য।',
                    'color' => 'rgba(16,46,60,0.08)',
                    'stroke'=> '#102E3C',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />',
                ],
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($contacts as $idx => $item)
                <div class="contact-card card border hover:-translate-y-1.5 transition-all duration-300 cursor-default opacity-0"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); transform: translateY(15px);">
                    <div class="card-body p-6 flex flex-col justify-between h-full gap-4">
                        
                        <div class="flex items-start gap-4">
                            {{-- Icon Wrapper --}}
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 border border-teal-500/10"
                                style="background: {{ $item['color'] }};">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="{{ $item['stroke'] }}">{!! $item['icon'] !!}</svg>
                            </div>
                            
                            {{-- Content --}}
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-base" style="color: var(--mc-text);">{{ $item['label'] }}</p>
                                <p class="text-sm mt-1 font-semibold break-all" style="color: var(--mc-primary);">{{ $item['value'] }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs leading-relaxed" style="color: var(--mc-text-muted);">
                                {{ $item['description'] }}
                            </p>
                            
                            {{-- Action Divider --}}
                            <div class="h-px bg-[#28666e]/10 dark:bg-[#4db6c1]/10 my-4"></div>

                            {{-- Actions --}}
                            <div class="flex justify-between items-center">
                                @if(str_contains($item['value'], '@'))
                                    <a href="mailto:{{ $item['value'] }}" class="text-xs font-bold hover:underline flex items-center gap-1" style="color: var(--mc-primary);">
                                        ইমেইল করুন →
                                    </a>
                                @elseif(str_contains($item['value'], '+880'))
                                    <a href="tel:{{ str_replace(' ', '', $item['value']) }}" class="text-xs font-bold hover:underline flex items-center gap-1" style="color: var(--mc-primary);">
                                        কল করুন →
                                    </a>
                                @else
                                    <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z" target="_blank" class="text-xs font-bold hover:underline flex items-center gap-1" style="color: var(--mc-primary);">
                                        ম্যাপে দেখুন →
                                    </a>
                                @endif

                                <button class="btn btn-ghost btn-xs btn-circle copy-btn hover:bg-teal-500/10" data-copy="{{ $item['value'] }}"
                                    title="কপি করুন" style="color: var(--mc-text-faint);">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            {{-- Original Map Section --}}
            <div class="mt-16 text-center">
                <p class="text-sm font-semibold mb-4" style="color: var(--mc-text-muted);">
                    📍 আমাদের খুঁজে পেতে গুগল ম্যাপের সহায়তা নিন
                </p>
                <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z" target="_blank"
                    rel="noopener noreferrer">
                    <div class="rounded-2xl overflow-hidden inline-block w-full max-w-3xl border hover:shadow-xl transition-shadow duration-300"
                        style="height: 280px; border-color: var(--mc-border-teal); box-shadow: var(--mc-shadow-md);">
                        <img src="{{ asset('images/Contact Page/map.png') }}" alt="Location Map"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                    </div>
                </a>
            </div>

        </section>
    </div>

    {{-- Script for staggered load animation & copying --}}
    <script>
        // Stagger fade-in on load
        document.querySelectorAll('.contact-card').forEach((el, i) => {
            setTimeout(() => {
                el.style.transition = 'opacity 0.4s ease, transform 0.4s ease, box-shadow 0.22s ease, border-color 0.22s ease';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, i * 65);
        });

        // Robust copy to clipboard functionality with fallback support
        function copyText(text, btn) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showSuccess(btn);
                }).catch(() => {
                    fallbackCopyText(text, btn);
                });
            } else {
                fallbackCopyText(text, btn);
            }
        }

        function fallbackCopyText(text, btn) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed"; // Avoid scrolling to bottom
            textArea.style.left = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                showSuccess(btn);
            } catch (err) {
                console.error('Copy fallback failed: ', err);
            }
            document.body.removeChild(textArea);
        }

        function showSuccess(btn) {
            const original = btn.innerHTML;
            btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>`;
            setTimeout(() => { btn.innerHTML = original; }, 1800);
        }

        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                copyText(btn.dataset.copy, btn);
            });
        });
    </script>
</x-layout>
