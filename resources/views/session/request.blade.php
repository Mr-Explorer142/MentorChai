<x-layout>
    <div
        class="min-h-screen flex items-center justify-center p-5 md:p-10 transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- Subtle grid texture --}}
        <div class="fixed inset-0 pointer-events-none opacity-[0.03]"
            style="background-image: linear-gradient(#0d9488 1px, transparent 1px), linear-gradient(90deg, #0d9488 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="w-full max-w-2xl relative z-10">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4"
                    style="background: linear-gradient(135deg, #1A9998, #155665); box-shadow: 0 8px 24px rgba(26,153,143,0.3);">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">
                    সেশন অনুরোধ
                </h2>
                <p class="text-sm mt-1" style="color: var(--mc-text-muted);">মেন্টরের কাছে সেশনের জন্য অনুরোধ পাঠান</p>
            </div>

            {{-- Main Card --}}
            <div class="rounded-2xl border overflow-hidden" style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-md);">

                {{-- Card Top Accent --}}
                <div class="h-1.5 w-full" style="background: linear-gradient(90deg, #1A9998, #155665);"></div>

                <div class="p-6 sm:p-8 space-y-6">

                    {{-- Student & Mentor Info --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- Student Info --}}
                        <div class="rounded-xl p-4 border" style="background: rgba(26,153,143,0.05); border-color: var(--mc-border-teal-sub);">
                            <h3
                                class="font-bold text-xs uppercase tracking-widest mb-3 flex items-center gap-2" style="color: var(--mc-primary);">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                অনুরোধকারী শিক্ষার্থী
                            </h3>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center
                                            text-sm font-bold shrink-0" style="background: rgba(26,153,143,0.15); color: var(--mc-primary);">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold" style="color: var(--mc-text);">{{ auth()->user()->name }}</p>
                                    <p class="text-xs" style="color: var(--mc-text-muted);">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Mentor Info --}}
                        <div class="rounded-xl p-4 border" style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                            <h3
                                class="font-bold text-xs uppercase tracking-widest mb-3 flex items-center gap-2" style="color: var(--mc-text-muted);">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                নির্বাচিত মেন্টর
                            </h3>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center
                                            text-sm font-bold shrink-0" style="background: rgba(128,128,128,0.15); color: var(--mc-text);">
                                    {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold" style="color: var(--mc-text);">{{ $mentor->name }}</p>
                                    <p class="text-xs" style="color: var(--mc-text-muted);">
                                        {{ $mentor->profile?->institution_name ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: var(--mc-border-teal-sub);"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest" style="color: var(--mc-text-faint);">সেশনের বিবরণ</span>
                        <div class="flex-1 h-px" style="background-color: var(--mc-border-teal-sub);"></div>
                    </div>

                    {{-- Session Request Form --}}
                    <form method="POST" action="{{ route('session.request.store') }}" class="space-y-5">
                        @csrf

                        {{-- Hidden mentor id --}}
                        <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">

                        {{-- Topic Dropdown --}}
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest mb-2" style="color: var(--mc-text-muted);">
                                সেশনের বিষয় (টপিক)
                            </label>
                            <div class="relative">
                                <select name="topic" required
                                    class="w-full appearance-none border
                                               rounded-xl px-4 py-3 pr-10 text-sm
                                               focus:outline-none focus:ring-2 focus:ring-teal-400
                                               focus:border-teal-400 transition-colors duration-200
                                               cursor-pointer"
                                    style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text);">
                                    <option value="" disabled selected>— টপিক বেছে নিন —</option>
                                    @if (!empty($mentor->profile?->skills))
                                        @foreach (explode(',', $mentor->profile->skills) as $skill)
                                            <option value="{{ trim($skill) }}">{{ trim($skill) }}</option>
                                        @endforeach
                                    @else
                                        <option disabled>কোনো দক্ষতা যোগ করা হয়নি</option>
                                    @endif
                                </select>
                                {{-- Dropdown arrow --}}
                                <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center">
                                    <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('topic')
                                <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Hourly Rate Info --}}
                        <div class="flex items-center gap-3 px-4 py-3 rounded-xl border" style="background: rgba(26,153,143,0.05); border-color: var(--mc-border-teal-sub);">
                            <svg class="w-4 h-4 text-teal-500 shrink-0" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75" />
                            </svg>
                            <p class="text-sm" style="color: var(--mc-primary);">
                                এই মেন্টরের ঘণ্টা প্রতি রেট:
                                <span class="font-bold">
                                    ৳{{ $mentor->profile?->hourly_rate ?? '—' }}
                                </span>
                            </p>
                        </div>

                        {{-- Note / Message --}}
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest mb-2" style="color: var(--mc-text-muted);">
                                বার্তা / নোট
                                <span class="font-normal normal-case tracking-normal" style="color: var(--mc-text-faint);">(ঐচ্ছিক)</span>
                            </label>
                            <textarea name="note" rows="4" placeholder="মেন্টরকে আপনার সমস্যা বা প্রয়োজন সম্পর্কে জানান..."
                                class="w-full border rounded-xl
                                             px-4 py-3 text-sm
                                             focus:outline-none focus:ring-2 focus:ring-teal-400
                                             focus:border-teal-400 transition-colors duration-200
                                             resize-none"
                                style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub); color: var(--mc-text);">{{ old('note') }}</textarea>
                        </div>

                        {{-- Status Info Badge --}}
                        <div
                            class="flex items-start gap-2.5 px-4 py-3 rounded-xl border"
                            style="background: rgba(245, 158, 11, 0.05); border-color: rgba(245, 158, 11, 0.2);">
                            <svg class="w-4 h-4 text-amber-400 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <div>
                                <p class="text-xs font-bold text-amber-600 mb-0.5">অনুরোধ পেন্ডিং থাকবে</p>
                                <p class="text-xs text-amber-500 leading-relaxed">
                                    আপনার অনুরোধ পাঠানোর পর মেন্টর অনুমোদন করলে সেশন নিশ্চিত হবে।
                                    পেমেন্ট শুধুমাত্র অনুমোদনের পরেই সম্পন্ন করতে হবে।
                                </p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="h-px w-full" style="background-color: var(--mc-border-teal-sub);"></div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('mentor_profile', $mentor->id) }}"
                                class="flex-1 text-center py-3 rounded-xl text-sm font-semibold
                                      border hover:-translate-y-0.5 transition-all duration-200"
                                style="border-color: var(--mc-border-teal-sub); color: var(--mc-text-muted); background: var(--mc-surface);">
                                ← ফিরে যান
                            </a>
                            <button type="submit"
                                class="flex-1 py-3 rounded-xl text-sm font-bold text-white
                                           flex items-center justify-center gap-2
                                           hover:opacity-90 hover:-translate-y-0.5
                                           transition-all duration-200"
                                style="background: linear-gradient(135deg, #1A9998, #155665);
                                           box-shadow: 0 6px 20px rgba(26,153,143,0.3);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                অনুরোধ পাঠান
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            {{-- Footer note --}}
            <p class="text-center text-xs mt-6 flex items-center justify-center gap-1.5" style="color: var(--mc-text-faint);">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                আপনার তথ্য সুরক্ষিত এবং শুধুমাত্র মেন্টরের সাথে শেয়ার করা হবে
            </p>

        </div>
    </div>
</x-layout>
