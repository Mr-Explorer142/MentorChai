<x-layout>
    <div class="min-h-screen bg-base-200 p-4 lg:p-8">

        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Live Mentoring Session</h1>
            <p class="text-sm text-base-content/60">
                Topic: Laravel Authentication & Authorization
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

                            <span class="badge badge-success badge-outline">
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
                <div class="card bg-base-100 shadow-xl h-[520px] flex flex-col">
                    <div class="card-body border-b">
                        <h2 class="font-semibold">Live Chat</h2>
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

                    <div class="p-4 border-t">
                        <div class="flex gap-2">
                            <input type="text" placeholder="Type a message..."
                                class="input input-bordered w-full input-sm" />
                            <button class="btn btn-primary btn-sm">Send</button>
                        </div>
                    </div>
                </div>

                <!-- Session Details -->
                <div class="card bg-base-100 shadow">
                    <div class="card-body space-y-3">
                        <h2 class="font-semibold">Session Details</h2>

                        <div class="text-sm text-base-content/70 space-y-1">
                            <p><strong>Topic:</strong> Laravel Authentication</p>
                            <p><strong>Date:</strong> 15 Jan 2026</p>
                            <p><strong>Time:</strong> 10:00 AM – 11:30 AM</p>
                            <p><strong>Level:</strong> Intermediate</p>
                        </div>

                        <button class="btn btn-outline btn-sm mt-2">
                            Download Resources
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
                        <h2 class="text-lg font-semibold">Submit Your Review</h2>
                        <p class="text-sm text-base-content/60">
                            Share your feedback about this live session
                        </p>
                    </div>

                    <!-- Review Form -->
                    <form method="POST" action="#" class="space-y-5">
                        @csrf

                        <!-- Rating -->
                        <div>
                            <label class="label">
                                <span class="label-text font-medium">Your Rating</span>
                            </label>
                            <div class="rating rating-lg">
                                <input type="radio" name="rating" value="1"
                                    class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="2"
                                    class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="3"
                                    class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="4"
                                    class="mask mask-star-2 bg-warning" />
                                <input type="radio" name="rating" value="5"
                                    class="mask mask-star-2 bg-warning" />
                            </div>
                        </div>

                        <!-- Comment -->
                        <div>
                            <label class="label">
                                <span class="label-text font-medium">Your Comment</span>
                            </label>
                            <textarea class="textarea textarea-bordered w-full" rows="4"
                                placeholder="Write your experience about the session..." name="comment"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Submit Review
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</x-layout>
