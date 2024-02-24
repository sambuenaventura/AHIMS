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
  justify-content: center;
  font-family: sans-serif;
  gap: 1.25rem;
  width: 22rem; /* Set a fixed width */
  /*height: 14rem;  Set a fixed height 
  overflow: hidden;*/
  padding: 2rem;
  font-size: 1em;

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
.flexi {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
    justify-content: space-between;
}


    .flex-col {
    display: flex;
    flex-direction: column;
    }
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<style>
    
    </style>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
            <div class="box box1 flex-col bg-custom-101">
                <div class="left-top-1">
                    <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                    <p class="font-bold">{{  $patient->patient_id }} - Patient ID</p>
                </div>
                <div class="left-top-2 flexi">
                    <p>{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</p>
                    <p>Weight</p>
                    <p>Blood Pressure</p>
                </div>
            </div>
                <div class="left-bottom bg-white">
                    <div class="left-bottom-top">
                        <h3>Patient Information</h3>
                        <div class="flexi">
                            <p>Name</p>
                            <p>XXXX</p>
                        </div>
                        <div class="flexi">
                            <p>Birth Date:</p>
                            <p>XXXX</p>
                        </div>
                        <div class="flexi">
                            <p>Gender</p>
                            <p>XXXX</p>
                        </div>
                        <div class="flexi">
                            <p>Contact Number</p>
                            <p>XXXX</p>
                        </div>
                        <div class="flexi">
                            <p>Address</p>
                            <p>XXXX</p>
                        </div>
                    </div>
                    <div class="left-bottom-bottom">
                        <h3>Person In-charge Information</h3>
                        <div class="flexi">
                        <p>{{  $patient->pic_first_name }} {{  $patient->pic_last_name }}</p>
                        </div>
                        <div class="flexi">
                        <p>{{  $patient->pic_relation }} {{  $patient->pic_contact_number }}</p>
                        </div>
                    </div>
                </div>
          
          {{-- <div class="box flex bg-custom-101">
            <img src="{{ asset('storage/image/laboratory.png') }}" alt="Inpatient Image" class="w-24 h-auto mr-4">
            <div class="flex flex-col justify-between">
                <h2 class="font-bold text-black">Laboratory</h2>
                <p>Services</p>
            </div>
          </div>
          <div class="box flex bg-custom-101">
            <img src="{{ asset('storage/image/imaging.png') }}" alt="Outpatient Image" class="w-24 h-auto mr-4">
            <div class="flex flex-col justify-between">
              <h2 class="font-bold text-black">Imaging</h2>
              <p>Services</p>
            </div>
          </div> --}}
          <!-- Remove one box -->
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0">
            <div class="card-body m-1">
              <div class="d-flex justify-content-between mb-4">
                <h4>Today's Patients</h4>
                <form class="d-flex" action="{{ route('nurse.index') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
                    
    <hr>
                <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col"></th>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th> <!-- Removed text-center class -->
                          <th scope="col">Gender</th> <!-- Removed text-center class -->
                          <th scope="col">Age</th> <!-- Removed text-center class -->                        
                          <th scope="col">Room Number</th> <!-- Removed text-center class -->
                          <th scope="col">Attending Physician</th> <!-- Removed text-center class -->
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('g:i A') }}</td>
                        <td>{{  $patient->patient_id }}</td>
                        <td>{{  $patient->first_name }} {{  $patient->last_name }}</td>
                        <td>{{  $patient->gender }}</td>
                        <td>{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</td>
                        <td>{{ $patient->room_number }}</td>
                        <td>{{ $patient->specialist }}</td>
                      </tr>
                  </tbody>
              </table>
              <div class="mt-4">
                {{-- {{ $patients->links() }} --}}
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

    
</script>
@include('partials.footer')