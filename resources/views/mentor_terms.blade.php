<x-layout>
    <div class="min-h-screen transition-colors duration-300" style="background-color: var(--mc-bg);">

        {{-- Header Section --}}
        <section class="max-w-4xl mx-auto px-5 pt-16 pb-8 text-center">
            <span class="badge badge-outline font-bold uppercase tracking-widest text-xs px-4 py-3 mb-4"
                style="border-color: var(--mc-border-teal); color: var(--mc-primary); background: rgba(40,102,110,0.08);">
                📜 প্ল্যাটফর্ম পলিসি
            </span>
            <h1 class="text-3xl md:text-4xl font-bold mt-3 mb-4"
                style="color: var(--mc-text); font-family: 'Lora', serif; line-height: 1.3;">
                মেন্টর নিবন্ধন শর্তাবলী
            </h1>
            <div class="mx-auto mb-6 h-1 w-20 rounded-full"
                style="background: linear-gradient(90deg, #1A9998, #155665);"></div>
            <p class="text-sm max-w-xl mx-auto" style="color: var(--mc-text-muted);">
                মেন্টর হিসেবে নিবন্ধন করার পূর্বে অনুগ্রহ করে প্ল্যাটফর্মের নীতি ও শর্তাবলী মনোযোগ সহকারে পড়ুন।
            </p>
        </section>

        {{-- Terms List Section --}}
        <section class="max-w-3xl mx-auto px-5 pb-16 flex flex-col gap-6">

            {{-- 1. নিবন্ধন ও প্রয়োজনীয় কাগজপত্র --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ১
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">নিবন্ধন ও প্রয়োজনীয় কাগজপত্র</h2>
                        <p class="text-sm leading-relaxed mb-3" style="color: var(--mc-text-sub);">মেন্টর হিসেবে নিবন্ধন করতে নিম্নোক্ত ডকুমেন্টগুলো প্রয়োজন হবে:</p>
                        <ul class="space-y-2 mb-3">
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>জাতীয় পরিচয়পত্র (NID) বা পাসপোর্টের কপি</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>শিক্ষাগত যোগ্যতার সনদ (সর্বোচ্চ ডিগ্রি)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>পেশাদার অভিজ্ঞতার প্রমাণ (সার্টিফিকেট,পোর্টফোলিও)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>একটি সক্রিয় ব্যাংক অ্যাকাউন্টের তথ্য</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>সাম্প্রতিক পাসপোর্ট সাইজের ছবি</span>
                            </li>
                        </ul>
                        <p class="text-sm font-semibold leading-relaxed" style="color: var(--mc-text-sub);">সকল তথ্য সঠিক ও সত্য হতে হবে। কোনো তথ্য মিথ্যা বা বিভ্রান্তিকর প্রমাণিত হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে বাতিল করা হবে।</p>
                    </div>
                </div>
            </div>

            {{-- 2. সেশন ফি ও কমিশন --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ২
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">সেশন ফি ও কমিশন</h2>
                        <p class="text-sm leading-relaxed mb-4" style="color: var(--mc-text-sub);">মেন্টর তার সেশনের ফী নিজে নির্ধারণ করতে পারবেন, তবে প্ল্যাটফর্ম নির্ধারিত সর্বোচ্চ সীমার বেশি ফী নির্ধারণ করতে পারবেন না।</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                            <div class="p-3.5 rounded-xl border flex flex-col justify-center" style="background: rgba(40,102,110,0.03); border-color: var(--mc-border-teal-sub);">
                                <span class="text-xs" style="color: var(--mc-text-muted);">পূর্ণ এক ঘণ্টার সেশন</span>
                                <span class="text-lg font-extrabold mt-1" style="color: var(--mc-primary);">সর্বোচ্চ ৳৫০০</span>
                            </div>
                            <div class="p-3.5 rounded-xl border flex flex-col justify-center" style="background: rgba(40,102,110,0.03); border-color: var(--mc-border-teal-sub);">
                                <span class="text-xs" style="color: var(--mc-text-muted);">আধা ঘণ্টার সেশন</span>
                                <span class="text-lg font-extrabold mt-1" style="color: var(--mc-primary);">সর্বোচ্চ ৳৩০০</span>
                            </div>
                        </div>

                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">প্রতিটি সেশনের মোট ফী থেকে ২৫% প্ল্যাটফর্ম কমিশন কেটে নেওয়া হবে। অবশিষ্ট ৭৫% নির্দিষ্ট সময়ের মধ্যে মেন্টরের অ্যাকাউন্ট ব্যালেন্সে জমা হবে।</p>
                    </div>
                </div>
            </div>

            {{-- 3. প্ল্যাটফর্মের বাইরে যোগাযোগ — কঠোরভাবে নিষিদ্ধ --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: rgba(239,68,68,0.02); border-color: rgba(239,68,68,0.25); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(239,68,68,0.1); color: #ef4444; border-color: rgba(239,68,68,0.3);">
                        ৩
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3 text-red-600 dark:text-red-400" style="font-family: 'Lora', serif;">প্ল্যাটফর্মের বাইরে যোগাযোগ — কঠোরভাবে নিষিদ্ধ</h2>
                        <p class="text-sm leading-relaxed mb-3" style="color: var(--mc-text-sub);">মেন্টর ও শিক্ষার্থী উভয়কেই এই নিয়ম মেনে চলতে হবে। প্ল্যাটফর্মের বাইরে :</p>
                        <ul class="space-y-2 mb-4">
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>ব্যক্তিগত যোগাযোগের চেষ্টা করা</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>ফোন নম্বর, ইমেইল বা সোশ্যাল মিডিয়ার মাধ্যমে তথ্য আদানপ্রদান</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>আলাদাভাবে সেশন পরিচালনা বা পেমেন্ট লেনদেনের চেষ্টা করা</span>
                            </li>
                        </ul>
                        <div class="p-3.5 rounded-xl border bg-red-50/50 dark:bg-red-950/20 border-red-100 dark:border-red-900/30">
                            <p class="text-xs leading-relaxed font-bold text-red-700 dark:text-red-400">এগুলোর যেকোনো একটি প্রমাণিত হলে সেটি ক্ষমার অযোগ্য লঙ্ঘন হিসেবে গণ্য হবে এবং সংশ্লিষ্ট মেন্টর ও শিক্ষার্থী উভয়কেই স্থায়ীভাবে ব্যান করা হবে। এ বিষয়ে কোনো আপিলের সুযোগ থাকবে না।</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. সেশন পরিচালনা --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৪
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">সেশন পরিচালনা</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">মেন্টরকে নির্ধারিত সময়ে উপস্থিত থেকে সেশন পরিচালনা করতে হবে। ঘন ঘন সেশন বাতিল বা অনুপস্থিতি অ্যাকাউন্ট স্থগিতের কারণ হতে পারে। মেন্টর শুধুমাত্র নিজের দক্ষতার বিষয়ে সেশন নেবেন এবং কোনো ভুল বা বিভ্রান্তিকর তথ্য দেওয়া যাবে না।</p>
                    </div>
                </div>
            </div>

            {{-- 5. নৈতিক আচরণ --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৫
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">নৈতিক আচরণ</h2>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>শিক্ষার্থীর প্রতি সর্বদা সম্মানজনক ও পেশাদার আচরণ করতে হবে।</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>জাতি, ধর্ম, লিঙ্গ বা যেকোনো পরিচয়ের ভিত্তিতে বৈষম্য বা হয়রানি সম্পূর্ণ নিষিদ্ধ।</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>শিক্ষার্থীর ব্যক্তিগত তথ্য কোনো অবস্থাতেই তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm" style="color: var(--mc-text-sub);">
                                <span class="text-teal-500 mt-0.5">•</span>
                                <span>সেশনে ব্যবহৃত যেকোনো তৃতীয় পক্ষের উপকরণের ক্ষেত্রে মেধাস্বত্ব আইন মেনে চলতে হবে।</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- 6. শর্তাবলী পরিবর্তন ও অ্যাকাউন্ট বাতিল --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৬
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">শর্তাবলী পরিবর্তন ও অ্যাকাউন্ট বাতিল</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">প্ল্যাটফর্ম প্রয়োজনে যেকোনো সময় এই শর্তাবলী সংশোধন করতে পারবে এবং মেন্টরকে আগে থেকে জানানো হবে। শর্তাবলীর যেকোনো লঙ্ঘনে প্ল্যাটফর্ম অ্যাকাউন্ট স্থগিত বা স্থায়ীভাবে বাতিল করার অধিকার রাখে।</p>
                    </div>
                </div>
            </div>

            {{-- 7. রিভিউ ও রেটিং --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৭
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">রিভিউ ও রেটিং</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">শিক্ষার্থী প্রতিটি সেশনের পর মেন্টরকে রেটিং ও রিভিউ দিতে পারবেন। মেন্টর কোনোভাবেই শিক্ষার্থীকে নির্দিষ্ট রেটিং দিতে চাপ দিতে বা প্রভাবিত করতে পারবেন না। ধারাবাহিকভাবে খারাপ রেটিং পেলে প্ল্যাটফর্ম অ্যাকাউন্ট পর্যালোচনা করার অধিকার রাখে।</p>
                    </div>
                </div>
            </div>

            {{-- 8. সেশন রেকর্ডিং --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৮
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">সেশন রেকর্ডিং</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">প্ল্যাটফর্মের অনুমতি ছাড়া কোনো সেশন রেকর্ড করা যাবে না। শিক্ষার্থীর সম্মতি ব্যতীত সেশনের কোনো অংশ তৃতীয় পক্ষের সাথে শেয়ার করা সম্পূর্ণ নিষিদ্ধ।</p>
                    </div>
                </div>
            </div>

            {{-- 9. দ্বন্দ্ব নিষ্পত্তি --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ৯
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">দ্বন্দ্ব নিষ্পত্তি</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">মেন্টর ও শিক্ষার্থীর মধ্যে কোনো বিরোধ দেখা দিলে প্রথমে প্ল্যাটফর্মের সাপোর্ট টিমের মাধ্যমে সমাধানের চেষ্টা করতে হবে। সরাসরি বিবাদে জড়ানো বা সোশ্যাল মিডিয়ায় প্রকাশ্যে অভিযোগ করা শর্তাবলীর লঙ্ঘন হিসেবে গণ্য হবে।</p>
                    </div>
                </div>
            </div>

            {{-- 10. মেন্টরের প্রোফাইল আপডেট --}}
            <div class="term-card rounded-2xl border p-6 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-base border"
                        style="background: rgba(40,102,110,0.06); color: var(--mc-primary); border-color: var(--mc-border-teal);">
                        ১০
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold mb-3" style="color: var(--mc-text); font-family: 'Lora', serif;">মেন্টরের প্রোফাইল আপডেট</h2>
                        <p class="text-sm leading-relaxed" style="color: var(--mc-text-sub);">মেন্টরের যোগ্যতা, অভিজ্ঞতা বা বিষয়ে কোনো পরিবর্তন হলে তা যথাসময়ে প্রোফাইলে আপডেট করতে হবে। পুরনো বা ভুল তথ্য দিয়ে শিক্ষার্থী আকৃষ্ট করার চেষ্টা প্রতারণা হিসেবে বিবেচিত হবে।</p>
                    </div>
                </div>
            </div>

            {{-- Declaration & Registration CTA --}}
            <div class="term-card border text-center rounded-2xl p-8 mt-4 transition-all duration-300 hover:shadow-md"
                style="background: var(--mc-surface); border-color: var(--mc-border-teal-sub); box-shadow: var(--mc-shadow-sm); opacity: 0; transform: translateY(15px);">
                <p class="font-bold text-sm leading-relaxed mb-6" style="color: var(--mc-text);">
                    নিবন্ধন সম্পন্ন করার মাধ্যমে আপনি উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে।
                </p>
                <p class="text-xl md:text-2xl font-bold" style="color: var(--mc-text-sub);">
                    মেন্টর হিসাবে জয়েন করতে <a href="{{ route('teacher_register') }}" class="font-extrabold underline decoration-2 underline-offset-4 hover:scale-[1.02] transition-transform duration-150 inline-block" style="color: var(--mc-primary);">এখানে ক্লিক করুন</a>
                </p>
            </div>

        </section>
    </div>

    <script>
        // Stagger fade-in on load
        document.querySelectorAll('.term-card').forEach((el, i) => {
            setTimeout(() => {
                el.style.transition = 'opacity 0.4s ease, transform 0.4s ease, box-shadow 0.22s ease, border-color 0.22s ease';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, i * 45);
        });
    </script>
</x-layout>
