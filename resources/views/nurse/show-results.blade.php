@include('partials.header', ['bgColor' => 'bg-custom-700'])

<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>

@include('partials.header', [$title])
<style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  background-color: #eee;
}
/* .collapse:not(.show) {
    display: block;
    visibility: visible;
    height: auto;
} */
.custom-collapse {
    display: none;
    overflow: hidden;
}
.custom-collapse.show {
    display: block;
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
  /* padding: 20px; */
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
  padding: 2rem 2.5rem;
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
.card-header {
    transition: 0.3s;

}

.flex-col {
    display: flex;
    flex-direction: column;
}
.flex-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}



.history-label {
    width: 180px; /* Set a fixed width */
    /* Your additional styling for the history label */
}

.history-value {
    flex: 1; /* Fill remaining space */
    /* Your additional styling for the history value */
}
.patient-complete-history p {
    font-size: 0.9em;
}

.nurse-remark p {
    font-size: 0.9em;
}
#patientOptionsOverlay {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(38, 77, 56, 0.8) !important; */
    background-color: rgb(23 73 46 / 56%) !important;
    z-index: 10000;
}

.label {
    display: flex;
    gap: 2rem;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.label-opt {
    display: flex;
    width: 12rem;
    height: 12rem;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    background-color: #5DA07F;
}
#patientOptions {
    width: 40rem; /* Adjust this value to modify the width of the modal */
    height: 22rem;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    display: flex; 
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Adjust this value to change the vertical spacing */
    
}
.flexi {
    display: flex;
    flex-direction: row;
    gap: 2rem;
}

#patientOptions label {
    /* Styles for labels inside the modal */
}

#patientOptions button {
    /* Styles for button inside the modal */
}

#patientOptions p#error-message {
    color: red;
    display: none;
    /* Additional styles for error message inside the modal */
}
  </style>

