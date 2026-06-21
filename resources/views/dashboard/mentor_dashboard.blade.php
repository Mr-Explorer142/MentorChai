@use('App\Enums\SessionStatus')

<x-layout>
    <div class="min-h-screen bg-base-200 py-6 px-4 sm:px-6 lg:px-8">
        <div class="mx-auto space-y-6">

            {{-- ═══ Welcome Hero Banner ═══ --}}
            <div class="card bg-primary text-primary-content shadow-2xl rounded-3xl overflow-hidden">
                <div class="card-body px-8 sm:px-12 py-10 sm:py-12">
                    <div class="flex flex-col lg:flex-row justify-between items-start gap-8">
                        <div class="max-w-2xl space-y-5">
                            <div
                                class="badge badge-outline border-primary-content/30 text-primary-content/80 gap-2 py-3 px-4 text-xs uppercase tracking-widest font-semibold">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                                </svg>
                                মেন্টর ড্যাশবোর্ড
                            </div>
                            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">স্বাগতম, {{ $mentor->name }}
                            </h1>
                            <p class="text-base leading-8 text-primary-content/75 max-w-xl">{{ $mentor->profile->short_bio ?? $mentor->profile->bio }}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <div class="badge badge-accent gap-2 py-3 px-4 font-semibold">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                    মেন্টর আইডি: #{{ $mentor->id }}
                                </div>
                                <div class="badge badge-secondary gap-2 py-3 px-4 font-semibold">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    যোগদানের তারিখ: {{ $mentor->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>

                        {{-- Avatar --}}
                        <div class="shrink-0 flex items-center justify-center">
                            <a href="{{ route('mentor_profile', $mentor->id) }}" class="group">
                                <div class="avatar">
                                    <div
                                        class="w-28 rounded-full ring ring-accent ring-offset-primary ring-offset-4 transition-transform duration-300 group-hover:-translate-y-1 shadow-xl">
                                        @if($mentor->profile && $mentor->profile->avatar)
                                        <img src="{{ asset('storage/' . $mentor->profile->avatar) }}"
                                            alt="Mentor Avatar" />
                                        @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($mentor->name) }}&background=1A998F&color=ffffff&size=200&font-size=0.4&bold=true"
                                            alt="Mentor Avatar" />
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ Quick Stats ═══ --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div
                    class="stat bg-primary text-primary-content rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="stat-figure">
                        <div class="w-12 h-12 rounded-2xl bg-primary-content/15 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 5.25h16.5M3.75 9.75h16.5M3.75 14.25h16.5M3.75 18.75h16.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-primary-content/70">মোট সেশন</div>
                    <div class="stat-value">{{ $totalSessions }}</div>
                    <div class="stat-desc text-primary-content/55">সর্বমোট পরিচালিত সেশন</div>
                </div>

                <div
                    class="stat bg-warning text-warning-content rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="stat-figure">
                        <div class="w-12 h-12 rounded-2xl bg-warning-content/15 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-warning-content/70">প্রক্রিয়াধীন</div>
                    <div class="stat-value">{{ $pendingRequests }}</div>
                    <div class="stat-desc text-warning-content/55">মেন্টরের অনুমোদনের অপেক্ষায়</div>
                </div>

                <div
                    class="stat bg-success text-success-content rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="stat-figure">
                        <div class="w-12 h-12 rounded-2xl bg-success-content/15 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-success-content/70">সম্পন্ন</div>
                    <div class="stat-value">{{ $completedSessions }}</div>
                    <div class="stat-desc text-success-content/55">সাফল্যের হার</div>
                </div>

                <div
                    class="stat bg-secondary text-secondary-content rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="stat-figure">
                        <div class="w-12 h-12 rounded-2xl bg-secondary-content/15 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-secondary-content/70">মোট আয়</div>
                    <div class="stat-value text-2xl">৳{{ number_format($totalEarnings, 0) }}</div>
                    <div class="stat-desc text-secondary-content/55">সর্বমোট পরিশোধিত অর্থ</div>
                </div>
            </div>

            {{-- ═══ Session Summary + Earnings Summary ═══ --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <div
                    class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body gap-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 5.25h16.5M3.75 9.75h16.5M3.75 14.25h16.5M3.75 18.75h16.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="card-title text-base-content">সেশন সারসংক্ষেপ</h2>
                                    <p class="text-xs text-base-content/50">সকল সেশনের সারসংক্ষেপ</p>
                                </div>
                            </div>
                            <div class="badge badge-primary badge-lg font-bold">{{ $totalSessions }}</div>
                        </div>
                        @php
                        $mentorBreakdown = [
                        ['label' => 'প্রক্রিয়াধীন', 'value' => $pendingRequests, 'bg' => 'bg-warning', 'text' =>
                        'text-warning-content', 'icon' => 'M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['label' => 'সম্পন্ন', 'value' => $completedSessions, 'bg' => 'bg-success', 'text' =>
                        'text-success-content', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118
                        0z'],
                        ['label' => 'বাতিলকৃত', 'value' => $cancelledRequests, 'bg' => 'bg-error', 'text' =>
                        'text-error-content', 'icon' => 'M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0
                        0118 0z'],
                        ];
                        @endphp
                        <div class="grid grid-cols-3 gap-3">
                            @foreach($mentorBreakdown as $item)
                            <div
                                class="{{ $item['bg'] }} {{ $item['text'] }} rounded-2xl p-4 text-center hover:scale-105 transition-transform shadow">
                                <svg class="w-7 h-7 mx-auto mb-2 opacity-90" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                </svg>
                                <p class="text-2xl font-extrabold">{{ $item['value'] }}</p>
                                <p class="text-xs opacity-80 mt-1 font-semibold">{{ $item['label'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div
                    class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body gap-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="card-title text-base-content">আয় সংক্ষেপ</h2>
                                    <p class="text-xs text-base-content/50">মোট পরিশোধিত আয়</p>
                                </div>
                            </div>
                            <div class="badge badge-secondary badge-lg font-bold">৳{{ number_format($totalEarnings, 0)
                                }}</div>
                        </div>
                        @php
                        $mentorEarningsRows = [
                        ['label' => 'বিগত সপ্তাহ', 'amount' => $weeklyEarnings, 'bar' => 'bg-primary', 'badge' =>
                        'badge-primary'],
                        ['label' => 'বিগত মাস', 'amount' => $monthlyEarnings, 'bar' => 'bg-secondary', 'badge' =>
                        'badge-secondary'],
                        ['label' => 'বিগত বছর', 'amount' => $yearlyEarnings, 'bar' => 'bg-accent', 'badge' =>
                        'badge-accent'],
                        ];
                        @endphp
                        <div class="space-y-3">
                            @foreach($mentorEarningsRows as $row)
                            <div
                                class="flex items-center justify-between bg-base-200 rounded-xl px-4 py-3 hover:bg-base-300 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-8 rounded-full {{ $row['bar'] }}"></div>
                                    <span class="font-medium text-base-content text-sm">{{ $row['label'] }}</span>
                                </div>
                                <span class="font-extrabold text-lg text-base-content">৳{{ number_format($row['amount'],
                                    0) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ Recent Sessions Table ═══ --}}
            <div
                class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow duration-300">
                <div class="card-body gap-0 p-0">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-6 sm:px-8 py-5 border-b border-base-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-base-content">সাম্প্রতিক সেশনসমূহ</h2>
                                <p class="text-xs text-base-content/50">শেষ কয়েকটি সেশনের বিবরণ</p>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            নতুন সেশন
                        </button>
                    </div>

                    @if($sessionTopics->isEmpty())
                    <div class="text-center py-14 px-6">
                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </div>
                        <p class="text-base-content font-semibold">কোনো সেশন অনুরোধ নেই</p>
                        <p class="text-sm text-base-content/50 mt-1">নতুন সেশন অনুরোধের অপেক্ষায় থাকুন</p>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr class="bg-base-200 text-base-content/60 text-xs uppercase tracking-wider">
                                    <th class="font-bold">আইডি</th>
                                    <th class="font-bold">শিক্ষার্থী</th>
                                    <th class="font-bold">টপিক</th>
                                    <th class="font-bold">সময়কাল</th>
                                    <th class="font-bold">স্ট্যাটাস</th>
                                    <th class="font-bold">সেশন ফি</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $statusConfig = [
                                'pending' => ['label' => 'অপেক্ষমান', 'cls' => 'badge-warning'],
                                'approved' => ['label' => 'অনুমোদিত', 'cls' => 'badge-success'],
                                'rejected' => ['label' => 'প্রত্যাখ্যাত', 'cls' => 'badge-error'],
                                'completed' => ['label' => 'সম্পন্ন', 'cls' => 'badge-info'],
                                ];
                                @endphp
                                @foreach($sessionTopics->take(5) as $topic)
                                <tr class="hover">
                                    <td>
                                        <div class="badge badge-outline font-semibold">#{{ $topic->id }}</div>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            {{-- ✅ Real avatar with fallback --}}
                                            <div class="w-9 h-9 rounded-full overflow-hidden shrink-0">
                                                @if($topic->student?->profile?->avatar)
                                                <img src="{{ asset('storage/' . $topic->student->profile->avatar) }}"
                                                    alt="{{ $topic->student->name }}"
                                                    class="w-full h-full object-cover" />
                                                @else
                                                <div
                                                    class="w-full h-full bg-primary text-primary-content flex items-center justify-center">
                                                    <span class="text-xs font-bold">{{
                                                        strtoupper(substr($topic->student?->name ?? 'NA', 0, 2))
                                                        }}</span>
                                                </div>
                                                @endif
                                            </div>
                                            <span class="font-semibold text-base-content text-sm">{{
                                                $topic->student?->name ?? 'অজানা' }}</span>
                                        </div>
                                    </td>
                                    <td class="text-base-content/70 text-sm">{{ $topic->topic }}</td>
                                    <td>
                                        <div class="badge badge-outline badge-primary font-semibold">{{
                                            $topic->duration_hours ?? 1 }} ঘণ্টা</div>
                                    </td>
                                    <td>
                                        @php $s = $statusConfig[$topic->status->value ?? 'pending'] ??
                                        $statusConfig['pending']; @endphp
                                        <div class="badge {{ $s['cls'] }} font-semibold text-xs">{{ $s['label'] }}</div>
                                    </td>
                                    <td>
                                        @php
                                        $hourlyRate = optional($topic->mentor->profile)->hourly_rate ?: 0;
                                        $fee = $hourlyRate * ($topic->duration_hours ?? 1);
                                        @endphp
                                        <span class="font-extrabold text-accent">৳{{ number_format($fee, 0) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            {{-- ═══ Recent Payments Table ═══ --}}
            <div
                class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow duration-300">
                <div class="card-body gap-0 p-0">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-6 sm:px-8 py-5 border-b border-base-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-base-content">সাম্প্রতিক পেমেন্টসমূহ</h2>
                                <p class="text-xs text-base-content/50">সর্বশেষ লেনদেনের তালিকা</p>
                            </div>
                        </div>
                        <button class="btn btn-secondary btn-sm gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            রিপোর্ট ডাউনলোড
                        </button>
                    </div>

                    @if($recentPayments->isEmpty())
                    <div class="text-center py-14 px-6">
                        <div
                            class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                        </div>
                        <p class="text-base-content font-semibold">কোনো পেমেন্ট রেকর্ড নেই</p>
                        <p class="text-sm text-base-content/50 mt-1">এখনো কোনো পেমেন্ট সম্পন্ন হয়নি</p>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr class="bg-base-200 text-base-content/60 text-xs uppercase tracking-wider">
                                    <th class="font-bold">আইডি</th>
                                    <th class="font-bold">শিক্ষার্থী</th>
                                    <th class="font-bold">পরিমাণ</th>
                                    <th class="font-bold">মাধ্যম</th>
                                    <th class="font-bold">তারিখ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPayments as $payment)
                                <tr class="hover">
                                    <td>
                                        <div class="badge badge-outline font-semibold">#{{ $payment->id }}</div>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            {{-- ✅ Real avatar with fallback --}}
                                            <div class="w-9 h-9 rounded-full overflow-hidden shrink-0">
                                                @if($payment->student?->profile?->avatar)
                                                <img src="{{ asset('storage/' . $payment->student->profile->avatar) }}"
                                                    alt="{{ $payment->student->name }}"
                                                    class="w-full h-full object-cover" />
                                                @else
                                                <div
                                                    class="w-full h-full bg-secondary text-secondary-content flex items-center justify-center">
                                                    <span class="text-xs font-bold">{{
                                                        strtoupper(substr($payment->student?->name ?? 'NA', 0, 2))
                                                        }}</span>
                                                </div>
                                                @endif
                                            </div>
                                            <span class="font-semibold text-base-content text-sm">{{
                                                $payment->student?->name ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td><span class="font-extrabold text-lg text-accent">৳{{
                                            number_format($payment->mentor_earning, 0) }}</span></td>
                                    <td>
                                        <div class="badge badge-outline badge-secondary font-semibold">{{
                                            ucfirst($payment->method->value) }}</div>
                                    </td>
                                    <td class="text-base-content/50 text-sm">{{ $payment->paid_at ?
                                        $payment->paid_at->format('d M Y') : $payment->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            {{-- ═══ Chart ═══ --}}
            @include('dashboard.mentor-earnings-chart')

        </div>
    </div>
</x-layout>
