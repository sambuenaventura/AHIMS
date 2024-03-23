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
                    <h4 class="font-bold">Imaging Requests</h4>
                    <form action="{{ route('radtech.requests') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="status" value="{{ $status }}">
                            <button type="submit" class="btn btn-outline-success">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'pending' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('radtech.requests', ['status' => 'pending']) }}">Pending Requests</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'accepted' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('radtech.requests', ['status' => 'accepted']) }}">Accepted Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'completed' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('radtech.requests', ['status' => 'completed']) }}">Completed Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'declined' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('radtech.requests', ['status' => 'declined']) }}">Declined Requests</a>
                    </li>
                
                    
                </ul>


                
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Request ID</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">Test</th>
                            <th scope="col">Date Requested</th>
                            @if($status == 'accepted')
                                <th scope="col"></th>
                            @endif
                            @if(!$status)
                                <th scope="col">Status</th>
                            @endif
                            @if($status == 'completed')
                                <th scope="col">Date Completed</th>
                            @endif
                            @if($status == 'declined')
                                <th scope="col">Date Declined</th>
                            @endif
                            @if($status == 'declined')
                                <th scope="col">Reason</th>
                            @endif                     
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr>
                                <td>{{ $request->request_id }}</td> <!-- Display the request ID -->
                                <td>{{ $request->patient_id }}</td>
                                <td>{{ optional($request->patient)->first_name }} {{ optional($request->patient)->last_name }}</td>
                                <td style="max-width: 80px;">{{ ucfirst($request->procedure_type) }}</td>
                                <td style="min-width: 180px;">{{ $request->sender_message }}</td>
                                <td style="min-width: 140px;">{{ \Carbon\Carbon::parse($request->created_at)->format('h:i A n/j/Y') }}</td>                            
                                @if($status == 'completed')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif                                
                                @if($status == 'declined')
                                <td style="min-width: 140px;">{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif 
                                @if($status == 'declined')
                                <td style="min-width: 140px;">{{ $request->message }}</td>
                                @endif  
                                @if($status == 'accepted')

                                <td style="text-align: center;">
                                    <div class="">
                                      <a href="/radtech-patients/{{ $request->patient_id }}/requests/{{ $request->request_id }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center gap-0.5" style="font-size: 1em;">
                                          <span class="p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18">
                                                <path fill="#ffff" d="M680-320q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM440-40v-116q0-21 10-39.5t28-29.5q32-19 67.5-31.5T618-275l62 75 62-75q37 6 72 18.5t67 31.5q18 11 28.5 29.5T920-156v116H440Zm-80-116v36H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v200q-31-39-70-59.5T680-640v-40H280v80h280q-20 16-36 36t-27 44H280v80h200q0 21 4.5 41t12.5 39H280v80h138q-27 23-42.5 55.5T360-156Z"/>
                                            </svg>
                                          </span>
                                          <span class="p-1 rounded">Process Request</span>
                                      </a>
                                    </div>
                                </td> 
                                @endif
                                @if(!$status)
                                <td>
                                    <span class="badge @if($request->status == 'completed') bg-success @elseif($request->status == 'declined') bg-danger @elseif($request->status == 'accepted') bg-primary @elseif($request->status == 'pending') bg-secondary @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>                    
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No imaging requests</td>
                            </tr>
                        @endforelse  
                    </tbody>
                </table>
                


                <div class="mt-4">
                    {{ $requests->appends(['status' => $status, 'search' => request('search')])->links() }}
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
