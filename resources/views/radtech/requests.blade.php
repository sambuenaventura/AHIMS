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
                    <h4>Requests</h4>
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
                            <th scope="col">Date Requested</th>
                            @if($status == 'accepted')
                                <th scope="col">Action</th>
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
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->request_id }}</td> <!-- Display the request ID -->
                                <td>{{ $request->patient_id }}</td>
                                <td>{{ optional($request->patient)->first_name }} {{ optional($request->patient)->last_name }}</td>
                                <td>{{ ucfirst($request->procedure_type) }}</td>
                                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('h:i A n/j/Y') }}</td>                            
                                @if($status == 'completed')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif                                
                                @if($status == 'declined')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif 
                                @if($status == 'declined')
                                <td style="min-width: 140px;">{{ $request->message }}</td>
                                @endif  
                                @if($status == 'accepted')
                                    <td>
                                        <a href="/radtech-patients/{{ $request->patient_id }}/requests/{{ $request->request_id }}" class="btn btn-success">View</a>
                                    </td>
                                @endif
                                @if(!$status)
                                <td>{{ ucfirst($request->status) }}</td>
                            @endif
                            </tr>
                        @endforeach
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
