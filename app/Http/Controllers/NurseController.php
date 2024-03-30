<?php

namespace App\Http\Controllers;

use App\Jobs\ArchivePatient;
use App\Models\ServiceRequest;
use App\Models\ArchivedPatients;
use App\Models\CurrentMedication;
use App\Models\MedicalHistory;
use App\Models\NeurologicalExamination;
use App\Models\NurseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\PhysicalExamination;
use App\Models\ProgressNotes;
use App\Models\ReviewOfSystems;
use App\Models\VitalSigns;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class NurseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Use the Patients Eloquent model to query patients
        $patients = Patients::query();
    
        // Exclude archived patients
        $patients->where('archived', false);
    
        if ($search) {
            $terms = explode(' ', $search);
            
            $patients->where(function ($query) use ($terms) {
                $query->where(function ($q) use ($terms) {
                    foreach ($terms as $term) {
                        $q->where('first_name', 'like', '%' . $term . '%')
                            ->orWhere('last_name', 'like', '%' . $term . '%')
                            ->orWhere('patient_id', 'like', '%' . $term . '%')
                            ->orWhere('gender', 'like', '%' . $term . '%')
                            ->orWhere('room_number', 'like', '%' . $term . '%');
                    }
                })
                ->orWhereHas('physician', function ($subquery) use ($terms) {
                    $subquery->where(function ($q) use ($terms) {
                        foreach ($terms as $term) {
                            $q->where('phy_first_name', 'like', '%' . $term . '%')
                                ->orWhere('phy_last_name', 'like', '%' . $term . '%');
                        }
                    });
                });
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
            $terms = explode(' ', $search);
            
            $query->where(function ($q) use ($terms) {
                $q->where(function ($subquery) use ($terms) {
                    foreach ($terms as $term) {
                        $subquery->where('patient_id', 'like', '%' . $term . '%')
                            ->orWhere('first_name', 'like', '%' . $term . '%')
                            ->orWhere('last_name', 'like', '%' . $term . '%')
                            ->orWhere('admission_type', 'like', '%' . $term . '%');
                    }
                })
                ->orWhereHas('physician', function ($subquery) use ($terms) {
                    $subquery->where(function ($q) use ($terms) {
                        foreach ($terms as $term) {
                            $q->where('phy_first_name', 'like', '%' . $term . '%')
                                ->orWhere('phy_last_name', 'like', '%' . $term . '%');
                        }
                    });
                });
            });
        }


    // Eager load the physician relationship to avoid N+1 query issue
    $patients = $query->with('physician')->paginate(10); // Adjust pagination limit as needed

    // Pass admission type to the view to maintain consistency
    return view('nurse.nurse', compact('patients', 'admissionType'));
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

    // Fetch complete history from the medical_histories table
    $medicalHistory = MedicalHistory::where('patient_id', $id)->first();
    
    // Fetch review of systems from the review_of_systems table
    $reviewOfSystems = ReviewOfSystems::where('patient_id', $id)->first();

    // Fetch physical examinations from the physical_examinations table
    $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

    // Fetch physical examinations from the physical_examinations table
    $neurologicalExaminations = NeurologicalExamination::where('patient_id', $id)->first();

    // Fetch physical examinations from the physical_examinations table
    $currentMedication = CurrentMedication::where('patient_id', $id)->first();

    // Fetch complete history from the medical_histories table
    $medicalHistory = MedicalHistory::where('patient_id', $id)->first();

    // Retrieve the authenticated user's ID
    $nurseUserId = auth()->user()->id;

    // Check if the nurse is authenticated and has submitted medical history for the current patient
    if (auth()->check()) {
        // Nurse is authenticated
        // Retrieve the nurse's information
        $nurse = auth()->user(); // Use the authenticated user as the nurse

        // If medical history exists and nurse ID is not set, update the medical history with nurse ID
        if ($medicalHistory && !$medicalHistory->nurse_id) {
            $medicalHistory->update(['nurse_id' => $nurseUserId]);
        }
    } else {
        // If no nurse is authenticated, set nurse information to null
        $nurse = null;
    }

            
    // $patient->contact_number = Crypt::decryptString($patient->contact_number);
    // $patient->address = Crypt::decryptString($patient->address);
    // $patient->pic_contact_number = Crypt::decryptString($patient->pic_contact_number);
    // $patient->ap_contact_number = Crypt::decryptString($patient->ap_contact_number);



    return view('patients.nurse-edit', compact('nurse', 'patient', 'medtechCompletedResults', 'radtechCompletedResults', 'medicalHistory', 'reviewOfSystems', 'physicalExaminations', 'neurologicalExaminations', 'currentMedication'));
}

public function showMedicalHistory()
{
    // Fetch all medical histories from the database
    $medicalHistories = MedicalHistory::all();
    
    // Return the medical histories data
    return $medicalHistories;
}

public function showReviewOfSystems()
{
    // Fetch all medical histories from the database
    $reviewOfSystems = ReviewOfSystems::all();
    
    // Return the medical histories data
    return $reviewOfSystems;
}
public function showPhysicalExaminations()
{
    // Fetch all medical histories from the database
    $physicalExaminations = PhysicalExamination::all();
    
    // Return the medical histories data
    return $physicalExaminations;
}

public function showNeurologicalExaminations()
{
    // Fetch all medical histories from the database
    $neurologicalExaminations = NeurologicalExamination::all();
    
    // Return the medical histories data
    return $neurologicalExaminations;
}

public function showCurrentMedications()
{
    // Fetch all medical histories from the database
    $currentMedication = CurrentMedication::all();
    
    // Return the medical histories data
    return $currentMedication;
}


public function updateDischargeDate(Request $request, $id)
{

    // Validate the request data
    $request->validate([
        'password' => 'required|string', // Add any additional validation rules for the password
    ]);

    // Check if the password matches the user's password
    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    }



    $patient = Patients::findOrFail($id);
    
    $request->validate([
        'discharge_date' => 'required|date',
    ]);

    $patient->update([
        'discharge_date' => $request->input('discharge_date'),
    ]);

    return redirect()->back()->with('message', 'Discharge date updated successfully.');
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

        $nurseId = auth()->user()->id;

        // Check if the patient has an existing 1cal history
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
                'family_others_checkbox' => $request->input('family_others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
                'family_others_details' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
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
    
            // If checkbox is unchecked, set corresponding details to null
            $yearFields = [
                'hypertension_years',
                'cvd_year',
                'diabetes_years',
                'stroke_year',
                'asthma_years',
                'others_details',
                'family_others_details',
            ];
            //dd($validatedMedicalHistory);

            foreach ($yearFields as $field) {
                if (!$request->has($field)) {
                    $validatedMedicalHistory[$field] = null;
                }
            }
        // Set nurse ID in the validated medical history data
        $validatedMedicalHistory['nurse_id'] = $nurseId;

        // Update the medical history with the validated data
        $patient->medicalHistory->update($validatedMedicalHistory);
        
        }
                    
        else {

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
            'family_others_checkbox' => $request->input('family_others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
            'family_others_details' => $request->input('others_checkbox') ? ['min:1'] : [], // Validate only if others_checkbox is checked
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

        // If checkbox is unchecked, set corresponding details to null
        $yearFields = [
            'hypertension_years',
            'cvd_year',
            'diabetes_years',
            'stroke_year',
            'asthma_years',
            'others_details',
            'family_others_details',

        ];

        foreach ($yearFields as $field) {
            if (!$request->has($field)) {
                $medicalHistoryData[$field] = null;
            }
        }
    

        // Set nurse ID in the medical history data
        $medicalHistoryData['nurse_id'] = $nurseId;

        // Create the medical history associated with the patient
        $patient->medicalHistory()->create($medicalHistoryData); 
        }

    
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
            'cvs_swelling_of_lower_extremities',
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
            'clinical_impression' => ['nullable', 'min:1'],
            'work_up' => ['nullable', 'min:1'],

            // Add validation for other review of systems fields as needed
        ]);

        $validatedNeurologicalExamination['neuro_babinski'] = $request->has('neuro_babinski') ? 1 : 0;


        // Update or create review of systems record
        if ($patient->neurologicalExamination) {
            // If the patient has existing review of systems, update it
            $patient->neurologicalExamination->update($validatedNeurologicalExamination);
        } else {
            // If no review of systems record exists, create a new one
            $patient->neurologicalExamination()->create($validatedNeurologicalExamination);
        }      
        // dd($request->all());



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
            $patient->currentMedication()->create($validatedcurrentMedication);
        }

        // Log the nurse's update history
        $nurseHistory = new NurseHistory();
        $nurseHistory->nurse_id = auth()->user()->id; // Assuming you have access to the authenticated nurse's ID
        $nurseHistory->medical_history_id = $patient->medicalHistory->history_id; // Assuming you have access to the medical history ID
        $nurseHistory->patient_id = $patient->patient_id; // Assign the patient_id
        // Add any other necessary fields to the NurseHistory model and set their values
        $nurseHistory->save();

        return back()->with('message', 'Data was successfully updated');

    }




    
    
    
    
        public function generatePdf(Request $request, $patient_id)
    {
        // Retrieve patient by ID
        $patient = Patients::findOrFail($patient_id);
    
        // Get the data for the PDF
        $medicalHistory = $patient->medicalHistory;
        $reviewOfSystems = $patient->reviewOfSystems;
        $physicalExamination = $patient->physicalExamination;
        $neurologicalExamination = $patient->neurologicalExamination;
        $currentMedication = $patient->currentMedication;
        $vitalSigns = $patient->vitalSigns;
        $medicationRemarks = $patient->medicationRemarks;
        $progressNotes = $patient->progressNotes;
        $requests = $patient->requests; // Fetch requests data

    
        // Prepare the HTML content for the PDF
        $html = view('pdf.complete_history', compact('patient', 'medicalHistory', 'reviewOfSystems', 'physicalExamination', 'neurologicalExamination', 'currentMedication', 'vitalSigns', 'medicationRemarks', 'progressNotes', 'requests'))->render();
    
        // Configure DomPDF options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
    
        // Instantiate DomPDF with options
        $dompdf = new Dompdf($options);
    
        // Load HTML content for the PDF
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the generated PDF (inline or download)
        return $dompdf->stream('patient_data.pdf');
    }
    
    
    public function viewHistory($patient_id)
    {
        // Retrieve all nurse histories for the given patient_id
        $nurseHistories = Patients::findOrFail($patient_id)->nurseHistories;
            
        return view('patients.nurse-history', ['nurseHistories' => $nurseHistories]);
    }
    
    
    
















    public function updateVitalSigns(Request $request, Patients $patient)
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Check if the user has a PIN
        if ($user->pin) {
            // Validate the request data with 'pin' instead of 'password'
            $request->validate([
                'credential' => 'required|string', // assuming the input field is named 'credential'
            ]);

            $credential = $request->input('credential');

            // Check if the PIN matches the user's PIN
            if ($credential !== $user->pin) {
                return redirect()->back()->with('error', 'Incorrect PIN. Please try again.'); // Redirect back with an error message
            }
        } else {
            // Validate the request data with 'password'
            $request->validate([
                'credential' => 'required|string', // assuming the input field is named 'credential'
            ]);

            $credential = $request->input('credential');

            // Check if the password matches the user's password
            if (!Hash::check($credential, $user->password)) {
                return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
            }
        }


        
        // Validate the request for vital signs
        $validatedVitalSigns = $request->validate([
            'vital_date' => ['required', 'date'],
             'vital_time' => ['required', 'date_format:H:i', 'nullable'],
            //'vital_time' => ['required',  'nullable'],
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
    
        // return Redirect::route('nurse.edit', ['id' => $patient->patient_id])->with('message', 'Vital signs were successfully recorded');
       
        return back()->with('message', 'Vital signs were successfully recorded');

    
    }


    public function updateMedicationRemark(Request $request, Patients $patient)
{

        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }   

    
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

    // Sanitize inputs
    $validatedMedicationRemark['medication'] = strip_tags($validatedMedicationRemark['medication']);
    $validatedMedicationRemark['medication_dosage'] = strip_tags($validatedMedicationRemark['medication_dosage']);
    $validatedMedicationRemark['treatment'] = strip_tags($validatedMedicationRemark['treatment']);
    $validatedMedicationRemark['dietary_information'] = strip_tags($validatedMedicationRemark['dietary_information']);
    $validatedMedicationRemark['remarks_notes'] = strip_tags($validatedMedicationRemark['remarks_notes']);

    // If nurse is authenticated, get the ID of the authenticated user (assuming nurse user)
    $nurseId = auth()->user()->id;

    // Associate nurse user ID with the medication remark
    $validatedMedicationRemark['med_nurse_user_id'] = $nurseId;

    // Check if a record already exists for the selected date and shift
    $existingRemark = $patient->medicationRemarks()
                            ->where('medication_date', $validatedMedicationRemark['medication_date'])
                            ->where('shift', $validatedMedicationRemark['shift'])
                            ->first();

    // Update the existing medication remark record if it exists
    if ($existingRemark) {
        $existingRemark->update($validatedMedicationRemark);
        $message = 'Medication remark was successfully updated';
        // return back()->with('message', $message);
    } else {
        // Create a new medication remark record
        $patient->medicationRemarks()->create($validatedMedicationRemark);
        $message = 'Medication remark was successfully created';
        // Pass the existingRemark variable to the view
        // return back()->with('message', $message)->with('existingRemark', $existingRemark);
    }

    
    // return redirect()->route('nurse.edit', ['id' => $patient->patient_id])->with('message', $message);

    return back()->with('message', $message);
}