<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
            <div class="box box1 flex-col bg-custom-101 shadow-md" style="z-index: 999;">
                <div class="left-top-1">
                    <p class="font-bold">ID{{  $patient->patient_id }}</p>
                    <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                </div>
                <div class="left-top-2 flexi">
                    <p class="font-bold">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }} y/o</p>
                    <p class="font-bold">{{ optional($patient->physicalExamination)->vitals_weight }} kg</p>
                    <p class="font-bold">{{ optional($patient->physicalExamination)->vitals_blood_pressure }} mmHg</p>
                </div>




            </div>
            <div class="box box1 flex-col bg-white shadow-md" style="margin-top: -20px;">
                <p class="font-bold mt-4">Patient Information</p>
                <div class="left-top-1 flex-row">
                    <p class="">Name:</p>
                    <p class="">{{  $patient->first_name }} {{  $patient->last_name }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Birth Date:</p>
                    <p class="">{{  $patient->date_of_birth }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Gender:</p>
                    <p class="">{{  $patient->gender }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Contact Number:</p>
                    <p class="">{{  $patient->contact_number }}</p>
                </div>
                <div class="left-top-1 flexi text-right">
                    <p class="">Address:</p>
                    <p class="">{{  $patient->address }}</p>
                </div>
            </div>
            <div class="box box1 flex-col bg-white shadow-md" style="margin-top: -20px;">
                <p class="font-bold">Person In-charge Information</p>
                <div class="left-top-1 flex-row">
                    <p class="">Name:</p>
                    <p class="">{{  $patient->pic_first_name }} {{  $patient->pic_last_name }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Relation to Patient:</p>
                    <p class="">{{  $patient->pic_relation }}</p>
                </div>
                <div class="left-top-1 flex-row">
                    <p class="">Contact Number:</p>
                    <p class="">{{  $patient->pic_contact_number }}</p>
                </div>

            </div>
        
            
        </div>
      </div>
      
      <div class="right">

<!-- Overlay for patient options -->


        {{-- MEDTECH RESULTS --}}
        {{-- @if ($medtechCompletedResults->isNotEmpty()) --}}
        {{-- <div id="medtechResults" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Results</h4>
                    <form action="{{ route('showResults', ['patientId' => $patient->patient_id]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->input('search') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Chemistry' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Chemistry']) }}">Chemistry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Hematology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Hematology']) }}">Hematology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Bbis' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Bbis']) }}">BB-IS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Parasitology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Parasitology']) }}">Parasitology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microbiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Microbiology']) }}">Microbiology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microscopy' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Microscopy']) }}">Microscopy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Xray' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Xray']) }}">X-Ray</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ultrasound' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Ultrasound']) }}">Ultrasound</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ctscan' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Ctscan']) }}">CT Scan</a>
                    </li>
                </ul>
                
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th class="text-center" scope="col">Date Performed</th>
                            <th class="text-center" scope="col">Date Completed</th>
                            <th class="text-center" scope="col">Technician on duty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medtechCompletedResults->merge($radtechCompletedResults) as $result)
                            <tr>
                                <td>
                                    <a class="d-flex flex-row-none gap-2 text-success font-bold" href="{{ route('nurse.viewRequest', ['patientId' => $result->patient_id, 'requestId' => $result->request_id]) }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_1387_10854" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <rect width="24" height="24" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_1387_10854)">
                                                <path d="M9 18H15C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17C16 16.7167 15.9042 16.4792 15.7125 16.2875C15.5208 16.0958 15.2833 16 15 16H9C8.71667 16 8.47917 16.0958 8.2875 16.2875C8.09583 16.4792 8 16.7167 8 17C8 17.2833 8.09583 17.5208 8.2875 17.7125C8.47917 17.9042 8.71667 18 9 18ZM9 14H15C15.2833 14 15.5208 13.9042 15.7125 13.7125C15.9042 13.5208 16 13.2833 16 13C16 12.7167 15.9042 12.4792 15.7125 12.2875C15.5208 12.0958 15.2833 12 15 12H9C8.71667 12 8.47917 12.0958 8.2875 12.2875C8.09583 12.4792 8 12.7167 8 13C8 13.2833 8.09583 13.5208 8.2875 13.7125C8.47917 13.9042 8.71667 14 9 14ZM6 22C5.45 22 4.97917 21.8042 4.5875 21.4125C4.19583 21.0208 4 20.55 4 20V4C4 3.45 4.19583 2.97917 4.5875 2.5875C4.97917 2.19583 5.45 2 6 2H13.175C13.4417 2 13.6958 2.05 13.9375 2.15C14.1792 2.25 14.3917 2.39167 14.575 2.575L19.425 7.425C19.6083 7.60833 19.75 7.82083 19.85 8.0625C19.95 8.30417 20 8.55833 20 8.825V20C20 20.55 19.8042 21.0208 19.4125 21.4125C19.0208 21.8042 18.55 22 18 22H6ZM13 8C13 8.28333 13.0958 8.52083 13.2875 8.7125C13.4792 8.90417 13.7167 9 14 9H18L13 4V8Z" fill="#418363"/>
                                            </g>
                                        </svg>
                                        @if ($result->image)
                                            @php
                                                $images = json_decode($result->image);
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
                                <td class="text-center">{{ $result->created_at->format('h:i A n/j/Y' ) }}</td>
                                <td class="text-center">{{ $result->updated_at->format('h:i A n/j/Y' ) }}</td>
                                <td class="text-center">{{ optional($result->medtech)->first_name }} {{ optional($result->medtech)->last_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No available results</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $medtechCompletedResults->links() }}
                </div>
            </div>
        </div> --}}
        <div id="completedResults" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Results</h4>
                    <form action="{{ route('showResults', ['patientId' => $patient->patient_id]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->input('search') }}">
                            <input type="hidden" name="test" value="{{ request('sender_message') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                    
                    
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Chemistry' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Chemistry')">Chemistry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Hematology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Hematology')">Hematology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Bbis' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Bbis')">BB-IS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Parasitology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Parasitology')">Parasitology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microbiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Microbiology')">Microbiology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microscopy' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Microscopy')">Microscopy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Xray' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Xray')">X-Ray</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ultrasound' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Ultrasound')">Ultrasound</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ctscan' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="javascript:void(0)" onclick="toggleProcedure('Ctscan')">CT Scan</a>
                    </li>
                </ul>
                
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col">File</th>
                            <th scope="col">Test</th>
                            <th scope="col">Date Needed</th>
                            <th scope="col">Date Completed</th>
                            <th scope="col">Staff on duty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($completedResults as $result)
                            <tr>
                                <td>
                                    <a class="d-flex flex-row-none align-items-center text-success font-bold gap-1" href="{{ route('nurse.viewRequest', ['patientId' => $result->patient_id, 'requestId' => $result->request_id]) }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_1387_10854" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <rect width="24" height="24" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_1387_10854)">
                                                <path d="M9 18H15C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17C16 16.7167 15.9042 16.4792 15.7125 16.2875C15.5208 16.0958 15.2833 16 15 16H9C8.71667 16 8.47917 16.0958 8.2875 16.2875C8.09583 16.4792 8 16.7167 8 17C8 17.2833 8.09583 17.5208 8.2875 17.7125C8.47917 17.9042 8.71667 18 9 18ZM9 14H15C15.2833 14 15.5208 13.9042 15.7125 13.7125C15.9042 13.5208 16 13.2833 16 13C16 12.7167 15.9042 12.4792 15.7125 12.2875C15.5208 12.0958 15.2833 12 15 12H9C8.71667 12 8.47917 12.0958 8.2875 12.2875C8.09583 12.4792 8 12.7167 8 13C8 13.2833 8.09583 13.5208 8.2875 13.7125C8.47917 13.9042 8.71667 14 9 14ZM6 22C5.45 22 4.97917 21.8042 4.5875 21.4125C4.19583 21.0208 4 20.55 4 20V4C4 3.45 4.19583 2.97917 4.5875 2.5875C4.97917 2.19583 5.45 2 6 2H13.175C13.4417 2 13.6958 2.05 13.9375 2.15C14.1792 2.25 14.3917 2.39167 14.575 2.575L19.425 7.425C19.6083 7.60833 19.75 7.82083 19.85 8.0625C19.95 8.30417 20 8.55833 20 8.825V20C20 20.55 19.8042 21.0208 19.4125 21.4125C19.0208 21.8042 18.55 22 18 22H6ZM13 8C13 8.28333 13.0958 8.52083 13.2875 8.7125C13.4792 8.90417 13.7167 9 14 9H18L13 4V8Z" fill="#418363"/>
                                            </g>
                                        </svg>
                                        View Request ({{ $result->request_id }})
                                    </a>
                                    {{-- @if ($result->image)
                                        @php
                                            $images = json_decode($result->image);
                                        @endphp
                                        <ul>
                                            @foreach ($images as $image)
                                                <li>{{ basename($image) }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No images available</p>
                                    @endif --}}
                                </td>
                                <td>{{ $result->sender_message }}</td>

                                <td>
                                    @if($result->stat)
                                        <span class="badge bg-danger">STAT</span>
                                        {{ \Carbon\Carbon::parse($result->date_needed)->format('n/j/Y') }} 
                                    @else
                                        {{ \Carbon\Carbon::parse($result->date_needed . ' ' . $result->time_needed)->format('h:i A n/j/Y') }}
                                    @endif
                                </td>  
                                

                                <td>{{ $result->updated_at->format('h:i A n/j/Y' ) }}</td>
                                <td>
                                    @if($result->receiver->role == 'medtech')
                                        {{ optional($result->medtech)->first_name }} {{ optional($result->medtech)->last_name }}
                                    @elseif($result->receiver->role == 'radtech')
                                        {{ optional($result->radtech)->first_name }} {{ optional($result->radtech)->last_name }}
                                    @else
                                        Technician Name
                                    @endif
                                </td>
                                                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No available results</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $completedResults->appends(['search' => request('search'), 'procedure' => request('procedure')])->links() }}

                </div>
            </div>
        </div>
        
         {{-- RADTECH RESULTS--}}
        {{-- @if ($radtechCompletedResults->isNotEmpty())        --}}
        {{-- <div id="radtechResults" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Imaging Results</h4>
                    <form action="{{ route('requestImaging', ['patientId' => $patient->patient_id]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->input('search') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Xray' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Xray']) }}">X-Ray</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ultrasound' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Ultrasound']) }}">Ultrasound</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Ctscan' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('showResults', ['patientId' => $patient->patient_id, 'procedure' => 'Ctscan']) }}">CT Scan</a>
                    </li>
                </ul>
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th class="text-center" scope="col">Date Performed</th>
                            <th class="text-center" scope="col">Date Completed</th>
                            <th class="text-center" scope="col">Medtech on duty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($radtechCompletedResults as $result)
                            <tr>
                                <td>
                            <a class="d-flex flex-row-none gap-2 text-success font-bold" href="{{ route('nurse.viewRequest', ['patientId' => $result->patient_id, 'requestId' => $result->request_id]) }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1387_10854" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_1387_10854)">
                                        <path d="M9 18H15C15.2833 18 15.5208 17.9042 15.7125 17.7125C15.9042 17.5208 16 17.2833 16 17C16 16.7167 15.9042 16.4792 15.7125 16.2875C15.5208 16.0958 15.2833 16 15 16H9C8.71667 16 8.47917 16.0958 8.2875 16.2875C8.09583 16.4792 8 16.7167 8 17C8 17.2833 8.09583 17.5208 8.2875 17.7125C8.47917 17.9042 8.71667 18 9 18ZM9 14H15C15.2833 14 15.5208 13.9042 15.7125 13.7125C15.9042 13.5208 16 13.2833 16 13C16 12.7167 15.9042 12.4792 15.7125 12.2875C15.5208 12.0958 15.2833 12 15 12H9C8.71667 12 8.47917 12.0958 8.2875 12.2875C8.09583 12.4792 8 12.7167 8 13C8 13.2833 8.09583 13.5208 8.2875 13.7125C8.47917 13.9042 8.71667 14 9 14ZM6 22C5.45 22 4.97917 21.8042 4.5875 21.4125C4.19583 21.0208 4 20.55 4 20V4C4 3.45 4.19583 2.97917 4.5875 2.5875C4.97917 2.19583 5.45 2 6 2H13.175C13.4417 2 13.6958 2.05 13.9375 2.15C14.1792 2.25 14.3917 2.39167 14.575 2.575L19.425 7.425C19.6083 7.60833 19.75 7.82083 19.85 8.0625C19.95 8.30417 20 8.55833 20 8.825V20C20 20.55 19.8042 21.0208 19.4125 21.4125C19.0208 21.8042 18.55 22 18 22H6ZM13 8C13 8.28333 13.0958 8.52083 13.2875 8.7125C13.4792 8.90417 13.7167 9 14 9H18L13 4V8Z" fill="#418363"/>
                                    </g>
                                </svg>
                                @if ($result->image)
                                    @php
                                        $images = json_decode($result->image);
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
                                <td class="text-center">{{ $result->created_at->format('h:i A n/j/Y' ) }}</td>
                                <td class="text-center">{{ $result->updated_at->format('h:i A n/j/Y' ) }}</td>
                                <td class="text-center">{{ optional($result->radtech)->first_name }} {{ optional($result->radtech)->last_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No available results</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
                <div class="mt-4">
                    {{ $radtechCompletedResults->links() }}
                </div>
            </div>
        </div> --}}
        {{-- @endif --}}

      </div>
    
    </div>
