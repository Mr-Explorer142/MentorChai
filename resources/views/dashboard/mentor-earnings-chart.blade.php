{{-- Monthly Earnings Graph for Mentor Dashboard --}}
<div class="card bg-base-100 shadow-xl border border-base-200">
    <div class="card-body p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-1 h-10 bg-linear-to-b from-success to-success/50 rounded-full"></div>
                <div>
                    <h2 class="text-xl font-bold text-base-content flex items-center gap-2">
                        <svg class="w-6 h-6 text-success" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        মাসিক আয়ের পরিসংখ্যান
                    </h2>
                    <p class="text-sm text-base-content/60 mt-1">বিগত ১২ মাসের আয়ের তুলনা</p>
                </div>
            </div>

            <div class="flex gap-2">
                <button class="btn btn-sm btn-outline" onclick="updateChartType('line')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </button>
                <button class="btn btn-sm btn-outline" onclick="updateChartType('bar')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Chart Canvas --}}
        <div class="relative h-80 sm:h-96">
            <canvas id="earningsChart"></canvas>
        </div>

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 pt-6 border-t border-base-200">
            <div class="text-center">
                <p class="text-sm text-base-content/60 mb-1">সর্বোচ্চ আয়</p>
                <p class="text-lg font-bold text-success">৳১৫,০০০</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-base-content/60 mb-1">সর্বনিম্ন আয়</p>
                <p class="text-lg font-bold text-warning">৳৫,০০০</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-base-content/60 mb-1">গড় আয়</p>
                <p class="text-lg font-bold text-info">৳৯,৫৮৩</p>
            </div>
            <div class="text-center">
                <p class="text-sm text-base-content/60 mb-1">মোট আয়</p>
                <p class="text-lg font-bold text-primary">৳১,১৫,০০০</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample data - Replace with actual data from backend
    const monthlyEarnings = {
        labels: ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর',
            'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
        ],
        data: [8000, 12000, 9500, 11000, 7500, 13000, 10000, 15000, 9000, 11500, 8500, 10000]
    };

    const ctx = document.getElementById('earningsChart').getContext('2d');
    let earningsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthlyEarnings.labels,
            datasets: [{
                label: 'মাসিক আয় (৳)',
                data: monthlyEarnings.data,
                backgroundColor: 'rgba(34, 197, 94, 0.2)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: 'rgba(34, 197, 94, 0.4)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    callbacks: {
                        label: function(context) {
                            return 'আয়: ৳' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '৳' + value.toLocaleString();
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Function to update chart type
    function updateChartType(type) {
        earningsChart.config.type = type;
        if (type === 'line') {
            earningsChart.data.datasets[0].fill = true;
            earningsChart.data.datasets[0].tension = 0.4;
        } else {
            earningsChart.data.datasets[0].fill = false;
            earningsChart.data.datasets[0].tension = 0;
        }
        earningsChart.update();
    }
</script>
