<x-layout>
    <div class="my-10 flex items-center justify-center p-3">

        <form action="{{ route('update_profile') }}" method="POST">
            @csrf
            @method('PUT')

            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-xl text-info">প্রোফাইল আপডেট করুন</legend>

                <label class="label">নাম</label>
                <input type="text" name="name" class="input input-info" placeholder="সম্পূর্ণ নাম দিন"
                    value="{{ old('name', Auth::user()->name) }}" />

                <label class="label">জন্ম তারিখ</label>
                <input type="date" name="date_of_birth" class="input input-info" placeholder="জন্ম তারিখ দিন"
                    value="{{ old('date_of_birth', Auth::user()->profile?->date_of_birth) }}" />


                <label class="label">ফোন</label>
                <input type="tel" name="phone" class="input input-info" placeholder="মোবাইল নম্বর দিন"
                    value="{{ old('phone', Auth::user()->profile?->phone) }}" />

                <label class="label">ঠিকানা</label>
                <textarea placeholder="সম্পূর্ণ ঠিকানা দিন" class="textarea textarea-info" name="address">{{ old('address', Auth::user()->profile?->address) }}</textarea>

                <label class="label">বায়ো</label>
                <textarea placeholder="নিজের সম্পর্কে অল্প শব্দে কিছু লিখুন" class="textarea textarea-info" name="bio">{{ old('bio', Auth::user()->profile?->bio) }}</textarea>

                <label class="label">শিক্ষাগত যোগ্যতা</label>
                <input type="text" name="highgest_education_level" class="input input-info"
                    placeholder="সর্বোচ্চ শিক্ষাগত যোগ্যতা যোগ করুন"
                    value="{{ old('highgest_education_level', Auth::user()->profile?->highgest_education_level) }}" />

                <label class="label">দক্ষতাসমূহ</label>
                <textarea placeholder="(কমা সহকারে) পারদর্শী বিষয়গুলো যোগ করুন (যেমন - Compiler Design, Algorithm)" class="textarea textarea-info" name="skills">{{ old('skills', Auth::user()->profile?->skills) }}</textarea>

                <label class="label">শিক্ষাপ্রতিষ্ঠানের নাম</label>
                <input type="text" name="institution_name" class="input input-info"
                    placeholder="শিক্ষাপ্রতিষ্ঠানের নাম যোগ করুন"
                    value="{{ old('institution_name', Auth::user()->profile?->institution_name) }}" />

                <label class="label">ঘন্টা প্রতি চার্জ (৳)</label>
                <input type="num" name="hourly_rate" class="input input-info" placeholder="ঘন্টা প্রতি চার্জ এন্ট্রি দিন"
                    value="{{ old('highgest_education_level', Auth::user()->profile?->hourly_rate) }}" />


                <button class="btn btn-soft btn-info mt-4" type="submit">আপডেট করুন</button>

                <a class="mt-3 font-semibold text-center text-secondary text-md fw-bold"
                    href="{{ route('mentors') }}">বাতিল করুন</a>

            </fieldset>
        </form>
    </div>
</x-layout>
