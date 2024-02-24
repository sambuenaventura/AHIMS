<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest; // Import the Request model
use App\Models\ArchivedPatients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\ProgressNotes;
use App\Models\VitalSigns;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NurseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Use the Patients Eloquent model to query patients
        $patients = Patients::query();
    
        if ($search) {
            $patients->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }
        
        // Eager load the physician relationship
        $patients->with('physician');
        
        // Get the paginated results
        $patients = $patients->paginate(10);
    
        // Calculate age for each patient
        foreach ($patients as $patient) {
            $patient->age = Carbon::parse($patient->date_of_birth)->age;
        }
        
        return view('nurse.index', compact('patients'));
    }


public function nurseView(Request $request)
{
    // Retrieve the search query and admission type from the request
    $search = $request->input('search');
    $admissionType = $request->input('admissionType');

    // Query based on admission type
    $query = Patients::query();
    if ($admissionType) {
        $query->where('admission_type', $admissionType);
    }

    // Apply search query if it exists
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('patient_id', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%');
        });
    }

    // Eager load the physician relationship to avoid N+1 query issue
    $patients = $query->with('physician')->paginate(10); // Adjust pagination limit as needed

    // Pass admission type to the view to maintain consistency
    return view('nurse.nurse', compact('patients', 'admissionType'));
}





    // Method to handle /nurse-laboratory-services route
    public function laboratoryServices()
    {
        // Assuming lab-services.blade.php exists in resources/views directory
        return view('nurse.lab-services');
    }


    public function autocomplete(Request $request)
    {
        $searchTerm = $request->input('term');
    
        // Query to search for matching patient names based on the search term
        $patients = Patients::where('first_name', 'like', '%' . $searchTerm . '%')
                            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                            ->get();
    
        // Build HTML for autocomplete suggestions
        $html = '';
        foreach($patients as $patient) {
            $html .= '<div class="autocomplete-item" data-id="' . $patient->id . '">' . $patient->first_name . ' ' . $patient->last_name . '</div>';
        }
    
        return response()->json($html);
    }
    

    public function getPatientGender(Request $request)
{
    $name = $request->input('name');

    // Query the database to retrieve the gender based on the provided name
    $patient = Patients::where('first_name', $name)->orWhere('last_name', $name)->first();

    // Check if the patient was found
    if ($patient) {
        return response()->json($patient->gender);
    } else {
        // If patient not found, return an appropriate response (e.g., error message)
        return response()->json('Patient not found', 404);
    }
}

