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
                    <p class="font-bold mb-1">ID{{  $patient->patient_id }}</p>
                    <h4 class="font-bold mb-2">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                </div>
                <div class="left-top-2 flexi">
                    <p class="font-bold">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }} yrs</p>
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


         {{-- RADTECH --}}
         <div id="radtechRequest" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Request Imaging Services</h4>
                </div>
        
                <form id="imaging_form" action="{{ route('nurse.requestImagingServices', ['id' => $patient->patient_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                    <input type="hidden" name="sender_message" id="sender_message_2">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date_needed" class="form-label">Date Needed</label>
                            <input type="date" id="date_needed" name="date_needed" class="form-control">
                            @error('date_needed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time_needed" class="form-label">Time Needed</label>
                            <input type="time" id="time_needed" name="time_needed" class="form-control">
                            @error('time_needed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="procedure_type" class="form-label">Procedure Type</label>                        
                        <select id="procedure_type_2" name="procedure_type" class="form-select">
                            <option value="" selected disabled>Choose type of service</option>
                            <option value="xray">Xray</option>
                            <option value="ultrasound">Ultrasound</option>
                            <option value="ctscan">Ctscan</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('procedure_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @error('sender_message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group mb-3" id="xrayOptions" style="display: none;">
                        <label class="form-label">X-ray Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Digits PA" id="DigitsPA" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="DigitsPA">Digits PA</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Hands PA/PA" id="HandsPA" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="HandsPA">Hands PA/PA</label>
                                    <select id="HandsPASelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Hands PA/PA & oblique (unilateral)">Hands PA/PA & oblique (unilateral)</option>
                                        <option value="Hands PA/PA & lateral (unilateral)">Hands PA/PA & lateral (unilateral)</option>
                                        <option value="Hands PA/PA & oblique (bilateral)">Hands PA/PA & oblique (bilateral)</option>
                                        <option value="Hands PA/PA & lateral (bilateral)">Hands PA/PA & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Wrist PA/PA lateral" id="WristPA" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="WristPA">Wrist PA/PA lateral</label>
                                    <select id="WristPASelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Wrist PA/PA & lateral (unilateral)">Wrist PA/PA & lateral (unilateral)</option>
                                        <option value="Wrist PA/PA & lateral (bilateral)">Wrist PA/PA & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Carpal" id="Carpal" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Carpal">Carpal</label>
                                    <select id="CarpalSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Carpal Bridge">Carpal Bridge</option>
                                        <option value="Carpal Tunnel">Carpal Tunnel</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Forearm AP & lateral" id="Forearm" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Forearm">Forearm AP & lateral</label>
                                    <select id="ForearmSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Forearm AP & lateral (unilateral)">Forearm AP & lateral (unilateral)</option>
                                        <option value="Forearm AP & lateral (bilateral)">Forearm AP & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Elbow AP & lateral" id="Elbow" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Elbow">Elbow AP & lateral</label>
                                    <select id="ElbowSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Elbow AP & lateral (unilateral)">Elbow AP & lateral (unilateral)</option>
                                        <option value="Elbow AP & lateral (bilateral)">Elbow AP & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Humerus AP & lateral" id="Humerus" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Humerus">Humerus AP & lateral</label>
                                    <select id="HumerusSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Humerus AP & lateral (unilateral)">Humerus AP & lateral (unilateral)</option>
                                        <option value="Humerus AP & lateral (bilateral)">Humerus AP & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Shoulder" id="Shoulder" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Shoulder">Shoulder</label>
                                    <select id="ShoulderSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Shoulder AP lateral (unilateral)">Shoulder AP lateral (unilateral)</option>
                                        <option value="Shoulder AP lateral (bilateral)">Shoulder AP lateral (bilateral)</option>
                                        <option value="Shoulder lateral (unilateral)">Shoulder lateral (unilateral)</option>
                                        <option value="Shoulder lateral (bilateral)">Shoulder lateral (bilateral)</option>
                                        <option value="Shoulder (Scapular Y)">Shoulder (Scapular Y)</option>
                                        <option value="Shoulder (transthoracic lateral)">Shoulder (transthoracic lateral)</option>
                                        <option value="Shoulder (Axiolateral)">Shoulder (Axiolateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Scapula" id="Scapula" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Scapula">Scapula</label>
                                    <select id="ScapulaSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Scapula AP (unilateral)">Scapula AP (unilateral)</option>
                                        <option value="Scapula AP (bilateral)">Scapula AP (bilateral)</option>
                                        <option value="Scapula lateral (unilateral)">Scapula lateral (unilateral)</option>
                                        <option value="Scapula lateral (bilateral)">Scapula lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Clavicle AP" id="Clavicle" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Clavicle">Clavicle AP</label>
                                    <select id="ClavicleSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Clavicle AP (unilateral)">Clavicle AP (unilateral)</option>
                                        <option value="Clavicle AP (bilateral)">Clavicle AP (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Sternum" id="Sternum" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Sternum">Sternum</label>
                                    <select id="SternumSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Sternum AP">Sternum AP</option>
                                        <option value="Sternum lateral">Sternum lateral</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Foot AP" id="Foot" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Foot">Foot AP</label>
                                    <select id="FootSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Foot AP & lateral (unilateral)">Foot AP & lateral (unilateral)</option>
                                        <option value="Foot AP & lateral (bilateral)">Foot AP & lateral (bilateral)</option>
                                        <option value="Foot AP & oblique (unilateral)">Foot AP & oblique (unilateral)</option>
                                        <option value="Foot AP & oblique (bilateral)">Foot AP & oblique (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Calcaneus" id="Calcaneus" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Calcaneus">Calcaneus</label>
                                    <select id="CalcaneusSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Calcaneus AP/PA">Calcaneus AP/PA</option>
                                        <option value="Calcaneus lateral">Calcaneus lateral</option>
                                        <option value="Calcaneus axiolateral">Calcaneus axiolateral</option>
                                    </select>
                                </div>
                                
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Ankle" id="Ankle" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Ankle">Ankle</label>
                                    <select id="AnkleSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Ankle AP & lateral (unilateral)">Ankle AP & lateral (unilateral)</option>
                                        <option value="Ankle AP & lateral (bilateral)">Ankle AP & lateral (bilateral)</option>
                                        <option value="Ankle (stress method)">Ankle (stress method)</option>
                                    </select>
                                </div>
                                
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Leg AP & lateral" id="Leg" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Leg">Leg AP & lateral</label>
                                    <select id="LegSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Leg AP & lateral (unilateral)">Leg AP & lateral (unilateral)</option>
                                        <option value="Leg AP & lateral (bilateral)">Leg AP & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Femur AP & lateral" id="Femur" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Femur">Femur AP & lateral</label>
                                    <select id="FemurSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Femur AP & lateral (unilateral)">Femur AP & lateral (unilateral)</option>
                                        <option value="Femur AP & lateral (bilateral)">Femur AP & lateral (bilateral)</option>
                                    </select>
                                </div>
                                <!-- Add more checkboxes for other X-ray procedures -->
                            </div>
                            <!-- Add more checkboxes for other X-ray procedures -->
                            
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Knee" id="Knee" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Knee">Knee</label>
                                    <select id="KneeSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Knee AP & lateral (unilateral)">Knee AP & lateral (unilateral)</option>
                                        <option value="Knee AP & lateral (bilateral)">Knee AP & lateral (bilateral)</option>
                                        <option value="Knee (Rosenburg method)">Knee (Rosenburg method)</option>
                                        <option value="Knee (Sunrise view)">Knee (Sunrise view)</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Hip" id="Hip" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Hip">Hip</label>
                                    <select id="HipSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Hip AP (unilateral)">Hip AP (unilateral)</option>
                                        <option value="Hip AP (bilateral)">Hip AP (bilateral)</option>
                                        <option value="Hip (axiolateral)">Hip (axiolateral)</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Pelvis AP" id="Pelvis" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Pelvis">Pelvis AP</label>
                                    <select id="PelvisSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Pelvis AP">Pelvis AP</option>
                                        <option value="Pelvis AP & lateral">Pelvis AP & lateral</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Pelvimetry" id="Pelvimetry" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Pelvimetry">Pelvimetry</label>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Cervical" id="Cervical" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Cervical">Cervical</label>
                                    <select id="CervicalSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Cervical spine AP">Cervical spine AP</option>
                                        <option value="Cervical spine AP & lateral">Cervical spine AP & lateral</option>
                                        <option value="Cervical spine AP & oblique">Cervical spine AP & oblique</option>
                                        <option value="Cervical spine obliques">Cervical spine obliques</option>
                                        <option value="Cervical lateral (hyperextension & hyperflexion)">Cervical lateral (hyperextension & hyperflexion)</option>
                                        <option value="Cervical spine (atlas & axis)">Cervical spine (atlas & axis)</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Thoracic spine" id="ThoracicSpine" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="ThoracicSpine">Thoracic spine</label>
                                    <select id="ThoracicSpineSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Thoracic spine AP & lateral">Thoracic spine AP & lateral</option>
                                        <option value="Thoracic spine (scoliosis series)">Thoracic spine (scoliosis series)</option>
                                        <option value="Thoracic spine AP">Thoracic spine AP</option>
                                        <option value="Thoracic spine (Swimmer's lateral)">Thoracic spine (Swimmer's lateral)</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Lumbar spine" id="LumbarSpine" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="LumbarSpine">Lumbar spine</label>
                                    <select id="LumbarSpineSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Lumbar spine AP">Lumbar spine AP</option>
                                        <option value="Lumbar spine lateral">Lumbar spine lateral</option>
                                        <option value="Lumbar spine AP & lateral">Lumbar spine AP & lateral</option>
                                        <option value="Lumbar spine obliques">Lumbar spine obliques</option>
                                        <option value="Lumbar spine AP & oblique">Lumbar spine AP & oblique</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Lumbosacral spine AP" id="LumbosacralSpine" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="LumbosacralSpine">Lumbosacral spine AP</label>
                                    <select id="LumbosacralSpineSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Lumbosacral spine AP & lateral">Lumbosacral spine AP & lateral</option>
                                        <option value="Lumbosacral spine AP & oblique">Lumbosacral spine AP & oblique</option>
                                    </select>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Sacrum AP & lateral" id="Sacrum" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Sacrum">Sacrum AP & lateral</label>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Coccyx AP & lateral" id="Coccyx" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Coccyx">Coccyx AP & lateral</label>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Skull" id="Skull" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Skull">Skull</label>
                                    <select id="SkullSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Skull AP & lateral">Skull AP & lateral</option>
                                        <option value="Skull Series">Skull Series</option>
                                        <option value="Skull (Water's method)">Skull (Water's method)</option>
                                        <option value="Skull (Caldwell's method)">Skull (Caldwell's method)</option>
                                        <option value="Skull (Towne's method)">Skull (Towne's method)</option>
                                        <option value="Skull (SMV / VSM)">Skull (SMV / VSM)</option>
                                    </select>
                                </div>
                            
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Paranasal sinuses" id="ParanasalSinuses" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="ParanasalSinuses">Paranasal sinuses</label>
                                    <select id="ParanasalSinusesSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Paranasal sinuses (AP & lateral)">Paranasal sinuses (AP & lateral)</option>
                                        <option value="Paranasal sinuses (series)">Paranasal sinuses (series)</option>
                                    </select>
                                </div>
                            
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Mastoids AP" id="Mastoids" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="Mastoids">Mastoids AP</label>
                                </div>
                            
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Sella turcica AP/PA axial & lateral" id="SellaTurcica" name="xray_tests[]" onchange="updateSenderMessage2()">
                                    <label class="form-check-label" for="SellaTurcica">Sella turcica AP/PA axial & lateral</label>
                                </div>                        
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="XrayOthers" name="xray_tests[]" onchange="updateSenderMessage2(); toggleOthersInput('xray')">
                                    <label class="form-check-label" for="XrayOthers">Others: </label>
                                </div>    
                            </div>
                            <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="xrayInput" name="xrayInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage2()">


                        </div>
                    </div> 
                    
                    <div class="form-group mb-3" id="ultrasoundOptions" class="options" style="display: none;">
                        <label class="form-label">Ultrasound Tests</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="KUB" id="KUB" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="KUB">KUB</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Urinary bladder" id="UrinaryBladder" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="UrinaryBladder">Urinary bladder</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Kidneys" id="Kidneys" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Kidneys">Kidneys</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Abdomen" id="Abdomen" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Abdomen">Abdomen</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="HBT" id="HBT" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="HBT">HBT</label>
                                        <select id="HBTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="HBT">HBT</option>
                                            <option value="HBT +pancreas">HBT +pancreas</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Pancreas" id="Pancreas" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Pancreas">Pancreas</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Chest" id="Chest" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Chest">Chest</label>
                                        <select id="ChestSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Chest">Chest</option>
                                            <option value="Chest mapping">Chest mapping</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Transvaginal ultrasound" id="TransvaginalUltrasound" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="TransvaginalUltrasound">Transvaginal ultrasound</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Transrectal ultrasound" id="TransrectalUltrasound" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="TransrectalUltrasound">Transrectal ultrasound</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Obstetric ultrasound" id="ObstetricUltrasound" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="ObstetricUltrasound">Obstetric ultrasound</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Doppler ultrasound" id="DopplerUltrasound" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="DopplerUltrasound">Doppler ultrasound</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Breast ultrasound" id="BreastUltrasound" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="BreastUltrasound">Breast ultrasound</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Cranial" id="Cranial" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Cranial">Cranial</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Liver" id="Liver" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Liver">Liver</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Gallbladder" id="Gallbladder" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Gallbladder">Gallbladder</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Biliary tree" id="BiliaryTree" name="ultrasound_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="BiliaryTree">Biliary tree</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Others" id="UltrasoundOthers" name="ultrasound_tests[]" onchange="updateSenderMessage2(); toggleOthersInput('ultrasound')">
                                        <label class="form-check-label" for="UltrasoundOthers">Others: </label>
                                    </div>
                                    <!-- Add more checkboxes for other ultrasound tests -->
                                </div>
                                <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="ultrasoundInput" name="ultrasoundInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage2()">

                            </div>
                    </div>
                    
                    <div class="form-group mb-3" id="ctscanOptions" class="options" style="display: none;">
                        <label class="form-label">Ct Scan Tests</label>
                            <div class="row">
                                <div class="col-md-6">                        
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Cranial" id="CranialCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="CranialCT">Cranial</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Paranasal sinus" id="ParanasalSinus" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="ParanasalSinus">Paranasal sinus</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Mastoids" id="MastoidsCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="MastoidsCT">Mastoids</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Brain" id="Brain" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Brain">Brain</label>
                                        <select id="BrainSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Brain (plain)">Brain (plain)</option>
                                            <option value="Brain (with contrast)">Brain (with contrast)</option>
                                            <option value="Brain angiography">Brain angiography</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Neck" id="NeckCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="NeckCT">Neck</label>
                                        <select id="NeckCTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Neck (plain)">Neck (plain)</option>
                                            <option value="Neck (with contrast)">Neck (with contrast)</option>
                                            <option value="Neck angiography">Neck angiography</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Chest" id="ChestCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="ChestCT">Chest</label>
                                        <select id="ChestCTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Chest (plain)">Chest (plain)</option>
                                            <option value="Chest (with contrast)">Chest (with contrast)</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Breast" id="BreastCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="BreastCT">Breast</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Abdominal CT-scan" id="AbdominalCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="AbdominalCT">Abdominal CT-scan</label>
                                        <select id="AbdominalCTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Upper abdominal CT-scan (plain)">Upper abdominal CT-scan (plain)</option>
                                            <option value="Upper abdominal CT-scan (with contrast)">Upper abdominal CT-scan (with contrast)</option>
                                            <option value="Lower abdominal CT-scan (plain)">Lower abdominal CT-scan (plain)</option>
                                            <option value="Lower abdominal CT-scan (with contrast)">Lower abdominal CT-scan (with contrast)</option>
                                            <option value="Whole abdominal CT-scan (plain)">Whole abdominal CT-scan (plain)</option>
                                            <option value="Whole abdominal CT-scan (with contrast)">Whole abdominal CT-scan (with contrast)</option>
                                            <option value="Whole abdominal CT-scan (triphasic contrast)">Whole abdominal CT-scan (triphasic contrast)</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Pancreatic CT-scan" id="PancreaticCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="PancreaticCT">Pancreatic CT-scan</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="CT stonogram" id="CTStonogram" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="CTStonogram">CT stonogram</label>
                                        <select id="CTStonogramSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="CT stonogram (plain)">CT stonogram (plain)</option>
                                            <option value="CT stonogram (with contrast)">CT stonogram (with contrast)</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="KUB CT-scan" id="KUBCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="KUBCT">KUB CT-scan</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Urinary bladder" id="UrinaryBladderCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="UrinaryBladderCT">Urinary bladder</label>
                                        <select id="UrinaryBladderCTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Urinary bladder (plain)">Urinary bladder (plain)</option>
                                            <option value="Urinary bladder (with contrast)">Urinary bladder (with contrast)</option>
                                        </select>
                                    </div>
                        <!-- Add more checkboxes for other CT scan tests -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Liver" id="LiverCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="LiverCT">Liver</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Gallbladder" id="GallbladderCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="GallbladderCT">Gallbladder</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Limb" id="LimbCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="LimbCT">Limb</label>
                                        <select id="LimbCTSelect" class="form-select" style="display: none;" onchange="updateSenderMessage2()">
                                            <option value="" selected disabled>Please Select</option>
                                            <option value="Lower limb">Lower limb</option>
                                            <option value="Upper limb">Upper limb</option>
                                            <option value="Lower limb (angiography)">Lower limb (angiography)</option>
                                            <option value="Upper limb (angiography)">Upper limb (angiography)</option>
                                        </select>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Coronary angiography" id="CoronaryAngiography" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="CoronaryAngiography">Coronary angiography</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Oral CT-scan" id="OralCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="OralCT">Oral CT-scan</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Nasopharynx" id="Nasopharynx" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Nasopharynx">Nasopharynx</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Nasal CT-scan" id="NasalCT" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="NasalCT">Nasal CT-scan</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Laryngopharynx" id="Laryngopharynx" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Laryngopharynx">Laryngopharynx</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="CT-planning" id="CTPlanning" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="CTPlanning">CT-planning</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Oronasopharynx" id="Oronasopharynx" name="ctscan_tests[]" onchange="updateSenderMessage2()">
                                        <label class="form-check-label" for="Oronasopharynx">Oronasopharynx</label>
                                    </div>
                                    <div class="form-check bg-light rounded-2 py-1">
                                        <input class="form-check-input" type="checkbox" value="Others" id="CtscanOthers" name="ctscan_tests[]" onchange="updateSenderMessage2(); toggleOthersInput('ctscan')">
                                        <label class="form-check-label" for="CtscanOthers">Others: </label>
                                    </div>   
                                </div>
                                <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="ctscanInput" name="ctscanInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage2()">
                            </div>
                    </div>
                    

                    <div class="buttons my-4 d-flex justify-content-end">
                        <a href="{{ route('nurse.edit', ['id' => $patient->patient_id]) }}" class="btn btn-light ms-2 btn-custom-style btn-cancel">Back</a>
                        {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                        <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModalImage()">Submit</button>
                    </div>
                    
                    <!-- First Modal - Confirmation -->
                    <div class="modal fade" id="imageRequestModal" tabindex="-1" aria-labelledby="imageRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: white;">
                                                        <path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/>
                                                    </svg>
                                                    
    
                                                </span>
                                            </h1>
                                            <div class="text-center mt-4">
                                                <h4 class="font-bold">Request Service</h4>
                                                <p class="mb-4">This request will be sent to the appropriate department. <br> Are you sure you want to submit this request?</p>
                                            </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#imageRequestModal2">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="imageRequestModal2" tabindex="-1" aria-labelledby="imageRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z" fill="white"/>
                                                    </svg>
                                                                                                                </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Enter Password</h4>
                                            <p class="mb-4">Password is required to proceed.</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <form id="passwordForm">
                                                <div class="col-auto">
                                                    <label for="inputPassword2" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control text-success" id="inputPassword2" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Enter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

function redirectToService(serviceType) {
        if (serviceType === 'laboratory') {
            window.location.href = "{{ route('requestLaboratory', ['patientId' => $patient->patient_id]) }}";
        } else if (serviceType === 'imaging') {
            window.location.href = "{{ route('requestImaging', ['patientId' => $patient->patient_id]) }}";
        }
    }




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



</script>

@include('partials.footer ')
