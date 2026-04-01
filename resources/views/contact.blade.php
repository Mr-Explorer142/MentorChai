<x-layout>
    <style>
        .contact-card {
            background: white;
            border-radius: 16px;
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            border: 1px solid rgba(40, 102, 110, 0.1);
            box-shadow: 0 2px 10px rgba(40, 102, 110, 0.06);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
            cursor: default;
        }

        .contact-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(40, 102, 110, 0.13);
        }

        .contact-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .copy-btn {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            color: rgba(40, 102, 110, 0.35);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            border-radius: 8px;
            transition: color 0.15s, background 0.15s;
        }

        .copy-btn:hover {
            color: #28666e;
            background: rgba(40, 102, 110, 0.08);
        }

        .copy-btn.copied {
            color: #28666e;
        }

        .mc-input {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            border: 1.5px solid rgba(40, 102, 110, 0.2);
            background: rgba(238, 247, 248, 0.5);
            color: #033f63;
            font-size: 0.9rem;
            font-family: 'Nunito', sans-serif;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .mc-input::placeholder {
            color: rgba(3, 63, 99, 0.4);
        }

        .mc-input:focus {
            border-color: #28666e;
            box-shadow: 0 0 0 3px rgba(40, 102, 110, 0.1);
            background: white;
        }

        .mc-textarea {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            border: 1.5px solid rgba(40, 102, 110, 0.2);
            background: rgba(238, 247, 248, 0.5);
            color: #033f63;
            font-size: 0.9rem;
            font-family: 'Nunito', sans-serif;
            outline: none;
            resize: vertical;
            min-height: 130px;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .mc-textarea::placeholder {
            color: rgba(3, 63, 99, 0.4);
        }

        .mc-textarea:focus {
            border-color: #28666e;
            box-shadow: 0 0 0 3px rgba(40, 102, 110, 0.1);
            background: white;
        }

        .mc-submit {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            background: #28666e;
            color: white;
            font-weight: 700;
            font-size: 0.95rem;
            font-family: 'Nunito', sans-serif;
            border: none;
            cursor: pointer;
            transition: background 0.18s, box-shadow 0.18s, transform 0.15s;
            letter-spacing: 0.2px;
        }

        .mc-submit:hover {
            background: #1a4a52;
            box-shadow: 0 6px 18px rgba(40, 102, 110, 0.28);
            transform: translateY(-1px);
        }

        .mc-submit:active {
            transform: translateY(0);
        }
    </style>

    <div class="min-h-screen" style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfE 60%, #f0f9f4 100%);">
        <section class="max-w-6xl mx-auto px-5 py-16 md:py-20">

            {{-- Section Header --}}
            <div class="text-center mb-14">
                <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color: #28666e;">📬 সংযোগ</p>
                <h2 class="text-3xl md:text-4xl font-bold" style="color: #033f63; font-family: 'Lora', serif;">
                    যোগাযোগ করুন
                </h2>
                <p class="mt-3 text-sm" style="color: rgba(3,63,99,0.55);">
                    আমরা সবসময় আপনার পাশে আছি — যেকোনো প্রশ্নে নির্দ্বিধায় লিখুন
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-8 items-start">

                {{-- LEFT: Contact Info Cards --}}
                <div class="w-full md:w-5/12 flex flex-col gap-4 order-2 md:order-1">

                    {{-- Phone --}}
                    <div class="contact-card">
                        <div class="contact-card-icon" style="background: rgba(59, 130, 246, 0.1);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#3b82f6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.636a2.25 2.25 0 00-1.72-2.184l-2.51-.627a2.25 2.25 0 00-2.54 1.09l-.53.928a12.035 12.035 0 01-5.318-5.318l.928-.53a2.25 2.25 0 001.09-2.54l-.627-2.51A2.25 2.25 0 007.386 2.25H4.75A2.25 2.25 0 002.5 4.5v2.25z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm" style="color: #033f63;">মোবাইল</p>
                            <p class="text-sm mt-0.5" style="color: rgba(3,63,99,0.6);">+8801122334455</p>
                        </div>
                        <button class="copy-btn" data-copy="+8801122334455" title="কপি করুন">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- Email --}}
                    <div class="contact-card">
                        <div class="contact-card-icon" style="background: rgba(236, 72, 153, 0.1);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#ec4899">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.375L2.25 6.75" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm" style="color: #033f63;">ই-মেইল</p>
                            <p class="text-sm mt-0.5" style="color: rgba(3,63,99,0.6);">abcd@example.com</p>
                        </div>
                        <button class="copy-btn" data-copy="abcd@example.com" title="কপি করুন">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- WhatsApp / Telegram --}}
                    <div class="contact-card">
                        <div class="contact-card-icon" style="background: rgba(34, 197, 94, 0.1);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#22c55e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12a9.75 9.75 0 1117.812 5.567L21.75 21l-3.433-1.688A9.708 9.708 0 0112 21.75c-5.385 0-9.75-4.365-9.75-9.75z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm" style="color: #033f63;">টেলিগ্রাম / ওয়াটস্যাপ</p>
                            <p class="text-sm mt-0.5" style="color: rgba(3,63,99,0.6);">+8801122334455</p>
                        </div>
                        <button class="copy-btn" data-copy="+8801122334455" title="কপি করুন">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- Location --}}
                    <div class="contact-card">
                        <div class="contact-card-icon" style="background: rgba(234, 179, 8, 0.1);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#eab308">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm" style="color: #033f63;">ঠিকানা</p>
                            <p class="text-sm mt-0.5" style="color: rgba(3,63,99,0.6);">123 Business Avenue, Dhaka</p>
                        </div>
                        <button class="copy-btn" data-copy="123 Business Avenue, Dhaka" title="কপি করুন">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>

                </div>

                {{-- RIGHT: Contact Form --}}
                <div class="w-full md:w-7/12 order-1 md:order-2">
                    <div class="bg-white rounded-2xl p-7 md:p-8"
                        style="border: 1px solid rgba(40,102,110,0.1); box-shadow: 0 4px 24px rgba(40,102,110,0.08);">

                        <h3 class="font-bold text-lg mb-6" style="color: #033f63; font-family: 'Lora', serif;">
                            সরাসরি মেসেজ পাঠান
                        </h3>

                        <form class="flex flex-col gap-3.5">
                            <input type="text" placeholder="সম্পূর্ণ নাম দিন" class="mc-input" />
                            <input type="email" placeholder="ই-মেইল দিন" class="mc-input" />
                            <input type="text" placeholder="বিষয় লিখুন" class="mc-input" />
                            <textarea placeholder="মেসেজ লিখুন..." class="mc-textarea"></textarea>
                            <button type="submit" class="mc-submit">
                                মেসেজ পাঠান →
                            </button>
                        </form>

                    </div>
                </div>

            </div>

            {{-- Map --}}
            <div class="mt-14 text-center">
                <p class="text-sm font-semibold mb-4" style="color: rgba(3,63,99,0.6);">
                    📍 আমাদের খুঁজে পেতে গুগল ম্যাপের সহায়তা নিন
                </p>
                <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z/data=!3m1!4b1!4m6!3m5!1s0x3755c5d05e7074dd:0xd1c58803049f00c7!8m2!3d23.8758547!4d90.3795438!16s%2Fm%2F02phgnn?entry=ttu&g_ep=EgoyMDI2MDEwNy4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank" rel="noopener noreferrer">
                    <div class="rounded-2xl overflow-hidden inline-block w-full max-w-3xl"
                        style="height: 260px; border: 1px solid rgba(40,102,110,0.12); box-shadow: 0 4px 20px rgba(40,102,110,0.1);">
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
                btn.classList.add('copied');
                const original = btn.innerHTML;
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>`;
                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.classList.remove('copied');
                }, 2000);
            });
        });
    });
    </script>
</x-layout>
