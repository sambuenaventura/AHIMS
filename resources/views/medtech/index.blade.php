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
  font-size: 0.90em !important; /* Adjust font size as needed */
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
.modal-dialog { 
    margin: auto;
    max-width: 600px; /* Change the width to your desired value */
    width: 100%; /* Ensure modal doesn't exceed viewport width */
}
.modal-dialog h4 {
  margin-bottom: 1.5rem;
  font-size: 1.5rem;
}
.cancel-btn {
    background: #E7E7E7 !important;
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
      <div class="left">
        <div class="boxes">
          <div class="row no-gap">
            <div id="box1" class="box flex-col flexi bg-custom-102 shadow">
              <h1 id="timePlaceholder" class="font-bold text-black"></h1>
            </div>
            <div id="box2" class="box flex-col flexi bg-white shadow">
              <p id="datePlaceholder" class="" style=""></p>
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
                <h4 class="font-bold">New Laboratory Requests</h4>
                <form class="d-flex" action="{{ route('medtech.index') }}" method="GET">
                    <div class="input-group mb-3">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
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
              <th scope="col">Request ID</th>
              <th scope="col">Patient Name</th>
              <th scope="col">Service</th>
              <th scope="col">Date Needed</th>
              <th scope="col"></th> <!-- Add a new column for approve action -->
              <th scope="col"></th> <!-- Add a new column for reject action -->
          </tr>
      </thead>
      <tbody>
          @forelse ($requests as $request)
              <tr>
                  <td>{{ $request->request_id }}</td>
                  <td style="min-width: 140px;">{{ $request->patient->first_name }} {{ $request->patient->last_name }}</td>
                  <td>{{ $request->procedure_type }}</td>
                  <td style="min-width: 140px;">
                    @if($request->stat)
                        <span class="badge bg-danger">STAT</span>
                        {{ \Carbon\Carbon::parse($request->date_needed)->format('n/j/Y') }} 
                    @else
                        {{ \Carbon\Carbon::parse($request->date_needed . ' ' . $request->time_needed)->format('h:i A n/j/Y') }}
                    @endif
                </td>  
                  <td class="vertical-center">
                    <form id="acceptForm{{ $request->request_id }}" action="{{ route('medtech.accept', ['request_id' => $request->request_id]) }}" method="POST">
                      @csrf
                      <div class="d-flex justify-content-center">
                        <button type="button" onclick="showConfirmationModalForAccept({{ $request->request_id }})" class="badge rounded-pill text-bg-success d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">                            
                            <span class="p-1 rounded">
                              <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18">
                                <path fill="#ffff" d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                              </svg>
                            </span>
                            <span class="p-1 rounded">Accept</span>
                        </button>
                      </div>
                    <div class="modal fade" id="acceptModal{{ $request->request_id }}" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                              <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                                                <path fill="#ffff" d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                              </svg>
                                                
                                                
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                          <h4 class="font-bold">Accept Request</h4>
                                          <p class="mb-4">By accepting this request, you are confirming that you will proceed with the necessary procedure. <br> Are you sure you want to accept this request?</p>
                                      </div>
                                      
                                        <div class="d-flex justify-content-evenly mt-5">
                                          <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" style="background-color: #E7E7E7;" data-bs-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#passwordModalAccept{{ $request->request_id }}">Accept</button>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="passwordModalAccept{{ $request->request_id }}" tabindex="-1" aria-labelledby="passwordModalAcceptLabel" aria-hidden="true">
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
                                            <form id="passwordFormAccept">
                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Proceed</button>
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
                    <form id="declineForm{{ $request->request_id }}" action="{{ route('medtech.decline', ['request_id' => $request->request_id]) }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                          <button type="button" onclick="showConfirmationModalForDecline({{ $request->request_id }})" class="decline badge rounded-pill text-bg-danger d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">                        
                            <span class="p-1 rounded">
                              <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18">
                                <path fill="#ffff" d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                              </svg>
                            </span>
                            <span class="p-1 rounded">Decline</span>
                          </button>
                        </div>
                        <div class="modal fade" id="declineModal{{ $request->request_id }}" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-body m-3">
                                      <div class="modalContent">
                                          <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                              <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                                                <path fill="#ffff" d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                              </svg>
                                                  
                                                  
                                              </span>
                                          </h1>
                                          <div class="text-center mt-4">
                                              <h4 class="font-bold">Decline Request</h4>
                                              <p class="mb-4">By declining this request, you are confirming that you will not proceed with the necessary procedure. <br> Are you sure you want to decline this request?</p>
                                          </div>
                                        
                                          <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" style="background-color: #E7E7E7;" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#passwordModalDecline{{ $request->request_id }}">Decline</button>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                                      <!-- Second Modal - Password Entry -->
                                      <div class="modal fade" id="passwordModalDecline{{ $request->request_id }}" tabindex="-1" aria-labelledby="passwordModalDeclineLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body m-3">
                                                    <div class="modalContent">
                                                        <h1 class="text-center text-danger">
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
                                                        <textarea class="form-control" id="inputReason" name="reason" placeholder="Reason for Decline" rows="3" required></textarea>
                                                    </div>
                                                        <div class="d-flex justify-content-evenly mt-5">
                                                            <form id="passwordFormDecline{{ $request->request_id }}">
                                                                <div class="col-auto">
                                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                                    <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password" required>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Proceed</button>
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
              </tr>
              @empty
              <tr>
                  <td colspan="7" class="text-center">No new requests</td>
              </tr>
          @endforelse  
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

    function showConfirmationModalForDecline(requestId) {
        // Show the first modal
        var declineModal = new bootstrap.Modal(document.getElementById('declineModal' + requestId), {
            keyboard: false
        });
        declineModal.show();

        // Set the value of the hidden input in the password form
        document.getElementById('declineRequestInput' + requestId).value = requestId;

        // Show the second modal (password entry modal)
        var passwordModalDecline = new bootstrap.Modal(document.getElementById('passwordModalDecline' + requestId), {
            keyboard: false
        });
        passwordModalDecline.show();
    }

    function submitFormWithPasswordDecline(requestId) {
        // Submit the form with the password
        document.getElementById('passwordFormDecline' + requestId).submit();
    }


</script>

@include('partials.footer')
