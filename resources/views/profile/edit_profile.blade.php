<x-layout>
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8
                bg-[#eef7f8] dark:bg-[#0f1f2e]
                transition-colors duration-300">
        <div class="max-w-4xl mx-auto">

            {{-- Page Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 shadow-md
                            bg-linear-to-br from-[#28666e] to-[#033f63]
                            dark:from-[#4db6c1] dark:to-[#28666e]">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold mb-2
                           bg-linear-to-br from-[#28666e] via-[#033f63] to-[#7c9885]
                           dark:from-[#4db6c1] dark:via-[#7ec8e3] dark:to-[#9ab8a5]
                           bg-clip-text text-transparent" style="font-family:'Lora',serif;">
                    প্রোফাইল আপডেট করুন
                </h1>
                <p class="text-sm text-[#033f63]/55 dark:text-[#7ec8e3]/50">
                    আপনার তথ্য হালনাগাদ করুন এবং প্রোফাইল সম্পূর্ণ করুন
                </p>
            </div>

            {{-- Main Form Card --}}
            <div class="bg-white dark:bg-[#1a2e3b]
                        rounded-2xl
                        border border-teal-100 dark:border-[#4db6c1]/15
                        shadow-sm dark:shadow-[0_8px_40px_rgba(0,0,0,0.4)]
                        transition-colors duration-300">
                <div class="p-6 sm:p-8 lg:p-10">
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                            <div class="text-sm text-red-500 font-bold mb-2">অনুগ্রহ করে নিচের ভুলগুলো সংশোধন করুন:</div>
                            <ul class="text-sm text-red-500 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf
                        @method('PUT')

                        {{-- ── Personal Information ── --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-4
                                        border-b border-teal-50 dark:border-[#4db6c1]/10">
                                <div class="w-1 h-7 rounded-full
                                            bg-linear-to-b from-[#28666e] to-[#7c9885]
                                            dark:from-[#4db6c1] dark:to-[#9ab8a5]"></div>
                                <h2 class="text-lg font-bold flex items-center gap-2
                                           text-[#033f63] dark:text-[#7ec8e3]" style="font-family:'Lora',serif;">
                                    <svg class="w-5 h-5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    ব্যক্তিগত তথ্য
                                </h2>
                            </div>

                                {{-- Name --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        নাম
                                    </label>
                                    <input type="text" name="name" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                               focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                               focus:bg-white dark:focus:bg-[#243d4d]
                                               transition-all duration-200" placeholder="সম্পূর্ণ নাম দিন"
                                        value="{{ old('name', Auth::user()->name) }}" />
                                </div>


                            @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                            {{-- Short Bio --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold
                                                 text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                                        </svg>
                                        ছোট বায়ো (হেডলাইন)
                                    </span>
                                    <span class="text-xs text-[#033f63]/45 dark:text-[#7ec8e3]/40">
                                        প্রোফাইল নামের নিচে দেখানোর জন্য (১-২ লাইন)
                                    </span>
                                </label>
                                <textarea name="short_bio" rows="2" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none resize-none
                                           border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                           bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                           text-[#033f63] dark:text-[#7ec8e3]
                                           placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                           focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                           focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                           focus:bg-white dark:focus:bg-[#243d4d]
                                           transition-all duration-200"
                                    placeholder="আপনার শর্ট বায়ো/পেশা লিখুন">{{ old('short_bio', Auth::user()->profile?->short_bio) }}</textarea>
                            </div>
                            @endif

                            {{-- Detailed Bio --}}
                            @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                            {{-- Detailed Bio --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold
                                                 text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                        </svg>
                                        বিস্তারিত বায়ো
                                    </span>
                                    <span class="text-xs text-[#033f63]/45 dark:text-[#7ec8e3]/40">
                                        আপনার অভিজ্ঞতা ও দক্ষতা সম্পর্কে বিস্তারিত লিখুন
                                    </span>
                                </label>
                                <textarea name="bio" rows="4" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none resize-none
                                           border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                           bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                           text-[#033f63] dark:text-[#7ec8e3]
                                           placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                           focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                           focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                           focus:bg-white dark:focus:bg-[#243d4d]
                                           transition-all duration-200"
                                    placeholder="নিজের সম্পর্কে বিস্তারিত লিখুন">{{ old('bio', Auth::user()->profile?->bio) }}</textarea>
                            </div>
                            @endif

                            {{-- Learning Style --}}
                            @if(Auth::user()->role === \App\Enums\UserRole::Student)
                            {{-- Learning Style --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold
                                                 text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        আপনি কীভাবে শিখতে স্বাচ্ছন্দ্যবোধ করেন?
                                    </span>
                                    <span class="text-xs text-[#033f63]/45 dark:text-[#7ec8e3]/40">
                                        এই তথ্য মেন্টরকে আপনার জন্য সেশন প্ল্যান করতে সাহায্য করবে।
                                    </span>
                                </label>
                                <textarea name="learning_style" rows="4" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none resize-none
                                           border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                           bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                           text-[#033f63] dark:text-[#7ec8e3]
                                           placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                           focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                           focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                           focus:bg-white dark:focus:bg-[#243d4d]
                                           transition-all duration-200"
                                    placeholder="আপনি কীভাবে সহজে বোঝেন এবং মেন্টরের পড়ানোর ধরণ কেমন হলে সুবিধা হবে তা লিখুন। যেমন: 'আমার বেসিক একটু দুর্বল, তাই শুরু থেকে ধরে ধরে বোঝালে ভালো হয়। একটু সময় নিয়ে বুঝি, তাড়াহুড়া না করলে খুশি হবো।' কিংবা 'আমি একটু ইঙ্গিত পেলেই বুঝে ফেলতে পারি, সহজ বিষয়গুলো দ্রুতগতিতে বুঝিয়ে দিলেও আমার কোনো সমস্যা হয় না।'">{{ old('learning_style', Auth::user()->profile?->learning_style) }}</textarea>
                            </div>
                            @endif
                        </div>

                        {{-- ── Education & Professional ── --}}
                        <div class="space-y-6">
                            @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                            <div class="flex items-center gap-3 pb-4
                                        border-b border-teal-50 dark:border-[#4db6c1]/10">
                                <div class="w-1 h-7 rounded-full
                                            bg-linear-to-b from-[#3d8a8f] to-[#7c9885]
                                            dark:from-[#4db6c1] dark:to-[#9ab8a5]"></div>
                                <h2 class="text-lg font-bold flex items-center gap-2
                                           text-[#033f63] dark:text-[#7ec8e3]" style="font-family:'Lora',serif;">
                                    <svg class="w-5 h-5 text-[#3d8a8f] dark:text-[#4db6c1]" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                                    </svg>
                                    শিক্ষা ও পেশাগত তথ্য
                                </h2>
                            </div>
                            @endif

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                                {{-- Education Level --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#3d8a8f] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                                        </svg>
                                        শিক্ষাগত যোগ্যতা
                                    </label>
                                    <input type="text" name="highgest_education_level" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                               focus:border-[#3d8a8f] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#3d8a8f]/10 dark:focus:ring-[#4db6c1]/10
                                               focus:bg-white dark:focus:bg-[#243d4d]
                                               transition-all duration-200" placeholder="সর্বোচ্চ শিক্ষাগত যোগ্যতা"
                                        value="{{ old('highgest_education_level', Auth::user()->profile?->highgest_education_level) }}" />
                                </div>

                                {{-- Institution --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#3d8a8f] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                        </svg>
                                        শিক্ষাপ্রতিষ্ঠানের নাম
                                    </label>
                                    <input type="text" name="institution_name" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                               focus:border-[#3d8a8f] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#3d8a8f]/10 dark:focus:ring-[#4db6c1]/10
                                               focus:bg-white dark:focus:bg-[#243d4d]
                                               transition-all duration-200" placeholder="শিক্ষাপ্রতিষ্ঠানের নাম"
                                        value="{{ old('institution_name', Auth::user()->profile?->institution_name) }}" />
                                </div>

                                {{-- Department --}}
                                <div class="lg:col-span-2">
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#3d8a8f] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        অধ্যয়নের বিষয় (ডিপার্টমেন্ট)
                                    </label>
                                    <input type="text" name="department" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                               focus:border-[#3d8a8f] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#3d8a8f]/10 dark:focus:ring-[#4db6c1]/10
                                               focus:bg-white dark:focus:bg-[#243d4d]
                                               transition-all duration-200" placeholder="যেমন: Computer Science"
                                        value="{{ old('department', Auth::user()->profile?->department) }}" />
                                </div>

                                {{-- Hourly Rate --}}
                                @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                                {{-- Hourly Rate --}}
                                <div class="lg:col-span-2">
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        ঘণ্টা প্রতি চার্জ (৳)
                                    </label>
                                    <input type="number" name="hourly_rate" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                               focus:border-green-500 dark:focus:border-green-400
                                               focus:ring-[3px] focus:ring-green-500/10 dark:focus:ring-green-400/10
                                               focus:bg-white dark:focus:bg-[#243d4d]
                                               transition-all duration-200" placeholder="ঘণ্টা প্রতি চার্জ এন্ট্রি দিন"
                                        value="{{ old('hourly_rate', Auth::user()->profile?->hourly_rate) }}" />
                                </div>
                                @endif
                            </div>

                            {{-- Skills --}}
                            @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                            {{-- Skills --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold
                                                 text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#7c9885] dark:text-[#9ab8a5]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                                        </svg>
                                        দক্ষতাসমূহ
                                    </span>
                                    <span class="text-xs text-[#033f63]/45 dark:text-[#7ec8e3]/40">
                                        কমা দিয়ে আলাদা করুন
                                    </span>
                                </label>
                                <textarea name="skills" rows="3" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none resize-none
                                           border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                           bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                           text-[#033f63] dark:text-[#7ec8e3]
                                           placeholder:text-[#033f63]/35 dark:placeholder:text-[#7ec8e3]/30
                                           focus:border-[#7c9885] dark:focus:border-[#9ab8a5]
                                           focus:ring-[3px] focus:ring-[#7c9885]/12 dark:focus:ring-[#9ab8a5]/10
                                           focus:bg-white dark:focus:bg-[#243d4d]
                                           transition-all duration-200"
                                    placeholder="যেমন: Compiler Design, Algorithm, Data Structures">{{ old('skills', Auth::user()->profile?->skills) }}</textarea>
                                <p class="mt-1.5 text-xs flex items-center gap-1
                                          text-[#033f63]/40 dark:text-[#7ec8e3]/35">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                    প্রতিটি দক্ষতার মাঝে কমা (,) ব্যবহার করুন
                                </p>
                            </div>
                            @endif
                        </div>

                        @if(Auth::user()->role === \App\Enums\UserRole::Mentor)
                        {{-- ── Documents ── --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-4
                                        border-b border-teal-50 dark:border-[#4db6c1]/10">
                                <div class="w-1 h-7 rounded-full
                                            bg-linear-to-b from-[#28666e] to-[#7c9885]
                                            dark:from-[#4db6c1] dark:to-[#9ab8a5]"></div>
                                <h2 class="text-lg font-bold flex items-center gap-2
                                           text-[#033f63] dark:text-[#7ec8e3]" style="font-family:'Lora',serif;">
                                    <svg class="w-5 h-5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    নথিপত্র (Documents)
                                </h2>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                                {{-- NID Front --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                        ন্যাশনাল আইডি (NID) - সামনের অংশ
                                    </label>
                                    <input type="file" name="nid_front" accept="image/*" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                               transition-all duration-200" {{ Auth::user()->role === \App\Enums\UserRole::Student ? 'disabled' : '' }} />
                                    @if(Auth::user()->profile && Auth::user()->profile->nid_front)
                                        <div class="mt-2 flex items-center justify-between">
                                            <p class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-md">আপলোড করা আছে।</p>
                                            <label class="flex items-center gap-1.5 cursor-pointer group">
                                                <input type="checkbox" name="remove_nid_front" value="1" class="w-3.5 h-3.5 text-red-500 border-red-200 rounded focus:ring-red-500">
                                                <span class="text-xs text-red-500 group-hover:text-red-600 transition-colors">ছবি মুছে ফেলুন</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>

                                {{-- NID Back --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                        ন্যাশনাল আইডি (NID) - পিছনের অংশ
                                    </label>
                                    <input type="file" name="nid_back" accept="image/*" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                               transition-all duration-200" {{ Auth::user()->role === \App\Enums\UserRole::Student ? 'disabled' : '' }} />
                                    @if(Auth::user()->profile && Auth::user()->profile->nid_back)
                                        <div class="mt-2 flex items-center justify-between">
                                            <p class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-md">আপলোড করা আছে।</p>
                                            <label class="flex items-center gap-1.5 cursor-pointer group">
                                                <input type="checkbox" name="remove_nid_back" value="1" class="w-3.5 h-3.5 text-red-500 border-red-200 rounded focus:ring-red-500">
                                                <span class="text-xs text-red-500 group-hover:text-red-600 transition-colors">ছবি মুছে ফেলুন</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>

                                {{-- Student ID Front --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>
                                        স্টুডেন্ট আইডি - সামনের অংশ
                                    </label>
                                    <input type="file" name="student_id_front" accept="image/*" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                               transition-all duration-200" />
                                    @if(Auth::user()->profile && Auth::user()->profile->student_id_front)
                                        <div class="mt-2 flex items-center justify-between">
                                            <p class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-md">আপলোড করা আছে।</p>
                                            <label class="flex items-center gap-1.5 cursor-pointer group">
                                                <input type="checkbox" name="remove_student_id_front" value="1" class="w-3.5 h-3.5 text-red-500 border-red-200 rounded focus:ring-red-500">
                                                <span class="text-xs text-red-500 group-hover:text-red-600 transition-colors">ছবি মুছে ফেলুন</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>

                                {{-- Student ID Back --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5
                                                  text-[#033f63] dark:text-[#7ec8e3]">
                                        <svg class="w-3.5 h-3.5 text-[#28666e] dark:text-[#4db6c1]" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>
                                        স্টুডেন্ট আইডি - পিছনের অংশ
                                    </label>
                                    <input type="file" name="student_id_back" accept="image/*" class="w-full px-4 py-2.5 rounded-xl text-sm outline-none
                                               border-[1.5px] border-[#28666e]/20 dark:border-[#4db6c1]/20
                                               bg-[#eef7f8]/50 dark:bg-[#0f1f2e]/50
                                               text-[#033f63] dark:text-[#7ec8e3]
                                               focus:border-[#28666e] dark:focus:border-[#4db6c1]
                                               focus:ring-[3px] focus:ring-[#28666e]/10 dark:focus:ring-[#4db6c1]/10
                                               transition-all duration-200" />
                                    @if(Auth::user()->profile && Auth::user()->profile->student_id_back)
                                        <div class="mt-2 flex items-center justify-between">
                                            <p class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-md">আপলোড করা আছে।</p>
                                            <label class="flex items-center gap-1.5 cursor-pointer group">
                                                <input type="checkbox" name="remove_student_id_back" value="1" class="w-3.5 h-3.5 text-red-500 border-red-200 rounded focus:ring-red-500">
                                                <span class="text-xs text-red-500 group-hover:text-red-600 transition-colors">ছবি মুছে ফেলুন</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-6
                                    border-t border-teal-50 dark:border-[#4db6c1]/10">
                            <button type="submit" class="flex-1 flex items-center justify-center gap-2
                                       px-4 py-[0.72rem] rounded-xl
                                       bg-[#28666e] dark:bg-[#4db6c1]
                                       text-white dark:text-[#0f1f2e]
                                       text-sm font-bold
                                       border-none cursor-pointer
                                       shadow-md hover:shadow-lg
                                       hover:bg-[#1a4a52] dark:hover:bg-[#38a8b5]
                                       hover:-translate-y-0.5 active:translate-y-0
                                       transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                আপডেট করুন
                            </button>
                            <a href="{{ route('mentors') }}" class="flex-1 flex items-center justify-center gap-2
                                       px-4 py-[0.72rem] rounded-xl
                                       bg-transparent
                                       text-[#28666e] dark:text-[#4db6c1]
                                       text-sm font-bold no-underline
                                       border-[1.5px] border-[#28666e] dark:border-[#4db6c1]/60
                                       hover:bg-[#28666e]/6 dark:hover:bg-[#4db6c1]/10
                                       hover:shadow-[0_4px_12px_rgba(40,102,110,0.12)]
                                       hover:-translate-y-0.5 active:translate-y-0
                                       transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                বাতিল করুন
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            {{-- Help note --}}
            <div class="text-center mt-5">
                <span class="inline-flex items-center gap-1.5 text-xs px-4 py-2 rounded-full
                             bg-[#28666e]/7 dark:bg-[#4db6c1]/10
                             text-[#033f63]/55 dark:text-[#7ec8e3]/50">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    সকল তথ্য সঠিকভাবে পূরণ করুন
                </span>
            </div>

        </div>
    </div>
</x-layout>