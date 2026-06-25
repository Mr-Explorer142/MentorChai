{{-- Monthly Spending Chart — DaisyUI Semantic Color Edition --}}
<div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow duration-300">
    <div class="card-body gap-0 p-0">

        <div
            class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-6 sm:px-8 py-5 border-b border-base-300">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-accent/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-base-content">মাসিক খরচের পরিসংখ্যান</h2>
                    <p class="text-xs text-base-content/50">বিগত ১২ মাসের খরচের তুলনা</p>
                </div>
            </div>
            <div class="join border border-base-300 rounded-xl overflow-hidden shrink-0">
                <button id="spendingLineBtn" onclick="updateSpendingChartType('line')"
                    class="join-item btn btn-sm btn-ghost gap-2 px-4" title="লাইন চার্ট">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                    লাইন
                </button>
                <button id="spendingBarBtn" onclick="updateSpendingChartType('bar')"
                    class="join-item btn btn-sm btn-primary gap-2 px-4" title="বার চার্ট">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                    বার
                </button>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            <div class="relative h-80 sm:h-96 rounded-2xl bg-base-200 border border-base-300 p-4">
                <canvas id="spendingChart"></canvas>
            </div>

            @php
            $chartMax = count($monthlyChartData) ? max($monthlyChartData) : 0;
            $chartMin = count(array_filter($monthlyChartData)) ? min(array_filter($monthlyChartData)) : 0;
            $chartAvg = count($monthlyChartData) ? array_sum($monthlyChartData) / count($monthlyChartData) : 0;
            $chartTotal = array_sum($monthlyChartData);
            $spendingStats = [
            ['label' => 'সর্বোচ্চ খরচ', 'value' => '৳' . number_format($chartMax, 0), 'bg' => 'bg-violet-600', 'text' =>
            'text-white', 'title' => 'text-violet-100'],
            ['label' => 'সর্বনিম্ন খরচ', 'value' => '৳' . number_format($chartMin, 0), 'bg' => 'bg-pink-500', 'text' =>
            'text-white', 'title' => 'text-pink-100'],
            ['label' => 'গড় খরচ', 'value' => '৳' . number_format($chartAvg, 0), 'bg' => 'bg-teal-500', 'text' =>
            'text-white', 'title' => 'text-teal-100'],
            ['label' => 'মোট খরচ', 'value' => '৳' . number_format($chartTotal, 0), 'bg' => 'bg-emerald-500','text' =>
            'text-white', 'title' => 'text-emerald-100'],
            ];
            @endphp
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach($spendingStats as $stat)
                <div
                    class="stat {{ $stat['bg'] }} {{ $stat['text'] }} rounded-2xl shadow p-4 hover:scale-105 transition-transform">
                    <div class="stat-title text-xs {{ $stat['title'] }} opacity-100">{{ $stat['label'] }}</div>
                    <div class="stat-value text-xl">{{ $stat['value'] }}</div>
                </div>
                @endforeach
            </div>

            @if($monthlySpent > $weeklySpent * 4)
            <div role="alert" class="alert alert-warning shadow">
                <svg class="w-6 h-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                <div>
                    <h3 class="font-bold">বাজেট সতর্কতা</h3>
                    <div class="text-xs">এই মাসে আপনার খরচ ৳{{ number_format($monthlySpent, 0) }} — বাজেটের দিকে নজর
                        রাখুন।</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@php
