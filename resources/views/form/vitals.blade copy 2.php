<form action="/nurse-patients/update-vital-signs/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="">
        <div class="card-body m-1">
            <h4 class="font-bold">Nurse Remarks</h4>
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
                        <h5 class="text-success">Vital Signs</h5>
                    
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="date" class="form-control rounded-4" placeholder="Vital Sign Date" id="vital_date" name="vital_date" value="{{ optional($patient->vitalSigns->first())->vital_date }}" />
                                <label for="vital_date">Vital Sign Date:</label>
                                @error('vital_date')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                                @enderror                                              
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="time" class="form-control rounded-4" placeholder="Vital Sign Time" id="vital_time" name="vital_time" value="{{ optional($patient->vitalSigns->first())->vital_date }}" />
                                <label for="vital_time">Vital Sign Time:</label>                                              
                            </div>
                        </div>                                                  
    
                    </div>

                    <div class="row mx-4">
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control rounded-4" placeholder="Blood Pressure" id="blood_pressure" name="blood_pressure" value="{{ optional($patient->vitalSigns->first())->blood_pressure }}" />
                                <label for="temperature">Blood Pressure (mmHg)</label>                                              
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control rounded-4" placeholder="Respiratory Rate" id="respiratory_rate" name="respiratory_rate" value="{{ optional($patient->vitalSigns->first())->respiratory_rate }}" />
                                <label for="respiratory_rate">Respiratory Rate (cpm)</label>                                              
                            </div>
                        </div> 
                    </div>
                    <div class="row mx-4">
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control rounded-4" placeholder="Pulse Rate" id="pulse" name="pulse" value="{{ optional($patient->vitalSigns->first())->pulse }}" />
                                <label for="pulse">Pulse Rate (bpm)</label>                                              
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control rounded-4" placeholder="Temperature" id="temperature" name="temperature" value="{{ optional($patient->vitalSigns->first())->temperature }}" />
                                <label for="temperature">Temperature (°C)</label>                                              
                            </div>
                        </div> 
                    </div>
                    <div class="row mx-4">
                        <div class="col">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control rounded-4" placeholder="Oxygen" id="oxygen" name="oxygen" value="{{ optional($patient->vitalSigns->first())->oxygen }}" />
                                <label for="oxygen">Oxygen (%)</label>                                              
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-floating mt-2" hidden>
                                <input type="text" class="form-control rounded-4" placeholder="" id="" name="" value="" disabled />
                                <label for=""></label>                                              
                            </div>
                        </div> 
                        <div class="buttons my-4 d-flex justify-content-end">
                            <button type="button" onclick="prevStep()" class="btn btn-light me-2">Back</button>
                            {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                            <button type="button" class="btn btn-success ms-2 btn-archive" onclick="showConfirmationModal()">Submit</button>
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
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Update</button>
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

<script>

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