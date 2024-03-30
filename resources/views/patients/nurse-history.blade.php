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
                <div id="completedResults" class="card pe-0 mb-4 shadow-md">
                    <div class="card-body m-1">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="font-bold">Audit Logs</h4>
                            <form class="d-flex" action="{{ route('nurse.history', ['patient_id' => $patient->patient_id]) }}" method="GET">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                            
                            
                            
                        </div>
                        {{-- @if($nurseHistories->isEmpty())
                            <p>No nurse history found.</p>
                        @else --}}
                        <table class="table table-striped mt-3 Add">
                            <thead>
                                <tr>                                    
                                    <th>Date</th>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($nurseHistories as $history)
                                    <tr>
                                        <td>{{ $history->created_at->format('g:i A n/j/Y') }}</td>
                                        <td>{{ $history->nurse->first_name }} {{ $history->nurse->last_name }}</td>
                                        <td>{{ ucfirst($history->nurse->role) }}</td> <!-- Display user role -->
                                        <td>Updated</td> <!-- Display IP address -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No available logs</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        
                        {{-- @endif --}}

                        <div class="mt-4">
                            {{ $nurseHistories->links() }} <!-- Render pagination links -->        
                        </div>
                    </div>
                </div>
             
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
