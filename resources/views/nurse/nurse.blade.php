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

/* Customize modal width */
.modal-dialog {
    max-width: 600px; /* Change the width to your desired value */
    width: 100%; /* Ensure modal doesn't exceed viewport width */
}

/* Optionally, you can center the modal horizontally */
.modal-dialog { 
    margin: auto;
}
.modal-dialog h4 {
  margin-bottom: 1.5rem;
}
/* Customize modal backdrop background */
.modal-backdrop {
    background-color: rgb(44, 105, 75)/* Change the background color and opacity as needed */
}

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">

      
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Patients</h4>
                        @if(request('admissionType') == 'inpatient')
                        <form class="d-flex" action="{{ route('nurse.searchInpatient', ['admissionType' => 'inpatient']) }}" method="GET">
                         <div class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="inpatientSearch">
                            <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                        @elseif(request('admissionType') == 'outpatient')
                        <form class="d-flex" action="{{ route('nurse.searchOutpatient', ['admissionType' => 'outpatient']) }}" method="GET">
                        <div class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="outpatientSearch">
                            <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>

                    </form>
                        @elseif(request('admissionType') == 'archived')
                        <form class="d-flex" action="{{ route('nurse.searchArchived', ['admissionType' => 'archived']) }}" method="GET">
                        <div class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="archivedSearch">
                            <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                    
                        @else
                        <form class="d-flex" action="{{ route('nurse.view', ['admissionType' => request('admissionType')]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                            <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                        @endif
                
                
                
                </div>
                
                <ul class="nav nav-underline overflow-x-auto">
                    <!-- List item for Inpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'inpatient' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'inpatient']) }}">Inpatient</a>
                    </li>
                    <!-- List item for Outpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'outpatient' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'outpatient']) }}">Outpatient</a>
                    </li>
                    <!-- List item for Archived Patients -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'archived' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'archived']) }}">Archived</a>
                    </li>
                </ul>
                
                
                
                
    
                <table class="table table-striped mt-3">
                  <thead>
                      <tr>
                          <th scope="col">Patient ID</th>
                          <th scope="col">Patient Name</th>
                          <th scope="col">Attending Physician</th>
                          @if(!$admissionType)
                            <th scope="col">Admission Type</th>
                            <th scope="col"></th>
                        @endif
                          @if(request('admissionType') == 'inpatient')
                              <th scope="col">Room Number</th>
                              <th scope="col">Admission Date</th>
                              <th scope="col">Discharge Date</th>
                          @elseif(request('admissionType') == 'outpatient')
                          <th scope="col">Consultation Date</th>
                          @elseif(request('admissionType') == 'archived')
                              <th scope="col">Admission Date</th>
                              <th scope="col">Archived Date</th>
                          @endif
                          <!-- Actions column should always be displayed -->
                          {{-- <th scope="col"></th> --}}
                          <!-- Additional Actions column only for non-archived patients -->
                          @if(request('admissionType') == 'inpatient' || request('admissionType') == 'outpatient')
                          <th scope="col"></th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($patients as $patient)
                      <tr class="" data-href="/nurse-patients/{{ $patient->patient_id }}">
                        <td>{{  $patient->patient_id }}</td>
                          <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                          <td>
                            @if ($patient->physician)
                                Dr. {{ $patient->physician->phy_first_name }} {{ $patient->physician->phy_last_name }}
                            @else
                                No attending physician
                            @endif
                        </td>   
                        @if(!$admissionType)

                        <td>{{ ucfirst($patient->admission_type) }}</td>
                        <td style="text-align: center; max-width: 80px;">
                            <div class="">
                              <a href="/nurse-patients/{{$patient->patient_id}}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">
                                  <span class="p-1 rounded">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                          <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#ffff"/>
                                      </svg>
                                  </span>
                                  <span class="p-1 rounded">View</span>
                              </a>
                            </div>
                        </td>                        
                        @endif
                        @if(request('admissionType') == 'inpatient')
                            <td>{{  $patient->room_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                            <td>{{ $patient->discharge_date ? \Carbon\Carbon::parse($patient->discharge_date)->format('n/j/Y') : 'TBD' }}</td>
                            
                            @elseif(request('admissionType') == 'outpatient')
                        <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                        @elseif(request('admissionType') == 'archived')
                        <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                        <td>{{ \Carbon\Carbon::parse($patient->archived_at)->format('h:i A n/j/Y') }}</td>                        
                        @endif
                          <!-- Actions for all patients -->
                          {{-- <td style="text-align: center;">
                            <a href="/nurse-patients/{{$patient->patient_id}}" style="display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="vertical-align: middle;">
                                    <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#418363"/>
                                </svg>
                            </a>
                        </td> --}}
{{--                         
                        <td style="text-align: center;">
                                      <a href="/nurse-patients/{{$patient->patient_id}}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">
                                        <span class="p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#ffff"/>
                                            </svg>
                                        </span>
                                        <span class="p-1 rounded">View</span>
                                    </a>
                        </td> --}}


                          <!-- Additional Actions only for non-archived patients -->
                          @if(request('admissionType') == 'inpatient' || request('admissionType') == 'outpatient')
                          <td style="text-align: center; max-width: 80px;">                            {{-- <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')">
                                  @csrf --}}
                                  <div class="d-flex justify-content-end gap-4" >
                                    <a href="/nurse-patients/{{$patient->patient_id}}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">
                                        <span class="p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#ffff"/>
                                            </svg>
                                        </span>
                                        <span class="p-1 rounded">View</span>
                                    </a>
                                      
                                      <form id="acceptForm{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST">
                                        @csrf
                                          {{-- <button type="button" class="" onclick="showConfirmationModal()"> --}}
                                            <button type="button" class="badge rounded-pill text-bg-danger d-inline-flex align-items-center gap-0.5" style="font-size: 1em;" onclick="showConfirmationModalForAccept({{ $patient->patient_id }})">
                                                <span class="p-1 rounded">
                                                <svg width="18" height="18" viewBox="0 0 17 16" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                                                    <path  fill="#FFFFFF" d="M9 1.50098C9 1.10315 9.15804 0.721621 9.43934 0.440316C9.72064 0.159012 10.1022 0.000976563 10.5 0.000976563L14.5 0.000976562C15.0304 0.000976563 15.5391 0.21169 15.9142 0.586763C16.2893 0.961836 16.5 1.47054 16.5 2.00098V14.001C16.5 14.5314 16.2893 15.0401 15.9142 15.4152C15.5391 15.7903 15.0304 16.001 14.5 16.001H2.5C1.96957 16.001 1.46086 15.7903 1.08579 15.4152C0.710714 15.0401 0.5 14.5314 0.5 14.001V2.00098C0.5 1.47054 0.710714 0.961836 1.08579 0.586763C1.46086 0.21169 1.96957 0.000976563 2.5 0.000976563L8.5 0.000976562C8.186 0.418977 8 0.937977 8 1.50098V7.50098H6C5.90098 7.5008 5.80414 7.53003 5.72175 7.58496C5.63936 7.63988 5.57513 7.71804 5.53722 7.80951C5.4993 7.90099 5.4894 8.00166 5.50876 8.09877C5.52813 8.19588 5.57589 8.28505 5.646 8.35498L8.146 10.855C8.19245 10.9015 8.24762 10.9385 8.30837 10.9637C8.36911 10.9889 8.43423 11.0019 8.5 11.0019C8.56577 11.0019 8.63089 10.9889 8.69163 10.9637C8.75238 10.9385 8.80755 10.9015 8.854 10.855L11.354 8.35498C11.4241 8.28505 11.4719 8.19588 11.4912 8.09877C11.5106 8.00166 11.5007 7.90099 11.4628 7.80951C11.4249 7.71804 11.3606 7.63988 11.2783 7.58496C11.1959 7.53003 11.099 7.5008 11 7.50098H9V1.50098Z" />
                                                </svg>
                                                </span>
                                                <span class="p-1 rounded">Archive</span>
                                      
                                      
                                      
                                            </button>
                                      
                                          <!-- First Modal - Confirmation -->
                                          {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                                            <div class="modal fade" id="acceptModal{{ $patient->patient_id }}" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body m-3">
                                                        <div class="modalContent">
                                                            <h1 class="text-center text-success">
                                                                <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.75 2.25098C12.75 1.65424 12.9871 1.08194 13.409 0.659986C13.831 0.238029 14.4033 0.000976563 15 0.000976563L21 0.000976562C21.7956 0.000976563 22.5587 0.317047 23.1213 0.879656C23.6839 1.44227 24 2.20533 24 3.00098V21.001C24 21.7966 23.6839 22.5597 23.1213 23.1223C22.5587 23.6849 21.7956 24.001 21 24.001H3C2.20435 24.001 1.44129 23.6849 0.87868 23.1223C0.316071 22.5597 0 21.7966 0 21.001V3.00098C0 2.20533 0.316071 1.44227 0.87868 0.879656C1.44129 0.317047 2.20435 0.000976563 3 0.000976563L12 0.000976562C11.529 0.627977 11.25 1.40648 11.25 2.25098V11.251H8.25C8.10147 11.2507 7.9562 11.2946 7.83262 11.3769C7.70904 11.4593 7.6127 11.5766 7.55582 11.7138C7.49895 11.851 7.48409 12.002 7.51314 12.1477C7.54219 12.2933 7.61384 12.4271 7.719 12.532L11.469 16.282C11.5387 16.3518 11.6214 16.4072 11.7125 16.445C11.8037 16.4829 11.9013 16.5023 12 16.5023C12.0987 16.5023 12.1963 16.4829 12.2874 16.445C12.3786 16.4072 12.4613 16.3518 12.531 16.282L16.281 12.532C16.3862 12.4271 16.4578 12.2933 16.4869 12.1477C16.5159 12.002 16.5011 11.851 16.4442 11.7138C16.3873 11.5766 16.291 11.4593 16.1674 11.3769C16.0438 11.2946 15.8985 11.2507 15.75 11.251H12.75V2.25098Z" fill="white"/>
                                                                    </svg>
                                      
                                                                </span>
                                                            </h1>
                                                            <div class="text-center mt-4">
                                                                <h4 class="font-bold">Send Clearance</h4>
                                                                <p class="mb-4">This patient information will be sent to the Billing Department. <br> Are you sure you want to send this?</p>
                                                            </div>
                                                            <div class="d-flex justify-content-evenly mt-5">
                                                                {{-- <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal2">Send</button> --}}
                                                                <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#passwordModalAccept{{ $patient->patient_id }}">Send</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- Second Modal - Password Entry -->
                                        {{-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                                            <div class="modal fade" id="passwordModalAccept{{ $patient->patient_id }}" tabindex="-1" aria-labelledby="passwordModalAcceptLabel" aria-hidden="true">
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


                              </td>
                          @endif
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
              
              <div class="mt-4">
                {{ $patients->appends(['admissionType' => request('admissionType'), 'search' => request('search')])->links() }}
              </div>
            
            </div>
      </div>
    
    </div>
</section>


<script>
    // function validatePassword(patientId) {
    //     var password = document.getElementById('password' + patientId).value;
    //     if (password === '') {
    //         document.getElementById('passwordError' + patientId).style.display = 'block';
    //         return false; // Prevent form submission
    //     } else {
    //         document.getElementById('passwordError' + patientId).style.display = 'none';
    //         return true; // Allow form submission
    //     }
    // }
    // function submitForm(patientId) {
    //     var password = document.getElementById('password' + patientId).value;
    //     if (password === '') {
    //         document.getElementById('passwordError' + patientId).style.display = 'block';
    //     } else {
    //         document.getElementById('passwordError' + patientId).style.display = 'none';
    //         document.getElementById('archivePatientForm_' + patientId).submit();
    //     }
    // }
//     document.addEventListener("DOMContentLoaded", function () {
//     const rows = document.querySelectorAll(".clickable-row");
//     rows.forEach((row) => {
//         row.addEventListener("click", function (event) {
//             // Check if the click target is not the archive button
//             if (!event.target.classList.contains("btn-archive")) {
//                 window.location.href = row.dataset.href;
//             }
//         });
//     });
// });


// function showConfirmationModal() {
//         // Show the modal
//         var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
//             keyboard: false
//         });
//         myModal.show();
// }
// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('myForm').addEventListener('submit', function () {
//         // Disable the submit button to prevent multiple form submissions
//         document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
//     });
// });

// document.getElementById('submitButton').addEventListener('click', function() {
//     // Trigger the modal
//     var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
//         keyboard: false
//     });
//     myModal.show();
// });


function showConfirmationModalForAccept(requestId) {
        // Show the first modal
        var acceptModal = new bootstrap.Modal(document.getElementById('acceptModal' + requestId), {
            keyboard: false
        });
        acceptModal.show();

        // Set the value of the hidden input in the password form
        document.getElementById('acceptRequestInput' + requestId).value = requestId;

        // Show the second modal (password entry modal)
        var passwordModalAccept = new bootstrap.Modal(document.getElementById('passwordModalAccept' + requestId), {
            keyboard: false
        });
        passwordModalAccept.show();
    }

    function submitFormWithPasswordAccept(requestId) {
        // Submit the form with the password
        document.getElementById('passwordFormAccept' + requestId).submit();
    }
</script>
@include('partials.footer')