public function updateProgressNotes(Request $request, Patients $patient)
{


    // Validate the request data
    $request->validate([
        'password' => 'required|string', // Add any additional validation rules for the password
    ]);

    // Check if the password matches the user's password
    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    }   


    // Validate the request for progress notes
    $validatedProgressNotes = $request->validate([
        'progress_date' => ['required', 'date'],
        'shift' => ['required', 'string', Rule::in(['7:00am-3:00pm', '3:00pm-11:00pm', '11:00pm-7:00am'])],
        'focus' => ['required', 'string'],
        'prog_notes' => ['string', 'nullable'],
        // Add other validation rules as needed
    ]);

        // Sanitize inputs
        $validatedProgressNotes['focus'] = strip_tags($validatedProgressNotes['focus']);
        $validatedProgressNotes['prog_notes'] = strip_tags($validatedProgressNotes['prog_notes']);
    

    // If nurse is authenticated, get the ID of the authenticated user (assuming nurse user)
    $nurseId = auth()->user()->id;

    // Associate nurse user ID with the progress notes
    $validatedProgressNotes['prog_nurse_user_id'] = $nurseId;

    // Check if a record already exists for the provided focus
    $existingProgressNote = $patient->progressNotes()
        ->where('progress_date', $validatedProgressNotes['progress_date'])
        ->where('shift', $validatedProgressNotes['shift'])
        ->first();

    // Update an existing progress note record if found
    if ($existingProgressNote) {
        $existingProgressNote->update($validatedProgressNotes);
        $message = 'Progress note was successfully updated';
        // return back()->with('message', $message)->with('existingProgressNote', $existingProgressNote);
    } else {
        // Create a new progress note record
        $patient->progressNotes()->create($validatedProgressNotes);
        $message = 'Progress note was successfully created';
        // return back()->with('message', $message);
    }
    return back()->with('message', $message);


}



