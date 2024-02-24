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
    
    // private function getPhysicians(Request $request) {
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
    //     return $physiciansQuery->paginate(10);
    // }

    private function getPhysicians(Request $request) {
        $physiciansQuery = Physicians::query();
    
        // Get the specialty and search parameters from the request
        $specialty = $request->query('specialty');
        $search = $request->input('search');
    
        // Apply specialty filter if provided
        if ($specialty) {
            $physiciansQuery->where('specialty', $specialty);
        }
    
        // Apply search filter if provided
        if ($search) {
            $physiciansQuery->where(function ($query) use ($search) {
                $query->where('phy_first_name', 'like', '%' . $search . '%')
                    ->orWhere('phy_last_name', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch the physicians with their patient counts
        $physicians = $physiciansQuery->withCount(['patients' => function ($query) {
            $query->whereNotNull('specialist'); // Filter patients with a specialist assigned
        }])->paginate(10);
    
        return $physicians;
    }
    
    
    

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

    // public function create()
    // {
    //     // Retrieve room numbers already assigned to patients
    //     $assignedRooms = Patients::pluck('room_number')->toArray();
    //     $physicians = Physicians::all(); // Fetch all physicians from the database

    //     return view('patients.create', compact('assignedRooms', 'physicians'));
    // }
    

    public function create()
{
    // Retrieve room numbers already assigned to patients
    $assignedRooms = Patients::pluck('room_number')->toArray();

    // Generate an array of available rooms (1-20)
    $availableRooms = range(1, 20);

    // Exclude assigned rooms from the available rooms
    $availableRooms = array_diff($availableRooms, $assignedRooms);

    // Fetch all physicians from the database
    $physicians = Physicians::all();

    return view('patients.create', compact('availableRooms', 'physicians'));
}

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         "first_name" => ['required', 'min:1'],
    //         "last_name" => ['required', 'min:1'],
    //         "date_of_birth" => ['required', 'date'],
    //         "gender" => ['required'],
    //         "contact_number" => ['required'],
    //         "address" => ['required'],
    //         "pic_first_name" => ['nullable', 'min:1'],
    //         "pic_last_name" => ['nullable', 'min:1'],
    //         "pic_relation" => ['nullable', 'min:1'],
    //         "pic_contact_number" => ['nullable'],
    //         "ap_first_name" => ['nullable', 'min:1'],
    //         "ap_last_name" => ['nullable', 'min:1'],
    //         "ap_contact_number" => ['nullable'],
    //         "specialist" => ['required'],
    //         "room_number" => ['nullable'],
    //         "admission_type" => ['required'],
    //     ]);

    //     $validated['admission_type'] = $request->input('admission_type');
    //     $validated['specialist'] = $request->input('specialist');

    //     // Create a new patient
    //     $newPatient = Patients::create($validated);

        
    //     return redirect('/admission-patients')->with('message', 'New patient was added successfully!');
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "date_of_birth" => ['required', 'date'],
            "gender" => ['required'],
            "contact_number" => ['required'],
            "address" => ['required'],
            "pic_first_name" => ['required', 'min:1'],
            "pic_last_name" => ['required', 'min:1'],
            "pic_relation" => ['required', 'min:1'],
            "pic_contact_number" => ['required'],
            "ap_first_name" => ['required', 'min:1'],
            "ap_last_name" => ['required', 'min:1'],
            "ap_contact_number" => ['required'],
            "specialist" => ['required'],
            "room_number" => ['required'],
            "admission_type" => ['required'],
        ]);

        $validated['admission_type'] = $request->input('admission_type');
        $validated['specialist'] = $request->input('specialist');

        // Create a new patient
        $newPatient = Patients::create($validated);

        
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
