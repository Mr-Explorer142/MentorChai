<x-layout>
    <div class="min-h-screen px-4 py-8 md:px-10 space-y-6 transition-colors duration-300"
        style="background-color: var(--mc-bg);">

        {{-- ══════════════════════
        AVATAR FLASH MESSAGES
        ══════════════════════ --}}
        @if(session('avatar_success'))
        <div id="avatarFlash" class="flex items-center gap-3 px-5 py-4 rounded-2xl shadow-lg font-semibold text-white"
            style="background:#1A998F;">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('avatar_success') }}
        </div>
        @endif
        @if($errors->has('avatar'))
        <div id="avatarErrorFlash"
            class="flex items-center gap-3 px-5 py-4 rounded-2xl shadow-lg font-semibold text-white"
            style="background:#ef4444;">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            {{ $errors->first('avatar') }}
        </div>
        @endif

        {{-- ══════════════════════
        PROFILE HEADER CARD
        ══════════════════════ --}}
        <div class="rounded-2xl border transition-shadow duration-300 hover:shadow-xl"
            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
            <div class="p-6 sm:p-8">
                <div class="flex flex-col lg:flex-row gap-8 items-center lg:items-start">
                    {{-- Avatar Container --}}
                    <div class="relative shrink-0" style="width:112px; height:112px;">
                        {{-- Avatar Circle --}}
                        <div class="group" style="width:112px;height:112px;border-radius:9999px;overflow:hidden;
                                    border:4px solid var(--mc-surface);
                                    box-shadow:var(--mc-shadow-md),0 0 0 3px var(--mc-border-teal);
                                    transition:box-shadow .2s;">
                            @if($student->profile && $student->profile->avatar)
                            <img id="profileAvatarImg" src="{{ asset('storage/' . $student->profile->avatar) }}"
                                alt="Profile Photo" style="width:100%;height:100%;object-fit:cover;display:block;" />
                            @else
                            <img id="profileAvatarImg"
                                src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
                                alt="Profile Photo" style="width:100%;height:100%;object-fit:cover;display:block;" />
                            @endif
                        </div>

                        {{-- Small red dustbin button at the bottom-right corner --}}
                        @if(auth()->id() === $student->id && $student->profile && $student->profile->avatar)
                        <form action="{{ route('remove_avatar') }}" method="POST"
                            style="position:absolute; bottom:-4px; right:-4px; margin:0; z-index:10;"
                            onsubmit="return confirm('নিশ্চিতভাবে প্রোফাইল ছবি সরাবেন?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="ছবি সরিয়ে দিন" style="width:32px; height:32px; border-radius:9999px;
                                           background:#ef4444; border:2px solid #fff; cursor:pointer;
                                           display:flex; align-items:center; justify-content:center;
                                           box-shadow:0 2px 8px rgba(239,68,68,0.4);
                                           transition:all 0.2s;"
                                onmouseover="this.style.background='#dc2626'; this.style.transform='scale(1.15)';"
                                onmouseout="this.style.background='#ef4444'; this.style.transform='scale(1)';"
                                onclick="event.stopPropagation();">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="#fff">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>

                    {{-- Name & Info --}}
                    <div class="flex-1 text-center lg:text-left space-y-3">
                        <div class="space-y-2">
                            <h1 class="text-3xl sm:text-4xl font-bold"
                                style="font-family:'Lora',serif; background: linear-gradient(135deg, var(--mc-primary), var(--mc-navy)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                {{ $student->name }}
                            </h1>
                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full border"
                                    style="background: rgba(40,102,110,0.1); border-color: var(--mc-border-teal); color: var(--mc-primary);">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($student->role->value) }}
                                </span>
                                <span class="text-sm font-medium" style="color: var(--mc-text-muted);">
                                    ইউজার আইডি: #{{ $student->id }}
                                </span>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-muted);">
                            {{ $student->profile->bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                        </p>
                    </div>

                    {{-- Upload Photo --}}
                    @if (auth()->id() === $student->id)
                    <div class="text-center lg:text-right shrink-0">
                        <button type="button" onclick="document.getElementById('profileAvatarModal').showModal()"
                            class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 rounded-xl border-2 text-sm font-bold transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="border-color: var(--mc-primary); color: var(--mc-primary); background: transparent;"
                            onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                            onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            ফটো আপলোড
                        </button>
                        <p class="mt-2 text-xs" style="color: var(--mc-text-faint);">800×800 পিক্সেল · JPG বা PNG</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ══════════════════════
        MAIN CONTENT CARD
        ══════════════════════ --}}
        <div class="rounded-2xl border"
            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">

            {{-- Personal Info --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-7">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                        <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">ব্যক্তিগত
                            তথ্য</h2>
                    </div>
                    @if (auth()->id() === $student->id)
                    <a href="{{ route('edit_profile', $student->id) }}"
                        class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color: var(--mc-primary); color: var(--mc-primary);"
                        onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                        </svg>
                        প্রোফাইল আপডেট
                    </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach([
                    ['ic'=>'#3b82f6', 'bg'=>'rgba(59,130,246,0.1)', 'label'=>'ই-মেইল', 'val'=>$student->email,
                    'bold'=>false,
                    'path'=>'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25
                    2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25
                    2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                    ['ic'=>'#22c55e', 'bg'=>'rgba(34,197,94,0.1)', 'label'=>'ফোন', 'val'=>$student->profile->phone ??
                    '—', 'bold'=>false,
                    'path'=>'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0
                    002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97
                    1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0
                    01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125
                    1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z'],
                    ['ic'=>'#eab308', 'bg'=>'rgba(234,179,8,0.1)', 'label'=>'ঠিকানা', 'val'=>$student->profile->address
                    ?? '—', 'bold'=>false,
                    'path'=>'M15 10.5a3 3 0 11-6 0 3 3 0 016 0zM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5
                    10.5a7.5 7.5 0 1115 0z'],
                    ['ic'=>'#8b5cf6', 'bg'=>'rgba(139,92,246,0.1)', 'label'=>'জন্ম
                    তারিখ','val'=>$student->profile->date_of_birth ?? '—', 'bold'=>false,
                    'path'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121
                    7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5'],
                    ] as $item)
                    <div class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200"
                        onmouseover="this.style.background='var(--mc-surface-hover)'"
                        onmouseout="this.style.background='transparent'">
                        <div class="p-2.5 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background: {{ $item['bg'] }};">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="{{ $item['ic'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['path'] }}" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color: var(--mc-text);">{{ $item['label'] }}</p>
                            <p class="text-sm break-all" style="color: var(--mc-text-muted);">{{ $item['val'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Education --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-7">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">শিক্ষাগত তথ্য
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach([
                    ['bg'=>'rgba(40,102,110,0.1)', 'stroke'=>'var(--mc-primary)', 'label'=>'শিক্ষাগত যোগ্যতা',
                    'val'=>$student->profile->highgest_education_level ?? '—',
                    'icon'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0
                    018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112
                    3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814'],
                    ['bg'=>'rgba(124,152,133,0.12)', 'stroke'=>'var(--mc-sage)', 'label'=>'শিক্ষাপ্রতিষ্ঠানের নাম',
                    'val'=>$student->profile->institution_name ?? '—',
                    'icon'=>'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012
                    9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'],
                    ] as $edu)
                    <div class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200"
                        onmouseover="this.style.background='var(--mc-surface-hover)'"
                        onmouseout="this.style.background='transparent'">
                        <div class="p-2.5 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background: {{ $edu['bg'] }};">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="{{ $edu['stroke'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $edu['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold mb-0.5" style="color: var(--mc-text);">{{ $edu['label'] }}</p>
                            <p class="text-sm" style="color: var(--mc-text-muted);">{{ $edu['val'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Skills --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">দক্ষতাসমূহ
                    </h2>
                </div>
                <div class="flex flex-wrap gap-2">
                    @if (!empty($student->profile->skills))
                    @foreach (explode(',', $student->profile->skills) as $skill)
                    <span
                        class="inline-flex items-center gap-1.5 text-sm font-semibold px-3 py-1.5 rounded-full border transition-all duration-200 hover:scale-105 cursor-default"
                        style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
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
                            stroke="var(--mc-primary)" opacity="0.2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38" />
                        </svg>
                        <p class="text-sm" style="color: var(--mc-text-faint);">কোনো দক্ষতা যোগ করা হয়নি</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- About Me --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">আমার সম্পর্কে
                    </h2>
                </div>
                <div class="rounded-2xl p-6 border"
                    style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                    <p class="text-sm leading-7" style="color: var(--mc-text-muted);">
                        আমি ঢাকা বিশ্ববিদ্যালয়ের কম্পিউটার সায়েন্স বিভাগের তৃতীয় বর্ষের একজন শিক্ষার্থী। ছোটবেলা
                        থেকেই প্রযুক্তি ও সমস্যা সমাধানের প্রতি আমার গভীর আগ্রহ রয়েছে।
                    </p>
                    <p class="text-sm leading-7 mt-4" style="color: var(--mc-text-muted);">
                        বর্তমানে আমি ওয়েব ডেভেলপমেন্ট, মেশিন লার্নিং এবং অ্যালগরিদমিক প্রবলেম সলভিংয়ে দক্ষতা অর্জনের
                        দিকে মনোযোগ দিচ্ছি।
                    </p>
                    <p class="text-sm leading-7 mt-4" style="color: var(--mc-text-muted);">
                        ভবিষ্যতে আমি একজন ফুল-স্ট্যাক ডেভেলপার হিসেবে ক্যারিয়ার গড়তে চাই এবং দেশের প্রযুক্তি খাতে
                        অবদান রাখতে চাই।
                    </p>
                </div>
            </div>

            {{-- Achievements --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, #eab308, rgba(234,179,8,0.3));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">অর্জনসমূহ
                    </h2>
                </div>
                @php
                $achievements = [
                ['title'=>'ICPC Asia Dhaka Regional — ১৫তম স্থান অর্জন', 'desc'=>'ঢাকা বিশ্ববিদ্যালয় দলের হয়ে ICPC
                Asia Dhaka Regional Contest ২০২৩-এ ১৫তম স্থান অর্জন।',
                'url'=>'https://icpc.global/regionals/finder/Dhaka', 'badge'=>'🏆', 'color'=>'#eab308',
                'bg'=>'rgba(234,179,8,0.07)', 'border'=>'rgba(234,179,8,0.2)'],
                ['title'=>'Google Summer of Code ২০২৩ — নির্বাচিত', 'desc'=>'Google Summer of Code ২০২৩ প্রোগ্রামে
                বাংলাদেশ থেকে নির্বাচিত হয়ে Mozilla Foundation-এর হয়ে কাজ।',
                'url'=>'https://summerofcode.withgoogle.com', 'badge'=>'🎖️', 'color'=>'#3b82f6',
                'bg'=>'rgba(59,130,246,0.06)', 'border'=>'rgba(59,130,246,0.18)'],
                ['title'=>'জাতীয় বিজ্ঞান অলিম্পিয়াড — সিলভার মেডেল', 'desc'=>'মাধ্যমিক স্তরে জাতীয় বিজ্ঞান
                অলিম্পিয়াডে সিলভার মেডেল এবং বিশেষ উদ্ভাবনী প্রজেক্ট পুরস্কার অর্জন।', 'url'=>'https://bdso.org',
                'badge'=>'🥈', 'color'=>'#28666e', 'bg'=>'rgba(40,102,110,0.06)', 'border'=>'rgba(40,102,110,0.18)'],
                ['title'=>'ডিজিটাল বাংলাদেশ হ্যাকাথন — দ্বিতীয় রানার্স আপ', 'desc'=>'ডিজিটাল বাংলাদেশ হ্যাকাথনে কৃষি
                খাতের জন্য AI-চালিত সমাধান তৈরি করে দ্বিতীয় রানার্স আপ।', 'url'=>'https://a2i.gov.bd/hackathon',
                'badge'=>'🚀', 'color'=>'#22c55e', 'bg'=>'rgba(34,197,94,0.06)', 'border'=>'rgba(34,197,94,0.18)'],
                ['title'=>'ডিইউ CSE ফেস্ট — Best Project Award', 'desc'=>'ঢাকা বিশ্ববিদ্যালয় CSE ফেস্টে "SmartBus"
                রিয়েল-টাইম বাস ট্র্যাকিং প্রজেক্টের জন্য সেরা প্রজেক্ট পুরস্কার।', 'url'=>'https://cse.du.ac.bd/fest',
                'badge'=>'🎓', 'color'=>'#ef4444', 'bg'=>'rgba(239,68,68,0.06)', 'border'=>'rgba(239,68,68,0.18)'],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($achievements as $ach)
                    <a href="{{ $ach['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-start gap-4 p-4 rounded-2xl border transition-all duration-200 hover:shadow-md hover:-translate-y-0.5 block"
                        style="background: {{ $ach['bg'] }}; border-color: {{ $ach['border'] }};">
                        <div class="text-2xl shrink-0 mt-0.5">{{ $ach['badge'] }}</div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-sm font-bold" style="color: {{ $ach['color'] }};">{{ $ach['title'] }}</p>
                                <svg class="w-3.5 h-3.5 opacity-50 group-hover:opacity-100 transition-opacity shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $ach['color'] }}">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </div>
                            <p class="text-xs mt-1 leading-relaxed" style="color: var(--mc-text-muted);">{{ $ach['desc']
                                }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Inventions / Projects --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, #8b5cf6, rgba(139,92,246,0.3));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">প্রজেক্ট ও
                        উদ্ভাবন</h2>
                </div>
                @php
                $inventions = [
                ['title'=>'SmartBus — রিয়েল-টাইম বাস ট্র্যাকার', 'desc'=>'ঢাকার শিক্ষার্থীদের জন্য রিয়েল-টাইম বাস
                লোকেশন ট্র্যাকিং মোবাইল অ্যাপ। Flutter ও Firebase দিয়ে তৈরি।',
                'url'=>'https://github.com/example/smartbus', 'tag'=>'Mobile App', 'color'=>'#8b5cf6',
                'bg'=>'rgba(139,92,246,0.06)', 'border'=>'rgba(139,92,246,0.18)',
                'icon'=>'M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0
                01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504
                1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5
                18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0
                00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12'],
                ['title'=>'AgroAI — কৃষি রোগ শনাক্তকরণ সিস্টেম', 'desc'=>'কৃষকদের ফসলের রোগ ছবি তুলে শনাক্ত করতে
                সাহায্যকারী CNN-ভিত্তিক AI সিস্টেম। হ্যাকাথনে দ্বিতীয় স্থান।',
                'url'=>'https://github.com/example/agroai', 'tag'=>'AI / ML', 'color'=>'#22c55e',
                'bg'=>'rgba(34,197,94,0.06)', 'border'=>'rgba(34,197,94,0.18)',
                'icon'=>'M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0
                003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z'],
                ['title'=>'StudySync — গ্রুপ স্টাডি ম্যানেজমেন্ট অ্যাপ', 'desc'=>'শিক্ষার্থীদের গ্রুপ স্টাডি সেশন
                পরিচালনার জন্য React ও Laravel দিয়ে তৈরি ওয়েব অ্যাপ।', 'url'=>'https://github.com/example/studysync',
                'tag'=>'Web App', 'color'=>'#3b82f6', 'bg'=>'rgba(59,130,246,0.06)', 'border'=>'rgba(59,130,246,0.18)',
                'icon'=>'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0
                .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016
                18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3
                3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3
                0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5
                0z'],
                ['title'=>'BanglaOCR — বাংলা হস্তলিখিত টেক্সট রিকগনিশন', 'desc'=>'হস্তলেখা বাংলা অক্ষর চেনার জন্য Deep
                Learning মডেল — BUET CSE Project Showcase-এ প্রদর্শিত।', 'url'=>'https://github.com/example/banglaocr',
                'tag'=>'Research', 'color'=>'#28666e', 'bg'=>'rgba(40,102,110,0.06)', 'border'=>'rgba(40,102,110,0.18)',
                'icon'=>'M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293
                3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0
                003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0
                0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z'],
                ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($inventions as $inv)
                    <a href="{{ $inv['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="group flex flex-col gap-3 p-5 rounded-2xl border transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="background: {{ $inv['bg'] }}; border-color: {{ $inv['border'] }};">
                        <div class="flex items-start justify-between gap-2">
                            <div class="p-2.5 rounded-xl shrink-0" style="background: {{ $inv['border'] }};">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="{{ $inv['color'] }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $inv['icon'] }}" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold px-2.5 py-1 rounded-full shrink-0"
                                style="background: {{ $inv['border'] }}; color: {{ $inv['color'] }};">{{ $inv['tag']
                                }}</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold mb-1.5 flex items-center gap-1.5"
                                style="color: var(--mc-text);">
                                {{ $inv['title'] }}
                                <svg class="w-3.5 h-3.5 opacity-40 group-hover:opacity-100 transition-opacity shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="var(--mc-text-sub)">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </p>
                            <p class="text-xs leading-relaxed" style="color: var(--mc-text-muted);">{{ $inv['desc'] }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Social Links --}}
            <div class="p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">অন্যান্য লিংক
                    </h2>
                </div>
                @php
                $socialLinks = [
                ['label'=>'পোর্টফোলিও ওয়েবসাইট', 'url'=>'https://yourportfolio.example.com',
                'sub'=>'yourportfolio.example.com', 'bg'=>'rgba(40,102,110,0.07)', 'border'=>'rgba(40,102,110,0.2)',
                'color'=>'#28666e',
                'icon_svg'=>'
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                '],
                ['label'=>'LinkedIn', 'url'=>'https://linkedin.com/in/your-profile',
                'sub'=>'linkedin.com/in/your-profile', 'bg'=>'rgba(10,102,194,0.06)', 'border'=>'rgba(10,102,194,0.18)',
                'color'=>'#0a66c2',
                'icon_svg'=>'
                <rect x="2" y="2" width="20" height="20" rx="4" stroke-width="1.8" />
                <path d="M7 10v7M7 7v.01M12 17v-4a2 2 0 014 0v4M12 10v7" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />'],
                ['label'=>'Facebook', 'url'=>'https://facebook.com/your-profile', 'sub'=>'facebook.com/your-profile',
                'bg'=>'rgba(24,119,242,0.06)', 'border'=>'rgba(24,119,242,0.18)', 'color'=>'#1877f2',
                'icon_svg'=>'
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />'],
                ['label'=>'Instagram', 'url'=>'https://instagram.com/your-profile', 'sub'=>'instagram.com/your-profile',
                'bg'=>'rgba(225,48,108,0.06)','border'=>'rgba(225,48,108,0.18)','color'=>'#e1306c',
                'icon_svg'=>'
                <rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.8" />
                <circle cx="12" cy="12" r="4" stroke-width="1.8" />
                <circle cx="17.5" cy="6.5" r="0.5" fill="#e1306c" stroke-width="0" />'],
                ['label'=>'Gmail / ই-মেইল', 'url'=>'mailto:yourname@gmail.com', 'sub'=>'yourname@gmail.com',
                'bg'=>'rgba(234,67,53,0.06)', 'border'=>'rgba(234,67,53,0.18)', 'color'=>'#ea4335',
                'icon_svg'=>'
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                '],
                ];
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3">
                    @foreach($socialLinks as $link)
                    <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 p-4 rounded-2xl border transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="background: {{ $link['bg'] }}; border-color: {{ $link['border'] }};">
                        <div class="p-2.5 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background: {{ $link['border'] }};">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="{{ $link['color'] }}">
                                {!! $link['icon_svg'] !!}
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-bold" style="color: {{ $link['color'] }};">{{ $link['label'] }}</p>
                            <p class="text-xs truncate mt-0.5" style="color: var(--mc-text-muted);">{{ $link['sub'] }}
                            </p>
                        </div>
                        <svg class="w-4 h-4 ml-auto shrink-0 opacity-30 group-hover:opacity-80 transition-opacity"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $link['color'] }}">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- ══════════════════════════════════════════
    AVATAR UPLOAD MODAL (own profile only)
    ══════════════════════════════════════════ --}}
    @if(auth()->id() === $student->id)
    <dialog id="profileAvatarModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box max-w-md p-0 overflow-hidden rounded-3xl shadow-2xl"
            style="background:var(--mc-surface);border:1px solid var(--mc-border-teal-sub);">

            {{-- Header --}}
            <div class="px-6 pt-6 pb-4 flex items-center justify-between"
                style="background:linear-gradient(to right,#102E3C,#1A998F);">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-xl" style="background:rgba(255,255,255,0.1);">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white">প্রোফাইল ছবি পরিবর্তন</h3>
                </div>
                <button type="button" onclick="closeProfileAvatarModal()"
                    class="btn btn-sm btn-ghost btn-circle text-white hover:bg-white/20">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="px-6 py-6 space-y-5">
                {{-- Preview --}}
                <div class="flex flex-col items-center gap-2">
                    <div class="w-28 h-28 rounded-full overflow-hidden ring-4 shadow-xl"
                        style="ring-color:rgba(26,153,143,0.4);">
                        @if($student->profile && $student->profile->avatar)
                        <img id="profileModalPreview" src="{{ asset('storage/' . $student->profile->avatar) }}"
                            alt="Preview" class="w-full h-full object-cover transition-all duration-300" />
                        @else
                        <img id="profileModalPreview"
                            src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
                            alt="Preview" class="w-full h-full object-cover transition-all duration-300" />
                        @endif
                    </div>
                    <div id="profilePreviewBadge" class="hidden px-2 py-0.5 rounded-full text-xs font-bold text-white"
                        style="background:#1A998F;">পূর্বরূপ</div>
                    <p class="text-xs" style="color:var(--mc-text-muted);">বর্তমান প্রোফাইল ছবি</p>
                </div>

                {{-- Drop Zone --}}
                <form id="profileAvatarUploadForm" action="{{ route('update_avatar') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div id="profileDropZone" class="relative flex flex-col items-center justify-center gap-3 p-8
                                border-2 border-dashed rounded-2xl cursor-pointer
                                transition-all duration-200 group"
                        style="border-color:rgba(26,153,143,0.4);background:rgba(26,153,143,0.04);"
                        onclick="document.getElementById('profileAvatarFileInput').click()"
                        ondragover="profileHandleDragOver(event)" ondragleave="profileHandleDragLeave(event)"
                        ondrop="profileHandleDrop(event)">

                        <div class="p-4 rounded-full transition-colors" style="background:rgba(26,153,143,0.1);">
                            <svg class="w-8 h-8" style="color:#1A998F;" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="font-semibold" style="color:var(--mc-text);">ছবি আপলোড করুন</p>
                            <p class="text-xs mt-1" style="color:var(--mc-text-muted);">
                                ড্র্যাগ করুন অথবা ক্লিক করুন &bull; JPG, PNG, GIF, WebP &bull; সর্বোচ্চ ২ MB
                            </p>
                        </div>
                        <input id="profileAvatarFileInput" name="avatar" type="file"
                            accept="image/jpeg,image/png,image/gif,image/webp" class="hidden"
                            onchange="profileHandleFileSelect(event)" />
                    </div>

                    {{-- File info strip --}}
                    <div id="profileFileInfoStrip" class="hidden mt-3 flex items-center gap-3 px-4 py-3 rounded-xl"
                        style="background:rgba(26,153,143,0.1);border:1px solid rgba(26,153,143,0.2);">
                        <svg class="w-5 h-5 shrink-0" style="color:#1A998F;" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p id="profileFileInfoName" class="text-sm font-medium truncate"
                                style="color:var(--mc-text);"></p>
                            <p id="profileFileInfoSize" class="text-xs" style="color:var(--mc-text-muted);"></p>
                        </div>
                        <button type="button" onclick="profileClearFileSelection()"
                            class="btn btn-xs btn-ghost btn-circle" style="color:var(--mc-text-muted);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-3 mt-5">
                        <button type="button" onclick="closeProfileAvatarModal()"
                            class="btn btn-warning flex-1 rounded-xl">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            বাতিল করুন
                        </button>
                        <button type="submit" id="profileUploadSubmitBtn" disabled
                            class="btn flex-1 rounded-xl text-white border-0 disabled:opacity-40 disabled:cursor-not-allowed transition-all duration-200"
                            style="background:#1A998F;">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            সংরক্ষণ করুন
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button onclick="closeProfileAvatarModal()">বন্ধ</button>
        </form>
    </dialog>

    {{-- Avatar Modal JS --}}
    <script>
        function closeProfileAvatarModal() {
            document.getElementById('profileAvatarModal').close();
            profileClearFileSelection();
        }

        function profileHandleFileSelect(event) {
            const file = event.target.files[0];
            if (file) profileApplyFile(file);
        }

        function profileHandleDragOver(event) {
            event.preventDefault();
            document.getElementById('profileDropZone').style.borderColor = '#1A998F';
            document.getElementById('profileDropZone').style.background = 'rgba(26,153,143,0.1)';
        }

        function profileHandleDragLeave(event) {
            document.getElementById('profileDropZone').style.borderColor = 'rgba(26,153,143,0.4)';
            document.getElementById('profileDropZone').style.background = 'rgba(26,153,143,0.04)';
        }

        function profileHandleDrop(event) {
            event.preventDefault();
            profileHandleDragLeave(event);
            const file = event.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                const dt = new DataTransfer();
                dt.items.add(file);
                document.getElementById('profileAvatarFileInput').files = dt.files;
                profileApplyFile(file);
            }
        }

        function profileApplyFile(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('profileModalPreview').src = e.target.result;
                document.getElementById('profilePreviewBadge').classList.remove('hidden');
            };
            reader.readAsDataURL(file);

            document.getElementById('profileFileInfoName').textContent = file.name;
            document.getElementById('profileFileInfoSize').textContent = (file.size / 1024).toFixed(1) + ' KB';
            document.getElementById('profileFileInfoStrip').classList.remove('hidden');
            document.getElementById('profileUploadSubmitBtn').disabled = false;
        }

        function profileClearFileSelection() {
            document.getElementById('profileAvatarFileInput').value = '';
            document.getElementById('profileFileInfoStrip').classList.add('hidden');
            document.getElementById('profilePreviewBadge').classList.add('hidden');
            document.getElementById('profileUploadSubmitBtn').disabled = true;
        }

        // Submit loading state
        document.getElementById('profileAvatarUploadForm').addEventListener('submit', function () {
            const btn = document.getElementById('profileUploadSubmitBtn');
            btn.disabled = true;
            btn.innerHTML = '<span class="loading loading-spinner loading-sm"></span> আপলোড হচ্ছে...';
        });

        // Auto-dismiss flash banners
        ['avatarFlash', 'avatarErrorFlash'].forEach(id => {
            const el = document.getElementById(id);
            if (el) setTimeout(() => {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            }, 4000);
        });

        // Re-open modal on validation error
        @if($errors->has('avatar'))
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('profileAvatarModal').showModal();
            });
        @endif
    </script>
    @endif

</x-layout>
