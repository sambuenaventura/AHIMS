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

.modal-dialog { 
    margin: auto;
    max-width: 600px; /* Change the width to your desired value */
    width: 100%; /* Ensure modal doesn't exceed viewport width */
}
.modal-dialog h4 {
  margin-bottom: 1.5rem;
  font-size: 1.5rem;
}
.cancel-btn {
    background: #E7E7E7 !important;
}
/* Customize modal backdrop background */
.modal-backdrop {
    background-color: rgb(44, 105, 75)/* Change the background color and opacity as needed */
}
</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>



<section id="admission">
    <div class="admission-content">
      <div class="left">
        <div class="boxes">
            <div class="box box1 flex-col bg-custom-101 shadow-md" style="z-index: 999; position: relative;">
                @if ($patient->admission_type === 'archived')
                    <div class="left-top-1">
                        <span class="badge bg-secondary position-absolute top-0 start-0">ARCHIVED</span>
                        <p class="font-bold">ID{{  $patient->patient_id }}</p>
                        <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                    </div>
                @else
                    <div class="left-top-1">
                        <p class="font-bold">ID{{  $patient->patient_id }}</p>
                        <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                    </div>
                @endif
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
            @if(!$patient->archived)

            <div class="box box1 flex-col bg-white shadow-md" style="margin-top: -20px;">
                <p class="font-bold">Laboratory/Imaging Services</p>
                <a href="{{ route('requestService', ['patientId' => $patient->patient_id]) }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center justify-content-center btn-submit" style="font-size: 1em; width:auto;">
                    <span class="p-1 rounded">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff" height="24" viewBox="0 -960 960 960" width="24"><path d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>                    </span>
                    <span class="p-1 rounded">Request a Service</span>
                </a>
                <a href="{{ route('showResults', ['patientId' => $patient->patient_id]) }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center justify-content-center btn-submit mt-2" style="font-size: 1em; width:auto;">
                    <span class="p-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff" width="18" height="18" viewBox="0 0 24 24"><path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"/></svg>
                    </span>
                    <span class="p-1 rounded">View Results</span>
                </a>







                {{-- <a href="{{ route('requestService', ['patientId' => $patient->patient_id]) }}" class="btn btn-success btn-custom-style btn-submit" style="width:auto;">Request a Service</a> --}}
                {{-- <a href="{{ route('showResults', ['patientId' => $patient->patient_id]) }}" class="btn btn-success btn-custom-style btn-submit mt-2" style="width:auto;">View Results</a> --}}
            </div>

            <div class="box box1 flex-col bg-white shadow-md" style="margin-top: -20px;">
                <p class="font-bold">Generate PDF Report</p>

                <form action="{{ route('generate_report', ['patient_id' => $patient->patient_id]) }}" method="post">
                    @csrf
                    <!-- Add other form elements here -->
                    <button type="submit" class="badge rounded-pill text-bg-success d-flex align-items-center justify-content-center btn-submit" style="font-size: 1em; width:100%; display: flex;">
                        <span class="p-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#ffffff">
                                <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/>
                              </svg>
                        </span>
                        <span class="p-1 rounded">Download PDF</span>
                    </button>
                </form>
                
                
                
            </div>


        @endif
            @if ($patient->admission_type === 'Inpatient')
            <div class="box box1 flex-col bg-custom-101 mt-10 shadow-md">
                <p class="font-bold">Set Discharge Date</p>
                <form action="{{ route('patients.updateDischargeDate', ['patient_id' => $patient->patient_id]) }}" method="POST" >
                    @csrf 
                    <div class="flex gap-4 mb-2">
                        <input type="date" min="{{ date('Y-m-d') }}" class="form-control rounded-4 m-0" placeholder="Date" id="discharge_date" name="discharge_date" value="{{ $patient->discharge_date ?? ''}}"/>
                        <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModal()">Discharge</button>
                    </div>
                    
                    @error('discharge_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">

                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path d="M600-80v-80h160v-400H200v160h-80v-320q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H600ZM320 0l-56-56 103-104H40v-80h327L264-344l56-56 200 200L320 0ZM200-640h560v-80H200v80Zm0 0v-80 80Z" fill="white"/>
                                                </svg>
                                                
                                                                                                
                                                
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Confirm Discharge</h4>
                                            <p class="mb-4">This action will set the discharge date for the patient. <br> Are you sure you want to proceed?</p>
                                        </div>
                                        
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" style="background-color: #E7E7E7;" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal2">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                    <!-- Second Modal - Password Entry -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
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
                                                    <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success ms-2 btn-custom-style btn-submit" id="submitWithPassword">Proceed</button>
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
            
        @endif
        
            
        </div>
      </div>
      
      <div class="right">
        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Patient Complete History</h4>
                @if($patient->archived)
                <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">View</a>
            @else
                <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">View/Edit</a>
            @endif
                        </div>  

                <div class="header">

                    
                    <hr>
                    
                    <p class="font-bold">Medical History</p>
                </div>
                <div class="patient-complete-history">
                    <div class="flex-row gap-10">
                        <div class="flex-row gap-10">
                            <p class="history-label">Complete History:</p>
                            <p class="history-value">{{ ($medicalHistory->complete_history) ?? 'No medical history recorded.' }}</p>
                        </div>
                    
                    </div>
                    <div class="flex-row gap-10">
                        <p class="history-label">Past Medical History:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->hypertension ? 'checked' : '' }}>
                                            Hypertension
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->diabetes ? 'checked' : '' }}>
                                            Diabetes
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->asthma ? 'checked' : '' }}>
                                            Asthma
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" class="custom-checkbox" disabled {{ optional($medicalHistory)->others_checkbox ? 'checked' : '' }}>
                                            {{ optional($medicalHistory)->others_details ? optional($medicalHistory)->others_details : 'Others' }}
                                        </p>

                                </div>
                                <div class="col-md-4">
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->allergies ? 'checked' : '' }}>
                                            Allergies
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->stroke ? 'checked' : '' }}>
                                            Stroke
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->cvd ? 'checked' : '' }}>
                                            CVD
                                        </p>
  
                                </div>
                                <div class="col-md-4">
                                    
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->medications ? 'checked' : '' }}>
                                            Medications
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->previous_hospitalization ? 'checked' : '' }}>
                                            Previous Hospitalization
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->mental_neuropsychiatric_illness ? 'checked' : '' }}>
                                            Mental Illness
                                        </p>
     

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="flex-row gap-10">
                        <p class="history-label">Family History:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->family_hypertension ? 'checked' : '' }}>
                                            Family Hypertension
                                        </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->family_diabetes ? 'checked' : '' }}>
                                            Family Diabetes
                                        </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        <input type="checkbox" disabled {{ optional($medicalHistory)->family_cancer ? 'checked' : '' }}>
                                        Family Cancer
                                    </p>
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->family_asthma ? 'checked' : '' }}>
                                            Family Asthma
                                        </p>

                                    <!-- Add similar checks for other family history checkboxes -->
                                </div>
                                <div class="col-md-4">
                                        <p class="flex gap-2">
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->family_heart_disease ? 'checked' : '' }}>
                                            Family Heart Disease
                                        </p>
                                        
                                        <p class="flex gap-2">                                            
                                            <input type="checkbox" disabled {{ optional($medicalHistory)->family_others_checkbox ? 'checked' : '' }}>
                                            {{ optional($medicalHistory)->family_others_details ? optional($medicalHistory)->family_others_details : 'Others' }}
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="flex-row gap-10">
                        <p class="history-label">Personal/Social History:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- @if(!$medicalHistory->personal_smoker && !$medicalHistory->personal_drug_abuse && !$medicalHistory->personal_alcoholic_drinker)
                                        <p>No personal/social history available.</p>
                                    @endif --}}
                                    <p class="flex gap-2">
                                        <input type="checkbox" disabled {{ optional($medicalHistory)->personal_smoker ? 'checked' : '' }}>
                                        Smoker
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        <input type="checkbox" disabled {{ optional($medicalHistory)->personal_drug_abuse ? 'checked' : '' }}>
                                        Drug Abuse
                                    </p>
                                    <!-- Add similar checks for other personal history checkboxes -->
                                </div>
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        <input type="checkbox" disabled {{ optional($medicalHistory)->personal_alcohol_drinker ? 'checked' : '' }}>
                                        Alcoholic
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>                                     

                    
                    {{-- <p class="">Obstetrical History History: </p>
                    <p class="">Pediatric Medical History: </p> --}}

                    <div class="flex-row gap-10">
                        <p class="history-label">Physical Examination:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- @if(!$physicalExaminations->vitals_blood_pressure && !$physicalExaminations->vitals_respiratory_rate && !$physicalExaminations->vitals_pulse_rate)
                                        <p>No family history available.</p>
                                    @endif --}}
                                    <p class="flex gap-2">
                                        {{ optional($physicalExaminations)->vitals_blood_pressure ? optional($physicalExaminations)->vitals_blood_pressure . ' mmHg' : 'N/A' }}
                                    </p>
                                    <p class="flex gap-2">
                                        {{ optional($physicalExaminations)->vitals_blood_pressure ? optional($physicalExaminations)->vitals_temperature . '°C' : 'N/A' }}                                       
                                    </p>


                                </div>
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ optional($physicalExaminations)->vitals_blood_pressure ? optional($physicalExaminations)->vitals_respiratory_rate . ' cpm' : 'N/A' }}                                      
                                    </p>
                                    <p class="flex gap-2">
                                        {{ optional($physicalExaminations)->vitals_blood_pressure ? optional($physicalExaminations)->vitals_weight . ' kg' : 'N/A' }}
                                        
                                    </p>
                                    <!-- Add similar checks for other personal history checkboxes -->
                                </div>
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ optional($physicalExaminations)->vitals_blood_pressure ? optional($physicalExaminations)->vitals_pulse_rate . ' bpm' : 'N/A' }}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>    

                    <div class="flex-row gap-10">
                        <div class="flex-row gap-10">
                            <p class="history-label">Clinical Impression:</p>
                            <p class="history-value">{{ isset($neurologicalExaminations) && $neurologicalExaminations->clinical_impression ? $neurologicalExaminations->clinical_impression : 'No clinical impression recorded.' }}</p>
                        </div>
                    </div>

                    <div class="flex-row gap-10">
                        <div class="flex-row gap-10">
                            <p class="history-label">Work Up:&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p class="history-value">
                                {{ isset($neurologicalExaminations) && $neurologicalExaminations->work_up ? $neurologicalExaminations->work_up : 'No work up recorded.' }}
                            </p>                        
                        </div>
                    </div>

                </div>
                <div class="header">
                    <p class="font-bold">Current Medications</p>
                </div>
                <div class="patient-complete-history">
                    <div class="flex-row gap-10">
                        <p class="history-label">Name of Medication:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {!! nl2br(e($patient->currentMedication->current_medications ?? 'Medications not specified.')) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row gap-10">
                        <p class="history-label">Dosage:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {!! nl2br(e($patient->currentMedication->current_dosage ?? 'Dosage not specified.')) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row gap-10">
                        <p class="history-label">Frequency:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {!! nl2br(e($patient->currentMedication ? $patient->currentMedication->current_frequency : 'Frequency not specified.')) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row gap-10">
                        <p class="history-label">Prescribing Physician:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ $patient->currentMedication ? $patient->currentMedication->current_prescribing_physician : 'No prescribing physician recorded.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card-footer flex-col">
                <div class="flex-row">
                    <small class="text-muted">Submitted By:</small>
                    @if ($medicalHistory && $medicalHistory->nurse_user)
                        <small class="text-muted">{{ optional($medicalHistory->nurse_user)->first_name }} {{ optional($medicalHistory->nurse_user)->last_name }}</small>
                    @else
                        <small class="text-muted">N/A</small>
                    @endif
                </div>
                                                    
                <div class="flex-row">
                    <small class="text-muted">Date & Time:</small>
                    <small class="text-muted">{{ optional($medicalHistory)->updated_at ? \Carbon\Carbon::parse($medicalHistory->updated_at)->format('g:i A n/j/Y') : 'N/A' }}</small>
                </div>
                        
                <!-- Addition of the button -->
                @if ($medicalHistory)
                    <div class="col-12 text-right mt-2 mb-2">
                            <a href="{{ route('nurse.history', ['patient_id' => $medicalHistory->patient_id]) }}" class="badge btn-submit">View Audit Logs</a>
                    </div>
                @endif




            </div>
            
            
            
            
            
                {{-- TEXT HERE --}}




        </div>

        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Nurse Remarks</h4>
                @if(!$patient->archived)
                <a href="/nurse-patients/add-remark/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">+ Add Remark</a>
                @endif
                            
            </div>  

                <div class="table-header">
                    
                    <hr>
                    
                    {{-- <p class="font-bold"><a href="{{ route('nurse.viewRemarks', ['id' => $patient->patient_id]) }}">Vital Signs</a></p> --}}
                    <p class="font-bold">
                        @if(!$patient->vitalSigns->isEmpty())
                            <a href="{{ route('nurse.viewRemarks', ['id' => $patient->patient_id]) }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center btn-submit" style="font-size: 1em;">
                                    <span class="p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff" width="15" height="15" viewBox="0 0 24 24"><path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"/></svg>
                                    </span>
                                <span class="p-1 rounded">View Vital Signs</span>
                            </a>
                        @endif
                    </p>

                </div>

                <div class="row row-cols-2 g-4">
                    @if($patient->vitalSigns->isEmpty())
                    <div class="col-12 text-center">
                        <p>No vital signs recorded</p>
                    </div>
                    @else
                    @foreach ($patient->vitalSigns->take(2) as $key => $vitalSign)
                        <!-- 'take(2)' limits the number of records to two initially -->
                        <div class="col">
                            <div class="card @if($patient->vitalSigns->count() <= 2) mb-4 @endif">
                                <!-- Check if it's the latest entry to add the 'NEW' badge -->
                                @if($key === 0)
                                    <div class="badge btn-submit" style="font-size: 0.65em; position: absolute; top: 0; right: 0; padding: 4px;">NEW</div>
                                @endif
                                <div class="card-body mt-4 mb-2">
                                    <!-- Vital sign fields -->
                                    <div class="flex-row">
                                        <p class="">Date:</p>
                                        <p class="">{{ \Carbon\Carbon::parse($vitalSign->vital_date)->format('n/j/Y') }}</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Time:</p>
                                        <p class="">{{ \Carbon\Carbon::parse($vitalSign->vital_time)->format('g:i A') }}</p>
                                    </div>
                                    <!-- Add other vital sign fields here -->
                                    <div class="flex-row">
                                        <p class="">Blood Pressure:</p>
                                        <p class="">{{ $vitalSign->blood_pressure }} mmHg</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Respiratory Rate:</p>
                                        <p class="">{{ $vitalSign->respiratory_rate }} cpm</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Pulse:</p>
                                        <p class="">{{ $vitalSign->pulse }} bpm</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Temperature:</p>
                                        <p class="">{{ $vitalSign->temperature }}°C</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Oxygen:</p>
                                        <p class="">{{ $vitalSign->oxygen }}%</p>
                                    </div>
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
                    
                                        {{-- <small class="text-muted">{{ \Carbon\Carbon::parse($vitalSign->created_at)->format('g:i A') }}</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
                    <!-- Initially hidden vital sign cards after the second one -->
                    @foreach ($patient->vitalSigns->take(4)->slice(2) as $vitalSign)
                        <div class="col" style="display: none;">
                            <div class="card">
                                <!-- Vital sign fields -->
                                <div class="card-body mt-4 mb-2">
                                    <!-- Add vital sign fields here -->
                                    <div class="flex-row">
                                        <p class="">Date:</p>
                                        <p class="">{{ \Carbon\Carbon::parse($vitalSign->vital_date)->format('n/j/Y') }}</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Time:</p>
                                        <p class="">{{ \Carbon\Carbon::parse($vitalSign->vital_time)->format('g:i A') }}</p>
                                    </div>
                                    <!-- Add other vital sign fields here -->
                                    <div class="flex-row">
                                        <p class="">Blood Pressure:</p>
                                        <p class="">{{ $vitalSign->blood_pressure }} mmHg</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Respiratory Rate:</p>
                                        <p class="">{{ $vitalSign->respiratory_rate }} cpm</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Pulse:</p>
                                        <p class="">{{ $vitalSign->pulse }} bpm</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Temperature:</p>
                                        <p class="">{{ $vitalSign->temperature }} °C</p>
                                    </div>
                                    <div class="flex-row">
                                        <p class="">Oxygen:</p>
                                        <p class="">{{ $vitalSign->oxygen }}%</p>
                                    </div>
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
                    
                                        {{-- <small class="text-muted">{{ \Carbon\Carbon::parse($vitalSign->created_at)->format('g:i A') }}</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
                    <!-- Button to show more vital sign cards -->
                    @if(count($patient->vitalSigns) > 2)
                        <div class="col-12 text-center mt-4 mb-4">
                            <button id="showMoreButton" class="badge btn-submit" onclick="toggleSecondRow()">Show more</button>
                        </div>
                    @endif
                @endif
                </div>
                
                    


            <div class="table-header">
                <hr>
                {{-- <p class="font-bold"><a href="{{ route('nurse.viewMedications', ['id' => $patient->patient_id]) }}">Medications, Treatment & etc.</a></p> --}}
                <p class="font-bold">
                    @if(!$patient->medicationRemarks->isEmpty())
                        <a href="{{ route('nurse.viewMedications', ['id' => $patient->patient_id]) }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center btn-submit" style="font-size: 1em;">
                            <span class="p-1 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff" width="15" height="15" viewBox="0 0 24 24"><path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"/></svg>
                            </span>
                            <span class="p-1 rounded">View Medications</span>
                        </a>
                    @endif
                </p>            
            </div>
            <div class="accordion mt-2 mb-2" id="medicationRemarksAccordion">
                @if($patient->medicationRemarks->isEmpty())
                <div class="col-12 text-center">
                    <p>No medications recorded</p>
                </div>
                @endif
                @foreach ($patient->medicationRemarks->take(3) as $index => $medicationRemark)

                <div class="card mb-3">
                    <div class="card-header" id="heading{{ $index }}" onclick="toggleCollapse({{ $index }})" data-toggle="collapse" data-target="#collapse{{ $index }}">
                        <div class="mb-0 d-flex justify-content-between align-items-center">
                            <p class="mb-0 d-flex justify-content-between align-items-center">
                                {{ $medicationRemark->shift ?? 'N/A' }} shift
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
                    
            
                    <div id="collapse{{ $index }}" class="custom-collapse" aria-labelledby="heading{{ $index }}" data-parent="#medicationRemarksAccordion">
                        <div class="card-body">
                            <div class="flex-col">
                                <p class="font-bold">Date</p>
                                <p class="">{{  \Carbon\Carbon::parse($medicationRemark->medication_date)->format('n/j/Y') }}</p>
                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Medications</p>
                                <p>{!! nl2br(e($medicationRemark->medication ?? 'N/A')) !!}</p>

                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Dosage</p>
                                <p>{!! nl2br(e($medicationRemark->medication_dosage ?? 'N/A')) !!}</p>

                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Dietary Information</p>
                                <p>{!! nl2br(e($medicationRemark->dietary_information ?? 'N/A')) !!}</p>
                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Treatment</p>
                                <p>{!! nl2br(e($medicationRemark->treatment ?? 'N/A')) !!}</p>
                            </div>
                            <div class="flex-col">
                                <p class="font-bold">Dietary Information</p>
                                <p>{!! nl2br(e($medicationRemark->remarks_notes ?? 'N/A')) !!}</p>
                            </div>
                            
                            <!-- Add content here that should be hidden initially -->
                        </div>
                        <div class="card-footer">
                            <div class="flex-row">
                                <small class="text-muted">Submitted By:</small>
                                @if ($medicationRemark->nurse_user)
                                    <small class="text-muted">{{ $medicationRemark->nurse_user->first_name }} {{ $medicationRemark->nurse_user->last_name }}</small>
                                @else
                                    <small class="text-muted">N/A</small>
                                @endif
                            </div>
                            <div class="flex-row">
                                <small class="text-muted">Date & Time:</small>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($medicationRemark->updated_at)->format('g:i A n/j/Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            




   
            





        </div>
        </div>


        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Progress Notes</h4>
                @if(!$patient->archived)
                <a href="/nurse-patients/add-progress-note/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">+ Add Progress Note</a>
            @endif
                        </div>  
            <div class="table-header">
                <hr>
                {{-- <p class="font-bold">Medications, Treatment & etc.</p> --}}
                <p class="font-bold">
                    @if(!$patient->progressNotes->isEmpty())

                    <a href="{{ route('nurse.viewNotes', ['id' => $patient->patient_id]) }}" class="badge rounded-pill text-bg-success d-inline-flex align-items-center btn-submit" style="font-size: 1em;">
                        <span class="p-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff" width="15" height="15" viewBox="0 0 24 24"><path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"/></svg>
                        </span>
                        <span class="p-1 rounded">View Notes</span>
                    </a>
                    @endif
                </p>
            </div>
            <div class="accordion mt-2 mb-2" id="progressNotesAccordion">
                @if($patient->progressNotes->isEmpty())
                <div class="col-12 text-center">
                    <p>No progress notes recorded</p>
                </div>
                @endif
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
                                    <small class="text-muted">N/A</small>
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
        </div>


        {{-- MEDTECH REQUEST --}}
        {{-- <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Request Laboratory Services</h4>
                </div>

                <form action="{{ route('nurse.requestLaboratoryServices', ['id' => $patient->patient_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
        
                    <div class="form-group mb-3">
                        <label for="procedure_type" class="form-label">Procedure Type</label>                        
                        <select id="procedure_type" name="procedure_type" class="form-select">
                            <option value="chemistry">Chemistry</option>
                            <option value="hematology">Hematology</option>
                            <option value="Bbis">Blood Bank/Immunohematology</option>
                            <option value="parasitology">Parasitology</option>
                            <option value="microbiology">Microbiology</option>
                            <option value="microscopy">Microscopy</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('procedure_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div> --}}
        
        {{-- MEDTECH RESULTS --}}
        {{-- @if ($medtechCompletedResults->isNotEmpty())
        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Laboratory Results</h4>
                </div>
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th class="text-center" scope="col">Date Accepted</th>
                            <th class="text-center" scope="col">Time Performed</th>
                            <th class="text-center" scope="col">Medtech on duty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medtechCompletedResults as $result)
                        <tr>
                            <td><a href="{{ route('nurse.viewRequest', ['patientId' => $patient->patient_id, 'requestId' => $result->request_id]) }}">{{ $result->message }}</a></td>                            
                            <td class="text-center">{{ $result->created_at->format('n/j/Y') }}</td>
                            <td class="text-center">{{ $result->created_at->format('h:i A') }}</td>
                            <td class="text-center">{{ optional($result->medtech)->first_name }} {{ optional($result->medtech)->last_name }}</td>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif --}}

         {{-- RADTECH --}}
         {{-- <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Request Imaging Services</h4>
                </div>
        
                <form action="{{ route('nurse.requestImagingServices', ['id' => $patient->patient_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
        
                    <div class="form-group mb-3">
                        <label for="procedure_type" class="form-label">Procedure Type</label>                        
                        <select id="procedure_type" name="procedure_type" class="form-select">                            
                            <option value="x_ray">X-ray</option>
                            <option value="ultrasound">Ultrasound</option>
                            <option value="ct_scan">CT Scan</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('procedure_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <!-- Add more form fields as needed -->
        
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div> --}}

        {{-- @if ($radtechCompletedResults->isNotEmpty())       
        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-1">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Imaging Results</h4>
                </div>
                <table class="table table-striped mt-3 Add">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th class="text-center" scope="col">Date Accepted</th>
                            <th class="text-center" scope="col">Time Performed</th>
                            <th class="text-center" scope="col">Radtech on duty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($radtechCompletedResults as $result)
                        <tr>
                            <td><a href="{{ route('nurse.viewRequest', ['patientId' => $patient->patient_id, 'requestId' => $result->request_id]) }}">{{ $result->message }}</a></td>                            
                            <td class="text-center">{{ $result->created_at->format('n/j/Y') }}</td>
                            <td class="text-center">{{ $result->created_at->format('h:i A') }}</td>
                            <td class="text-center">{{ optional($result->radtech)->first_name }} {{ optional($result->radtech)->last_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif --}}

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



function showConfirmationModal() {
        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
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
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    });
    myModal.show();
});


</script>
@include('partials.footer')




