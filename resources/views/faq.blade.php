<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- Header --}}
        <section class="max-w-3xl mx-auto px-5 pt-16 pb-10 text-center">
            <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3 mb-4"
                style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                ❓ সহায়তা কেন্দ্র
            </span>
            <h1 class="text-3xl md:text-4xl font-bold mt-3 mb-4"
                style="color: var(--mc-text); font-family: 'Lora', serif; line-height: 1.25;">
                প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী
            </h1>
            <div class="mx-auto mb-5 h-1 w-14 rounded-full"
                style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
            <p class="text-sm max-w-md mx-auto" style="color: var(--mc-text-muted);">
                আপনাদের সবচেয়ে সাধারণ প্রশ্নগুলোর উত্তর এখানে একসাথে পাবেন।
                না পেলে আমাদের
                <a href="{{ route('contact') }}" class="font-bold underline underline-offset-2"
                    style="color: var(--mc-primary);">যোগাযোগ করুন</a>।
            </p>
        </section>

        {{-- FAQ List --}}
        <section class="max-w-3xl mx-auto px-5 pb-20 flex flex-col gap-3">

            @php
            $faqs = [
            ['q' => 'আমি কোন কোন বিষয় কিংবা টপিকের জন্য মেন্টর পাবো?',
            'a' => 'আমাদের প্ল্যাটফর্মটি কোনো নির্দিষ্ট বিষয়, টপিক, ক্লাস বা ডিপার্টমেন্টের জন্য নয়, বরং সকল ধরনের
            শিক্ষার্থীদের জন্য ডেভেলপ করা হয়েছে। আমাদের প্ল্যাটফর্মে প্রতিনিয়ত নতুন মেন্টর যুক্ত হচ্ছেন এবং নিয়মিত
            বিভিন্ন নতুন টপিক সংযুক্ত হচ্ছে। যদি কোনো নির্দিষ্ট টপিকের জন্য আপনার মেন্টর প্রয়োজন হয় কিন্তু সেটি আমাদের
            টপিকলিস্টে অ্যাভেইলেবল না থাকে, সেক্ষেত্রে আপনি নিজ অ্যাকাউন্ট থেকে আমাদের কাছে রিকুয়েষ্ট রাখতে পারবেন।'],
            ['q' => 'প্রতি সেশনের পেমেন্ট কীভাবে নির্ধারণ করা হয়?',
            'a' => 'আপনি ৩০ মিনিট, ৪৫ মিনিট, ১ ঘন্টা বা প্রয়োজনীয় যেকোনো সময়সীমার জন্য মেন্টর বুক করতে পারবেন।
            নির্দিষ্ট সময়সীমার জন্য নির্দিষ্ট মূল্য নির্ধারণ করা হয়েছে।'],
            ['q' => 'আমি কি দিনে কিংবা রাতে যেকোনো সময় মেন্টর বুক করতে পারবো?',
            'a' => 'জি, আমাদের প্ল্যাটফর্মটি ২৪/৭ কার্যকর রয়েছে। আপনার যে টপিকটির জন্য মেন্টর প্রয়োজন সেই টপিকের
            মেন্টরদের অ্যাভেইলেবিলিটির ভিত্তিতে দিনে কিংবা রাতে যেকোনো সময়েই আপনি মেন্টর বুক করতে পারবেন।'],
            ['q' => 'নির্দিষ্ট সময়ের সেশনের পর অতিরিক্ত সময় লাগলে করণীয় কী?',
            'a' => 'যদি নির্ধারিত সময়ের পর অতিরিক্ত সময় প্রয়োজন হয়, সেক্ষেত্রে আলাদাভাবে অতিরিক্ত পেমেন্টের মাধ্যমে
            সময়সীমা বৃদ্ধি করা যাবে।'],
            ['q' => 'কোনো টপিকে কোন মেন্টর অ্যাভেইলেবল — কীভাবে বুঝবো?',
            'a' => 'আপনি অ্যাভেইলেবল এক্টিভ মেন্টরদের লিস্ট এবং তাদের ডিটেইলস দেখতে পাবেন। সেখান থেকে নিজের পছন্দমতো
            যেকোনো মেন্টরকে বুক করতে পারবেন।'],
            ['q' => 'অনলাইন ভিডিও সেশনগুলো কীভাবে সঞ্চালিত হবে?',
            'a' => 'আমাদের ওয়েবসাইট থেকে সরাসরি ভিডিও কলিংয়ের মাধ্যমে আপনাদের সেশনগুলো নেওয়া হবে।'],
            ['q' => 'পেমেন্ট কি সেশন শুরুর আগে, নাকি পরে করতে হবে?',
            'a' => 'সেশন শুরুর পূর্বেই পেমেন্ট সম্পন্ন করতে হবে। মূলত পেমেন্ট করার মাধ্যমেই নির্দিষ্ট সময়ের জন্য আপনি
            নির্দিষ্ট মেন্টরকে বুক করতে পারবেন।'],
            ['q' => 'MentorChai ব্যবহার করতে কোনো আলাদা সফটওয়্যার লাগবে?',
            'a' => 'MentorChai ব্যবহার করতে আলাদা কোনো বিশেষ সফটওয়্যার প্রয়োজন নেই। আমাদের ওয়েবসাইটের মাধ্যমেই সরাসরি
            সকল সুবিধা নিতে পারবেন।'],
            ['q' => 'MentorChai-তে মেন্টর হিসাবে কীভাবে যুক্ত হতে পারি?', 'a' => null],
            ];
            @endphp

            @foreach($faqs as $idx => $faq)
            <div class="faq-item rounded-2xl border overflow-hidden transition-all duration-200 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">

                <button
                    class="faq-btn w-full text-left flex items-center justify-between gap-3 px-5 py-4 font-bold text-sm"
                    style="color: var(--mc-text-sub); background: transparent; border: none; cursor: pointer;">
                    <span>{{ $faq['q'] }}</span>
                    <svg class="faq-arrow w-5 h-5 shrink-0 transition-transform duration-300" fill="none"
                        stroke="var(--mc-primary)" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div class="faq-answer overflow-hidden"
                    style="max-height: 0; transition: max-height 0.35s cubic-bezier(.4,0,.2,1);">
                    <div class="px-5 pb-5 pt-3 text-sm leading-loose border-t"
                        style="color: var(--mc-text-muted); border-color: var(--mc-border-teal-sub);">
                        @if($faq['a'])
                        {{ $faq['a'] }}
                        @else
                        মেন্টর হিসাবে যুক্ত হওয়ার নিয়মকানুন সম্পর্কে বিস্তারিত জানতে
                        <a href="https://example.com" target="_blank" rel="noopener noreferrer"
                            class="font-bold underline underline-offset-2" style="color: var(--mc-primary);">
                            এই লিংকে ক্লিক করুন
                        </a>।
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Still have questions CTA --}}
            <div class="card border mt-6 text-center"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                <div class="card-body items-center py-8 gap-3">
                    <p class="font-bold text-base" style="color: var(--mc-text);">এখনও প্রশ্ন আছে?</p>
                    <p class="text-sm" style="color: var(--mc-text-muted);">আমাদের সাপোর্ট টিম সবসময় আপনার পাশে আছে।
                    </p>
                    <a href="{{ route('contact') }}"
                        class="btn text-white border-0 font-bold hover:-translate-y-0.5 transition-all duration-200 mt-1"
                        style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 4px 14px rgba(26,153,143,0.28);">
                        যোগাযোগ করুন →
                    </a>
                </div>
            </div>

        </section>
    </div>

    <script>
        // Stagger fade-in on load
        document.querySelectorAll('.faq-item').forEach((el, i) => {
            setTimeout(() => {
                el.style.transition = 'opacity 0.35s ease, transform 0.35s ease, box-shadow 0.22s ease, border-color 0.22s ease';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, i * 50);
        });

        // Accordion toggle
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const item   = btn.closest('.faq-item');
        const answer = item.querySelector('.faq-answer');
        const arrow  = item.querySelector('.faq-arrow');
        const isOpen = item.dataset.open === 'true';

        // Close all
        document.querySelectorAll('.faq-item').forEach(i => {
            i.dataset.open = 'false';
            i.querySelector('.faq-answer').style.maxHeight = '0';
            i.querySelector('.faq-arrow').style.transform = 'rotate(0deg)';
            i.querySelector('.faq-btn').style.color = 'var(--mc-text-sub)';
            i.style.borderColor = 'var(--mc-border-teal-sub)';
        });

        // Open clicked
        if (!isOpen) {
            item.dataset.open = 'true';
            answer.style.maxHeight = answer.scrollHeight + 'px';
            arrow.style.transform = 'rotate(180deg)';
            btn.style.color = 'var(--mc-primary)';
            item.style.borderColor = 'var(--mc-border-teal)';
        }
    });
});
    </script>
</x-layout>