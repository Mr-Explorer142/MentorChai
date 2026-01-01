<x-layout>
    <div class="my-10 flex items-center justify-center p-3">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-xl text-success">Register as a Mentor</legend>

                <input type="hidden" name="role" value="mentor">


                <label class="label">Name</label>
                <input type="text" name="name" class="input" placeholder="Name" />

                <label class="label">Email</label>
                <input type="email" name="email" class="input" placeholder="Email" />

                <label class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Password" />

                <label class="label">Comfirm Password</label>
                <input type="password" name="password_confirmation" class="input" placeholder="Confirm Password" />

                <button class="btn btn-soft btn-success mt-4" type="submit">Register</button>

                <a class="mt-3 text-center text-success text-md fw-bold" href="{{ route('teacher_register') }}">Register
                    as a student</a>

            </fieldset>
        </form>
    </div>
</x-layout>
