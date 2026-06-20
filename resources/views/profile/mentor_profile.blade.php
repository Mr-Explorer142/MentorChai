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
                            @if($mentor->profile && $mentor->profile->avatar)
                            <img id="profileAvatarImg" src="{{ asset('storage/' . $mentor->profile->avatar) }}"
                                alt="Profile Photo" style="width:100%;height:100%;object-fit:cover;display:block;" />
                            @else
                            <img id="profileAvatarImg"
                                src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
                                alt="Profile Photo" style="width:100%;height:100%;object-fit:cover;display:block;" />
                            @endif
                        </div>

                        {{-- Small red dustbin button at the bottom-right corner --}}
                        @if(auth()->id() === $mentor->id && $mentor->profile && $mentor->profile->avatar)
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
                        <div class="space-y-3">
                            <h1 class="text-3xl sm:text-4xl font-bold"
                                style="font-family:'Lora',serif; background: linear-gradient(135deg, var(--mc-primary), var(--mc-navy)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                {{ $mentor->name }}
                            </h1>
                            
                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                @if($mentor->profile && $mentor->profile->is_verified)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-sm font-bold text-green-700 bg-green-100 rounded-full border border-green-200 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                        </svg>
                                        Verified
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-sm font-bold text-red-700 bg-red-50 rounded-full border border-red-200 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                        </svg>
                                        Not Verified
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full border"
                                    style="background: rgba(40,102,110,0.1); border-color: var(--mc-border-teal); color: var(--mc-primary);">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($mentor->role->value) }}
                                </span>
                                <span class="text-sm font-medium" style="color: var(--mc-text-muted);">
                                    ইউজার আইডি: #{{ $mentor->id }}
                                </span>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-muted);">
                            {{ $mentor->profile->short_bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                        </p>
                    </div>

                    {{-- Upload --}}
                    @if (auth()->id() === $mentor->id)
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
        MAIN INFO CARD
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
                    @if (auth()->id() === $mentor->id)
                    <a href="{{ route('edit_profile', $mentor->id) }}"
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
                    @php
                    $infoItems = [
                    ['icon_color'=>'#3b82f6', 'bg'=>'rgba(59,130,246,0.1)', 'label'=>'ই-মেইল', 'value'=>$mentor->email,
                    'bold'=>false,
                    'icon'=>'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25
                    2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25
                    2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                    ['icon_color'=>'#22c55e', 'bg'=>'rgba(34,197,94,0.1)', 'label'=>'ফোন',
                    'value'=>$mentor->profile->phone ?? '—', 'bold'=>false,
                    'icon'=>'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0
                    002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97
                    1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0
                    01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125
                    1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z'],
                    ['icon_color'=>'#eab308', 'bg'=>'rgba(234,179,8,0.1)', 'label'=>'ঠিকানা',
                    'value'=>$mentor->profile->address ?? '—', 'bold'=>false,
                    'icon'=>'M15 10.5a3 3 0 11-6 0 3 3 0 016 0zM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5
                    10.5a7.5 7.5 0 1115 0z'],
                    ['icon_color'=>'#8b5cf6', 'bg'=>'rgba(139,92,246,0.1)', 'label'=>'জন্ম তারিখ',
                    'value'=>$mentor->profile->date_of_birth ?? '—', 'bold'=>false,
                    'icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121
                    7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5'],
                    ['icon_color'=>'#28666e', 'bg'=>'rgba(40,102,110,0.1)', 'label'=>'ঘণ্টা প্রতি চার্জ',
                    'value'=>$mentor->profile->hourly_rate ? '৳'.number_format($mentor->profile->hourly_rate) : '—',
                    'bold'=>true,
                    'icon'=>'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536
                    12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006
                    0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ];
                    @endphp
                    @foreach($infoItems as $item)
                    <div class="group flex items-start gap-3 p-4 rounded-xl transition-all duration-200"
                        style="--hover-bg: var(--mc-surface-hover);"
                        onmouseover="this.style.background='var(--mc-surface-hover)'"
                        onmouseout="this.style.background='transparent'">
                        <div class="p-2.5 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background: {{ $item['bg'] }};">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="{{ $item['icon_color'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold mb-0.5" style="color: var(--mc-text);">{{ $item['label'] }}</p>
                            <p class="text-sm break-all {{ $item['bold'] ? 'font-bold' : '' }}"
                                style="color: var(--mc-text-muted);">{{ $item['value'] }}</p>
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
                    'value'=>$mentor->profile->highgest_education_level ?? '—',
                    'icon'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0
                    018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112
                    3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814'],
                    ['bg'=>'rgba(124,152,133,0.12)', 'stroke'=>'var(--mc-sage)', 'label'=>'শিক্ষাপ্রতিষ্ঠানের নাম',
                    'value'=>$mentor->profile->institution_name ?? '—',
                    'icon'=>'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012
                    9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18'],
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
                            <p class="text-sm" style="color: var(--mc-text-muted);">{{ $edu['value'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Skills --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                        <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">
                            দক্ষতাসমূহ</h2>
                    </div>
                    <a href="https://www.youtube.com/playlist?list=YOUR_PLAYLIST_ID" target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color: rgba(239,68,68,0.4); color: #dc2626;"
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
                    <p class="text-sm leading-7" style="color: var(--mc-text-muted); white-space: pre-line;">
                        {{ $mentor->profile->bio ?? 'কোনো শর্ট বায়ো যোগ করা হয়নি' }}
                    </p>
                </div>
            </div>

            {{-- Achievements --}}
            <div class="p-6 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, #eab308, rgba(234,179,8,0.3));"></div>
                        <h2 class="text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">অর্জনসমূহ
                        </h2>
                    </div>
                    @if(auth()->id() === $mentor->id)
                    <button type="button" onclick="document.getElementById('addAchievementModal').showModal()"
                        class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color: #eab308; color: #d97706;"
                        onmouseover="this.style.background='#eab308';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='#d97706'">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        নতুন অর্জন যোগ করুন
                    </button>
                    @endif
                </div>

                <div class="space-y-3">
                    @forelse($mentor->achievements as $ach)
                    <div class="group flex items-start gap-4 p-4 rounded-2xl border transition-all duration-200 hover:shadow-md block relative"
                        style="background: rgba(234,179,8,0.07); border-color: rgba(234,179,8,0.2);">
                        <div class="text-2xl shrink-0 mt-0.5">🏆</div>
                        <div class="flex-1 min-w-0 pr-16">
                            <p class="text-sm font-bold" style="color: #eab308;">{{ $ach->title }}</p>
                            <p class="text-xs mt-1 leading-relaxed" style="color: var(--mc-text-muted);">{{ Str::limit($ach->description, 100) }}</p>
                            @if(auth()->id() === $mentor->id)
                            <div class="mt-2 flex gap-2">
                                <button type="button" onclick="editAchievement({{ $ach->id }}, '{{ addslashes($ach->title) }}', '{{ addslashes($ach->description) }}')" class="text-xs text-blue-500 hover:underline">Edit</button>
                                <form action="{{ route('achievements.delete', $ach->id) }}" method="POST" onsubmit="return confirm('Delete this achievement?');" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                            @endif
                        </div>
                        @if($ach->image)
                        <div class="absolute right-4 top-4 shrink-0 w-12 h-12 rounded-lg overflow-hidden cursor-pointer border border-yellow-200"
                             onclick="showAchievementImage('{{ asset('storage/' . $ach->image) }}')">
                            <img src="{{ asset('storage/' . $ach->image) }}" alt="Achievement Image" class="w-full h-full object-cover">
                        </div>
                        @endif
                    </div>
                    @empty
                    <p class="text-sm" style="color: var(--mc-text-muted);">কোনো অর্জন যোগ করা হয়নি</p>
                    @endforelse
                </div>
            </div>



        </div>

        {{-- ══════════════════════
        REVIEWS CARD
        ══════════════════════ --}}
        <div class="rounded-2xl border"
            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
            <div class="p-6 sm:p-8">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-10 rounded-full"
                            style="background: linear-gradient(to bottom, #eab308, rgba(234,179,8,0.3));"></div>
                        <div>
                            <h2 class="text-xl font-bold flex items-center gap-2"
                                style="color: var(--mc-text); font-family:'Lora',serif;">
                                <svg class="w-6 h-6" fill="#eab308" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                </svg>
                                ছাত্রদের রিভিউ
                            </h2>
                            <p class="text-xs mt-0.5" style="color: var(--mc-text-muted);">শিক্ষার্থীদের মতামত ও
                                অভিজ্ঞতা</p>
                        </div>
                    </div>
                    <div class="rounded-2xl px-6 py-4 border text-center"
                        style="background: rgba(234,179,8,0.07); border-color: rgba(234,179,8,0.2);">
                        <p class="text-3xl font-bold" style="color: #d97706; font-family:'Lora',serif;">৪.৮</p>
                        <div class="flex justify-center my-1">
                            <span class="text-yellow-400 text-sm tracking-wide">★★★★★</span>
                        </div>
                        <p class="text-xs" style="color: var(--mc-text-muted);">৫টি রিভিউ থেকে</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                    $reviews = [
                    ['initial'=>'A', 'name'=>'Ahsan Rahman', 'color'=>'#28666e', 'stars'=>5, 'time'=>'২ দিন আগে',
                    'text'=>'বিষয়গুলো খুব পরিষ্কারভাবে বুঝিয়েছেন। জটিল টপিকও সহজ করে বোঝানোর ধরনটা দারুণ লেগেছে।'],
                    ['initial'=>'S', 'name'=>'Sara Islam', 'color'=>'#3d8a8f', 'stars'=>4, 'time'=>'৫ দিন আগে',
                    'text'=>'প্রতিটি সেশন ছিল গোছানো ও কাজে লাগার মতো। বাস্তব প্রজেক্টে কাজ করার আত্মবিশ্বাস পেয়েছি।'],
                    ['initial'=>'M', 'name'=>'Mahmud Hasan', 'color'=>'#7c9885', 'stars'=>4, 'time'=>'১ সপ্তাহ আগে',
                    'text'=>'খুব বন্ধুসুলভ এবং প্রফেশনালভাবে গাইড করেছেন। প্রশ্ন করলে সবসময় ধৈর্য ধরে উত্তর
                    দিয়েছেন।'],
                    ['initial'=>'N', 'name'=>'Nusrat Jahan', 'color'=>'#8b5cf6', 'stars'=>3, 'time'=>'২ সপ্তাহ আগে',
                    'text'=>'শেখানোর গতি আর ব্যাখ্যা দুটোই ভালো। নতুনদের পাশাপাশি মাঝামাঝি লেভেলের শিক্ষার্থীদের জন্যও
                    উপকারী।'],
                    ];
                    @endphp

                    @foreach($reviews as $review)
                    <div class="rounded-2xl border p-5 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color: var(--mc-border-teal-sub); background: var(--mc-bg);">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full flex items-center justify-center text-lg font-bold text-white shrink-0"
                                    style="background: {{ $review['color'] }};">{{ $review['initial'] }}</div>
                                <div>
                                    <p class="font-bold text-sm" style="color: var(--mc-text);">{{ $review['name'] }}
                                    </p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-yellow-400 text-xs tracking-wide">
                                            {{ str_repeat('★', $review['stars']) }}{{ str_repeat('☆', 5 -
                                            $review['stars']) }}
                                        </span>
                                        <span class="text-xs" style="color: var(--mc-text-faint);">{{ $review['time']
                                            }}</span>
                                    </div>
                                </div>
                            </div>
                            <svg class="w-7 h-7 shrink-0" fill="rgba(234,179,8,0.15)" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                        </div>
                        <p class="text-sm italic leading-relaxed" style="color: var(--mc-text-muted);">"{{
                            $review['text'] }}"</p>
                        <div class="mt-3">
                            <span
                                class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full border"
                                style="border-color: var(--mc-border-teal); color: var(--mc-primary);">
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
                        style="border-color: var(--mc-border-teal-sub); background: var(--mc-bg);">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full flex items-center justify-center text-lg font-bold text-white shrink-0"
                                    style="background: #22c55e;">R</div>
                                <div>
                                    <p class="font-bold text-sm" style="color: var(--mc-text);">Rakib Chowdhury</p>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-yellow-400 text-xs tracking-wide">★★★★☆</span>
                                        <span class="text-xs" style="color: var(--mc-text-faint);">৩ সপ্তাহ আগে</span>
                                    </div>
                                </div>
                            </div>
                            <svg class="w-7 h-7 shrink-0" fill="rgba(234,179,8,0.15)" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                        </div>
                        <p class="text-sm italic leading-relaxed" style="color: var(--mc-text-muted);">"বিষয় সম্পর্কে
                            গভীর ধারণা আছে এবং বোঝানোর স্টাইলও চমৎকার। যারা সিরিয়াসলি শিখতে চায়, তাদের জন্য খুব ভালো।"
                        </p>
                        <div class="mt-3">
                            <span
                                class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full border"
                                style="border-color: var(--mc-border-teal); color: var(--mc-primary);">
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

                <div class="text-center mt-8">
                    <button
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl border-2 font-bold text-sm transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color: var(--mc-primary); color: var(--mc-primary);"
                        onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
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

    {{-- ══════════════════════════════════════════
    AVATAR UPLOAD MODAL (own profile only)
    ══════════════════════════════════════════ --}}
    @if(auth()->id() === $mentor->id)
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
                        @if($mentor->profile && $mentor->profile->avatar)
                        <img id="profileModalPreview" src="{{ asset('storage/' . $mentor->profile->avatar) }}"
                            alt="Preview" class="w-full h-full object-cover transition-all duration-300" />
                        @else
                        <img id="profileModalPreview"
                            src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
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

    {{-- ══════════════════════════════════════════
    ACHIEVEMENT MODALS (own profile only)
    ══════════════════════════════════════════ --}}
    @if(auth()->id() === $mentor->id)
    {{-- Add Achievement Modal --}}
    <dialog id="addAchievementModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-6 rounded-3xl" style="background:var(--mc-surface);border:1px solid var(--mc-border-teal-sub);">
            <h3 class="font-bold text-lg mb-4 text-[#033f63] dark:text-[#7ec8e3]">নতুন অর্জন যোগ করুন</h3>
            <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">শিরোনাম</label>
                        <input type="text" name="title" required class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">বিবরণ (ছোট করে)</label>
                        <textarea name="description" rows="3" required class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">ছবি (সার্টিফিকেট/ক্রেস্ট)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                </div>
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('addAchievementModal').close()" class="btn btn-ghost rounded-xl">বাতিল</button>
                    <button type="submit" class="btn rounded-xl text-white" style="background:#eab308;border:none;">যোগ করুন</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- Edit Achievement Modal --}}
    <dialog id="editAchievementModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-6 rounded-3xl" style="background:var(--mc-surface);border:1px solid var(--mc-border-teal-sub);">
            <h3 class="font-bold text-lg mb-4 text-[#033f63] dark:text-[#7ec8e3]">অর্জন সম্পাদনা করুন</h3>
            <form id="editAchievementForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">শিরোনাম</label>
                        <input type="text" name="title" id="editAchTitle" required class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">বিবরণ (ছোট করে)</label>
                        <textarea name="description" id="editAchDesc" rows="3" required class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">নতুন ছবি (ঐচ্ছিক)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                </div>
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('editAchievementModal').close()" class="btn btn-ghost rounded-xl">বাতিল</button>
                    <button type="submit" class="btn rounded-xl text-white" style="background:#eab308;border:none;">আপডেট করুন</button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        function editAchievement(id, title, desc) {
            const form = document.getElementById('editAchievementForm');
            form.action = `/profile/achievements/${id}`;
            document.getElementById('editAchTitle').value = title;
            document.getElementById('editAchDesc').value = desc;
            document.getElementById('editAchievementModal').showModal();
        }
    </script>
    @endif

    {{-- View Image Modal --}}
    <dialog id="viewAchievementImageModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-0 rounded-2xl bg-transparent shadow-none max-w-3xl">
            <div class="relative">
                <button type="button" onclick="document.getElementById('viewAchievementImageModal').close()" class="absolute -top-3 -right-3 btn btn-sm btn-circle btn-error text-white z-10 shadow-lg">✕</button>
                <img id="viewAchImage" src="" alt="Achievement" class="w-full rounded-2xl shadow-2xl bg-white">
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
        function showAchievementImage(url) {
            document.getElementById('viewAchImage').src = url;
            document.getElementById('viewAchievementImageModal').showModal();
        }
    </script>

</x-layout>
