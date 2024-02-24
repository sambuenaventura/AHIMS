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
                    <form class="d-flex" action="{{ route('nurse.view') }}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
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
                </ul>
                
                
                
                
    
                <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col">Patient ID</th>
                          <th scope="col">Patient Name</th> <!-- Removed text-center class -->
                          <th scope="col">Specialist</th> <!-- Removed text-center class -->
                          <th scope="col">Room Number</th> <!-- Removed text-center class -->
                          <th scope="col">Admission Date</th> <!-- Removed text-center class -->
                          <th scope="col">Discharge Date</th> <!-- Removed text-center class -->
                          <th scope="col">Edit</th> <!-- Removed text-center class -->
                          <th scope="col">Archive</th> <!-- Removed text-center class -->
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{  $patient->patient_id }}</td>
                        <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                        <td>{{  $patient->specialist }}</td>
                          <td>{{  $patient->room_number }} </td>
                          <td>{{  $patient->created_at }}</td>
                          <td>{{  $patient->discharge_date }}</td>
                          <td><a href="/nurse-patients/{{$patient->patient_id}}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
                          <td>
                            <form action="{{ route('archive.patient', ['patient_id' => $patient->patient_id]) }}" method="POST">
                              @csrf
                              <label for="password">Password:</label>
                              <input type="password" id="password" name="password" required>
                              <button type="submit" onclick="return confirm('Are you sure you want to archive this patient?')">Archive Patient</button>
                          </form>
                          
                          
                          </td>
                          </td>
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


</script>
@include('partials.footer')