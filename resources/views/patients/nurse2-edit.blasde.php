@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
{{-- <header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Edit {{$patient->first_name}} {{$patient->last_name}}</h1>
    </a>
</header> --}}
{{-- <main class="bg-custom-901 flex max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1"> --}}
        {{-- <section class="bg-custom-901">
            <form action="/patient/{{$patient->id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
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
    
                <button type="submit" class="bg-custom-50 hover:bg-custom-50 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
            </form>
            <form action="/patient/{{$patient->id}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Delete</button>
            </form>
        </section> --}}
        {{-- <section class="">
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
        </section> --}}

{{-- </main> --}}
<style>

    h1 {
        font-size: 1.6rem;
        font-weight: 700
    }
    h3 {
        font-size: 1rem;
        font-weight: 700
    }
    #hero {
    /* height: 100vh;*/
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    border: 1px dotted red;
    margin-top: 2rem;
    }

    .bg-card {
    background-color: #dceddd;
    }
    .flexi {
    display: flex;
    gap: 2rem;
    align-items: flex-start
}
    .flex-col {
    display: flex;
    flex-direction: column;
    }
    .flex-only {
    display: flex;
    justify-content: space-between; /* Center items horizontally within the container */
    /* align-items: flex-start; */
    }
    .flex-col input[type="text"] {
    width: 40rem; /* Adjust the width as needed */
    padding: 8px;
    font-size: 16px;
    }
    #button {
    background-color: #dceddd;
    }
    label {
    display: inline-block;
    width: 250px; /* Adjust the width as needed for your layout */
    margin-bottom: 5px;
    }

    .hero-content {
    display: flex;
    /* align-items: center; */
    justify-content: center;
    width: 100%;
    max-width: 90rem;
    padding: 1.8rem 1.2rem;
    gap: 2.5rem;
    border: 1px dotted red;
    }
    .left {
    border: 1px dotted cyan;
    width: 40rem;
    height: 25rem;
    overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
    border: 1px dotted cyan;
    width: 100rem;
    height: auto;
    overflow: ; /* This prevents the child from overflowing */
}
.bg-card {
    padding: 2rem;
    border-radius: 25px;
}

