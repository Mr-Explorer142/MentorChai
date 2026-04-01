<x-layout>
    <div class="min-h-screen px-4 py-8 md:px-10 space-y-6"
        style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfe 55%, #f0f9f4 100%);">

        {{-- Profile Header Card --}}
        <div
            class="mx-auto bg-white rounded-2xl border border-teal-100 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="p-6 sm:p-8">
                <div class="flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                    {{-- Avatar --}}
                    <div class="relative flex-shrink-0">
                        <div class="w-28 h-28 rounded-full bg-gradient-to-br from-teal-100 to-teal-50 border-4 border-white shadow-lg flex items-center justify-center hover:scale-105 transition-transform duration-300"
                            style="box-shadow: 0 0 0 3px #28666e33;">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#28666e" opacity="0.4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <span class="text-xs font-medium" style="color: rgba(40,102,110,0.5);">ফটো</span>
                            </div>
                        </div>
                    </div>

                    {{-- Name & Info --}}
                    <div class="flex-1 text-center lg:text-left space-y-3">
                        <div class="space-y-2">
                            <h1 class="text-3xl sm:text-4xl font-bold"
                                style="font-family:'Lora',serif; background: linear-gradient(135deg,#28666e,#033f63); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                {{ $student->name }}
                            </h1>
                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full"
                                    style="background:rgba(40,102,110,0.1); color:#28666e;">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($student->role->value) }}
                                </span>
                                <span class="text-sm font-medium" style="color:rgba(3,63,99,0.5);">
                                    ইউজার আইডি: #{{ $student->id }}
                                </span>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed" style="color:rgba(3,63,99,0.7);">
                            {{ $student->profile->bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                        </p>
                    </div>

                    {{-- Upload Photo --}}
                    @if (auth()->id() === $student->id)
                    <div class="text-center lg:text-right flex-shrink-0">
                        <button
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border-2 text-sm font-bold transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="border-color:#28666e; color:#28666e; background:transparent;"
                            onmouseover="this.style.background='#28666e';this.style.color='white'"
                            onmouseout="this.style.background='transparent';this.style.color='#28666e'">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            ফটো আপলোড
                        </button>
                        <p class="mt-2 text-xs" style="color:rgba(3,63,99,0.4);">800×800 পিক্সেল · JPG বা PNG</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="mx-auto bg-white rounded-2xl border border-teal-100 shadow-sm">

            {{-- Section: Personal Info --}}
            <div class="p-6 sm:p-8 border-b border-teal-50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-7">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background:linear-gradient(to bottom,#28666e,#7c9885);"></div>
                        <h2 class="text-xl font-bold" style="color:#033f63; font-family:'Lora',serif;">ব্যক্তিগত তথ্য
                        </h2>
                    </div>
                    @if (auth()->id() === $student->id)
                    <a href="{{ route('edit_profile', $student->id) }}"
                        class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color:#28666e; color:#28666e;"
                        onmouseover="this.style.background='#28666e';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='#28666e'">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                        </svg>
                        প্রোফাইল আপডেট
                    </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                    {{-- Email --}}
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(59,130,246,0.1);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#3b82f6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">ই-মেইল</p>
                            <p class="text-sm break-all" style="color:rgba(3,63,99,0.65);">{{ $student->email }}</p>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(34,197,94,0.1);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#22c55e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">ফোন</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{ $student->profile->phone ?? '—' }}
                            </p>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(234,179,8,0.1);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#eab308">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">ঠিকানা</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{ $student->profile->address ?? '—' }}
                            </p>
                        </div>
                    </div>

                    {{-- DOB --}}
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(139,92,246,0.1);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#8b5cf6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">জন্ম তারিখ</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{ $student->profile->date_of_birth ??
                                '—' }}</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Section: Education --}}
            <div class="p-6 sm:p-8 border-b border-teal-50">
                <div class="flex items-center gap-3 mb-7">
                    <div class="w-1 h-7 rounded-full" style="background:linear-gradient(to bottom,#28666e,#7c9885);">
                    </div>
                    <h2 class="text-xl font-bold" style="color:#033f63; font-family:'Lora',serif;">শিক্ষাগত তথ্য</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(40,102,110,0.1);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#28666e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">শিক্ষাগত যোগ্যতা</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{
                                $student->profile->highgest_education_level ?? '—' }}</p>
                        </div>
                    </div>

                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(124,152,133,0.12);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#7c9885">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">শিক্ষাপ্রতিষ্ঠানের নাম</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{ $student->profile->institution_name
                                ?? '—' }}</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Section: Skills --}}
            <div class="p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full" style="background:linear-gradient(to bottom,#28666e,#7c9885);">
                    </div>
                    <h2 class="text-xl font-bold" style="color:#033f63; font-family:'Lora',serif;">দক্ষতাসমূহ</h2>
                </div>

                <div class="flex flex-wrap gap-2">
                    @if (!empty($student->profile->skills))
                    @foreach (explode(',', $student->profile->skills) as $skill)
                    <span
                        class="inline-flex items-center gap-1.5 text-sm font-semibold px-3 py-1.5 rounded-full border transition-all duration-200 hover:scale-105 cursor-default"
                        style="border-color:rgba(40,102,110,0.25); color:#28666e; background:rgba(40,102,110,0.05);">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                        </svg>
                        {{ trim($skill) }}
                    </span>
                    @endforeach
                    @else
                    <div class="w-full text-center py-10">
                        <svg class="w-14 h-14 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="#28666e" opacity="0.2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38" />
                        </svg>
                        <p class="text-sm" style="color:rgba(3,63,99,0.4);">কোনো দক্ষতা যোগ করা হয়নি</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-layout>
