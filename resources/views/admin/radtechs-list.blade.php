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
                    <h4 class="font-bold">Radiologic Technologists</h4>
                    <form class="d-flex" action="{{ route('admin.radtechsView') }}" method="GET">
                      <div class="input-group mb-3">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                      </div>
                  </form>
                  
                  
                </div>
                
    
                <table class="table table-striped mt-3 Add">
                  <thead>
                      <tr>
                          <th scope="col">Radiologic Technologist ID</th>
                          <th scope="col">Radiologic Technologist Name</th>
                          <th scope="col">Student Number</th>
                          <th scope="col">HAU Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($radtechs as $radtech)
                      <tr>
                          <td>{{ $radtech->id }}</td>
                          <td>{{ $radtech->first_name }} {{ $radtech->last_name }}</td> 
                          {{-- <td>{{ $radtech->student_number }}</td> <!-- Student Number --> --}}
                          <td>xxxx</td> 
                          <td>{{ $radtech->email }}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
              
              
              <div class="mt-4">
                {{ $radtechs->appends(['search' => request('search')])->links() }}
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