</section>
{{-- #9CCA9E --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

// function redirectToService(serviceType) {
//         if (serviceType === 'laboratory') {
//             window.location.href = "{{ route('requestLaboratory', ['patientId' => $patient->patient_id]) }}";
//         } else if (serviceType === 'imaging') {
//             window.location.href = "{{ route('requestImaging', ['patientId' => $patient->patient_id]) }}";
//         }
//     }




document.getElementById('procedure_type_2').addEventListener('change', function() {
    var xrayOptions = document.getElementById('xrayOptions');
    var ultrasoundOptions = document.getElementById('ultrasoundOptions');
    var ctscanOptions = document.getElementById('ctscanOptions');

    if (this.value === 'xray') {
        xrayOptions.style.display = 'block';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'none';
    } else if (this.value === 'ultrasound') {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'block';
        ctscanOptions.style.display = 'none';
    } else if (this.value === 'ctscan') {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'block';
    } else {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'none';
    }

    
});

document.getElementById('procedure_type_2').addEventListener('change', function() {
    // Clear checkboxes
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    // Clear and hide "Others" input field for all services
    var othersInputs = document.querySelectorAll('.others-input');
    othersInputs.forEach(function(input) {
        input.value = '';
        input.style.display = 'none';
    });

    // Hide all options
    var options = document.querySelectorAll('.options');
    options.forEach(function(option) {
        option.style.display = 'none';
    });

    // Show options for the selected service
    var selectedOption = document.getElementById(this.value + 'Options');
    if (selectedOption) {
        selectedOption.style.display = 'block';
    }
    
    // Hide "Others" input field for the current service if "Others" checkbox is unchecked
    var currentService = document.getElementById(this.value + 'Input');
    if (currentService && !currentService.checked) {
        var othersInput = document.getElementById(this.value + 'Input');
        othersInput.value = '';
        othersInput.style.display = 'none';
    }
});


document.getElementById('procedure_type_2').addEventListener('change', function() {
    var xrayOptions = document.getElementById('xrayOptions');
    var ultrasoundOptions = document.getElementById('ultrasoundOptions');
    var ctscanOptions = document.getElementById('ctscanOptions');

    // Clear checkboxes
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    // Clear and hide select elements for X-ray tests only
    var xraySelects = document.querySelectorAll('#xrayOptions select');
    xraySelects.forEach(function(select) {
        select.style.display = 'none';
        select.selectedIndex = 0;
    });

    // Hide all options
    var options = document.querySelectorAll('.options');
    options.forEach(function(option) {
        option.style.display = 'none';
    });

    if (this.value === 'xray') {
        xrayOptions.style.display = 'block';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'none';
    } else if (this.value === 'ultrasound') {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'block';
        ctscanOptions.style.display = 'none';
    } else if (this.value === 'ctscan') {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'block';
    } else {
        xrayOptions.style.display = 'none';
        ultrasoundOptions.style.display = 'none';
        ctscanOptions.style.display = 'none';
    }
});

// Function to toggle display of the input field for "Others" based on section
function toggleOthersInput(sectionId) {
    var othersInput = document.getElementById(sectionId + 'Input');
    if (othersInput.style.display === 'none') {
        othersInput.style.display = 'block';
    } else {
        othersInput.style.display = 'none';
    }
}

function updateSenderMessage2() {
    var selectedTests = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        var select = document.getElementById(checkbox.id + 'Select');
        if (checkbox.checked) {
            if (select) {
                select.style.display = 'block'; // Display the select element
                if (select.selectedIndex === 0) {
                    // If the select option is not selected, skip this checkbox
                    return;
                }
                selectedTests.push(checkbox.value, select.value);
            } else {
                selectedTests.push(checkbox.value);
            }
        } else {
            if (select) {
                select.style.display = 'none'; // Hide the select element
                select.selectedIndex = 0; // Reset select value
            }
        }
    });
    document.getElementById('sender_message_2').value = selectedTests.join(', ');

    // Clear X-ray tests if the current procedure type is not X-ray
    var procedureType = document.getElementById('procedure_type_2').value;
    if (procedureType !== 'xray') {
        var xrayCheckboxes = document.querySelectorAll('input[name="xray_tests[]"]:checked');
        xrayCheckboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
        var xraySelects = document.querySelectorAll('#xrayOptions select');
        xraySelects.forEach(function(select) {
            select.style.display = 'none';
            select.selectedIndex = 0;
        });
    }
}







