<x-layout>
    <style>
        .faq-item {
            background: white;
            border-radius: 16px;
            border: 1px solid rgba(40, 102, 110, 0.1);
            box-shadow: 0 2px 10px rgba(40, 102, 110, 0.05);
            overflow: hidden;
            transition: box-shadow 0.22s ease;
        }

        .faq-item:hover {
            box-shadow: 0 6px 22px rgba(40, 102, 110, 0.11);
        }

        .faq-item.open {
            border-color: rgba(40, 102, 110, 0.25);
            box-shadow: 0 6px 22px rgba(40, 102, 110, 0.11);
        }

        .faq-question {
            width: 100%;
            text-align: left;
            padding: 1.2rem 1.4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            background: none;
            border: none;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            color: #033f63;
            transition: color 0.2s;
        }

        .faq-question:hover {
            color: #28666e;
        }

        .faq-item.open .faq-question {
            color: #28666e;
        }

        .faq-arrow {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            color: #28666e;
            transition: transform 0.3s cubic-bezier(.4, 0, .2, 1);
        }

        .faq-item.open .faq-arrow {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(.4, 0, .2, 1), padding 0.25s;
        }

        .faq-answer-inner {
            padding: 0 1.4rem 1.2rem;
            font-size: 0.9rem;
            line-height: 1.8;
            color: rgba(3, 63, 99, 0.75);
            border-top: 1px solid rgba(40, 102, 110, 0.08);
            padding-top: 1rem;
        }

        .faq-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.7rem;
            font-weight: 700;
            color: #28666e;
            background: rgba(40, 102, 110, 0.08);
            border-radius: 999px;
            padding: 0.25rem 0.7rem;
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-item {
            animation: fadeUp 0.35s ease both;
        }

        .faq-item:nth-child(1) {
            animation-delay: 0.04s;
        }

        .faq-item:nth-child(2) {
            animation-delay: 0.08s;
        }

        .faq-item:nth-child(3) {
            animation-delay: 0.12s;
        }

        .faq-item:nth-child(4) {
            animation-delay: 0.16s;
        }

        .faq-item:nth-child(5) {
            animation-delay: 0.20s;
        }

        .faq-item:nth-child(6) {
            animation-delay: 0.24s;
        }

        .faq-item:nth-child(7) {
            animation-delay: 0.28s;
        }

        .faq-item:nth-child(8) {
            animation-delay: 0.32s;
        }

        .faq-item:nth-child(9) {
            animation-delay: 0.36s;
        }
    </style>

    <div style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfE 60%, #f0f9f4 100%); min-height: 100vh;">

        {{-- Header --}}
        <section class="max-w-3xl mx-auto px-5 pt-16 pb-10 text-center">
            <div class="faq-badge">❓ সহায়তা কেন্দ্র</div>
            <h1 class="text-3xl md:text-4xl font-bold mb-4"
                style="color: #033f63; font-family: 'Lora', serif; line-height: 1.25;">
                প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী
            </h1>
            <p class="text-sm" style="color: rgba(3,63,99,0.55); max-width: 520px; margin: 0 auto;">
                আপনাদের সবচেয়ে সাধারণ প্রশ্নগুলোর উত্তর এখানে একসাথে পাবেন।
                না পেলে আমাদের <a href="{{ route('contact') }}"
                    style="color: #28666e; font-weight: 700; text-decoration: underline;">যোগাযোগ করুন</a>।
            </p>
        </section>

        {{-- FAQ List --}}
        <section class="max-w-3xl mx-auto px-5 pb-20 flex flex-col gap-3">

            {{-- Item 1 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>আমি কোন কোন বিষয় কিংবা টপিকের জন্য মেন্টর পাবো?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        আমাদের প্ল্যাটফর্মটি কোনো নির্দিষ্ট বিষয়, টপিক, ক্লাস বা ডিপার্টমেন্টের জন্য নয়, বরং সকল ধরনের
                        শিক্ষার্থীদের জন্য ডেভেলপ করা হয়েছে। আমাদের প্ল্যাটফর্মে প্রতিনিয়ত নতুন মেন্টর যুক্ত হচ্ছেন
                        এবং নিয়মিত বিভিন্ন নতুন টপিক সংযুক্ত হচ্ছে। যদি কোনো নির্দিষ্ট টপিকের জন্য আপনার মেন্টর
                        প্রয়োজন হয় কিন্তু সেটি আমাদের টপিকলিস্টে অ্যাভেইলেবল না থাকে, সেক্ষেত্রে আপনি নিজ অ্যাকাউন্ট
                        থেকে আমাদের কাছে রিকুয়েষ্ট রাখতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 2 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>প্রতি সেশনের পেমেন্ট কীভাবে নির্ধারণ করা হয়?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        আপনি ৩০ মিনিট, ৪৫ মিনিট, ১ ঘন্টা বা প্রয়োজনীয় যেকোনো সময়সীমার জন্য মেন্টর বুক করতে পারবেন।
                        নির্দিষ্ট সময়সীমার জন্য নির্দিষ্ট মূল্য নির্ধারণ করা হয়েছে। আপনার যতটুকু সময়সীমা প্রয়োজন
                        শুধুমাত্র ততটুকুর জন্য পেমেন্ট করে আপনি মেন্টর বুক করতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 3 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>আমি কি দিনে কিংবা রাতে যেকোনো সময় মেন্টর বুক করতে পারবো?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        জি, আমাদের প্ল্যাটফর্মটি ২৪/৭ কার্যকর রয়েছে। আপনার যে টপিকটির জন্য মেন্টর প্রয়োজন সেই টপিকের
                        মেন্টরদের অ্যাভেইলেবিলিটির ভিত্তিতে দিনে কিংবা রাতে যেকোনো সময়েই আপনি মেন্টর বুক করতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 4 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>নির্দিষ্ট সময়ের সেশনের পর অতিরিক্ত সময় লাগলে করণীয় কী?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        যদি নির্ধারিত সময়ের পর অতিরিক্ত সময় প্রয়োজন হয়, সেক্ষেত্রে আলাদাভাবে অতিরিক্ত পেমেন্টের
                        মাধ্যমে সময়সীমা বৃদ্ধি করা যাবে।
                    </div>
                </div>
            </div>

            {{-- Item 5 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>কোনো টপিকে কোন মেন্টর অ্যাভেইলেবল — কীভাবে বুঝবো?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        আপনি অ্যাভেইলেবল এক্টিভ মেন্টরদের লিস্ট এবং তাদের ডিটেইলস দেখতে পাবেন। সেখান থেকে নিজের পছন্দমতো
                        যেকোনো মেন্টরকে বুক করতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 6 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>অনলাইন ভিডিও সেশনগুলো কীভাবে সঞ্চালিত হবে?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        আমাদের ওয়েবসাইট থেকে সরাসরি ভিডিও কলিংয়ের মাধ্যমে আপনাদের সেশনগুলো নেওয়া হবে।
                    </div>
                </div>
            </div>

            {{-- Item 7 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>পেমেন্ট কি সেশন শুরুর আগে, নাকি পরে করতে হবে?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        সেশন শুরুর পূর্বেই পেমেন্ট সম্পন্ন করতে হবে। মূলত পেমেন্ট করার মাধ্যমেই নির্দিষ্ট সময়ের জন্য
                        আপনি নির্দিষ্ট মেন্টরকে বুক করতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 8 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>MentorChai ব্যবহার করতে কোনো আলাদা সফটওয়্যার লাগবে?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        MentorChai ব্যবহার করতে আলাদা কোনো বিশেষ সফটওয়্যার প্রয়োজন নেই। আমাদের ওয়েবসাইটের মাধ্যমেই
                        সরাসরি সকল সুবিধা নিতে পারবেন।
                    </div>
                </div>
            </div>

            {{-- Item 9 --}}
            <div class="faq-item">
                <button class="faq-question">
                    <span>MentorChai-তে মেন্টর হিসাবে কীভাবে যুক্ত হতে পারি?</span>
                    <svg class="faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        মেন্টর হিসাবে যুক্ত হওয়ার নিয়মকানুন সম্পর্কে বিস্তারিত জানতে
                        <a href="https://example.com" target="_blank" rel="noopener noreferrer"
                            style="color: #28666e; font-weight: 700; text-decoration: underline;">
                            এই লিংকে ক্লিক করুন
                        </a>।
                    </div>
                </div>
            </div>

            {{-- Still have questions CTA --}}
            <div class="mt-6 text-center rounded-2xl p-8"
                style="background: white; border: 1px solid rgba(40,102,110,0.1); box-shadow: 0 2px 10px rgba(40,102,110,0.05);">
                <p class="font-bold text-base mb-1" style="color: #033f63;">এখনও প্রশ্ন আছে?</p>
                <p class="text-sm mb-4" style="color: rgba(3,63,99,0.55);">আমাদের সাপোর্ট টিম সবসময় আপনার পাশে আছে।</p>
                <a href="{{ route('contact') }}"
                    style="display: inline-flex; align-items: center; gap: 0.4rem; background: #28666e; color: white; font-weight: 700; font-size: 0.875rem; padding: 0.6rem 1.4rem; border-radius: 12px; text-decoration: none; transition: background 0.18s, box-shadow 0.18s;"
                    onmouseover="this.style.background='#1a4a52'; this.style.boxShadow='0 4px 14px rgba(40,102,110,0.28)'"
                    onmouseout="this.style.background='#28666e'; this.style.boxShadow='none'">
                    যোগাযোগ করুন →
                </a>
            </div>

        </section>
    </div>

    <script>
        document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
            const item   = btn.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const isOpen = item.classList.contains('open');

            // Close all
            document.querySelectorAll('.faq-item').forEach(i => {
                i.classList.remove('open');
                i.querySelector('.faq-answer').style.maxHeight = '0';
            });

            // Open clicked (if was closed)
            if (!isOpen) {
                item.classList.add('open');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
    </script>
</x-layout>
