<x-layout>
    <h1>{{ $user->name }}</h1>

    @if ($user->profile)
        <p>Phone: {{ $user->profile->phone }}</p>
        <p>Bio: {{ $user->profile->bio }}</p>
        <p>Address: {{ $user->profile->address }}</p>
    @endif

    @can('update', $user)
        <a href="{{ route('edit_profile') }}" class="btn btn-primary">
            Edit Profile
        </a>
    @endcan
</x-layout>