function showConfirmationModalLab() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('labRequestModal'), {
            keyboard: false
        });
        myModal.show();
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function () {
        // Disable the submit button to prevent multiple form submissions
        document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
    });
});

document.getElementById('submitButton').addEventListener('click', function() {
    // Trigger the modal
    var myModal = new bootstrap.Modal(document.getElementById('labRequestModal'), {
        keyboard: false
    });
    myModal.show();
});


function showConfirmationModalImage() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('imageRequestModal'), {
            keyboard: false
        });
        myModal.show();
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function () {
        // Disable the submit button to prevent multiple form submissions
        document.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
    });
});

document.getElementById('submitButton').addEventListener('click', function() {
    // Trigger the modal
    var myModal = new bootstrap.Modal(document.getElementById('imageRequestModal'), {
        keyboard: false
    });
    myModal.show();
});

function toggleProcedure(procedure) {
        var currentURL = window.location.href;
        var params = new URLSearchParams(window.location.search);
        if (params.get('procedure') === procedure) {
            params.delete('procedure');
        } else {
            params.set('procedure', procedure);
        }
        var newParams = params.toString() === '' ? '' : '?' + params.toString();
        var baseURL = currentURL.split('?')[0];
        window.location.href = baseURL + newParams;
    }
</script>

@include('partials.footer ')
