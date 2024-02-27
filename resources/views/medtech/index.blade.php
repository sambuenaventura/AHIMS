@include('partials.header', ['bgColor' => 'bg-custom-51'])
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
align-items: center;
justify-content: center;
/* background-color: #f8f8f8; */
margin-left: 10rem;
margin-top: 3rem;
}
.admission-content {
  display: flex;
    /* align-items: center; */
  justify-content: center;
  width: 100%;
  max-width: 100rem;
  padding: 1.8rem 1.2rem;
  gap: 3rem;
  /* height: 50rem; */
  /* overflow: hidden; */
}
.boxes {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-template-rows: repeat(1, 1fr);
  grid-gap: 1.75rem;
  justify-content: space-evenly;
}

.box {
  /* Add styling for the boxes as needed */
  padding: 20px;
  height: 11rem;
  width: 20rem;
}


#datePlaceholder {
font-size: 0.9rem;

}
.flexi {    display: flex;
  align-items: center;
  justify-content: center;}
.flex-row {
display: flex;
flex-direction: row;
}
.flex-col {
display: flex;
flex-direction: column;
align-items: center;
  justify-content: center;
}
.boxes .box {
  border-radius: 10px;
  color: black;

  font-size: 1.4rem;
  font-family: sans-serif;
  gap: 1rem;
  
}

.box-content {
  border-radius: 10px;
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  font-family: sans-serif;
  gap: 1rem;
}
/* Rest of your CSS remains the same */

.box1 {
gap: 0 !important;

}
.left {
width: 100rem;
/* height: 50rem; */
/* overflow: hidden; This prevents the child from overflowing */
}
.right {
width: 170rem;
/* height: 50rem; */
/* overflow: auto; This prevents the child from overflowing */
}
.custom-btn {
  width: 10rem;
  height: 30px;
  /* Add any additional styling here */
  font-size: 0.60em;
  display: flex;
  align-items: center;
  justify-content: center;
}
.text-small {
font-size: 0.75em;
text-align: center;
}
.row {
  display: flex;
  gap: 1.5rem;
}

.row.no-gap {
  gap: 0; /* No gap between boxes */
}

.box {
  flex: 1; /* Make both boxes equally flexible */
  padding: 20px;
  height: 11rem;
  font-size: 1.4rem;
  font-family: sans-serif;
  position: relative; /* Ensure relative positioning for absolute children */

}
.patients {
  position: absolute; /* Position the patients text absolutely */
  top: 0; /* Align the text to the top */
  right: 0; 
  margin: 10px; /* Add some margin for spacing */
  font-size: 0.70em;
  color: #006600;
  font-weight: 600;
}
#box1 {
  margin-right: -50px; /* Adjust the negative margin to overlap */
  position: relative; /* Ensure position is relative */
  z-index: 2; /* Ensure box1 appears in front of box2 */
}

#box2 {
  z-index: 1; /* Ensure box2 appears behind box1 */
}

/* Style for the datePlaceholder */
#datePlaceholder {
  color: grey; /* Set text color to grey */
  font-size: 0.90em; /* Adjust font size as needed */
  margin-left: 50px;
}

