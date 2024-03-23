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
                    <h4 class="font-bold">Physicians</h4>
                    <form class="d-flex" action="{{ route('admin.doctorsView') }}" method="GET">
                      <div class="input-group mb-3">

                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                        <!-- Hidden input field for the specialty -->
                      <input type="hidden" name="specialty" value="{{ request('specialty') }}">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                      </div>
                  </form>
                </div>
                
                

                <ul class="nav nav-underline overflow-x-auto">
                  <!-- List item for Internist -->
                  <li class="nav-item">
                    <a class="nav-link {{ request('specialty') == 'Internal_Medicine' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Internal_Medicine', 'search' => request('search')]) }}">Internist</a>
                  </li>
                  <!-- List item for Gastroenterologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Gastroenterology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Gastroenterology']) }}">Gastroenterologist</a>
                  </li>
                  <!-- List item for Neurologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Neurology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Neurology']) }}">Neurologist</a>
                  </li>
                  <!-- List item for Cardiologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Cardiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Cardiology']) }}">Cardiologist</a>
                  </li>
                  <!-- List item for Pulmonologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Pulmonology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Pulmonology']) }}">Pulmonologist</a>
                  </li>
                  <!-- List item for Pediatrician -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Pediatrics' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Pediatrics']) }}">Pediatrician</a>
                  </li>
                  <!-- List item for Endocrinologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Endocrinology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Endocrinology']) }}">Endocrinologist</a>
                  </li>
                  <!-- List item for Otolaryngologist -->
                  <li class="nav-item">
                      <a class="nav-link {{ request('specialty') == 'Otolaryngology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('admin.doctorsView', ['specialty' => 'Otolaryngology']) }}">Otolaryngologist</a>
                  </li>
                </ul>
    
                <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Specialty</th>
                          <th scope="col">No. of Patients</th>
                          <th scope="col">Availability</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($physicians as $physician)
                    <tr>
                        <td>{{ $physician->physician_id }}</td>
                        <td>Dr. {{ $physician->phy_first_name }} {{ $physician->phy_last_name }}</td>
                        <td>{{ str_replace('_', ' ', $physician->specialty) }}</td>
                        <td>{{ $physician->patients()->count() }}</td> <!-- Display the number of patients -->
                        <td style="min-width: 200px;">
                          @if(empty($physician->availability))
                              Availability not set
                          @else
                              {{ $physician->availability }}
                          @endif
                      </td>                        {{-- <td><span style="color:green; font-size: 1.25em;">•</span> Available</td> <!-- You can add availability status here --> --}}
                        {{-- <td>{{ $physician->phy_contact_number }}</td> --}}
                        <!-- Add more columns if needed -->
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No physicians found</td>
                    </tr>
                @endforelse                  
              </tbody>
                
              </table>
              
              
              <div class="mt-4">
                {{ $physicians->appends(['specialty' => request('specialty'), 'search' => request('search')])->links() }}
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