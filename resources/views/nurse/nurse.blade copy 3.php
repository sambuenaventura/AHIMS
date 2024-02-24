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
/* Add this CSS to your existing styles */
.clickable-row {
    cursor: pointer;
    
}
.clickable-row:hover {
    background-color: #801818 !; /* Change to your desired hover color */
}

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">

      
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4>Patients</h4>
                    @if(request('admissionType') == 'inpatient')
                    <form class="d-flex" action="{{ route('nurse.searchInpatient', ['admissionType' => 'inpatient']) }}" method="GET">
                      <input class="form-control me-2" type="search" placeholder="Search Inpatient Patients" aria-label="Search" name="inpatientSearch">
                      <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                @elseif(request('admissionType') == 'outpatient')
                <form class="d-flex" action="{{ route('nurse.searchOutpatient', ['admissionType' => 'outpatient']) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search Outpatient Patients" aria-label="Search" name="outpatientSearch">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
                @elseif(request('admissionType') == 'archived')
                <form class="d-flex" action="{{ route('nurse.searchArchived', ['admissionType' => 'archived']) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search Archived Patients" aria-label="Search" name="archivedSearch">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              
                @else
                <form class="d-flex" action="{{ route('nurse.view', ['admissionType' => request('admissionType')]) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
                @endif
                
                
                
                </div>
                
                <ul class="nav nav-underline overflow-x-auto">
                    <!-- List item for Inpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'inpatient' ? 'active text-success' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'inpatient']) }}">Inpatient</a>
                    </li>
                    <!-- List item for Outpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'outpatient' ? 'active text-success' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'outpatient']) }}">Outpatient</a>
                    </li>
                    <!-- List item for Archived Patients -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'archived' ? 'active text-success' : 'text-secondary' }}" href="{{ route('nurse.view', ['admissionType' => 'archived']) }}">Archived</a>
                    </li>
                </ul>
                
                
                
                
    
                <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col">Patient ID</th>
                          <th scope="col">Patient Name</th>
                          <th scope="col">Attending Physician</th>
                          @if(request('admissionType') == 'inpatient')
                              <th scope="col">Room Number</th>
                              <th scope="col">Admission Date</th>
                              <th scope="col">Discharge Date</th>
                          @elseif(request('admissionType') == 'outpatient')
                              <th scope="col">Visit Date</th>
                              <th scope="col">Follow-up Date</th>
                          @elseif(request('admissionType') == 'archived')
                              <th scope="col">Admission Date</th>
                              <th scope="col">Archived Date</th>
                          @endif
                          <!-- Actions column should always be displayed -->
                          <th scope="col">Actions</th>
                          <!-- Additional Actions column only for non-archived patients -->
                          @if(request('admissionType') != 'archived')
                              <th scope="col">Additional Actions</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($patients as $patient)
                      <tr class="clickable-row" data-href="/nurse-patients/{{ $patient->patient_id }}">
                        <td>{{  $patient->patient_id }}</td>
                          <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                          <td>
                            @if ($patient->physician)
                                Dr. {{ $patient->physician->phy_first_name }} {{ $patient->physician->phy_last_name }}
                            @else
                                No attending physician
                            @endif
                        </td>                        @if(request('admissionType') == 'inpatient')
                            <td>{{  $patient->room_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                            <td>{{  $patient->discharge_date }}</td>
                        @elseif(request('admissionType') == 'outpatient')
                        <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                        <td>{{  $patient->follow_up_date }}</td>
                        @elseif(request('admissionType') == 'archived')
                        <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                        <td>{{ \Carbon\Carbon::parse($patient->archived_at)->format('h:i A n/j/Y') }}</td>                        
                        @endif
                          <!-- Actions for all patients -->
                          <td><a href="/nurse-patients/{{$patient->patient_id}}" class="btn btn-success">View</a></td>
                          <!-- Additional Actions only for non-archived patients -->
                          @if(request('admissionType') != 'archived')
                              <td>
                                  <form id="archivePatientForm_{{ $patient->patient_id }}" action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST" onsubmit="return validatePassword('{{ $patient->patient_id }}')">
                                      @csrf
                                      <!-- Button to trigger the modal -->
                                      <a href="#" class="btn btn-danger btn-archive" data-bs-toggle="modal" data-bs-target="#confirmArchiveModal{{ $patient->patient_id }}">
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
    document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");
    rows.forEach((row) => {
        row.addEventListener("click", function (event) {
            // Check if the click target is not the archive button
            if (!event.target.classList.contains("btn-archive")) {
                window.location.href = row.dataset.href;
            }
        });
    });
});

</script>
@include('partials.footer')