</style>
<main class="bg-custom-901 mt-20">
    <section id="hero">
        <div class="hero-content">
        <div class="left">
            <div class="left-top bg-card">
            <div class="left-top-1">
                <h1>{{  $patient->first_name }} {{  $patient->last_name }}</h1>
                <h3>{{  $patient->patient_id }}</h3>
            </div>
            <div class="left-top-2 flexi">
                <p>{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</p>
                <p>{{  $patient->gender }}</p>
            </div>
            <div class="left-top-3 flexi">
                <p>Height</p>
                <p>Weight</p>
                <p>Blood</p>
            </div>
            </div>
            <div class="left-bottom">
            <div class="left-bottom-top">
                <h3>Patient Information</h3>
                <div class="flexi">
                <p>XXXX</p>
                <p>XXXX</p>
                </div>
            </div>
            <div class="left-bottom-bottom">
                <h3>Person In-charge Information</h3>
                <div class="flexi">
                <p>{{  $patient->pic_first_name }} {{  $patient->pic_last_name }}</p>
                </div>
                <div class="flexi">
                <p>{{  $patient->pic_relation }} {{  $patient->pic_contact_number }}</p>
                </div>
            </div>
            </div>
        </div>
        <div class="right">
            <div class="right-1">
            <div class="right-header">
                <div class="flex-only">
                    <h1>Patient Complete History</h1>
                    <a href="" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Edit</a>                
                </div>
            </div>
            <div class="right-content">
                <h3>Medical History</h3>
                <p>
                <label for="completeHistory">Complete History:</label>
                <input
                    type="text"
                    id="completeHistory"
                    name="completeHistory"
                />
                </p>
                <p>
                <label for="pastMedicalHistory">Past Medical History:</label>
                <input
                    type="text"
                    id="pastMedicalHistory"
                    name="pastMedicalHistory"
                />
                </p>
                <p>
                <label for="previousHistory">Previous History:</label>
                <input
                    type="text"
                    id="previousHistory"
                    name="previousHistory"
                />
                </p>
                <p>
                <label for="familyHistory">Family History:</label>
                <input type="text" id="familyHistory" name="familyHistory" />
                </p>
                <p>
                <label for="personalSocialHistory"
                    >Personal/Social History:</label
                >
                <input
                    type="text"
                    id="personalSocialHistory"
                    name="personalSocialHistory"
                />
                </p>
                <p>
                <label for="obstetricalHistory">For Obstetrical History:</label>
                <input
                    type="text"
                    id="obstetricalHistory"
                    name="obstetricalHistory"
                />
                </p>
                <p>
                <label for="pediatricMedicalHistory"
                    >Pediatric Medical History:</label
                >
                <input
                    type="text"
                    id="pediatricMedicalHistory"
                    name="pediatricMedicalHistory"
                />
                </p>
                <p>
                <label for="reviewOfSystems">Review of Systems:</label>
                <input
                    type="text"
                    id="reviewOfSystems"
                    name="reviewOfSystems"
                />
                </p>
                <p>
                <label for="clinicalImpression">Clinical Impression:</label>
                <input
                    type="text"
                    id="clinicalImpression"
                    name="clinicalImpression"
                />
                </p>
                <p>
                <label for="workUp">Work Up:</label>
                <input type="text" id="workUp" name="workUp" />
                </p>
                <h3>Medical History</h3>
                <p>
                <label for="medicationDosage"
                    >Name of Medication and Dosage:</label
                >
                <input
                    type="text"
                    id="medicationDosage"
                    name="medicationDosage"
                />
                </p>
                <div class="flexi">
                    <p>
                    <label for="frequency">Frequency:</label>
                    <input type="text" id="frequency" name="frequency" />
                    </p>
                    <p>
                    <label for="prescribingPhysician">Submitted by:</label>
                    <input
                        type="text"
                        id="prescribingPhysician"
                        name="prescribingPhysician"
                    />
                    </p>
                </div>
                <div class="flexi">
                    <p>
                    <label for="frequency">Prescribing Physician:</label>
                    <input type="text" id="frequency" name="frequency" />
                    </p>
                    <p>
                    <label for="prescribingPhysician">Date & Time:</label>
                    <input
                        type="text"
                        id="prescribingPhysician"
                        name="prescribingPhysician"
                    />
                    </p>
                </div>
            </div>
            </div>
            <div class="right-2">
            <div class="right-header">
                <div class="flex-only">
                <h1>Nurses Remarks</h1>
                <a href="" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Add Remark</a>                
            </div>
            </div>
            <div class="right-content">
                <h3>Vital Signs</h3>
                <p>
                <label for="temperature">Temperature:</label>
                <input type="text" id="temperature" name="temperature" />
                </p>
                <p>
                <label for="heartRate">Heart Rate:</label>
                <input type="text" id="heartRate" name="heartRate" />
                </p>
                <p>
                <label for="pulse">Pulse:</label>
                <input type="text" id="pulse" name="pulse" />
                </p>
                <p>
                <label for="bloodPressure">Blood Pressure:</label>
                <input type="text" id="bloodPressure" name="bloodPressure" />
                </p>
                <div class="flexi">
                    <p>
                    <label for="respiratoryRate">Respiratory Rate:</label>
                    <input
                        type="text"
                        id="respiratoryRate"
                        name="respiratoryRate"
                    />
                    </p>
                    <p>
                    <label for="Oxygen">Submitted by:</label>
                    <input type="text" id="Oxygen" name="Oxygen" />
                    </p>
                </div>
                <div class="flexi">
                    <p>
                    <label for="respiratoryRate">Oxygen:</label>
                    <input
                        type="text"
                        id="respiratoryRate"
                        name="respiratoryRate"
                    />
                    </p>
                    <p>
                    <label for="Oxygen">Date & Time:</label>
                    <input type="text" id="Oxygen" name="Oxygen" />
                    </p>
                </div>
                <p class="flex-col">
                <label for="medication">Medication:</label>
                <input type="text" id="medication" name="medication" />
                </p>
                <p class="flex-col">
                <label for="treatment">Treatment:</label>
                <input type="text" id="treatment" name="treatment" />
                </p>
                <p class="flex-col">
                <label for="dietaryInformation">Dietary Information:</label>
                <input
                    type="text"
                    id="dietaryInformation"
                    name="dietaryInformation"
                />
                </p>
                <p class="flex-col">
                <label for="notes">Notes:</label>
                <input type="text" id="notes" name="notes" />
                </p>
                <p>
                    <label for="respiratoryRate">Submitted by:</label>
                    <input
                        type="text"
                        id="respiratoryRate"
                        name="respiratoryRate"
                    />
                </p>
                <p>
                    <label for="Oxygen">Date & Shift:</label>
                    <input type="text" id="Oxygen" name="Oxygen" />
                </p>
            </div>
            </div>
            <div class="right-3">
            <div class="right-header">
                <div class="flex-only">
                <h1>Progress Notes</h1>
                <a href="" class="block py-2 pr-3 pl-3 bg-custom-50 rounded-lg text-white">Add Progress Notes</a>                
            </div>
            </div>
            <div class="right-content">
                <p class="flex-col">
                <label for="focus">Focus:</label>
                <input type="text" id="focus" name="focus" />
                </p>
                <p class="flex-col">
                <label for="notes">Notes:</label>
                <input type="text" id="notes" name="notes" />
                </p>
                <p>
                    <label for="respiratoryRate">Submitted by:</label>
                    <input
                        type="text"
                        id="respiratoryRate"
                        name="respiratoryRate"
                    />
                </p>
                <p>
                    <label for="Oxygen">Date & Time:</label>
                    <input type="text" id="Oxygen" name="Oxygen" />
                </p>
            </div>
            </div>
        </div>
        </div>
    </section>
</main>






@include('partials.footer ')
