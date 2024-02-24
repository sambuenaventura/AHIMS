@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Add Patient</h1>
    </a>
</header>
<main class="bg-custom-901 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">

    <section class="">
        <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
            @csrf
            <h1 class="text-black font-bold">I. Patient Information</h1>
            <div class="mb-6 pt-3 rounded">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    First Name
                </label>
                <input type="text" name="first_name" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('first_name') }}">
                @error('first_name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Last Name
                </label>
                <input type="text" name="last_name" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{old('last_name')}}>
                @error('last_name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Age
                </label>
                <input type="number" name="age" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{old('age')}}>
                @error('age')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Gender
                </label>
                <select name="gender" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3">
                    <option value="" {{old('gender') == "" ? 'selected' : ''}}></option>
                    <option value="Male" {{old('gender') == "Male" ? 'selected' : ''}}>Male</option>
                    <option value="Female" {{old('gender') == "Female" ? 'selected' : ''}}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="contact_number" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Contact Number
                </label>
                <input type="text" name="contact_number" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('contact_number') }}">
                @error('contact_number')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            
            <div class="mb-6 pt-3 rounded">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Address
                </label>
                <input type="text" name="address" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('address') }}">
                @error('address')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <h1 class="text-black font-bold">II. Medical History</h1>
            <div class="mb-6 pt-3 rounded">
                <label for="past_conditions" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Past Conditions
                </label>
                <input type="text" name="past_conditions" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('past_conditions') }}">
                @error('past_conditions')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="surgical_procedures" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Surgical Procedures
                </label>
                <input type="text" name="surgical_procedures" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('surgical_procedures') }}">
                @error('surgical_procedures')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="allergies" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Allergies
                </label>
                <input type="text" name="allergies" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('allergies') }}">
                @error('allergies')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <h1 class="text-black font-bold">III. Current Medications</h1>
            <div class="mb-6 pt-3 rounded">
                <label for="medication_and_dosage" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                   Name of Medication and Dosage
                </label>
                <textarea name="medication_and_dosage" class="bg-custom-52 rounded h-32 w-full resize-none text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('medication_and_dosage') }}"></textarea>
                @error('medication_and_dosage')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="frequency" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Frequency
                </label>
                <input type="text" name="frequency" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('frequency') }}">
                @error('frequency')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="prescribing_physician" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Prescribing Physician
                </label>
                <input type="text" name="prescribing_physician" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ old('prescribing_physician') }}">
                @error('prescribing_physician')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="bg-custom-50 hover:bg-custom-50-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Add New</button>
        </form>
    </section>
</main>
@include('partials.footer ')
