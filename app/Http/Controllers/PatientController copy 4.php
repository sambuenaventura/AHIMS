<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index() {
            $data = array("patients" => DB::table('patients')->paginate(999));
        return view('admission.index', $data);
        
    }
    
    
    // public function admissionView()
    // {
    //     $data = array("patients" => DB::table('patients')->paginate(999));
    //     return view('patients.admission', $data);
    // }
    public function admissionView(Request $request)
    {
        $admissionType = $request->input('admissionType');
    
        if ($admissionType) {
            $patients = DB::table('patients')->where('admission_type', $admissionType)->paginate(999);
        } else {
            $patients = DB::table('patients')->paginate(999);
        }
    
        return view('admission.admission', compact('patients'));
    }

    // public function getAgeAttribute()
    // {
    //     return $this->date_of_birth ? Carbon::parse($this->date_of_birth)->age : null;
    // }

    public function show($patient_id) {
        $data = Patients::where('patient_id', $patient_id)->firstOrFail();
        //dd($data);
        return view('patients.edit', ['patient' => $data]); 
    }

    public function create()
    {
        // Retrieve room numbers already assigned to patients
        $assignedRooms = Patients::pluck('room_number')->toArray();
    
        return view('patients.create', compact('assignedRooms'));
    }
    
    
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "date_of_birth" => ['nullable', 'date'],
            "gender" => ['required'],
            "contact_number" => ['required'],
            "address" => ['required'],
            "pic_first_name" => ['nullable', 'min:1'],
            "pic_last_name" => ['nullable', 'min:1'],
            "pic_relation" => ['nullable', 'min:1'],
            "pic_contact_number" => ['nullable'],
            "ap_first_name" => ['nullable', 'min:1'],
            "ap_last_name" => ['nullable', 'min:1'],
            "ap_contact_number" => ['nullable'],
            "specialist" => ['nullable'],
            "room_number" => ['nullable'],
            "admission_type" => ['required'], // Ensure admission_type is required
        ]);

        $validated['admission_type'] = $request->input('admission_type');

        // Create a new patient
        $newPatient = Patients::create($validated);
    if ($request->has('hospital_number')) {
        // Get the first value from the array
        $roomNumber = current($request->input('hospital_number'));
        // OR use index directly: $roomNumber = $request->input('hospital_number')[0];

        // Update the room_number in the patients table
        $newPatient->update(['room_number' => $roomNumber]);
    }
        return redirect('/admission-patients')->with('message', 'New patient was added successfully!');
    }

    public function update(Request $request, Patients $patient)
    {
        $validatedPatient = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "date_of_birth" => ['nullable', 'date'],
            "gender" => ['required'],
            "contact_number" => ['required'],
            "address" => ['required'],
            "pic_first_name" => ['nullable', 'min:1'],
            "pic_last_name" => ['nullable', 'min:1'],
            "pic_relation" => ['nullable', 'min:1'],
            "pic_contact_number" => ['nullable'],
            "ap_first_name" => ['nullable', 'min:1'],
            "ap_last_name" => ['nullable', 'min:1'],
            "ap_contact_number" => ['nullable'],
            "specialist" => ['nullable'],
        ]);
    
        // Update patient information
        $patient->update($validatedPatient);
    
        // Check if the patient has an existing medical history
        if ($patient->medicalHistory) {
            // Update existing medical history
            $validatedMedicalHistory = $request->validate([
                'complete_history' => ['required', 'min:1'], // Add any validation rules you need
            ]);
    
            $patient->medicalHistory->update($validatedMedicalHistory);
        } else {
            // Create new medical history if it doesn't exist
            $medicalHistoryData = [
                'complete_history' => $request->input('complete_history'),
            ];
    
            $patient->medicalHistory()->create($medicalHistoryData);
        }
    
        return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission-patients')->with('message', 'Data was successfully deleted');
    }




}
