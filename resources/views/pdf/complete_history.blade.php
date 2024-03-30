<!DOCTYPE html>
<html>
<head>
    <title>Patient Medical History Report</title>
    <!-- Include any necessary CSS styles here -->
    <style>
        /* Define your CSS styles for the PDF content */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }
        h1, h2 {
            margin-bottom: 10px;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Patient Medical History Report</h1>
    
    <h2>Basic Information</h2>
    <p><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
    <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
    <p><strong>Gender:</strong> {{ $patient->gender }}</p>
    <p><strong>Contact Number:</strong> {{ $patient->contact_number }}</p>
    <p><strong>Address:</strong> {{ $patient->address }}</p>
    <!-- Include other basic patient information as needed -->

    <h2>Medical History</h2>
    <p><strong>Complete History:</strong> 
        @if (!empty($patient->medicalHistory->complete_history))
            {{ $patient->medicalHistory->complete_history }}
        @else
            No complete history available.
        @endif
    </p>
        
    
    <h2>Medical History</h2>
    <p><strong>Hypertension:</strong> {{ optional($patient->medicalHistory)->hypertension ? 'Yes' : 'No' }}</p>
    <p><strong>Diabetes:</strong> {{ optional($patient->medicalHistory)->diabetes ? 'Yes' : 'No' }}</p>
    <p><strong>Asthma:</strong> {{ optional($patient->medicalHistory)->asthma ? 'Yes' : 'No' }}</p>
    <p><strong>Allergies:</strong> {{ optional($patient->medicalHistory)->allergies ? 'Yes' : 'No' }}</p>
    <p><strong>Stroke:</strong> {{ optional($patient->medicalHistory)->stroke ? 'Yes' : 'No' }}</p>
    <p><strong>CVD:</strong> {{ optional($patient->medicalHistory)->cvd ? 'Yes' : 'No' }}</p>
    <p><strong>Medications:</strong> {{ optional($patient->medicalHistory)->medications ? 'Yes' : 'No' }}</p>
    <p><strong>Previous Hospitalization:</strong> {{ optional($patient->medicalHistory)->previous_hospitalization ? 'Yes' : 'No' }}</p>
    <p><strong>Mental Illness:</strong> {{ optional($patient->medicalHistory)->mental_neuropsychiatric_illness ? 'Yes' : 'No' }}</p>
    @if (optional($patient->medicalHistory)->others_checkbox)
        <p><strong>Others:</strong> {{ optional($patient->medicalHistory)->others_details }}</p>
    @endif
    
    <!-- Include other medical conditions as needed -->
    
    
    <h2>Family History</h2>
    <p><strong>Family History of Hypertension:</strong> {{ optional($patient->medicalHistory)->family_hypertension ? 'Yes' : 'No' }}</p>
    <p><strong>Family History of Diabetes:</strong> {{ optional($patient->medicalHistory)->family_diabetes ? 'Yes' : 'No' }}</p>
    <p><strong>Family History of Cancer:</strong> {{ optional($patient->medicalHistory)->family_cancer ? 'Yes' : 'No' }}</p>
    <p><strong>Family History of Asthma:</strong> {{ optional($patient->medicalHistory)->family_asthma ? 'Yes' : 'No' }}</p>
    <p><strong>Family History of Heart Disease:</strong> {{ optional($patient->medicalHistory)->family_heart_disease ? 'Yes' : 'No' }}</p>
    @if (optional($patient->medicalHistory)->family_others_checkbox)
        <p><strong>Others:</strong> {{ optional($patient->medicalHistory)->family_others_details }}</p>
    @endif    


    <h2>Personal/Social History</h2>
    <p><strong>Smoker:</strong> {{ optional($patient->medicalHistory)->personal_smoker ? 'Yes' : 'No' }}</p>
    <p><strong>Drug Abuse:</strong> {{ optional($patient->medicalHistory)->personal_drug_abuse ? 'Yes' : 'No' }}</p>
    <p><strong>Alcoholic:</strong> {{ optional($patient->medicalHistory)->personal_alcohol_drinker ? 'Yes' : 'No' }}</p>

    <h2>Menstrual History</h2>
    <p><strong>Interval:</strong> {{ optional($patient->medicalHistory)->menstrual_interval }} </p>
    <p><strong>Duration:</strong> {{ optional($patient->medicalHistory)->menstrual_duration }} </p>
    <p><strong>Dysmenorrhea:</strong> {{ optional($patient->medicalHistory)->menstrual_dysmenorrhea }} </p>
    
    <h2>Obstetrical History</h2>
    <p><strong>Last Menstrual Period (LMP):</strong> {{ optional($patient->medicalHistory)->obstetrical_lmp }} </p>
    <p><strong>Age of Gestation (AOG):</strong> {{ optional($patient->medicalHistory)->obstetrical_aog }} </p>
    <p><strong>Probable Date of Delivery (PMP):</strong> {{ optional($patient->medicalHistory)->obstetrical_pmp }} </p>
    <p><strong>Estimated Date of Confinement (EDC):</strong> {{ optional($patient->medicalHistory)->obstetrical_edc }} </p>
    <p><strong>Prenatal Checkups:</strong> {{ optional($patient->medicalHistory)->obstetrical_prenatal_checkups }} </p>
    <p><strong>Gravida:</strong> {{ optional($patient->medicalHistory)->obstetrical_gravida }} </p>
    <p><strong>Para:</strong> {{ optional($patient->medicalHistory)->obstetrical_para }} </p>
    <p><strong>First Pregnancy Delivered On:</strong> {{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivered_on }} </p>
    <p><strong>First Pregnancy Term/Preterm:</strong> {{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm }} </p>
    <p><strong>First Pregnancy Girl/Boy:</strong> {{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy }} </p>
    <p><strong>First Pregnancy Delivery Method:</strong> {{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method }} </p>
    <p><strong>First Pregnancy Delivery Place:</strong> {{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_place }} </p>

    <h2>Pediatric History</h2>
    <p><strong>Term:</strong> {{ optional($patient->medicalHistory)->pediatric_term }} </p>
    <p><strong>Preterm:</strong> {{ optional($patient->medicalHistory)->pediatric_preterm }} </p>
    <p><strong>Postterm:</strong> {{ optional($patient->medicalHistory)->pediatric_postterm }} </p>
    <p><strong>Birth By:</strong> {{ optional($patient->medicalHistory)->pediatric_birth_by }} </p>
    <p><strong>NSD/CS:</strong> {{ optional($patient->medicalHistory)->pediatric_nsd_cs }} </p>
    <p><strong>Age of Mother at Pregnancy:</strong> {{ optional($patient->medicalHistory)->pediatric_age_of_mother_at_pregnancy }} </p>
    <p><strong>No of Pregnancy:</strong> {{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy }} </p>
    <p><strong>Complications During Pregnancy:</strong> {{ optional($patient->medicalHistory)->pediatric_complications_during_pregnancy }} </p>
    <p><strong>Immunizations:</strong> {{ optional($patient->medicalHistory)->pediatric_immunizations }} </p>
    <p><strong>No of Pregnancy (First):</strong> {{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_first }} </p>
    <p><strong>No of Pregnancy (Second):</strong> {{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_second }} </p>
    <p><strong>No of Pregnancy (Third):</strong> {{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_third }} </p>
    <p><strong>No of Pregnancy (Others):</strong> {{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_others }} </p>

    {{-- <h2>Review of Systems</h2>
    <h2>Constitutional</h2>
    <table>
        <tr>
            <td><strong>Fever:</strong></td>
            <td>{{ optional($patient->reviewOfSystems)->consti_fever ? 'Yes' : 'No' }}</td>
            <td><strong>Anorexia:</strong></td>
            <td>{{ optional($patient->reviewOfSystems)->consti_anorexia ? 'Yes' : 'No' }}</td>
            <td><strong>Weight Loss:</strong></td>
            <td>{{ optional($patient->reviewOfSystems)->consti_weight_loss ? 'Yes' : 'No' }}</td>
            <td><strong>Fatigue:</strong></td>
            <td>{{ optional($patient->reviewOfSystems)->consti_fatigue ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>

        </tr>
    </table> --}}
    <h2>Review of Systems</h2>
    <h3>Constitutional</h3>
    <p><strong>Fever:</strong> {{ optional($patient->reviewOfSystems)->consti_fever ? 'Yes' : 'No' }}</p>
    <p><strong>Anorexia:</strong> {{ optional($patient->reviewOfSystems)->consti_anorexia ? 'Yes' : 'No' }}</p>
    <p><strong>Weight Loss:</strong> {{ optional($patient->reviewOfSystems)->consti_weight_loss ? 'Yes' : 'No' }}</p>
    <p><strong>Fatigue:</strong> {{ optional($patient->reviewOfSystems)->consti_fatigue ? 'Yes' : 'No' }}</p>
    
    <h3>Hematologic</h3>
    <p><strong>Easy Bruisability:</strong> {{ optional($patient->reviewOfSystems)->hema_easy_bruisability ? 'Yes' : 'No' }}</p>
    <p><strong>Abnormal Bleeding:</strong> {{ optional($patient->reviewOfSystems)->hema_abnormal_bleeding ? 'Yes' : 'No' }}</p>
    
    <h3>EENT</h3>
    <p><strong>Blurring of Vision:</strong> {{ optional($patient->reviewOfSystems)->eent_blurring_of_vision ? 'Yes' : 'No' }}</p>
    <p><strong>Hearing Loss:</strong> {{ optional($patient->reviewOfSystems)->eent_hearing_loss ? 'Yes' : 'No' }}</p>
    <p><strong>Tinnitus:</strong> {{ optional($patient->reviewOfSystems)->eent_tinnitus ? 'Yes' : 'No' }}</p>
    <p><strong>Ear Discharges:</strong> {{ optional($patient->reviewOfSystems)->eent_ear_discharges ? 'Yes' : 'No' }}</p>
    <p><strong>Nose Bleed:</strong> {{ optional($patient->reviewOfSystems)->eent_nose_bleed ? 'Yes' : 'No' }}</p>
    <p><strong>Mouth Snores:</strong> {{ optional($patient->reviewOfSystems)->eent_mouth_snores ? 'Yes' : 'No' }}</p>
    
    <!-- Add more sections as needed -->
    <h3>CNS</h3>
    <p><strong>Headache:</strong> {{ optional($patient->reviewOfSystems)->cns_headache ? 'Yes' : 'No' }}</p>
    <p><strong>Dizziness:</strong> {{ optional($patient->reviewOfSystems)->cns_dizziness ? 'Yes' : 'No' }}</p>
    <p><strong>Seizures:</strong> {{ optional($patient->reviewOfSystems)->cns_seizures ? 'Yes' : 'No' }}</p>
    <p><strong>Tremors:</strong> {{ optional($patient->reviewOfSystems)->cns_tremors ? 'Yes' : 'No' }}</p>
    <p><strong>Paralysis:</strong> {{ optional($patient->reviewOfSystems)->cns_paralysis ? 'Yes' : 'No' }}</p>
    <p><strong>Numbness or Tingling of Sensations:</strong> {{ optional($patient->reviewOfSystems)->cns_numbness_or_tingling_of_sensations ? 'Yes' : 'No' }}</p>
    
    <h3>Respiratory</h3>
    <p><strong>Dyspnea:</strong> {{ optional($patient->reviewOfSystems)->respi_dyspnea ? 'Yes' : 'No' }}</p>
    <p><strong>Cough:</strong> {{ optional($patient->reviewOfSystems)->respi_cough ? 'Yes' : 'No' }}</p>
    <p><strong>Colds:</strong> {{ optional($patient->reviewOfSystems)->respi_colds ? 'Yes' : 'No' }}</p>
    <p><strong>Orthopnea:</strong> {{ optional($patient->reviewOfSystems)->respi_orthopnea ? 'Yes' : 'No' }}</p>
    <p><strong>Shortness of Breath:</strong> {{ optional($patient->reviewOfSystems)->respi_shortness_of_breath ? 'Yes' : 'No' }}</p>
    <p><strong>Hemoptysis:</strong> {{ optional($patient->reviewOfSystems)->respi_hemoptysis ? 'Yes' : 'No' }}</p>
    
    <!-- Add more sections as needed -->
    <h3>Cardiovascular</h3>
    <p><strong>Chest Pain:</strong> {{ optional($patient->reviewOfSystems)->cvs_chest_pain ? 'Yes' : 'No' }}</p>
    <p><strong>Palpitations:</strong> {{ optional($patient->reviewOfSystems)->cvs_palpitations ? 'Yes' : 'No' }}</p>
    <p><strong>Swelling of Lower Extremities:</strong> {{ optional($patient->reviewOfSystems)->cvs_swelling_of_lower_extremities ? 'Yes' : 'No' }}</p>
    
    <h3>Gastrointestinal</h3>
    <p><strong>Diarrhea:</strong> {{ optional($patient->reviewOfSystems)->git_diarrhea ? 'Yes' : 'No' }}</p>
    <p><strong>Constipation:</strong> {{ optional($patient->reviewOfSystems)->git_constipation ? 'Yes' : 'No' }}</p>
    <p><strong>Abdominal Pain:</strong> {{ optional($patient->reviewOfSystems)->git_abdominal_pain ? 'Yes' : 'No' }}</p>
    <p><strong>Loss of Appetite:</strong> {{ optional($patient->reviewOfSystems)->git_loss_of_appetite ? 'Yes' : 'No' }}</p>
    <p><strong>Change in Bowel Movement:</strong> {{ optional($patient->reviewOfSystems)->git_change_in_bowel_movement ? 'Yes' : 'No' }}</p>
    <p><strong>Nausea:</strong> {{ optional($patient->reviewOfSystems)->git_nausea ? 'Yes' : 'No' }}</p>
    <p><strong>Vomiting:</strong> {{ optional($patient->reviewOfSystems)->git_vomiting ? 'Yes' : 'No' }}</p>
    <p><strong>Hematochezia:</strong> {{ optional($patient->reviewOfSystems)->git_hematochezia ? 'Yes' : 'No' }}</p>
    
    <!-- Add more sections as needed -->
    <h3>Genitourinary Tract</h3>
    <p><strong>Dysuria:</strong> {{ optional($patient->reviewOfSystems)->genittract_dysuria ? 'Yes' : 'No' }}</p>
    <p><strong>Urgency:</strong> {{ optional($patient->reviewOfSystems)->genittract_urgency ? 'Yes' : 'No' }}</p>
    <p><strong>Frequency:</strong> {{ optional($patient->reviewOfSystems)->genittract_frequency ? 'Yes' : 'No' }}</p>
    <p><strong>Flank Pain:</strong> {{ optional($patient->reviewOfSystems)->genittract_flank_pain ? 'Yes' : 'No' }}</p>
    <p><strong>Vaginal Discharge:</strong> {{ optional($patient->reviewOfSystems)->genittract_vaginal_discharge ? 'Yes' : 'No' }}</p>
    
    <h3>Musculoskeletal</h3>
    <p><strong>Joint Pains:</strong> {{ optional($patient->reviewOfSystems)->musculo_joint_pains ? 'Yes' : 'No' }}</p>
    <p><strong>Muscle Weakness:</strong> {{ optional($patient->reviewOfSystems)->musculo_muscle_weakness ? 'Yes' : 'No' }}</p>
    <p><strong>Back Pains:</strong> {{ optional($patient->reviewOfSystems)->musculo_back_pains ? 'Yes' : 'No' }}</p>
    <p><strong>Difficulty in Walking:</strong> {{ optional($patient->reviewOfSystems)->musculo_difficulty_in_walking ? 'Yes' : 'No' }}</p>
    
    <!-- Add more sections as needed -->

    <h2>Vital Signs</h2>
    <p><strong>Blood Pressure:</strong> {{ optional($patient->physicalExamination)->vitals_blood_pressure }} mmHg</p>
    <p><strong>Respiratory Rate:</strong> {{ optional($patient->physicalExamination)->vitals_respiratory_rate }} cpm</p>
    <p><strong>Pulse Rate:</strong> {{ optional($patient->physicalExamination)->vitals_pulse_rate }} bpm</p>
    <p><strong>Temperature:</strong> {{ optional($patient->physicalExamination)->vitals_temperature }}°C</p>
    <p><strong>Weight:</strong> {{ optional($patient->physicalExamination)->vitals_weight }} kg</p>
    
    <h2>Physical Examination</h2>
    <p><strong>HEENT:</strong> {{ optional($patient->physicalExamination)->pe_heent }}</p>
    <p><strong>Neck:</strong> {{ optional($patient->physicalExamination)->pe_neck }}</p>
    <p><strong>Chest (Left):</strong> {{ optional($patient->physicalExamination)->pe_chest_left }}</p>
    <p><strong>Chest (Right):</strong> {{ optional($patient->physicalExamination)->pe_chest_right }}</p>
    <p><strong>Lungs:</strong> {{ optional($patient->physicalExamination)->pe_lungs }}</p>
    <p><strong>Heart:</strong> {{ optional($patient->physicalExamination)->pe_heart }}</p>
    <p><strong>Abdomen:</strong> {{ optional($patient->physicalExamination)->pe_abdomen }}</p>
    <p><strong>Breast:</strong> {{ optional($patient->physicalExamination)->pe_breast }}</p>
    <p><strong>Extremities:</strong> {{ optional($patient->physicalExamination)->pe_extremities }}</p>
    <p><strong>Internal Examination:</strong> {{ optional($patient->physicalExamination)->pe_internal_examination }}</p>
    <p><strong>Rectal Examination:</strong> {{ optional($patient->physicalExamination)->pe_rectal_examination }}</p>
    
    <h2>Neurological Examinations</h2>
    <p><strong>GCS:</strong> {{ optional($patient->neurologicalExamination)->neuro_gcs }}</p>
    <p><strong>Cranial Nerve I:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_i }}</p>
    <p><strong>Cranial Nerve II:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_ii }}</p>
    <p><strong>Cranial Nerves III, IV, VI:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_iii_iv_vi }}</p>
    <p><strong>Cranial Nerve V:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_v }}</p>
    <p><strong>Cranial Nerve VII:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_vii }}</p>
    <p><strong>Cranial Nerve VIII:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_viii }}</p>
    <p><strong>Cranial Nerves IX, X:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_ix_x }}</p>
    <p><strong>Cranial Nerve XI:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_xi }}</p>
    <p><strong>Cranial Nerve XII:</strong> {{ optional($patient->neurologicalExamination)->neuro_cn_xii }}</p>
    <p><strong>Babinski:</strong> {{ optional($patient->neurologicalExamination)->neuro_babinski ? 'Yes' : 'No' }}</p>
    <p><strong>Motor Function:</strong> {{ optional($patient->neurologicalExamination)->neuro_motor }}</p>
    <p><strong>Sensory Function:</strong> {{ optional($patient->neurologicalExamination)->neuro_sensory }}</p>
    <p><strong>Clinical Impression:</strong> {{ optional($patient->neurologicalExamination)->clinical_impression }}</p>
    <p><strong>Work-up:</strong> {{ optional($patient->neurologicalExamination)->work_up }}</p>
    
    <h2>Current Medications</h2>
    <p><strong>Medications:</strong> {{ optional($patient->currentMedication)->current_medications }}</p>
    <p><strong>Dosage:</strong> {{ optional($patient->currentMedication)->current_dosage }}</p>
    <p><strong>Frequency:</strong> {{ optional($patient->currentMedication)->current_frequency }}</p>
    <p><strong>Prescribing Physician:</strong> {{ optional($patient->currentMedication)->current_prescribing_physician }}</p>
    

    <div>
        <h2>Vital Signs</h2>
        @if ($vitalSigns->isNotEmpty())
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Temperature</th>
                        <th>Pulse Rate</th>
                        <th>Blood Pressure</th>
                        <th>Respiratory Rate</th>
                        <th>Oxygen Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vitalSigns->sortBy('created_at') as $vitalSign)
                        <tr>
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($vitalSign->vital_date)->format('n/j/Y') }}</td>                            
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($vitalSign->vital_time)->format('h:i A') }}</td>                            
                            <td style="text-align: center;">{{ $vitalSign->temperature }}°C</td>
                            <td style="text-align: center;">{{ $vitalSign->pulse }} bpm</td>
                            <td style="text-align: center;">{{ $vitalSign->blood_pressure }} mmHg</td>
                            <td style="text-align: center;">{{ $vitalSign->respiratory_rate }} cpm</td>
                            <td style="text-align: center;">{{ $vitalSign->oxygen }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No vital signs recorded.</p>
        @endif
    </div>
    
    

    
    <div>
        <h2>Medication Remarks</h2>
        @if ($medicationRemarks->isNotEmpty())
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Medication</th>
                        <th>Dosage</th>
                        <th>Treatment</th>
                        <th>Dietary Information</th>
                        <th>Remarks/Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicationRemarks->sortBy('created_at') as $medicationRemark)
                        <tr>
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($medicationRemark->medication_date)->format('n/j/Y') }}</td>                            
                            <td style="text-align: center;">{{ $medicationRemark->shift }}</td>                            
                            <td style="text-align: center;">{{ $medicationRemark->medication }}</td>
                            <td style="text-align: center;">{{ $medicationRemark->medication_dosage }}</td>
                            <td style="text-align: center;">{{ $medicationRemark->treatment }}</td>
                            <td style="text-align: center;">{{ $medicationRemark->dietary_information }}</td>
                            <td style="text-align: center;">{{ $medicationRemark->remarks_notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No medication remarks recorded.</p>
        @endif
    </div>


    <div>
        <h2>Progress Notes</h2>
        @if ($progressNotes->isNotEmpty())
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Focus</th>
                        <th>Progress Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($progressNotes->sortBy('created_at') as $progressNote)
                        <tr>
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($progressNote->medication_date)->format('n/j/Y') }}</td>                            
                            <td style="text-align: center;">{{ $progressNote->shift }}</td>                            
                            <td style="text-align: center;">{{ $progressNote->focus }}</td>
                            <td style="text-align: center;">{{ $progressNote->prog_notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No progress notes recorded.</p>
        @endif
    </div>

    
    <div>
        <h2>Requests</h2>
        @if ($requests->isNotEmpty())
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($requests as $request)
                    @if ($request->status == 'completed')
                        <li style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                            <strong>Date & Time Completed:</strong> {{ \Carbon\Carbon::parse($request->updated_at)->format('n/j/Y h:i A') }}<br>
                            {{-- <strong>Time Needed:</strong> {{ \Carbon\Carbon::parse($request->time_needed)->format('h:i A') }}<br> --}}
                            <strong>Service Type:</strong> {{ $request->procedure_type }}<br>
                            <strong>Service Test:</strong> {{ $request->sender_message }}<br>
                            <strong>Message:</strong> {{ $request->message }}<br>
                            <strong>Status:</strong> {{ strtoupper($request->status) }}<br>
                            @if ($request->image)
                                @foreach(json_decode($request->image) as $imagePath)
                                    <div class="image-wrapper mb-16">
                                        <img src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $imagePath))) }}" alt="Request Image" style="margin-top: 10px; max-width: 100%; height: auto;">
                                    </div>
                                @endforeach
                            @else
                                No Image
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>No completed requests found.</p>
        @endif
    </div>
    
    

</body>
</html>
