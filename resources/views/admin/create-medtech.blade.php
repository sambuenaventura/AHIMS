@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      background-color: #eee;
    }
  
    #admission {
      height: 100vh;
      display: flex;
      justify-content: center;
      /* background-color: #f8f8f8; */
      margin-left: 10rem;
    }
    .admission-content {
      /* display: flex; */
      /* align-items: center; */
      /* justify-content: center; */
      width: 100%;
      max-width: 100rem;
      padding: 1.8rem 1.2rem;
      gap: 3rem;
    }
    .boxes {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-template-rows: repeat(1, 1fr);
      grid-gap: 20px;
      justify-content: space-evenly;
    }
  
    .box {
      /* Add styling for the boxes as needed */
      padding: 20px;
    }
  
    #datePlaceholder {
      font-size: 0.9rem;
  
    }
  
    .boxes .box {
      border-radius: 10px;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      font-family: sans-serif;
      gap: 2rem;
    }
    .box1 {
      gap: 0 !important;
  
    }.smaller-label {
    font-size: 0.8rem; /* Adjust the font size as needed */
}

    .left {
      width: 50rem;
      height: 50rem;
      overflow: hidden; /* This prevents the child from overflowing */
    }
    .right {
      width: 170rem;
      height: 50rem;
      overflow: auto; /* This prevents the child from overflowing */
    }
    .personnel {
    }
    #patientOptionsOverlay {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(38, 77, 56, 0.8) !important; */
    background-color: rgb(23 73 46 / 56%) !important;
    z-index: 10000;
}
.label {
    display: flex;
    gap: 2rem;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.label-opt {
    display: flex;
    width: 12rem;
    height: 12rem;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
#patientOptions {
    width: auto; /* Adjust this value to modify the width of the modal */
    height: 22rem;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    display: flex; 
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Adjust this value to change the vertical spacing */
    
}
.flexi {
    display: flex;
    flex-direction: row;
    gap: 2rem;
}

#patientOptions label {
    /* Styles for labels inside the modal */
}

#patientOptions button {
    /* Styles for button inside the modal */
}

#patientOptions p#error-message {
    color: red;
    display: none;
    /* Additional styles for error message inside the modal */
}
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.label-opt {
    cursor: pointer;
    
}

  </style>

<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Register Medical Technologist</h4>                                
                </div>
                <form action="{{ route('storeMedtech') }}" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success">Basic Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="first_name" name="first_name" value="" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="first_name">First Name</label>
                                        </div>
                                        @error('first_name')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="last_name" name="last_name" value="" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                        @error('last_name')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="email" name="email" value="" class="form-control bg-light" placeholder="HAU Email" aria-label="HAU Email">
                                            <label for="email">HAU Email</label>
                                        </div>
                                        @error('email')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="student_number" name="student_number" value="" class="form-control bg-light" placeholder="Student Number" aria-label="Student Number">
                                            <label for="student_number">Student Number</label>
                                        </div>
                                        <div class="form-floating">

                                        @error('student_number')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ 'The student number field is required.' }}
                                            </p>
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="password" id="password" name="password" value="" class="form-control bg-light" placeholder="Password" aria-label="Password">
                                            <label for="password">Password</label>
                                        </div>
                                        @error('password')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>



                            
                            <div class="buttons mt-4 flex justify-content-end">
                                <div class="a-btn">
                                    <a href="{{ route('admin.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                </div>
                                <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModal()">Submit</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: white;">
                                                    <path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/>
                                                </svg>
                                                
                                                
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Confirm Submission</h4>
                                            <p class="mb-4">The information entered in this form will be saved. <br> Are you sure you want to save this?</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal2">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z" fill="white"/>
                                                  </svg>
                                                  
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Enter Password</h4>
                                            <p class="mb-4">Password is required to save the input.</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <form id="passwordForm">
                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control text-success" id="inputPassword2" name="admin_password" placeholder="Password" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Enter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>

        <div class="card pe-0 mt-4">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Import Medical Technologists</h4>
              {{-- </form> --}}
                                
                
                
                </div>
                <form action="{{ route('importMedtech') }}" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success"><span>Upload your .xls file here:</span></h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        {{-- <input type="file" class="form-control" id="image" name="import_file" multiple required> --}}
                                        <input type="file" class="form-control" id="image" name="import_file" required>
                                    </div>
       
                            
                            <div class="buttons mt-4 flex justify-content-end">
                                <div class="a-btn">
                                    <a href="{{ route('admin.index') }}" class="btn btn-light ms-2 btn-custom-style btn-cancel">Cancel</a>
                                </div>
                                <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationImportModal()">Import</button>
                            </div>

                        </div>
                    </div>

                                    <!-- First Modal - Confirmation -->
                                    <div class="modal fade" id="modalForImport" tabindex="-1" aria-labelledby="modalForImportLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body m-3">
                                                    <div class="modalContent">
                                                        <h1 class="text-center text-success">
                                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: white;">
                                                                    <path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/>
                                                                </svg>
                                                                
                                                                
                                                            </span>
                                                        </h1>
                                                        <div class="text-center mt-4">
                                                            <h4 class="font-bold">Confirm Import</h4>
                                                            <p class="mb-4">The data will be imported into the system. <br> Are you sure you want to proceed?</p>
                                                        </div>                                                        
                                                        <div class="d-flex justify-content-evenly mt-5">
                                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#modalForImport2">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                                    <!-- Second Modal - Password Entry -->
                                    <div class="modal fade" id="modalForImport2" tabindex="-1" aria-labelledby="modalForImportLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body m-3">
                                                    <div class="modalContent">
                                                        <h1 class="text-center text-success">
                                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z" fill="white"/>
                                                                </svg>
                                                                
                                                            </span>
                                                        </h1>
                                                        <div class="text-center mt-4">
                                                            <h4 class="font-bold">Enter Password</h4>
                                                            <p class="mb-4">Password is required to proceed.</p>
                                                        </div>
                                                        <div class="d-flex justify-content-evenly mt-5">
                                                            <form id="passwordForm">
                                                                <div class="col-auto">
                                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                                    <input type="password" class="form-control text-success" id="inputPassword2" name="password" placeholder="Password" required>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Enter</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                </form>


            </div>
        </div>
    </div>
