
    <div class="">
        <div class="card-body m-1">
            <div class="card pe-0">
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
                        <h5 class="text-success font-bold">II. Medication</h5>              
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="date" class="form-control rounded-4" placeholder="Medication Date" id="medication_date" name="medication_date" value="{{ optional($patient->MedicationRemarks->first())->medication_date }}" />
                                <label for="medication_date">Medication Date:</label>
                                @error('medication_date')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                               
                        <div class="col">
                            <div class="form-floating mt-2">
                                <select id="shift" class="form-select rounded-4" placeholder="Vital Sign Date" id="shift" name="shift">
                                    <option value="7:00am-3:00pm" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '7:00am-3:00pm') selected @endif>7:00am-3:00pm</option>
                                    <option value="3:00pm-11:00pm" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '3:00pm-11:00pm') selected @endif>3:00pm-11:00pm</option>
                                    <option value="11:00pm-7:00am" @if(old('shift', optional($patient->MedicationRemarks->first())->shift) == '11:00pm-7:00am') selected @endif>11:00pm-7:00am</option>
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
                                <textarea class="form-control" id="medication" name="medication" style="height: 100px">{{ optional($patient->MedicationRemarks->first())->medication }}</textarea>
                                <label for="medication">Medication</label>
                                @error('medication')
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
                                <textarea class="form-control" id="medication_dosage" name="medication_dosage" style="height: 100px">{{ optional($patient->MedicationRemarks->first())->medication_dosage }}</textarea>
                                <label for="medication_dosage">Dosage</label>
                                @error('medication_dosage')
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
                                <textarea class="form-control" id="treatment" name="treatment" style="height: 100px">{{ optional($patient->MedicationRemarks->first())->treatment }}</textarea>
                                <label for="treatment">Treatment</label>
                                @error('treatment')
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
                                <textarea class="form-control" id="dietary_information" name="dietary_information" style="height: 100px">{{ optional($patient->MedicationRemarks->first())->dietary_information }}</textarea>
                                <label for="dietary_information">Dietary Information</label>
                                @error('dietary_information')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>                                              
                    </div>
                    <div class="row mx-4">
                        <h5 class="text-success font-bold mt-5">III. Notes</h5>                  
                        <div class="col">
                            <div class="form-floating mt-2">
                                <textarea class="form-control" id="remarks_notes" name="remarks_notes" style="height: 100px">{{ optional($patient->MedicationRemarks->first())->remarks_notes }}</textarea>
                                <label for="remarks_notes">Notes</label>
                                @error('remarks_notes')
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