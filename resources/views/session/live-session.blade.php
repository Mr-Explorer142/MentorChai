<x-layout>
    <div class="min-h-screen bg-base-200 p-6 md:p-20">

        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold">লাইভ মেন্টরিং সেশন</h1>
            <p class="text-sm text-base-content/60 font-bold mt-3">
                Topic : <span class="font-semibold">Laravel Authentication & Authorization</span>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- MAIN VIDEO AREA -->
            <div class="lg:col-span-8 space-y-6">

                <!-- Live Video -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="relative">

                        <!-- Video Placeholder -->
                        <div
                            class="aspect-video bg-neutral rounded-t-lg flex items-center justify-center text-neutral-content">
                            <span class="text-lg opacity-70">Live Video Stream</span>
                        </div>

                        <!-- Live Badge -->
                        <span class="badge badge-error absolute top-4 left-4 gap-1">
                            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                            LIVE
                        </span>

                        <!-- Controls -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-3">
                            <button class="btn btn-circle btn-sm">
                                <!-- Mic -->
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 1v11m0 0a4 4 0 004-4V5a4 4 0 00-8 0v3a4 4 0 004 4zm0 0v6m-3 0h6" />
                                </svg>
                            </button>

                            <button class="btn btn-circle btn-sm">
                                <!-- Camera -->
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </button>

                            <button class="btn btn-circle btn-sm btn-error">
                                <!-- Leave -->
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Session Meta -->
                    <div class="card-body py-4">
                        <div class="flex flex-wrap justify-between items-center gap-4">
                            <div>
                                <p class="font-semibold">Laravel Auth Deep Dive</p>
                                <p class="text-sm text-base-content/60">
                                    Started at 10:00 AM · Duration: 1h 30m
                                </p>
                            </div>

                            <span class="badge badge-secondary badge-outline font-semibold">
                                32 Participants
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Mentor Info -->
                <div class="card bg-base-100 shadow">
                    <div class="card-body flex flex-col sm:flex-row gap-4 items-center sm:items-start">
                        <div class="avatar">
                            <div
                                class="w-16 rounded-full bg-primary text-primary-content flex items-center justify-center">
                                M
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-lg">Mahmud Hasan</p>
                            <p class="text-sm text-base-content/60">Senior Laravel Mentor</p>
                            <p class="text-sm text-base-content/70 mt-2 max-w-xl">
                                8+ years experience in Laravel & system architecture.
                            </p>
                        </div>
                        <span class="badge badge-primary badge-outline">Host</span>
                    </div>
                </div>

            </div>



            <!-- RIGHT SIDEBAR -->
            <div class="lg:col-span-4 space-y-6">

                <!-- Live Chat -->
                <div class="card bg-base-100 shadow-xl flex flex-col space-y-1 px-">
                    <div class="card-body border-b border-gray-300">
                        <h2 class="font-semibold">সরাসরি প্রশ্ন করুন (Optional feature)</h2>
                    </div>

                    <div class="flex-1 overflow-y-auto p-4 space-y-4 text-sm">

                        <div>
                            <p class="font-medium">Ahsan</p>
                            <p class="text-base-content/70">
                                Sir, can you explain middleware again?
                            </p>
                        </div>

                        <div>
                            <p class="font-medium">Mentor</p>
                            <p class="text-base-content/70">
                                Sure, I’ll cover it after this example.
                            </p>
                        </div>

                        <div>
                            <p class="font-medium">Sara</p>
                            <p class="text-base-content/70">
                                Is Sanctum better than Passport?
                            </p>
                        </div>

                    </div>

                    <div class="p-4 border-t border-gray-300">
                        <div class="flex gap-2">
                            <input type="text" placeholder="মেসেজ লিখুন..."
                                class="input input-bordered input-primary w-full input-sm text-primary" />
                            <button type="submit" class="btn btn-primary btn-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12
                 59.77 59.77 0 013.27 20.876L6 12zm0 0h7.5" />
                                </svg>
                                মেসেজ করুন
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Session Details -->
                <div class="card bg-base-100 shadow">
                    <div class="card-body space-y-3">
                        <h2 class="font-semibold">সেশন বিবরণ</h2>

                        <div class="text-sm text-base-content/70 space-y-1 border-t border-gray-300">
                            <div class="mt-3">
                                <p><strong>Topic:</strong> Laravel Authentication</p>
                                <p><strong>Date:</strong> 15 Jan 2026</p>
                                <p><strong>Time:</strong> 10:00 AM – 11:30 AM</p>
                                <p><strong>Level:</strong> Intermediate</p>
                            </div>
                        </div>

                        <button class="btn btn-outline btn-primary btn-sm mt-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M7.5 12L12 16.5m0 0L16.5 12M12 16.5V3" />
                            </svg>
                            রিসোর্স ডাউনলোড করুন
                        </button>
                    </div>
                </div>

            </div>

        </div>

        {{-- Review --}}
        <div class="mt-10">
            <div class="card bg-base-100 shadow-xl max-w-2xl mx-auto">
                <div class="card-body space-y-6">

                    <!-- Header -->
                    <div>
                        <h2 class="text-lg font-semibold">রিভিউ সাবমিট করুন</h2>
                        <p class="text-sm text-base-content/60 mt-2 font-semibold">
                            সেশন সম্পর্কে আপনার মতামত শেয়ার করুন
                        </p>
                    </div>

                    <!-- Review Form -->
                    <form method="POST" action="#" class="space-y-5">
                        @csrf

                        <!-- Rating -->
                        <div>
                            <label class="label">
                                <span class="label-text font-semibold">আপনার রেটিং</span>
                            </label>
                            <div class="rating rating-lg">
                                <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-warning" />
                            </div>
                        </div>

                        <!-- Comment -->
                        <div>
                            <label class="label">
                                <span class="label-text font-semibold text-primary">বিস্তারিত লিখুন</span>
                            </label>
                            <textarea class="mt-2 textarea textarea-bordered textarea-primary w-full" rows="4"
                                placeholder="সেশন সম্পর্কে আপনার মতামত শেয়ার করুন..." name="comment"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary btn-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111
                 a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988
                 l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385
                 a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0
                 l-4.725 2.885a.562.562 0 01-.84-.61l1.285-5.385
                 a.562.562 0 00-.182-.557l-4.204-3.602
                 a.562.562 0 01.321-.988l5.518-.442
                 a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                রিভিউ দিন
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</x-layout>