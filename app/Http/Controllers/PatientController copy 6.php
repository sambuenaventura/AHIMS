<?php

namespace App\Http\Controllers;

use App\Models\ArchivedPatients;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\Physicians;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    
    // public function index(Request $request) {
    //     // Fetch patients based on admission type
    //     $admissionType = $request->input('admissionType');
    //     $patientsQuery = DB::table('patients');
    //     if ($admissionType) {
    //         $patientsQuery->where('admission_type', $admissionType);
    //     }
    //     $patients = $patientsQuery->paginate(999);
    
    //     // Fetch physicians based on specialty or search query
    //     $specialty = $request->query('specialty');
    //     $search = $request->input('search');
    //     $physiciansQuery = Physicians::query();
    //     if ($specialty) {
    //         $physiciansQuery->where('specialty', $specialty);
    //     }
    //     if ($search) {
    //         $physiciansQuery->where(function ($query) use ($search) {
    //             $query->where('phy_first_name', 'like', '%' . $search . '%')
    //                   ->orWhere('phy_last_name', 'like', '%' . $search . '%');
    //         });
    //     }
    //     $physicians = $physiciansQuery->paginate(10); // Adjust the pagination as needed
    
    //     return view('admission.index', compact('patients', 'physicians'));
    // }

    
    // public function index(Request $request) {
    //     // Fetch all patients
    //     $patientsQuery = DB::table('patients');
    //     $allPatients = $patientsQuery->get();
    
    //     // Count patients based on admission type
    //     $inpatientCount = $allPatients->where('admission_type', 'Inpatient')->count();
    //     $outpatientCount = $allPatients->where('admission_type', 'Outpatient')->count();
    
    //     // Fetch physicians based on specialty or search query
    //     $specialty = $request->query('specialty');
    //     $search = $request->input('search');
    //     $physiciansQuery = Physicians::query();
    //     if ($specialty) {
    //         $physiciansQuery->where('specialty', $specialty);
    //     }
    //     if ($search) {
    //         $physiciansQuery->where(function ($query) use ($search) {
    //             $query->where('phy_first_name', 'like', '%' . $search . '%')
    //                 ->orWhere('phy_last_name', 'like', '%' . $search . '%');
    //         });
    //     }
    //     $physicians = $physiciansQuery->paginate(10); // Adjust the pagination as needed
    
    //     return view('admission.index', compact('allPatients', 'inpatientCount', 'outpatientCount', 'physicians'));
    // }
    
    public function index(Request $request) {
        $allPatients = $this->getAllPatients();
        $inpatientCount = $this->getInpatientCount($allPatients);
        $outpatientCount = $this->getOutpatientCount($allPatients);
        $physicians = $this->getPhysicians($request);
    
        return view('admission.index', compact('allPatients', 'inpatientCount', 'outpatientCount', 'physicians'));
    }
    
    private function getAllPatients() {
        return DB::table('patients')->get();
    }
    
    private function getInpatientCount($allPatients) {
        return $allPatients->where('admission_type', 'Inpatient')->count();
    }
    
    private function getOutpatientCount($allPatients) {
        return $allPatients->where('admission_type', 'Outpatient')->count();
    }
    
    private function getPhysicians(Request $request) {
        $specialty = $request->query('specialty');
        $search = $request->input('search');
        $physiciansQuery = Physicians::query();
        if ($specialty) {
            $physiciansQuery->where('specialty', $specialty);
        }
        if ($search) {
            $physiciansQuery->where(function ($query) use ($search) {
                $query->where('phy_first_name', 'like', '%' . $search . '%')
                    ->orWhere('phy_last_name', 'like', '%' . $search . '%');
            });
        }
        return $physiciansQuery->paginate(10);
    }
    
    
    




    

    // public function admissionView(Request $request)
    // {
    //     $admissionType = $request->input('admissionType');
    
    //     if ($admissionType) {
    //         $patients = DB::table('patients')->where('admission_type', $admissionType)->paginate(999);
    //     } else {
    //         $patients = DB::table('patients')->paginate(999);
    //     }
    
    //     return view('admission.admission', compact('patients'));
    // }

    // public function admissionView(Request $request)
    // {
    //     $admissionType = $request->input('admissionType');
    //     $search = $request->input('search');
        
    //     $patients = $this->getPatients($admissionType, $search);
        
    //     return view('admission.admission', compact('patients'));
    // }
    
    // public function admissionView(Request $request)
    // {
    //     $admissionType = $request->input('admissionType');
    //     $search = $request->input('search');
        
    //     // Query based on search query and admission type
    //     if ($admissionType === 'archived') {
    //         // Query for archived patients
    //         $query = ArchivedPatients::query();
    //     } else {
    //         // Query for regular patients
    //         $query = Patients::query()->where('admission_type', $admissionType);
    //     }
    
    //     // Apply search filter
    //     if ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('patient_id', 'like', '%' . $search . '%')
    //                 ->orWhere('first_name', 'like', '%' . $search . '%')
    //                 ->orWhere('last_name', 'like', '%' . $search . '%');
    //         });
    //     }
    
    //     // Paginate the results
    //     $patients = $query->paginate(10); // You can adjust the pagination limit as needed
    
    //     return view('admission.admission', compact('patients'));
    // }
    

    public function admissionView(Request $request)
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
    
        // Retrieve patients and paginate the results
        $patients = $query->paginate(10); // Adjust pagination limit as needed
    
        // Pass admission type to the view to maintain consistency
        return view('admission.admission', compact('patients', 'admissionType'));
    }
    

    
    public function searchInpatient(Request $request)
    {
        $search = $request->input('inpatientSearch');
        $patients = Patients::query()
            ->where('admission_type', 'inpatient')
            ->where(function ($q) use ($search) {
                $q->where('patient_id', 'like', '%' . $search . '%')
                    ->orWhere('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    
        return view('admission.admission', compact('patients'));
    }
    
    public function searchOutpatient(Request $request)
    {
        $search = $request->input('outpatientSearch');
        $patients = Patients::query()
            ->where('admission_type', 'outpatient')
            ->where(function ($q) use ($search) {
                $q->where('patient_id', 'like', '%' . $search . '%')
                    ->orWhere('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    
        return view('admission.admission', compact('patients'));
    }
    
    
    public function searchArchived(Request $request)
    {
        $search = $request->input('archivedSearch');
        $patients = ArchivedPatients::query()
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            // Add other search conditions as needed
            ->paginate(10);
    
        return view('admission.admission', compact('patients'));
    }









    


    
    private function getPatients($admissionType, $search)
    {
        $patientsQuery = DB::table('patients');
        
        if ($admissionType) {
            $patientsQuery->where('admission_type', $admissionType);
        }
        
        if ($search) {
            $patientsQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }
        
        return $patientsQuery->paginate(10);
    }
    
    



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
            "date_of_birth" => ['required', 'date'],
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
            "specialist" => ['required'],
            "room_number" => ['nullable'],
            "admission_type" => ['required'],
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
