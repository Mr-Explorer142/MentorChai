<x-layout>
    <div class="min-h-screen bg-base-200 flex items-center justify-center p-4">
        <div class="card w-full max-w-4xl bg-base-100 shadow-2xl">
            <div class="card-body space-y-6">

                <!-- Title -->
                <h2 class="text-3xl font-bold text-center">
                    Checkout Summary
                </h2>

                <!-- Student & Mentor Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Student -->
                    <div class="card bg-base-200 p-4">
                        <h3 class="font-semibold mb-3 flex items-center gap-2">
                            <!-- user icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                            </svg>
                            Student Information
                        </h3>
                        {{-- Send student and mentor variable into view as compact to render dynamically --}}
                        <p><span class="font-medium">ID:</span> {{ $student->id }}</p>
                        <p><span class="font-medium">Name:</span> {{ $student->name }}</p>
                    </div>

                    <!-- Mentor -->
                    <div class="card bg-base-200 p-4">
                        <h3 class="font-semibold mb-3 flex items-center gap-2">
                            <!-- academic-cap icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-secondary" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A48.454 48.454 0 0112 20.25a48.454 48.454 0 01-6.824-3.193 12.083 12.083 0 01.665-6.479L12 14z" />
                            </svg>
                            Mentor Information
                        </h3>

                        <p><span class="font-medium">ID:</span> {{ $mentor->id }}</p>
                        <p><span class="font-medium">Name:</span> {{ $mentor->name }}</p>
                    </div>

                </div>


                <!-- Session Details -->
                <div class="card bg-base-200 p-4">
                    <h3 class="font-semibold mb-4 flex items-center gap-2">
                        <!-- calendar-days icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-accent" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Session Details
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                        <p><span class="font-medium">Topic:</span> {{ $topic }}</p>
                        <p><span class="font-medium">Hourly Rate:</span> ${{ number_format($hourlyRate, 2) }}</p>
                        <p><span class="font-medium">Total Hours:</span> {{ number_format($hours, 2) }}</p>
                        <p><span class="font-medium">Payable:</span> ৳{{ number_format($paidAmount, 2) }}</p>
                    </div>
                </div>

                <!-- Payment Options -->
                <div>
                    <h3 class="font-semibold text-lg mb-3">Select Payment Method</h3>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                        <!-- bKash -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="bkash" class="peer hidden">
                            <div class="card p-4 border peer-checked:border-warning peer-checked:bg-warning/10">
                                <img src="{{ asset('images/Checkout Page/bkash.svg') }}" class="h-8 mx-auto mb-2"
                                    alt="bKash">
                                <p class="text-center font-medium">bKash</p>
                            </div>
                        </label>

                        <!-- Nagad -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="nagad" class="peer hidden">
                            <div class="card p-4 border peer-checked:border-warning peer-checked:bg-warning/10">
                                <img src="{{ asset('images/Checkout Page/nagad.svg') }}" class="h-8 mx-auto mb-2"
                                    alt="bKash">
                                <p class="text-center font-medium">Nagad</p>
                            </div>
                        </label>

                        <!-- Rocket -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="rocket" class="peer hidden">
                            <div class="card p-4 border peer-checked:border-warning peer-checked:bg-warning/10">
                                <img src="{{ asset('images/Checkout Page/rocket.png') }}" class="h-8 mx-auto mb-2"
                                    alt="Rocket">
                                <p class="text-center font-medium">Rocket</p>
                            </div>
                        </label>

                        <!-- Cards -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="card" class="peer hidden">
                            <div class="card p-4 border peer-checked:border-warning peer-checked:bg-warning/10">
                                <img src="{{ asset('images/Checkout Page/cards.svg') }}" class="h-8 mx-auto mb-2"
                                    alt="Cards">
                                <p class="text-center font-medium">Debit / Credit Card</p>
                            </div>
                        </label>

                        <!-- Stripe -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="stripe" class="peer hidden">
                            <div class="card p-4 border peer-checked:border-warning peer-checked:bg-warning/10">
                                <img src="{{ asset('images/Checkout Page/stripe.svg') }}" class="h-8 mx-auto mb-2"
                                    alt="Stripe">
                                <p class="text-center font-medium">Stripe</p>
                            </div>
                        </label>

                    </div>
                </div>

                <!-- Total -->
                <div class="divider"></div>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-xl font-bold">
                        Total:
                        <span class="text-warning">
                            ৳{{ number_format($paidAmount, 2) }}
                        </span>
                    </div>

                    <a href="{{ route('success') }}" class="btn btn-warning btn-wide text-lg">
                        Confirm & Pay
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>
