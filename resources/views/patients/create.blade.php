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
    width: 40rem; /* Adjust this value to modify the width of the modal */
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
                    <h4 class="font-bold">Add Patient</h4>
              {{-- </form> --}}
                                
                
                
                </div>
                <form action="/add/patient" enctype="multipart/form-data" method="POST" class="flex flex-col">
                    @csrf

                    <div id="patientOptionsOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10000; display: flex; justify-content: center; align-items: center;">
                        <div id="patientOptions" style="padding: 20px; border-radius: 10px;">
                            <h4 class="font-bold">Add Patient</h4>
                            <p class="mb-4">Is the patient Inpatient or Outpatient?</p>
                            <div class="label">
                                <label class="label-opt bg-custom-100 rounded">
                                    <img src="http://127.0.0.1:8000/storage/image/inpatient.png" alt="Inpatient Image" class="w-20 h-auto" style="filter: brightness(0) invert(1);">
                                    <p class="text-white m-0">Inpatient</p>
                                    <input type="radio" name="admission_type" value="Inpatient" class="invisible" onclick="submitForm()">
                                </label>
                                <label class="label-opt bg-custom-100 rounded">
                                    <img src="http://127.0.0.1:8000/storage/image/outpatient.png" alt="Outpatient Image" class="w-20 h-auto" style="filter: brightness(0) invert(1);">
                                    <p class="text-white m-0">Outpatient</p>
                                    <input type="radio" name="admission_type" value="Outpatient" class="invisible" onclick="submitForm()">
                                </label>
                            </div>
                            <p id="error-message" style="color: red; display: none;">Please select either inpatient or outpatient.</p>
                        </div>
                    </div>
                    <div class="hero-content">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-success">I. Patient Information</h6>
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
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
                                <div class="form-floating">
                                    <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name">
                                    <label for="contact_number">Contact Number</label>
                                </div>
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
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="pic_first_name" name="pic_first_name" value="{{ old('pic_first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="pic_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="pic_last_name" name="pic_last_name" value="{{ old('pic_last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
                                            <label for="pic_last_name">Last Name</label>
                                        </div>
                                    </div>
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
                                <div class="form-floating">
                                    <input type="text" id="pic_contact_number" name="pic_contact_number" value="{{ old('pic_contact_number') }}" class="form-control bg-light my-3" placeholder="Contact Number" aria-label="First name">
                                    <label for="pic_contact_number">Contact Number</label>
                                </div>
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
                                <div class="row g-3 align-items-end mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="ap_first_name" name="ap_first_name" value="{{ old('ap_first_name') }}" class="form-control bg-light" placeholder="First Name" aria-label="First Name">
                                            <label for="ap_first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="ap_last_name" name="ap_last_name" value="{{ old('ap_last_name') }}" class="form-control bg-light" placeholder="Last Name" aria-label="Last Name">
                                            <label for="ap_last_name">Last Name</label>
                                        </div>
                                    </div>
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
                                <div class="form-floating">
                                    <select id="specialist" name="specialist" class="form-select bg-light py-3">
                                        <option value="">Select Specialist</option>
                                        @foreach ($physicians as $physician)
                                            <option value="{{ $physician->physician_id }}">Dr. {{ $physician->phy_first_name }} {{ $physician->phy_last_name }}</option>
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
                            <div class="col">
                                <h6 class="text-success">ㅤ</h6>
                                <div class="row g-3 align-items-end">
                                    <div class="col">
                                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control bg-light py-3" placeholder="Birth Date" aria-label="Birth Date">
                                    </div>
                                    <div class="col">
                                        <input type="number" id="age" name="age" class="form-control bg-light py-3" placeholder="Age" aria-label="Age" readonly>
                                    </div>
                                    <div class="col">
                                        <select name="gender" class="form-control bg-light py-3" placeholder="Gender" aria-label="Age">
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
                                <div class="form-floating">
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control bg-light my-3" placeholder="Address" aria-label="Address">
                                    <label for="address">Address</label>
                                </div>
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
                                <div class="form-floating">
                                    <input type="text" id="pic_relation" name="pic_relation" value="{{ old('pic_relation') }}" class="form-control bg-light mb-3" placeholder="Relation to Patient" aria-label="Relation to Patient">
                                    <label for="pic_relation">Relation to Patient</label>
                                </div>
                                <div class="input-group">
                                    @error('pic_relation')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                                <input type="text" class="form-control bg-light my-3 py-3 invisible" placeholder="pic_relation" aria-label="Address">
                                <h6 class="text-success">ㅤ</h6>
                                <div class="form-floating">
                                    <input type="text" id="ap_contact_number" name="ap_contact_number" value="{{ old('ap_contact_number') }}" class="form-control bg-light mb-3" placeholder="Contact Number" aria-label="Contact Number">
                                    <label for="ap_contact_number">Contact Number</label>
                                </div>
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
                                <div class="form-floating">
                                    <select id="room_number" name="room_number" class="form-select bg-light py-3" aria-label="Room Number">
                                        <option value="" {{ old('room_number') == "" ? 'selected' : '' }} disabled>Select Room Number</option>
                                        @foreach($availableRooms as $room)
                                            <option value="{{ $room }}">{{ $room }}</option>
                                        @endforeach
                                        <option value="For ER" {{ old('room_number') == "For ER" ? 'selected' : '' }}>For ER</option>
                                    </select>
                                </div>
                                
                                
                                
                                
                                               
                                <div class="input-group">
                                    @error('room_number')
                                    <div class="ml-2">
                                        <p class="text-red-500 text-xs p-1">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="buttons mt-4 flex justify-content-end">
                                <div class="a-btn">
                                    <a href="{{ route('admission.index') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
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
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.75 2.25098C12.75 1.65424 12.9871 1.08194 13.409 0.659986C13.831 0.238029 14.4033 0.000976563 15 0.000976563L21 0.000976562C21.7956 0.000976563 22.5587 0.317047 23.1213 0.879656C23.6839 1.44227 24 2.20533 24 3.00098V21.001C24 21.7966 23.6839 22.5597 23.1213 23.1223C22.5587 23.6849 21.7956 24.001 21 24.001H3C2.20435 24.001 1.44129 23.6849 0.87868 23.1223C0.316071 22.5597 0 21.7966 0 21.001V3.00098C0 2.20533 0.316071 1.44227 0.87868 0.879656C1.44129 0.317047 2.20435 0.000976563 3 0.000976563L12 0.000976562C11.529 0.627977 11.25 1.40648 11.25 2.25098V11.251H8.25C8.10147 11.2507 7.9562 11.2946 7.83262 11.3769C7.70904 11.4593 7.6127 11.5766 7.55582 11.7138C7.49895 11.851 7.48409 12.002 7.51314 12.1477C7.54219 12.2933 7.61384 12.4271 7.719 12.532L11.469 16.282C11.5387 16.3518 11.6214 16.4072 11.7125 16.445C11.8037 16.4829 11.9013 16.5023 12 16.5023C12.0987 16.5023 12.1963 16.4829 12.2874 16.445C12.3786 16.4072 12.4613 16.3518 12.531 16.282L16.281 12.532C16.3862 12.4271 16.4578 12.2933 16.4869 12.1477C16.5159 12.002 16.5011 11.851 16.4442 11.7138C16.3873 11.5766 16.291 11.4593 16.1674 11.3769C16.0438 11.2946 15.8985 11.2507 15.75 11.251H12.75V2.25098Z" fill="white"/>
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


