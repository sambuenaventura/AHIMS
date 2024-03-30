<!DOCTYPE html>
<html>
<head>
    <title>Patient Medical History Report</title>
    <!-- Include any necessary CSS styles here -->
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,
      td {
        padding: 8px;
        text-align: left;
        border: 1px solid #dddddd;
      }
      th {
        background-color: #f2f2f2;
      }
    </style>
</head>
<body>
    <h1 style="text-align: center">Patient Medical History Report</h1>
    
    <h2>Basic Information</h2>
    <table>
        <tr>
          <th>Name:</th>
          <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
          <th>Date of Birth:</th>
          <td>{{ $patient->date_of_birth }} ({{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} years old)</td>
          
        </tr>
        <tr>
          <th>Gender:</th>
          <td>{{ $patient->gender }}</td>
          <th>Contact Number:</th>
          <td>{{ $patient->contact_number }}</td>
        </tr>
        <tr>
          <th>Address:</th>
          <td colspan="3">{{ $patient->address }}</td>
        </tr>
      </table>

    <h2>Medical History</h2>
    
    <table>
        <tr>
          <th>Complete History</th>
        </tr>
        <tr>
          <td>
            @if (!empty($patient->medicalHistory->complete_history))
              {{ $patient->medicalHistory->complete_history }}
            @else
              No complete history available.
            @endif
          </td>
        </tr>
      </table>
        
    
    <h2>Medical History</h2>
    <table>
        <tr>
          <th>Condition</th>
          <th>Value</th>
        </tr>
        <tr>
          <td><strong>Hypertension</strong></td>
          <td>{{ optional($patient->medicalHistory)->hypertension ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Diabetes</strong></td>
          <td>{{ optional($patient->medicalHistory)->diabetes ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Asthma</strong></td>
          <td>{{ optional($patient->medicalHistory)->asthma ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Allergies</strong></td>
          <td>{{ optional($patient->medicalHistory)->allergies ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Stroke</strong></td>
          <td>{{ optional($patient->medicalHistory)->stroke ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>CVD</strong></td>
          <td>{{ optional($patient->medicalHistory)->cvd ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Medications</strong></td>
          <td>{{ optional($patient->medicalHistory)->medications ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Previous Hospitalization</strong></td>
          <td>{{ optional($patient->medicalHistory)->previous_hospitalization ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Mental Illness</strong></td>
          <td>{{ optional($patient->medicalHistory)->mental_neuropsychiatric_illness ? 'Yes' : 'No' }}</td>
        </tr>
        @if (optional($patient->medicalHistory)->others_checkbox)
          <tr>
            <td><strong>Others</strong></td>
            <td>{{ optional($patient->medicalHistory)->others_details }}</td>
          </tr>
        @endif
      </table>
    
    <!-- Include other medical conditions as needed -->
    
    
    <h2>Family History</h2>
    <table>
      <tr>
        <th>Condition</th>
        <th>Value</th>
      </tr>
      <tr>
        <td><strong>Family History of Hypertension</strong></td>
        <td>{{ optional($patient->medicalHistory)->family_hypertension ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Family History of Diabetes</strong></td>
        <td>{{ optional($patient->medicalHistory)->family_diabetes ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Family History of Cancer</strong></td>
        <td>{{ optional($patient->medicalHistory)->family_cancer ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Family History of Asthma</strong></td>
        <td>{{ optional($patient->medicalHistory)->family_asthma ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Family History of Heart Disease</strong></td>
        <td>{{ optional($patient->medicalHistory)->family_heart_disease ? 'Yes' : 'No' }}</td>
      </tr>
      @if (optional($patient->medicalHistory)->family_others_checkbox)
        <tr>
          <td><strong>Others</strong></td>
          <td>{{ optional($patient->medicalHistory)->family_others_details }}</td>
        </tr>
      @endif
    </table>


    <h2>Personal/Social History</h2>
    <table>
      <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
      <tr>
        <td><strong>Smoker</strong></td>
        <td>{{ optional($patient->medicalHistory)->personal_smoker ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Drug Abuse</strong></td>
        <td>{{ optional($patient->medicalHistory)->personal_drug_abuse ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td><strong>Alcoholic</strong></td>
        <td>{{ optional($patient->medicalHistory)->personal_alcohol_drinker ? 'Yes' : 'No' }}</td>
      </tr>
    </table>
    
    <h2>Menstrual History</h2>
    <table>
      <tr>
        <th>Aspect</th>
        <th>Value</th>
      </tr>
      <tr>
        <td><strong>Interval</strong></td>
        <td>{{ optional($patient->medicalHistory)->menstrual_interval }}</td>
      </tr>
      <tr>
        <td><strong>Duration</strong></td>
        <td>{{ optional($patient->medicalHistory)->menstrual_duration }}</td>
      </tr>
      <tr>
        <td><strong>Dysmenorrhea</strong></td>
        <td>{{ optional($patient->medicalHistory)->menstrual_dysmenorrhea }}</td>
      </tr>
    </table>
    
    <h2>Obstetrical History</h2>
    <table>
      <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
      <tr>
        <td><strong>Last Menstrual Period (LMP)</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_lmp }}</td>
      </tr>
      <tr>
        <td><strong>Age of Gestation (AOG)</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_aog }}</td>
      </tr>
      <tr>
        <td><strong>Probable Date of Delivery (PMP)</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_pmp }}</td>
      </tr>
      <tr>
        <td><strong>Estimated Date of Confinement (EDC)</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_edc }}</td>
      </tr>
      <tr>
        <td><strong>Prenatal Checkups</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_prenatal_checkups }}</td>
      </tr>
      <tr>
        <td><strong>Gravida</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_gravida }}</td>
      </tr>
      <tr>
        <td><strong>Para</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_para }}</td>
      </tr>
      <tr>
        <td><strong>First Pregnancy Delivered On</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivered_on }}</td>
      </tr>
      <tr>
        <td><strong>First Pregnancy Term/Preterm</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_term_preterm }}</td>
      </tr>
      <tr>
        <td><strong>First Pregnancy Girl/Boy</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_girl_boy }}</td>
      </tr>
      <tr>
        <td><strong>First Pregnancy Delivery Method</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_method }}</td>
      </tr>
      <tr>
        <td><strong>First Pregnancy Delivery Place</strong></td>
        <td>{{ optional($patient->medicalHistory)->obstetrical_first_pregnancy_delivery_place }}</td>
      </tr>
    </table>
    
    <h2>Pediatric History</h2>
    <table>
      <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
      <tr>
        <td><strong>Term</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_term }}</td>
      </tr>
      <tr>
        <td><strong>Preterm</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_preterm }}</td>
      </tr>
      <tr>
        <td><strong>Postterm</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_postterm }}</td>
      </tr>
      <tr>
        <td><strong>Birth By</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_birth_by }}</td>
      </tr>
      <tr>
        <td><strong>NSD/CS</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_nsd_cs }}</td>
      </tr>
      <tr>
        <td><strong>Age of Mother at Pregnancy</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_age_of_mother_at_pregnancy }}</td>
      </tr>
      <tr>
        <td><strong>No of Pregnancy</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy }}</td>
      </tr>
      <tr>
        <td><strong>Complications During Pregnancy</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_complications_during_pregnancy }}</td>
      </tr>
      <tr>
        <td><strong>Immunizations</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_immunizations }}</td>
      </tr>
      <tr>
        <td><strong>No of Pregnancy (First)</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_first }}</td>
      </tr>
      <tr>
        <td><strong>No of Pregnancy (Second)</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_second }}</td>
      </tr>
      <tr>
        <td><strong>No of Pregnancy (Third)</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_third }}</td>
      </tr>
      <tr>
        <td><strong>No of Pregnancy (Others)</strong></td>
        <td>{{ optional($patient->medicalHistory)->pediatric_no_of_pregnancy_others }}</td>
      </tr>
    </table>
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
      <table>
      <tr>
          <th>Symptom</th>
          <th>Value</th>
      </tr>


      <tr>
        <td>Fever</td>
        <td>{{ optional($patient->reviewOfSystems)->consti_fever ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Anorexia</td>
        <td>{{ optional($patient->reviewOfSystems)->consti_anorexia ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Weight Loss</td>
        <td>{{ optional($patient->reviewOfSystems)->consti_weight_loss ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Fatigue</td>
        <td>{{ optional($patient->reviewOfSystems)->consti_fatigue ? 'Yes' : 'No' }}</td>
      </tr>
    </table>

      <h3>Hematologic</h3>
      <table>
      <tr>
          <th>Symptom</th>
          <th>Value</th>
      </tr>


      <tr>
        <td>Easy Bruisability</td>
        <td>{{ optional($patient->reviewOfSystems)->hema_easy_bruisability ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Abnormal Bleeding</td>
        <td>{{ optional($patient->reviewOfSystems)->hema_abnormal_bleeding ? 'Yes' : 'No' }}</td>
      </tr>

    </table>

      <h3>EENT</h3>
      <table>
      <tr>
          <th>Symptom</th>
          <th>Value</th>
      </tr>


      <tr>
        <td>Blurring of Vision</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_blurring_of_vision ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Hearing Loss</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_hearing_loss ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Tinnitus</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_tinnitus ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Ear Discharges</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_ear_discharges ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Nose Bleed</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_nose_bleed ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Mouth Snores</td>
        <td>{{ optional($patient->reviewOfSystems)->eent_mouth_snores ? 'Yes' : 'No' }}</td>
      </tr>
    </table>


      <h3>CNS</h3>
      <table>
      <tr>
          <th>Symptom</th>
          <th>Value</th>
      </tr>

      
      <tr>
        <td>Headache</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_headache ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Dizziness</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_dizziness ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Seizures</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_seizures ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Tremors</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_tremors ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Paralysis</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_paralysis ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Numbness or Tingling of Sensations</td>
        <td>{{ optional($patient->reviewOfSystems)->cns_numbness_or_tingling_of_sensations ? 'Yes' : 'No' }}</td>
      </tr>
    </table>


    <h3>Respiratory</h3>
    <table>
    <tr>
        <th>Symptom</th>
        <th>Value</th>
    </tr>
    <tr>
        <td>Dyspnea</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_dyspnea ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Cough</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_cough ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Colds</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_colds ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Orthopnea</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_orthopnea ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Shortness of Breath</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_shortness_of_breath ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Hemoptysis</td>
        <td>{{ optional($patient->reviewOfSystems)->respi_hemoptysis ? 'Yes' : 'No' }}</td>
    </tr>
    </table>

    <h3>Cardiovascular</h3>
    <table>
    <tr>
        <th>Symptom</th>
        <th>Value</th>
    </tr>
    <tr>
        <td>Chest Pain</td>
        <td>{{ optional($patient->reviewOfSystems)->cvs_chest_pain ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Palpitations</td>
        <td>{{ optional($patient->reviewOfSystems)->cvs_palpitations ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Swelling of Lower Extremities</td>
        <td>{{ optional($patient->reviewOfSystems)->cvs_swelling_of_lower_extremities ? 'Yes' : 'No' }}</td>
    </tr>
    </table>

    <h3>Gastrointestinal</h3>
    <table>
    <tr>
        <th>Symptom</th>
        <th>Value</th>
    </tr>
    <tr>
        <td>Diarrhea</td>
        <td>{{ optional($patient->reviewOfSystems)->git_diarrhea ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Constipation</td>
        <td>{{ optional($patient->reviewOfSystems)->git_constipation ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Abdominal Pain</td>
        <td>{{ optional($patient->reviewOfSystems)->git_abdominal_pain ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Loss of Appetite</td>
        <td>{{ optional($patient->reviewOfSystems)->git_loss_of_appetite ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Change in Bowel Movement</td>
        <td>{{ optional($patient->reviewOfSystems)->git_change_in_bowel_movement ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Nausea</td>
        <td>{{ optional($patient->reviewOfSystems)->git_nausea ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Vomiting</td>
        <td>{{ optional($patient->reviewOfSystems)->git_vomiting ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td>Hematochezia</td>
        <td>{{ optional($patient->reviewOfSystems)->git_hematochezia ? 'Yes' : 'No' }}</td>
    </tr>
    </table>
    
    <h3>Genitourinary Tract</h3>
    <table>
      <tr>
        <th>Symptom</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>Dysuria</td>
        <td>{{ optional($patient->reviewOfSystems)->genittract_dysuria ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Urgency</td>
        <td>{{ optional($patient->reviewOfSystems)->genittract_urgency ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Frequency</td>
        <td>{{ optional($patient->reviewOfSystems)->genittract_frequency ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Flank Pain</td>
        <td>{{ optional($patient->reviewOfSystems)->genittract_flank_pain ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Vaginal Discharge</td>
        <td>{{ optional($patient->reviewOfSystems)->genittract_vaginal_discharge ? 'Yes' : 'No' }}</td>
      </tr>
    </table>
    
    <h3>Musculoskeletal</h3>
    <table>
      <tr>
        <th>Symptom</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>Joint Pains</td>
        <td>{{ optional($patient->reviewOfSystems)->musculo_joint_pains ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Muscle Weakness</td>
        <td>{{ optional($patient->reviewOfSystems)->musculo_muscle_weakness ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Back Pains</td>
        <td>{{ optional($patient->reviewOfSystems)->musculo_back_pains ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Difficulty in Walking</td>
        <td>{{ optional($patient->reviewOfSystems)->musculo_difficulty_in_walking ? 'Yes' : 'No' }}</td>
      </tr>
    </table>
    
    <h2>Vital Signs</h2>
    <table>
        <tr>
          <th>Blood Pressure:</th>
          <td>{{ optional($patient->physicalExamination)->vitals_blood_pressure }} mmHg</td>
          <th>Respiratory Rate:</th>
          <td>{{ optional($patient->physicalExamination)->vitals_respiratory_rate }} cpm</td>
        </tr>
        <tr>
          <th>Pulse Rate:</th>
          <td>{{ optional($patient->physicalExamination)->vitals_pulse_rate }} bpm</td>
          <th>Temperature:</th>
          <td>{{ optional($patient->physicalExamination)->vitals_temperature }}°C</td>
          {{-- <th>Weight:</th>
          <td>{{ optional($patient->physicalExamination)->vitals_weight }} kg</td> --}}

        </tr>
        <tr>
            <th>Weight:</th>
            <td colspan="3">{{ optional($patient->physicalExamination)->vitals_weight }} kg</td>
        </tr>
      </table>

    <h2>Physical Examination</h2>
    <table>
      <tr>
        <th>Area</th>
        <th>Observation</th>
      </tr>
      <tr>
        <td>HEENT</td>
        <td>{{ optional($patient->physicalExamination)->pe_heent }}</td>
      </tr>
      <tr>
        <td>Neck</td>
        <td>{{ optional($patient->physicalExamination)->pe_neck }}</td>
      </tr>
      <tr>
        <td>Chest (Left)</td>
        <td>{{ optional($patient->physicalExamination)->pe_chest_left }}</td>
      </tr>
      <tr>
        <td>Chest (Right)</td>
        <td>{{ optional($patient->physicalExamination)->pe_chest_right }}</td>
      </tr>
      <tr>
        <td>Lungs</td>
        <td>{{ optional($patient->physicalExamination)->pe_lungs }}</td>
      </tr>
      <tr>
        <td>Heart</td>
        <td>{{ optional($patient->physicalExamination)->pe_heart }}</td>
      </tr>
      <tr>
        <td>Abdomen</td>
        <td>{{ optional($patient->physicalExamination)->pe_abdomen }}</td>
      </tr>
      <tr>
        <td>Breast</td>
        <td>{{ optional($patient->physicalExamination)->pe_breast }}</td>
      </tr>
      <tr>
        <td>Extremities</td>
        <td>{{ optional($patient->physicalExamination)->pe_extremities }}</td>
      </tr>
      <tr>
        <td>Internal Examination</td>
        <td>{{ optional($patient->physicalExamination)->pe_internal_examination }}</td>
      </tr>
      <tr>
        <td>Rectal Examination</td>
        <td>{{ optional($patient->physicalExamination)->pe_rectal_examination }}</td>
      </tr>
    </table>   
    
    <h2>Neurological Examination</h2>
    <table>
      <tr>
        <th>Test</th>
        <th>Result</th>
      </tr>
      <tr>
        <td>GCS</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_gcs }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve I</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_i }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve II</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_ii }}</td>
      </tr>
      <tr>
        <td>Cranial Nerves III, IV, VI</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_iii_iv_vi }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve V</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_v }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve VII</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_vii }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve VIII</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_viii }}</td>
      </tr>
      <tr>
        <td>Cranial Nerves IX, X</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_ix_x }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve XI</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_xi }}</td>
      </tr>
      <tr>
        <td>Cranial Nerve XII</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_cn_xii }}</td>
      </tr>
      <tr>
        <td>Babinski</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_babinski ? 'Yes' : 'No' }}</td>
      </tr>
      <tr>
        <td>Motor Function</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_motor }}</td>
      </tr>
      <tr>
        <td>Sensory Function</td>
        <td>{{ optional($patient->neurologicalExamination)->neuro_sensory }}</td>
      </tr>
      <tr>
        <td>Clinical Impression</td>
        <td>{{ optional($patient->neurologicalExamination)->clinical_impression }}</td>
      </tr>
      <tr>
        <td>Work-up</td>
        <td>{{ optional($patient->neurologicalExamination)->work_up }}</td>
      </tr>
    </table>
    
    <h2>Current Medications</h2>
    <table>
      <tr>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Frequency</th>
        <th>Prescribing Physician</th>
      </tr>
      <tr>
        <td>{{ optional($patient->currentMedication)->current_medications }}</td>
        <td>{{ optional($patient->currentMedication)->current_dosage }}</td>
        <td>{{ optional($patient->currentMedication)->current_frequency }}</td>
        <td>{{ optional($patient->currentMedication)->current_prescribing_physician }}</td>
      </tr>
    </table>

    <div>
        <h2>Vital Signs</h2>
        @if ($vitalSigns->isNotEmpty())
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>T (°C)</th>
                        <th>PR (bpm)</th>
                        <th>BP (mmHg)</th>
                        <th>RR (cpm)</th>
                        <th>O<sub>2</sub> (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vitalSigns->sortBy('created_at') as $vitalSign)
                        <tr>
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($vitalSign->vital_date)->format('n/j/Y') }}</td>                            
                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($vitalSign->vital_time)->format('h:i A') }}</td>                            
                            <td style="text-align: center;">{{ $vitalSign->temperature }} </td>
                            <td style="text-align: center;">{{ $vitalSign->pulse }} </td>
                            <td style="text-align: center;">{{ $vitalSign->blood_pressure }} </td>
                            <td style="text-align: center;">{{ $vitalSign->respiratory_rate }} </td>
                            <td style="text-align: center;">{{ $vitalSign->oxygen }} </td>
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
                            <td>{{ $medicationRemark->treatment }}</td>
                            <td>{{ $medicationRemark->dietary_information }}</td>
                            <td>{{ $medicationRemark->remarks_notes }}</td>
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
                            <td>{{ $progressNote->focus }}</td>
                            <td>{{ $progressNote->prog_notes }}</td>
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
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <th>ID</th>
                <th>Date Completed</th>
                <th>Service Type</th>
                <th>Service Test</th>
                <th>Message</th>
                <th>Status</th>
            </tr>
            @foreach ($requests as $request)
            @if ($request->status == 'completed')
            <tr style="border: 1px solid #ccc;">
                <td style="text-align: center;">{{ $request->request_id }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($request->updated_at)->format('h:i A n/j/Y') }}</td>
                <td style="text-align: center;">{{ $request->procedure_type }}</td>
                <td>{{ $request->sender_message }}</td>
                <td>{{ $request->message }}</td>
                <td>{{ strtoupper($request->status) }}</td>
            </tr>
            @endif
            @endforeach
        </table>
        @else
        <p>No completed requests found.</p>
        @endif
        
        <!-- Images -->
        @foreach ($requests as $request)
        @if ($request->status == 'completed' && $request->image)
        @foreach(json_decode($request->image) as $index => $imagePath)
        <div class="image-wrapper mb-16" style="page-break-inside: avoid;">
            <p style="font-weight: bold;">Request ID: {{ $request->request_id }}</p>
            <img src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $imagePath))) }}" alt="Request Image" style="margin-top: 10px; max-width: 100%; height: auto;">
        </div>
        @endforeach
        @endif
        @endforeach
    </div>
    
    
    
    
    

</body>
</html>
