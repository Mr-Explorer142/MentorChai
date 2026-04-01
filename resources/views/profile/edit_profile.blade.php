<x-layout>
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8"
        style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfe 55%, #f0f9f4 100%);">
        <div class="max-w-4xl mx-auto">

            {{-- Page Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 shadow-md"
                    style="background:linear-gradient(135deg,#28666e,#033f63);">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold mb-2"
                    style="font-family:'Lora',serif; background:linear-gradient(135deg,#28666e,#033f63,#7c9885); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                    প্রোফাইল আপডেট করুন
                </h1>
                <p class="text-sm" style="color:rgba(3,63,99,0.55);">আপনার তথ্য হালনাগাদ করুন এবং প্রোফাইল সম্পূর্ণ করুন
                </p>
            </div>

            {{-- Main Form Card --}}
            <div class="bg-white rounded-2xl border border-teal-100 shadow-sm">
                <div class="p-6 sm:p-8 lg:p-10">
                    <form action="{{ route('update_profile') }}" method="POST" class="space-y-10">
                        @csrf
                        @method('PUT')

                        {{-- ── Personal Information ── --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-4 border-b border-teal-50">
                                <div class="w-1 h-7 rounded-full"
                                    style="background:linear-gradient(to bottom,#28666e,#7c9885);"></div>
                                <h2 class="text-lg font-bold flex items-center gap-2"
                                    style="color:#033f63; font-family:'Lora',serif;">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="#28666e">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    ব্যক্তিগত তথ্য
                                </h2>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                                {{-- Name --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#28666e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        নাম
                                    </label>
                                    <input type="text" name="name"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="সম্পূর্ণ নাম দিন" value="{{ old('name', Auth::user()->name) }}" />
                                </div>

                                {{-- Date of Birth --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#28666e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5" />
                                        </svg>
                                        জন্ম তারিখ
                                    </label>
                                    <input type="date" name="date_of_birth"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        value="{{ old('date_of_birth', Auth::user()->profile?->date_of_birth) }}" />
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#28666e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        ফোন
                                    </label>
                                    <input type="tel" name="phone"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="মোবাইল নম্বর দিন"
                                        value="{{ old('phone', Auth::user()->profile?->phone) }}" />
                                </div>

                                {{-- Address --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#28666e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        ঠিকানা
                                    </label>
                                    <textarea name="address" rows="3"
                                        class="textarea textarea-bordered w-full focus:outline-none transition-all duration-200 resize-none"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px; font-family:'Nunito',sans-serif;"
                                        onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="সম্পূর্ণ ঠিকানা দিন">{{ old('address', Auth::user()->profile?->address) }}</textarea>
                                </div>
                            </div>

                            {{-- Bio --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold" style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#28666e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                        </svg>
                                        বায়ো
                                    </span>
                                    <span class="text-xs" style="color:rgba(3,63,99,0.45);">নিজের সম্পর্কে সংক্ষেপে
                                        লিখুন</span>
                                </label>
                                <textarea name="bio" rows="4"
                                    class="textarea textarea-bordered w-full focus:outline-none transition-all duration-200 resize-none"
                                    style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px; font-family:'Nunito',sans-serif;"
                                    onfocus="this.style.borderColor='#28666e'; this.style.boxShadow='0 0 0 3px rgba(40,102,110,0.1)'"
                                    onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                    placeholder="নিজের সম্পর্কে অল্প শব্দে কিছু লিখুন">{{ old('bio', Auth::user()->profile?->bio) }}</textarea>
                            </div>
                        </div>

                        {{-- ── Education & Professional ── --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-4 border-b border-teal-50">
                                <div class="w-1 h-7 rounded-full"
                                    style="background:linear-gradient(to bottom,#3d8a8f,#7c9885);"></div>
                                <h2 class="text-lg font-bold flex items-center gap-2"
                                    style="color:#033f63; font-family:'Lora',serif;">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="#3d8a8f">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                                    </svg>
                                    শিক্ষা ও পেশাগত তথ্য
                                </h2>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                                {{-- Education Level --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#3d8a8f">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                                        </svg>
                                        শিক্ষাগত যোগ্যতা
                                    </label>
                                    <input type="text" name="highgest_education_level"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#3d8a8f'; this.style.boxShadow='0 0 0 3px rgba(61,138,143,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="সর্বোচ্চ শিক্ষাগত যোগ্যতা"
                                        value="{{ old('highgest_education_level', Auth::user()->profile?->highgest_education_level) }}" />
                                </div>

                                {{-- Institution --}}
                                <div>
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#3d8a8f">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                        </svg>
                                        শিক্ষাপ্রতিষ্ঠানের নাম
                                    </label>
                                    <input type="text" name="institution_name"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#3d8a8f'; this.style.boxShadow='0 0 0 3px rgba(61,138,143,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="শিক্ষাপ্রতিষ্ঠানের নাম"
                                        value="{{ old('institution_name', Auth::user()->profile?->institution_name) }}" />
                                </div>

                                {{-- Hourly Rate --}}
                                <div class="lg:col-span-2">
                                    <label class="flex items-center gap-1.5 text-xs font-bold mb-1.5"
                                        style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#22c55e">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        ঘণ্টা প্রতি চার্জ (৳)
                                    </label>
                                    <input type="number" name="hourly_rate"
                                        class="input input-bordered w-full focus:outline-none transition-all duration-200"
                                        style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px;"
                                        onfocus="this.style.borderColor='#22c55e'; this.style.boxShadow='0 0 0 3px rgba(34,197,94,0.1)'"
                                        onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                        placeholder="ঘণ্টা প্রতি চার্জ এন্ট্রি দিন"
                                        value="{{ old('hourly_rate', Auth::user()->profile?->hourly_rate) }}" />
                                </div>
                            </div>

                            {{-- Skills --}}
                            <div>
                                <label class="flex items-center justify-between mb-1.5">
                                    <span class="flex items-center gap-1.5 text-xs font-bold" style="color:#033f63;">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="#7c9885">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                                        </svg>
                                        দক্ষতাসমূহ
                                    </span>
                                    <span class="text-xs" style="color:rgba(3,63,99,0.45);">কমা দিয়ে আলাদা করুন</span>
                                </label>
                                <textarea name="skills" rows="3"
                                    class="textarea textarea-bordered w-full focus:outline-none transition-all duration-200 resize-none"
                                    style="border-color:rgba(40,102,110,0.2); background:rgba(238,247,248,0.5); color:#033f63; border-radius:12px; font-family:'Nunito',sans-serif;"
                                    onfocus="this.style.borderColor='#7c9885'; this.style.boxShadow='0 0 0 3px rgba(124,152,133,0.12)'"
                                    onblur="this.style.borderColor='rgba(40,102,110,0.2)'; this.style.boxShadow='none'"
                                    placeholder="যেমন: Compiler Design, Algorithm, Data Structures">{{ old('skills', Auth::user()->profile?->skills) }}</textarea>
                                <p class="mt-1.5 text-xs flex items-center gap-1" style="color:rgba(3,63,99,0.4);">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                    প্রতিটি দক্ষতার মাঝে কমা (,) ব্যবহার করুন
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-teal-50">
                            <button type="submit"
                                class="flex-1 btn gap-2 font-bold text-white border-none shadow-md transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                                style="background:#28666e; border-radius:12px;"
                                onmouseover="this.style.background='#1a4a52'"
                                onmouseout="this.style.background='#28666e'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                আপডেট করুন
                            </button>
                            <a href="{{ route('mentors') }}"
                                class="flex-1 btn btn-outline gap-2 font-bold transition-all duration-200 hover:-translate-y-0.5"
                                style="border-color:#28666e; color:#28666e; border-radius:12px;"
                                onmouseover="this.style.background='rgba(40,102,110,0.06)'"
                                onmouseout="this.style.background='transparent'">
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
                <span class="inline-flex items-center gap-1.5 text-xs px-4 py-2 rounded-full"
                    style="background:rgba(40,102,110,0.07); color:rgba(3,63,99,0.55);">
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
