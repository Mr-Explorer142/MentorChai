<x-layout>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="my-10 flex items-center justify-center">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-xl text-primary">Login</legend>

                <label class="label">Email</label>
                <input type="email" name="email" class="input" placeholder="Email" />

                <label class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Password" />

                {{-- Remember Me --}}
                <label class="label mt-3">
                    <input type="checkbox" name="remember"  class="checkbox checkbox-primary" />
                    Remember me
                </label>

                <button class="btn btn-soft btn-primary mt-4" type="submit">Login</button>
            </fieldset>
        </div>
    </form>

    {{-- Errors --}}
    @if ($errors->any())
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
</x-layout>
