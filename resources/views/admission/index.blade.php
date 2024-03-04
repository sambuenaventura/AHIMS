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
          
          {{-- <div class="box flex-row bg-custom-101 shadow">
            <img src="{{ asset('storage/image/inpatient.png') }}" alt="Inpatient Image" class="w-24 h-auto mr-4">
            <div class="flex flex-col justify-between">
                <h1 class="font-bold text-black">{{ $inpatientCount }}</h1>
                <p>Inpatient</p>
            </div>
          </div> --}}


          <div class="box flexi flex-row bg-custom-101 shadow">
                <div>
                    <img src="{{ asset('storage/image/inpatient.png') }}" alt="Inpatient Image" class="w-24 h-auto mr-4">
                </div>
                <div class="flex-col">
                  <h1 class="font-bold text-black">{{ $inpatientCount }}</h1>
                  <p class="mb-1">Inpatient</p>
                </div>
          </div>


          <div class="box flexi flex-row bg-custom-101 shadow">
              <div>
                  <img src="{{ asset('storage/image/outpatient.png') }}" alt="Outpatient Image" class="w-24 h-auto mr-4">
              </div>
              <div class="flex-col">
                <h1 class="font-bold text-black">{{ $outpatientCount }}</h1>
                <p class="mb-1">Outpatient</p>
              </div>
          </div>

          <!-- Remove one box -->
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0 shadow">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Doctors</h4>
                    <form class="d-flex" action="{{ route('admission.index') }}" method="GET">
                      <div class="input-group mb-3">

                      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                      <!-- Hidden input field for the specialty -->
                      <input type="hidden" name="specialty" value="{{ request('specialty') }}">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                      </div>
                  </form>
                  
                  
                </div>
    
                <ul class="nav nav-underline overflow-x-auto">
                  <!-- List item for Internist -->
                  <li class="nav-item">
                    <a class="nav-link {{ request('specialty') == 'Internal_Medicine' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Internal_Medicine', 'search' => request('search')]) }}">Internist</a>
                  </li>
                  <!-- List item for Gastroenterologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Gastroenterology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Gastroenterology']) }}">Gastroenterologist</a>
                  </li>
                  <!-- List item for Neurologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Neurology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Neurology']) }}">Neurologist</a>
                  </li>
                  <!-- List item for Cardiologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Cardiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Cardiology']) }}">Cardiologist</a>
                  </li>
                  <!-- List item for Pulmonologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Pulmonology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Pulmonology']) }}">Pulmonologist</a>
                  </li>
                  <!-- List item for Pediatrician -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Pediatrics' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Pediatrics']) }}">Pediatrician</a>
                  </li>
                  <!-- List item for Endocrinologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Endocrinology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Endocrinology']) }}">Endocrinologist</a>
                  </li>
                  <!-- List item for Otolaryngologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Otolaryngology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admission.index', ['specialty' => 'Otolaryngology']) }}">Otolaryngologist</a>
                  </li>
                </ul>
              
    
              {{-- <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th> <!-- Removed text-center class -->
                          <th scope="col">No. Patients</th> <!-- Removed text-center class -->
                          <th scope="col">Availability</th> <!-- Removed text-center class -->
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($physicians as $physician)
                      <tr>
                        <td>{{ $physician->physician_id }}</td>
                        <td>{{ $physician->phy_first_name }} {{ $physician->phy_last_name }}</td>
                          <td>xxx</td>
                          <td>xxx</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table> --}}
              <table class="table table-striped mt-3 Add">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">No. Patients</th>
                        <th scope="col">Availability</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($physicians as $physician)
                    <tr>
                        <td>{{ $physician->physician_id }}</td>
                        <td>{{ $physician->phy_first_name }} {{ $physician->phy_last_name }}</td>
                        <td>{{ $physician->patients()->count() }}</td> <!-- Display the number of patients -->
                        <td>
                          @if(empty($physician->availability))
                              Availability not set
                          @else
                              {{ $physician->availability }}
                          @endif
                      </td>
                                              {{-- <td><span style="color:green; font-size: 1.25em;">•</span> Available</td> <!-- You can add availability status here --> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            
            <div class="mt-4">
              {{ $physicians->appends(['specialty' => request('specialty'), 'search' => request('search')])->links() }}
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