public function viewRemarks($id)
{
    $patient = Patients::findOrFail($id);
    $vitalSigns = $patient->vitalSigns()->paginate(10);

    return view('nurse.show-remarks', compact('patient', 'vitalSigns'));
}

public function viewMedications($id)
{
    $patient = Patients::findOrFail($id);

    // Fetch medication remarks for the patient
    $medicationRemarks = $patient->medicationRemarks;

    // Group medication remarks by date
    $medicationRemarksByDate = $medicationRemarks->groupBy(function ($item) {
        return Carbon::parse($item->medication_date)->format('n/j/Y');
    });

    // Paginate the grouped medication remarks
    $perPage = 5; // Number of items per page
    $currentPage = request()->query('page', 1); // Get the current page from the query string
    $pagedData = new LengthAwarePaginator(
        $medicationRemarksByDate->forPage($currentPage, $perPage),
        $medicationRemarksByDate->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('nurse.show-medications', compact('patient', 'pagedData'));
}


public function viewNotes($id)
{
    $patient = Patients::findOrFail($id);

    // Fetch progress notes for the patient
    $progressNotes = $patient->progressNotes;

    // Group progress notes by date
    $progressNotesByDate = $progressNotes->groupBy(function ($item) {
        return Carbon::parse($item->progress_date)->format('n/j/Y');
    });

    // Paginate the grouped progress notes
    $perPage = 5; // Number of items per page
    $currentPage = request()->query('page', 1); // Get the current page from the query string
    $pagedData = new LengthAwarePaginator(
        $progressNotesByDate->forPage($currentPage, $perPage),
        $progressNotesByDate->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('nurse.show-notes', compact('patient', 'pagedData'));
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

    // Dispatch the ArchivePatient job with a delay of 2 minutes
    ArchivePatient::dispatch($patient)->delay(now()->addMinutes(2));

    // Set the flag indicating that this patient has been archived
    $patient->archived = true;
    $patient->save();

    return redirect()->back()->with('message', 'Patient archive scheduled successfully. It will take effect after 2 minutes.');
}



    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission')->with('message', 'Data was successfully deleted');
    }
    

    // public function requestLaboratoryServices(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'password' => 'required|string', // Add any additional validation rules for the password
    //         'patient_id' => 'required|exists:patients,patient_id',
    //         'procedure_type' => 'required',
    //         'sender_message' => 'required',
    //         'date_needed' => 'required|date', // Validation rule for the date_needed field
    //         'time_needed' => 'required|date_format:H:i', // Validation rule for the time_needed field
    //         // Add more validation rules as needed
    //     ]);
    
    //     // Check if the password matches the user's password
    //     if (!Hash::check($validatedData['password'], Auth::user()->password)) {
    //         return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    //     }   
        
    //     // Create a new laboratory service request
    //     $serviceRequest = new ServiceRequest();
    //     $serviceRequest->patient_id = $validatedData['patient_id'];
    //     $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
    //     $serviceRequest->procedure_type = $validatedData['procedure_type'];
    //     $serviceRequest->sender_message = $validatedData['sender_message']; // Add sender message to the request
        
    //     // Set date_needed and time_needed if provided
    //     if ($request->filled('date_needed')) {
    //         $serviceRequest->date_needed = $validatedData['date_needed'];
    //     }
    //     if ($request->filled('time_needed')) {
    //         $serviceRequest->time_needed = $validatedData['time_needed'];
    //     }
    
    //     // Save the laboratory service request
    //     $serviceRequest->save();
    
    //     // Optionally, you can redirect the user after submitting the form
    //     return redirect()->back()->with('message', 'Laboratory service request submitted successfully');
    // }
    


    public function requestLaboratoryServices(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
            'patient_id' => 'required|exists:patients,patient_id',
            'procedure_type' => 'required',
            'sender_message' => 'required',
            'date_needed' => 'required|date', // Validation rule for the date_needed field
            'stat' => 'nullable|boolean', // Add validation rule for the STAT checkbox
            'time_needed' => ['required_if:stat,null,false', 'date_format:H:i'], // Validate time_needed only if stat is unchecked or not provided
            // Add more validation rules as needed
        ]);
    
        // Check if the password matches the user's password
        if (!Hash::check($validatedData['password'], Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }   
    
        // Create a new laboratory service request
        $serviceRequest = new ServiceRequest();
        $serviceRequest->patient_id = $validatedData['patient_id'];
        $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
        $serviceRequest->procedure_type = $validatedData['procedure_type'];
        $serviceRequest->sender_message = $validatedData['sender_message']; // Add sender message to the request
    
        // Set date_needed
        $serviceRequest->date_needed = $validatedData['date_needed'];
    
        // Set time_needed based on STAT checkbox
        $serviceRequest->time_needed = $request->filled('stat') && $request->boolean('stat') ? null : $validatedData['time_needed'];
    
        // Set STAT value
        $serviceRequest->stat = $request->filled('stat') && $request->boolean('stat');
    
        // Save the laboratory service request
        $serviceRequest->save();
    
        // Optionally, you can redirect the user after submitting the form
        return redirect()->back()->with('message', 'Laboratory service request submitted successfully');
    }
    
    
    
        public function requestImagingServices(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
            'patient_id' => 'required|exists:patients,patient_id',
            'procedure_type' => 'required|in:xray,ultrasound,ctscan', // Ensure the procedure type is one of these values
            'date_needed' => 'required|date', // Validation rule for the date_needed field
            'sender_message' => 'required',
            'stat' => 'nullable|boolean', // Add validation rule for the STAT checkbox
            'time_needed' => ['required_if:stat,null,false', 'date_format:H:i'], // Validate time_needed only if stat is unchecked or not provided
            // Add more validation rules as needed
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($validatedData['password'], Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }   

        // Create a new imaging service request
        $serviceRequest = new ServiceRequest();
        $serviceRequest->patient_id = $validatedData['patient_id'];
        $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
        $serviceRequest->procedure_type = $validatedData['procedure_type'];
        $serviceRequest->sender_message = $validatedData['sender_message']; // Add sender message to the request

        // Set time_needed based on STAT checkbox
        $serviceRequest->time_needed = $request->filled('stat') && $request->boolean('stat') ? null : $validatedData['time_needed'];

        // Set STAT value
        $serviceRequest->stat = $request->filled('stat') && $request->boolean('stat');

        // Save the imaging service request
        $serviceRequest->save();

        // Optionally, you can redirect the user after submitting the form
        return redirect()->back()->with('message', 'Imaging service request submitted successfully');
    }

    
    
    



    // public function requestImagingServices(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'password' => 'required|string', // Add any additional validation rules for the password
    //     ]);

    //     // Check if the password matches the user's password
    //     if (!Hash::check($request->password, Auth::user()->password)) {
    //         return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    //     }   

    //     // Validate the form input
    //     $validatedData = $request->validate([
    //         'patient_id' => 'required|exists:patients,patient_id',
    //         'procedure_type' => 'required|in:xray,ultrasound,ctscan', // Ensure the procedure type is one of these values
    //         'sender_message' => 'required',
    //     ]);

    //     // Check if the procedure_type is empty or not valid
    //     if (empty($validatedData['procedure_type']) || !in_array($validatedData['procedure_type'], ['xray', 'ultrasound', 'ctscan'])) {
    //         return redirect()->back()->with('error', 'Please select a valid procedure type.');
    //     }

    //     // Check if the sender_message is empty
    //     if (empty($validatedData['sender_message'])) {
    //         return redirect()->back()->with('error', 'Sender message cannot be empty.');
    //     }


    //     // Ensure at least one checkbox is selected for the corresponding procedure type
    //     $checkboxFieldName = $validatedData['procedure_type'] . '_tests';
    //     if (!$request->has($checkboxFieldName)) {
    //         return redirect()->back()->with('error', 'Please select at least one option for ' . strtoupper($validatedData['procedure_type']));
    //     }


    //     // Create a new imaging service request
    //     $serviceRequest = new ServiceRequest();
    //     $serviceRequest->patient_id = $validatedData['patient_id'];
    //     $serviceRequest->sender_id = Auth::id(); // Assuming sender ID is the currently authenticated user
    //     $serviceRequest->procedure_type = $validatedData['procedure_type'];
    //     $serviceRequest->sender_message = $validatedData['sender_message']; // Add sender message to the request

    //     // Set other attributes as needed

    //     // Save the imaging service request
    //     $serviceRequest->save();

    //     // Optionally, you can redirect the user after submitting the form
    //     return redirect()->back()->with('message', 'Imaging service request submitted successfully');
    // }



