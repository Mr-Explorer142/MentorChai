<x-layout>
    <div class="my-10 flex items-center justify-center p-3">

        <form action="{{ route('update_profile') }}" method="POST">
            @csrf
            @method('PUT')

            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-xl text-info">Edit Profile</legend>

                <label class="label">Name</label>
                <input type="text" name="name" class="input input-info" placeholder="Name"
                    value="{{ old('name', Auth::user()->name) }}" />

                <label class="label">Date Of Birth</label>
                <input type="date" name="date_of_birth" class="input input-info" placeholder="Date Of Birth"
                    value="{{ old('date_of_birth', Auth::user()->profile?->date_of_birth) }}" />


                <label class="label">Phone</label>
                <input type="tel" name="phone" class="input input-info" placeholder="Phone"
                    value="{{ old('phone', Auth::user()->profile?->phone) }}" />

                <label class="label">Address</label>
                <textarea placeholder="Address" class="textarea textarea-info" name="address">{{ old('address', Auth::user()->profile?->address) }}</textarea>

                <label class="label">Bio</label>
                <textarea placeholder="Bio" class="textarea textarea-info" name="bio">{{ old('bio', Auth::user()->profile?->bio) }}</textarea>

                <label class="label">Highest Education Level</label>
                <input type="text" name="highgest_education_level" class="input input-info"
                    placeholder="Highest Education Level"
                    value="{{ old('highgest_education_level', Auth::user()->profile?->highgest_education_level) }}" />

                <label class="label">Skills</label>
                <textarea placeholder="Skills (e.g. Compiler Design, Algorithm)" class="textarea textarea-info" name="skills">{{ old('skills', Auth::user()->profile?->skills) }}</textarea>

                <label class="label">Institution Name</label>
                <input type="text" name="institution_name" class="input input-info"
                    placeholder="Last Institution Name"
                    value="{{ old('institution_name', Auth::user()->profile?->institution_name) }}" />

                <label class="label">Hourly Rate</label>
                <input type="num" name="hourly_rate" class="input input-info" placeholder="Hourly Rate"
                    value="{{ old('highgest_education_level', Auth::user()->profile?->hourly_rate) }}" />


                <button class="btn btn-soft btn-info mt-4" type="submit">Update</button>

                <a class="mt-3 font-semibold text-center text-secondary text-md fw-bold"
                    href="{{ route('mentors') }}">Cancel</a>

            </fieldset>
        </form>
    </div>
</x-layout>
