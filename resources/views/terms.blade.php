<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- Top Header Banner --}}
        <section class="max-w-5xl mx-auto px-4 sm:px-5 pt-8 pb-6 sm:pt-16 sm:pb-10 text-center">
            <span class="badge badge-outline font-bold uppercase tracking-widest text-[10px] sm:text-xs px-3 py-2 sm:px-4 sm:py-3 mb-2 sm:mb-4"
                style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                📜 প্ল্যাটফর্মের নির্দেশিকা ও নীতিমালা
            </span>
            <h1 class="text-xl sm:text-3xl md:text-4xl font-extrabold mt-2 sm:mt-3 mb-2 sm:mb-4"
                style="color: var(--mc-text); font-family: 'Lora', serif; line-height: 1.25;">
                নীতিমালা ও ব্যবহারের শর্তাবলী
            </h1>
            <div class="mx-auto mb-3 sm:mb-5 h-1 w-12 sm:w-20 rounded-full"
                style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
            <p class="text-xs sm:text-base max-w-2xl mx-auto leading-relaxed" style="color: var(--mc-text-muted);">
                MentorChai প্ল্যাটফর্মে সুস্থ ও profesional পরিবেশ বজায় রাখার স্বার্থে মেন্টর এবং শিক্ষার্থী উভয়কেই এই শর্তাবলী কঠোরভাবে মেনে চলতে হবে।
            </p>
        </section>

        {{-- Side-by-Side Content Grid --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-5 pb-10 sm:pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

                {{-- Left Column: Mentor Terms --}}
                <div class="space-y-5 sm:space-y-8 flex flex-col">
                    <div class="flex items-center justify-center gap-2.5 sm:gap-3.5 pb-3 sm:pb-4 border-b" style="border-color: var(--mc-border-teal-sub);">
                        <span class="text-xl sm:text-2xl">🎓</span>
                        <h2 class="text-lg sm:text-2xl font-bold font-[Lora,serif]" style="color: var(--mc-navy);">মেন্টর নিবন্ধন শর্তাবলী</h2>
                    </div>

                    <div class="space-y-4 sm:space-y-6 flex-1">
                        {{-- Mentor Clause 1 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ১
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">নিবন্ধন ও প্রয়োজনীয় কাগজপত্র</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4" style="color: var(--mc-text-muted);">
                                মেন্টর হিসেবে নিবন্ধন করতে নিম্নোক্ত ডকুমেন্টগুলো প্রয়োজন হবে:
                            </p>
                            <ul class="space-y-2 text-xs sm:text-sm font-semibold pl-1 mb-3 sm:mb-4" style="color: var(--mc-text-sub);">
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">•</span>
                                    <span>জাতীয় পরিচয়পত্র (NID) বা পাসপোর্টের কপি</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">•</span>
                                    <span>শিক্ষাগত যোগ্যতার সনদ (সর্বোচ্চ ডিগ্রি)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">•</span>
                                    <span>পেশাদার অভিজ্ঞতার প্রমাণ (সার্টিফিকেট,পোর্টফোলিও)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">•</span>
                                    <span>একটি সক্রিয় ব্যাংক অ্যাকাউন্টের তথ্য</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">•</span>
                                    <span>সাম্প্রতিক পাসপোর্ট সাইজের ছবি</span>
                                </li>
                            </ul>
                            <p class="text-xs sm:text-sm font-bold p-2.5 sm:p-3.5 rounded-lg sm:rounded-xl border border-red-200/40 dark:border-red-900/40" style="background: rgba(239, 68, 68, 0.04); color: var(--mc-navy); line-height: 1.6;">
                                সকল তথ্য সঠিক ও সত্য হতে হবে। কোনো তথ্য মিথ্যা বা বিভ্রান্তিকর প্রমাণিত হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে বাতিল করা হবে।
                            </p>
                        </div>

                        {{-- Mentor Clause 2 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ২
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশন ফী ও কমিশন</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4" style="color: var(--mc-text-muted);">
                                মেন্টর তার সেশনের ফী নিজে নির্ধারণ করতে পারবেন, তবে প্ল্যাটফর্ম কর্তৃক নির্ধারিত সর্বোচ্চ সীমার বেশি ফী নির্ধারণ করতে পারবেন না।
                            </p>
                            <div class="flex flex-col gap-2.5 p-3 sm:p-4 rounded-lg sm:rounded-xl mb-3 sm:mb-4" style="background: rgba(40,102,110,0.04);">
                                <div class="flex justify-between items-center text-xs sm:text-sm">
                                    <span class="font-bold" style="color: var(--mc-text-sub);">পূর্ণ এক ঘণ্টার সেশন:</span>
                                    <span class="px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-extrabold text-white" style="background: #1A9998;">সর্বোচ্চ ৳৫০০</span>
                                </div>
                                <div class="flex justify-between items-center text-xs sm:text-sm border-t pt-2" style="border-color: var(--mc-border-teal-sub);">
                                    <span class="font-bold" style="color: var(--mc-text-sub);">আধা ঘণ্টার সেশন:</span>
                                    <span class="px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-extrabold text-white" style="background: #187F87;">সর্বোচ্চ ৳৩০০</span>
                                </div>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted);">
                                প্রতিটি সেশনের মোট ফী থেকে <span class="font-extrabold" style="color: var(--mc-primary);">২0% প্ল্যাটফর্ম কমিশন</span> কেটে নেওয়া হবে। অবশিষ্ট <span class="font-extrabold" style="color: var(--mc-primary);">৭৫%</span> নির্দিষ্ট সময়ের মধ্যে মেন্টরের অ্যাকাউন্ট ব্যালেন্সে জমা হবে।
                            </p>
                        </div>

                        {{-- Mentor Clause 3 --}}
                        <div class="terms-card warning-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #ef4444, #b91c1c);">
                                    ৩
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-red-600 dark:text-red-400">প্ল্যাটফর্মের বাইরে যোগাযোগ: কঠোরভাবে নিষিদ্ধ</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4" style="color: var(--mc-text-muted);">
                                মেন্টর ও শিক্ষার্থী উভয়কেই এই নিয়ম মেনে চলতে হবে। প্ল্যাটফর্মের বাইরে :
                            </p>
                            <ul class="space-y-2 text-xs sm:text-sm font-semibold pl-1 mb-3 sm:mb-4" style="color: var(--mc-text-sub);">
                                <li class="flex items-start gap-2">
                                    <span class="text-red-500 mt-0.5">✕</span>
                                    <span>ব্যক্তিগত যোগাযোগের চেষ্টা করা</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-red-500 mt-0.5">✕</span>
                                    <span>ফোন নম্বর, ইমেইল বা সোশ্যাল মিডিয়ার মাধ্যমে তথ্য আদানপ্রদান</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-red-500 mt-0.5">✕</span>
                                    <span>আলাদাভাবে সেশন পরিচালনা বা পেমেন্ট লেনদেনের চেষ্টা করা</span>
                                </li>
                            </ul>
                            <div class="p-2.5 sm:p-3.5 rounded-lg sm:rounded-xl border border-red-300/30 dark:border-red-900/30" style="background: rgba(239, 68, 68, 0.04);">
                                <p class="text-xs sm:text-sm font-bold text-red-600 dark:text-red-400 leading-relaxed">
                                    এগুলোর যেকোনো একটি প্রমাণিত হলে সেটি ক্ষমার অযোগ্য লঙ্ঘন হিসেবে গণ্য হবে এবং সংশ্লিষ্ট মেন্টর ও শিক্ষার্থী উভয়কেই স্থায়ীভাবে ব্যান করা হবে। এ বিষয়ে কোনো আপিলের সুযোগ থাকবে না।
                                </p>
                            </div>
                        </div>

                        {{-- Mentor Clause 4 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৪
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশন পরিচালনা</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                মেন্টরকে নির্ধারিত সময়ে উপস্থিত থেকে সেশন পরিচালনা করতে হবে। ঘন ঘন সেশন বাতিল বা অনুপস্থিতি অ্যাকাউন্ট স্থগিতের কারণ হতে পারে। মেন্টর শুধুমাত্র নিজের দক্ষতার বিষয়ে সেশন নেবেন এবং কোনো ভুল বা বিভ্রান্তিকর তথ্য দেওয়া যাবে না।
                            </p>
                        </div>

                        {{-- Mentor Clause 5 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৫
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">নৈতিক আচরণ</h3>
                            </div>
                            <ul class="space-y-2 text-xs sm:text-sm font-semibold pl-1" style="color: var(--mc-text-sub);">
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">✦</span>
                                    <span>শিক্ষার্থীর প্রতি সর্বদা সম্মানজনক ও পেশাদার আচরণ করতে হবে।</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">✦</span>
                                    <span>জাতি, ধর্ম, লিঙ্গ বা যেকোনো পরিচয়ের ভিত্তিতে বৈষম্য বা হয়রানি সম্পূর্ণ নিষিদ্ধ।</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">✦</span>
                                    <span>শিক্ষার্থীর ব্যক্তিগত তথ্য কোনো অবস্থাতেই তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-[#1A9998] mt-0.5">✦</span>
                                    <span>সেশনে ব্যবহৃত যেকোনো তৃতীয় পক্ষের উপকরণের ক্ষেত্রে মেধাস্বত্ব আইন মেনে চলতে হবে।</span>
                                </li>
                            </ul>
                        </div>

                        {{-- Mentor Clause 6 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৬
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">শর্তাবলী পরিবর্তন ও অ্যাকাউন্ট বাতিল</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                প্ল্যাটফর্ম প্রয়োজনে যেকোনো সময় এই শর্তাবলী সংশোধন করতে পারবে এবং মেন্টরকে আগে থেকে জানানো হবে। শর্তাবলীর যেকোনো লঙ্ঘনে প্ল্যাটফর্ম অ্যাকাউন্ট স্থগিত বা স্থায়ীভাবে বাতিল করার অধিকার রাখে।
                            </p>
                        </div>

                        {{-- Mentor Clause 7 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৭
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">রিভিউ ও রেটিং</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                শিক্ষার্থী প্রতিটি সেশনের পর মেন্টরকে রেটিং ও রিভিউ দিতে পারবেন। মেন্টর কোনোভাবেই শিক্ষার্থীকে নির্দিষ্ট রেটিং দিতে চাপ দিতে বা প্রভাবিত করতে পারবেন না। ধারাবাহিকভাবে খারাপ রেটিং পেলে প্ল্যাটফর্ম অ্যাকাউন্ট পর্যালোচনা করার অধিকার রাখে।
                            </p>
                        </div>

                        {{-- Mentor Clause 8 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৮
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশন রেকর্ডিং</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                প্ল্যাটফর্মের অনুমতি ছাড়া কোনো সেশন রেকর্ড করা যাবে না। শিক্ষার্থীর সম্মতি ব্যতীত সেশনের কোনো অংশ তৃতীয় পক্ষের সাথে শেয়ার করা সম্পূর্ণ নিষিদ্ধ।
                            </p>
                        </div>

                        {{-- Mentor Clause 9 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৯
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">দ্বন্দ্ব নিষ্পত্তি</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                মেন্টর ও শিক্ষার্থী মধ্যে কোনো বিরোধ দেখা দিলে প্রথমে প্ল্যাটফর্মের সাপোর্ট টিমের মাধ্যমে সমাধানের চেষ্টা করতে হবে। সরাসরি বিবাদে জড়ানো বা সোশ্যাল মিডিয়ায় প্রকাশ্যে অভিযোগ করা শর্তাবলীর লঙ্ঘন হিসেবে গণ্য হবে।
                            </p>
                        </div>

                        {{-- Mentor Clause 10 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ১০
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">মেন্টরের প্রোফাইল আপডেট</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                মেন্টরের যোগ্যতা, অভিজ্ঞতা বা বিষয়ে কোনো পরিবর্তন হলে তা যথাসময়ে প্রোফাইলে আপডেট করতে হবে। পুরনো বা ভুল তথ্য দিয়ে শিক্ষার্থী আকৃষ্ট করার চেষ্টা প্রতারণা হিসেবে বিবেচিত হবে।
                            </p>
                        </div>

                        {{-- Mentor Agreement Subtitle --}}
                        <div class="terms-card text-center p-4 sm:p-6 rounded-xl sm:rounded-2xl border"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <p class="text-xs sm:text-sm font-bold leading-relaxed" style="color: var(--mc-navy);">
                                নিবন্ধন সম্পন্ন করার মাধ্যমে আপনি উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে।
                            </p>
                        </div>

                        {{-- Mentor CTA (Large Button) --}}
                        <div class="terms-card mt-6 sm:mt-8 text-center p-4 sm:p-8 rounded-2xl sm:rounded-3xl border transition-all duration-700 ease-in-out hover:shadow-2xl hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: linear-gradient(135deg, rgba(40,102,110,0.08), rgba(3,63,99,0.05)); border-color: var(--mc-border-teal); opacity: 0; transform: translateY(14px);">
                            <p class="text-sm sm:text-xl md:text-2xl font-bold tracking-wide leading-relaxed" style="color: var(--mc-navy);">
                                মেন্টর হিসাবে জয়েন করতে <a href="{{ route('teacher_register') }}" class="inline-flex items-center gap-1 sm:gap-1.5 transition-colors duration-200 underline underline-offset-4 hover:opacity-80" style="color: var(--mc-primary);">এখানে ক্লিক করুন <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></a>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Student Terms (separated by left border on large screen) --}}
                <div class="space-y-5 sm:space-y-8 flex flex-col lg:border-l lg:border-[#28666e]/12 dark:lg:border-[#4db6c1]/15 lg:pl-10">
                    <div class="flex items-center justify-center gap-2.5 sm:gap-3.5 pb-3 sm:pb-4 border-b" style="border-color: var(--mc-border-teal-sub);">
                        <span class="text-xl sm:text-2xl">🎒</span>
                        <h2 class="text-lg sm:text-2xl font-bold font-[Lora,serif]" style="color: var(--mc-navy);">শিক্ষার্থীদের জন্য শর্তাবলী</h2>
                    </div>

                    <div class="space-y-4 sm:space-y-6 flex-1">
                        {{-- Student Clause 1 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ১
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">নিবন্ধন</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সঠিক ও সত্য তথ্য দিয়ে নিবন্ধন করতে হবে। মিথ্যা তথ্য প্রমাণিত হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে বাতিল করা হবে।
                            </p>
                        </div>

                        {{-- Student Clause 2 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ২
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশন শুরুর আগে পেমেন্ট</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                এটি একটি তাৎক্ষণিক লাইভ মেন্টরশিপ প্ল্যাটফর্ম। সেশন শুরুর আগেই পেমেন্ট সম্পন্ন করতে হবে, অন্যথায় সেশন শুরু হবে না।
                            </p>
                        </div>

                        {{-- Student Clause 3 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৩
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশন বাতিল ও রিফান্ড</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সেশন শুরু হওয়ার আগে বাতিল করলে সম্পূর্ণ রিফান্ড পাওয়া যাবে। সেশন একবার শুরু হয়ে গেলে কোনো রিফান্ড প্রযোজ্য হবে না। তবে প্ল্যাটফর্মের কোনো কারিগরি সমস্যা বা মেন্টরের ডিভাইস, ইন্টারনেট বা অন্য যেকোনো ত্রুটির কারণে সেশন ব্যাহত বা বাতিল হলে শিক্ষার্থী সম্পূর্ণ রিফান্ড পাওয়ার অধিকার রাখবেন।
                            </p>
                        </div>

                        {{-- Student Clause 4 (Prohibited - Highlighted in Red) --}}
                        <div class="terms-card warning-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #ef4444, #b91c1c);">
                                    ৪
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-red-600 dark:text-red-400">প্ল্যাটফর্মের বাইরে যোগাযোগ: কঠোরভাবে নিষিদ্ধ</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                মেন্টরের সাথে প্ল্যাটফর্মের বাইরে যোগাযোগ, তথ্য আদানপ্রদান বা ব্যক্তিগত সেশন পরিচালনার যেকোনো চেষ্টা ক্ষমার অযোগ্য অপরাধ হিসেবে গণ্য হবে এবং অ্যাকাউন্ট স্থায়ীভাবে বন্ধ করা হবে।
                            </p>
                        </div>

                        {{-- Student Clause 5 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৫
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">আচরণ</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সেশন চলাকালীন মেন্টরের প্রতি সম্মানজনক আচরণ করতে হবে। অশালীন, হয়রানিমূলক বা আপত্তিজনক আচরণ অ্যাকাউন্ট বাতিলের কারণ হবে।
                            </p>
                        </div>

                        {{-- Student Clause 6 (Prohibited - Highlighted in Red) --}}
                        <div class="terms-card warning-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #ef4444, #b91c1c);">
                                    ৬
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg text-red-600 dark:text-red-400">তৃতীয় পক্ষের সফটওয়্যার ব্যবহার নিষিদ্ধ</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সেশন চলাকালীন কোনো থার্ড পার্টি স্ক্রিন রেকর্ডার, স্ক্রিন মিরর বা ক্যাপচার টুল ব্যবহার করে সেশন রেকর্ড করা যাবে না। এই ধরনের টুল ব্যবহার ডিটেক্ট হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে স্থায়ী নিষিদ্ধ করা হবে।
                            </p>
                        </div>

                        {{-- Student Clause 7 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৭
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">রিভিউ ও রেটিং</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সেশন শেষে সৎ ও নিরপেক্ষভাবে রেটিং দিতে হবে। উদ্দেশ্যমূলকভাবে মিথ্যা বা ক্ষতিকর রিভিউ দেওয়া শাস্তিযোগ্য অপরাধ হিসেবে গণ্য হবে।
                            </p>
                        </div>

                        {{-- Student Clause 8 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৮
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">সেশনের কন্টেন্ট পুনঃবিতরণ নিষিদ্ধ</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                সেশনে আলোচিত কোনো উপকরণ, তথ্য বা কন্টেন্ট অনলাইনে শেয়ার, আপলোড বা বিক্রি করা কপিরাইট আইনের লঙ্ঘন এবং শাস্তিযোগ্য অপরাধ।
                            </p>
                        </div>

                        {{-- Student Clause 9 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ৯
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">অভিযোগ দাখিল</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                মেন্টরের বিরুদ্ধে কোনো অভিযোগ থাকলে প্ল্যাটফর্মের সাপোর্ট টিমের মাধ্যমে জানাতে হবে। সোশ্যাল মিডিয়া বা অন্য কোনো মাধ্যমে প্রকাশ্যে বিবাদে জড়ানো শর্তাবলীর লঙ্ঘন।
                            </p>
                        </div>

                        {{-- Student Clause 10 --}}
                        <div class="terms-card p-4 sm:p-7 md:p-8 rounded-xl sm:rounded-2xl border transition-all duration-700 ease-in-out hover:shadow-lg hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                                <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl flex items-center justify-center font-extrabold text-xs sm:text-sm text-white shrink-0"
                                    style="background: linear-gradient(135deg, #1A9998, #155665);">
                                    ১০
                                </div>
                                <h3 class="font-bold text-sm sm:text-base md:text-lg" style="color: var(--mc-text-sub);">শর্তাবলী মেনে চলার অঙ্গীকার</h3>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--mc-text-muted); line-height: 1.6;">
                                নিবন্ধন সম্পন্ন করার মাধ্যমে শিক্ষার্থী উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে। শর্তাবলী যেকোনো সময় পরিবর্তন হতে পারে এবং তা প্ল্যাটফর্মের মাধ্যমে জানানো হবে।
                            </p>
                        </div>

                        {{-- Student Agreement Subtitle --}}
                        <div class="terms-card text-center p-4 sm:p-6 rounded-xl sm:rounded-2xl border"
                            style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(14px);">
                            <p class="text-xs sm:text-sm font-bold leading-relaxed" style="color: var(--mc-navy);">
                                নিবন্ধন সম্পন্ন করার মাধ্যমে আপনি উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে।
                            </p>
                        </div>

                        {{-- Student CTA (Large Button) --}}
                        <div class="terms-card mt-6 sm:mt-8 text-center p-4 sm:p-8 rounded-2xl sm:rounded-3xl border transition-all duration-700 ease-in-out hover:shadow-2xl hover:-translate-y-1 sm:hover:-translate-y-2"
                            style="background: linear-gradient(135deg, rgba(40,102,110,0.08), rgba(3,63,99,0.05)); border-color: var(--mc-border-teal); opacity: 0; transform: translateY(14px);">
                            <p class="text-sm sm:text-xl md:text-2xl font-bold tracking-wide leading-relaxed" style="color: var(--mc-navy);">
                                স্টুডেন্ট হিসাবে জয়েন করতে <a href="{{ route('student_register') }}" class="inline-flex items-center gap-1 sm:gap-1.5 transition-colors duration-200 underline underline-offset-4 hover:opacity-80" style="color: var(--mc-primary);">এখানে ক্লিক করুন <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <style>
        .warning-card {
            background: rgba(239, 68, 68, 0.08) !important;
            border-color: rgba(239, 68, 68, 0.38) !important;
            box-shadow: 0 8px 30px rgba(239, 68, 68, 0.12) !important;
        }
        .dark .warning-card {
            background: rgba(239, 68, 68, 0.15) !important;
            border-color: rgba(239, 68, 68, 0.45) !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.45) !important;
        }
    </style>

    <script>
        // Staggered load animation for terms cards, separated by column so they load side-by-side
        document.querySelectorAll('.grid > div').forEach((column) => {
            column.querySelectorAll('.terms-card').forEach((el, i) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, i * 40);
            });
        });
    </script>
</x-layout>
