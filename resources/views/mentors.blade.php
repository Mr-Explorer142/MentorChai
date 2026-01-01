<x-layout>
    <div class="flex flex-col p-5 items-center min-h-screen">
        <div class="my-3">
            @if (session('success'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
        </div>

        <div>
            @forelse ($mentors as $mentor)
                <div class="card bg-base-100 sm:w-90 h-auto shadow-sm float-left border p-2">

                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $mentor->name }}
                        </h2>

                        <div class="flex gap-2">
                            <div class="badge badge-primary">DIU</div>
                            <div class="badge badge-secondary">৳100 p/h</div>
                            <div class="badge badge-warning">4.7★</div>
                        </div>

                        <p> I am FAANG Python develper with passionate teaching skills.
                        </p>
                        {{-- Badges --}}
                        <div class="card-actions justify-start my-3">
                            <div class="badge badge-outline badge-info">Python</div>
                            <div class="badge badge-outline badge-secondary">Django</div>
                            <div class="badge badge-outline badge-accent">Devops</div>
                            <div class="badge badge-outline badge-warning">Linux</div>
                        </div>
                        {{-- Buttons --}}
                        <div class="flex justify-end items-end gap-3">
                            <a href="{{ route('mentor_profile', $mentor->id) }}" class="btn btn-info btn-soft">See Profile</a>
                            <a class="justify-end btn btn-accent btn-soft">Hire</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No mentors found😢</p>
            @endforelse
        </div>
    </div>
</x-layout>
