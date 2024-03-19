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
      /* height: 100vh; */
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
    .pregnancy p {
        font-size: 1em;
        margin-bottom: 0;
        margin-right: 0.5rem;

    }    
    .pregnancy input {
    }
    .pregnancy select {
    }
    .pregnancy {
    display: flex; /* Use flexbox layout */
    align-items: center; /* Align items vertically */
    }

  /* Ensure input and select elements have consistent width */
  .pregnancy input,
  .pregnancy select {
      width: auto; /* Adjust width as needed */
      flex: 1; /* Allow elements to grow to fill available space */
      margin-right: 10px; /* Add spacing between elements */
  }
  input, textarea, select{
    background-color: #FAFAFA !important;
}
</style>

<section id="admission">
    <div class="admission-content">
        <form action="/nurse-patients/update-progress-notes/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
    <div class="">
        <div class="card-body m-1">
            <div class="card pe-0 gap-3">
                    <!-- BAR -->
                    {{-- <div class="bar mt-5">
                        <div class="position-relative mb-5 mx-5">
                            <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0"
                            aria-valuemax="100" style="height: 1px;">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                            <button type="button"
                            class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">1</button>
                            <button type="button"
                            class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">2</button>
                            <button type="button"
                            class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-success rounded-pill"
                            style="width: 2rem; height:2rem;">3</button>
                        </div>
                    </div> --}}

                    <div class="row mx-4 mt-5">
                        <h5 class="text-success font-bold">Progress Notes</h5>              
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="date" class="form-control rounded" placeholder="Medication Date" id="progress_date" name="progress_date" value="{{ optional($patient->progressNotes->first())->progress_date }}" />
                                <label for="progress_date">Progress Date:</label>
                                @error('progress_date')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                               
                        <div class="col">
                            <div class="form-floating mt-2">
                                <select id="shift" class="form-select rounded" placeholder="Vital Sign Date" id="shift" name="shift">
                                    <option value="7:00am-3:00pm" @if(old('shift', optional($patient->progressNotes->first())->shift) == '7:00am-3:00pm') selected @endif>7:00am-3:00pm</option>
                                    <option value="3:00pm-11:00pm" @if(old('shift', optional($patient->progressNotes->first())->shift) == '3:00pm-11:00pm') selected @endif>3:00pm-11:00pm</option>
                                    <option value="11:00pm-7:00am" @if(old('shift', optional($patient->progressNotes->first())->shift) == '11:00pm-7:00am') selected @endif>11:00pm-7:00am</option>
                                </select>
                                </select>

                                <label for="shift">Shift:</label>
                                @error('shift')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                             
                    </div>

                    <div class="row mx-4">
                        <div class="col">
                            <div class="form-floating mt-2">
                                <textarea class="form-control" id="focus" name="focus" style="height: 100px">{{ optional($patient->progressNotes->first())->focus }}</textarea>
                                <label for="focus">Focus</label>
                                @error('focus')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                                  
                    </div>
                    <div class="row mx-4">    
                        <div class="col">
                            <div class="form-floating mt-2">
                                <textarea class="form-control" id="prog_notes" name="prog_notes" style="height: 100px">{{ optional($patient->progressNotes->first())->prog_notes }}</textarea>
                                <label for="prog_notes">Notes</label>
                                @error('prog_notes')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                               
                    </div>



                    <div class="row mx-4">
  
                    <div class="buttons my-4 d-flex justify-content-end">
                        <a href="{{ route('nurse.edit', ['id' => $patient->patient_id]) }}" class="btn btn-light ms-2 btn-custom-style btn-cancel">Back</a>
                        {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                        <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModal()">Submit</button>
                        {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                        

                    
                    </div>
                </div>

                </div>

                    <div class="modal fade" id="modalForMedication" tabindex="-1" aria-labelledby="modalForMedicationLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#modalForMedication2">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="modalForMedication2" tabindex="-1" aria-labelledby="modalForMedicationLabel" aria-hidden="true">
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
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
                    {{-- <div id="patientOptionsOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10000; display: flex; justify-content: center; align-items: center;">
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
                    </div> --}}

<script>

    function showConfirmationModal() {
            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('modalForMedication'), {
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
        var myModal = new bootstrap.Modal(document.getElementById('modalForMedication'), {
            keyboard: false
        });
        myModal.show();
    });
    </script>

@include('partials.footer ')
