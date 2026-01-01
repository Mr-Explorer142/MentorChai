<x-layout>
    <div class="flex flex-col justify-center items-center min-h-screen">
        <h1 class="text-2xl font-bold text-center">Mentor Profile</h1>
        <p>ID: {{ $mentor->id }}</p>
        @if ($mentor->profile)
            <p>Phone: {{ $mentor->profile->phone }}</p>
            <p>Bio: {{ $mentor->profile->bio }}</p>
            <p>Date Of Birth: {{ $mentor->profile->date_of_birth }}</p>
            <p>Address: {{ $mentor->profile->address }}</p>
        @endif

        @if(auth()->id() === $mentor->id)
            <a href="{{ route('edit_profile', $mentor->id) }}" class="btn btn-active">Edit Profile</a>
        @endif
</x-layout>
</div>
