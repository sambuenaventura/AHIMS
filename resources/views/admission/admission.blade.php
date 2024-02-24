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
                    <form class="d-flex" action="{{ route('admission.searchInpatient', ['admissionType' => 'inpatient']) }}" method="GET">
                      <input class="form-control me-2" type="search" placeholder="Search Inpatient Patients" aria-label="Search" name="inpatientSearch">
                      <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                @elseif(request('admissionType') == 'outpatient')
                <form class="d-flex" action="{{ route('admission.searchOutpatient', ['admissionType' => 'outpatient']) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search Outpatient Patients" aria-label="Search" name="outpatientSearch">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
                @elseif(request('admissionType') == 'archived')
                <form class="d-flex" action="{{ route('admission.searchArchived', ['admissionType' => 'archived']) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search Archived Patients" aria-label="Search" name="archivedSearch">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              
                @else
                <form class="d-flex" action="{{ route('admission.view', ['admissionType' => request('admissionType')]) }}" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <input type="hidden" name="admissionType" value="{{ request('admissionType') }}">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
                @endif
                
                
                
                </div>
                
                <ul class="nav nav-underline overflow-x-auto">
                    <!-- List item for Inpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'inpatient' ? 'active text-success' : 'text-secondary' }}" href="{{ route('admission.view', ['admissionType' => 'inpatient']) }}">Inpatient</a>
                    </li>
                    <!-- List item for Outpatient -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'outpatient' ? 'active text-success' : 'text-secondary' }}" href="{{ route('admission.view', ['admissionType' => 'outpatient']) }}">Outpatient</a>
                    </li>
                    <!-- List item for Archived Patients -->
                    <li class="nav-item">
                        <a class="nav-link {{ request('admissionType') == 'archived' ? 'active text-success' : 'text-secondary' }}" href="{{ route('admission.view', ['admissionType' => 'archived']) }}">Archived</a>
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
                              <th scope="col">Consultation Date</th>
                              {{-- <th scope="col">Follow-up Date</th> --}}
                          @elseif(request('admissionType') == 'archived')
                              <th scope="col">Admission Date</th>
                              <th scope="col">Archived Date</th>
                          @endif
                          <!-- Actions column should always be displayed -->
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($patients as $patient)
                      <tr>
                          <td>{{  $patient->patient_id }}</td>
                          <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                          <td>
                            @if ($patient->physician)
                                Dr. {{ $patient->physician->phy_first_name }} {{ $patient->physician->phy_last_name }}
                            @else
                                No Physician Assigned
                            @endif
                        </td>
                                                  @if(request('admissionType') == 'inpatient')
                              <td>{{  $patient->room_number }}</td>
                              <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                              <td>{{ $patient->discharge_date ? \Carbon\Carbon::parse($patient->discharge_date)->format('n/j/Y') : 'TBD' }}</td>                              
                              @elseif(request('admissionType') == 'outpatient')
                          <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                          {{-- <td>{{  $patient->follow_up_date }}</td> --}}
                          @elseif(request('admissionType') == 'archived')
                            <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('h:i A n/j/Y') }}</td>                            
                            <td>{{ \Carbon\Carbon::parse($patient->archived_at)->format('h:i A n/j/Y') }}</td>                        
                          @endif
                          <!-- Actions for all patients -->
                          <td style="text-align: center;">
                            <a href="/patient/{{$patient->patient_id}}" style="display: inline-block;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#418363"/>
                              </svg>
                              
                            </a>
                          </td>
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
</script>
@include('partials.footer')