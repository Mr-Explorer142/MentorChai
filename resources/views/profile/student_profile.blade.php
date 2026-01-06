<x-layout>
    <div class="flex flex-col justify-center items-center min-h-screen">
        <h1 class="text-2xl font-bold text-center">{{ $student->name }}</h1>
        <p>ID: {{ $student->id }}</p>
        @if ($student->profile)
            <p>Phone: {{ $student->profile->phone }}</p>
            <p>Bio: {{ $student->profile->bio }}</p>
            <p>Date Of Birth: {{ $student->profile->date_of_birth }}</p>
            <p>Address: {{ $student->profile->address }}</p>
            <p>Highest Education Level: {{ $student->profile->highgest_education_level }}</p>
            <p>Skills: {{ $student->profile->skills }}</p>
            <p>Institution Name: {{ $student->profile->institution_name }}</p>
            <p>Hourly Rate: {{ $student->profile->hourly_rate }}</p>


        @endif

        @if (auth()->id() === $student->id)
            <a href="{{ route('edit_profile', $student->id) }}" class="btn btn-active">Edit Profile</a>
        @endif
</x-layout>
</div>
