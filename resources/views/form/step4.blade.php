{{-- <section id="step2" class="hero step" style="display: none"> --}}
      {{-- <form action="/nurse-patients/edit/{{$patient->patient_id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
          @method('PUT')
          @csrf --}}
        <div class="">
            <div class="card-body m-1">
                <h4 class="font-bold">Edit Patient Complete History</h4>
                <div class="card pe-0">
                        <!-- BAR -->
                        <div class="bar mt-5">
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
                        </div>
                        <div class="row mx-4">
                            <h5 class="text-success">II. Current Medication</h5>
                        
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="current_medications" name="current_medications" style="height: 100px">{{ optional($patient->currentMedication)->current_medications }}</textarea>
                                    <label for="current_medications">Name of Medication</label>                                              
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="current_dosage" name="current_dosage" style="height: 100px">{{ optional($patient->currentMedication)->current_dosage }}</textarea>
                                    <label for="current_dosage">Dosage</label>
                                </div>
                            </div>                                                  
           
                        </div>
                        <div class="row mx-4">
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="current_frequency" name="current_frequency" style="height: 100px">{{ optional($patient->currentMedication)->current_frequency }}</textarea>
                                    <label for="current_frequency">Frequency</label>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <textarea class="form-control" id="current_prescribing_physician" name="current_prescribing_physician" style="height: 100px">{{ optional($patient->currentMedication)->current_prescribing_physician }}</textarea>
                                    <label for="current_prescribing_physician">Prescribing Physician</label>
                                </div>
                            </div> 

                        <div class="buttons my-4 d-flex justify-content-end">
                            <button type="button" onclick="prevStep()" class="btn btn-light me-2">Back</button>
                            {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                                    <button type="button" class="btn btn-success ms-2 btn-archive" onclick="showConfirmationModal()">Submit</button>
                                </div>
      
                                    <!-- First Modal - Confirmation -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body m-3">
                                                    <div class="modalContent">
                                                        <h1 class="text-center text-success">
                                                            <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
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
                                                          <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
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
                                                                  <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password" required>
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
            </div>
        </div>
      {{-- </form> --}}
  
  {{-- </section> --}}
  
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