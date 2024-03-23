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
  /* width: 50rem; */
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


</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
          <div class="box box1 flex-col flexi bg-custom-102 shadow">
            <p id="datePlaceholder" class="font-bold text-black"></p>
            <h1 id="timePlaceholder" class="font-bold text-black"></h1>
          </div>
          
          <div class="box bg-custom-101 shadow d-flex justify-content-center align-items-center position-relative">
            <span class="badge bg-success position-absolute top-0 end-0 font-small">Available</span>
            <div class="flexi">
                <div>
                    <img src="{{ asset('storage/image/laboratory.png') }}" alt="Laboratory Image" class="w-24 h-auto mr-4">
                </div>
                <div class="flex-col">
                    <h3 class="font-bold text-black text-big">Laboratory</h3>
                    <h5 class="font-bold text-black text-small">Services</h5>
                </div>
            </div>
        </div>
        
        
        


        <div class="box bg-custom-101 shadow d-flex justify-content-center align-items-center position-relative">
          <span class="badge bg-success position-absolute top-0 end-0">Available</span>
          <div class="flexi">
              <div>
                <img src="{{ asset('storage/image/imaging.png') }}" alt="Imaging Image" class="w-24 h-auto mr-4"> 
  <!-- <img src="/storage/image/imaging.png" alt="Imaging Image" class="w-24 h-auto mr-4">-->

              </div>
              <div class="flex-col">
                  <h3 class="font-bold text-black text-big">Imaging</h3>
                  <h5 class="font-bold text-black text-small">Services</h5>
              </div>
          </div>
      </div>
      

        
          <!-- Remove one box -->
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0 shadow">
            <div class="card-body m-1">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Patients</h4>
                <form class="d-flex" action="{{ route('nurse.index') }}" method="GET">
                    <div class="input-group mb-3">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
                    
    <hr>
    <table class="table table-striped mt-3 Add">
      <thead>
          <tr>
              {{-- <th scope="col"></th> --}}
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Age</th>
              <th scope="col">Room Number</th>
              <th scope="col">Attending Physician</th>
          </tr>
      </thead>
      <tbody>
        @forelse ($patients as $patient)
                <tr>
                    <td style="min-width: 100px;">{{ $patient->patient_id }}</td>
                    <td style="min-width: 200px;">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                    <td style="min-width: 100px;">{{ $patient->gender }}</td>
                    <td style="min-width: 50px;">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }}</td>
                    <td style="min-width: 100px;">{{ $patient->room_number }}</td>
                    <td style="min-width: 200px;">
                        @if ($patient->physician)
                            Dr. {{ $patient->physician->phy_first_name }} {{ $patient->physician->phy_last_name }}
                        @else
                            No attending physician
                        @endif
                    </td>
                </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No available patients</td>
            </tr>
        @endforelse  
    </tbody>
    
  </table>
  
              <div class="mt-4">
                {{ $patients->links() }}
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