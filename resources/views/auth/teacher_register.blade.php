<x-layout>
    <div class="my-10 flex items-center justify-center p-3">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-xl text-success">মেন্টর একাউন্ট খুলুন</legend>

                <input type="hidden" name="role" value="mentor">


                <label class="font-semibold  label">সম্পূর্ণ নাম</label>
                <input type="text" name="name" class="input" placeholder="সম্পূর্ণ নাম দিন" />

                <label class="font-semibold  label">ই-মেইল</label>
                <input type="email" name="email" class="input" placeholder="ই-মেইল দিন" />

                <label class="font-semibold  label">পাসওয়ার্ড</label>
                <input type="password" name="password" class="input" placeholder="পাসওয়ার্ড দিন" />

                <label class="font-semibold  label">কনফার্ম পাসওয়ার্ড</label>
                <input type="password" name="password_confirmation" class="input" placeholder="পাসওয়ার্ড কনফার্ম করুন" />

                <button class="btn btn-success  mt-4" type="submit">Register</button>

                <a class="mt-3 text-center font-semibold text-md fw-bold" href="{{ route('student_register') }}">স্টুডেন্ট একাউন্ট খুলুন</a>

            </fieldset>
        </form>
    </div>
</x-layout>