public function requestService($id)
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
    return view('nurse.request-service', compact('patient', 'medtechCompletedResults', 'radtechCompletedResults'));
}


public function requestLaboratory(Request $request, $id)
{
    $patient = Patients::findOrFail($id);
    
    // Query to fetch completed service requests for the selected patient handled by medtech
    $medtechCompletedResultsQuery = ServiceRequest::where('patient_id', $id)
        ->where('status', 'completed')
        ->whereHas('receiver', function ($query) {
            $query->where('role', 'medtech');
        });

    // Check if there is a search query
    if ($request->has('search')) {
        $search = $request->search;
        $medtechCompletedResultsQuery->where(function ($query) use ($search) {
            $query->where('image', 'LIKE', "%$search%");
        });
    }

    // Check if there is a procedure filter
    if ($request->has('procedure')) {
        $procedure = $request->procedure;
        $medtechCompletedResultsQuery->where('procedure_type', $procedure);
    }

    // Paginate the results
    $medtechCompletedResults = $medtechCompletedResultsQuery->paginate(10); // Adjust 10 to the desired number of results per page

    // Fetch physical examinations from the physical_examinations table
    $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

    return view('nurse.request-lab', compact('patient', 'medtechCompletedResults', 'physicalExaminations'));
}

public function requestImaging(Request $request, $id)
{
    $patient = Patients::findOrFail($id);
    
    // Query to fetch completed service requests for the selected patient handled by radtech
    $radtechCompletedResultsQuery = ServiceRequest::where('patient_id', $id)
        ->where('status', 'completed')
        ->whereHas('receiver', function ($query) {
            $query->where('role', 'radtech');
        });

    // Check if there is a search query
    if ($request->has('search')) {
        $search = $request->search;
        $radtechCompletedResultsQuery->where(function ($query) use ($search) {
            $query->where('image', 'LIKE', "%$search%");
        });
    }

    // Fetch completed service requests for the selected patient handled by radtech
    $radtechCompletedResults = $radtechCompletedResultsQuery->paginate(10); // Adjust 10 to the desired number of results per page

    // Fetch physical examinations from the physical_examinations table
    $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

    return view('nurse.request-image', compact('patient', 'radtechCompletedResults', 'physicalExaminations'));
}

