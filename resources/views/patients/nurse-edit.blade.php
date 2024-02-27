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

</style>
<?php $array = array('title' => 'HIMS');?>
<x-nav :data="$array"/>



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
            <div class="box box1 flex-col bg-white shadow-md" style="margin-top: -20px;">
                <p class="font-bold">Laboratory/Imaging Services</p>
                <a href="{{ route('requestService', ['patientId' => $patient->patient_id]) }}" class="btn btn-success btn-custom-style btn-submit" style="width:auto;">Request a Service</a>
            </div>

            @if ($patient->admission_type === 'Inpatient')
            <div class="box box1 flex-col bg-custom-101 mt-10 shadow-md">
                <p class="font-bold">Discharge Date</p>
                <form action="{{ route('patients.updateDischargeDate', ['patient_id' => $patient->patient_id]) }}" method="POST" class="flex gap-4">
                    @csrf 
                    <input type="date" class="form-control rounded-4 m-0" placeholder="Date" id="discharge_date" name="discharge_date" value="{{ $patient->discharge_date ?? '' }}"/>
                    <button type="submit" class="btn btn-success btn-custom-style btn-submit" style="width:auto;">Set</button>
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
                <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">View/Edit</a>
            </div>  

                <div class="header">
                    <hr>
                    <p class="font-bold">Medical History</p>
                </div>
                <div class="patient-complete-history">
                    <div class="flex-row gap-10">
                        <div class="flex-row gap-10">
                            <p class="history-label">Complete History:</p>
                            <p class="history-value">{{ ($medicalHistory->complete_history) ?? 'No medical history available' }}</p>
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
                        <p class="history-label">Clinical Impression:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ isset($neurologicalExaminations) && $neurologicalExaminations->clinical_impression ? $neurologicalExaminations->clinical_impression : 'No clinical impression recorded.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="flex-row gap-10">
                        <p class="history-label">Work Up:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ isset($neurologicalExaminations) && $neurologicalExaminations->work_up ? $neurologicalExaminations->work_up : 'No work up recorded.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="header">
                    <p class="font-bold">Current Medications</p>
                </div>
                <div class="patient-complete-history">
                    <div class="flex-row gap-10">
                        <p class="history-label">Name of Medication and Dosage:</p>
                        <div class="history-value">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="flex gap-2">
                                        {{ $patient->currentMedication ? $patient->currentMedication->current_medications . ', ' . ($patient->currentMedication->current_dosage ?? 'Dosage not specified') : 'No current medications recorded.' }}
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
                                        {{ $patient->currentMedication ? $patient->currentMedication->current_frequency : 'Frequency not specified.' }}
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
                        <small class="text-muted">Unknown Nurse</small>
                    @endif
                </div>
                            
                <div class="flex-row">
                    <small class="text-muted">Date & Time:</small>
                    <small class="text-muted">{{ optional($medicalHistory)->updated_at ? \Carbon\Carbon::parse($medicalHistory->updated_at)->format('g:i A n/j/Y') : '' }}</small>
                </div>
            </div>
            
            
            
                {{-- TEXT HERE --}}




        </div>

        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Nurse Remarks</h4>
                <a href="/nurse-patients/add-remark/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">Add Remark</a>
                </div>  

                <div class="table-header">
                    <hr>
                    <p class="font-bold">Vital Signs</p>
                </div>

                <div class="row row-cols-2 g-4">
                    @foreach ($patient->vitalSigns->take(2) as $key => $vitalSign)
                        <!-- 'take(2)' limits the number of records to two initially -->
                        <div class="col">
                            <div class="card">
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
                                            <small class="text-muted">Unknown Nurse</small>
                                        @endif
                                    </div>
                                    
                                    
                                    <div class="flex-row">
                                        <small class="text-muted">Date & Time:</small>
                                        <small class="text-muted">{{ optional($vitalSign)->vital_time ? \Carbon\Carbon::parse($vitalSign->updated_at)->format('g:i A n/j/Y') : '' }}</small>
                    
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
                                        <p class="">{{ $vitalSign->oxygen }} %</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="flex-row">
                                        <small class="text-muted">Submitted By:</small>
                                        @if ($vitalSign->nurse_user)
                                            <small class="text-muted">{{ $vitalSign->nurse_user->first_name }} {{ $vitalSign->nurse_user->last_name }}</small>
                                        @else
                                            <small class="text-muted">Unknown Nurse</small>
                                        @endif
                                    </div>
                                    
                                    
                                    <div class="flex-row">
                                        <small class="text-muted">Date & Time:</small>
                                        <small class="text-muted">{{ optional($vitalSign)->vital_time ? \Carbon\Carbon::parse($vitalSign->updated_at)->format('g:i A n/j/Y') : '' }}</small>
                    
                                        {{-- <small class="text-muted">{{ \Carbon\Carbon::parse($vitalSign->created_at)->format('g:i A') }}</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
                    <!-- Button to show more vital sign cards -->
                    @if(count($patient->vitalSigns) > 2)
                        <div class="col-12 text-center mt-4">
                            <button id="showMoreButton" class="badge btn-submit" onclick="toggleSecondRow()">Show more</button>
                        </div>
                    @endif
                
                </div>
                
                


            <div class="table-header">
                <hr>
                <p class="font-bold">Medications, Treatment & etc.</p>
            </div>
            <div class="accordion mt-2 mb-2" id="medicationRemarksAccordion">
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
                                    <small class="text-muted">Unknown Nurse</small>
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
                <a href="/nurse-patients/add-progress-note/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">Add Progress Note</a>
            </div>  
            <div class="table-header">
                <hr>
                {{-- <p class="font-bold">Medications, Treatment & etc.</p> --}}
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




</script>
@include('partials.footer')




