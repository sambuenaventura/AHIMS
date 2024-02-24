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
/* padding: 1.8rem 1.2rem; */
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
width: 120rem;
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
            <div class="box bg-white shadow box-center">
              <div class="flexi">
                  <div class="flex-col">
                      <img src="{{ asset('storage/image/chemistry.png') }}" alt="Chemistry Image" class="w-20 h-auto">
                      <h5 class="text-center mt-2">Chemistry</h5>
                    </div>
                    <p class="patients">{{ $xrayPatientsCount }} Patients</p>
                  </div>
            </div>

            <div class="box bg-white shadow box-center">
              <div class="flexi">
                  <div class="flex-col">
                      <img src="{{ asset('storage/image/hematology.png') }}" alt="Hematology Image" class="w-20 h-auto">
                      <p class="patients">{{ $ultrasoundPatientsCount }} Patients</p>

                    </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="box bg-white shadow box-center">
                <div class="flexi">
                    <div class="flex-col">
                        <img src="{{ asset('storage/image/bb-is.png') }}" alt="BB-IS Image" class="w-20 h-auto">
                        <h5 class="text-center mt-2">BB-IS</h5>
                    </div>
                    <p class="patients">{{ $ctscanPatientsCount }} Patients</p>
                </div>
            </div>
        
            <div class="box bg-white shadow box-center" style="visibility: hidden;">
              <div class="flexi">
                    <div class="flex-col">
                        <img src="" alt="" class="w-20 h-auto">
                        <h5 class="text-center mt-2"></h5>
                    </div>
                    <p class="patients"></p>
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
              <form class="d-flex" action="{{ route('radtech.index') }}" method="GET">
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
            <th scope="col">Type of Service</th>
            <th scope="col">Time Requested</th>
            <th scope="col">Actions</th> <!-- Add a new column for actions -->
            <th scope="col">Actions</th> <!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
            <tr>
                <td>{{ $request->patient_id }}</td>
                <td>{{ $request->patient->first_name }} {{ $request->patient->last_name }}</td>
                <td>{{ $request->procedure_type }}</td>
                <td>{{ $request->created_at }}</td>
                <td>
                  {{-- <form action="{{ route('radtech.accept', $request->request_id) }}" method="POST" id="acceptDeclineForm_{{ $request->request_id }}"> --}}
                  <form id="acceptForm_{{ $request->request_id }}" action="{{ route('radtech.accept', ['request_id' => $request->request_id]) }}" method="POST" onsubmit="return validatePasswordAccept('{{ $request->request_id }}')">
                    @csrf

                    {{-- <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')"> --}}
                    <!-- Button to trigger the modal for accepting request -->
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmAcceptModal{{ $request->request_id }}">✓</a>
                    <!-- Modal for accepting request -->
                    <div class="modal fade" id="confirmAcceptModal{{ $request->request_id }}" tabindex="-1" aria-labelledby="confirmAcceptModalLabel{{ $request->request_id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmAcceptModalLabel{{ $request->request_id }}">Confirm Accept</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    <label for="password{{ $request->request_id }}">Password:</label>
                                    <input type="password" id="password{{ $request->request_id }}" name="password" class="form-control">
                                    <div id="passwordAcceptError{{ $request->request_id }}" class="text-danger" style="display: none;">Please enter a password.</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="submitFormAccept('{{ $request->request_id }}')">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                </td>
                <td>
                  <form id="declineForm_{{ $request->request_id }}" action="{{ route('radtech.decline', ['request_id' => $request->request_id]) }}" method="POST" onsubmit="return validatePasswordDecline('{{ $request->request_id }}')">
                    @csrf
                    {{-- <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')"> --}}
                    <!-- Button to trigger the modal for accepting request -->
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeclineModal{{ $request->request_id }}">X</a>
                    <!-- Modal for accepting request -->
                    <div class="modal fade" id="confirmDeclineModal{{ $request->request_id }}" tabindex="-1" aria-labelledby="confirmDeclineModalLabel{{ $request->request_id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeclineModalLabel{{ $request->request_id }}">Confirm Decline</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                  <label for="passwordDecline{{ $request->request_id }}">Password:</label>
                                  <input type="password" id="passwordDecline{{ $request->request_id }}" name="password" class="form-control">
                                  <div id="passwordDeclineError{{ $request->request_id }}" class="text-danger" style="display: none;">Please enter a password.</div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="submitFormDecline('{{ $request->request_id }}')">Confirm</button>
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
              {{ $requests->links() }}
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
</script>

@include('partials.footer')