// public function showResults(Request $request, $id)
// {
//     $patient = Patients::findOrFail($id);

//     // Query to fetch completed service requests for the selected patient
//     $completedResultsQuery = ServiceRequest::where('patient_id', $id)
//         ->where('status', 'completed');

//     // Check if there is a search query
//     if ($request->has('search')) {
//         $search = $request->search;
//         $completedResultsQuery->where(function ($query) use ($search) {
//             $query->where('image', 'LIKE', "%$search%")
//                 ->orWhereHas('patient', function ($subquery) use ($search) {
//                     $subquery->where('first_name', 'LIKE', "%$search%")
//                             ->orWhere('last_name', 'LIKE', "%$search%");
//                 })
//                 ->orWhereHas('medtech', function ($subquery) use ($search) {
//                     $subquery->where('first_name', 'LIKE', "%$search%")
//                             ->orWhere('last_name', 'LIKE', "%$search%");
//                 })
//                 ->orWhereHas('radtech', function ($subquery) use ($search) {
//                     $subquery->where('first_name', 'LIKE', "%$search%")
//                             ->orWhere('last_name', 'LIKE', "%$search%");
//                 })
//                 ->orWhere('request_id', 'LIKE', "%$search%");
//         });
//     }


//     // Check if there is a procedure filter
//     if ($request->has('procedure')) {
//         $procedure = $request->procedure;
//         $completedResultsQuery->where('procedure_type', $procedure);
//     }

