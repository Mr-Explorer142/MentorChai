<x-layout>
    <div class="min-h-screen bg-base-200 flex items-center justify-center px-4">

        <!-- Loader -->
        <div
            id="loader"
            class="flex flex-col items-center gap-4"
        >
            <span class="loading loading-spinner loading-lg text-warning"></span>
            <p class="text-sm font-medium text-gray-500">
                Processing your payment...
            </p>
        </div>

        <!-- Success Card -->
        <div
            id="successCard"
            class="hidden card bg-base-100 shadow-2xl max-w-md w-full text-center p-8 opacity-0 scale-95 transition-all duration-500"
        >

            <!-- Check Icon -->
            <div class="flex justify-center mb-6">
                <div
                    id="checkWrapper"
                    class="w-20 h-20 rounded-full bg-success/20 flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-12 h-12 text-success"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <h2 class="text-3xl font-bold mb-1 text-success">
                Thank You!
            </h2>

            <p class="text-lg font-medium">
                Payment Successful 🎉
            </p>

            <!-- Payment Info -->
            <div class="bg-base-200 rounded-lg p-4 my-4 text-sm">
                <p>
                    <span class="font-medium">Payment Method:</span>
                    {{ ucfirst($paymentMethod) }}
                </p>
                <p>
                    <span class="font-medium">Amount Paid:</span>
                    ৳{{ number_format($amount, 2) }}
                </p>
            </div>

            <p class="text-sm text-gray-500 mb-6">
                Your session has been booked successfully.
            </p>

            <!-- Actions -->
            <div class="space-y-3">
                <a href="{{ route('live-session') }}"
                   class="btn btn-success btn-wide">
                    Request for a session
                </a>

                <a href="{{ route('student_dashboard') }}"
                   class="btn btn-outline btn-wide">
                    Go to dashboard
                </a>
            </div>

        </div>
    </div>
</x-layout>
