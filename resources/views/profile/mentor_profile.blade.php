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
            <div class="p-4 sm:p-8">
                <div class="flex flex-col lg:flex-row gap-6 sm:gap-8 items-center lg:items-start">

                    {{-- Avatar Container --}}
                    <div class="relative shrink-0 w-[90px] h-[90px] sm:w-[112px] sm:h-[112px]">
                        {{-- Avatar Circle --}}
                        <div class="group w-full h-full rounded-full overflow-hidden
                                    border-[3px] sm:border-4 border-[var(--mc-surface)]
                                    shadow-[var(--mc-shadow-md)] ring-2 sm:ring-3 ring-[var(--mc-border-teal)]
                                    transition:box-shadow .2s;">
                            @if($mentor->profile && $mentor->profile->avatar)
                            <img id="profileAvatarImg" src="{{ asset('storage/' . $mentor->profile->avatar) }}"
                                alt="Profile Photo" class="w-full h-full object-cover block" />
                            @else
                            <img id="profileAvatarImg"
                                src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
                                alt="Profile Photo" class="w-full h-full object-cover block" />
                            @endif
                        </div>

                        {{-- Small red dustbin button at the bottom-right corner --}}
                        @if(auth()->id() === $mentor->id && $mentor->profile && $mentor->profile->avatar)
                        <form action="{{ route('remove_avatar') }}" method="POST"
                            style="position:absolute; bottom:-4px; right:-4px; margin:0; z-index:10;"
                            onsubmit="return confirm('Are you sure you want to remove the profile picture?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Remove Photo" style="width:28px; height:28px; border-radius:9999px;
                                           background:#ef4444; border:2px solid #fff; cursor:pointer;
                                           display:flex; align-items:center; justify-content:center;
                                           box-shadow:0 2px 8px rgba(239,68,68,0.4);
                                           transition:all 0.2s;"
                                onmouseover="this.style.background='#dc2626'; this.style.transform='scale(1.15)';"
                                onmouseout="this.style.background='#ef4444'; this.style.transform='scale(1)';"
                                onclick="event.stopPropagation();">
                                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="#fff">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>

                    {{-- Name & Info --}}
                    <div class="flex-1 text-center lg:text-left space-y-2">
                        <div class="space-y-2">
                            <h1 class="text-2xl sm:text-4xl font-bold"
                                style="font-family:'Lora',serif; background: linear-gradient(135deg, var(--mc-primary), var(--mc-navy)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                {{ $mentor->name }}
                            </h1>

                            <div class="flex items-center justify-center lg:justify-start gap-1.5 flex-wrap">
                                @if($mentor->profile && $mentor->profile->is_verified)
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 text-xs sm:text-sm font-bold text-green-700 bg-green-100 rounded-full border border-green-200 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Verified
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 text-xs sm:text-sm font-bold text-red-700 bg-red-50 rounded-full border border-red-200 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Not Verified
                                </span>
                                @endif
                            </div>

                            <div class="flex items-center justify-center lg:justify-start gap-1.5 flex-wrap">
                                <span
                                    class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-bold px-2 py-0.5 rounded-full border"
                                    style="background: rgba(40,102,110,0.1); border-color: var(--mc-border-teal); color: var(--mc-primary);">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($mentor->role->value) }}
                                </span>
                                <span class="text-xs sm:text-sm font-medium" style="color: var(--mc-text-muted);">
                                    User ID: #{{ $mentor->id }}
                                </span>
                            </div>
                        </div>
                        <p class="text-sm sm:text-base md:text-lg font-medium italic leading-relaxed mt-1"
                            style="color: var(--mc-text);">
                            {{ $mentor->profile->short_bio ?? 'No short bio added yet' }}
                        </p>
                    </div>

                    {{-- Upload --}}
                    @if (auth()->id() === $mentor->id)
                    <div class="text-center lg:text-right shrink-0">
                        <button type="button" onclick="document.getElementById('profileAvatarModal').showModal()"
                            class="cursor-pointer inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border-[1.5px] sm:border-2 text-xs sm:text-sm font-bold transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="border-color: var(--mc-primary); color: var(--mc-primary); background: transparent;"
                            onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                            onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Upload Photo
                        </button>
                        <p class="mt-1.5 text-[10px] sm:text-xs" style="color: var(--mc-text-faint);">800x800 pixels ·
                            JPG or PNG</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ══════════════════════
        MAIN INFO CARD
        ══════════════════════ --}}
        <div class="rounded-2xl border overflow-hidden"
            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">

            {{-- Personal Info --}}
            <div class="border-b" style="border-color: var(--mc-border-subtle);">

                {{-- Section Header Banner --}}
                <div class="px-4 sm:px-8 pt-5 sm:pt-7 pb-5 sm:pb-6"
                    style="background: linear-gradient(135deg, rgba(40,102,110,0.12) 0%, rgba(26,153,143,0.08) 50%, rgba(3,63,99,0.06) 100%); border-bottom: 2px solid rgba(40,102,110,0.15);">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-2xl shadow-md flex-shrink-0"
                                style="background: linear-gradient(135deg, var(--mc-primary), #1A998F);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-extrabold tracking-tight"
                                    style="font-family:'Lora',serif; background: linear-gradient(135deg, var(--mc-primary), #1A998F, var(--mc-navy)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                                    Personal Information
                                </h2>
                                <p class="text-xs sm:text-sm mt-0.5 font-medium" style="color: var(--mc-text-muted);">
                                    Detailed profile and contact info of the mentor</p>
                            </div>
                        </div>
                        @if (auth()->id() === $mentor->id)
                        <a href="{{ route('edit_profile', $mentor->id) }}"
                            class="inline-flex items-center gap-1.5 text-xs font-bold px-4 py-2 rounded-xl border-2 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5 flex-shrink-0"
                            style="border-color: var(--mc-primary); color: var(--mc-primary);"
                            onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                            onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                            </svg>
                            Update Profile
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Info Grid --}}
                <div class="p-4 sm:p-8 space-y-4 sm:space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">
                        @php
                        $infoItems = [
                        ['icon_color'=>'#3b82f6', 'bg'=>'rgba(59,130,246,0.12)', 'label'=>'Educational Qualification',
                        'value'=>$mentor->profile->highgest_education_level ?? '-', 'bold'=>false,
                        'icon'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0
                        018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0
                        0112
                        3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814'],

                        ['icon_color'=>'#8b5cf6', 'bg'=>'rgba(139,92,246,0.12)', 'label'=>'Institution Name',
                        'value'=>$mentor->profile->institution_name ?? '-', 'bold'=>false,
                        'icon'=>'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012
                        9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18'],

                        ['icon_color'=>'#eab308', 'bg'=>'rgba(234,179,8,0.12)', 'label'=>'Department
                        (Field of Study)',
                        'value'=>$mentor->profile->department ?? '-', 'bold'=>false,
                        'icon'=>'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016
                        18c2.305
                        0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0
                        0018
                        18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],

                        ['icon_color'=>'#10b981', 'bg'=>'rgba(16,185,129,0.12)', 'label'=>'Joined as Mentor',
                        'value'=>$mentor->created_at->format('F Y'), 'bold'=>false,
                        'icon'=>'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0
                        00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285
                        5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0
                        01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0
                        01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],

                        ['icon_color'=>'#ec4899', 'bg'=>'rgba(236,72,153,0.12)', 'label'=>'Teaching Language',
                        'value'=>$mentor->profile->preferred_language ?? '-', 'bold'=>false,
                        'icon'=>'M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0
                        2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061
                        1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802'],
                        ];
                        @endphp
                        @foreach($infoItems as $item)
                        <div class="group flex items-start gap-3 p-3.5 sm:p-4 rounded-2xl border transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);"
                            onmouseover="this.style.background='var(--mc-surface-hover)'; this.style.borderColor='rgba(40,102,110,0.3)'"
                            onmouseout="this.style.background='var(--mc-bg)'; this.style.borderColor='var(--mc-border-teal-sub)'">
                            <div class="p-2.5 sm:p-3 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                                style="background: {{ $item['bg'] }};">
                                <svg class="w-5 h-5 sm:w-5.5 sm:h-5.5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="{{ $item['icon_color'] }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs sm:text-sm font-bold mb-1" style="color: var(--mc-text);">{{
                                    $item['label'] }}</p>
                                <p class="text-sm sm:text-base break-all {{ $item['bold'] ? 'font-extrabold' : 'font-medium' }}"
                                    style="color: var(--mc-text-muted);">{{ $item['value'] }}</p>
                            </div>
                        </div>
                        @endforeach

                        {{-- Teaching Experience --}}
                        @php
                        $expYears = $mentor->profile->teaching_experience_years ?? null;
                        $expMonths = $mentor->profile->teaching_experience_months ?? null;
                        $expParts = [];
                        if ($expYears) $expParts[] = $expYears . ' Years';
                        if ($expMonths) $expParts[] = $expMonths . ' Months';
                        $expValue = count($expParts) ? implode(' ', $expParts) : '-';
                        @endphp
                        <div class="group flex items-start gap-3 p-3.5 sm:p-4 rounded-2xl border transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);"
                            onmouseover="this.style.background='var(--mc-surface-hover)'; this.style.borderColor='rgba(40,102,110,0.3)'"
                            onmouseout="this.style.background='var(--mc-bg)'; this.style.borderColor='var(--mc-border-teal-sub)'">
                            <div class="p-2.5 sm:p-3 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                                style="background: rgba(14,165,233,0.12);">
                                <svg class="w-5 h-5 sm:w-5.5 sm:h-5.5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#0ea5e9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs sm:text-sm font-bold mb-1" style="color: var(--mc-text);">Teaching
                                    Experience</p>
                                <p class="text-sm sm:text-base font-medium" style="color: var(--mc-text-muted);">{{
                                    $expValue }}</p>
                            </div>
                        </div>
                        {{-- Hourly Charge --}}
                        <div class="group flex items-start gap-3 p-3.5 sm:p-4 rounded-2xl transition-all duration-300 hover:-translate-y-1 relative overflow-hidden"
                            style="background: linear-gradient(135deg, rgba(16,185,129,0.08) 0%, rgba(16,185,129,0.02) 100%); border: 2px solid rgba(16,185,129,0.4); box-shadow: 0 4px 20px rgba(16,185,129,0.15);"
                            onmouseover="this.style.borderColor='rgba(16,185,129,0.8)'; this.style.boxShadow='0 8px 25px rgba(16,185,129,0.25)';"
                            onmouseout="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.boxShadow='0 4px 20px rgba(16,185,129,0.15)';">
                            <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-500 rounded-full blur-3xl opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                            <div class="p-2.5 sm:p-3 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-300 shadow-md relative z-10"
                                style="background: linear-gradient(135deg, #10b981, #059669);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0 relative z-10">
                                <p class="text-xs sm:text-sm font-bold mb-0.5 uppercase tracking-wide" style="color: #10b981;">Hourly Charge</p>
                                <p class="text-base sm:text-lg font-extrabold" style="color: var(--mc-text);">{{
                                    $mentor->profile->hourly_rate ? '৳ ' .
                                    number_format($mentor->profile->hourly_rate) : 'Not set' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Skills --}}
            <div class="p-4 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                        <h2 class="text-lg sm:text-xl font-bold"
                            style="color: var(--mc-text); font-family:'Lora',serif;">
                            Skills</h2>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 sm:gap-2">
                    @if (!empty($mentor->profile->skills))
                    @foreach (explode(',', $mentor->profile->skills) as $skill)
                    <span
                        class="inline-flex items-center gap-1 text-xs sm:text-sm font-semibold px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-full border transition-all duration-200 hover:scale-105 cursor-default"
                        style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
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
                        <p class="text-sm" style="color: var(--mc-text-faint);">No skills added</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- About Me --}}
            <div class="p-4 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-lg sm:text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">
                        About Me</h2>
                </div>
                <div class="rounded-2xl px-4 pt-2.5 pb-4 sm:px-6 sm:pt-2 sm:pb-5 border shadow-sm"
                    style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                    <p class="text-sm sm:text-base leading-relaxed tracking-wide"
                        style="color: var(--mc-text); white-space: pre-line;">
                        {{ $mentor->profile->bio ?? 'No detailed bio added' }}
                    </p>
                </div>
            </div>

            {{-- Achievements --}}
            <div class="p-4 sm:p-8 border-b" style="border-color: var(--mc-border-subtle);">
                <div class="flex items-center justify-between mb-6 gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, #eab308, rgba(234,179,8,0.3));"></div>
                        <h2 class="text-lg sm:text-xl font-bold"
                            style="color: var(--mc-text); font-family:'Lora',serif;">Achievements</h2>
                    </div>
                    @if(auth()->id() === $mentor->id)
                    <button type="button" onclick="document.getElementById('addAchievementModal').showModal()"
                        class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-bold px-2 py-1 sm:px-3 sm:py-1.5 rounded-xl border transition-all duration-200 hover:shadow-sm hover:-translate-y-0.5"
                        style="border-color: #eab308; color: #d97706;"
                        onmouseover="this.style.background='#eab308';this.style.color='white'"
                        onmouseout="this.style.background='transparent';this.style.color='#d97706'">
                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        New Achievement
                    </button>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                    @forelse($mentor->achievements as $ach)
                    <div class="group flex items-start gap-3 p-3.5 rounded-2xl border transition-all duration-200 hover:shadow-md relative"
                        style="background: rgba(234,179,8,0.07); border-color: rgba(234,179,8,0.2);">
                        <div class="text-xl shrink-0 mt-0.5">🏆</div>
                        <div class="flex-1 min-w-0 pr-12 flex flex-col h-full">
                            <p class="text-xs sm:text-sm font-bold" style="color: #eab308;">{{ $ach->title }}</p>
                            <p class="text-[11px] sm:text-xs mt-1 leading-relaxed flex-1"
                                style="color: var(--mc-text-muted);">{{
                                Str::limit($ach->description, 100) }}</p>

                            @if(auth()->id() === $mentor->id)
                            <div class="mt-2.5 flex gap-1.5 relative z-10">
                                <button type="button"
                                    onclick="editAchievement({{ $ach->id }}, '{{ addslashes($ach->title) }}', '{{ addslashes($ach->description) }}')"
                                    class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 transition-colors shadow-sm border border-blue-100"
                                    title="Edit">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <form action="{{ route('achievements.delete', $ach->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this achievement?');"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors shadow-sm border border-red-100"
                                        title="Delete">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        @if($ach->image)
                        <div class="absolute right-3.5 top-3.5 shrink-0 w-10 h-10 rounded-lg overflow-hidden cursor-pointer border border-yellow-200"
                            onclick="showAchievementImage('{{ asset('storage/' . $ach->image) }}')">
                            <img src="{{ asset('storage/' . $ach->image) }}" alt="Achievement Image"
                                class="w-full h-full object-cover">
                        </div>
                        @endif
                    </div>
                    @empty
                    <p class="text-xs sm:text-sm" style="color: var(--mc-text-muted);">No achievements added</p>
                    @endforelse
                </div>
            </div>



        </div>

        {{-- ══════════════════════
        REVIEWS CARD
        ══════════════════════ --}}
        @php
        $reviews = $mentor->reviews()->with('student.profile')->latest()->get();
        $avgRating = $reviews->count() > 0 ? round($reviews->avg('rating'), 1) : null;
        @endphp

        <div class="rounded-2xl border"
            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm);">
            <div class="p-4 sm:p-8">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-10 rounded-full"
                            style="background: linear-gradient(to bottom, #eab308, rgba(234,179,8,0.3));"></div>
                        <div>
                            <h2 class="text-lg sm:text-xl font-bold flex items-center gap-2"
                                style="color: var(--mc-text); font-family:'Lora',serif;">
                                <svg class="w-5.5 h-5.5" fill="#eab308" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                </svg>
                                Student Reviews
                            </h2>
                            <p class="text-xs mt-0.5" style="color: var(--mc-text-muted);">Student feedback and experiences</p>
                        </div>
                    </div>

                    @if($avgRating)
                    <div class="rounded-xl px-4 py-3 border text-center"
                        style="background: rgba(234,179,8,0.07); border-color: rgba(234,179,8,0.2);">
                        <p class="text-2xl font-bold" style="color: #d97706; font-family:'Lora',serif;">{{ $avgRating }}
                        </p>
                        <div class="flex justify-center my-0.5 gap-0.5">
                            @for($i = 1; $i <= 5; $i++) <svg
                                class="w-3.5 h-3.5 {{ $i <= round($avgRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                </svg>
                                @endfor
                        </div>
                        <p class="text-[10px]" style="color: var(--mc-text-muted);">From {{ $reviews->count() }} reviews
                        </p>
                    </div>
                    @endif
                </div>

                @if($reviews->isEmpty())
                <div class="text-center py-12">
                    <svg class="w-14 h-14 mx-auto mb-3 opacity-20" fill="#eab308" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                    </svg>
                    <p class="font-bold" style="color: var(--mc-text-muted);">No reviews yet</p>
                    <p class="text-sm mt-1" style="color: var(--mc-text-faint);">Students can give a review after completing a session</p>
                </div>

                @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
                    @foreach($reviews as $review)
                    <div class="rounded-2xl border p-4 sm:p-5 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                        style="border-color: var(--mc-border-teal-sub); background: var(--mc-bg);">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full overflow-hidden shrink-0 border-2"
                                    style="border-color: var(--mc-border-teal);">
                                    @if($review->student->profile?->avatar)
                                    <img src="{{ asset('storage/' . $review->student->profile->avatar) }}"
                                        alt="{{ $review->student->name }}" class="w-full h-full object-cover">
                                    @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($review->student->name) }}&background=28666e&color=fff&size=80&bold=true"
                                        alt="{{ $review->student->name }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-xs sm:text-sm" style="color: var(--mc-text);">{{
                                        $review->student->name }}</p>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <div class="flex gap-0.5">
                                            @for($i = 1; $i <= 5; $i++) <svg
                                                class="w-3 h-3 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                                </svg>
                                                @endfor
                                        </div>
                                        <span class="text-[10px]" style="color: var(--mc-text-faint);">
                                            {{ $review->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="inline-flex items-center gap-1 text-[10px] font-semibold px-2 py-0.5 rounded-full border shrink-0"
                                style="border-color: var(--mc-border-teal); color: var(--mc-primary);">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Verified
                            </span>
                        </div>

                        @if($review->comment)
                        <p class="text-xs sm:text-sm italic leading-relaxed" style="color: var(--mc-text-muted);">"{{
                            $review->comment }}"
                        </p>
                        @else
                        <p class="text-xs sm:text-sm italic" style="color: var(--mc-text-faint);">No comment</p>
                        @endif

                        <div class="mt-3 pt-3 border-t flex items-center gap-2"
                            style="border-color: var(--mc-border-subtle);">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="color: var(--mc-text-faint);">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span class="text-[10px]" style="color: var(--mc-text-faint);">{{
                                $review->session->topic->topic
                                ??
                                'N/A' }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

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
                    <h3 class="text-lg font-bold text-white">Change Profile Picture</h3>
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
                        style="background:#1A998F;">Preview</div>
                    <p class="text-xs" style="color:var(--mc-text-muted);">Current Profile Picture</p>
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
                            <p class="font-semibold" style="color:var(--mc-text);">Upload Picture</p>
                            <p class="text-xs mt-1" style="color:var(--mc-text-muted);">
                                Drag or Click &bull; JPG, PNG, GIF, WebP &bull; Max 2 MB
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
                            Cancel
                        </button>
                        <button type="submit" id="profileUploadSubmitBtn" disabled
                            class="btn flex-1 rounded-xl text-white border-0 disabled:opacity-40 disabled:cursor-not-allowed transition-all duration-200"
                            style="background:#1A998F;">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button onclick="closeProfileAvatarModal()">Close</button>
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
            btn.innerHTML = '<span class="loading loading-spinner loading-sm"></span> Uploading...';
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
        <div class="modal-box p-6 rounded-3xl"
            style="background:var(--mc-surface);border:1px solid var(--mc-border-teal-sub);">
            <h3 class="font-bold text-lg mb-4 text-[#033f63] dark:text-[#7ec8e3]">Add New Achievement</h3>
            <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">Title</label>
                        <input type="text" name="title" required
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">Description (short)</label>
                        <textarea name="description" rows="3" required
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">Image (Certificate/Crest)</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                </div>
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('addAchievementModal').close()"
                        class="btn btn-ghost rounded-xl">Cancel</button>
                    <button type="submit" class="btn rounded-xl text-white" style="background:#eab308;border:none;">Add</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- Edit Achievement Modal --}}
    <dialog id="editAchievementModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-6 rounded-3xl"
            style="background:var(--mc-surface);border:1px solid var(--mc-border-teal-sub);">
            <h3 class="font-bold text-lg mb-4 text-[#033f63] dark:text-[#7ec8e3]">Edit Achievement</h3>
            <form id="editAchievementForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">Title</label>
                        <input type="text" name="title" id="editAchTitle" required
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">Description (short)</label>
                        <textarea name="description" id="editAchDesc" rows="3" required
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1 text-[#033f63] dark:text-[#7ec8e3]">New Image (Optional)</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-transparent text-sm">
                    </div>
                </div>
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('editAchievementModal').close()"
                        class="btn btn-ghost rounded-xl">Cancel</button>
                    <button type="submit" class="btn rounded-xl text-white"
                        style="background:#eab308;border:none;">Update</button>
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
        <div class="modal-box p-0 rounded-2xl bg-transparent shadow-none max-w-3xl overflow-hidden">
            <div class="relative inline-block w-full">
                <button type="button" onclick="document.getElementById('viewAchievementImageModal').close()"
                    class="absolute top-4 right-4 btn btn-sm btn-circle z-50 shadow-xl"
                    style="background-color: #ef4444 !important; color: white !important; border: 2px solid white !important;">✕</button>
                <img id="viewAchImage" src="" alt="Achievement"
                    class="w-full rounded-2xl shadow-2xl bg-white block relative z-40">
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