//     // Paginate the results
//     $completedResults = $completedResultsQuery->paginate(10); // Adjust 10 to the desired number of results per page

//     // Fetch physical examinations from the physical_examinations table
//     $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

//     return view('nurse.show-results', compact('patient', 'completedResults'));
// }

public function showResults(Request $request, $id)
{
    $patient = Patients::findOrFail($id);

    // Query to fetch completed service requests for the selected patient
    $completedResultsQuery = ServiceRequest::where('patient_id', $id)
        ->where('status', 'completed');

// Check if there is a search query
if ($request->has('search')) {
    $search = $request->search;
    $completedResultsQuery->where(function ($query) use ($search) {
        $query->where('image', 'LIKE', "%$search%")
            ->orWhereHas('patient', function ($subquery) use ($search) {
                $subquery->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%");
            })
            ->orWhereHas('medtech', function ($subquery) use ($search) {
                $subquery->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%");
            })
            ->orWhereHas('radtech', function ($subquery) use ($search) {
                $subquery->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%");
            })
            ->orWhere('request_id', 'LIKE', "%$search%")
            ->orWhere('sender_message', 'LIKE', "%$search%"); // Add this line to search in sender_message column
    });
}


    // Check if there is a procedure filter
    if ($request->has('procedure')) {
        $procedure = $request->procedure;
        $completedResultsQuery->where('procedure_type', $procedure);
    }

    // Paginate the results
    $completedResults = $completedResultsQuery->paginate(10); // Adjust 10 to the desired number of results per page

    // Fetch physical examinations from the physical_examinations table
    $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

    return view('nurse.show-results', compact('patient', 'completedResults'));
}



    public function viewRequests(Request $request, $serviceType)
{
    // Retrieve the search query and request status from the request
    $search = $request->input('search');
    $status = $request->input('status');

    // Define the procedure types based on service type
    $procedureTypes = ($serviceType === 'lab') ? ['chemistry', 'hematology', 'Bbis', 'parasitology', 'microbiology', 'microscopy'] : ['xray', 'ultrasound', 'ctscan'];

    // Query based on request status and procedure types
    $query = ServiceRequest::query()->where('sender_id', auth()->id());
    switch ($status) {
        case 'pending':
            $query->where('status', 'pending');
            break;
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
            // $query->where('status', 'pending'); COMMENTED TO SHOW ALL INSTEAD OF JUST PENDING
            break;
    }

// Apply search query if it exists
if ($search) {
    $terms = explode(' ', $search); // Split the search input into individual terms

    $query->where(function ($q) use ($terms) {
        foreach ($terms as $term) {
            $q->where('patient_id', 'like', '%' . $term . '%')
                ->orWhere('procedure_type', 'like', '%' . $term . '%')
                ->orWhere('sender_message', 'like', '%' . $term . '%')
                ->orWhere('message', 'like', '%' . $term . '%')
                ->orWhere('status', 'like', '%' . $term . '%')
                ->orWhere('request_id', 'like', '%' . $term . '%')
                ->orWhereHas('patient', function ($query) use ($term) {
                    $query->where('first_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%');
                })
                ->orWhereHas('sender', function ($query) use ($term) {
                    $query->where('first_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%');
                })
                ->orWhereHas('receiver', function ($query) use ($term) {
                    $query->where('first_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%');
                });
        }
    });
}





    // Filter by procedure types
    $query->whereIn('procedure_type', $procedureTypes);

    // Retrieve requests and paginate the results
    $requests = $query->with('nurse')->paginate(10); // Adjust pagination limit as needed

    // Pass request status to the view to maintain consistency
    return view('nurse.' . $serviceType . '-services', compact('requests', 'status'));
}
    
    public function viewRequest($patientId, $requestId)
    {
        // Fetch the requested patient and request details
        $patient = Patients::findOrFail($patientId);
        $request = ServiceRequest::findOrFail($requestId);
    
        // Determine the procedure type from the request
        $procedureType = $request->procedure_type;
    
        // Define arrays of imaging and laboratory services
        $imagingServices = ['Xray', 'Ultrasound', 'Ctscan'];
        $laboratoryServices = ['Chemistry', 'Hematology', 'Bbis', 'Parasitology', 'Microbiology', 'Microscopy'];
    
        // Check if the procedure type is in the imaging services array
        $isImagingService = in_array($procedureType, $imagingServices);
    
        // Pass the patient, request, and procedure type details to the view
        return view('nurse.result', compact('patient', 'request', 'isImagingService'));
    }
    
}
