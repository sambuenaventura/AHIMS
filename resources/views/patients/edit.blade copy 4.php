@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>
    .hospital-number-picker label {
    position: relative;
}

.hospital-number-picker input[type="checkbox"] {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

.checkmark {
    fill: none;
    stroke: white;
    stroke-width: 3px;
}

.hospital-number-picker input[type="checkbox"]:checked + span + svg.checkmark {
    display: block;
}

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
    /* position: relative; */
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
    /* width: 40rem;  */
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
    input, select {
    border: 1px solid rgb(119, 119, 119);
    border-radius: 8px; /* Adjust the value for desired roundness */
    }

    .hero-content {
    /* align-items: center; */
    /* justify-content: center; */
    width: 100%;
    width: 90rem;
    padding: 1.8rem 1.2rem;
    gap: 2.5rem;
    border: 1px dotted red;
    }
    .left {
    border: 1px dotted cyan;
    width: 100rem;
    height: auto;
    /*overflow: hidden;  This prevents the child from overflowing */
    }
    .right {
    border: 1px dotted cyan;
    width: 40rem;
    height: auto;
    overflow: ; /* This prevents the child from overflowing */
}
.bg-card {
    padding: 2rem;
    border-radius: 25px;
}

</style>

{{-- <header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-black text-center pt-24">Add Patient</h1>
    </a>
</header> --}}
<main class="bg-custom-901 mt-20">

    <section id="hero">
        <form action="/patient/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="hero-content">
                    <div class="">
                        <div class="card shadow">
                            <div class="card-body m-3">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-success">I. Patient Information</h6>
                                            <div class="input-group mb-3">

                                                <input type="text" id="first_name" name="first_name" value="{{$patient->first_name}}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                <input type="text" id="last_name" name="last_name" value="{{$patient->last_name}}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
                                            </div>
                                            <div class="input-group">
                                                @error('first_name')
                                                    <div class="mr-40">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            
                                                @error('last_name')
                                                    <div class="">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>
                                        
                                        
                                        

                                        <input type="text" id="contact_number" name="contact_number" value="{{$patient->contact_number}}" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">
                                            <div class="input-group">
                                                @error('contact_number')
                                                    <div class="">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>
                                        <h6 class="text-success">II. Person In-charge Information</h6>
                                            <div class="input-group mb-3">
                                                <input type="text" id="pic_first_name" name="pic_first_name" value="{{$patient->pic_first_name}}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                <input type="text" id="pic_last_name" name="pic_last_name" value="{{$patient->pic_last_name}}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
                                            </div>
                                            <div class="input-group">
                                                @error('pic_first_name')
                                                    <div class="mr-40">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            
                                                @error('pic_last_name')
                                                    <div class="">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>
                                        <input type="text" id="pic_contact_number" name="pic_contact_number" value="{{$patient->pic_contact_number}}" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">
                                            <div class="input-group">
                                                @error('pic_contact_number')
                                                    <div class="">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>                                                                    
                                        <h6 class="text-success">III. Admit Person Information</h6>
                                            <div class="input-group mb-3">
                                                <input type="text" id="ap_first_name" name="ap_first_name" value="{{$patient->ap_first_name}}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                <input type="text" id="ap_last_name" name="ap_last_name" value="{{$patient->ap_last_name}}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
                                            </div>
                                            <div class="input-group">
                                                @error('ap_first_name')
                                                    <div class="mr-40">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            
                                                @error('ap_last_name')
                                                    <div class="">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>
                                                    
                                        <h6 class="text-success">IV. Attending Physician</h6>
                                        <div class="input-group mb-3 position-relative">
                                            <input type="text" id="specialist" name="specialist" value="{{$patient->specialist}}" class="form-control py-3 bg-light" placeholder=" " aria-label="Specialist">
                                            <label for="specialist" class="position-absolute top-0 start-0 px-2" style="font-size: 0.75rem;">Specialist</label>
                                        </div>
                                        
                                            <div class="input-group">
                                                @error('specialist')
                                                    <div class="mr-40">
                                                        <p class="text-red-500 text-xs p-1">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                                @enderror

                                            </div>                        
                                    </div>
                                        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="col">
                                    <h6 class="text-success">ㅤ</h6>
                                    <div class="row g-3 align-items-end">
                                        <div class="col">
                                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{$patient->date_of_birth}}" class="form-control py-3" placeholder="Birth Date" aria-label="Birth Date">
                                        </div>
                                        
                                        <div class="col">
                                            <input type="number" id="age" name="age" class="form-control py-3" placeholder="Age" aria-label="Age" readonly>
                                        </div>
                                        
                                        <div class="col">
                                            <select name="gender" class="form-control py-3" placeholder="Gender" aria-label="Age">
                                                <option value="" {{ old('gender', $patient->gender) == "" ? 'selected' : '' }} disabled>Sex</option>
                                                <option value="Male" {{ old('gender', $patient->gender) == "Male" ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender', $patient->gender) == "Female" ? 'selected' : '' }}>Female</option>
                                            </select>  

                                        </div>
                                        <div class="input-group">
                                            @error('date_of_birth')
                                                <div class="ml-2 mr-64">
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                            @error('gender')
                                                <div class="">
                                                    <p class="text-red-500 text-xs p-1">
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </div>    
                                    </div>

                                    <input type="text" id="address" name="address" value="{{$patient->address}}" class="form-control my-3 py-3" placeholder="Address" aria-label="Address">
                                    <div class="input-group">
                                        @error('address')
                                            <div class="ml-2 mr-64">
                                                <p class="text-red-500 text-xs p-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div>
                                    <h6 class="text-success">ㅤ</h6>
                                    <input type="text" id="pic_relation" name="pic_relation" value="{{$patient->pic_relation}}" class="form-control mb-3 py-3" placeholder="Relation to Patient" aria-label="Relation to Patient">
                                    <div class="input-group">
                                        @error('pic_relation')
                                            <div class="ml-2">
                                                <p class="text-red-500 text-xs p-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="text" class="form-control my-3 py-3 invisible" placeholder="pic_relation" aria-label="Address">
                                    {{-- <div class="input-group ">
                                        @error('first_name')
                                            <div class="ml-2">
                                                <p class="text-red-500 text-xs p-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <h6 class="text-success">ㅤ</h6>
                                    <input type="text" id="ap_contact_number" name="ap_contact_number" value="{{$patient->ap_contact_number}}" class="form-control py-3" placeholder="Contact Number" aria-label="Contact Number">
                                    <div class="input-group">
                                        @error('ap_contact_number')
                                            <div class="ml-2">
                                                <p class="text-red-500 text-xs p-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div>
                                    <h6 class="text-success">ㅤ</h6>
                                    <input type="text" class="form-control my-4 py-3" placeholder="Room Number" aria-label="Room Number">
                                    
                                    <div class="input-group">
                                        {{-- @error('first_name')
                                            <div class="ml-2">
                                                <p class="text-red-500 text-xs p-1">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror --}}
                                    </div>








                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
                        
        <button type="submit" class="bg-custom-50 hover:bg-custom-50-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Add New</button>    
        </form>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateOfBirthInput = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        // Function to calculate age
        function calculateAge() {
            // Get the selected date of birth
            const dob = new Date(dateOfBirthInput.value);
            // Get the current date
            const today = new Date();
            // Calculate the age
            let age = today.getFullYear() - dob.getFullYear();
            // Adjust age if the birthday hasn't occurred yet this year
            if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                age--;
            }
            // Update the age input field
            ageInput.value = age;
        }

        // Calculate age on page load
        calculateAge();

        // Listen for changes in date of birth
        dateOfBirthInput.addEventListener('change', function() {
            console.log('Date of birth changed');
            // Recalculate age when date of birth changes
            calculateAge();
        });
    });

</script>
@include('partials.footer ')
