{{-- Monthly Earnings Graph for Mentor Dashboard --}}
<div class="card shadow-lg border bg-white dark:bg-[#1a2e3b] border-[#C4CFCE] dark:border-[#4db6c1]/15 transition-colors duration-300">
    <div class="card-body p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-1 h-10 rounded-full bg-linear-to-b from-[#1A998F] to-[#1A998F]/30"></div>
                <div>
                    <h2 class="text-xl font-bold flex items-center gap-2 text-[#102E3C] dark:text-[#7ec8e3]">
                        <svg class="w-6 h-6 text-[#1A998F] dark:text-[#4db6c1]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        মাসিক আয়ের পরিসংখ্যান
                    </h2>
                    <p class="text-sm mt-1 text-[#155665]/70 dark:text-[#4db6c1]/60">বিগত ১২ মাসের আয়ের তুলনা</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button id="lineBtn"
                        class="btn btn-sm btn-outline border-2 border-[#1A998F] text-[#1A998F]
                               hover:bg-[#1A998F] hover:text-white hover:border-[#1A998F]
                               dark:border-[#4db6c1] dark:text-[#4db6c1]
                               dark:hover:bg-[#4db6c1] dark:hover:text-[#0f1f2e]
                               transition-colors"
                        onclick="updateChartType('line')">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </button>
                <button id="barBtn"
                        class="btn btn-sm border-2 text-white border-[#1A998F] bg-[#1A998F]
                               dark:border-[#4db6c1] dark:bg-[#4db6c1] dark:text-[#0f1f2e]
                               transition-colors"
                        onclick="updateChartType('bar')">
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
            <canvas id="earningsChart"></canvas>
        </div>

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 pt-6
                    border-t border-[#C4CFCE] dark:border-[#4db6c1]/15">
            @foreach([
                ['label'=>'সর্বোচ্চ আয়', 'value'=>'৳১৫,০০০', 'color'=>'#1A998F', 'dark'=>'#4db6c1'],
                ['label'=>'সর্বনিম্ন আয়', 'value'=>'৳৫,০০০',  'color'=>'#187F87', 'dark'=>'#7ec8e3'],
                ['label'=>'গড় আয়',       'value'=>'৳৯,৫৮৩', 'color'=>'#155665', 'dark'=>'#7ec8e3'],
                ['label'=>'মোট আয়',      'value'=>'৳১,১৫,০০০','color'=>'#102E3C','dark'=>'#f3f4f6'],
            ] as $stat)
            <div class="text-center p-3 rounded-xl bg-[#1A998F]/8 dark:bg-[#4db6c1]/10">
                <p class="text-sm mb-1 text-[#155665]/80 dark:text-[#7ec8e3]/60">{{ $stat['label'] }}</p>
                <p class="text-lg font-bold" style="color: {{ $stat['color'] }};">{{ $stat['value'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const isDark = () => document.documentElement.classList.contains('dark');

    const getChartColors = () => ({
        tickColor:   isDark() ? '#7ec8e3' : '#155665',
        gridColor:   isDark() ? 'rgba(77,182,193,0.12)' : 'rgba(196,207,206,0.4)',
        barBg:       isDark() ? 'rgba(77,182,193,0.18)' : 'rgba(26,153,143,0.18)',
        barBorder:   isDark() ? 'rgba(77,182,193,1)'    : 'rgba(26,153,143,1)',
        barHover:    isDark() ? 'rgba(77,182,193,0.38)' : 'rgba(26,153,143,0.38)',
    });

    const monthlyEarnings = {
        labels: ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর'],
        data: [8000,12000,9500,11000,7500,13000,10000,15000,9000,11500,8500,10000]
    };

    const ctx = document.getElementById('earningsChart').getContext('2d');
    const c = getChartColors();

    let earningsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthlyEarnings.labels,
            datasets: [{
                label: 'মাসিক আয় (৳)',
                data: monthlyEarnings.data,
                backgroundColor: c.barBg,
                borderColor: c.barBorder,
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: c.barHover,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: isDark() ? 'rgba(26,46,59,0.95)' : 'rgba(16,46,60,0.92)',
                    padding: 12,
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 13 },
                    callbacks: { label: ctx => 'আয়: ৳' + ctx.parsed.y.toLocaleString() }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: c.tickColor, callback: v => '৳' + v.toLocaleString() },
                    grid: { color: c.gridColor }
                },
                x: {
                    ticks: { color: c.tickColor },
                    grid: { display: false }
                }
            }
        }
    });

    function updateChartType(type) {
        const c = getChartColors();
        earningsChart.config.type = type;
        earningsChart.data.datasets[0].fill = type === 'line';
        earningsChart.data.datasets[0].tension = type === 'line' ? 0.4 : 0;
        earningsChart.data.datasets[0].backgroundColor = c.barBg;
        earningsChart.data.datasets[0].borderColor = c.barBorder;
        earningsChart.options.scales.y.ticks.color = c.tickColor;
        earningsChart.options.scales.x.ticks.color = c.tickColor;
        earningsChart.options.scales.y.grid.color = c.gridColor;
        earningsChart.update();
    }

    // Re-render chart colors when dark mode toggles
    document.getElementById('theme-toggle')?.addEventListener('click', () => {
        setTimeout(() => updateChartType(earningsChart.config.type), 50);
    });
</script>
