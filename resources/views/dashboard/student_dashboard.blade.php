@use('App\Enums\SessionStatus')

<x-layout>
    <div class="min-h-screen mesh-bg-student py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <div class="flex flex-col gap-6 lg:grid lg:grid-cols-12">

            {{-- ═══ 1. Main Hero (Col 1-7) ═══ --}}
            <div
                class="col-span-12 lg:col-span-7 p-5 sm:p-12 flex flex-col justify-center min-h-[220px] sm:min-h-[320px] rounded-[1.5rem] sm:rounded-[2rem] dashboard-card-hero relative overflow-hidden border-2 border-black dark:border-white">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-8 z-10">
                    <a href="{{ route('student_profile', $student->id) }}"
                        class="avatar shrink-0 relative group hover:scale-105 transition-transform duration-300">
                        <div
                            class="absolute -inset-2 bg-white/20 rounded-full blur-lg animate-pulse group-hover:bg-white/30 transition-colors">
                        </div>
                        <div
                            class="w-20 h-20 sm:w-40 sm:h-40 rounded-full border-2 sm:border-4 border-white/50 bg-base-100 shadow-2xl relative overflow-hidden">
                            @if($student->profile && $student->profile->avatar)
                            <img src="{{ asset('storage/' . $student->profile->avatar) }}" alt="Avatar"
                                class="w-full h-full object-cover" />
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=random&color=fff&size=200&bold=true"
                                alt="Avatar" class="w-full h-full object-cover" />
                            @endif
                        </div>
                    </a>

                    <div class="text-center sm:text-left space-y-2 sm:space-y-4">
                        <div
                            class="inline-flex items-center gap-1.5 px-3 py-1 sm:px-4 sm:py-1.5 rounded-full bg-white/20 border border-white/30 text-[10px] sm:text-xs font-bold uppercase tracking-widest text-white shadow-sm backdrop-blur-md">
                            স্টুডেন্ট ড্যাশবোর্ড
                        </div>
                        <h1
                            class="text-2xl sm:text-5xl lg:text-6xl font-black tracking-tighter text-white drop-shadow-md">
                            স্বাগতম, <br class="hidden sm:block" />{{ $student->name }}
                        </h1>
                        <p class="text-xs sm:text-lg text-white/90 font-medium max-w-lg leading-relaxed drop-shadow-sm">
                            {{ $student->profile?->bio ?? 'আপনার শেখার যাত্রা চালিয়ে যান - নতুন মেন্টর খুঁজুন বা চলমান সেশনগুলো দেখুন।' }}
                        </p>

                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 sm:gap-3 pt-2 sm:pt-4">
                            <div
                                class="px-2.5 py-1 sm:px-4 sm:py-2 rounded-xl bg-white/20 border border-white/30 text-white text-xs sm:text-sm font-bold shadow-sm backdrop-blur-md">
                                <span class="opacity-70 mr-1">আইডি:</span> #{{ $student->id }}
                            </div>
                            <div
                                class="px-2.5 py-1 sm:px-4 sm:py-2 rounded-xl bg-white/20 border border-white/30 text-white text-xs sm:text-sm font-bold shadow-sm backdrop-blur-md">
                                <span class="opacity-70 mr-1">যোগদান:</span> {{ $student->created_at->format('d M Y') }}
                            </div>
                            @if($student->profile?->department)
                            <div
                                class="px-2.5 py-1 sm:px-4 sm:py-2 rounded-xl bg-white/90 text-[#28666e] dark:text-[#1a2e3b] text-xs sm:text-sm font-black shadow-sm backdrop-blur-md">
                                {{ $student->profile->department }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ 2. Colorful Quick Stats Grid (Col 8-12) ═══ --}}
            <div class="col-span-12 lg:col-span-5 grid grid-cols-2 sm:grid-cols-2 gap-3 sm:gap-6">
                {{-- Total Requests --}}
                <div
                    class="dashboard-card-sessions backdrop-blur-xl rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 flex flex-col justify-between group hover:-translate-y-1 transition-all border-2 border-black dark:border-white">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-white/20 flex items-center justify-center text-white mb-2 sm:mb-4">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5M3.75 9.75h16.5M3.75 14.25h16.5M3.75 18.75h16.5" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-4xl font-black">{{ $totalRequests }}</h3>
                        <p class="text-[10px] sm:text-sm font-bold opacity-80 mt-0.5 sm:mt-1 uppercase tracking-wider">মোট অনুরোধ</p>
                    </div>
                </div>

                {{-- Pending --}}
                <div
                    class="dashboard-card-pending backdrop-blur-xl rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 flex flex-col justify-between group hover:-translate-y-1 transition-all border-2 border-black dark:border-white">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-white/20 flex items-center justify-center mb-2 sm:mb-4">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-4xl font-black">{{ $pendingRequests }}</h3>
                        <p class="text-[10px] sm:text-sm font-bold opacity-80 mt-0.5 sm:mt-1 uppercase tracking-wider">অপেক্ষমান</p>
                    </div>
                </div>

                {{-- Approved --}}
                <div
                    class="dashboard-card-completed backdrop-blur-xl rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 flex flex-col justify-between group hover:-translate-y-1 transition-all border-2 border-black dark:border-white">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-white/20 flex items-center justify-center mb-2 sm:mb-4">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-4xl font-black">{{ $approvedRequests }}</h3>
                        <p class="text-[10px] sm:text-sm font-bold opacity-80 mt-0.5 sm:mt-1 uppercase tracking-wider">অনুমোদিত</p>
                    </div>
                </div>

                {{-- Total Spent --}}
                <div
                    class="dashboard-card-earnings backdrop-blur-xl rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 flex flex-col justify-between group hover:-translate-y-1 transition-all border-2 border-black dark:border-white">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-white/20 flex items-center justify-center mb-2 sm:mb-4">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-3xl font-black">৳{{ number_format($totalSpent, 0) }}</h3>
                        <p class="text-[10px] sm:text-sm font-bold opacity-80 mt-0.5 sm:mt-1 uppercase tracking-wider">মোট ব্যয়</p>
                    </div>
                </div>
            </div>

            {{-- ═══ 3. Recent Requests Table (Col 1-7) ═══ --}}
            <div
                class="col-span-12 lg:col-span-7 bg-base-100/40 backdrop-blur-xl border-2 border-black dark:border-white rounded-[1.5rem] sm:rounded-[2rem] hover:-translate-y-1 transition-all flex flex-col overflow-hidden">
                <div class="px-4 py-3.5 sm:px-8 sm:py-6 border-b border-base-content/10 flex justify-between items-center bg-base-100/40">
                    <div>
                        <h2 class="text-lg sm:text-2xl font-black text-base-content drop-shadow-sm">সাম্প্রতিক সেশন অনুরোধ</h2>
                        <p class="text-xs sm:text-sm font-bold text-base-content/60 mt-0.5 sm:mt-1">আপনার সর্বশেষ মেন্টরিং সেশনের তালিকা</p>
                    </div>
                    <a href="{{ route('mentors') }}" class="px-4 py-1.5 sm:px-6 sm:py-2 text-xs font-bold text-white bg-linear-to-r from-[#28666e] to-[#033f63] dark:from-[#4db6c1] dark:to-[#7ec8e3] dark:text-[#0f1f2e] rounded-full hover:scale-[1.03] transition-all shadow-md">নতুন অনুরোধ</a>
                </div>

                <div class="flex-1 p-2 overflow-y-auto max-h-[380px]">
                    @if($sessionTopics->isEmpty())
                    <div class="h-full flex flex-col items-center justify-center py-12">
                        <div
                            class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-base-content/10 flex items-center justify-center mb-4 text-base-content/50">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <p class="font-bold text-xs sm:text-base text-base-content/70">কোনো অনুরোধ পাওয়া যায়নি</p>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="table w-full border-none text-base-content">
                            <tbody>
                                @php
                                $statusConfig = [
                                'pending' => ['label' => 'অপেক্ষমান', 'cls' => 'badge-warning'],
                                'approved' => ['label' => 'অনুমোদিত', 'cls' => 'badge-success'],
                                'rejected' => ['label' => 'প্রত্যাখ্যাত', 'cls' => 'badge-error'],
                                'completed' => ['label' => 'সম্পন্ন', 'cls' => 'badge-info'],
                                ];
                                @endphp
                                @foreach($sessionTopics as $topic)
                                @php
                                $mentoringSession = $mentoringSessions->first(fn($s) => $s->topic_id === $topic->id);
                                $s = $statusConfig[$topic->status->value] ?? $statusConfig['pending'];
                                @endphp
                                <tr
                                    class="hover:bg-base-content/10 transition-colors border-b border-base-content/5 last:border-0">
                                    <td class="py-3 pl-3 sm:pl-6">
                                        <div class="flex items-center gap-2.5 sm:gap-4">
                                            <div class="avatar">
                                                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-full border-2 border-white shadow-md">
                                                    @if($topic->mentor?->profile?->avatar)
                                                    <img src="{{ asset('storage/' . $topic->mentor->profile->avatar) }}"
                                                        alt="{{ $topic->mentor->name }}" />
                                                    @else
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($topic->mentor?->name ?? 'M') }}&background=random"
                                                        alt="Avatar" />
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-black text-xs sm:text-base">{{ $topic->mentor?->name ?? 'N/A' }}
                                                </div>
                                                <div
                                                    class="text-[10px] sm:text-xs font-bold text-base-content/60 mt-0.5 wrap-break-word max-w-[150px] sm:max-w-[200px]">
                                                    {{ $topic->topic }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <div
                                            class="px-2 py-0.5 sm:px-3 sm:py-1 bg-base-100/50 rounded-lg inline-block text-[10px] sm:text-xs font-black shadow-sm">
                                            {{ $topic->duration_hours ?? 1 }} ঘণ্টা
                                        </div>
                                    </td>
                                    <td class="py-3 text-right pr-3 sm:pr-6">
                                        <div class="flex items-center justify-end gap-1.5 sm:gap-2">
                                            {{-- Join button for ongoing sessions --}}
                                            @if($mentoringSession && $mentoringSession->status ===
                                            \App\Enums\SessionStatus::Ongoing)
                                            <a href="{{ route('live-session', ['room' => $mentoringSession->session_code]) }}"
                                                class="badge badge-info font-black text-[10px] sm:text-xs py-2 px-2.5 sm:py-2.5 sm:px-4 shadow-sm border-0 gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                                </svg>
                                                যুক্ত হন
                                            </a>
                                            @endif
                                            <div
                                                class="badge {{ $s['cls'] }} font-black text-[10px] sm:text-xs py-2 px-2.5 sm:py-2.5 sm:px-4 shadow-sm border-0">
                                                @if($mentoringSession)
                                                @php
                                                $sessionStatusLabels = [
                                                'ongoing' => 'চলমান',
                                                'completed' => 'সম্পন্ন',
                                                ];
                                                @endphp
                                                {{ $sessionStatusLabels[$mentoringSession->status->value] ?? $s['label']
                                                }}
                                                @else
                                                {{ $s['label'] }}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            {{-- ═══ 4. Spend Breakdown & Recent Payments (Col 8-12) ═══ --}}
            <div class="col-span-12 lg:col-span-5 grid grid-rows-[auto_1fr] gap-6">

                {{-- Spend Breakdown --}}
                <div
                    class="bg-base-100/40 backdrop-blur-xl border-2 border-black dark:border-white rounded-[1.5rem] sm:rounded-[2rem] hover:-translate-y-1 transition-all p-4 sm:p-8">
                    <h2 class="text-base sm:text-xl font-black text-base-content mb-4 sm:mb-6 drop-shadow-sm">ব্যয়ের সারসংক্ষেপ</h2>
                    @php
                    $studentSpentRows = [
                    ['label' => 'বিগত সপ্তাহ', 'amount' => $weeklySpent, 'color' => 'bg-[#28666e] dark:bg-[#4db6c1]'],
                    ['label' => 'বিগত মাস', 'amount' => $monthlySpent, 'color' => 'bg-[#033f63] dark:bg-[#7ec8e3]'],
                    ['label' => 'বিগত বছর', 'amount' => $yearlySpent, 'color' => 'bg-[#7c9885] dark:bg-[#9ab8a5]'],
                    ];
                    @endphp
                    <div class="space-y-4 sm:space-y-5">
                        @foreach($studentSpentRows as $row)
                        <div>
                            <div class="flex justify-between items-end mb-1.5 sm:mb-2">
                                <span class="font-bold text-xs sm:text-sm text-base-content/80">{{ $row['label'] }}</span>
                                <span class="font-black text-sm sm:text-lg text-base-content">৳{{ number_format($row['amount'], 0)
                                    }}</span>
                            </div>
                            <div class="w-full h-2.5 sm:h-3 bg-base-content/10 rounded-full overflow-hidden shadow-inner">
                                <div class="h-full {{ $row['color'] }} rounded-full"
                                    style="width: {{ $totalSpent > 0 ? min(100, ($row['amount'] / $totalSpent) * 100) : 0 }}%">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Recent Payments --}}
                <div
                    class="bg-base-100/40 backdrop-blur-xl border-2 border-black dark:border-white rounded-[1.5rem] sm:rounded-[2rem] hover:-translate-y-1 transition-all flex flex-col overflow-hidden">
                    <div class="px-4 py-3.5 sm:px-8 sm:py-5 border-b border-base-content/10 bg-base-100/40">
                        <h2 class="text-base sm:text-lg font-black text-base-content drop-shadow-sm">সাম্প্রতিক লেনদেন</h2>
                    </div>
                    <div class="flex-1 p-3 sm:p-4 overflow-y-auto max-h-[300px]">
                        @if($recentPayments->isEmpty())
                        <div class="text-center py-6 sm:py-8">
                            <p class="font-bold text-base-content/60 text-xs sm:text-sm">কোনো লেনদেন নেই</p>
                        </div>
                        @else
                        <div class="space-y-2">
                            @foreach($recentPayments as $payment)
                            <div
                                class="flex items-center justify-between p-2.5 sm:p-3 rounded-xl sm:rounded-2xl hover:bg-base-content/10 transition-colors">
                                <div class="flex items-center gap-2.5 sm:gap-3">
                                    <div class="avatar">
                                        <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-full border-2 border-white shadow-md">
                                            @if($payment->session?->mentor?->profile?->avatar)
                                            <img src="{{ asset('storage/' . $payment->session->mentor->profile->avatar) }}"
                                                alt="{{ $payment->session->mentor->name }}" />
                                            @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($payment->session?->mentor?->name ?? 'M') }}&background=random"
                                                alt="Avatar" />
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-1.5 sm:gap-2">
                                            <div class="font-black text-xs sm:text-sm text-base-content">{{
                                                $payment->session?->mentor?->name ?? 'N/A' }}</div>
                                            <div
                                                class="badge badge-accent badge-sm font-bold text-[9px] sm:text-[10px] shadow-sm uppercase tracking-wider px-1.5">
                                                {{ $payment->method->value }}</div>
                                        </div>
                                        <div class="text-[10px] sm:text-xs font-bold text-base-content/60">{{ $payment->paid_at ?
                                            $payment->paid_at->format('d M, Y') : $payment->created_at->format('d M, Y')
                                            }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-black text-sm sm:text-lg text-secondary drop-shadow-sm">৳{{
                                        number_format($payment->amount, 0) }}</div>
                                    <div class="text-[9px] sm:text-[10px] font-black uppercase tracking-widest text-success mt-0.5">{{
                                        $payment->status->value === 'completed' ? 'PAID' :
                                        strtoupper($payment->status->value) }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ═══ 5. The Chart (Col 1-12) ═══ --}}
            <div class="col-span-12">
                @include('dashboard.student-spending-chart')
            </div>

        </div>
    </div>
    </div>
</x-layout>