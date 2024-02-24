<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use Carbon\Carbon;

class NurseController extends Controller
{
    public function index()
    {

        $patients = DB::table('patients')->paginate(999);

        foreach ($patients as $patient) {
            $patient->age = Carbon::parse($patient->date_of_birth)->age;
        }
        
        return view('nurse.index', compact('patients'));

    }
    public function nurseView(Request $request)
    {
        $admissionType = $request->input('admissionType');

        if ($admissionType) {
            $patients = DB::table('patients')->where('admission_type', $admissionType)->paginate(999);
        } else {
            $patients = DB::table('patients')->paginate(999);
        }

        return view('nurse.nurse', compact('patients'));
    }

    // public function show($id) {
    //     $data = Patients::findOrFail($id);  
    //     //dd($data);
    //     return view('patients.nurse-edit', ['patient' => $data]); 
    // }
    public function show($id)
    {
        $patient = Patients::with('vitalSigns')->findOrFail($id);
        return view('patients.nurse-edit', ['patient' => $patient]);
    }
    
    public function editNursePatient($id) {
        $data = Patients::findOrFail($id);  
        //dd($data);
        return view('form.main-form', ['patient' => $data]); 
    }

    public function viewAddRemarkPatient($id) {
        
        $data = Patients::findOrFail($id);  
        //dd($data);
        return view('form.remark', ['patient' => $data]); 
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
    
        // Create or update vital signs record
        if ($patient->vitalSigns) {
            // If the patient has existing vital signs, create a new one instead of updating
            $patient->vitalSigns()->create($validatedVitalSigns);
        } else {
            // If no vital signs record exists, create a new one
            $patient->vitalSigns()->create($validatedVitalSigns);
        }

    
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
        ]);
    
        // Create a new medication remark record
        $patient->medicationRemarks()->create($validatedMedicationRemark);

        $message = 'Medication remark was successfully created';

        return back()->with('message', $message);

    }
    
    
    

    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission')->with('message', 'Data was successfully deleted');
    }

    
}
