<x-layout>
    <div
        class="min-h-screen p-3 sm:p-6 md:p-8 transition-colors duration-300 bg-gradient-to-br from-[#f0fafa] via-[#e8f7f6] to-[#f0fafa] dark:from-[#0f1f2e] dark:via-[#152a3b] dark:to-[#0f1f2e]">

        {{-- ── Page Header ── --}}
        <div class="mb-4 sm:mb-6">
            <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest mb-0.5 text-[#1A9998] dark:text-[#4db6c1]">Active Session</p>
            <h1 class="text-lg sm:text-2xl font-extrabold text-[#0d3d3d] dark:text-[#d2f1ff]">Live Mentoring Session</h1>
            <div class="flex items-center gap-2 mt-1.5 sm:mt-2">
                <span class="text-xs sm:text-sm font-semibold text-[#155665]/60 dark:text-[#7ec8e3]/60">Topic :</span>
                <span class="text-xs sm:text-sm font-bold px-2.5 py-0.5 rounded-full bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#155665] dark:text-[#7ec8e3] border border-[#1a9998]/20 dark:border-[#4db6c1]/20">
                    {{ $session->topic->topic }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6">

            {{-- ══════════ MAIN VIDEO AREA ══════════ --}}
            <div class="lg:col-span-8 space-y-4 sm:space-y-5">

                {{-- Live Video Card --}}
                <div class="bg-white dark:bg-[#1a2e3b] rounded-xl sm:rounded-2xl overflow-hidden shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15 shadow-[0_4px_20px_rgba(26,153,152,0.08)] dark:shadow-[0_4px_20px_rgba(0,0,0,0.3)]">

                    {{-- ZegoCloud mounts here --}}
                    <div id="zego-container" class="w-full h-[320px] sm:h-[480px] md:h-[520px] rounded-t-xl sm:rounded-t-2xl overflow-hidden"></div>

                    {{-- Session meta --}}
                    <div class="px-3.5 py-3 sm:px-5 sm:py-4 flex flex-wrap justify-between items-center gap-2 sm:gap-3">
                        <div>
                            <p class="font-bold text-xs sm:text-base text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->topic->topic }}</p>
                            <p class="text-[11px] sm:text-sm mt-0.5 text-[#155665]/60 dark:text-[#7ec8e3]/60">
                                Started at {{ $session->started_at?->format('h:i A') ?? 'Just now' }}
                            </p>
                        </div>
                        <span class="px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#1A9998] dark:text-[#4db6c1] border border-[#1a9998]/25 dark:border-[#4db6c1]/25">
                            {{ $roomId }}
                        </span>
                    </div>
                </div>

                {{-- Mentor Info --}}
                <div class="bg-white dark:bg-[#1a2e3b] rounded-xl sm:rounded-2xl px-3.5 py-3.5 sm:px-5 sm:py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <div class="flex flex-row sm:flex-row gap-3 sm:gap-4 items-center sm:items-start">
                        <div class="avatar placeholder shrink-0">
                            @if($session->mentor->profile?->avatar)
                                <img src="{{ asset('storage/' . $session->mentor->profile->avatar) }}"
                                    class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover" alt="{{ $session->mentor->name }}">
                            @else
                                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full font-bold text-base sm:text-2xl grid place-items-center text-white bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#155665]">
                                    {{ strtoupper(substr($session->mentor->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 text-left min-w-0">
                            <p class="font-bold text-sm sm:text-lg text-[#0d3d3d] dark:text-[#d2f1ff] truncate">{{ $session->mentor->name }}</p>
                            <p class="text-xs text-[#155665]/60 dark:text-[#7ec8e3]/60">Mentor</p>
                            @if($session->mentor->profile?->bio)
                                <p class="text-xs sm:text-sm mt-1 sm:mt-2 text-[#4a7070] dark:text-[#7ec8e3]/80 line-clamp-2">
                                    {{ Str::limit($session->mentor->profile->bio, 100) }}
                                </p>
                            @endif
                        </div>
                        <span class="px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-[#1a9998]/10 dark:bg-[#4db6c1]/10 text-[#1A9998] dark:text-[#4db6c1] border border-[#1a9998]/25 dark:border-[#4db6c1]/25 shrink-0">
                            Host
                        </span>
                    </div>
                </div>

            </div>

            {{-- ══════════ RIGHT SIDEBAR ══════════ --}}
            <div class="lg:col-span-4 space-y-4 sm:space-y-5">

                {{-- Session Details --}}
                <div class="bg-white dark:bg-[#1a2e3b] rounded-xl sm:rounded-2xl px-3.5 py-4 sm:px-5 sm:py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <h2 class="font-bold text-xs sm:text-sm mb-3 sm:mb-4 text-[#0d3d3d] dark:text-[#d2f1ff]">Session Details</h2>
                    <div class="space-y-2.5 sm:space-y-3 pt-3 sm:pt-4 border-t border-[#1a9998]/10 dark:border-[#4db6c1]/15">
                        <div class="flex items-start gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 pt-0.5 text-[#155665]/50 dark:text-[#7ec8e3]/50">Topic</span>
                            <span class="text-xs sm:text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{ $session->topic->topic }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Mentor</span>
                            <span class="text-xs sm:text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{ $session->mentor->name }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Student</span>
                            <span class="text-xs sm:text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">{{ $session->student->name }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Start</span>
                            <span class="text-xs sm:text-sm font-medium text-[#2d6e6e] dark:text-[#d2f1ff]">
                                {{ $session->started_at?->format('d M Y, h:i A') ?? 'Just now' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Room</span>
                            <span class="text-xs sm:text-sm font-mono text-[#1A9998] dark:text-[#4db6c1]">{{ $roomId }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] sm:text-xs font-bold w-16 sm:w-20 shrink-0 text-[#155665]/50 dark:text-[#7ec8e3]/50">Amount</span>
                            <span class="text-xs sm:text-sm font-bold text-[#2d6e6e] dark:text-[#d2f1ff]">৳{{ number_format($session->amount, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Participants --}}
                <div class="bg-white dark:bg-[#1a2e3b] rounded-xl sm:rounded-2xl px-3.5 py-4 sm:px-5 sm:py-5 shadow-sm transition-colors duration-300 border border-[#1a9998]/15 dark:border-[#4db6c1]/15">
                    <h2 class="font-bold text-xs sm:text-sm mb-3 sm:mb-4 text-[#0d3d3d] dark:text-[#d2f1ff]">Participants</h2>
                    <div class="space-y-2.5 sm:space-y-3">
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full grid place-items-center text-xs sm:text-sm font-bold text-white bg-gradient-to-br from-[#1A9998] to-[#155665] shrink-0">
                                {{ strtoupper(substr($session->mentor->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs sm:text-sm font-bold truncate text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->mentor->name }}</p>
                                <p class="text-[10px] sm:text-xs text-[#155665]/50 dark:text-[#7ec8e3]/50">Mentor · Host</p>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                        </div>
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full grid place-items-center text-xs sm:text-sm font-bold text-white bg-gradient-to-br from-[#155665] to-[#0d3d3d] shrink-0">
                                {{ strtoupper(substr($session->student->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs sm:text-sm font-bold truncate text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->student->name }}</p>
                                <p class="text-[10px] sm:text-xs text-[#155665]/50 dark:text-[#7ec8e3]/50">Student</p>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ══════════ REVIEW MODAL (student only, shown after leaving call) ══════════ --}}
    @if(auth()->id() === $session->student_id)
    <div id="reviewModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-3 sm:p-4"
        style="background: rgba(0,0,0,0.7); backdrop-filter: blur(6px);">

        <div class="w-full max-w-lg bg-white dark:bg-[#1a2e3b] rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden
                    border border-[#1a9998]/20 dark:border-[#4db6c1]/20
                    animate-fade-up">

            {{-- Top accent --}}
            <div class="h-1.5 bg-gradient-to-r from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#7ec8e3]"></div>

            <div class="p-4 sm:p-8">

                {{-- Header --}}
                <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0
                                bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#28666e]">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white dark:text-[#0f1f2e]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-xl font-bold text-[#0d3d3d] dark:text-[#d2f1ff]">How was the session?</h2>
                        <p class="text-xs sm:text-sm text-[#155665]/60 dark:text-[#7ec8e3]/60 mt-0.5">
                            Leave a review for {{ $session->mentor->name }}
                        </p>
                    </div>
                </div>

                {{-- Mentor strip --}}
                <div class="flex items-center gap-2.5 sm:gap-3 p-2.5 sm:p-3 rounded-xl sm:rounded-2xl mb-4 sm:mb-6
                            bg-[#f0fafa] dark:bg-[#0f2430]
                            border border-[#1a9998]/10 dark:border-[#4db6c1]/10">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden shrink-0">
                        @if($session->mentor->profile?->avatar)
                            <img src="{{ asset('storage/' . $session->mentor->profile->avatar) }}"
                                class="w-full h-full object-cover" alt="{{ $session->mentor->name }}">
                        @else
                            <div class="w-full h-full grid place-items-center font-bold text-white text-xs sm:text-sm
                                        bg-gradient-to-br from-[#1A9998] to-[#155665]">
                                {{ strtoupper(substr($session->mentor->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs sm:text-sm font-bold truncate text-[#0d3d3d] dark:text-[#d2f1ff]">{{ $session->mentor->name }}</p>
                        <p class="text-[10px] sm:text-xs truncate text-[#155665]/50 dark:text-[#7ec8e3]/50">{{ $session->topic->topic }}</p>
                    </div>
                </div>

                {{-- Review Form --}}
                <form method="POST" action="{{ route('session.review', $session) }}" id="reviewForm" class="space-y-4 sm:space-y-5">
                    @csrf

                    {{-- Star Rating --}}
                    <div>
                        <label class="block text-xs sm:text-sm font-bold mb-2 sm:mb-3 text-[#155665] dark:text-[#7ec8e3]">
                            Give a rating <span class="text-red-400">*</span>
                        </label>
                        <div class="flex items-center justify-center sm:justify-start gap-1.5 sm:gap-2" id="starRating">
                            @for($i = 1; $i <= 5; $i++)
                            <label class="cursor-pointer">
                                <input type="radio" name="rating" value="{{ $i }}" class="sr-only" required />
                                <svg class="w-8 h-8 sm:w-12 sm:h-14 transition-all duration-150
                                            text-gray-200 dark:text-gray-700 hover:scale-110 star-icon"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                                </svg>
                            </label>
                            @endfor
                        </div>
                        <p id="ratingLabel" class="text-xs sm:text-sm font-bold mt-1.5 sm:mt-2 h-5 text-center sm:text-left text-[#1A9998] dark:text-[#4db6c1]"></p>
                    </div>

                    {{-- Comment --}}
                    <div>
                        <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2 text-[#155665] dark:text-[#7ec8e3]">
                            Comment
                            <span class="font-normal text-[#155665]/50 dark:text-[#7ec8e3]/50">(Optional)</span>
                        </label>
                        <textarea
                            name="comment"
                            rows="3"
                            maxlength="1000"
                            placeholder="Write about your experience..."
                            class="w-full px-3.5 py-2.5 sm:px-4 sm:py-3 text-xs sm:text-sm rounded-xl sm:rounded-2xl resize-none focus:outline-none focus:ring-2 focus:ring-[#1a9998]/40
                                   bg-[#f7fdfd] dark:bg-[#122333]
                                   text-[#2d6e6e] dark:text-[#d2f1ff]
                                   border border-[#1a9998]/25 dark:border-[#4db6c1]/25
                                   placeholder:text-[#155665]/40 dark:placeholder:text-[#7ec8e3]/30
                                   transition-colors duration-200"></textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3 pt-1 sm:pt-2">
                        <button type="button" id="skipReviewBtn"
                            class="flex-1 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-semibold transition-all duration-200
                                   border border-[#1a9998]/30 dark:border-[#4db6c1]/30
                                   text-[#155665]/70 dark:text-[#7ec8e3]/70
                                   hover:bg-[#1a9998]/5 dark:hover:bg-[#4db6c1]/5">
                            Skip
                        </button>
                        <button type="submit"
                            class="flex-1 flex items-center justify-center gap-2 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-bold
                                   text-white dark:text-[#0f1f2e] transition-all duration-200 hover:-translate-y-0.5
                                   bg-gradient-to-br from-[#1A9998] to-[#155665] dark:from-[#4db6c1] dark:to-[#28666e]
                                   shadow-[0_4px_14px_rgba(26,153,152,0.35)]">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.376 2.454a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.376-2.454a1 1 0 00-1.176 0l-3.376 2.454c-.784.57-1.838-.197-1.539-1.118l1.285-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.287-3.967z" />
                            </svg>
                            Submit Review
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        // Star rating interaction
        const stars     = document.querySelectorAll('#starRating label');
        const inputs    = document.querySelectorAll('#starRating input');
        const ratingLbl = document.getElementById('ratingLabel');
        const labels    = ['', 'Very Bad 😞', 'Bad 😕', 'Okay 😐', 'Good 😊', 'Awesome! 🤩'];

        function paintStars(count) {
            stars.forEach((star, i) => {
                const svg = star.querySelector('svg');
                svg.classList.toggle('text-yellow-400', i < count);
                svg.classList.toggle('scale-110', i < count);
                svg.classList.toggle('text-gray-200', i >= count);
                svg.classList.toggle('dark:text-gray-700', i >= count);
            });
            ratingLbl.textContent = labels[count] || '';
        }

        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', () => paintStars(index + 1));
            star.addEventListener('mouseleave', () => {
                const checked = [...inputs].findIndex(i => i.checked);
                paintStars(checked >= 0 ? checked + 1 : 0);
            });
            star.addEventListener('click', () => {
                inputs[index].checked = true;
                paintStars(index + 1);
            });
        });

        // Skip → redirect to student dashboard
        document.getElementById('skipReviewBtn').addEventListener('click', () => {
            window.location.href = '/dashboard/student';
        });

        // After form submit → redirect to student dashboard
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            }).then(() => {
                window.location.href = '/dashboard/student';
            }).catch(() => {
                window.location.href = '/dashboard/student';
            });
        });
    </script>
    @endif

    <script>
        window.ZEGO_CONFIG = {
            appID:    {{ $appId }},
            appSign:  "{{ $appSign }}",
            roomID:   "mc-{{ $roomId }}",
            userID:   "{{ $userId }}",
            userName: "{{ $userName }}",
            userRole: "{{ $userRole }}",
        };
    </script>
    @vite(['resources/js/video-call.js'])
</x-layout>
