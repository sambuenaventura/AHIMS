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
  gap: 1.25rem;
  width: 22rem; /* Set a fixed width */
  height: 14rem; /* Set a fixed height */
  overflow: hidden;
}

/* Rest of your CSS remains the same */

.box1 {
  gap: 0 !important;

}
.left {
  /* width: 50rem; */
  /* height: 50rem; */
  /* overflow: hidden; This prevents the child from overflowing */
}
.right {
  width: 170rem;
  /* height: 50rem; */
  /* overflow: auto; This prevents the child from overflowing */
}
.personnel {
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
          <div class="box box1 flex flex-col bg-custom-102">
            <p id="datePlaceholder"></p>
            <h1 class="font-bold text-black" id="timePlaceholder"></h1>
          </div>
          
          <div class="box flex bg-custom-101">
            <img src="{{ asset('storage/image/laboratory.png') }}" alt="Inpatient Image" class="w-24 h-auto mr-4">
            <div class="flex flex-col justify-between">
                <h2 class="font-bold text-black">Laboratory</h2>
                <p>Services</p>
            </div>
          </div>
          <div class="box flex bg-custom-101">
            <img src="{{ asset('storage/image/laboratory.png') }}" alt="Inpatient Image" class="w-24 h-auto mr-4">
            <div class="flex flex-col justify-between">
              <h2 class="font-bold text-black">Laboratory</h2>
              <p>Services</p>
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
                    
    <hr>
    <table class="table table-striped mt-3 Add">
      <thead>
          <tr>
              <th scope="col">Patient ID</th>
              <th scope="col">Patient Name</th>
              <th scope="col">Type of Service</th>
              <th scope="col">Time Requested</th>
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
                      <!-- Form for accepting request -->
                      <form action="{{ route('medtech.accept', $request->request_id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success">✓</button>
                      </form>
  
                      <!-- Form for declining request -->
                      <form action="{{ route('medtech.decline', $request->request_id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-danger">X</button>
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


function validatePassword(patientId) {
    var password = document.getElementById('password' + patientId).value;
    if (password === '') {
        document.getElementById('passwordError' + patientId).style.display = 'block';
        return false; // Prevent form submission
    } else {
        document.getElementById('passwordError' + patientId).style.display = 'none';
        return true; // Allow form submission
    }
}
function submitForm(patientId) {
    var password = document.getElementById('password' + patientId).value;
    if (password === '') {
        document.getElementById('passwordError' + patientId).style.display = 'block';
    } else {
        document.getElementById('passwordError' + patientId).style.display = 'none';
        document.getElementById('archivePatientForm_' + patientId).submit();
    }
}  
    
</script>
@include('partials.footer')

<form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')">
  @csrf
  <!-- Button to trigger the modal -->
  <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmArchiveModal{{ $patient->patient_id }}">
      Archive Patient
  </a>

  <!-- Modal -->
  <div class="modal fade" id="confirmArchiveModal{{ $patient->patient_id }}" tabindex="-1" aria-labelledby="confirmArchiveModalLabel{{ $patient->patient_id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="confirmArchiveModalLabel{{ $patient->patient_id }}">Confirm Archive</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="password{{ $patient->patient_id }}">Password:</label>
                  <input type="password" id="password{{ $patient->patient_id }}" name="password" class="form-control" required>
                  <div id="passwordError{{ $patient->patient_id }}" class="text-danger" style="display: none;">Please enter a password.</div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="submitForm('{{ $patient->patient_id }}')">Confirm</button>
              </div>
          </div>
      </div>
  </div>
</form>