/* Style for the timePlaceholder */
#timePlaceholder {
  font-size: 2.25em; /* Adjust font size as needed */
}
.box-center {
  display: flex;
  align-items: center;
  justify-content: center;
}
.row h5 {
  font-size: 0.70em;
  font-weight: 700;
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
  
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
          <div class="row no-gap">
            <div id="box1" class="box flex-col flexi bg-custom-102 shadow">
              <h1 id="timePlaceholder" class="font-bold text-black"></h1>
            </div>
            <div id="box2" class="box flex-col flexi bg-white shadow">
              <p id="datePlaceholder" class=""></p>
            </div>
          </div>
          
          
          
              <div class="row">
                <div class="box bg-white shadow box-center position-relative">
                    <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $chemistryPatientsCount }} Requests</span>
                    <div class="flexi">
                        <div class="flex-col">
                            <img src="{{ asset('storage/image/chemistry.png') }}" alt="Chemistry Image" class="w-20 h-auto">
                            <h5 class="text-center mt-2">Chemistry</h5>
                        </div>
                    </div>
                </div>

                <div class="box bg-white shadow box-center position-relative">
                    <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $hematologyPatientsCount }} Requests</span>
                    <div class="flexi">
                        <div class="flex-col">
                            <img src="{{ asset('storage/image/hematology.png') }}" alt="Hematology Image" class="w-20 h-auto">
                            <h5 class="text-center mt-2">Hematology</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="box bg-white shadow box-center position-relative">
                  <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $bbIsPatientsCount }} Requests</span>
                  <div class="flexi">
                      <div class="flex-col">
                          <img src="{{ asset('storage/image/bb-is.png') }}" alt="BB-IS Image" class="w-20 h-auto">
                          <h5 class="text-center mt-2">BB-IS</h5>
                      </div>
                  </div>
              </div>

              <div class="box bg-white shadow box-center position-relative">
                    <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $parasitologyPatientsCount }} Requests</span>
                    <div class="flexi">
                      <div class="flex-col">
                          <img src="{{ asset('storage/image/parasitology.png') }}" alt="Parasitology Image" class="w-20 h-auto">
                          <h5 class="text-center mt-2">Parasitology</h5>
                      </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
              <div class="box bg-white shadow box-center position-relative">
                  <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $microbiologyPatientsCount }} Requests</span>
                  <div class="flexi">
                    <div class="flex-col">
                        <img src="{{ asset('storage/image/microbiology.png') }}" alt="Microbiology Image" class="w-20 h-auto">
                        <h5 class="text-center mt-2">Microbiology</h5>
                    </div>
                </div>
            </div>
        
            <div class="box bg-white shadow box-center position-relative">
              <span class="badge bg-success position-absolute top-0 end-0 font-small">{{ $microscopyPatientsCount }} Requests</span>
                <div class="flexi">
                  <div class="flex-col">
                      <img src="{{ asset('storage/image/microscopy.png') }}" alt="Microscopy Image" class="w-20 h-auto">
                      <h5 class="text-center mt-2">Microscopy</h5>
                  </div>
                </div>
            </div>
        </div>

          <!-- Remove one box -->
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0">
            <div class="card-body m-1">
              <div class="d-flex justify-content-between mb-4">
                <h4>New Request</h4>
                <form class="d-flex" action="{{ route('medtech.index') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            {{-- @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif --}}
    <hr>
    <table class="table table-striped mt-3 Add">
      <thead>
          <tr>
              <th scope="col">Patient ID</th>
              <th scope="col">Patient Name</th>
              <th scope="col">Service</th>
              <th scope="col">Time Requested</th>
              <th scope="col">Actions</th> <!-- Add a new column for actions -->
              <th scope="col">Actions</th> <!-- Add a new column for actions -->
          </tr>
      </thead>
      <tbody>
          @foreach ($requests as $request)
              <tr>
                  <td class="vertical-center">{{ $request->patient_id }}</td>
                  <td class="vertical-center" style="min-width: 140px;">{{ $request->patient->first_name }} {{ $request->patient->last_name }}</td>
                  <td class="vertical-center">{{ $request->procedure_type }}</td>
                  <td class="vertical-center" style="min-width: 140px;">{{ \Carbon\Carbon::parse($request->created_at)->format('h:i A n/j/Y') }}</td>

                  <td class="vertical-center">
                    {{-- <form action="{{ route('medtech.accept', $request->request_id) }}" method="POST" id="acceptDeclineForm_{{ $request->request_id }}"> --}}
                    <form id="acceptForm_{{ $request->request_id }}" action="{{ route('medtech.accept', ['request_id' => $request->request_id]) }}" method="POST" onsubmit="return validatePasswordAccept('{{ $request->request_id }}')">
                      @csrf

                      {{-- <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')"> --}}
                      <!-- Button to trigger the modal for accepting request -->
                      {{-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmAcceptModal{{ $request->request_id }}">✓</a> --}}
                      <!-- Modal for accepting request -->
                      {{-- <div class="buttons mt-4 flex justify-content-end"> --}}
                        <div class="d-flex justify-content-center">
                          <button type="button" class="" onclick="showConfirmationModalForAccept()">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M7.6 10.4L5.45 8.25C5.26667 8.06667 5.03333 7.975 4.75 7.975C4.46667 7.975 4.23333 8.06667 4.05 8.25C3.86667 8.43333 3.775 8.66667 3.775 8.95C3.775 9.23333 3.86667 9.46667 4.05 9.65L6.9 12.5C7.1 12.7 7.33333 12.8 7.6 12.8C7.86667 12.8 8.1 12.7 8.3 12.5L13.95 6.85C14.1333 6.66667 14.225 6.43333 14.225 6.15C14.225 5.86667 14.1333 5.63333 13.95 5.45C13.7667 5.26667 13.5333 5.175 13.25 5.175C12.9667 5.175 12.7333 5.26667 12.55 5.45L7.6 10.4ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#418363"/>
                              </svg>
                                                        </button>
                      </div>
                      
                      {{-- </div> --}}


                      <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
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
                                          <h4 class="font-bold">Confirm Acceptance</h4>
                                          <p class="mb-4">By accepting this request, you are confirming that you will proceed with the necessary procedure. <br> Are you sure you want to accept this request?</p>
                                      </div>
                                      
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#acceptModal2">Accept</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="acceptModal2" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
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
                  </td>
                  <td>
                    <form id="declineForm_{{ $request->request_id }}" action="{{ route('medtech.decline', ['request_id' => $request->request_id]) }}" method="POST" onsubmit="return validatePasswordDecline('{{ $request->request_id }}')">
                      @csrf
                      {{-- <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')"> --}}
                      <!-- Button to trigger the modal for accepting request -->
                      {{-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeclineModal{{ $request->request_id }}">X</a> --}}
                      <!-- Modal for accepting request -->
                      {{-- <div class="buttons mt-4 flex justify-content-end"> --}}
                        <div class="d-flex justify-content-center">

                        <button type="button" class="" onclick="showConfirmationModalForDecline()"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9 10.4L11.9 13.3C12.0833 13.4833 12.3167 13.575 12.6 13.575C12.8833 13.575 13.1167 13.4833 13.3 13.3C13.4833 13.1167 13.575 12.8833 13.575 12.6C13.575 12.3167 13.4833 12.0833 13.3 11.9L10.4 9L13.3 6.1C13.4833 5.91667 13.575 5.68333 13.575 5.4C13.575 5.11667 13.4833 4.88333 13.3 4.7C13.1167 4.51667 12.8833 4.425 12.6 4.425C12.3167 4.425 12.0833 4.51667 11.9 4.7L9 7.6L6.1 4.7C5.91667 4.51667 5.68333 4.425 5.4 4.425C5.11667 4.425 4.88333 4.51667 4.7 4.7C4.51667 4.88333 4.425 5.11667 4.425 5.4C4.425 5.68333 4.51667 5.91667 4.7 6.1L7.6 9L4.7 11.9C4.51667 12.0833 4.425 12.3167 4.425 12.6C4.425 12.8833 4.51667 13.1167 4.7 13.3C4.88333 13.4833 5.11667 13.575 5.4 13.575C5.68333 13.575 5.91667 13.4833 6.1 13.3L9 10.4ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#A7A7A7"/>
                          </svg>
                          </button>
                        </div>
                    {{-- </div> --}}
                      <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
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
                                          <h4 class="font-bold">Confirm Decline</h4>
                                          <p class="mb-4">By declining this request, you are confirming that you will not proceed with the necessary procedure. <br> Are you sure you want to decline this request?</p>
                                      </div>
                                      
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#declineModal2">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                                    <div class="modal fade" id="declineModal2" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
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
                                                          <p class="mb-4">Password and reason for declining is required to proceed.</p>
                                                        </div>
                                                      <div class="col-auto">
                                                        <label for="inputReason" class="visually-hidden">Reason for Decline</label>
                                                        <textarea class="form-control text-success" id="inputReason" name="reason" placeholder="Reason for Decline" rows="3" required></textarea>
                                                    </div>
                                                      <div class="d-flex justify-content-evenly mt-5">

                                                          <div class="col-auto">
                                                              <label for="inputPassword2" class="visually-hidden">Password</label>
                                                              <input type="password" class="form-control text-success" id="inputPassword2" name="password" placeholder="Password" required>
                                                          </div>
                                                          <div class="col-auto">
                                                              <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Enter</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                    </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
  



              <div class="mt-4">
                {{ $requests->appends(['search' => $search])->links() }}
              </div>
            
            </div>
        </div>
      </div>
    
    </div>
</section>


<script>
  function updateDateTime() {
          const timePlaceholder = document.getElementById('timePlaceholder');
          const datePlaceholder = document.getElementById('datePlaceholder');
          const currentDateTime = new Date();
          
          // Set the time zone to Manila/Philippine time
          const timeZone = 'Asia/Manila';

          // Options for formatting time
          //const timeOptions = { timeZone, hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' };
          const timeOptions = { timeZone, hour12: true, hour: 'numeric', minute: 'numeric' };
          const formattedTime = currentDateTime.toLocaleTimeString('en-US', timeOptions);
          timePlaceholder.innerText = formattedTime;

          // Options for formatting date
          const dateOptions = { timeZone, weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          const formattedDate = currentDateTime.toLocaleDateString('en-US', dateOptions);
          datePlaceholder.innerText = formattedDate;
  }

    updateDateTime();
    setInterval(updateDateTime, 1000);

    function validatePasswordAccept(requestId) {
      var password = document.getElementById('password' + requestId).value;
      if (password === '') {
          document.getElementById('passwordAcceptError' + requestId).style.display = 'block';
          return false;
      } else {
          document.getElementById('passwordAcceptError' + requestId).style.display = 'none';
          return true;
      }
  }

  function validatePasswordDecline(requestId) {
      var password = document.getElementById('passwordDecline' + requestId).value;
      if (password === '') {
          document.getElementById('passwordDeclineError' + requestId).style.display = 'block';
          return false;
      } else {
          document.getElementById('passwordDeclineError' + requestId).style.display = 'none';
          return true;
      }
  }

  function submitFormAccept(requestId) {
      var password = document.getElementById('password' + requestId).value;
      if (password === '') {
          document.getElementById('passwordAcceptError' + requestId).style.display = 'block';
      } else {
          document.getElementById('passwordAcceptError' + requestId).style.display = 'none';
          document.getElementById('acceptForm_' + requestId).submit();
      }
  }

  function submitFormDecline(requestId) {
      var password = document.getElementById('passwordDecline' + requestId).value;
      if (password === '') {
          document.getElementById('passwordDeclineError' + requestId).style.display = 'block';
      } else {
          document.getElementById('passwordDeclineError' + requestId).style.display = 'none';
          document.getElementById('declineForm_' + requestId).submit();
      }
  }

  function showConfirmationModalForAccept() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('acceptModal'), {
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
    var myModal = new bootstrap.Modal(document.getElementById('acceptModal'), {
        keyboard: false
    });
    myModal.show();
});

function showConfirmationModalForDecline() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('declineModal'), {
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
    var myModal = new bootstrap.Modal(document.getElementById('declineModal'), {
        keyboard: false
    });
    myModal.show();
});
    



</script>

@include('partials.footer')
