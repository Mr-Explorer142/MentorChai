<x-layout>
    <div class="min-h-screen bg-base-200 p-6 md:p-22 space-y-8">

        <div class="card bg-primary text-primary-content shadow-xl">
            <div class="card-body flex flex-col md:flex-row justify-between items-center gap-4">

                <div>
                    <h1 class="text-3xl font-bold text-center">
                        Welcome, {{ $student->name }}
                    </h1>

                    <p class="text-sm my-3 opacity-90 flex items-center gap-2 ml-1">
                        <!-- Heroicon: Identification -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                        </svg>

                        Student ID: {{ $student->id }}
                    </p>

                    <p class="text-sm my-3 opacity-90 flex items-center gap-2 ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>

                        Joined {{ $student->created_at->format('d M Y') }}
                    </p>
                </div>

                <div class="avatar">
                    <div class="w-16 rounded-full ring ring-white ring-offset-2 ring-offset-primary">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=0D8ABC&color=fff"
                            alt="Student Avatar">
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Sessions Card -->
            <div class="card bg-base-100 shadow-xl border-l-8 border-primary">
                <div class="card-body">
                    <div class="flex justify justify-between items-center">
                        <h2 class="card-title text-primary flex items-center gap-2">
                            <!-- Heroicon: Academic Cap -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14.25l9-5.25-9-5.25-9 5.25 9 5.25zM12 14.25v5.25m6.75-8.25v4.5a2.25 2.25 0 01-1.29 2.04l-4.46 2.23a2.25 2.25 0 01-2 0l-4.46-2.23A2.25 2.25 0 015.25 15.75v-4.5" />
                            </svg>
                            Total Sessions
                        </h2>
                        <span class="badge badge-primary badge-lg">20</span>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-4 text-center">
                        <div class="bg-success/10 rounded-lg p-3">
                            <p class="text-sm">Finished</p>
                            <p class="font-bold text-success">10</p>
                        </div>
                        <div class="bg-warning/10 rounded-lg p-3">
                            <p class="text-sm">Pending</p>
                            <p class="font-bold text-warning">10</p>
                        </div>
                        <div class="bg-error/10 rounded-lg p-3">
                            <p class="text-sm">Cancelled</p>
                            <p class="font-bold text-error">0</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Card -->
            <div class="card bg-base-100 shadow-xl border-l-8 border-success">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <h2 class="card-title text-success flex items-center gap-2">
                            <!-- Heroicon: Credit Card -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            Total Paid
                        </h2>
                        <span class="badge badge-success badge-lg">৳10,000</span>
                    </div>

                    <div class="space-y-2 mt-4">
                        <div class="flex justify-between bg-base-200 p-2 rounded">
                            <span>Last Week</span>
                            <span class="font-semibold">৳1,000</span>
                        </div>
                        <div class="flex justify-between bg-base-200 p-2 rounded">
                            <span>Last Month</span>
                            <span class="font-semibold">৳1,000</span>
                        </div>
                        <div class="flex justify-between bg-base-200 p-2 rounded">
                            <span>Last Year</span>
                            <span class="font-semibold">৳8,000</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Sessions Table -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-primary mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 6.75h15A1.5 1.5 0 0121 8.25v10.5A1.5 1.5 0 0119.5 20.25h-15A1.5 1.5 0 013 18.75V8.25A1.5 1.5 0 014.5 6.75z" />
                    </svg>
                    Recent Sessions
                </h2>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead class="bg-primary text-primary-content">
                            <tr>
                                <th>Mentor ID</th>
                                <th>Mentor</th>
                                <th>Topic</th>
                                <th>Duration</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12</td>
                                <td>John Doe</td>
                                <td>Laravel Basics</td>
                                <td><span class="badge badge-info">2 hrs</span></td>
                                <td class="font-semibold">৳1,000</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Jane Smith</td>
                                <td>API Design</td>
                                <td><span class="badge badge-warning">1.5 hrs</span></td>
                                <td class="font-semibold">৳750</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Alex Brown</td>
                                <td>Vue Integration</td>
                                <td><span class="badge badge-success">2 hrs</span></td>
                                <td class="font-semibold">৳1,200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Payments Table -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-success mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>

                    Recent Payments
                </h2>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead class="bg-success text-success-content">
                            <tr>
                                <th>Mentor ID</th>
                                <th>Mentor</th>
                                <th>Amount</th>
                                <th>Gateway</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12</td>
                                <td>John Doe</td>
                                <td class="font-semibold">৳1,000</td>
                                <td><span class="badge badge-primary">bKash</span></td>
                                <td>12 Sep 2025</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Jane Smith</td>
                                <td class="font-semibold">৳750</td>
                                <td><span class="badge badge-warning">Nagad</span></td>
                                <td>05 Sep 2025</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Alex Brown</td>
                                <td class="font-semibold">৳1,200</td>
                                <td><span class="badge badge-info">Stripe</span></td>
                                <td>28 Aug 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Graph will be added here --}}


    </div>
</x-layout>
