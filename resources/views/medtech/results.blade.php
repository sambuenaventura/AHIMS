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
                    <h4 class="font-bold">Laboratory Results</h4>
                    <form action="{{ route('medtech.results') }}" method="GET" class="d-flex">
                        <input type="hidden" name="procedure" value="{{ $procedureType }}">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ $search }}">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </form>
                    
                    
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Chemistry' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Chemistry']) }}">Chemistry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Hematology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Hematology']) }}">Hematology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Bbis' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Bbis']) }}">BB-IS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Parasitology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Parasitology']) }}">Parasitology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microbiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Microbiology']) }}">Microbiology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microscopy' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('medtech.results', ['procedure' => 'Microscopy']) }}">Microscopy</a>
                    </li>
                </ul>
                


                
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            @if(empty($procedureType)) <!-- Show Service Type column only if no procedure type filter is applied -->
                                <th scope="col">Service</th>
                            @endif                            
                        <th scope="col">Date Performed</th>
                            <th scope="col">Time Performed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $request)
                        <tr>
                            <td>
                                <a class="d-flex flex-row gap-2 text-success font-bold" href="{{ route('medtech.viewRequest', ['patientId' => $request->patient_id, 'requestId' => $request->request_id]) }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_1387_10854" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                            <rect width="24" height="24" fill="#D9D9D9"/>
                                        </mask>
                                        <g mask="url(#mask0_1387_10854)">
                                            <path d="M9 18H15C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17C16 16.7167 15.9042 16.4792 15.7125 16.2875C15.5208 16.0958 15.2833 16 15 16H9C8.71667 16 8.47917 16.0958 8.2875 16.2875C8.09583 16.4792 8 16.7167 8 17C8 17.2833 8.09583 17.5208 8.2875 17.7125C8.47917 17.9042 8.71667 18 9 18ZM9 14H15C15.2833 14 15.5208 13.9042 15.7125 13.7125C15.9042 13.5208 16 13.2833 16 13C16 12.7167 15.9042 12.4792 15.7125 12.2875C15.5208 12.0958 15.2833 12 15 12H9C8.71667 12 8.47917 12.0958 8.2875 12.2875C8.09583 12.4792 8 12.7167 8 13C8 13.2833 8.09583 13.5208 8.2875 13.7125C8.47917 13.9042 8.71667 14 9 14ZM6 22C5.45 22 4.97917 21.8042 4.5875 21.4125C4.19583 21.0208 4 20.55 4 20V4C4 3.45 4.19583 2.97917 4.5875 2.5875C4.97917 2.19583 5.45 2 6 2H13.175C13.4417 2 13.6958 2.05 13.9375 2.15C14.1792 2.25 14.3917 2.39167 14.575 2.575L19.425 7.425C19.6083 7.60833 19.75 7.82083 19.85 8.0625C19.95 8.30417 20 8.55833 20 8.825V20C20 20.55 19.8042 21.0208 19.4125 21.4125C19.0208 21.8042 18.55 22 18 22H6ZM13 8C13 8.28333 13.0958 8.52083 13.2875 8.7125C13.4792 8.90417 13.7167 9 14 9H18L13 4V8Z" fill="#418363"/>
                                        </g>
                                    </svg>
                                    @if ($request->image)
                                        @php
                                            $images = json_decode($request->image);
                                        @endphp
                                        <ul>
                                            @foreach ($images as $image)
                                                <li>{{ basename($image) }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No images available</p>
                                    @endif
                                </a>                           
                            </td>
                            <td>{{ $request->patient_id }}</td>
                            <td>{{ $request->patient->first_name }} {{ $request->patient->last_name }}</td>
                            @if(empty($procedureType)) <!-- Show Service Type column only if no procedure type filter is applied -->
                                <td>{{ ucfirst($request->procedure_type) }}</td>
                            @endif                            
                        <td>{{ $request->created_at->format('n/j/Y') }}</td>
                            <td>{{ $request->created_at->format('h:i A') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No laboratory results</td>
                        </tr>
                    @endforelse                      
                </tbody>
                </table>
                
                
                


                {{-- <div class="mt-4">
                    {{ $requests->appends(['requestType' => request('requestType')])->links() }}
                </div> --}}
                <div class="mt-4">
                    {{ $requests->appends(['search' => $search, 'procedure' => $procedureType])->links() }}
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
