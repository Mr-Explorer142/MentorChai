<x-layout>
    <div class="min-h-screen flex items-center justify-center p-3 sm:p-6 md:p-10 py-6 sm:py-10"
        style="background: linear-gradient(135deg, var(--mc-bg) 0%, var(--mc-surface) 60%, var(--mc-bg) 100%);">

        {{-- Subtle grid texture --}}
        <div class="fixed inset-0 pointer-events-none opacity-[0.03] dark:opacity-[0.015]"
            style="background-image: linear-gradient(var(--mc-primary) 1px, transparent 1px), linear-gradient(90deg, var(--mc-primary) 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="w-full max-w-2xl relative z-10">

            {{-- Header --}}
            <div class="text-center mb-6 sm:mb-8">
                <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl mb-2.5 sm:mb-4"
                    style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,143,0.3);">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                <h2 class="text-xl sm:text-3xl font-bold" style="font-family:'Lora',serif; color: var(--mc-text);">
                    Session Request
                </h2>
                <p class="text-xs sm:text-sm mt-1" style="color: var(--mc-text-muted);">Send a session request to the mentor</p>
            </div>

            {{-- Main Card --}}
            <div class="rounded-xl sm:rounded-2xl border shadow-xl overflow-hidden transition-colors duration-300"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-lg);">

                {{-- Card Top Accent --}}
                <div class="h-1.5 w-full" style="background: linear-gradient(90deg, #1A9998, #155665);"></div>

                <div class="p-4 sm:p-8 space-y-4 sm:space-y-6">

                    {{-- Student & Mentor Info --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">

                        {{-- Student Info --}}
                        <div class="rounded-xl p-3 sm:p-4 border transition-colors duration-300"
                            style="background: var(--mc-surface-hover); border-color: var(--mc-border-teal-sub);">
                            <h3 class="font-bold text-[10px] sm:text-xs uppercase tracking-widest mb-2 sm:mb-3 flex items-center gap-1.5 sm:gap-2"
                                style="color: var(--mc-primary);">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                Requesting Student
                            </h3>
                            <div class="flex items-center gap-2.5 sm:gap-3">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-xs sm:text-sm font-bold shrink-0"
                                    style="background: var(--mc-border-teal); color: var(--mc-primary);">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-bold truncate" style="color: var(--mc-text);">{{ auth()->user()->name
                                        }}</p>
                                    <p class="text-[11px] sm:text-xs truncate" style="color: var(--mc-text-muted);">{{ auth()->user()->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Mentor Info --}}
                        <div class="rounded-xl p-3 sm:p-4 border transition-colors duration-300"
                            style="background: var(--mc-surface-hover); border-color: var(--mc-border-teal-sub);">
                            <h3 class="font-bold text-[10px] sm:text-xs uppercase tracking-widest mb-2 sm:mb-3 flex items-center gap-1.5 sm:gap-2"
                                style="color: var(--mc-text-muted);">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                Selected Mentor
                            </h3>
                            <div class="flex items-center gap-2.5 sm:gap-3">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-xs sm:text-sm font-bold shrink-0"
                                    style="background: var(--mc-border); color: var(--mc-text-sub);">
                                    {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-bold truncate" style="color: var(--mc-text);">{{ $mentor->name }}</p>
                                    <p class="text-[11px] sm:text-xs truncate" style="color: var(--mc-text-muted);">
                                        {{ $mentor->profile?->institution_name ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3 my-2 sm:my-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border-teal-sub);"></div>
                        <span class="text-[10px] sm:text-xs font-semibold uppercase tracking-widest"
                            style="color: var(--mc-text-muted); opacity: 0.7;">Session Details</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border-teal-sub);"></div>
                    </div>

                    {{-- Session Request Form --}}
                    <form method="POST" action="{{ route('session.request.store') }}" class="space-y-4 sm:space-y-5">
                        @csrf

                        {{-- Hidden mentor id --}}
                        <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">

                        {{-- Topic Dropdown --}}
                        <div>
                            <label class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-1.5 sm:mb-2"
                                style="color: var(--mc-text-sub);">
                                Session Topic
                            </label>
                            <div class="relative">
                                <select name="topic" id="topicSelect" required
                                    class="w-full appearance-none rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 pr-10 text-xs sm:text-sm focus:outline-none focus:ring-2 transition-colors duration-200 cursor-pointer border"
                                    style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); color: var(--mc-text); ring-color: var(--mc-primary);"
                                    onfocus="this.style.borderColor='var(--mc-primary)'"
                                    onblur="this.style.borderColor='var(--mc-border-teal-sub)'">
                                    <option value="" disabled selected style="color: var(--mc-text-muted);">- Choose Topic -</option>
                                    @if (!empty($mentor->profile?->skills))
                                    @foreach (explode(',', $mentor->profile->skills) as $skill)
                                    <option value="{{ trim($skill) }}"
                                        style="background: var(--mc-surface); color: var(--mc-text);">
                                        {{ trim($skill) }}
                                    </option>
                                    @endforeach
                                    @else
                                    <option disabled style="color: var(--mc-text-muted);">No skills added</option>
                                    @endif
                                </select>
                                {{-- Dropdown arrow --}}
                                <div class="pointer-events-none absolute inset-y-0 right-3.5 sm:right-4 flex items-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" style="color: var(--mc-primary);">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('topic')
                            <p class="text-xs text-red-500 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Duration Dropdown --}}
                        <div>
                            <label class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-1.5 sm:mb-2"
                                style="color: var(--mc-text-sub);">
                                Session Duration
                            </label>
                            <div class="relative">
                                <select name="duration_hours" id="durationSelect" required class="w-full appearance-none rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 pr-10 text-xs sm:text-sm
                                           focus:outline-none focus:ring-2 transition-colors duration-200
                                           cursor-pointer border" style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub);
                                           color: var(--mc-text);" onfocus="this.style.borderColor='var(--mc-primary)'"
                                    onblur="this.style.borderColor='var(--mc-border-teal-sub)'"
                                    onchange="calculateTotal()">
                                    <option value="1">1 Hour</option>
                                    <option value="2">2 Hours</option>
                                    <option value="3">3 Hours</option>
                                    <option value="4">4 Hours</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3.5 sm:right-4 flex items-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" style="color: var(--mc-primary);">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Hourly Rate + Total Calculation --}}
                        <div class="rounded-xl border transition-colors duration-300 overflow-hidden"
                            style="border-color: var(--mc-border-teal);">

                            {{-- Rate row --}}
                            <div class="flex items-center justify-between px-3.5 py-2.5 sm:px-4 sm:py-3"
                                style="background: var(--mc-surface-hover);">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" style="color: var(--mc-primary);">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75" />
                                    </svg>
                                    <p class="text-xs sm:text-sm" style="color: var(--mc-text-sub);">Hourly Rate</p>
                                </div>
                                <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-primary);">
                                    ৳{{ $mentor->profile?->hourly_rate ?? '0' }}
                                </p>
                            </div>

                            {{-- Divider --}}
                            <div class="h-px" style="background-color: var(--mc-border-teal-sub);"></div>

                            {{-- Total row --}}
                            <div class="flex items-center justify-between px-3.5 py-2.5 sm:px-4 sm:py-3"
                                style="background: rgba(26,153,143,0.06);">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" style="color: var(--mc-primary);">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                                    </svg>
                                    <p class="text-xs sm:text-sm font-bold" style="color: var(--mc-text);">Total Payable</p>
                                </div>
                                <p class="text-base sm:text-lg font-bold" id="totalAmount" style="color: var(--mc-primary);">
                                    ৳{{ $mentor->profile?->hourly_rate ?? '0' }}
                                </p>
                            </div>

                        </div>

                        {{-- Note / Message --}}
                        <div>
                            <label class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-1.5 sm:mb-2"
                                style="color: var(--mc-text-sub);">
                                Message / Note
                                <span class="font-normal normal-case tracking-normal"
                                    style="opacity: 0.6;">(Optional)</span>
                            </label>
                            <textarea name="note" rows="3"
                                placeholder="Tell the mentor about your problem or requirement..."
                                class="w-full rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 transition-colors duration-200 resize-none border border-[#ccecee] dark:border-[#1f4f54] placeholder:text-gray-400 dark:placeholder:text-gray-500"
                                style="background: var(--mc-surface); color: var(--mc-text);">{{ old('note') }}</textarea>
                        </div>

                        {{-- Status Info Badge --}}
                        <div class="flex items-start gap-2 sm:gap-2.5 px-3.5 py-2.5 sm:px-4 sm:py-3 rounded-xl border transition-colors duration-300"
                            style="background: rgba(245, 158, 11, 0.06); border-color: rgba(245, 158, 11, 0.25);">
                            <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <div>
                                <p class="text-xs font-bold mb-0.5 text-amber-600 dark:text-amber-400">Request will be Pending</p>
                                <p class="text-[11px] sm:text-xs leading-relaxed text-amber-700 dark:text-amber-500/90">
                                    After sending your request, the session will be confirmed once the mentor approves it.
                                    Payment is to be made only after approval.
                                </p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="h-px" style="background-color: var(--mc-border-teal-sub);"></div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
                            <a href="{{ route('mentor_profile', $mentor->id) }}"
                                class="flex-1 text-center py-2.5 sm:py-3 rounded-xl text-xs sm:text-sm font-semibold border transition-colors duration-200"
                                style="border-color: var(--mc-border-teal-sub); color: var(--mc-text-sub); background: transparent;"
                                onmouseover="this.style.background='var(--mc-surface-hover)'"
                                onmouseout="this.style.background='transparent'">
                                &larr; Go Back
                            </a>
                            <button type="submit" id="submitBtn" disabled class="flex-1 py-2.5 sm:py-3 rounded-xl text-xs sm:text-sm font-bold text-white
               flex items-center justify-center gap-2
               transition-all duration-200 cursor-not-allowed opacity-50" style="background: linear-gradient(135deg, #1A9998, #155665);
               box-shadow: 0 6px 20px rgba(26,153,143,0.3);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                Send Request
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            {{-- Footer note --}}
            <p class="text-center text-xs mt-6 flex items-center justify-center gap-1.5"
                style="color: var(--mc-text-muted); opacity: 0.8;">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                Your information is secure and will only be shared with the mentor
            </p>

        </div>
    </div>

    @push('scripts')
    <script>
        const hourlyRate = {{ (float) ($mentor->profile?->hourly_rate ?? 0) }};

    const topicSelect    = document.getElementById('topicSelect');
    const durationSelect = document.getElementById('durationSelect');
    const submitBtn      = document.getElementById('submitBtn');

    function calculateTotal() {
        const hours = parseInt(durationSelect.value) || 1;
        const total = hourlyRate * hours;
        document.getElementById('totalAmount').textContent =
            '৳' + total.toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
    }

    function validateForm() {
        const topicSelected   = topicSelect.value !== '';
        const durationSelected = durationSelect.value !== '';

        if (topicSelected && durationSelected) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.add('hover:opacity-90', 'hover:-translate-y-0.5', 'cursor-pointer');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.remove('hover:opacity-90', 'hover:-translate-y-0.5');
        }

        calculateTotal();
    }

    topicSelect.addEventListener('change', validateForm);
    durationSelect.addEventListener('change', validateForm);

    // Run on load
    validateForm();
    </script>
    @endpush

</x-layout>
