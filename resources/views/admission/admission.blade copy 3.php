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
.personnel {
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
                    <form class="d-flex" action="{{ route('admission.view') }}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
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
                              <th scope="col">Visit Date</th>
                              <th scope="col">Follow-up Date</th>
                          @elseif(request('admissionType') == 'archived')
                              <th scope="col">Archived Date</th>
                          @endif
                          @if(request('admissionType') != 'archived')
                              <th scope="col">Edit</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($patients as $patient)
                      <tr>
                          <td>{{  $patient->patient_id }}</td>
                          <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                          <td>{{  $patient->specialist }}</td>
                          @if(request('admissionType') == 'inpatient')
                              <td>{{  $patient->room_number }}</td>
                              <td>{{  $patient->created_at }}</td>
                              <td>{{  $patient->discharge_date }}</td>
                          @elseif(request('admissionType') == 'outpatient')
                              <td>xxx</td>
                              <td>xxx</td>
                          @elseif(request('admissionType') == 'archived')
                              <td>{{  $patient->created_at }}</td>
                          @endif
                          @if(request('admissionType') != 'archived')
                              <td>
                                  <a href="/patient/{{$patient->patient_id}}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>
                              </td>
                          @endif
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
              <div class="mt-4">
                {{ $patients->links() }}
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