public function searchInpatient(Request $request)
{
    $search = $request->input('inpatientSearch');
    $patients = Patients::query()
        ->where('admission_type', 'inpatient')
        ->where('archived', 0) // Exclude archived patients
        ->where(function ($q) use ($search) {
            $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('nurse.nurse', compact('patients'));
}

public function searchOutpatient(Request $request)
{
    $search = $request->input('outpatientSearch');
    $patients = Patients::query()
        ->where('admission_type', 'outpatient')
        ->where('archived', 0) // Exclude archived patients
        ->where(function ($q) use ($search) {
            $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('nurse.nurse', compact('patients'));
}


public function searchArchived(Request $request)
{
    $search = $request->input('archivedSearch');
    $patients = Patients::query()
        ->where('admission_type', 'archived') // Search among archived patients
        ->where(function ($q) use ($search) {
            $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('nurse.nurse', compact('patients'));
}


public function show($id)
{
    $patient = Patients::findOrFail($id);

    // Fetch completed service requests for the selected patient handled by medtech
    $medtechCompletedResults = ServiceRequest::where('patient_id', $id)
                                        ->where('status', 'completed')
                                        ->whereHas('receiver', function ($query) {
                                            $query->where('role', 'medtech');
                                        })
                                        ->get();

    // Fetch completed service requests for the selected patient handled by radtech
    $radtechCompletedResults = ServiceRequest::where('patient_id', $id)
                                        ->where('status', 'completed')
                                        ->whereHas('receiver', function ($query) {
                                            $query->where('role', 'radtech');
                                        })
                                        ->get();

    return view('patients.nurse-edit', compact('patient', 'medtechCompletedResults', 'radtechCompletedResults'));
}



    
    public function editNursePatient($id) {
        $data = Patients::findOrFail($id);  
        //dd($data);
        return view('form.main-form', ['patient' => $data]); 
    }

    public function viewAddRemarkPatient($id) {
        
        $data = Patients::findOrFail($id);  
        return view('form.remark', ['patient' => $data]); 

        //dd($data);
    }
    public function viewProgressNotesPatient($id) {
        
        $data = Patients::findOrFail($id);  
        //dd($data);
        return view('form.progress-notes', ['patient' => $data]); 

    }

    public function create() {
        return view('patients.create')->with('title', 'Add New');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "birth_of_date" => ['nullable', 'date'], // Adjusted for the new field
            "gender" => ['required'],
            "contact_number" => ['required'],
            "address" => ['required'],
            "pic_first_name" => ['nullable', 'min:1'], // Adjusted for the new fields
            "pic_last_name" => ['nullable', 'min:1'],
            "pic_relation" => ['nullable', 'min:1'],
            "pic_contact_number" => ['nullable'],
            "ap_first_name" => ['nullable', 'min:1'], // Adjusted for the new fields
            "ap_last_name" => ['nullable', 'min:1'],
            "ap_contact_number" => ['nullable'],
        ]);

        Patients::create($validated);

        return redirect('/')->with('message', 'New patient was added successfully!');
    }

    public function update(Request $request, Patients $patient)
    {    //dd($request->all());


        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }


        // Check if the patient has an existing medical history
        if ($patient->medicalHistory) {
            // Update existing medical history
            $validatedMedicalHistory = $request->validate([
                'complete_history' => ['required', 'min:1'],
                'hypertension_years' => $request->input('hypertension') ? ['min:1'] : [], // Validate only if hypertension is checked
                'cvd_year' => $request->input('cvd') ? ['min:1'] : [], // Validate only if cvd is checked
                'diabetes_years' => $request->input('diabetes') ? ['min:1'] : [], // Validate only if diabetes is checked
                'stroke' => $request->input('stroke') ? ['min:1'] : [], // Validate only if stroke is checked
                'stroke_year' => $request->input('stroke') ? ['min:1'] : [], // Validate only if stroke is checked
                'asthma' => $request->input('asthma') ? ['min:1'] : [], // Validate only if asthma is checked
                'asthma_years' => $request->input('asthma') ? ['min:1'] : [], // Validate only if asthma is checked
                'mental_neuropsychiatric_illness' => $request->input('mental_neuropsychiatric_illness') ? ['min:1'] : [], // Validate only if mental_neuropsychiatric_illness is checked
                'mental_neuropsychiatric_illness_details' => $request->input('mental_neuropsychiatric_illness') ? ['min:1'] : [], // Validate only if mental_neuropsychiatric_illness is checked
                'previous_hospitalization' => $request->input('previous_hospitalization') ? ['min:1'] : [], // Validate only if previous_hospitalization is checked
                'hospitalization_details' => $request->input('previous_hospitalization') ? ['min:1'] : [], // Validate only if previous_hospitalization is checked
                'medications' => $request->input('medications') ? ['min:1'] : [], // Validate only if medications is checked
                'medications_details' => $request->input('medications') ? ['min:1'] : [], // Validate only if medications is checked
                'allergies' => $request->input('allergies') ? ['min:1'] : [], // Validate only if allergies is checked
                'allergies_details' => $request->input('allergies') ? ['min:1'] : [], // Validate only if allergies is checked
                'others_checkbox' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
                'others_details' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
                'family_hypertension' => ['nullable', 'min:1'],
                'family_diabetes' => ['nullable', 'min:1'],
                'family_cancer' => ['nullable', 'min:1'],
                'family_asthma' => ['nullable', 'min:1'],
                'family_heart_disease' => ['nullable', 'min:1'],
                'family_others_checkbox' => ['nullable', 'min:1'],
                'family_others_details' => ['nullable', 'min:1'],
                'personal_smoker' => ['nullable', 'min:1'],
                'personal_alcohol_drinker' => ['nullable', 'min:1'],
                'personal_drug_abuse' => ['nullable', 'min:1'],
                'menstrual_interval' => ['nullable', 'min:1'],
                'menstrual_duration' => ['nullable', 'min:1'],
                'menstrual_dysmenorrhea' => ['nullable', 'min:1'],
                'obstetrical_lmp' => ['nullable', 'min:1'],
                'obstetrical_aog' => ['nullable', 'min:1'],
                'obstetrical_pmp' => ['nullable', 'min:1'],
                'obstetrical_edc' => ['nullable', 'min:1'],
                'obstetrical_prenatal_checkups' => ['nullable', 'min:1'],
                'obstetrical_gravida' => ['nullable', 'min:1'],
                'obstetrical_para' => ['nullable', 'min:1'],
                "obstetrical_first_pregnancy_delivered_on" => ['nullable', 'date'], // Adjusted for the new field
                'obstetrical_first_pregnancy_term_preterm' => ['nullable', Rule::in(['term', 'preterm'])],
                'obstetrical_first_pregnancy_girl_boy' => ['nullable', Rule::in(['girl', 'boy'])],
                'obstetrical_first_pregnancy_delivery_method' => ['nullable', Rule::in(['nsd', 'cs'])],
                'obstetrical_first_pregnancy_delivery_place' => ['nullable', 'min:1'],
                'pediatric_term' => ['nullable', 'min:1'],
                'pediatric_preterm' => ['nullable', 'min:1'],
                'pediatric_postterm' => ['nullable', 'min:1'],
                'pediatric_birth_by' => ['nullable', 'min:1'],
                'pediatric_nsd_cs' => ['nullable', 'min:1'],
                'pediatric_age_of_mother_at_pregnancy' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_first' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_second' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_third' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_others' => ['nullable', 'min:1'],
                'pediatric_complications_during_pregnancy' => ['nullable', 'min:1'],
                'pediatric_immunizations' => ['nullable', 'min:1'],
                'clinical_impression' => ['nullable', 'min:1'],
                'work_up' => ['nullable', 'min:1'],
            ]);
    
            // Set checkbox values to false if not present in the request
            $checkboxFields = [
                'hypertension',
                'cvd',
                'diabetes',
                'stroke',
                'asthma',
                'mental_neuropsychiatric_illness',
                'previous_hospitalization',
                'medications',
                'allergies',
                'others_checkbox',
                'family_hypertension',
                'family_diabetes',
                'family_cancer',
                'family_asthma',
                'family_heart_disease',
                'family_others_checkbox',
                'personal_smoker',
                'personal_alcohol_drinker',
                'personal_drug_abuse',
            ];
    
            foreach ($checkboxFields as $field) {
                $validatedMedicalHistory[$field] = $request->has($field);
            }
    
            // If checkbox is unchecked, set corresponding years to null
            $yearFields = [
                'hypertension_years',
                'cvd_year',
                'diabetes_years',
                'stroke_year',
                'asthma_years',
            ];
            //dd($validatedMedicalHistory);

            foreach ($yearFields as $field) {
                if (!$request->has($field)) {
                    $validatedMedicalHistory[$field] = null;
                }
            }
    
            $patient->medicalHistory()->update($validatedMedicalHistory);
        } else {
            // Create new medical history if it doesn't exist
            $medicalHistoryData = $request->validate([
                'complete_history' => ['required', 'min:1'],
                'hypertension_years' => $request->input('hypertension') ? ['min:1'] : [], // Validate only if hypertension is checked
                'diabetes_years' => $request->input('diabetes') ? ['min:1'] : [], // Validate only if diabetes is checked
                'stroke' => $request->input('stroke') ? ['min:1'] : [], // Validate only if stroke is checked
                'stroke_year' => $request->input('stroke') ? ['min:1'] : [], // Validate only if stroke is checked
                'asthma' => $request->input('asthma') ? ['min:1'] : [], // Validate only if asthma is checked
                'asthma_years' => $request->input('asthma') ? ['min:1'] : [], // Validate only if asthma is checked
                'mental_neuropsychiatric_illness' => $request->input('mental_neuropsychiatric_illness') ? ['min:1'] : [], // Validate only if mental_neuropsychiatric_illness is checked
                'mental_neuropsychiatric_illness_details' => $request->input('mental_neuropsychiatric_illness') ? ['min:1'] : [], // Validate only if mental_neuropsychiatric_illness is checked
                'previous_hospitalization' => $request->input('previous_hospitalization') ? ['min:1'] : [], // Validate only if previous_hospitalization is checked
                'hospitalization_details' => $request->input('previous_hospitalization') ? ['min:1'] : [], // Validate only if previous_hospitalization is checked
                'medications' => $request->input('medications') ? ['min:1'] : [], // Validate only if medications is checked
                'medications_details' => $request->input('medications') ? ['min:1'] : [], // Validate only if medications is checked
                'allergies' => $request->input('allergies') ? ['min:1'] : [], // Validate only if allergies is checked
                'allergies_details' => $request->input('allergies') ? ['min:1'] : [], // Validate only if allergies is checked
                'others_checkbox' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
                'others_details' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
                'family_hypertension' => ['nullable', 'min:1'],
                'family_diabetes' => ['nullable', 'min:1'],
                'family_cancer' => ['nullable', 'min:1'],
                'family_asthma' => ['nullable', 'min:1'],
                'family_heart_disease' => ['nullable', 'min:1'],
                'family_others_checkbox' => ['nullable', 'min:1'],
                'family_others_details' => ['nullable', 'min:1'],
                'personal_smoker' => ['nullable', 'min:1'],
                'personal_alcohol_drinker' => ['nullable', 'min:1'],
                'personal_drug_abuse' => ['nullable', 'min:1'],
                'menstrual_interval' => ['nullable', 'min:1'],
                'menstrual_duration' => ['nullable', 'min:1'],
                'menstrual_dysmenorrhea' => ['nullable', 'min:1'],
                'obstetrical_lmp' => ['nullable', 'min:1'],
                'obstetrical_aog' => ['nullable', 'min:1'],
                'obstetrical_pmp' => ['nullable', 'min:1'],
                'obstetrical_edc' => ['nullable', 'min:1'],
                'obstetrical_prenatal_checkups' => ['nullable', 'min:1'],
                'obstetrical_gravida' => ['nullable', 'min:1'],
                'obstetrical_para' => ['nullable', 'min:1'],
                "obstetrical_first_pregnancy_delivered_on" => ['nullable', 'date'], // Adjusted for the new field
                'obstetrical_first_pregnancy_term_preterm' => ['nullable', Rule::in(['term', 'preterm'])],
                'obstetrical_first_pregnancy_girl_boy' => ['nullable', Rule::in(['girl', 'boy'])],
                'obstetrical_first_pregnancy_delivery_method' => ['nullable', Rule::in(['nsd', 'cs'])],
                'obstetrical_first_pregnancy_delivery_place' => ['nullable', 'min:1'],
                'pediatric_term' => ['nullable', 'min:1'],
                'pediatric_preterm' => ['nullable', 'min:1'],
                'pediatric_postterm' => ['nullable', 'min:1'],
                'pediatric_birth_by' => ['nullable', 'min:1'],
                'pediatric_nsd_cs' => ['nullable', 'min:1'],
                'pediatric_age_of_mother_at_pregnancy' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_first' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_second' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_third' => ['nullable', 'min:1'],
                'pediatric_no_of_pregnancy_others' => ['nullable', 'min:1'],
                'pediatric_complications_during_pregnancy' => ['nullable', 'min:1'],
                'pediatric_immunizations' => ['nullable', 'min:1'],
                'clinical_impression' => ['nullable', 'min:1'],
                'work_up' => ['nullable', 'min:1'],
                // Add other boolean columns here
            ]);
    
            // Set checkbox values to false if not present in the request
            $checkboxFields = [
                'hypertension',
                'cvd',
                'diabetes',
                'stroke',
                'asthma',
                'mental_neuropsychiatric_illness',
                'previous_hospitalization',
                'medications',
                'allergies',
                'others_checkbox',
                'family_hypertension',
                'family_diabetes',
                'family_cancer',
                'family_asthma',
                'family_heart_disease',
                'family_others_checkbox',
                'personal_smoker',
                'personal_alcohol_drinker',
                'personal_drug_abuse',
            ];
    
            foreach ($checkboxFields as $field) {
                $medicalHistoryData[$field] = $request->has($field);
            }
    
            // If checkbox is unchecked, set corresponding years to null
            $yearFields = [
                'hypertension_years',
                'cvd_year',
                'diabetes_years',
                'stroke_year',
                'asthma_years',
            ];
    
            foreach ($yearFields as $field) {
                if (!$request->has($field)) {
                    $medicalHistoryData[$field] = null;
                }
            }
    
            $patient->medicalHistory()->create($medicalHistoryData);
        }
            //dd($request->all());

    // Add the new code here for updating review of systems
    $validatedReviewOfSystems = $request->validate([
        'consti_fever' => ['boolean', 'nullable'],
        'consti_anorexia' => ['boolean', 'nullable'],
        'consti_weight_loss' => ['boolean', 'nullable'],
        'consti_fatigue' => ['boolean', 'nullable'],
        'hema_easy_bruisability' => ['boolean', 'nullable'],
        'hema_abnormal_bleeding' => ['boolean', 'nullable'],
        'eent_blurring_of_vision' => ['boolean', 'nullable'],
        'eent_hearing_loss' => ['boolean', 'nullable'],
        'eent_tinnitus' => ['boolean', 'nullable'],
        'eent_ear_discharges' => ['boolean', 'nullable'],
        'eent_nose_bleed' => ['boolean', 'nullable'],
        'eent_mouth_snores' => ['boolean', 'nullable'],
        'cns_headache' => ['boolean', 'nullable'],
        'cns_dizziness' => ['boolean', 'nullable'],
        'cns_seizures' => ['boolean', 'nullable'],
        'cns_tremors' => ['boolean', 'nullable'],
        'cns_paralysis' => ['boolean', 'nullable'],
        'cns_numbness_or_tingling_of_sensations' => ['boolean', 'nullable'],
        'respi_dyspnea' => ['boolean', 'nullable'],
        'respi_cough' => ['boolean', 'nullable'],
        'respi_colds' => ['boolean', 'nullable'],
        'respi_orthopnea' => ['boolean', 'nullable'],
        'respi_shortness_of_breath' => ['boolean', 'nullable'],
        'respi_hemoptysis' => ['boolean', 'nullable'],
        'cvs_chest_pain' => ['boolean', 'nullable'],
        'cvs_palpitations' => ['boolean', 'nullable'],
        'cvs_swelling_of_lower_extremities' => ['boolean', 'nullable'],
        'git_diarrhea' => ['boolean', 'nullable'],
        'git_constipation' => ['boolean', 'nullable'],
        'git_abdominal_pain' => ['boolean', 'nullable'],
        'git_loss_of_appetite' => ['boolean', 'nullable'],
        'git_change_in_bowel_movement' => ['boolean', 'nullable'],
        'git_nausea' => ['boolean', 'nullable'],
        'git_vomiting' => ['boolean', 'nullable'],
        'git_hematochezia' => ['boolean', 'nullable'],
        'genittract_dysuria' => ['boolean', 'nullable'],
        'genittract_urgency' => ['boolean', 'nullable'],
        'genittract_frequency' => ['boolean', 'nullable'],
        'genittract_flank_pain' => ['boolean', 'nullable'],
        'genittract_vaginal_discharge' => ['boolean', 'nullable'],
        'musculo_joint_pains' => ['boolean', 'nullable'],
        'musculo_muscle_weakness' => ['boolean', 'nullable'],
        'musculo_back_pains' => ['boolean', 'nullable'],
        'musculo_difficulty_in_walking' => ['boolean', 'nullable'],
        // Add validation for other review of systems fields as needed
    ]);

    // If checkbox is unchecked, set corresponding values to false
    $checkboxFields = [
        'consti_fever',
        'consti_anorexia',
        'consti_weight_loss',
        'consti_fatigue',
        'hema_easy_bruisability',
        'hema_abnormal_bleeding',
        'eent_blurring_of_vision',
        'eent_hearing_loss',
        'eent_tinnitus',
        'eent_ear_discharges',
        'eent_nose_bleed',
        'eent_mouth_snores',
        'cns_headache',
        'cns_dizziness',
        'cns_seizures',
        'cns_tremors',
        'cns_paralysis',
        'cns_numbness_or_tingling_of_sensations',
        'respi_dyspnea',
        'respi_cough',
        'respi_colds',
        'respi_orthopnea',
        'respi_shortness_of_breath',
        'respi_hemoptysis',
        'cvs_chest_pain',
        'cvs_palpitations',
        'cvs_swelling_of_lower_extremeties',
        'git_diarrhea',
        'git_constipation',
        'git_abdominal_pain',
        'git_loss_of_appetite',
        'git_change_in_bowel_movement',
        'git_nausea',
        'git_vomiting',
        'git_hematochezia',
        'genittract_dysuria',
        'genittract_urgency',
        'genittract_frequency',
        'genittract_flank_pain',
        'genittract_vaginal_discharge',
        'musculo_joint_pains',
        'musculo_muscle_weakness',
        'musculo_back_pains',
        'musculo_difficulty_in_walking',
        // Add other checkbox fields here
    ];

    foreach ($checkboxFields as $field) {
        if (!$request->has($field)) {
            $validatedReviewOfSystems[$field] = false;
        }
    }

    // Update or create review of systems record
    if ($patient->reviewOfSystems) {
        // If the patient has existing review of systems, update it
        $patient->reviewOfSystems->update($validatedReviewOfSystems);
    } else {
        // If no review of systems record exists, create a new one
        $patient->reviewOfSystems()->create($validatedReviewOfSystems);
    }        

    
    // Add the new code here for updating review of systems
    $validatedPhysicalExamination = $request->validate([
        'vitals_blood_pressure' => ['nullable', 'min:1'],
        'vitals_respiratory_rate' => ['nullable', 'min:1'],
        'vitals_pulse_rate' => ['nullable', 'min:1'],
        'vitals_temperature' => ['nullable', 'min:1'],
        'vitals_weight' => ['nullable', 'min:1'],
        'pe_heent' => ['nullable', 'min:1'],
        'pe_neck' => ['nullable', 'min:1'],
        'pe_chest_left' => ['nullable', 'min:1'],
        'pe_chest_right' => ['nullable', 'min:1'],
        'pe_lungs' => ['nullable', 'min:1'],
        'pe_heart' => ['nullable', 'min:1'],
        'pe_abdomen' => ['nullable', 'min:1'],
        'pe_breast' => ['nullable', 'min:1'],
        'pe_extremities' => ['nullable', 'min:1'],
        'pe_internal_examination' => ['nullable', 'min:1'],
        'pe_rectal_examination' => ['nullable', 'min:1'],
        // Add validation for other review of systems fields as needed
    ]);

    // Update or create review of systems record
    if ($patient->physicalExamination) {
        // If the patient has existing review of systems, update it
        $patient->physicalExamination->update($validatedPhysicalExamination);
    } else {
        // If no review of systems record exists, create a new one
        $patient->physicalExamination()->create($validatedPhysicalExamination);
    }

    // Add the new code here for updating review of systems
    $validatedNeurologicalExamination = $request->validate([
        'neuro_gcs' => ['nullable', 'min:1'],
        'neuro_cn_i' => ['nullable', 'min:1'],
        'neuro_cn_ii' => ['nullable', 'min:1'],
        'neuro_cn_iii_iv_vi' => ['nullable', 'min:1'],
        'neuro_cn_v' => ['nullable', 'min:1'],
        'neuro_cn_vii' => ['nullable', 'min:1'],
        'neuro_cn_viii' => ['nullable', 'min:1'],
        'neuro_cn_ix_x' => ['nullable', 'min:1'],
        'neuro_cn_xi' => ['nullable', 'min:1'],
        'neuro_cn_xii' => ['nullable', 'min:1'],
        'neuro_babinski' => ['boolean', 'nullable'],
        'neuro_motor' => ['nullable', 'min:1'],
        'neuro_sensory' => ['nullable', 'min:1'],

        // Add validation for other review of systems fields as needed
    ]);

    // If checkbox is unchecked, set corresponding values to false
    $checkboxFields = [
        'neuro_babinski',
        // Add other checkbox fields here
    ];

    foreach ($checkboxFields as $field) {
        if (!$request->has($field)) {
            $validatedNeurologicalExamination[$field] = false;
        }
    }

    // Update or create review of systems record
    if ($patient->neurologicalExamination) {
        // If the patient has existing review of systems, update it
        $patient->neurologicalExamination->update($validatedNeurologicalExamination);
    } else {
        // If no review of systems record exists, create a new one
        $patient->neurologicalExamination()->create($validatedNeurologicalExamination);
    }      


    // Add the new code here for updating review of systems
    $validatedcurrentMedication = $request->validate([
        'current_medications' => ['nullable', 'min:1'],
        'current_dosage' => ['nullable', 'min:1'],
        'current_medication_image' => ['nullable', 'min:1'],
        'current_frequency' => ['nullable', 'min:1'],
        'current_prescribing_physician' => ['nullable', 'min:1'],
        // Add validation for other review of systems fields as needed
    ]);

    // Update or create review of systems record
    if ($patient->currentMedication) {
        // If the patient has existing review of systems, update it
        $patient->currentMedication->update($validatedcurrentMedication);
    } else {
        // If no review of systems record exists, create a new one
        $patient->currentMedications()->create($validatedcurrentMedication);
    }

    // $validatedObstetricalHistory = $request->validate([
    //     'obstetrical_pregnancy_delivered_on' => ['nullable', 'date'], // Validation for delivered on date
    //     'obstetrical_pregnancy_term_preterm' => ['nullable', Rule::in(['term', 'preterm'])],
    //     'obstetrical_pregnancy_girl_boy' => ['nullable', Rule::in(['girl', 'boy'])],
    //     'obstetrical_pregnancy_delivery_method' => ['nullable', Rule::in(['nsd', 'cs'])],
    //     'obstetrical_pregnancy_delivery_place' => ['nullable', 'string', 'min:1'], // Validation for place of delivery
    //     // Add validation for other obstetrical history fields as needed
    // ]);
    

        return back()->with('message', 'Data was successfully updated');
    }
   


























    public function updateVitalSigns(Request $request, Patients $patient)
    {
        // Validate the request for vital signs
        $validatedVitalSigns = $request->validate([
            'vital_date' => ['required', 'date'],
            'vital_time' => ['required', 'date_format:H:i', 'nullable'],
            'temperature' => ['numeric', 'nullable'],
            'heart_rate' => ['integer', 'nullable'],
            'pulse' => ['integer', 'nullable'],
            'blood_pressure' => ['string', 'nullable', 'max:20'],
            'respiratory_rate' => ['integer', 'nullable'],
            'oxygen' => ['numeric', 'nullable'],
            'hypertension_years' => ['integer', 'nullable'],
            // Add validation for other vital signs fields as needed
        ]);
    
        // If 'vital_time' is not provided, set it to the current time
        $validatedVitalSigns['vital_time'] = $validatedVitalSigns['vital_time'] ?? now()->format('H:i');
    
        // Get the ID of the authenticated user (assuming nurse user)
        $nurseId = auth()->user()->id;
    
        // Create the vital signs record and associate the nurse user with it
        $vitalSign = new VitalSigns($validatedVitalSigns);
        $vitalSign->nurse_user_id = $nurseId;
        $patient->vitalSigns()->save($vitalSign);
    
        return back()->with('message', 'Vital signs were successfully updated');
    }

    public function updateMedicationRemark(Request $request, Patients $patient)
{
    // Validate the request for medication remark
    $validatedMedicationRemark = $request->validate([
        'medication_date' => ['required', 'date'],
        'shift' => ['required', 'string', Rule::in(['7:00am-3:00pm', '3:00pm-11:00pm', '11:00pm-7:00am'])],
        'medication' => ['string', 'nullable'],
        'medication_dosage' => ['string', 'nullable'],
        'treatment' => ['string', 'nullable'],
        'dietary_information' => ['string', 'nullable'],
        'remarks_notes' => ['string', 'nullable'],
    ]);

    // If nurse is authenticated, get the ID of the authenticated user (assuming nurse user)
    $nurseId = auth()->user()->id;

    // Associate nurse user ID with the medication remark
    $validatedMedicationRemark['med_nurse_user_id'] = $nurseId;

    // Check if a record already exists for the selected date and shift
    $existingRemark = $patient->medicationRemarks()
                              ->where('medication_date', $validatedMedicationRemark['medication_date'])
                              ->where('shift', $validatedMedicationRemark['shift'])
                              ->exists();

    // Create a new medication remark record if no existing record found
    if ($existingRemark) {
        $message = 'A medication remark already exists for the selected date and shift.';
        return back()->with('message', $message);
    } else {
        // Create a new medication remark record
        $patient->medicationRemarks()->create($validatedMedicationRemark);
        $message = 'Medication remark was successfully created';
        // Pass the existingRemark variable to the view
        return back()->with('message', $message)->with('existingRemark', $existingRemark);
    }
}

public function updateProgressNotes(Request $request, Patients $patient)
{
    // Validate the request for progress notes
    $validatedProgressNotes = $request->validate([
        'progress_date' => ['required', 'date'],
        'shift' => ['required', 'string', Rule::in(['7:00am-3:00pm', '3:00pm-11:00pm', '11:00pm-7:00am'])],
        'focus' => ['required', 'string'],
        'prog_notes' => ['string', 'nullable'],
        // Add other validation rules as needed
    ]);

    // If nurse is authenticated, get the ID of the authenticated user (assuming nurse user)
    $nurseId = auth()->user()->id;

    // Associate nurse user ID with the progress notes
    $validatedProgressNotes['prog_nurse_user_id'] = $nurseId;

    // Check if a record already exists for the provided focus
    $existingProgressNote = $patient->progressNotes()
                                    ->where('progress_date', $validatedProgressNotes['progress_date'])
                                    ->where('shift', $validatedProgressNotes['shift'])
                                    ->exists();

    // Create a new progress note record if no existing record found
    if ($existingProgressNote) {
        $message = 'A progress note already exists for the provided focus.';
        return back()->with('message', $message);
    } else {
        // Create a new progress note record
        $patient->progressNotes()->create($validatedProgressNotes);
        $message = 'Progress note was successfully created';
        // Pass the existingProgressNote variable to the view
        return back()->with('message', $message)->with('existingProgressNote', $existingProgressNote);
    }
}


public function archivePatient(Request $request, $patient_id)
{
    // Validate the request data
    $request->validate([
        'password' => 'required|string', // Add any additional validation rules for the password
    ]);

    // Check if the password matches the user's password
    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    }

    // Retrieve the patient from the 'patients' table
    $patient = Patients::findOrFail($patient_id);

    // Update the patient's admission_type to 'archived' and set the archived_at timestamp
    $patient->update([
        'admission_type' => 'archived',
        'archived_at' => now(),
    ]);

    return redirect()->back()->with('message', 'Patient archived successfully.');
}




    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission')->with('message', 'Data was successfully deleted');
    }
    


    public function requestLaboratoryServices(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'procedure_type' => 'required',
            // Add more validation rules as needed
        ]);
    
        // Create a new laboratory service request
        $serviceRequest = new ServiceRequest();
        $serviceRequest->patient_id = $validatedData['patient_id'];
        $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
        $serviceRequest->procedure_type = $validatedData['procedure_type'];
        // Set other attributes as needed
    
        // Save the laboratory service request
        $serviceRequest->save();
    
        // Optionally, you can redirect the user after submitting the form
        return redirect()->back()->with('message', 'Laboratory service request submitted successfully');
    }
    
    public function requestImagingServices(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'patient_id' => 'required|exists:patients,patient_id',
        'procedure_type' => 'required',
        // Add more validation rules as needed
    ]);

    // Create a new imaging service request
    $serviceRequest = new ServiceRequest();
    $serviceRequest->patient_id = $validatedData['patient_id'];
    $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
    $serviceRequest->procedure_type = $validatedData['procedure_type'];
    // Set other attributes as needed

    // Save the imaging service request
    $serviceRequest->save();

    // Optionally, you can redirect the user after submitting the form
    return redirect()->back()->with('message', 'Imaging service request submitted successfully');
}


    public function viewRequests(Request $request, $serviceType)
    {
        // Retrieve the search query and request status from the request
        $search = $request->input('search');
        $status = $request->input('status');
    
        // Get the authenticated user's ID
        $userId = auth()->id();
    
        // Define the procedure types based on service type
        $procedureTypes = ($serviceType === 'lab') ? ['chemistry', 'hematology', 'Bbis', 'parasitology', 'microbiology', 'microscopy'] : ['x_ray', 'ultrasound', 'ct_scan'];
    
        // Query based on request status and procedure types
        $query = ServiceRequest::query()->where('sender_id', $userId);
        switch ($status) {
            case 'accepted':
                $query->where('status', 'accepted');
                break;
            case 'completed':
                $query->where('status', 'completed');
                break;
            case 'declined':
                $query->where('status', 'declined');
                break;
            default:
                // Default to pending requests
                $query->where('status', 'pending');
                break;
        }
    
        // Apply search query if it exists
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('patient_id', 'like', '%' . $search . '%')
                    ->orWhere('procedure_type', 'like', '%' . $search . '%');
            });
        }
    
        // Filter by procedure types
        $query->whereIn('procedure_type', $procedureTypes);
    
        // Retrieve requests and paginate the results
        $requests = $query->paginate(10); // Adjust pagination limit as needed
    
        // Pass request status to the view to maintain consistency
        return view('nurse.' . $serviceType . '-services', compact('requests', 'status'));
    }
    




    
    
    public function viewRequest($patientId, $requestId)
    {
        // Fetch the requested patient and request details
        $patient = Patients::findOrFail($patientId);
        $request = ServiceRequest::findOrFail($requestId);
    
        // Pass the patient and request details to the view
        return view('nurse.result', compact('patient', 'request'));
    }
    
    
    
    


    
    
}
