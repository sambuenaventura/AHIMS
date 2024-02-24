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
        <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
            @csrf
                        <!-- Overlay for selecting inpatient or outpatient -->
                        <div id="patientOptionsOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10000; display: flex; justify-content: center; align-items: center;">
                            <div id="patientOptions" style="background-color: white; padding: 20px; border-radius: 10px;">
                                <label>
                                    <input type="radio" name="admission_type" value="Inpatient"> Inpatient
                                </label>
                                <label>
                                    <input type="radio" name="admission_type" value="Outpatient"> Outpatient
                                </label>
                                <button type="button" onclick="validateAndSubmit()">Proceed</button>
                                <p id="error-message" style="color: red; display: none;">Please select either inpatient or outpatient.</p>
                            </div>
                        </div>
                        <div class="hero-content">
                            <div class="">
                                <div class="card shadow">
                                    <div class="card-body m-3">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="text-success">I. Patient Information</h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                                
                                                
                                                

                                                <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">
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
                                                        <input type="text" id="pic_first_name" name="pic_first_name" value="{{ old('pic_first_name') }}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                        <input type="text" id="pic_last_name" name="pic_last_name" value="{{ old('pic_last_name') }}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                                <input type="text" id="pic_contact_number" name="pic_contact_number" value="{{ old('pic_contact_number') }}" class="form-control my-3 py-3" placeholder="Contact Number" aria-label="First name">
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
                                                        <input type="text" id="ap_first_name" name="ap_first_name" value="{{ old('ap_first_name') }}" class="form-control py-3 bg-light" placeholder="First Name" aria-label="First Name">
                                                        <input type="text" id="ap_last_name" name="ap_last_name" value="{{ old('ap_last_name') }}" class="form-control py-3 bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                                     {{-- <div class="input-group mb-3">
                                                        <input type="text" id="specialist" name="specialist" value="{{ old('specialist') }}" class="form-control py-3 bg-light" placeholder="Specialist" aria-label="Specialist">
                                                    </div>
                                                    <div class="input-group">
                                                        @error('specialist')
                                                            <div class="mr-40">
                                                                <p class="text-red-500 text-xs p-1">
                                                                    {{ $message }}
                                                                </p>
                                                            </div>
                                                        @enderror
                                                    </div>                       --}}
                                                    <div class="input-group mb-3">
                                                        <select id="specialist" name="specialist" class="form-select py-3 bg-light" placeholder="Specialist" aria-label="Specialist">
                                                            <option value="">Select Specialist</option>
                                                            @foreach ($physicians as $physician)
                                                            <option value="{{ $physician->phy_first_name }} {{ $physician->phy_last_name }}">Dr. {{ $physician->phy_first_name }} {{ $physician->phy_last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        @error('specialist')
                                                            <div class="mr-40">
                                                                <p class="text-red-500 text-xs p-1">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>

                                                    {{-- <div class="input-group mb-3">
                                                        <select id="specialist" name="specialist" class="form-control py-3 bg-light">
                                                            <option value="">Select Specialist</option> 
                                                            @foreach($physicians as $physician)
                                                                <option value="{{ $physician->physician_id }}" {{ old('specialist') == $physician->physician_id ? 'selected' : '' }}>
                                                                    {{ $physician->phy_first_name }} {{ $physician->phy_last_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        @error('specialist')
                                                            <div class="mr-40">
                                                                <p class="text-red-500 text-xs p-1">
                                                                    {{ $message }}
                                                                </p>
                                                            </div>
                                                        @enderror
                                                    </div> --}}
                                                    
                                                
                                       
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="col">
                                            <h6 class="text-success">ㅤ</h6>
                                            <div class="row g-3 align-items-end">
                                                <div class="col">
                                                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control py-3" placeholder="Birth Date" aria-label="Birth Date">
                                                </div>
                                                
                                                <div class="col">
                                                    <input type="number" id="age" name="age" class="form-control py-3" placeholder="Age" aria-label="Age" readonly>
                                                </div>
                                                
                                                <div class="col">
                                                    <select name="gender" class="form-control py-3" placeholder="Gender" aria-label="Age">
                                                        <option value="" {{old('gender') == "" ? 'selected' : ''}} disabled>Sex</option>
                                                        <option value="Male" {{old('gender') == "Male" ? 'selected' : ''}}>Male</option>
                                                        <option value="Female" {{old('gender') == "Female" ? 'selected' : ''}}>Female</option>
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

                                            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control my-3 py-3" placeholder="Address" aria-label="Address">
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
                                            <input type="text" id="pic_relation" name="pic_relation" value="{{ old('pic_relation') }}" class="form-control mb-3 py-3" placeholder="Relation to Patient" aria-label="Relation to Patient">
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
                                            <input type="text" id="ap_contact_number" name="ap_contact_number" value="{{ old('ap_contact_number') }}" class="form-control py-3" placeholder="Contact Number" aria-label="Contact Number">
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



                                            <div class="buttons mt-4 float-end">
                                                <a href="{{ route('admission.index') }}" class="btn btn-light">Cancel</a>

                                  
                                                <button type="submit" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                  Submit
                                                </button>
                                              </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        
        {{-- <button type="submit" class="bg-custom-50 hover:bg-custom-50-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit"></button>     --}}
        </form>
    </section>
</main>
<script>

document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.hospital-number-checkbox');
    const assignedRooms = {!! json_encode($assignedRooms) !!};

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Uncheck all checkboxes except the current one
            checkboxes.forEach(cb => {
                if (cb !== checkbox) {
                    cb.checked = false;
                    cb.nextElementSibling.nextElementSibling.classList.add('hidden'); // Hide the checkmark
                    cb.parentNode.classList.remove('bg-custom-150'); // Remove highlight from previously selected boxes
                }
            });

            // Toggle background color based on checkbox state
            checkbox.parentNode.classList.toggle('bg-custom-150', checkbox.checked);

            // Show checkmark if checkbox is checked
            if (checkbox.checked) {
                checkbox.nextElementSibling.nextElementSibling.classList.remove('hidden');
            } else {
                checkbox.nextElementSibling.nextElementSibling.classList.add('hidden');
            }
        });

        // Disable checkboxes for assigned rooms and change background color
        if (assignedRooms.includes(parseInt(checkbox.value))) {
            checkbox.disabled = true;
            checkbox.parentNode.classList.add('bg-custom-50');
        }
    });
});
function validateAndSubmit() {
        var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]').checked;
        var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]').checked;

        if (!inpatientChecked && !outpatientChecked) {
            document.getElementById("error-message").style.display = "block";
            return;
        }

        document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal if validation passes
        document.getElementById("patientForm").submit(); // Submit the form
    }

    document.addEventListener('DOMContentLoaded', function() {
        const dateOfBirthInput = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        dateOfBirthInput.addEventListener('change', function() {
            console.log('Date of birth changed');

            // Get the selected date of birth
            const dob = new Date(this.value);
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
        });
    });
</script>
@include('partials.footer ')
