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
.card-header {
    cursor: pointer;
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>



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


        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Nurse Remarks</h4>
                @if(!$patient->archived)

                <a href="/nurse-patients/add-remark/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">+ Record Vital Signs</a>
              @endif                
              </div>  

                <div class="table-header">
                    <hr>
                    <p class="font-bold">Vital Signs</p>
                </div>

                <div class="row row-cols-1 g-4">
                    @if($patient->vitalSigns->isEmpty())
                        <div class="col-12 text-center">
                            <p>No vital signs recorded</p>
                        </div>
                    @else
                    @foreach ($vitalSigns as $key => $vitalSign)
                    <div class="col mb-4"> <!-- Added margin bottom to create space between rows -->
                                <div class="card">
                                    <!-- Check if it's the latest entry to add the 'NEW' badge -->
                                    @if($key === 0)
                                        <div class="badge btn-submit" style="font-size: 0.65em; position: absolute; top: 0; right: 0; padding: 4px;">NEW</div>
                                    @endif
                                    <div class="card-body mt-0 px-0 pb-0 mb-0 pt-0">
                                        <!-- Vital sign fields -->
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Blood Pressure</th>
                                                <th>Respiratory Rate</th>
                                                <th>Pulse Rate</th>
                                                <th>Temperature</th>
                                                <th>Oxygen Level</th>
                                            </tr>
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($vitalSign->vital_date)->format('n/j/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($vitalSign->vital_time)->format('g:i A') }}</td>
                                                <td>{{ $vitalSign->blood_pressure }} mmHg</td>
                                                <td>{{ $vitalSign->respiratory_rate }} cpm</td>
                                                <td>{{ $vitalSign->pulse }} bpm</td>
                                                <td>{{ $vitalSign->temperature }}°C</td>
                                                <td>{{ $vitalSign->oxygen }}%</td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <div class="flex-row">
                                            <small class="text-muted">Submitted By:</small>
                                            @if ($vitalSign->nurse_user)
                                                <small class="text-muted">{{ $vitalSign->nurse_user->first_name }} {{ $vitalSign->nurse_user->last_name }}</small>
                                            @else
                                                <small class="text-muted">N/A</small>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="flex-row">
                                            <small class="text-muted">Date & Time:</small>
                                            <small class="text-muted">{{ optional($vitalSign)->vital_time ? \Carbon\Carbon::parse($vitalSign->updated_at)->format('g:i A n/j/Y') : 'N/A' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-4 mb-4">
                            {{ $vitalSigns->links() }}
                        </div>

                    @endif
                </div>
       

            </div>
        </div>


        {{-- <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Progress Notes</h4>
                <a href="/nurse-patients/add-progress-note/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">Add Progress Note</a>
            </div>  
            <div class="table-header">
                <hr>
            </div>
            <div class="accordion mt-2 mb-2" id="progressNotesAccordion">
                @foreach ($patient->progressNotes->take(3) as $index => $progressNote)
                <div class="card mb-3">
                    <div class="card-header" id="progressHeading{{ $index }}" onclick="toggleProgressCollapse({{ $index }})" aria-expanded="false" aria-controls="progressCollapse{{ $index }}">
                        <div class="mb-0 d-flex justify-content-between align-items-center">
                            <p class="mb-0 d-flex justify-content-between align-items-center">
                                {{ $progressNote->shift ?? 'N/A' }} shift
                                @if ($loop->first)
                                    <span class="ml-2 badge btn-submit" style="font-size: 0.65em; padding: 4px;">NEW</span>
                                @endif
                            </p>
                            <span class="text-custom">         
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                                    <path fill-rule="evenodd" d="M6.293 7.293a1 1 0 011.414 0l2.293 2.293 2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>                           
                            </span> 
                        </div>
                    </div>
            
                    <div id="progressCollapse{{ $index }}" class="custom-collapse" aria-labelledby="progressHeading{{ $index }}" data-parent="#progressNotesAccordion">
                        <div class="card-body">
                            <div class="flex-col">
                                <p class="font-bold">Date</p>
                                <p class="">{{  \Carbon\Carbon::parse($progressNote->progress_date)->format('n/j/Y') }}</p>
                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Focus</p>
                                <p>{!! nl2br(e($progressNote->focus ?? 'N/A')) !!}</p>

                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Progress Notes</p>
                                <p>{!! nl2br(e($progressNote->prog_notes ?? 'N/A')) !!}</p>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="flex-row">
                                <small class="text-muted">Submitted By:</small>
                                @if ($progressNote->nurse_user)
                                    <small class="text-muted">{{ $progressNote->nurse_user->first_name }} {{ $progressNote->nurse_user->last_name }}</small>
                                @else
                                    <small class="text-muted">Unknown Nurse</small>
                                @endif
                            </div>
                            <div class="flex-row">
                                <small class="text-muted">Date & Time:</small>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($progressNote->updated_at)->format('g:i A n/j/Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            </div>
        </div> --}}

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
    
function toggleCollapse(index) {
    var collapse = document.getElementById('collapse' + index);
    collapse.classList.toggle('show');

}

function toggleProgressCollapse(index) {
    var collapse = document.getElementById('progressCollapse' + index);
    collapse.classList.toggle('show');
}
// function toggleSecondRow() {
//         var secondRowCards = document.querySelectorAll('.row-cols-2 .col:nth-child(n+3)');
//         secondRowCards.forEach(function(card) {
//             if (card.style.display === 'none') {
//                 card.style.display = 'block';
//             } else {
//                 card.style.display = 'none';
//             }
//         });
// }


function toggleSecondRow() {
    var hiddenCards = document.querySelectorAll('.row.row-cols-2.g-4 .col:nth-child(n+3)');
    var button = document.getElementById('showMoreButton');
    
    hiddenCards.forEach(function(card) {
        if (card.style.display === 'none' || card.style.display === '') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    if (button.textContent === 'Show more') {
        button.textContent = 'Show less';
    } else {
        button.textContent = 'Show more';
    }
}




</script>
@include('partials.footer')




