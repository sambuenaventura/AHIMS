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
                                    <textarea class="form-control" id="pe_heent" name="pe_heent" style="height: 100px">{{ optional($patient->currentMedication)->current_dosage }}</textarea>
                                    <label for="pe_heent">Dosage</label>
                                </div>
                            </div>                                                  

                            <div class="mt-4">
                                <div class="card-body text-success" style="border: 2px dotted #198754; padding: 3rem; border-radius: 10px;">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="plus-icon me-3">
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <mask id="mask0_1132_19213" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                                                    <rect width="40" height="40" fill="#D9D9D9"/>
                                                </mask>
                                                <g mask="url(#mask0_1132_19213)">
                                                    <path d="M18.3333 21.6666V26.6666C18.3333 27.1388 18.493 27.5346 18.8125 27.8541C19.1319 28.1735 19.5278 28.3333 20 28.3333C20.4722 28.3333 20.868 28.1735 21.1875 27.8541C21.5069 27.5346 21.6666 27.1388 21.6666 26.6666V21.6666H26.6666C27.1389 21.6666 27.5347 21.5069 27.8541 21.1874C28.1736 20.868 28.3333 20.4721 28.3333 19.9999C28.3333 19.5277 28.1736 19.1319 27.8541 18.8124C27.5347 18.493 27.1389 18.3333 26.6666 18.3333H21.6666V13.3333C21.6666 12.861 21.5069 12.4652 21.1875 12.1458C20.868 11.8263 20.4722 11.6666 20 11.6666C19.5278 11.6666 19.1319 11.8263 18.8125 12.1458C18.493 12.4652 18.3333 12.861 18.3333 13.3333V18.3333H13.3333C12.8611 18.3333 12.4653 18.493 12.1458 18.8124C11.8264 19.1319 11.6666 19.5277 11.6666 19.9999C11.6666 20.4721 11.8264 20.868 12.1458 21.1874C12.4653 21.5069 12.8611 21.6666 13.3333 21.6666H18.3333ZM20 36.6666C17.6944 36.6666 15.5278 36.2291 13.5 35.3541C11.4722 34.4791 9.70831 33.2916 8.20831 31.7916C6.70831 30.2916 5.52081 28.5277 4.64581 26.4999C3.77081 24.4721 3.33331 22.3055 3.33331 19.9999C3.33331 17.6944 3.77081 15.5277 4.64581 13.4999C5.52081 11.4721 6.70831 9.70825 8.20831 8.20825C9.70831 6.70825 11.4722 5.52075 13.5 4.64575C15.5278 3.77075 17.6944 3.33325 20 3.33325C22.3055 3.33325 24.4722 3.77075 26.5 4.64575C28.5278 5.52075 30.2916 6.70825 31.7916 8.20825C33.2916 9.70825 34.4791 11.4721 35.3541 13.4999C36.2291 15.5277 36.6666 17.6944 36.6666 19.9999C36.6666 22.3055 36.2291 24.4721 35.3541 26.4999C34.4791 28.5277 33.2916 30.2916 31.7916 31.7916C30.2916 33.2916 28.5278 34.4791 26.5 35.3541C24.4722 36.2291 22.3055 36.6666 20 36.6666ZM20 33.3333C23.7222 33.3333 26.875 32.0416 29.4583 29.4583C32.0416 26.8749 33.3333 23.7221 33.3333 19.9999C33.3333 16.2777 32.0416 13.1249 29.4583 10.5416C26.875 7.95825 23.7222 6.66659 20 6.66659C16.2778 6.66659 13.125 7.95825 10.5416 10.5416C7.95831 13.1249 6.66665 16.2777 6.66665 19.9999C6.66665 23.7221 7.95831 26.8749 10.5416 29.4583C13.125 32.0416 16.2778 33.3333 20 33.3333Z" fill="#418363"/>
                                            </svg>
                                        </span>
                                        <p class="fs-4 mb-0">Add Medication</p>
                                    </div>
                                </div>
                            </div>
                            
                            

                        <div class="col">
                            <div class="form-floating mt-2">
                                <textarea class="form-control" id="pe_heent" name="pe_heent" style="height: 100px">{{ optional($patient->physicalExamination)->pe_heent }}</textarea>
                                <label for="pe_heent">Dosage</label>
                            </div>
                        </div> 
                        <div class="buttons my-4 d-flex justify-content-end">
                            <button type="button" onclick="prevStep()" class="btn btn-light me-2">Back</button>
                            {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                                    <button type="button" class="btn btn-success ms-2 btn-archive" onclick="showConfirmationModal()">Submit</button>
                                    
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
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">Save</button>
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
                                                              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: white;">
                                                                  <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/>
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
                                                                  <button type="submit" class="btn btn-success mb-3" id="submitWithPassword">Enter</button>
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