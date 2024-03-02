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


        
        {{-- MEDTECH REQUEST --}}
        <div id="medtechRequest" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Request Laboratory Services</h4>
                </div>
        
                <form action="{{ route('nurse.requestLaboratoryServices', ['id' => $patient->patient_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                    <input type="hidden" name="sender_message" id="sender_message">
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
                        <select id="procedure_type" name="procedure_type" class="form-select">
                            <option value="" selected disabled>Choose type of service</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="hematology">Hematology</option>
                            <option value="bbis">Bbis</option>
                            <option value="parasitology">Parasitology</option>
                            <option value="microbiology">Microbiology</option>
                            <option value="microscopy">Microscopy</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('procedure_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @error('sender_message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <!-- Checkbox options for Chemistry -->
                    <div class="form-group mb-3" id="chemistryOptions" style="display: none;">
                        <label class="form-label">Chemistry Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="FBS" id="FBS" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="FBS">FBS</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Cholesterol" id="Cholesterol" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Cholesterol">Cholesterol</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Trygycerides" id="Trygycerides" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Trygycerides">Trygycerides</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="HDL" id="HDL" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="HDL">HDL</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="LDL" id="LDL" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="LDL">LDL</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Creatinine" id="Creatinine" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Creatinine">Creatinine</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="BUN" id="BUN" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="BUN">BUN</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="AST" id="AST" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="AST">AST</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="ALT" id="ALT" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="ALT">ALT</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="HBA1C" id="HBA1C" name="chemistry_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="HBA1C">HBA1C</label>
                                </div>

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="ChemistryOthers" name="chemistry_tests[]" onchange="updateSenderMessage(); toggleOthersInput('chemistry')">
                                    <label class="form-check-label" for="ChemistryOthers">Others: </label>
                                </div>
                            </div>
                            
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="chemistryInput" name="chemistryInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>

                    <!-- Checkbox options for Hematology -->
                    <div class="form-group mb-3" id="hematologyOptions" style="display: none;">
                        <label class="form-label">Hematology Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="CBC" id="CBC" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="CBC">CBC</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Platelet" id="Platelet" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Platelet">Platelet</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="CT" id="CT" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="CT">CT</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="BT" id="BT" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="BT">BT</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Reticulocyte" id="Reticulocyte" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Reticulocyte">Reticulocyte</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="PTPA" id="PTPA" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="PTPA">PTPA</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="APTT" id="APTT" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="APTT">APTT</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="PBS" id="PBS" name="hematology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="PBS">PBS</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="HematologyOthers" name="hematology_tests[]" onchange="updateSenderMessage(); toggleOthersInput('hematology')">
                                    <label class="form-check-label" for="HematologyOthers">Others: </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="hematologyInput" name="hematologyInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>

                    <!-- Checkbox options for Blood Bank/Immunohematology (Bbis) -->
                    <div class="form-group mb-3" id="bbisOptions" style="display: none;">
                        <label class="form-label">Blood Bank/Immunohematology Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Blood Typing" id="BloodTyping" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="BloodTyping">Blood Typing</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Typhidot" id="Typhidot" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Typhidot">Typhidot</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Dengue Dot" id="DengueDot" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="DengueDot">Dengue Dot</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Dengue NS1" id="DengueNS1" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="DengueNS1">Dengue NS1</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="RPR" id="RPR" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="RPR">RPR</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="ASOT" id="ASOT" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="ASOT">ASOT</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Widal" id="Widal" name="bbis_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Widal">Widal</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="BbIsOthers" name="bbis_tests[]" onchange="updateSenderMessage(); toggleOthersInput('bbis')">
                                    <label class="form-check-label" for="BbIsOthers">Others: </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="bbisInput" name="bbisInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>

                    <!-- Checkbox options for Parasitology -->
                    <div class="form-group mb-3" id="parasitologyOptions" style="display: none;">
                        <label class="form-label">Parasitology Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Fecalysis" id="Fecalysis" name="parasitology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Fecalysis">Fecalysis</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Occult Blood" id="OccultBlood" name="parasitology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="OccultBlood">Occult Blood</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="CVC" id="CVC" name="parasitology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="CVC">CVC</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="ParasitologyOthers" name="parasitology_tests[]" onchange="updateSenderMessage(); toggleOthersInput('parasitology')">
                                    <label class="form-check-label" for="ParasitologyOthers">Others: </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="parasitologyInput" name="parasitologyInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>
        
                    <!-- Checkbox options for Microbiology -->
                    <div class="form-group mb-3" id="microbiologyOptions" style="display: none;">
                        <label class="form-label">Microbiology Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Culture" id="Culture" name="microbiology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Culture">Culture</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Sensitivity" id="Sensitivity" name="microbiology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Sensitivity">Sensitivity</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Gram Stain" id="GramStain" name="microbiology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="GramStain">Gram Stain</label>
                                </div>
                                <!-- Add more checkboxes for Microbiology tests as needed -->
                            </div>
                            <div class="col-md-6">

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="AFB" id="AFB" name="microbiology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="AFB">AFB</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="India Ink" id="IndiaInk" name="microbiology_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="IndiaInk">India Ink</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="MicrobiologyOthers" name="microbiology_tests[]" onchange="updateSenderMessage(); toggleOthersInput('microbiology')">
                                    <label class="form-check-label" for="MicrobiologyOthers">Others: </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="microbiologyInput" name="microbiologyInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>

                    <!-- Checkbox options for Microscopy -->
                    <div class="form-group mb-3" id="microscopyOptions" style="display: none;">
                        <label class="form-label">Microscopy Tests</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Urinalysis" id="Urinalysis" name="microscopy_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="Urinalysis">Urinalysis</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Pregnancy Test" id="PregnancyTest" name="microscopy_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="PregnancyTest">Pregnancy Test</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Seminal Analysis" id="SeminalAnalysis" name="microscopy_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="SeminalAnalysis">Seminal Analysis</label>
                                </div>
                                <!-- Add more checkboxes for Microscopy tests as needed -->
                            </div>
                            <div class="col-md-6">

                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="CSF Analysis" id="CSFAnalysis" name="microscopy_tests[]" onchange="updateSenderMessage()">
                                    <label class="form-check-label" for="CSFAnalysis">CSF Analysis</label>
                                </div>
                                <div class="form-check bg-light rounded-2 py-1">
                                    <input class="form-check-input" type="checkbox" value="Others" id="MicroscopyOthers" name="microscopy_tests[]" onchange="updateSenderMessage(); toggleOthersInput('microscopy')">
                                    <label class="form-check-label" for="MicroscopyOthers">Others: </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2 bg-light rounded-2 py-1" id="microscopyInput" name="microscopyInput" placeholder="Others" style="display: none;" onchange="updateSenderMessage()">

                    </div>


                    {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                    <div class="buttons my-4 d-flex justify-content-end">
                        <a href="{{ route('nurse.edit', ['id' => $patient->patient_id]) }}" class="btn btn-light ms-2 btn-custom-style btn-cancel">Back</a>
                        {{-- <button type="button" onclick="nextStep()" class="btn btn-success">Submit</button> --}}
                        <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModalLab()">Submit</button>
                    </div>
                    
                    <!-- First Modal - Confirmation -->
                    <div class="modal fade" id="labRequestModal" tabindex="-1" aria-labelledby="labRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
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
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#labRequestModal2">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="labRequestModal2" tabindex="-1" aria-labelledby="labRequestModalLabel" aria-hidden="true">
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

        {{-- MEDTECH RESULTS --}}
        {{-- @if ($medtechCompletedResults->isNotEmpty()) --}}
        {{-- <div id="medtechResults" class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Laboratory Results</h4>
                    <form action="{{ route('requestLaboratory', ['patientId' => $patient->patient_id]) }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->input('search') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-underline overflow-x-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Chemistry' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Chemistry']) }}">Chemistry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Hematology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Hematology']) }}">Hematology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Bbis' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Bbis']) }}">BB-IS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Parasitology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Parasitology']) }}">Parasitology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microbiology' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Microbiology']) }}">Microbiology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('procedure') === 'Microscopy' ? 'active btn-submit text-white rounded px-3 py-2' : 'text-secondary' }}" href="{{ route('requestLaboratory', ['patientId' => $patient->patient_id, 'procedure' => 'Microscopy']) }}">Microscopy</a>
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
                        @forelse ($medtechCompletedResults as $result)
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


