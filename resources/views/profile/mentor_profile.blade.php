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
                                style="font-family:'Lora',serif; background:linear-gradient(135deg,#28666e,#033f63); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                {{ $mentor->name }}
                            </h1>
                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full"
                                    style="background:rgba(40,102,110,0.1); color:#28666e;">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($mentor->role->value) }}
                                </span>
                                <span class="text-sm font-medium" style="color:rgba(3,63,99,0.5);">ইউজার আইডি: #{{
                                    $mentor->id }}</span>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed" style="color:rgba(3,63,99,0.7);">
                            {{ $mentor->profile->bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                        </p>
                    </div>

                    {{-- Upload --}}
                    @if (auth()->id() === $mentor->id)
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

        {{-- Main Info Card --}}
        <div class="mx-auto bg-white rounded-2xl border border-teal-100 shadow-sm">

            {{-- Personal Info --}}
            <div class="p-6 sm:p-8 border-b border-teal-50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-7">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background:linear-gradient(to bottom,#28666e,#7c9885);"></div>
                        <h2 class="text-xl font-bold" style="color:#033f63; font-family:'Lora',serif;">ব্যক্তিগত তথ্য
                        </h2>
                    </div>
                    @if (auth()->id() === $mentor->id)
                    <a href="{{ route('edit_profile', $mentor->id) }}"
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
                    @php
                    $infoItems = [
                    ['icon_color'=>'#3b82f6','bg'=>'rgba(59,130,246,0.1)','label'=>'ই-মেইল','value'=>$mentor->email,'icon'=>'M21.75
                    6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5
                    4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0
                    01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                    ['icon_color'=>'#22c55e','bg'=>'rgba(34,197,94,0.1)','label'=>'ফোন','value'=>$mentor->profile->phone
                    ?? '—','icon'=>'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0
                    002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97
                    1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0
                    01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125
                    1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z'],
                    ['icon_color'=>'#eab308','bg'=>'rgba(234,179,8,0.1)','label'=>'ঠিকানা','value'=>$mentor->profile->address
                    ?? '—','icon'=>'M15 10.5a3 3 0 11-6 0 3 3 0 016 0zM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642
                    4.5 10.5a7.5 7.5 0 1115 0z'],
                    ['icon_color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.1)','label'=>'জন্ম
                    তারিখ','value'=>$mentor->profile->date_of_birth ?? '—','icon'=>'M6.75 3v2.25M17.25 3v2.25M3
                    18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25
                    21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5'],
                    ['icon_color'=>'#28666e','bg'=>'rgba(40,102,110,0.1)','label'=>'ঘণ্টা প্রতি
                    চার্জ','value'=>$mentor->profile->hourly_rate ? '৳'.number_format($mentor->profile->hourly_rate) :
                    '—','icon'=>'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303
                    0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303
                    0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ];
                    @endphp
                    @foreach($infoItems as $item)
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:{{ $item['bg'] }};">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="{{ $item['icon_color'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">{{ $item['label'] }}</p>
                            <p class="text-sm break-all {{ $item['label']==='ঘণ্টা প্রতি চার্জ' ? 'font-bold' : '' }}"
                                style="color:rgba(3,63,99,0.65);">{{ $item['value'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Education --}}
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
                                $mentor->profile->highgest_education_level ?? '—' }}</p>
                        </div>
                    </div>
                    <div
                        class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200 hover:bg-teal-50">
                        <div class="p-2.5 rounded-xl flex-shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background:rgba(124,152,133,0.12);">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#7c9885">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold mb-0.5" style="color:#033f63;">শিক্ষাপ্রতিষ্ঠানের নাম</p>
                            <p class="text-sm" style="color:rgba(3,63,99,0.65);">{{ $mentor->profile->institution_name
                                ?? '—' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Skills --}}
            <div class="p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background:linear-gradient(to bottom,#28666e,#7c9885);"></div>
                        <h2 class="text-xl font-bold" style="color:#033f63; font-family:'Lora',serif;">দক্ষতাসমূহ</h2>
                    </div>
                    <a href="https://www.youtube.com/playlist?list=YOUR_PLAYLIST_ID" target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color:rgba(239,68,68,0.4); color:#dc2626;"
                        onmouseover="this.style.background='rgba(239,68,68,0.06)'"
                        onmouseout="this.style.background='transparent'">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>
                        ডেমো ভিডিও দেখুন
                    </a>
                </div>
                <div class="flex flex-wrap gap-2">
                    @if (!empty($mentor->profile->skills))
                    @foreach (explode(',', $mentor->profile->skills) as $skill)
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

        {{-- Reviews Card --}}
        <div class="mx-auto bg-white rounded-2xl border border-teal-100 shadow-sm">
            <div class="p-6 sm:p-8">

                {{-- Review Header --}}
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-10 rounded-full"
                            style="background:linear-gradient(to bottom,#eab308,rgba(234,179,8,0.3));"></div>
                        <div>
                            <h2 class="text-xl font-bold flex items-center gap-2"
                                style="color:#033f63; font-family:'Lora',serif;">
                                <svg class="w-6 h-6" fill="#eab308" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                </svg>
                                ছাত্রদের রিভিউ
                            </h2>
                            <p class="text-xs mt-0.5" style="color:rgba(3,63,99,0.5);">শিক্ষার্থীদের মতামত ও অভিজ্ঞতা
                            </p>
                        </div>
                    </div>

                    {{-- Overall Rating --}}
                    <div class="rounded-2xl px-6 py-4 border text-center"
                        style="background:rgba(234,179,8,0.06); border-color:rgba(234,179,8,0.2);">
                        <p class="text-3xl font-bold" style="color:#d97706; font-family:'Lora',serif;">৪.৮</p>
                        <div class="flex justify-center my-1">
                            <span class="text-yellow-400 text-sm tracking-wide">★★★★★</span>
                        </div>
                        <p class="text-xs" style="color:rgba(3,63,99,0.5);">৫টি রিভিউ থেকে</p>
                    </div>
                </div>

                {{-- Reviews Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    @php
                    $reviews = [
                    ['initial'=>'A','name'=>'Ahsan
                    Rahman','color'=>'#28666e','bg'=>'rgba(40,102,110,0.1)','stars'=>5,'time'=>'২ দিন
                    আগে','text'=>'বিষয়গুলো খুব পরিষ্কারভাবে বুঝিয়েছেন। জটিল টপিকও সহজ করে বোঝানোর ধরনটা দারুণ
                    লেগেছে।'],
                    ['initial'=>'S','name'=>'Sara
                    Islam','color'=>'#3d8a8f','bg'=>'rgba(61,138,143,0.1)','stars'=>4,'time'=>'৫ দিন
                    আগে','text'=>'প্রতিটি সেশন ছিল গোছানো ও কাজে লাগার মতো। বাস্তব প্রজেক্টে কাজ করার আত্মবিশ্বাস
                    পেয়েছি।'],
                    ['initial'=>'M','name'=>'Mahmud
                    Hasan','color'=>'#7c9885','bg'=>'rgba(124,152,133,0.12)','stars'=>4,'time'=>'১ সপ্তাহ
                    আগে','text'=>'খুব বন্ধুসুলভ এবং প্রফেশনালভাবে গাইড করেছেন। প্রশ্ন করলে সবসময় ধৈর্য ধরে উত্তর
                    দিয়েছেন।'],
                    ['initial'=>'N','name'=>'Nusrat
                    Jahan','color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.1)','stars'=>3,'time'=>'২ সপ্তাহ
                    আগে','text'=>'শেখানোর গতি আর ব্যাখ্যা দুটোই ভালো। নতুনদের পাশাপাশি মাঝামাঝি লেভেলের শিক্ষার্থীদের
                    জন্যও উপকারী।'],
                    ];
                    @endphp

                    @foreach($reviews as $review)
                    <div class="rounded-2xl border p-5 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color:rgba(40,102,110,0.1); background:rgba(238,247,248,0.3);">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full flex items-center justify-center text-lg font-bold text-white flex-shrink-0"
                                    style="background:{{ $review['color'] }};">
                                    {{ $review['initial'] }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm" style="color:#033f63;">{{ $review['name'] }}</p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-yellow-400 text-xs tracking-wide">
                                            {{ str_repeat('★', $review['stars']) }}{{ str_repeat('☆', 5 -
                                            $review['stars']) }}
                                        </span>
                                        <span class="text-xs" style="color:rgba(3,63,99,0.45);">{{ $review['time']
                                            }}</span>
                                    </div>
                                </div>
                            </div>
                            <svg class="w-7 h-7 flex-shrink-0" fill="rgba(234,179,8,0.15)" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                        </div>
                        <p class="text-sm italic leading-relaxed" style="color:rgba(3,63,99,0.7);">"{{ $review['text']
                            }}"</p>
                        <div class="mt-3">
                            <span class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full"
                                style="border:1px solid rgba(40,102,110,0.2); color:#28666e;">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                যাচাইকৃত
                            </span>
                        </div>
                    </div>
                    @endforeach

                    {{-- 5th review spans full width --}}
                    <div class="md:col-span-2 rounded-2xl border p-5 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color:rgba(40,102,110,0.1); background:rgba(238,247,248,0.3);">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full flex items-center justify-center text-lg font-bold text-white flex-shrink-0"
                                    style="background:#22c55e;">R</div>
                                <div>
                                    <p class="font-bold text-sm" style="color:#033f63;">Rakib Chowdhury</p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-yellow-400 text-xs tracking-wide">★★★★☆</span>
                                        <span class="text-xs" style="color:rgba(3,63,99,0.45);">৩ সপ্তাহ আগে</span>
                                    </div>
                                </div>
                            </div>
                            <svg class="w-7 h-7 flex-shrink-0" fill="rgba(234,179,8,0.15)" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                        </div>
                        <p class="text-sm italic leading-relaxed" style="color:rgba(3,63,99,0.7);">"বিষয় সম্পর্কে গভীর
                            ধারণা আছে এবং বোঝানোর স্টাইলও চমৎকার। যারা সিরিয়াসলি শিখতে চায়, তাদের জন্য খুব ভালো।"</p>
                        <div class="mt-3">
                            <span class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full"
                                style="border:1px solid rgba(40,102,110,0.2); color:#28666e;">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                যাচাইকৃত
                            </span>
                        </div>
                    </div>
                </div>

                {{-- View All Button --}}
                <div class="text-center mt-8">
                    <button
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl border-2 font-bold text-sm transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color:#28666e; color:#28666e;"
                        onmouseover="this.style.background='#28666e';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='#28666e'">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        সকল রিভিউ দেখুন
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-layout>