$monthLabels = $monthLabels ?? [
'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল',
'মে', 'জুন', 'জুলাই', 'আগস্ট',
'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
];
$monthlyChartData = $monthlyChartData ?? array_fill(0, count($monthLabels), 0);
@endphp

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
    function buildColors() {
        const isDark = document.documentElement.classList.contains('dark') || 
                       document.documentElement.getAttribute('data-theme') === 'dark' ||
                       document.documentElement.getAttribute('data-theme') === 'night';
        
        // Use a single, vibrant color (Teal) that looks stunning on both Light and Dark backgrounds
        const primaryColor = '#14b8a6'; 
        const baseColors = Array(12).fill(primaryColor);
        
        const hexToRgba = (hex, alpha) => {
            let r = parseInt(hex.slice(1, 3), 16),
                g = parseInt(hex.slice(3, 5), 16),
                b = parseInt(hex.slice(5, 7), 16);
            return `rgba(${r}, ${g}, ${b}, ${alpha})`;
        };

        return {
            barBg:     baseColors.map(c => hexToRgba(c, 0.75)),
            barBorder: baseColors,
            barHover:  baseColors.map(c => hexToRgba(c, 0.95)),
            lineColor: primaryColor,
            lineFill:  hexToRgba(primaryColor, 0.15),
            points:    baseColors,
            tick:      isDark ? '#d1d5db' : '#374151',
            grid:      isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.08)',
            tooltip:   isDark ? '#1f2937' : '#ffffff',
        };
    }

    // ✅ Dynamic labels from controller — shows actual last 12 months
    const labels = @json($monthLabels);
    const data   = @json($monthlyChartData);

    const ctx = document.getElementById('spendingChart').getContext('2d');
    const c   = buildColors();

    let spendingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'মাসিক খরচ (৳)',
                data,
                backgroundColor: c.barBg,
                borderColor:     c.barBorder,
                borderWidth:     2,
                borderRadius:    10,
                hoverBackgroundColor: c.barHover,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: c.tooltip,
                    titleColor:      c.tick,
                    bodyColor:       c.tick,
                    borderColor:     c.grid,
                    borderWidth:     1,
                    padding:         12,
                    cornerRadius:    12,
                    titleColor:      '#ffffff',
                    bodyColor:       '#ffffff',
                    titleFont: { size: 13, weight: 'bold' },
                    bodyFont:  { size: 13 },
                    callbacks: { label: ctx => ' খরচ: ৳' + ctx.parsed.y.toLocaleString() }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: c.tick, font: { weight: '600' }, callback: v => '৳' + v.toLocaleString() },
                    grid:  { color: c.grid }
                },
                x: {
                    ticks: { color: c.tick, font: { weight: '600' }, maxRotation: 45 },
                    grid:  { display: false }
                }
            }
        }
    });

    function setToggleState(type) {
        const lineBtn = document.getElementById('spendingLineBtn');
        const barBtn  = document.getElementById('spendingBarBtn');
        lineBtn.className = 'join-item btn btn-sm btn-ghost gap-2 px-4';
        barBtn.className  = 'join-item btn btn-sm btn-ghost gap-2 px-4';
        if (type === 'line') lineBtn.className = 'join-item btn btn-sm btn-primary gap-2 px-4';
        else                  barBtn.className  = 'join-item btn btn-sm btn-primary gap-2 px-4';
    }

    window.updateSpendingChartType = function (type) {
        const c = buildColors();
        spendingChart.config.type = type;
        if (type === 'line') {
            Object.assign(spendingChart.data.datasets[0], {
                fill: true, tension: 0.4, backgroundColor: c.lineFill,
                borderColor: c.lineColor, borderWidth: 3,
                pointBackgroundColor: c.points, pointBorderColor: '#fff',
                pointBorderWidth: 2, pointRadius: 5, pointHoverRadius: 8, borderRadius: 0,
            });
        } else {
            Object.assign(spendingChart.data.datasets[0], {
                fill: false, tension: 0, backgroundColor: c.barBg,
                borderColor: c.barBorder, borderWidth: 2, borderRadius: 10, pointRadius: 0,
            });
        }
        spendingChart.options.scales.y.ticks.color = c.tick;
        spendingChart.options.scales.x.ticks.color = c.tick;
        spendingChart.options.scales.y.grid.color  = c.grid;
        spendingChart.update();
        setToggleState(type);
    };

    const observer = new MutationObserver(() => {
        window.updateSpendingChartType(spendingChart.config.type);
    });
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class', 'data-theme'] });
})();
</script>