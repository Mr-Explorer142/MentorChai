@forelse($notifications as $notification)
<div id="notification-{{ $notification->id }}" class="rounded-2xl p-3 border transition-colors duration-200
                {{ is_null($notification->read_at)
                    ? 'bg-teal-50 dark:bg-teal-900/20 border-[#28666e]/20 dark:border-[#4db6c1]/20'
                    : 'bg-[#f6fbfb] dark:bg-[#0f2430] border-[#28666e]/10 dark:border-[#4db6c1]/10' }}">

    <div class="flex items-start justify-between gap-2">
        <div class="flex-1">

            @php $type = $notification->data['type'] ?? ''; @endphp

            {{-- Color dot by type --}}
            <div class="flex items-center gap-2 mb-1">
                @if($type === 'session_requested')
                <span class="w-2 h-2 rounded-full bg-amber-400 shrink-0"></span>
                @elseif($type === 'session_approved')
                <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                @elseif($type === 'payment_received')
                <span class="w-2 h-2 rounded-full bg-teal-400 shrink-0"></span>
                @else
                <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                @endif

                @php
                    $message = e($notification->data['message'] ?? 'New Notification');
                    $studentName = e($notification->data['student_name'] ?? '');
                    $mentorName = e($notification->data['mentor_name'] ?? '');
                    $topic = e($notification->data['topic'] ?? '');

                    if ($studentName && str_contains($message, $studentName)) {
                        $message = str_replace($studentName, "<strong>{$studentName}</strong>", $message);
                    }
                    if ($mentorName && str_contains($message, $mentorName)) {
                        $message = str_replace($mentorName, "<strong>{$mentorName}</strong>", $message);
                    }
                    if ($topic && str_contains($message, $topic)) {
                        $message = str_replace($topic, "<strong>{$topic}</strong>", $message);
                    }
                @endphp
                <p class="text-sm text-[#033f63] dark:text-[#d2f1ff] leading-snug">
                    {!! $message !!}
                </p>
            </div>

            {{-- Student's Note and Learning Style for Session Requests --}}
            @if($type === 'session_requested')
            @if(!empty($notification->data['note']))
            <div
                class="mt-2 mb-1.5 p-2 rounded-lg bg-teal-500/5 border border-teal-500/10 text-[11px] leading-relaxed text-[#033f63]/80 dark:text-[#7ec8e3]/80">
                <strong class="text-[#033f63] dark:text-[#7ec8e3]">Note:</strong> {{
                \Illuminate\Support\Str::limit($notification->data['note'], 80) }}
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
                class="mt-1.5 mb-1.5 p-2 rounded-lg bg-teal-500/5 border border-teal-500/10 text-[11px] leading-relaxed text-[#033f63]/80 dark:text-[#7ec8e3]/80 space-y-1">
                @if(!empty($pm))<div><strong class="text-[#033f63] dark:text-[#7ec8e3]">Medium:</strong> {{ $pm }}</div>
                @endif
                @if(!empty($pl))<div><strong class="text-[#033f63] dark:text-[#7ec8e3]">Language:</strong> {{ $pl }}</div>
                @endif
            </div>
            @endif
            @if(!empty($ls))
            <div
                class="mt-1.5 mb-2 p-2 rounded-lg bg-teal-500/5 border border-teal-500/10 text-[11px] leading-relaxed text-[#033f63]/80 dark:text-[#7ec8e3]/80">
                <strong class="text-[#033f63] dark:text-[#7ec8e3]">Learning Style:</strong> {{
                \Illuminate\Support\Str::limit($ls, 100) }}
            </div>
            @endif
            @endif

            {{-- Student: Pay button for approved sessions --}}
            @if($type === 'session_approved' &&
            isset($notification->data['checkout_url']))
            <a href="{{ $notification->data['checkout_url'] }}" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 mt-1 text-xs font-semibold
                                   text-teal-600 dark:text-teal-400 hover:underline">
                Pay Now &rarr;
            </a>
            @endif

            {{-- Mentor: Approve button for session requests --}}
            @if($type === 'session_requested' &&
            isset($notification->data['session_id']))
            <form method="POST" action="{{ route('session.approve', $notification->data['session_id']) }}" class="mt-1">
                @csrf
                <button type="submit" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 text-xs font-semibold
                                       text-white bg-teal-600 dark:bg-teal-500
                                       px-3 py-1 rounded-full
                                       hover:bg-teal-700 dark:hover:bg-teal-400
                                       transition-colors duration-200">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Approve
                </button>
            </form>
            @endif

            {{-- Mentor + Student: Join session button for payment_received --}}
            @if($type === 'payment_received' &&
            isset($notification->data['room_url']))
            <a href="{{ $notification->data['room_url'] }}" onclick="markAsRead('{{ $notification->id }}')" class="inline-flex items-center gap-1 mt-1 text-xs font-semibold
                                   text-white bg-teal-600 dark:bg-teal-500
                                   px-3 py-1 rounded-full
                                   hover:bg-teal-700 dark:hover:bg-teal-400
                                   transition-colors duration-200">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                </svg>
                Join Session
            </a>
            @endif

            <p class="text-xs text-[#28666e]/60 dark:text-[#7ec8e3]/70 mt-1">
                {{ $notification->created_at->diffForHumans() }}
            </p>
        </div>

        {{-- Mark single as read button --}}
        @if(is_null($notification->read_at))
        <button onclick="markAsRead('{{ $notification->id }}')" class="shrink-0 w-5 h-5 rounded-full
                               bg-teal-100 dark:bg-teal-900/40
                               hover:bg-teal-200 dark:hover:bg-teal-800
                               flex items-center justify-center
                               transition-colors duration-150" title="Mark as read">
            <svg class="w-3 h-3 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="2.5"
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