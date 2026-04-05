{{-- Monthly Spending Graph for Student Dashboard --}}
<div class="card shadow-lg border" style="background-color: #ffffff; border-color: #C4CFCE;">
    <div class="card-body p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-1 h-10 rounded-full"
                    style="background: linear-gradient(to bottom, #155665, rgba(21,86,101,0.3));"></div>
                <div>
                    <h2 class="text-xl font-bold flex items-center gap-2" style="color: #102E3C;">
                        <svg class="w-6 h-6" style="color: #155665;" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        মাসিক খরচের পরিসংখ্যান
                    </h2>
                    <p class="text-sm mt-1" style="color: #155665; opacity: 0.7;">বিগত ১২ মাসের খরচের তুলনা</p>
                </div>
            </div>

            <div class="flex gap-2">
                <button class="btn btn-sm btn-outline border-2 hover:text-white transition-colors"
                    style="border-color: #1A998F; color: #1A998F;"
                    onmouseover="this.style.backgroundColor='#1A998F'; this.style.color='white';"
                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#1A998F';"
                    onclick="updateSpendingChartType('line')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </button>
                <button class="btn btn-sm border-2 text-white transition-colors"
                    style="border-color: #1A998F; background-color: #1A998F;" onclick="updateSpendingChartType('bar')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Chart Canvas --}}
        <div class="relative h-80 sm:h-96 p-2 rounded-xl" style="background-color: #fafcfc;">
            <canvas id="spendingChart"></canvas>
        </div>

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 pt-6 border-t" style="border-color: #C4CFCE;">
            <div class="text-center p-3 rounded-xl"
                style="background: linear-gradient(135deg, rgba(21,86,101,0.06), rgba(21,86,101,0.02));">
                <p class="text-sm mb-1" style="color: #155665; opacity: 0.8;">সর্বোচ্চ খরচ</p>
                <p class="text-lg font-bold" style="color: #102E3C;">৳১২,০০০</p>
            </div>
            <div class="text-center p-3 rounded-xl"
                style="background: linear-gradient(135deg, rgba(26,153,143,0.06), rgba(26,153,143,0.02));">
                <p class="text-sm mb-1" style="color: #155665; opacity: 0.8;">সর্বনিম্ন খরচ</p>
                <p class="text-lg font-bold" style="color: #1A998F;">৳৩,০০০</p>
            </div>
            <div class="text-center p-3 rounded-xl"
                style="background: linear-gradient(135deg, rgba(24,127,135,0.06), rgba(24,127,135,0.02));">
                <p class="text-sm mb-1" style="color: #155665; opacity: 0.8;">গড় খরচ</p>
                <p class="text-lg font-bold" style="color: #187F87;">৳৬,৯১৭</p>
            </div>
            <div class="text-center p-3 rounded-xl"
                style="background: linear-gradient(135deg, rgba(16,46,60,0.06), rgba(16,46,60,0.02));">
                <p class="text-sm mb-1" style="color: #155665; opacity: 0.8;">মোট খরচ</p>
                <p class="text-lg font-bold" style="color: #102E3C;">৳৮৩,০০০</p>
            </div>
        </div>

        {{-- Budget Alert --}}
        <div class="flex items-start gap-3 p-4 rounded-xl mt-6 border"
            style="background: linear-gradient(to right, rgba(21,86,101,0.08), rgba(26,153,143,0.05)); border-color: rgba(21,86,101,0.2);">
            <svg class="w-6 h-6 shrink-0 mt-0.5" style="color: #155665;" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <div>
                <h3 class="font-bold" style="color: #102E3C;">বাজেট সতর্কতা</h3>
                <p class="text-xs mt-0.5" style="color: #155665;">এই মাসে আপনার খরচ গত মাসের তুলনায় ১৫% বেশি</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample data - Replace with actual data from backend
    const monthlySpending = {
        labels: ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'],
        data: [5000, 7500, 6000, 8000, 4500, 9000, 7000, 12000, 6500, 8500, 5500, 3000]
    };

    const ctxSpending = document.getElementById('spendingChart').getContext('2d');
    let spendingChart = new Chart(ctxSpending, {
        type: 'bar',
        data: {
            labels: monthlySpending.labels,
            datasets: [{
                label: 'মাসিক খরচ (৳)',
                data: monthlySpending.data,
                backgroundColor: 'rgba(21, 86, 101, 0.18)',
                borderColor: 'rgba(21, 86, 101, 1)',
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: 'rgba(26, 153, 143, 0.35)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(16, 46, 60, 0.92)',
                    padding: 12,
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 13 },
                    callbacks: {
                        label: function(context) {
                            return 'খরচ: ৳' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#155665',
                        callback: function(value) {
                            return '৳' + value.toLocaleString();
                        }
                    },
                    grid: { color: 'rgba(196, 207, 206, 0.4)' }
                },
                x: {
                    ticks: { color: '#155665' },
                    grid: { display: false }
                }
            }
        }
    });

    function updateSpendingChartType(type) {
        spendingChart.config.type = type;
        if (type === 'line') {
            spendingChart.data.datasets[0].fill = true;
            spendingChart.data.datasets[0].tension = 0.4;
            spendingChart.data.datasets[0].backgroundColor = 'rgba(26, 153, 143, 0.12)';
            spendingChart.data.datasets[0].borderColor = 'rgba(26, 153, 143, 1)';
        } else {
            spendingChart.data.datasets[0].fill = false;
            spendingChart.data.datasets[0].tension = 0;
            spendingChart.data.datasets[0].backgroundColor = 'rgba(21, 86, 101, 0.18)';
            spendingChart.data.datasets[0].borderColor = 'rgba(21, 86, 101, 1)';
        }
        spendingChart.update();
    }
</script>
