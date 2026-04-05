{{-- Monthly Spending Graph for Student Dashboard --}}
<div class="card shadow-lg border bg-white dark:bg-[#1a2e3b] border-[#C4CFCE] dark:border-[#4db6c1]/15 transition-colors duration-300">
    <div class="card-body p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-1 h-10 rounded-full bg-linear-to-b from-[#155665] to-[#155665]/30"></div>
                <div>
                    <h2 class="text-xl font-bold flex items-center gap-2 text-[#102E3C] dark:text-[#7ec8e3]">
                        <svg class="w-6 h-6 text-[#155665] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        মাসিক খরচের পরিসংখ্যান
                    </h2>
                    <p class="text-sm mt-1 text-[#155665]/70 dark:text-[#4db6c1]/60">বিগত ১২ মাসের খরচের তুলনা</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="btn btn-sm btn-outline border-2 border-[#1A998F] text-[#1A998F]
                               hover:bg-[#1A998F] hover:text-white
                               dark:border-[#4db6c1] dark:text-[#4db6c1]
                               dark:hover:bg-[#4db6c1] dark:hover:text-[#0f1f2e]
                               transition-colors"
                        onclick="updateSpendingChartType('line')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </button>
                <button class="btn btn-sm border-2 text-white border-[#1A998F] bg-[#1A998F]
                               dark:border-[#4db6c1] dark:bg-[#4db6c1] dark:text-[#0f1f2e]
                               transition-colors"
                        onclick="updateSpendingChartType('bar')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Chart Canvas --}}
        <div class="relative h-80 sm:h-96 p-2 rounded-xl
                    bg-[#fafcfc] dark:bg-[#0f1f2e]/60
                    border border-transparent dark:border-[#4db6c1]/10
                    transition-colors duration-300">
            <canvas id="spendingChart"></canvas>
        </div>

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 pt-6
                    border-t border-[#C4CFCE] dark:border-[#4db6c1]/15">
            @foreach([
                ['label'=>'সর্বোচ্চ খরচ', 'value'=>'৳১২,০০০', 'color'=>'#102E3C','dark'=>'#f3f4f6'],
                ['label'=>'সর্বনিম্ন খরচ','value'=>'৳৩,০০০',  'color'=>'#1A998F','dark'=>'#4db6c1'],
                ['label'=>'গড় খরচ',      'value'=>'৳৬,৯১৭', 'color'=>'#187F87','dark'=>'#7ec8e3'],
                ['label'=>'মোট খরচ',     'value'=>'৳৮৩,০০০', 'color'=>'#102E3C','dark'=>'#f3f4f6'],
            ] as $stat)
            <div class="text-center p-3 rounded-xl bg-[#155665]/6 dark:bg-[#4db6c1]/10">
                <p class="text-sm mb-1 text-[#155665]/80 dark:text-[#7ec8e3]/60">{{ $stat['label'] }}</p>
                <p class="text-lg font-bold" style="color: {{ $stat['color'] }};">{{ $stat['value'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Budget Alert --}}
        <div class="flex items-start gap-3 p-4 rounded-xl mt-6 border
                    bg-linear-to-r from-[#155665]/8 to-[#1A998F]/5
                    dark:from-[#1a2e3b] dark:to-[#243d4d]
                    border-[#155665]/20 dark:border-[#4db6c1]/15">
            <svg class="w-6 h-6 shrink-0 mt-0.5 text-[#155665] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <div>
                <h3 class="font-bold text-[#102E3C] dark:text-[#7ec8e3]">বাজেট সতর্কতা</h3>
                <p class="text-xs mt-0.5 text-[#155665] dark:text-[#7ec8e3]/70">এই মাসে আপনার খরচ গত মাসের তুলনায় ১৫% বেশি</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const isSpendingDark = () => document.documentElement.classList.contains('dark');

    const getSpendingColors = () => ({
        tickColor: isSpendingDark() ? '#7ec8e3' : '#155665',
        gridColor: isSpendingDark() ? 'rgba(77,182,193,0.12)' : 'rgba(196,207,206,0.4)',
        barBg:     isSpendingDark() ? 'rgba(77,182,193,0.18)' : 'rgba(21,86,101,0.18)',
        barBorder: isSpendingDark() ? 'rgba(77,182,193,1)'    : 'rgba(21,86,101,1)',
        barHover:  isSpendingDark() ? 'rgba(77,182,193,0.38)' : 'rgba(26,153,143,0.35)',
    });

    const monthlySpending = {
        labels: ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর'],
        data: [5000,7500,6000,8000,4500,9000,7000,12000,6500,8500,5500,3000]
    };

    const ctxSpending = document.getElementById('spendingChart').getContext('2d');
    const sc = getSpendingColors();

    let spendingChart = new Chart(ctxSpending, {
        type: 'bar',
        data: {
            labels: monthlySpending.labels,
            datasets: [{
                label: 'মাসিক খরচ (৳)',
                data: monthlySpending.data,
                backgroundColor: sc.barBg,
                borderColor: sc.barBorder,
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: sc.barHover,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: isSpendingDark() ? 'rgba(26,46,59,0.95)' : 'rgba(16,46,60,0.92)',
                    padding: 12,
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 13 },
                    callbacks: { label: ctx => 'খরচ: ৳' + ctx.parsed.y.toLocaleString() }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: sc.tickColor, callback: v => '৳' + v.toLocaleString() },
                    grid: { color: sc.gridColor }
                },
                x: {
                    ticks: { color: sc.tickColor },
                    grid: { display: false }
                }
            }
        }
    });

    function updateSpendingChartType(type) {
        const c = getSpendingColors();
        spendingChart.config.type = type;
        spendingChart.data.datasets[0].fill = type === 'line';
        spendingChart.data.datasets[0].tension = type === 'line' ? 0.4 : 0;
        spendingChart.data.datasets[0].backgroundColor = c.barBg;
        spendingChart.data.datasets[0].borderColor = c.barBorder;
        spendingChart.options.scales.y.ticks.color = c.tickColor;
        spendingChart.options.scales.x.ticks.color = c.tickColor;
        spendingChart.options.scales.y.grid.color = c.gridColor;
        spendingChart.update();
    }

    document.getElementById('theme-toggle')?.addEventListener('click', () => {
        setTimeout(() => updateSpendingChartType(spendingChart.config.type), 50);
    });
</script>