document.getElementById('procedure_type').addEventListener('change', function() {
    var chemistryOptions = document.getElementById('chemistryOptions');
    var hematologyOptions = document.getElementById('hematologyOptions');
    var bbisOptions = document.getElementById('bbisOptions');
    var parasitologyOptions = document.getElementById('parasitologyOptions');
    var microbiologyOptions = document.getElementById('microbiologyOptions'); 
    var microscopyOptions = document.getElementById('microscopyOptions'); // Add this line

    if (this.value === 'chemistry') {
        chemistryOptions.style.display = 'block';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    } else if (this.value === 'hematology') {
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'block';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    } else if (this.value === 'bbis') {
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'block';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    } else if (this.value === 'parasitology') {
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'block';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    } else if (this.value === 'microbiology') { 
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'block'; // Show Microbiology options
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    } else if (this.value === 'microscopy') { // Add this condition
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'block'; // Show Microscopy options
    } else {
        chemistryOptions.style.display = 'none';
        hematologyOptions.style.display = 'none';
        bbisOptions.style.display = 'none';
        parasitologyOptions.style.display = 'none';
        microbiologyOptions.style.display = 'none';
        microscopyOptions.style.display = 'none'; // Hide Microscopy options
    }



    
});

document.getElementById('procedure_type').addEventListener('change', function() {
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
  
// Function to toggle display of the input field for "Others" based on section
function toggleOthersInput(sectionId) {
    var othersInput = document.getElementById(sectionId + 'Input');
    if (othersInput.style.display === 'none') {
        othersInput.style.display = 'block';
    } else {
        othersInput.style.display = 'none';
    }
}

// Function to update sender message
function updateSenderMessage() {
    var selectedTests = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxes.forEach(function(checkbox) {
        if (checkbox.value === 'Others') {
            var sectionId = checkbox.name.split('_')[0]; // Extract section ID from checkbox name
            var othersInput = document.getElementById(sectionId + 'Input');
            selectedTests.push(othersInput.value);
        } else {
            selectedTests.push(checkbox.value);
        }
    });
    document.getElementById('sender_message').value = selectedTests.join(', ');
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

</script>

@include('partials.footer ')
