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
use App\Services\CredentialValidationService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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

    // private function getPhysicians(Request $request) {
    //     $physicians = Physicians::query();
    
    //     // Get the specialty and search parameters from the request
    //     $specialty = $request->query('specialty');
    //     $search = $request->input('search');
    
    //     // Apply specialty filter if provided
    //     if ($specialty) {
    //         $physicians->where('specialty', $specialty);
    //     }
    
    //     // Apply search filter if provided
    //     if ($search) {
    //         $physicians->where(function ($query) use ($search) {
    //             $query->where('phy_first_name', 'like', '%' . $search . '%')
    //                 ->orWhere('phy_last_name', 'like', '%' . $search . '%');
    //         });
    //     }
    
    //     // Fetch the physicians with their patient counts
    //     $physicians = $physicians->withCount('patients')->paginate(10);
    
    //     return $physicians;
    // }
    private function getPhysicians(Request $request) {
        $physicians = Physicians::query();
    
        // Get the specialty and search parameters from the request
        $specialty = $request->query('specialty');
        $search = $request->input('search');
    
        // Apply specialty filter if provided
        if ($specialty) {
            $physicians->where('specialty', $specialty);
        }
    
        // Apply search filter if provided
        if ($search) {
            $terms = explode(' ', $search); // Split the search input into individual terms

            $physicians->where(function ($query) use ($terms) {
                foreach ($terms as $term) {
                    $query->where('phy_first_name', 'like', '%' . $term . '%')
                        ->orWhere('phy_last_name', 'like', '%' . $term . '%')
                        ->orWhere('physician_id', 'like', '%' . $term . '%')
                        ->orWhere('availability', 'like', '%' . $term . '%')
                        ->orWhere('specialty', 'like', '%' . $term . '%');
                }
            });
        }

    
        // Fetch the physicians with their patient counts
        $physicians = $physicians->withCount('patients');
    
        // Paginate the results
        $physicians = $physicians->paginate(10);
    
        // Append the specialty and search parameters to the pagination links
        $physicians->appends(['specialty' => $specialty, 'search' => $search]);
    
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
    
    



    // public function show($patient_id) {
    //     $patient = Patients::where('patient_id', $patient_id)->firstOrFail();
    //     $physician = Physicians::findOrFail($patient->physician_id); // Assuming 'physician_id' is the foreign key in your Patients table
        
    //     //  $patient->contact_number = Crypt::decryptString($patient->contact_number);
    //     //  $patient->address = Crypt::decryptString($patient->address);
    //     //  $patient->pic_contact_number = Crypt::decryptString($patient->pic_contact_number);
    //     //  $patient->ap_contact_number = Crypt::decryptString($patient->ap_contact_number);

    //     return view('patients.edit', ['patient' => $patient, 'physician' => $physician]); 
    // }



    public function show($patient_id)
    {
        $patient = Patients::where('patient_id', $patient_id)->firstOrFail();
        $physician = Physicians::findOrFail($patient->physician_id);

        return view('patients.edit', ['patient' => $patient, 'physician' => $physician]);
    }

    public function generatePdf($patient_id)
    {
        $patient = Patients::where('patient_id', $patient_id)->firstOrFail();
        $physician = Physicians::findOrFail($patient->physician_id);

        // Data to pass to the PDF view
        $data = [
            'patient' => $patient,
            'physician' => $physician
        ];

        // Instantiate DomPDF
        $dompdf = new Dompdf();

        // Load HTML content for the PDF from the view
        $html = view('pdf.patient_report', $data)->render();

        // Load HTML to DomPDF for rendering
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (inline or download)
        return $dompdf->stream('patient_report.pdf');
    }
    

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


public function store(Request $request)
{
    // Validate input data
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
        "admission_type" => ['required'],
    ]);

    // Set room number based on admission type
    if ($request->input('admission_type') == "Outpatient") {
        $validated['room_number'] = 'For ER';
    } else {
        $validated = array_merge($validated, $request->validate([
            "room_number" => ['required', 'numeric', 'between:1,20'],
        ]));
    }

    // // Encrypt sensitive data
    // $validated['contact_number'] = Crypt::encryptString($request->input('contact_number'));
    // $validated['address'] = Crypt::encryptString($request->input('address'));
    // $validated['pic_contact_number'] = Crypt::encryptString($request->input('pic_contact_number'));
    // $validated['ap_contact_number'] = Crypt::encryptString($request->input('ap_contact_number'));
    // // You can encrypt other fields as needed...

    // // Check password verification
    // if (!Hash::check($request->password, Auth::user()->password)) {
    //     return redirect()->back()->with('error', 'Incorrect password. Please try again.');
    // }
    
    // // Check if the password matches the user's password
    // if (!Hash::check($request->password, Auth::user()->password)) {
    //     // If the password doesn't match, return back with an error message
    //     return redirect()->back()->withInput()->with('error', 'Incorrect password. Please try again.');
    // }


    $validationResponse = CredentialValidationService::validateCredentials($request);
    
    if ($validationResponse) {
        return $validationResponse; // Return the response when credentials are incorrect
    }


    // Validate physician selection
    $physicianId = $request->input('specialist');
    $physician = Physicians::find($physicianId);
    if (!$physician) {
        return redirect()->back()->withErrors(['specialist' => 'Invalid physician selected.'])->withInput();
    }
    $validated['physician_id'] = $physicianId;

    // Create a new patient
    $newPatient = Patients::create($validated);

    return redirect('/admission-patients')->with('message', 'New patient was added successfully!');
}






    // public function update(Request $request, Patients $patient)
    // {
    //     $validatedPatient = $request->validate([
    //         "first_name" => ['required', 'min:1'],
    //         "last_name" => ['required', 'min:1'],
    //         "date_of_birth" => ['nullable', 'date'],
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
    //         "specialist" => ['nullable'],
    //     ]);
    
    //     // Update patient information
    //     $patient->update($validatedPatient);
    
    //     // Check if the patient has an existing medical history
    //     if ($patient->medicalHistory) {
    //         // Update existing medical history
    //         $validatedMedicalHistory = $request->validate([
    //             'complete_history' => ['required', 'min:1'], // Add any validation rules you need
    //         ]);
    
    //         $patient->medicalHistory->update($validatedMedicalHistory);
    //     } else {
    //         // Create new medical history if it doesn't exist
    //         $medicalHistoryData = [
    //             'complete_history' => $request->input('complete_history'),
    //         ];
    
    //         $patient->medicalHistory()->create($medicalHistoryData);
    //     }
    
    //     return back()->with('message', 'Data was successfully updated');
    // }
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
