@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Edit {{$patient->first_name}} {{$patient->last_name}}</h1>
    </a>
</header>
<main class="bg-custom-901 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">

    <section class="">
        <form action="/patient/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h1 class="text-black font-bold">I. Patient Information</h1>
            <div class="mb-6 pt-3 rounded">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    First Name
                </label>
                <input type="text" name="first_name" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{$patient->first_name}}>
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
                <input type="text" name="last_name" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{$patient->last_name}}>
                @error('last_name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="specialist" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Specialist
                </label>
                <input type="text" name="specialist" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ $patient->specialist }}">
                @error('specialist')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>     
            <div class="mb-6 pt-3 rounded">
                <label for="admission_type" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                   Admission Type
                </label>
                <select name="admission_type" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3">
                    <option value="Inpatient" @if($patient->admission_type == 'Inpatient') selected @endif>Inpatient</option>
                    <option value="Outpatient" @if($patient->admission_type == 'Outpatient') selected @endif>Outpatient</option>
                </select>
                @error('admission_type')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
                   
            <div class="mb-6 pt-3 rounded">
                <label for="room_number" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                   Room Number
                </label>
                <input type="number" name="room_number" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{$patient->room_number}}>
                @error('room_number')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="created_at" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Admission Date
                </label>
                <input type="text" name="created_at" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{$patient->created_at}}>
                @error('created_at')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="discharge_date" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Discharge Date
                </label>
                <input type="text" name="discharge_date" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value={{$patient->discharge_date}}>
                @error('discharge_date')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <label for="complete_history" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                    Complete History
                </label>
                <input type="text" name="complete_history" class="bg-custom-52 rounded w-full text-gray-700 focus:outline-none border border-gray-400 px-3" value="{{ optional($patient->medicalHistory)->complete_history }}">
                @error('complete_history')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            
            <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
        </form>
        <form action="/patient/{{$patient->patient_id}}" method="POST">
            @method('delete')
            @csrf 
            <button type="submit" class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Delete</button>
        </form>
    </section>

</main>
@include('partials.footer ')
