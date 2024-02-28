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
.flex-row-none {
    display: flex;
    flex-direction: row;
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

<style>
    
    </style>

<section id="admission">

    <div class="admission-content">
        
      <div class="left">
        <div class="card pe-0 mb-4 shadow-md" style="border: none;">
            <div class="boxes">
                <div class="box box1 flex-col bg-custom-101">
                    <div class="left-top-1">
                        <h4 class="font-bold">{{  $patient->first_name }} {{  $patient->last_name }}</h4>
                        <p class="font-bold">ID{{  $patient->patient_id }}</p>
                    </div>
                    <div class="left-top-2 flex-row-none gap-16">
                        <p class="font-bold">{{ Carbon\Carbon::parse($patient->date_of_birth)->age }} yrs</p>
                        <p class="font-bold">{{ optional($patient)->gender }}</p>
                    </div>
                </div>
                <div class="box box1 flex-col bg-white" style="font-size: 0.9em;">
                    <p class="font-bold">Request Information (ID: {{ $request->request_id }})</p>
                    <div class="left-top-1 flex-row">
                        <p class="">Date:</p>
                        <p class="">{{ \Carbon\Carbon::parse($request->date_needed)->format('n/j/Y') }}</p>               
                    </div>
                    <div class="left-top-1 flex-row">
                        <p class="">Time:</p>
                        <p class="">{{ \Carbon\Carbon::parse($request->time_needed)->format('h:i A') }}</p>               
                    </div>
                    <div class="left-top-1 flex-row">
                        <p class="">Type of Service:</p>
                        <p class="">{{ $request->procedure_type }}</p>
                    </div>
                    <div class="left-top-1">
                        <p class="">Type of Test:</p>
                        <p class="">{{ $request->sender_message }}</p>
                    </div>
                    {{-- <div class="left-top-1 row">
                        <div class="col-md-4">
                            <p class="" style="min-width: 100px;">Type of Test:</p>
                        </div>
                        <div class="col-md-8 overflow-wrap d-flex flex-column">
                            @php
                                $senderMessageArray = explode(',', $request->sender_message);
                            @endphp
                            @foreach($senderMessageArray as $message)
                                <p class="text-md-end">{{ trim($message) }}</p>
                            @endforeach
                        </div>
                    </div> --}}
                </div>            
                <div class="card-footer flex-col">
                    <div class="flex-row">
                        <small class="text-muted">Requested by:</small>
                        @if ($request->sender_id)
                            @if ($request->sender)
                                <small class="text-muted">{{ $request->sender->first_name }} {{ $request->sender->last_name }}</small>
                            @else
                                <small class="text-muted">Unknown Sender</small>
                            @endif
                        @else
                            <small class="text-muted">Unknown Sender</small>
                        @endif
                    </div>
                    <div class="flex-row">
                        <small class="text-muted">Date & Time:</small>
                        <small class="text-muted">{{ optional($request)->created_at ? \Carbon\Carbon::parse($request->created_at)->format('g:i A n/j/Y') : '' }}</small>
                    </div>
                </div>
                
            </div>
        </div>
        
      </div>

      <div class="right">
        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="font-bold">Send Result</h4>
                </div>
                <!-- FORM -->
                <form action="{{ route('process.lab') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_id" value="{{ $request->request_id }}">

                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Images</label>
                        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple required>
                    </div>
                    
                    {{-- <button type="submit" class="btn btn-primary">Send Result</button> --}}
                    <div class="buttons mt-4 flex justify-content-end">
                        <div class="a-btn">
                            <a href="{{ route('medtech.requests') }}" class="btn btn-light btn-custom-style btn-cancel">Cancel</a>
                        </div>
                        <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" onclick="showConfirmationModal()">Submit</button>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <div class="modalContent">
                                        <h1 class="text-center text-success">
                                            <span class="material-symbols-outlined bg-custom-color text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.75 2.25098C12.75 1.65424 12.9871 1.08194 13.409 0.659986C13.831 0.238029 14.4033 0.000976563 15 0.000976563L21 0.000976562C21.7956 0.000976563 22.5587 0.317047 23.1213 0.879656C23.6839 1.44227 24 2.20533 24 3.00098V21.001C24 21.7966 23.6839 22.5597 23.1213 23.1223C22.5587 23.6849 21.7956 24.001 21 24.001H3C2.20435 24.001 1.44129 23.6849 0.87868 23.1223C0.316071 22.5597 0 21.7966 0 21.001V3.00098C0 2.20533 0.316071 1.44227 0.87868 0.879656C1.44129 0.317047 2.20435 0.000976563 3 0.000976563L12 0.000976562C11.529 0.627977 11.25 1.40648 11.25 2.25098V11.251H8.25C8.10147 11.2507 7.9562 11.2946 7.83262 11.3769C7.70904 11.4593 7.6127 11.5766 7.55582 11.7138C7.49895 11.851 7.48409 12.002 7.51314 12.1477C7.54219 12.2933 7.61384 12.4271 7.719 12.532L11.469 16.282C11.5387 16.3518 11.6214 16.4072 11.7125 16.445C11.8037 16.4829 11.9013 16.5023 12 16.5023C12.0987 16.5023 12.1963 16.4829 12.2874 16.445C12.3786 16.4072 12.4613 16.3518 12.531 16.282L16.281 12.532C16.3862 12.4271 16.4578 12.2933 16.4869 12.1477C16.5159 12.002 16.5011 11.851 16.4442 11.7138C16.3873 11.5766 16.291 11.4593 16.1674 11.3769C16.0438 11.2946 15.8985 11.2507 15.75 11.251H12.75V2.25098Z" fill="white"/>
                                                </svg>
                                                
                                                
                                            </span>
                                        </h1>
                                        <div class="text-center mt-4">
                                            <h4 class="font-bold">Confirm Submission</h4>
                                            <p class="mb-4">The information entered in this form will be saved. <br> Are you sure you want to save this?</p>
                                        </div>
                                        <div class="d-flex justify-content-evenly mt-5">
                                            <button type="button" class="btn btn-light ms-2 btn-custom-style btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success ms-2 btn-custom-style btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal2">Save</button>
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
                                            <p class="mb-4">Password is required to save the input.</p>
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
        <div class="card pe-0 mb-4 shadow-md">
            <div class="card-body m-2">
              <div class="d-flex justify-content-between mb-4">
                <h4 class="font-bold">Patient Complete History</h4>
                {{-- <a href="/nurse-patients/edit/{{$patient->patient_id}}" class="btn btn-success ms-2 btn-custom-style btn-submit" style="width: auto;" type="submit">View/Edit</a> --}}
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
        </div>


        


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





