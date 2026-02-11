<x-layout>
    <div class="min-h-screen bg-base-200 p-6 md:p-22 space-y-8">

        {{-- Header --}}
        <div class="mx-auto card bg-base-100 shadow-sm">
            <div class="card-body">
                <div class="flex flex-col lg:flex-row gap-6 items-center lg:items-start">

                    <!-- Avatar -->
                    <div class="avatar">
                        <div
                            class="w-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-4 flex items-center justify-center text-sm text-base-content/60">
                            প্রোফাইল ফটো
                        </div>
                    </div>

                    <!-- Name & Bio -->
                    <div class="flex-1 text-center lg:text-left">
                        <h1 class="text-2xl font-bold">
                            {{ $student->name }}
                            <span class="text-sm font-medium text-base-content/60 ml-2">
                                [{{ ucfirst($student->role->value) }}]
                            </span>
                        </h1>

                        <!-- Student ID -->
                        <p class="font-medium text-sm text-base-content/60 my-2">
                            ইউজার আইডি : {{ $student->id }}
                        </p>

                        <!-- Bio -->
                        <p class="font-medium text-base-content/70 max-w-xl">
                            {{ $student->profile->bio ?? 'এখনো শর্ট বায়ো যোগ করা হয়নি' }}
                        </p>
                    </div>

                    <!-- Upload -->
                    @if (auth()->id() === $student->id)
                    <div class="text-center lg:text-right text-sm">
                        <button class="btn btn-outline btn-sm gap-2">
                            <!-- Heroicon: Arrow Up Tray -->
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 16V4m0 0l-4 4m4-4l4 4M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
                            </svg>
                            প্রোফাইল ফটো আপলোড করুন
                        </button>
                        <p class="mt-3 text-base-content/60">
                            800×800 পিক্সেলের ফটো আপলোড করুন<br>JPG অথবা PNG
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mx-auto card bg-base-100 shadow-sm">
            <!-- PERSONAL INFO -->
            <div class="card-body border-b border-gray-600">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold">ব্যক্তিগত তথ্য</h2>

                    @if (auth()->id() === $student->id)
                    <a href="{{ route('edit_profile', $student->id) }}" class="btn btn-outline btn-sm gap-2">
                        <!-- Heroicon: Pencil -->
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.121 2.121 0 013 3L7.125 19.225l-4 1 1-4 12.737-12.738z" />
                        </svg>
                        প্রোফাইল আপডেট করুন
                    </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Email -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.75L2.25 6.75" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">ই-মেইল</p>
                            <p class="text-sm text-base-content/70">{{ $student->email }}</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-2.25a2.25 2.25 0 00-2.25-2.25h-2.25a2.25 2.25 0 00-2.25 2.25v.75a12 12 0 01-9-9h.75A2.25 2.25 0 009.75 6.75V4.5A2.25 2.25 0 007.5 2.25H5.25A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">ফোন</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->phone ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">ঠিকানা</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->address ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- DOB -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">জন্ম তারিখ</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->date_of_birth ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- Hourly Rate -->
                    {{-- <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10V6a2 2 0 012-2h14a2 2 0 012 2v4" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">ঘণ্টা প্রতি চার্জ</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->hourly_rate ? '৳' . $student->profile->hourly_rate : '-' }}
                            </p>
                        </div>
                    </div> --}}

                </div>
            </div>

            <!-- EDUCATION -->
            <div class="card-body border-b border-gray-600">
                <h2 class="text-lg font-semibold mb-6">শিক্ষাগত তথ্য</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Highest Education Level -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <!-- Heroicon: Academic Cap -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0121 12.5c0 .276-.02.55-.06.82L12 18l-8.94-4.68A6.5 6.5 0 013 12.5c0-.276.02-.55.06-.82L12 14z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">শিক্ষাগত যোগ্যতা</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->highgest_education_level ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- Institution Name -->
                    <div class="flex gap-4">
                        <div class="p-2 rounded-lg bg-primary/10 text-primary">
                            <!-- Heroicon: Building Library -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m4-11v11m4-11v11m4-11v11" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">শিক্ষাপ্রষ্ঠানের নাম</p>
                            <p class="text-sm text-base-content/70">
                                {{ $student->profile->institution_name ?? '-' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- SKILLS -->
            <div class="card-body border-gray-600">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">দক্ষতাসমূহ</h2>
                </div>

                <div class="flex flex-wrap gap-3">
                    @if (!empty($student->profile->skills))
                    @foreach (explode(',', $student->profile->skills) as $skill)
                    <span class="badge badge-lg badge-outline">
                        {{ trim($skill) }}
                    </span>
                    @endforeach
                    @else
                    <p class="text-sm text-base-content/60">এখনো কোনো দক্ষতা যোগ করা হয়নি</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</x-layout>