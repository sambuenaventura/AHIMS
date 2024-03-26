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
                                            <input type="text" id="student_number" name="student_number" value="{{ auth()->user()->student_number }}" class="form-control bg-light" placeholder="Student Number" aria-label="Student Number">
                                            <label for="student_number">Student Number</label>
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
                                    <div class="col">
                                        <div class="form-floating input-group">
                                            <input type="text" id="pin" name="pin" value="{{ auth()->user()->pin ?? '' }}" class="form-control bg-light" placeholder="PIN" aria-label="PIN">
                                            <label for="pin">PIN</label>
                                            <button type="button" class="btn btn-success" onclick="generatePin()">Generate PIN</button>
                                        </div>
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

    
</script>
@include('partials.footer ')
