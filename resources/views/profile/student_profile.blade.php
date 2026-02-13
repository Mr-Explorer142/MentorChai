<x-layout>
    <div class="min-h-screen bg-base-200 p-6 md:p-22 space-y-8">

        {{-- Header --}}
        <div
            class="mx-auto card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-all duration-300">
            <div class="card-body p-6 sm:p-8">
                <div class="flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                    {{-- Avatar --}}
                    <div class="avatar indicator">
                        <div
                            class="w-32 h-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-4 bg-linear-to-br from-primary/20 to-secondary/20 flex items-center justify-center shadow-lg hover:scale-105 transition-transform duration-300">
                            <div class="text-center">
                                <svg class="w-12 h-12 mx-auto text-primary/40 mb-1" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <span class="text-xs text-base-content/50 font-medium">প্রোফাইল ফটো</span>
                            </div>
                        </div>
                    </div>

                    {{-- Name & Bio --}}
                    <div class="flex-1 text-center lg:text-left space-y-3">
                        <div class="space-y-2">
                            <h1
                                class="text-3xl sm:text-4xl font-bold bg-linear-to-r from-primary to-secondary bg-clip-text text-transparent">
                                {{ $student->name }}
                            </h1>
                            <div class="flex items-center justify-center lg:justify-start gap-2 flex-wrap">
                                <span class="badge badge-primary badge-lg gap-2">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ ucfirst($student->role->value) }}
                                </span>
                                <span class="text-sm font-medium text-base-content/60">
                                    ইউজার আইডি: #{{ $student->id }}
                                </span>
                            </div>
                        </div>

                        {{-- Bio --}}
                        <div class="prose prose-sm max-w-none">
                            <p class="text-base leading-relaxed text-base-content/80">
                                {{ $student->profile->bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                            </p>
                        </div>
                    </div>

                    {{-- Upload --}}
                    @if (auth()->id() === $student->id)
                        <div class="text-center lg:text-right">
                            <button class="btn btn-outline btn-primary gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                প্রোফাইল ফটো আপলোড করুন
                            </button>
                            <p class="mt-3 text-xs text-base-content/50 leading-relaxed">
                                800×800 পিক্সেলের ফটো আপলোড করুন<br>
                                <span class="badge badge-ghost badge-sm mt-1">JPG অথবা PNG</span>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Main Content Card --}}
        <div class="mx-auto card bg-base-100 shadow-xl border border-base-200">

            {{-- PERSONAL INFO --}}
            <div class="card-body p-6 sm:p-8 border-b border-base-200/50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-linear-to-b from-primary to-secondary rounded-full"></div>
                        <h2 class="text-2xl font-bold text-base-content">ব্যক্তিগত তথ্য</h2>
                    </div>

                    @if (auth()->id() === $student->id)
                        <a href="{{ route('edit_profile', $student->id) }}"
                            class="btn btn-outline btn-sm gap-2 hover:btn-primary transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            প্রোফাইল আপডেট করুন
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    {{-- Email --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-primary/20 to-primary/10 text-primary group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 002.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1 flex items-center gap-2">
                                    ই-মেইল
                                </p>
                                <p class="text-sm text-base-content/70 break-all">{{ $student->email }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-secondary/20 to-secondary/10 text-secondary group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1">ফোন</p>
                                <p class="text-sm text-base-content/70">
                                    {{ $student->profile->phone ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-accent/20 to-accent/10 text-accent group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1">ঠিকানা</p>
                                <p class="text-sm text-base-content/70">
                                    {{ $student->profile->address ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- DOB --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-info/20 to-info/10 text-info group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1">জন্ম তারিখ</p>
                                <p class="text-sm text-base-content/70">
                                    {{ $student->profile->date_of_birth ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- EDUCATION --}}
            <div class="card-body p-6 sm:p-8 border-b border-base-200/50">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1 h-8 bg-linear-to-b from-primary to-secondary rounded-full"></div>
                    <h2 class="text-2xl font-bold text-base-content">শিক্ষাগত তথ্য</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Highest Education Level --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-primary/20 to-primary/10 text-primary group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1">শিক্ষাগত যোগ্যতা</p>
                                <p class="text-sm text-base-content/70">
                                    {{ $student->profile->highgest_education_level ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Institution Name --}}
                    <div class="group hover:bg-base-200/30 p-4 rounded-xl transition-all duration-300">
                        <div class="flex gap-4 items-start">
                            <div
                                class="p-3 rounded-xl bg-linear-to-br from-secondary/20 to-secondary/10 text-secondary group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-base-content mb-1">শিক্ষাপ্রষ্ঠানের নাম</p>
                                <p class="text-sm text-base-content/70">
                                    {{ $student->profile->institution_name ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SKILLS --}}
            <div class="card-body p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-linear-to-b from-primary to-secondary rounded-full"></div>
                        <h2 class="text-2xl font-bold text-base-content">দক্ষতাসমূহ</h2>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    @if (!empty($student->profile->skills))
                        @foreach (explode(',', $student->profile->skills) as $skill)
                            <span
                                class="badge badge-lg badge-outline hover:badge-primary transition-all duration-300 cursor-pointer hover:scale-105 gap-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                </svg>
                                {{ trim($skill) }}
                            </span>
                        @endforeach
                    @else
                        <div class="w-full text-center py-8">
                            <div class="inline-flex flex-col items-center gap-3">
                                <svg class="w-16 h-16 text-base-content/20" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                </svg>
                                <p class="text-sm text-base-content/50">কোনো দক্ষতা যোগ করা হয়নি</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>

</x-layout>
