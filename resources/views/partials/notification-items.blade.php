@forelse($notifications as $notification)
<div id="notification-{{ $notification->id }}" class="rounded-xl p-2 sm:p-2.5 border transition-colors duration-200
                {{ is_null($notification->read_at)
                    ? 'bg-teal-50/80 dark:bg-teal-900/25 border-[#28666e]/20 dark:border-[#4db6c1]/20'
                    : 'bg-[#f6fbfb] dark:bg-[#0f2430] border-[#28666e]/10 dark:border-[#4db6c1]/10' }}">

    <div class="flex items-start justify-between gap-1.5">
        <div class="flex-1 min-w-0">

            @php $type = $notification->data['type'] ?? ''; @endphp

            {{-- Color dot for unread notifications --}}
            <div class="flex items-center gap-1.5 mb-0.5">
                @if(is_null($notification->read_at))
                    @if($type === 'session_requested')
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 shrink-0" title="Unread"></span>
                    @elseif($type === 'session_approved')
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 shrink-0" title="Unread"></span>
                    @elseif($type === 'session_rejected')
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-400 shrink-0" title="Unread"></span>
                    @elseif($type === 'payment_received')
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-400 shrink-0" title="Unread"></span>
                    @else
                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400 shrink-0" title="Unread"></span>
                    @endif
                @endif

                @php
                    $message = e($notification->data['message'] ?? 'New Notification');
                    $studentName = e($notification->data['student_name'] ?? '');
                    $mentorName = e($notification->data['mentor_name'] ?? '');
                    $topic = e($notification->data['topic'] ?? '');

                    if ($studentName && str_contains($message, $studentName)) {
                        $message = str_replace($studentName, "<strong class='font-semibold text-[#033f63] dark:text-white'>{$studentName}</strong>", $message);
                    }
                    if ($mentorName && str_contains($message, $mentorName)) {
                        $message = str_replace($mentorName, "<strong class='font-semibold text-[#033f63] dark:text-white'>{$mentorName}</strong>", $message);
                    }
                    if ($topic && str_contains($message, $topic)) {
                        $message = str_replace($topic, "<strong class='font-semibold text-[#033f63] dark:text-white'>{$topic}</strong>", $message);
                    }
                @endphp
                <p class="text-xs text-[#033f63] dark:text-[#d2f1ff] leading-tight">
                    {!! $message !!}
                </p>
            </div>

            {{-- Student's Note and Learning Style for Session Requests --}}
            @if($type === 'session_requested')
            @if(!empty($notification->data['note']))
            <div
                class="mt-1 mb-1 p-1.5 rounded-md bg-teal-500/5 border border-teal-500/10 text-[10px] leading-snug text-[#033f63]/80 dark:text-[#7ec8e3]/80">
                <strong class="text-[#033f63] dark:text-[#7ec8e3]">Note:</strong> {{
                \Illuminate\Support\Str::limit($notification->data['note'], 60) }}
            </div>
            @endif

            @php
            $ls = $notification->data['learning_style'] ?? null;
            $pm = $notification->data['preferred_teaching_medium'] ?? null;
            $pl = $notification->data['preferred_language'] ?? null;
            if((!$ls || !$pm || !$pl) && isset($notification->data['student_id'])) {
            $studentProfile = \App\Models\Profile::where('user_id', $notification->data['student_id'])->first();
            if ($studentProfile) {
            $ls = $ls ?: $studentProfile->learning_style;
            $pm = $pm ?: $studentProfile->preferred_teaching_medium;
            $pl = $pl ?: $studentProfile->preferred_language;
            }
            }
            @endphp
            @if(!empty($pm) || !empty($pl))
            <div
                class="mt-1 mb-1 p-1.5 rounded-md bg-teal-500/5 border border-teal-500/10 text-[10px] leading-snug text-[#033f63]/80 dark:text-[#7ec8e3]/80 space-y-0.5">
                @if(!empty($pm))<div><strong class="text-[#033f63] dark:text-[#7ec8e3]">Medium:</strong> {{ $pm }}</div>
                @endif
                @if(!empty($pl))<div><strong class="text-[#033f63] dark:text-[#7ec8e3]">Language:</strong> {{ $pl }}</div>
                @endif
            </div>
            @endif
            @if(!empty($ls))
            <div
                class="mt-1 mb-1 p-1.5 rounded-md bg-teal-500/5 border border-teal-500/10 text-[10px] leading-snug text-[#033f63]/80 dark:text-[#7ec8e3]/80">
                <strong class="text-[#033f63] dark:text-[#7ec8e3]">Learning Style:</strong> {{
                \Illuminate\Support\Str::limit($ls, 70) }}
            </div>
            @endif
            @endif

            {{-- Student: Pay button for approved sessions --}}
            @if($type === 'session_approved')
            @php
                $sessionId = $notification->data['session_id'] ?? null;
                if (!$sessionId && !empty($notification->data['checkout_url'])) {
                    $sessionId = (int) \Illuminate\Support\Str::afterLast($notification->data['checkout_url'], '/checkout/');
                }

                $canPay = false;
                $payUrl = null;

                if ($sessionId) {
                    $sessionTopic = \App\Models\SessionTopic::find($sessionId);
                    if ($sessionTopic && $sessionTopic->status === \App\Enums\SessionStatus::Approved) {
                        $alreadyPaid = \App\Models\MentoringSession::where('topic_id', $sessionTopic->id)
                            ->where(function ($q) {
                                $q->whereIn('status', [
                                    \App\Enums\SessionStatus::Ongoing,
                                    \App\Enums\SessionStatus::Completed,
                                    \App\Enums\SessionStatus::EndedByAdmin
                                ])->orWhereHas('payment', function ($pq) {
                                    $pq->where('status', \App\Enums\PaymentStatus::Paid);
                                });
                            })->exists();

                        if (!$alreadyPaid) {
                            $canPay = true;
                            $payUrl = route('checkout', $sessionTopic->id, false);
                        }
                    }
                }
            @endphp
            @if($canPay && $payUrl)
            <a href="{{ $payUrl }}" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-0.5 mt-0.5 text-[11px] font-semibold text-teal-600 dark:text-teal-400 hover:underline">
                Pay Now &rarr;
            </a>
            @else
            <button type="button" onclick="showNotificationModal('Payment for this session has already been completed.')" class="inline-flex items-center gap-0.5 mt-0.5 text-[11px] font-semibold text-emerald-600 dark:text-emerald-400 opacity-80 cursor-pointer">
                Paid ✓
            </button>
            @endif
            @endif

            {{-- Mentor: Approve / Reject buttons for session requests --}}
            @if($type === 'session_requested')
            @php
                $reqSessionId = $notification->data['session_id'] ?? null;
                $reqTopic = $reqSessionId ? \App\Models\SessionTopic::find($reqSessionId) : null;
                $canAction = $reqTopic && $reqTopic->status === \App\Enums\SessionStatus::Pending;
            @endphp
            @if($canAction && $reqSessionId)
            <div class="flex items-center gap-1.5 mt-0.5">
                <form method="POST" action="{{ route('session.approve', $reqSessionId) }}" class="inline-flex">
                    @csrf
                    <button type="submit" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 text-[11px] font-semibold
                                           text-white bg-teal-600 dark:bg-teal-500
                                           px-2.5 py-0.5 rounded-md
                                           hover:bg-teal-700 dark:hover:bg-teal-400
                                           transition-colors duration-200 cursor-pointer">
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Approve
                    </button>
                </form>
                <form method="POST" action="{{ route('session.reject', $reqSessionId) }}" class="inline-flex">
                    @csrf
                    <button type="submit" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 text-[11px] font-semibold
                                           text-white bg-rose-600 dark:bg-rose-500
                                           px-2.5 py-0.5 rounded-md
                                           hover:bg-rose-700 dark:hover:bg-rose-400
                                           transition-colors duration-200 cursor-pointer">
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                </form>
            </div>
            @else
            @if($reqTopic && $reqTopic->status === \App\Enums\SessionStatus::Rejected)
            <button type="button" onclick="showNotificationModal('This session request has been declined.')" class="inline-flex items-center gap-1 mt-0.5 text-[11px] font-semibold text-rose-600 dark:text-rose-400 opacity-80 cursor-pointer">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Declined ✗
            </button>
            @else
            <button type="button" onclick="showNotificationModal('This session request has already been processed.')" class="inline-flex items-center gap-1 mt-0.5 text-[11px] font-semibold text-emerald-600 dark:text-emerald-400 opacity-80 cursor-pointer">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Approved ✓
            </button>
            @endif
            @endif
            @endif

            {{-- Mentor + Student: Join session button for payment_received --}}
            @if($type === 'payment_received')
            @php
                $msId = $notification->data['session_id'] ?? null;
                $roomCode = $notification->data['session_code'] ?? null;
                if (!$roomCode && !empty($notification->data['room_url'])) {
                    $roomCode = \Illuminate\Support\Str::afterLast($notification->data['room_url'], 'room=');
                }

                $mSession = null;
                if ($msId) {
                    $mSession = \App\Models\MentoringSession::find($msId);
                } elseif ($roomCode) {
                    $mSession = \App\Models\MentoringSession::where('session_code', $roomCode)->first();
                }

                $canJoin = false;
                if ($mSession) {
                    $canJoin = ($mSession->status === \App\Enums\SessionStatus::Ongoing || $mSession->status === \App\Enums\SessionStatus::Pending)
                        && is_null($mSession->ended_at);
                } else {
                    $canJoin = !empty($notification->data['room_url']) && $notification->created_at->diffInHours(now()) < 12;
                }
            @endphp
            @if($canJoin && !empty($notification->data['room_url']))
            <a href="{{ $notification->data['room_url'] }}" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 mt-0.5 text-[11px] font-semibold
                                   text-white bg-teal-600 dark:bg-teal-500
                                   px-2.5 py-0.5 rounded-md
                                   hover:bg-teal-700 dark:hover:bg-teal-400
                                   transition-colors duration-200">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                </svg>
                Join Session
            </a>
            @else
            <button type="button" onclick="showNotificationModal('This live session has already ended.')" class="inline-flex items-center gap-1 mt-0.5 text-[11px] font-semibold text-gray-400 dark:text-gray-500 opacity-80 cursor-pointer">
                Session Ended
            </button>
            @endif
            @endif

            <p class="text-[10px] text-[#28666e]/50 dark:text-[#7ec8e3]/60 mt-0.5">
                {{ $notification->created_at->diffForHumans() }}
            </p>
        </div>

        {{-- Mark single as read button --}}
        @if(is_null($notification->read_at))
        <button onclick="markAsRead('{{ $notification->id }}')" class="shrink-0 w-4 h-4 rounded-full
                                bg-teal-100 dark:bg-teal-900/40
                                hover:bg-teal-200 dark:hover:bg-teal-800
                                flex items-center justify-center
                                transition-colors duration-150" title="Mark as read">
            <svg class="w-2.5 h-2.5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="2.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </button>
        @endif
    </div>
</div>
@empty
<div class="text-center py-8">
    <svg class="w-10 h-10 mx-auto mb-2 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor"
        stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
    </svg>
    <p class="text-sm text-gray-400 dark:text-gray-500">No notifications found</p>
</div>
@endforelse