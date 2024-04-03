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

.btn-clear {
    background-color: #dc3545 !important;
}
.btn-clear:hover {
    background-color:   #a32532 !important; /* Hover background color */
}

  </style>

<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">User Profile</h4>          
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ substr(auth()->user()->first_name, 0, 1) . substr(auth()->user()->last_name, 0, 1) }}" alt="Avatar" width="128" height="128" style="border-radius: 50%;">
                </div>
                <form action="{{ route('updateProfile') }}" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success">Edit Basic Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
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
                                            <input type="text" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
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
                                            <input type="text" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control bg-light" placeholder="HAU Email" aria-label="HAU Email">
                                            @if(auth()->user()->role === 'admin')
                                                <!-- Render the label as "Email" if the user is an admin -->
                                                <label for="email">Email</label>
                                            @else
                                                <!-- Render the label as "HAU Email" for non-admin users -->
                                                <label for="email">HAU Email</label>
                                            @endif
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
                                        <div class="form-floating" @if(auth()->user()->role === 'admin') hidden @endif>
                                            @if(auth()->user()->role === 'admin')
                                            <!-- Render only the label if the user is an admin -->
                                            <label></label>
                                        @else
                                            <!-- Render the input field and label for non-admin users -->
                                            <input type="number" id="student_number" name="student_number" value="{{ auth()->user()->student_number }}" class="form-control bg-light" placeholder="Student Number" aria-label="Student Number">
                                            <label for="student_number">Student Number</label>
                                        @endif
                                        
                                        </div>
                                        <div class="form-floating">
                    
                                        @error('student_number')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ 'The student number has already been taken.' }}
                                            </p>
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <h6 class="text-success">Change password</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="password" id="old_password" name="old_password" value="" class="form-control bg-light" placeholder="Old Password" aria-label="Old Password">
                                            <label for="old_password">Old Password</label>
                                            <svg id="eyeIconOP" xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" class="mx-2 position-absolute end-0 top-50 translate-middle-y" onclick="toggleOldPWVisibility()" style="cursor: pointer;">
                                                <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            
                                            </svg>
                                        </div>
                                        @error('old_password')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="password" id="new_password" name="new_password" value="" class="form-control bg-light" placeholder="New Password" aria-label="New Password">
                                            <label for="new_password">New Password</label>
                                            <svg id="eyeIconNP" xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" class="mx-2 position-absolute end-0 top-50 translate-middle-y" onclick="toggleNewPWVisibility()" style="cursor: pointer;">
                                                <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            
                                            </svg>
                                        </div>
                                        @error('new_password')
                                        <div class="">
                                            <p class="text-red-500 text-xs p-1 mb-0">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row g-3 align-items-end mb-3">
                                    {{-- <div class="col">
                                        <div class="form-floating input-group">
                                            <input type="text" id="pin" name="pin" value="{{ auth()->user()->pin ?? '' }}" class="form-control bg-light" placeholder="PIN" aria-label="PIN">
                                            <label for="pin">PIN</label>
                                            <button type="button" class="btn btn-success btn-submit" onclick="generatePin()">Generate PIN</button>
                                        </div>
                                    </div> --}}
                                    <div class="col">
                                        <div class="form-floating position-relative">
                                            <input type="password" id="pin" name="pin" value="{{ auth()->user()->pin ?? '' }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control bg-light pr-5" placeholder=" " aria-label="PIN" maxlength="4">
                                            <label for="pin">PIN</label>
                                            <svg id="eyeIconP" xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" class="mx-2 position-absolute end-0 top-50 translate-middle-y" onclick="togglePinVisibility()" style="cursor: pointer;">
                                                <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            
                                            </svg>
                                        </div>
                                        <button type="button" class="btn btn-success btn-submit mt-2" onclick="generatePin()">Generate PIN</button>
                                        <button type="button" class="btn btn-danger btn-submit btn-clear mt-2" onclick="clearPin()">Clear PIN</button>
                                    </div>
                                    

                                    
                                    
                                    <div class="col">
                                        <div class="form-floating input-group" hidden>
                                            <input>
                                            <label></label>
                                            <button></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="buttons mt-4 flex justify-content-end">
                                <div class="a-btn">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                    @elseif(auth()->user()->role === 'nurse')
                                        <a href="{{ route('nurse.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                    @elseif(auth()->user()->role === 'admission')
                                        <a href="{{ route('admission.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                    @elseif(auth()->user()->role === 'radtech')
                                        <a href="{{ route('radtech.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                    @elseif(auth()->user()->role === 'medtech')
                                        <a href="{{ route('medtech.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                                    @endif
                                </div>   

                                <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit">Submit</button>
                           
                            </div>
                        </div>
                    </div>
                </form>
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


function generatePin() {
        var pinField = document.getElementById('pin');
        var pin = Math.floor(1000 + Math.random() * 9000); // Generate a random 4-digit PIN
        pinField.value = pin;
    }
    function clearPin() {
        document.getElementById('pin').value = '';
    }
   
function togglePinVisibility() {
    var x = document.getElementById("pin");
    var eyeIcon = document.getElementById("eyeIconP");
    if (x.type === "password") {
        x.type = "text";
        eyeIcon.innerHTML = '<path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>';
    } else {
        x.type = "password";
        eyeIcon.innerHTML = '<path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            </svg>';
    }
}
function toggleOldPWVisibility() {
  var x = document.getElementById("old_password");
  var eyeIcon = document.getElementById("eyeIconOP");
    if (x.type === "password") {
        x.type = "text";
        eyeIcon.innerHTML = '<path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>';
    } else {
        x.type = "password";
        eyeIcon.innerHTML = '<path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            </svg>';
    }
}
function toggleNewPWVisibility() {
  var x = document.getElementById("new_password");
  var eyeIcon = document.getElementById("eyeIconNP");
    if (x.type === "password") {
        x.type = "text";
        eyeIcon.innerHTML = '<path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>';
    } else {
        x.type = "password";
        eyeIcon.innerHTML = '<path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>                                            </svg>';
    }
}
</script>
@include('partials.footer ')