</section>
{{-- #9CCA9E --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

function redirectToService(serviceType) {
    // var medtechChecked = document.querySelector('input[name="procedure_type"][value="laboratory"]');
    // var radtechChecked = document.querySelector('input[name="procedure_type"][value="imaging"]');
    // var medtechSvg = document.querySelector('#medtechSvg');
    // var radtechSvg = document.querySelector('#radtechSvg');

    var doctorChecked = document.querySelector('input[name="role"][value="doctor"]');
    var nurseChecked = document.querySelector('input[name="role"][value="nurse"]');
    var medtechChecked = document.querySelector('input[name="role"][value="medtech"]');
    var radtechChecked = document.querySelector('input[name="role"][value="radtech"]');

    var doctorSvg = document.querySelector('#doctorSvg');
    var doctorSvg = document.querySelector('#doctorSvg');
    var medtechSvg = document.querySelector('#medtechSvg');
    var radtechSvg = document.querySelector('#radtechSvg');
    
    var doctorRadio = document.querySelector('input[name="role"][value="doctor"]');
    var nurseRadio = document.querySelector('input[name="role"][value="nurse"]');
    var medtechRadio = document.querySelector('input[name="role"][value="medtech"]');
    var radtechRadio = document.querySelector('input[name="role"][value="radtech"]');


    if (serviceType === 'doctor') {
        window.location.href = "{{ route('addDoctor') }}";

        // Update styles for laboratory selection
        doctorChecked.parentElement.style.backgroundColor = "#9BCAB3"; // Green color for laboratory
        doctorSvg.querySelectorAll('path').forEach(function(path) {
            path.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        medtechSvg.querySelectorAll('g').forEach(function(group) {
            group.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        nurseRadio.disabled = true;
        medtechRadio.disabled = true;
        radtechRadio.disabled = true;

    } else if (serviceType === 'nurse') {
        window.location.href = "{{ route('addNurse') }}";

        // Update styles for laboratory selection
        nurseChecked.parentElement.style.backgroundColor = "#9BCAB3"; // Green color for laboratory
        nurseSvg.querySelectorAll('path').forEach(function(path) {
            path.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        nurseSvg.querySelectorAll('g').forEach(function(group) {
            group.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        doctorRadio.disabled = true;
        medtechRadio.disabled = true;
        radtechRadio.disabled = true;
    }
     else if (serviceType === 'medtech') {
        window.location.href = "{{ route('addMedtech') }}";

        // Update styles for laboratory selection
        medtechChecked.parentElement.style.backgroundColor = "#9BCAB3"; // Green color for laboratory
        medtechSvg.querySelectorAll('path').forEach(function(path) {
            path.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        medtechSvg.querySelectorAll('g').forEach(function(group) {
            group.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        doctorRadio.disabled = true;
        nurseRadio.disabled = true;
        radtechRadio.disabled = true;
    }
     else if (serviceType === 'radtech') {
        window.location.href = "{{ route('addRadtech') }}";

        // Update styles for laboratory selection
        radtechChecked.parentElement.style.backgroundColor = "#9BCAB3"; // Green color for laboratory
        radtechSvg.querySelectorAll('path').forEach(function(path) {
            path.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        radtechSvg.querySelectorAll('g').forEach(function(group) {
            group.style.fill = '#5DA07F'; // Fill color for laboratory procedures
        });
        doctorRadio.disabled = true;
        nurseRadio.disabled = true;
        medtechRadio.disabled = true;
    }
}






document.addEventListener('DOMContentLoaded', function() {
    const dateOfBirthInput = document.getElementById('date_of_birth');
    const ageInput = document.getElementById('age');

    // Function to calculate age
    function calculateAge() {
        console.log('Date of birth changed');

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

    // Calculate age on date of birth change
    dateOfBirthInput.addEventListener('change', calculateAge);

    // Calculate age on DOMContentLoaded (page load)
    calculateAge();
});


// function submitForm() {
//     var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
//     var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]');
//     var roomNumberSelect = document.getElementById("room_number");

//     if (!inpatientChecked.checked && !outpatientChecked.checked) {
//         document.getElementById("error-message").style.display = "block";
//         return;
//     }

//     // Change background color of the selected radio button
//     if (inpatientChecked.checked) {
//         inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
//         outpatientChecked.disabled = true; // Disable the outpatient option
//         roomNumberSelect.querySelector('option[value="For ER"]').disabled = true; // Disable the "For ER" option
//     } else {
//         outpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Outpatient
//         inpatientChecked.disabled = true; // Disable the inpatient option
//         roomNumberSelect.value = "For ER"; // Set default value to "For ER"
//         roomNumberSelect.disabled = true; // Disable the dropdown selection
//     }

//     // Add a delay of 0.5 seconds before hiding the modal and submitting the form
//     setTimeout(function() {
//         document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal
//         document.getElementById("patientForm").submit(); // Submit the form
//     }, 300); // 300 milliseconds = 0.3 seconds
//     document.getElementById("patientForm").submit(); // Submit the form
// }


// function submitForm() {
//     var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
//     var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]');
//     var roomNumberSelect = document.getElementById("room_number");

//     var doctorChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
//     var nurseChecked = document.querySelector('input[name="role"][value="nurse"]');
//     var medtechChecked = document.querySelector('input[name="role"][value="medtech"]');
//     var radtechChecked = document.querySelector('input[name="role"][value="radtech"]');

//     if (!doctorChecked.checked && !nurseChecked.checked && !medtechChecked.checked && !radtechChecked.checked) {
//         document.getElementById("error-message").style.display = "block";
//         return;
//     }

//     // Change background color of the selected radio button
//     if (inpatientChecked.checked) {
//         inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
//         outpatientChecked.disabled = true; // Disable the outpatient option
//         roomNumberSelect.querySelector('option[value="For ER"]').disabled = true; // Disable the "For ER" option
//     }
//     else if (inpatientChecked.checked) {
//         inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
//         outpatientChecked.disabled = true; // Disable the outpatient option
//         roomNumberSelect.querySelector('option[value="For ER"]').disabled = true; // Disable the "For ER" option
//     }
    
//     else {
//         outpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Outpatient
//         inpatientChecked.disabled = true; // Disable the inpatient option
//         roomNumberSelect.value = "For ER"; // Set default value to "For ER"
//         roomNumberSelect.disabled = true; // Disable the dropdown selection
//     }

//     // Add a delay of 0.5 seconds before hiding the modal and submitting the form
//     setTimeout(function() {
//         document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal
//         document.getElementById("patientForm").submit(); // Submit the form
//     }, 300); // 300 milliseconds = 0.3 seconds
//     document.getElementById("patientForm").submit(); // Submit the form
// }


function showConfirmationModal() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });
        myModal.show();
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function () {
        // Disable the submit button to prevent multiple form submissions
        document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
    });
});

document.getElementById('submitButton').addEventListener('click', function() {
    // Trigger the modal
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    });
    myModal.show();
});
    
function showConfirmationImportModal() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('modalForImport'), {
            keyboard: false
        });
        myModal.show();
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function () {
        // Disable the submit button to prevent multiple form submissions
        document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
    });
});

document.getElementById('submitButton').addEventListener('click', function() {
    // Trigger the modal
    var myModal = new bootstrap.Modal(document.getElementById('modalForImport'), {
        keyboard: false
    });
    myModal.show();
});

</script>
@include('partials.footer ')
