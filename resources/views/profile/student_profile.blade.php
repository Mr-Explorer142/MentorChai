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
                            @if($student->profile && $student->profile->avatar)
                            <img id="profileAvatarImg" src="{{ asset('storage/' . $student->profile->avatar) }}"
                                alt="Profile Photo" class="w-full h-full object-cover block" />
                            @else
                            <img id="profileAvatarImg"
                                src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=28666e&color=ffffff&size=224&font-size=0.38&bold=true"
                                alt="Profile Photo" class="w-full h-full object-cover block" />
                            @endif
                        </div>

                        {{-- Small red dustbin button at the bottom-right corner --}}
                        @if(auth()->id() === $student->id && $student->profile && $student->profile->avatar)
                        <form id="removeAvatarForm" action="{{ route('remove_avatar') }}" method="POST"
                            style="position:absolute; bottom:-4px; right:-4px; margin:0; z-index:10;">
                            @csrf
                            @method('DELETE')
                            <button type="button" title="Remove Photo" style="width:28px; height:28px; border-radius:9999px;
                                           background:#ef4444; border:2px solid #fff; cursor:pointer;
                                           display:flex; align-items:center; justify-content:center;
                                           box-shadow:0 2px 8px rgba(239,68,68,0.4);
                                           transition:all 0.2s;"
                                onmouseover="this.style.background='#dc2626'; this.style.transform='scale(1.15)';"
                                onmouseout="this.style.background='#ef4444'; this.style.transform='scale(1)';"
                                onclick="event.stopPropagation(); document.getElementById('removeAvatarModal').showModal();">
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
                                {{ $student->name }}
                            </h1>
                            <div class="flex items-center justify-center lg:justify-start gap-1.5 flex-wrap">
                                <span
                                    class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-bold px-2.5 py-0.5 rounded-full border"
                                    style="background: rgba(40,102,110,0.1); border-color: var(--mc-border-teal); color: var(--mc-primary);">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($student->role->value) }}
                                </span>
                                <span class="text-xs sm:text-sm font-medium" style="color: var(--mc-text-muted);">
                                    User ID: #{{ $student->id }}
                                </span>
                            </div>
                        </div>

                    </div>

                    {{-- Upload Photo --}}
                    @if (auth()->id() === $student->id)
                    <div class="text-center lg:text-right shrink-0">
                        <button type="button" onclick="document.getElementById('profileAvatarModal').showModal()"
                            class="cursor-pointer inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border-[1.5px] sm:border-2 text-xs sm:text-sm font-bold transition-all duration-200 hover:shadow-md hover:-translate-y-0.5"
                            style="border-color: var(--mc-primary); color: var(--mc-primary); background: transparent;"
                            onmouseover="this.style.background='var(--mc-primary)';this.style.color='white'"
                            onmouseout="this.style.background='transparent';this.style.color='var(--mc-primary)'">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Upload Photo
                        </button>
                        <p class="mt-1.5 text-[10px] sm:text-xs" style="color: var(--mc-text-faint);">800×800 pixels · JPG or PNG</p>
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
            <div class="p-4 sm:p-8" style="border-color: var(--mc-border-subtle);">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-7">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 rounded-full"
                            style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                        <h2 class="text-lg sm:text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">Personal Information</h2>
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
                        Update Profile
                    </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">
                    @foreach([
                    ['ic'=>'#3b82f6', 'bg'=>'rgba(59,130,246,0.1)', 'label'=>'Email', 'val'=>$student->email,
                    'bold'=>false,
                    'path'=>'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25
                    2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25
                    2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75'],
                    ['ic'=>'var(--mc-primary)', 'bg'=>'rgba(40,102,110,0.1)', 'label'=>'Educational Qualification',
                    'val'=>$student->profile->highgest_education_level ?? '-', 'bold'=>false,
                    'path'=>'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0
                    018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112
                    3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814'],
                    ['ic'=>'var(--mc-sage)', 'bg'=>'rgba(124,152,133,0.12)', 'label'=>'Institution Name',
                    'val'=>$student->profile->institution_name ?? '-', 'bold'=>false,
                    'path'=>'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012
                    9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'],
                    ['ic'=>'#eab308', 'bg'=>'rgba(234,179,8,0.1)', 'label'=>'Department (Field of Study)',
                    'val'=>$student->profile->department ?? '-', 'bold'=>false,
                    'path'=>'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
                    ] as $item)
                    <div class="group flex items-start gap-2.5 p-2.5 sm:p-4 rounded-xl transition-all duration-200"
                        onmouseover="this.style.background='var(--mc-surface-hover)'"
                        onmouseout="this.style.background='transparent'">
                        <div class="p-2 sm:p-2.5 rounded-xl shrink-0 group-hover:scale-110 transition-transform duration-200"
                            style="background: {{ $item['bg'] }};">
                            <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="{{ $item['ic'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['path'] }}" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[10px] sm:text-xs font-bold mb-0.5" style="color: var(--mc-text);">{{ $item['label'] }}</p>
                            <p class="text-xs sm:text-sm break-all" style="color: var(--mc-text-muted);">{{ $item['val'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            {{-- Learning Style & Preferences --}}
            <div class="p-4 sm:p-8" style="border-top: 1px solid var(--mc-border-subtle);">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-7 rounded-full"
                        style="background: linear-gradient(to bottom, var(--mc-primary), var(--mc-sage));"></div>
                    <h2 class="text-lg sm:text-xl font-bold" style="color: var(--mc-text); font-family:'Lora',serif;">Learning Style & Preferences</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-5 mb-5">
                    <div class="rounded-2xl p-4 sm:p-5 border" style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                        <p class="text-xs sm:text-sm font-bold mb-1.5 opacity-70" style="color: var(--mc-text);">Which teaching medium is easiest and most convenient for you?</p>
                        <p class="text-sm sm:text-[15px] font-medium" style="color: var(--mc-text);">
                            {{ !empty($student->profile->preferred_teaching_medium) ? $student->profile->preferred_teaching_medium : ' - ' }}
                        </p>
                    </div>
                    <div class="rounded-2xl p-4 sm:p-5 border" style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                        <p class="text-xs sm:text-sm font-bold mb-1.5 opacity-70" style="color: var(--mc-text);">Which language do you prefer to learn in?</p>
                        <p class="text-sm sm:text-[15px] font-medium" style="color: var(--mc-text);">
                            {{ !empty($student->profile->preferred_language) ? $student->profile->preferred_language : ' - ' }}
                        </p>
                    </div>
                </div>

                <div class="rounded-2xl p-4 sm:p-6 border mt-4"
                    style="background: var(--mc-bg); border-color: var(--mc-border-teal-sub);">
                    <p class="text-xs sm:text-sm font-bold mb-3 opacity-70" style="color: var(--mc-text);">How do you prefer to learn?</p>
                    <p class="text-xs sm:text-sm leading-relaxed whitespace-pre-line" style="color: var(--mc-text);">
                        {{ !empty($student->profile->learning_style) ? $student->profile->learning_style : "Write about how you understand things easily and what kind of teaching style from the mentor would be helpful for you. For example: 'My basics are a bit weak, so it would be better if you explain everything step by step from the beginning. I take some time to understand, so I would be glad if you don't rush.' or 'I can understand quickly with just a hint, so I have no problem if simple topics are explained fast.'" }}
                    </p>
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
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

    {{-- Remove Avatar Modal --}}
    @if(auth()->id() === $student->id && $student->profile && $student->profile->avatar)
    <dialog id="removeAvatarModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box max-w-sm p-6 overflow-hidden rounded-3xl shadow-2xl border text-center"
            style="background:var(--mc-surface);border-color:var(--mc-border-teal-sub);">
            
            <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-full" style="background:rgba(26,153,143,0.1);">
                <svg class="w-8 h-8" style="color:#1A998F;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </div>
            
            <h3 class="font-bold text-xl mb-2" style="color:var(--mc-text);">Remove Profile Picture?</h3>
            <p class="text-sm mb-6" style="color:var(--mc-text-muted);">
                Are you sure you want to remove your profile picture? This action cannot be undone.
            </p>
            
            <div class="flex gap-3 w-full">
                <form method="dialog" class="flex-1">
                    <button class="btn btn-warning w-full rounded-xl">Cancel</button>
                </form>
                <button type="button" onclick="document.getElementById('removeAvatarForm').submit()" class="btn flex-1 rounded-xl text-white border-0 transition-all duration-200" style="background:#1A998F;">
                    Yes, Remove
                </button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @endif

</x-layout>
