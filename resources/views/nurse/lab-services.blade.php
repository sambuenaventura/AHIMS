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

{{-- <section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4>Requests</h4>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'pending' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'pending']) }}">Pending Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'accepted' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'accepted']) }}">Accepted Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'completed' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'completed']) }}">Completed Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'declined' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'declined']) }}">Declined Requests</a>
                    </li>
                    
                    
                    
                    
                    
                    
                </ul>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Type of Service</th>
                            <th scope="col">Date Requested</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->patient_id }}</td>
                            <td>{{ optional($request->patient)->first_name }} {{ optional($request->patient)->last_name }}</td>
                            <td>{{ $request->procedure_type }}</td>
                            <td>{{ $request->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $requests->appends(['requestType' => request('requestType')])->links() }}
                </div>
            </div>
        </div>
    </div>
</section> --}}


<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Laboratory Requests</h4>
                    <form action="{{ route('nurse.viewRequestLab', ['status' => request('status')]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                            <input type="hidden" name="status" value="{{ request('status') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'pending' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'pending']) }}">Pending Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'accepted' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'accepted']) }}">Accepted Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'completed' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'completed']) }}">Completed Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') === 'declined' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestLab', ['status' => 'declined']) }}">Declined Requests</a>
                    </li>
                </ul>
                
                
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Type of Service</th>
                            <th scope="col">Date Requested</th>
                            @if(!$status)
                                <th scope="col">Status</th>
                            @endif
                            @if(request('status') === 'pending')
                                <th scope="col">Nurse on Duty</th>
                            @endif
                            @if(request('status') === 'accepted')
                                <th scope="col">MedTech on Duty</th>
                            @endif
                            @if(request('status') === 'completed')
                                <th scope="col">Date Completed</th>
                                <th scope="col" style="text-align: center;">View File</th>
                            @endif
                            @if($status == 'declined')
                                <th scope="col">Date Declined</th>
                                <th scope="col">MedTech on Duty</th>
                            @endif
                            @if($status == 'declined')
                                <th scope="col">Reason</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->patient_id }}</td>
                                <td>{{ optional($request->patient)->first_name }} {{ optional($request->patient)->last_name }}</td>
                                <td>{{ $request->procedure_type }}</td>
                                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('h:i A n/j/Y') }}</td>         
                                @if(request('status') === 'pending')
                                <td>{{ optional($request->nurse)->first_name }} {{ optional($request->nurse)->last_name }}</td>
                                @endif                   
                                @if(request('status') === 'accepted')
                                <td>{{ optional($request->medtech)->first_name }} {{ optional($request->medtech)->last_name }}</td>                                
                                @endif
                                @if(request('status') === 'completed')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            
                                <td style="text-align: center;">
                                    <a href="{{ route('nurse.viewRequest', ['patientId' => $request->patient_id, 'requestId' => $request->request_id]) }}" style="display: inline-block;">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="vertical-align: middle;">
                                            <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#418363"/>
                                        </svg> --}}
                                        <svg fill="#418363" height="24" width="24"  style="vertical-align: middle;" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231.306 231.306" xmlns:xlink="http://www.w3.org/1999/xlink" >
                                            <g>
                                              <path d="M229.548,67.743L163.563,1.757C162.438,0.632,160.912,0,159.32,0H40.747C18.279,0,0,18.279,0,40.747v149.813   c0,22.468,18.279,40.747,40.747,40.747h149.813c22.468,0,40.747-18.279,40.747-40.747V71.985   C231.306,70.394,230.673,68.868,229.548,67.743z M164.32,19.485l47.5,47.5h-47.5V19.485z M190.559,219.306H40.747   C24.896,219.306,12,206.41,12,190.559V40.747C12,24.896,24.896,12,40.747,12H152.32v60.985c0,3.313,2.687,6,6,6h60.985v111.574   C219.306,206.41,206.41,219.306,190.559,219.306z"/>
                                              <path d="m103.826,52.399c-5.867-5.867-13.667-9.098-21.964-9.098s-16.097,3.231-21.964,9.098c-5.867,5.867-9.098,13.667-9.098,21.964 0,8.297 3.231,16.097 9.098,21.964l61.536,61.536c7.957,7.956 20.9,7.954 28.855,0 7.955-7.956 7.955-20.899 0-28.855l-60.928-60.926c-2.343-2.343-6.143-2.343-8.485,0-2.343,2.343-2.343,6.142 0,8.485l60.927,60.927c3.276,3.276 3.276,8.608 0,11.884s-8.607,3.276-11.884,0l-61.536-61.535c-3.601-3.601-5.583-8.388-5.583-13.479 0-5.092 1.983-9.879 5.583-13.479 7.433-7.433 19.525-7.433 26.958,0l64.476,64.476c11.567,11.567 11.567,30.388 0,41.955-5.603,5.603-13.053,8.689-20.977,8.689s-15.374-3.086-20.977-8.689l-49.573-49.574c-2.343-2.343-6.143-2.343-8.485,0-2.343,2.343-2.343,6.142 0,8.485l49.573,49.573c7.87,7.87 18.333,12.204 29.462,12.204s21.593-4.334 29.462-12.204 12.204-18.333 12.204-29.463c0-11.129-4.334-21.593-12.204-29.462l-64.476-64.476z"/>
                                            </g>
                                          </svg>
                                    </a>
                                </td>
                                @endif
                                @if($status == 'declined')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif                                
                                @if($status == 'declined')
                                <td>{{ optional($request->medtech)->first_name }} {{ optional($request->medtech)->last_name }}</td>                                

                                <td style="min-width: 140px;">{{ $request->message }}</td>
                                @endif  
                                @if(!$status)
                                <td>
                                    <span class="badge @if($request->status == 'completed') bg-success @elseif($request->status == 'declined') bg-danger @elseif($request->status == 'accepted') bg-primary @elseif($request->status == 'pending') bg-secondary @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>                    
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {{ $requests->appends(['requestType' => request('requestType')])->links() }} --}}
                    {{ $requests->appends(['status' => request('status'), 'search' => request('search')])->links() }}
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
