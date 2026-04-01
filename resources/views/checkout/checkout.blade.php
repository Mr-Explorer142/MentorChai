<x-layout>
    <div class="min-h-screen flex items-center justify-center p-5 md:p-10"
        style="background: linear-gradient(160deg, #eef7f8 0%, #f8fdfe 55%, #f0f9f4 100%);">

        <div class="w-full max-w-3xl">

            {{-- Page Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4 shadow-md"
                    style="background:linear-gradient(135deg,#28666e,#033f63);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold" style="font-family:'Lora',serif; color:#033f63;">পেমেন্টের বিবরণ</h2>
                <p class="text-sm mt-1" style="color:rgba(3,63,99,0.5);">সেশন নিশ্চিত করতে পেমেন্ট সম্পন্ন করুন</p>
            </div>

            <div class="bg-white rounded-2xl border border-teal-100 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 space-y-6">

                    {{-- Student & Mentor Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- Student --}}
                        <div class="rounded-xl p-4 border border-teal-100" style="background:rgba(238,247,248,0.5);">
                            <h3 class="font-bold text-sm mb-3 flex items-center gap-2" style="color:#033f63;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#28666e">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                শিক্ষার্থীর তথ্য
                            </h3>
                            <p class="text-sm" style="color:rgba(3,63,99,0.7);"><span class="font-semibold"
                                    style="color:#033f63;">আইডি:</span> {{ $student->id }}</p>
                            <p class="text-sm mt-1" style="color:rgba(3,63,99,0.7);"><span class="font-semibold"
                                    style="color:#033f63;">নাম:</span> {{ $student->name }}</p>
                        </div>

                        {{-- Mentor --}}
                        <div class="rounded-xl p-4 border border-teal-100" style="background:rgba(238,247,248,0.5);">
                            <h3 class="font-bold text-sm mb-3 flex items-center gap-2" style="color:#033f63;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="#3d8a8f">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                মেন্টরের তথ্য
                            </h3>
                            <p class="text-sm" style="color:rgba(3,63,99,0.7);"><span class="font-semibold"
                                    style="color:#033f63;">আইডি:</span> {{ $mentor->id }}</p>
                            <p class="text-sm mt-1" style="color:rgba(3,63,99,0.7);"><span class="font-semibold"
                                    style="color:#033f63;">নাম:</span> {{ $mentor->name }}</p>
                        </div>
                    </div>

                    {{-- Session Details --}}
                    <div class="rounded-xl p-4 border border-teal-100" style="background:rgba(238,247,248,0.5);">
                        <h3 class="font-bold text-sm mb-4 flex items-center gap-2" style="color:#033f63;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#28666e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            সেশনের বিস্তারিত
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div class="bg-white rounded-xl p-3 border border-teal-100 text-center">
                                <p class="text-xs font-semibold mb-0.5" style="color:rgba(3,63,99,0.5);">বিষয়</p>
                                <p class="text-sm font-bold" style="color:#033f63;">{{ $topic }}</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-teal-100 text-center">
                                <p class="text-xs font-semibold mb-0.5" style="color:rgba(3,63,99,0.5);">ঘণ্টাপ্রতি</p>
                                <p class="text-sm font-bold" style="color:#033f63;">৳{{ number_format($hourlyRate, 2) }}
                                </p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-teal-100 text-center">
                                <p class="text-xs font-semibold mb-0.5" style="color:rgba(3,63,99,0.5);">মোট সময়</p>
                                <p class="text-sm font-bold" style="color:#033f63;">{{ number_format($hours, 2) }} ঘণ্টা
                                </p>
                            </div>
                            <div class="bg-white rounded-xl p-3 border border-teal-100 text-center">
                                <p class="text-xs font-semibold mb-0.5" style="color:rgba(3,63,99,0.5);">পরিশোধযোগ্য</p>
                                <p class="text-sm font-bold" style="color:#28666e;">৳{{ number_format($paidAmount, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Methods --}}
                    <div>
                        <h3 class="font-bold text-sm mb-4 flex items-center gap-2" style="color:#033f63;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="#28666e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                            পেমেন্ট মেথড সিলেক্ট করুন
                        </h3>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                            {{-- bKash --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="bkash" class="peer hidden">
                                <div
                                    class="bg-white rounded-xl p-4 border-2 border-teal-100 peer-checked:border-teal-500 peer-checked:bg-teal-50 hover:border-teal-300 transition-all duration-200 text-center hover:-translate-y-0.5 hover:shadow-sm">
                                    <img src="{{ asset('images/Checkout Page/bkash.svg') }}" class="h-7 mx-auto mb-2"
                                        alt="বিকাশ">
                                    <p class="text-xs font-semibold" style="color:#033f63;">বিকাশ</p>
                                </div>
                            </label>

                            {{-- Nagad --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="nagad" class="peer hidden">
                                <div
                                    class="bg-white rounded-xl p-4 border-2 border-teal-100 peer-checked:border-teal-500 peer-checked:bg-teal-50 hover:border-teal-300 transition-all duration-200 text-center hover:-translate-y-0.5 hover:shadow-sm">
                                    <img src="{{ asset('images/Checkout Page/nagad.svg') }}" class="h-7 mx-auto mb-2"
                                        alt="নগদ">
                                    <p class="text-xs font-semibold" style="color:#033f63;">নগদ</p>
                                </div>
                            </label>

                            {{-- Rocket --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="rocket" class="peer hidden">
                                <div
                                    class="bg-white rounded-xl p-4 border-2 border-teal-100 peer-checked:border-teal-500 peer-checked:bg-teal-50 hover:border-teal-300 transition-all duration-200 text-center hover:-translate-y-0.5 hover:shadow-sm">
                                    <img src="{{ asset('images/Checkout Page/rocket.png') }}" class="h-7 mx-auto mb-2"
                                        alt="রকেট">
                                    <p class="text-xs font-semibold" style="color:#033f63;">রকেট</p>
                                </div>
                            </label>

                            {{-- Card --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="card" class="peer hidden">
                                <div
                                    class="bg-white rounded-xl p-4 border-2 border-teal-100 peer-checked:border-teal-500 peer-checked:bg-teal-50 hover:border-teal-300 transition-all duration-200 text-center hover:-translate-y-0.5 hover:shadow-sm">
                                    <img src="{{ asset('images/Checkout Page/cards.svg') }}" class="h-7 mx-auto mb-2"
                                        alt="কার্ড">
                                    <p class="text-xs font-semibold" style="color:#033f63;">ডেবিট/ক্রেডিট কার্ড</p>
                                </div>
                            </label>

                            {{-- Pathao Pay --}}
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="pathao_pay" class="peer hidden">
                                <div
                                    class="bg-white rounded-xl p-4 border-2 border-teal-100 peer-checked:border-teal-500 peer-checked:bg-teal-50 hover:border-teal-300 transition-all duration-200 text-center hover:-translate-y-0.5 hover:shadow-sm">
                                    <img src="{{ asset('images/Checkout Page/pathao_pay.svg') }}" class="h-6 mx-auto mb-2"
                                        alt="পাঠাও পে">
                                    <p class="text-xs font-semibold" style="color:#033f63;">পাঠাও পে</p>
                                </div>
                            </label>

                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-teal-100"></div>

                    {{-- Total & Pay Button --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div>
                            <p class="text-xs font-semibold mb-0.5" style="color:rgba(3,63,99,0.5);">সর্বমোট পরিশোধযোগ্য
                            </p>
                            <p class="text-2xl font-bold" style="color:#28666e; font-family:'Lora',serif;">
                                ৳{{ number_format($paidAmount, 2) }}
                            </p>
                        </div>

                        <a href="{{ route('success') }}"
                            class="btn btn-wide text-white border-none font-bold text-base shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200"
                            style="background:#28666e; border-radius:12px;"
                            onmouseover="this.style.background='#1a4a52'" onmouseout="this.style.background='#28666e'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            পরিশোধ করুন
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
