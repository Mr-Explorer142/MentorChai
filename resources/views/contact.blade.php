<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">
        <section class="max-w-6xl mx-auto px-4 sm:px-5 py-8 sm:py-16 md:py-24">

            {{-- Section Header --}}
            <div class="text-center mb-8 sm:mb-16">
                <span class="badge badge-outline font-bold uppercase tracking-widest text-[10px] sm:text-xs px-3 py-2 sm:px-4 sm:py-3 mb-2 sm:mb-4"
                    style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                    📬 CONNECT
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold mt-2 sm:mt-4"
                    style="color: var(--mc-text); font-family: 'Lora', serif;">
                    Contact Us
                </h2>
                <div class="mx-auto mt-3 sm:mt-5 mb-3 sm:mb-5 h-1 w-12 sm:w-16 rounded-full"
                    style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
                <p class="text-xs sm:text-sm max-w-sm mx-auto leading-relaxed" style="color: var(--mc-text-muted);">
                    We are always ready at your service. Connect with us through any platform.
                </p>
            </div>

            {{-- Row 1: Phone + Support Email + Business Email --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-5 mb-3.5 sm:mb-5">

                {{-- Phone --}}
                <div class="card border hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                    <div class="card-body p-4 sm:p-6 gap-3 sm:gap-4">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-10 h-10 sm:w-[52px] sm:h-[52px] rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                                style="background: rgba(26,153,143,0.13);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="#1A9998">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.636a2.25 2.25 0 00-1.72-2.184l-2.51-.627a2.25 2.25 0 00-2.54 1.09l-.53.928a12.035 12.035 0 01-5.318-5.318l.928-.53a2.25 2.25 0 001.09-2.54l-.627-2.51A2.25 2.25 0 007.386 2.25H4.75A2.25 2.25 0 002.5 4.5v2.25z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-0.5" style="color: var(--mc-text-muted);">Mobile Number</p>
                                <p class="font-bold text-base sm:text-lg" style="color: var(--mc-text);">012345678901</p>
                            </div>
                        </div>
                        <p class="text-[11px] sm:text-xs leading-relaxed" style="color: var(--mc-text-muted);">Call us directly anytime, day or night</p>
                        <div class="flex gap-2 flex-wrap pt-0.5 sm:pt-1">
                            <a href="tel:012345678901"
                                class="btn btn-xs sm:btn-sm font-semibold text-xs px-4 sm:px-5 border-0 text-white hover:-translate-y-0.5 transition-all duration-200"
                                style="background: linear-gradient(135deg, #1A9998, #155665);">
                                📞 Call Now
                            </a>
                            <button class="btn btn-xs sm:btn-sm btn-ghost border text-xs px-3 sm:px-4 copy-btn" data-copy="012345678901"
                                style="border-color: var(--mc-border-teal-sub); color: var(--mc-text-muted);">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Support Email --}}
                <div class="card border hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                    <div class="card-body p-4 sm:p-6 gap-3 sm:gap-4">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-10 h-10 sm:w-[52px] sm:h-[52px] rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                                style="background: rgba(24,127,135,0.13);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="#187F87">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 6v.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V6m0 0a3 3 0 013-3h6a3 3 0 013 3m-12 0H3.375c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125V7.125C21.75 6.504 21.246 6 20.625 6H19.5" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-1.5 sm:gap-2 mb-0.5">
                                    <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest" style="color: var(--mc-text-muted);">Support Email</p>
                                    <span class="text-[10px] sm:text-xs font-semibold px-2 py-0.5 rounded-full" style="background: rgba(26,153,143,0.12); color: #1A9998;">Help</span>
                                </div>
                                <p class="font-bold text-xs sm:text-sm truncate" style="color: var(--mc-text);">support@xyz.com</p>
                            </div>
                        </div>
                        <p class="text-[11px] sm:text-xs leading-relaxed" style="color: var(--mc-text-muted);">Email our support team for any issues or queries</p>
                        <div class="flex gap-2 flex-wrap pt-0.5 sm:pt-1">
                            <a href="mailto:support@xyz.com"
                                class="btn btn-xs sm:btn-sm font-semibold text-xs px-4 sm:px-5 border-0 text-white hover:-translate-y-0.5 transition-all duration-200"
                                style="background: linear-gradient(135deg, #187F87, #155665);">
                                ✉️ Email Us
                            </a>
                            <button class="btn btn-xs sm:btn-sm btn-ghost border text-xs px-3 sm:px-4 copy-btn" data-copy="support@xyz.com"
                                style="border-color: var(--mc-border-teal-sub); color: var(--mc-text-muted);">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Business Email --}}
                <div class="card border hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                    <div class="card-body p-4 sm:p-6 gap-3 sm:gap-4">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-10 h-10 sm:w-[52px] sm:h-[52px] rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                                style="background: rgba(21,86,101,0.13);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="#155665">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.073a2.25 2.25 0 01-2.25 2.25h-12a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 016 4.5h4.5M18 4.5l-6 6m6-6h-4.5M18 4.5v4.5" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-1.5 sm:gap-2 mb-0.5">
                                    <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest" style="color: var(--mc-text-muted);">Business Email</p>
                                    <span class="text-[10px] sm:text-xs font-semibold px-2 py-0.5 rounded-full" style="background: rgba(21,86,101,0.12); color: #155665;">Business</span>
                                </div>
                                <p class="font-bold text-xs sm:text-sm truncate" style="color: var(--mc-text);">business@xyz.com</p>
                            </div>
                        </div>
                        <p class="text-[11px] sm:text-xs leading-relaxed" style="color: var(--mc-text-muted);">Contact this email for partnerships, agreements, or business proposals</p>
                        <div class="flex gap-2 flex-wrap pt-0.5 sm:pt-1">
                            <a href="mailto:business@xyz.com"
                                class="btn btn-xs sm:btn-sm font-semibold text-xs px-4 sm:px-5 border-0 text-white hover:-translate-y-0.5 transition-all duration-200"
                                style="background: linear-gradient(135deg, #155665, #102E3C);">
                                ✉️ Email Us
                            </a>
                            <button class="btn btn-xs sm:btn-sm btn-ghost border text-xs px-3 sm:px-4 copy-btn" data-copy="business@xyz.com"
                                style="border-color: var(--mc-border-teal-sub); color: var(--mc-text-muted);">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Row 2: WhatsApp | Telegram | Facebook --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 sm:gap-5 mb-3.5 sm:mb-5">

                {{-- WhatsApp --}}
                <a href="https://wa.me/8801234567890" target="_blank" rel="noopener noreferrer"
                    class="card border group hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); text-decoration: none;">
                    <div class="card-body p-3.5 sm:p-5 items-center text-center gap-2 sm:gap-3">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-full flex items-center justify-center"
                            style="background: rgba(37,211,102,0.13);">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="#25D366">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.523 5.854L0 24l6.278-1.496A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.808 9.808 0 01-5.01-1.377l-.36-.213-3.726.977.996-3.638-.234-.374A9.786 9.786 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm" style="color: var(--mc-text);">WhatsApp</p>
                            <p class="text-[10px] sm:text-xs mt-0.5 sm:mt-1" style="color: var(--mc-text-muted);">012345678901</p>
                        </div>
                        <p class="text-[10px] sm:text-xs leading-relaxed text-center" style="color: var(--mc-text-muted);">Message on Whatsapp for a quick response</p>
                        <span class="text-[10px] sm:text-xs font-semibold px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full"
                            style="background: rgba(37,211,102,0.13); color: #15803d;">Chat →</span>
                    </div>
                </a>

                {{-- Telegram --}}
                <a href="https://t.me/yourusername" target="_blank" rel="noopener noreferrer"
                    class="card border group hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); text-decoration: none;">
                    <div class="card-body p-3.5 sm:p-5 items-center text-center gap-2 sm:gap-3">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-full flex items-center justify-center"
                            style="background: rgba(38,169,224,0.13);">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="#26A9E0">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.19 13.982l-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.958.577z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm" style="color: var(--mc-text);">Telegram</p>
                            <p class="text-[10px] sm:text-xs mt-0.5 sm:mt-1" style="color: var(--mc-text-muted);">@yourusername</p>
                        </div>
                        <p class="text-[10px] sm:text-xs leading-relaxed text-center" style="color: var(--mc-text-muted);">Follow our Telegram channel to get the latest updates first</p>
                        <span class="text-[10px] sm:text-xs font-semibold px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full"
                            style="background: rgba(38,169,224,0.13); color: #0369a1;">Message →</span>
                    </div>
                </a>

                {{-- Facebook --}}
                <a href="https://facebook.com/yourpage" target="_blank" rel="noopener noreferrer"
                    class="card border group hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); text-decoration: none;">
                    <div class="card-body p-3.5 sm:p-5 items-center text-center gap-2 sm:gap-3">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-full flex items-center justify-center"
                            style="background: rgba(24,119,242,0.13);">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-xs sm:text-sm" style="color: var(--mc-text);">Facebook Page</p>
                            <p class="text-[10px] sm:text-xs mt-0.5 sm:mt-1" style="color: var(--mc-text-muted);">fb.com/yourpage</p>
                        </div>
                        <p class="text-[10px] sm:text-xs leading-relaxed text-center" style="color: var(--mc-text-muted);">Follow our Facebook page for regular offers and updates</p>
                        <span class="text-[10px] sm:text-xs font-semibold px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full"
                            style="background: rgba(24,119,242,0.13); color: #1d4ed8;">View Page →</span>
                    </div>
                </a>
            </div>

            {{-- Row 3: Address (full width) --}}
            <div class="mb-6 sm:mb-14">
                <div class="card border hover:-translate-y-1 transition-all duration-300 rounded-xl sm:rounded-2xl"
                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
                    <div class="card-body p-4 sm:p-6 flex-col sm:flex-row flex-wrap sm:items-center gap-3 sm:gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 sm:w-[52px] sm:h-[52px] rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                                style="background: rgba(21,86,101,0.13);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="#155665">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-0.5 sm:mb-1" style="color: var(--mc-text-muted);">Our Address</p>
                                <p class="font-bold text-xs sm:text-base leading-snug" style="color: var(--mc-text);">123 Business Avenue, Uttara, Dhaka 1230, Bangladesh</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z"
                            target="_blank" rel="noopener noreferrer"
                            class="btn btn-xs sm:btn-sm font-semibold text-xs px-4 sm:px-5 border hover:-translate-y-0.5 transition-all duration-200 shrink-0 w-full sm:w-auto text-center justify-center"
                            style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(26,153,143,0.08);">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                            View on Google Maps
                        </a>
                    </div>
                </div>
            </div>

            {{-- Map --}}
            <a href="https://www.google.com/maps/place/Uttara,+Dhaka/@23.8766874,90.3576454,14z"
                target="_blank" rel="noopener noreferrer" class="block group">
                <div class="relative rounded-xl sm:rounded-2xl overflow-hidden w-full border h-48 sm:h-[300px]"
                    style="border-color: var(--mc-border-teal); box-shadow: var(--mc-shadow-md);">
                    <img src="{{ asset('images/Contact Page/map.png') }}" alt="Location Map"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute bottom-0 left-0 right-0 flex items-end justify-between p-3 sm:p-5"
                        style="background: linear-gradient(to top, rgba(16,46,60,0.65) 0%, transparent 60%);">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full shrink-0" style="background:#1A9998; display:inline-block;"></span>
                            <span class="text-xs sm:text-sm font-bold text-white">Uttara, Dhaka 1230</span>
                        </div>
                        <span class="text-[10px] sm:text-xs font-semibold px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-full text-white border border-white/30"
                            style="background: rgba(26,153,143,0.45); backdrop-filter: blur(4px);">
                            Open Google Maps ↗
                        </span>
                    </div>
                </div>
            </a>

        </section>
    </div>

    <script>
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const text = btn.dataset.copy;
                navigator.clipboard.writeText(text).then(() => {
                    const original = btn.innerHTML;
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg> Copied`;
                    btn.style.color = '#1A9998';
                    setTimeout(() => {
                        btn.innerHTML = original;
                        btn.style.color = '';
                    }, 2000);
                });
            });
        });
    </script>
</x-layout>