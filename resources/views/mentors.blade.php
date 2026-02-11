<x-layout>
    <div class="flex flex-col p-5 min-h-screen bg-base-200">
        {{-- Success Message --}}
        <div class="my-3">
            @if (session('success'))
            <div id="success-alert" role="alert"
                class="alert alert-success w-full max-w-2xl mx-auto transition-opacity duration-700 opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:ml-15">
            @forelse ($mentors as $mentor)
            <div class="card bg-base-100 w-auto h-auto shadow-sm border border-primary">
                <div class="card-body">
                    <div class="flex flex-col gap-3">
                        <div class="card-title">{{ $mentor->name }}</div>

                        <div class="flex flex-col gap-2">
                            <div class="font-semibold badge badge-secondary badge-dash">
                                {{ $mentor->profile->institution_name }}
                            </div>
                            <div class="badge badge-secondary">
                                {{ $mentor->profile->highgest_education_level }}
                            </div>
                        </div>

                        <div class="badge badge-warning">
                            ৳{{ $mentor->profile->hourly_rate }} p/h
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            @foreach (explode(',', $mentor->profile->skills) as $skill)
                            <span class="badge badge-primary">{{ trim($skill) }}</span>
                            @endforeach
                        </div>

                        <div class="flex gap-2 justify-end mt-3">
                            <a class="btn btn-primary btn-outline" href="{{ route('mentor_profile', $mentor->id) }}">
                                প্রোফাইল দেখুন
                            </a>
                            <a href="{{ route('checkout') }}" class="btn btn-secondary btn-outline">হায়ার করুন</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="m-5 flex justify-center items-center">No mentors found 😢</p>
            @endforelse
        </div>

</x-layout>