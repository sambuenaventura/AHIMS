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

/* .nav-link {
    border-radius: 0.25rem;
    padding: 0.75rem 0.5rem !important;
    font-weight: 700;
    color: #418363 !important;
    border-bottom: none !important;
    font-size: 0.95em;
}

.nav-link:hover {
    background-color: #418363;
    border-radius: 0.35rem;
    color: white !important;
    font-weight: 700;
    padding: 0.75rem 0.5rem;

}
.active {
    color: white !important;

} */

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>



<section id="admission">
    <div class="admission-content">
        <div class="card pe-0">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Imaging Requests</h4>
                    <form action="{{ route('nurse.viewRequestImaging', ['status' => request('status')]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                            <input type="hidden" name="status" value="{{ request('status') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request('status') === 'pending' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestImaging', ['status' => 'pending']) }}">Pending Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request('status') === 'accepted' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestImaging', ['status' => 'accepted']) }}">Accepted Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request('status') === 'completed' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestImaging', ['status' => 'completed']) }}">Completed Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request('status') === 'declined' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('nurse.viewRequestImaging', ['status' => 'declined']) }}">Declined Requests</a>
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
                                <th scope="col"></th>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="vertical-align: middle;">
                                                <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" fill="#418363"/>
                                            </svg>
                                        </a>
                                    </td>

                                @endif
                                @if($status == 'declined')
                                <td>{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>                            

                                @endif                                
                                @if($status == 'declined')
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