function submitForm() {
    var inpatientChecked = document.querySelector('input[name="admission_type"][value="Inpatient"]');
    var outpatientChecked = document.querySelector('input[name="admission_type"][value="Outpatient"]');
    var roomNumberSelect = document.getElementById("room_number");

    if (!inpatientChecked.checked && !outpatientChecked.checked) {
        document.getElementById("error-message").style.display = "block";
        return;
    }

    // Change background color of the selected radio button
    if (inpatientChecked.checked) {
        inpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Inpatient
        outpatientChecked.disabled = true; // Disable the outpatient option
        roomNumberSelect.querySelector('option[value="For ER"]').disabled = true; // Disable the "For ER" option
    } else {
        outpatientChecked.parentElement.style.backgroundColor = "#9CCA9E"; // Green color for Outpatient
        inpatientChecked.disabled = true; // Disable the inpatient option
        roomNumberSelect.value = "For ER"; // Set default value to "For ER"
        roomNumberSelect.disabled = true; // Disable the dropdown selection
    }

    // Add a delay of 0.5 seconds before hiding the modal and submitting the form
    setTimeout(function() {
        document.getElementById("patientOptionsOverlay").style.display = "none"; // Hide the modal
        document.getElementById("patientForm").submit(); // Submit the form
    }, 300); // 300 milliseconds = 0.3 seconds
    document.getElementById("patientForm").submit(); // Submit the form
}


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
    
</script>
@include('partials.footer ')
