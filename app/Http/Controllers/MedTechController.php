<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ArchivedPatients;
use App\Models\CurrentMedication;
use App\Models\MedicalHistory;
use App\Models\NeurologicalExamination;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\PhysicalExamination;
use App\Models\ReviewOfSystems;
use App\Models\ServiceRequest;

class MedTechController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Get the authenticated medtech's ID
        
    //     // Query for pending service requests assigned to the authenticated medtech
    //     $requests = ServiceRequest::query()
    //                                ->where('status', 'pending')
    //                                ->paginate(10); 
    //     return view('medtech.index', compact('requests'));
    // }

    
    // public function index(Request $request)
    // {
    //     // Get the authenticated medtech's ID
    //     $medtechId = auth()->user()->id;
        
    //     // Query for pending service requests assigned to the authenticated medtech
    //     $requests = ServiceRequest::query()
    //                                ->where('status', 'pending')
    //                                ->whereIn('procedure_type', ['Chemistry', 'Bbis', 'Parasitology', 'Microbiology', 'Microscopy', 'Hematology'])
    //                                ->paginate(10); 
    
    //     // Query for the count of patients for each procedure type with the condition on receiver_id
    //     $chemistryPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                             ->where('procedure_type', 'Chemistry')
    //                                             ->where('receiver_id', $medtechId)
    //                                             ->count();
    
    //     $hematologyPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                              ->where('procedure_type', 'Hematology')
    //                                              ->where('receiver_id', $medtechId)
    //                                              ->count();
    
    //     $bbIsPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                         ->where('procedure_type', 'Bbis')
    //                                         ->where('receiver_id', $medtechId)
    //                                         ->count();
    
    //     $parasitologyPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                                 ->where('procedure_type', 'Parasitology')
    //                                                 ->where('receiver_id', $medtechId)
    //                                                 ->count();
    
    //     $microbiologyPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                                 ->where('procedure_type', 'Microbiology')
    //                                                 ->where('receiver_id', $medtechId)
    //                                                 ->count();
    
    //     $microscopyPatientsCount = ServiceRequest::where('status', 'accepted')
    //                                               ->where('procedure_type', 'Microscopy')
    //                                               ->where('receiver_id', $medtechId)
    //                                               ->count();
    
    //     // Pass the counts and requests to the view
    //     return view('medtech.index', compact('requests', 'chemistryPatientsCount', 'hematologyPatientsCount', 'bbIsPatientsCount', 'parasitologyPatientsCount', 'microbiologyPatientsCount', 'microscopyPatientsCount'));
    // }
    
    public function index(Request $request)
    {
        // Get the authenticated medtech's ID
        $medtechId = auth()->user()->id;
        
        // Retrieve the search query from the request
        $search = $request->input('search');
        
        // Base query for pending service requests assigned to the authenticated medtech
        $query = ServiceRequest::query()
        ->where('status', 'pending')
        ->whereIn('procedure_type', ['Chemistry', 'Bbis', 'Parasitology', 'Microbiology', 'Microscopy', 'Hematology'])
        ->where(function ($q) use ($search) {
            $q->where('procedure_type', 'like', '%' . $search . '%')
                ->orWhere('patient_id', 'like', '%' . $search . '%')
                ->orWhereHas('patient', function ($q) use ($search) {
                    $q->where('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%');
                });
        })
        ->orderBy('created_at', 'asc'); // Sorting by time requested in ascending order
     
        // Paginate the results
        $requests = $query->paginate(10); 
    
        // Query for the count of patients for each procedure type with the condition on receiver_id
        $chemistryPatientsCount = ServiceRequest::where('status', 'accepted')
                                                ->where('procedure_type', 'Chemistry')
                                                ->where('receiver_id', $medtechId)
                                                ->count();
    
        $hematologyPatientsCount = ServiceRequest::where('status', 'accepted')
                                                ->where('procedure_type', 'Hematology')
                                                ->where('receiver_id', $medtechId)
                                                ->count();
    
        $bbIsPatientsCount = ServiceRequest::where('status', 'accepted')
                                            ->where('procedure_type', 'Bbis')
                                            ->where('receiver_id', $medtechId)
                                            ->count();
    
        $parasitologyPatientsCount = ServiceRequest::where('status', 'accepted')
                                                    ->where('procedure_type', 'Parasitology')
                                                    ->where('receiver_id', $medtechId)
                                                    ->count();
    
        $microbiologyPatientsCount = ServiceRequest::where('status', 'accepted')
                                                    ->where('procedure_type', 'Microbiology')
                                                    ->where('receiver_id', $medtechId)
                                                    ->count();
    
        $microscopyPatientsCount = ServiceRequest::where('status', 'accepted')
                                                    ->where('procedure_type', 'Microscopy')
                                                    ->where('receiver_id', $medtechId)
                                                    ->count();
    
        // Pass the counts, search query, and requests to the view
        return view('medtech.index', compact('requests', 'chemistryPatientsCount', 'hematologyPatientsCount', 'bbIsPatientsCount', 'parasitologyPatientsCount', 'microbiologyPatientsCount', 'microscopyPatientsCount', 'search'));
    }
    



    // public function acceptRequest(Request $request, $request_id)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'password' => 'required|string', // Add any additional validation rules for the password
    //     ]);
    
    //     // Check if the password matches the user's password
    //     if (!Hash::check($request->password, Auth::user()->password)) {
    //         return redirect()->back()->with('message', 'Incorrect password. Please try again.'); // Redirect back with an error message
    //     }
    
    //     $request = ServiceRequest::where('request_id', $request_id)->firstOrFail();
    //     $request->status = 'accepted';
    //     $request->receiver_id = auth()->id(); // Set the receiver_id to the authenticated user's ID
    //     $request->save();
    
    //     return redirect()->back()->with('message', 'Request accepted successfully');
    // }


    public function acceptRequest(Request $request, $request_id)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);
    
        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }
    
        $serviceRequest = ServiceRequest::findOrFail($request_id);
        $serviceRequest->status = 'accepted';
        $serviceRequest->receiver_id = auth()->id(); // Set the receiver_id to the authenticated user's ID
        $serviceRequest->save();
    
        return redirect()->back()->with('message', 'Request accepted successfully');
    }
    

    public function declineRequest(Request $request, $request_id)
{
    // Validate the request data
    $request->validate([
        'password' => 'required|string',
        'reason' => 'required|string', // Add validation for the reason
    ]);

    // Check if the password matches the user's password
    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
    }

    $requestModel = ServiceRequest::where('request_id', $request_id)->firstOrFail();
    $requestModel->status = 'declined';
    $requestModel->receiver_id = auth()->id();
    $requestModel->message = $request->reason; // Update the message column with the reason
    $requestModel->save();

    return redirect()->back()->with('message', 'Request declined successfully');
}

  
    // public function viewRequests(Request $request)
    // {
    //     // Retrieve the search query and request status from the request
    //     $search = $request->input('search');
    //     $status = $request->input('status');
    
    //     // Get the authenticated user's ID
    //     $userId = auth()->id();
    
    //     // Query based on request status
    //     $query = ServiceRequest::query()->where('receiver_id', $userId);
    //     switch ($status) {
    //         case 'accepted':
    //             $query->where('status', 'accepted');
    //             break;
    //         case 'completed':
    //             $query->where('status', 'completed');
    //             break;
    //         case 'declined':
    //             $query->where('status', 'declined');
    //             break;
    //         default:
    //             // Default to pending requests
    //             $query->where('status', 'pending');
    //             break;
    //     }
    
    //     // Apply search query if it exists
    //     if ($search) {
    //         $query->whereHas('patient', function ($q) use ($search) {
    //             $q->where('first_name', 'like', '%' . $search . '%')
    //             ->orWhere('last_name', 'like', '%' . $search . '%');
    //         });
    //     }


    
    //     // Retrieve requests and paginate the results
    //     $requests = $query->paginate(10); // Adjust pagination limit as needed
    
    //     // Pass request status to the view to maintain consistency
    //     return view('medtech.requests', compact('requests', 'status'));
    // }

    public function viewRequests(Request $request)
{
    // Retrieve the search query and request status from the request
    $search = $request->input('search');
    $status = $request->input('status');

    // Get the authenticated user's ID
    $userId = auth()->id();

    // Query based on request status
    $query = ServiceRequest::query()->where('receiver_id', $userId);
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
            // Default to include all statuses
            $query->whereIn('status', ['accepted', 'completed', 'declined']);
            break;
    }

    // Apply search query if it exists
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('patient_id', 'like', '%' . $search . '%')
                ->orWhere('procedure_type', 'like', '%' . $search . '%')
                ->orWhereHas('patient', function ($q) use ($search) {
                    $q->where('first_name', 'like', '%' . $search . '%')
                      ->orWhere('last_name', 'like', '%' . $search . '%');
                });
        });
    }

    // Retrieve requests and paginate the results
    $requests = $query->paginate(10); // Adjust pagination limit as needed

    // Pass request status to the view to maintain consistency
    return view('medtech.requests', compact('requests', 'status'));
}



    // public function processLabResult(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'message' => ['required', 'string'],
    //         'image' => ['required', 'image', 'max:2048'], // Max size 2MB, adjust as needed
    //         'request_id' => ['required', 'exists:requests,request_id'],
    //     ]);

    //     // Find the request by request ID
    //     $requestEntry = ServiceRequest::findOrFail($validatedData['request_id']);

    //     // Store the uploaded image
    //     // $imagePath = $request->file('image')->store('request_images', 'public');
    //     $imagePath = $request->file('image')->storeAs('request_images', $request->file('image')->getClientOriginalName(), 'public');
    //     // Update the request information
    //     $requestEntry->message = $validatedData['message'];
    //     $requestEntry->status = 'completed';
    //     $requestEntry->image = $imagePath; // Save the image path
    //     $requestEntry->save();

    //     // Redirect back to the previous page after processing the result
    //     return redirect()->route('medtech.requests', ['status' => 'accepted'])
    //                     ->with('message', 'Result sent successfully');
    // }


    public function processLabResult(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'message' => ['required', 'string'],
            'image.*' => ['required', 'image', 'max:2048'], // Max size 2MB for each image, adjust as needed
            'request_id' => ['required', 'exists:requests,request_id'],
        ]);
    
        // Find the request by request ID
        $requestEntry = ServiceRequest::findOrFail($validatedData['request_id']);
    
        // Check if images are uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded images with original file names
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->storeAs('request_images', $image->getClientOriginalName(), 'public');
            }
            // Update the request information
            $requestEntry->message = $validatedData['message'];
            $requestEntry->status = 'completed';
            $requestEntry->image = json_encode($imagePaths); // Save the image paths as JSON array
            $requestEntry->save();
    
            // Redirect back to the previous page after processing the result
            return redirect()->route('medtech.requests', ['status' => 'accepted'])
                            ->with('message', 'Results sent successfully');
        } else {
            // Handle case where no images are uploaded
            return redirect()->back()->with('error', 'No images uploaded');
        }
    }
    






    // public function viewResults(Request $request)
    // {
    //     $medtechId = auth()->user()->id;

    //     $status = 'completed';
    //     $procedureType = $request->input('procedure');
        
    //     // Fetch data based on the procedure_type and status
    //     $query = ServiceRequest::where('status', $status)
    //                             ->where('receiver_id', $medtechId);
        
    //     if (!empty($procedureType)) {
    //         $query->where('procedure_type', $procedureType);
    //     }
        
    //     $requests = $query->paginate(10);
        
    //     return view('medtech.results', compact('requests'));
    // }


//     public function viewResults(Request $request)
// {
//     $medtechId = auth()->user()->id;
//     $status = 'completed';
//     $procedureType = $request->input('procedure');
//     $search = $request->input('search');
    
//     // Fetch data based on the procedure_type, status, and search query
//     $query = ServiceRequest::where('status', $status)
//                             ->where('receiver_id', $medtechId);
    
//     if (!empty($procedureType)) {
//         $query->where('procedure_type', $procedureType);
//     }
    
//     if ($search) {
//         // Search by first name, last name, file name, patient ID, and procedure type
//         $query->where(function ($q) use ($search) {
//             $q->whereHas('patient', function ($q) use ($search) {
//                 $q->where('first_name', 'like', '%' . $search . '%')
//                   ->orWhere('last_name', 'like', '%' . $search . '%');
//             })
//             ->orWhere('image', 'like', '%' . $search . '%')
//             ->orWhere('patient_id', 'like', '%' . $search . '%')
//             ->orWhere('procedure_type', 'like', '%' . $search . '%');
//         });
//     }
    
    
    
//     $requests = $query->paginate(10);
    
//     return view('medtech.results', compact('requests', 'procedureType', 'search'));
// }



public function viewResults(Request $request)
{
    $medtechId = auth()->user()->id;
    $status = 'completed';
    $procedureType = $request->input('procedure');
    $search = $request->input('search');
    
    // Fetch data based on the procedure_type, status, and search query
    $query = ServiceRequest::where('status', $status)
                            ->where('receiver_id', $medtechId);
    
    if (!empty($procedureType)) {
        $query->where('procedure_type', $procedureType);
    }
    
    if ($search) {
        // Search by first name, last name, file name, patient ID, and procedure type
        $query->where(function ($q) use ($search) {
            $q->whereHas('patient', function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            })
            ->orWhere('image', 'like', '%' . $search . '%')
            ->orWhere('patient_id', 'like', '%' . $search . '%')
            ->orWhere('procedure_type', 'like', '%' . $search . '%');
        });
    }
    
    $requests = $query->paginate(10);
    
    // Append both search and procedure type to the pagination links
    $requests->appends(['search' => $search, 'procedure' => $procedureType]);
    
    return view('medtech.results', compact('requests', 'procedureType', 'search'));
}


    public function viewRequest($patientId, $requestId)
    {
        // Fetch the requested patient and request details
        $patient = Patients::findOrFail($patientId);
        $request = ServiceRequest::findOrFail($requestId);
    
        // Pass the patient and request details to the view
        return view('medtech.view-result', compact('patient', 'request'));
    }



    public function show($id, $request_id)
    {
        $patient = Patients::findOrFail($id);
        $physicalExaminations = PhysicalExamination::where('patient_id', $id)->first();

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
        $request = ServiceRequest::findOrFail($request_id);




        return view('medtech.send-result', ['patient' => $patient, 
                                            'request' => $request, 
                                            'reviewOfSystems' => $reviewOfSystems, 
                                            'physicalExaminations' => $physicalExaminations, 
                                            'neurologicalExaminations' => $neurologicalExaminations, 
                                            'medicalHistory' => $medicalHistory, 
                                            'currentMedication' => $currentMedication],);
    }
    //     public function show($id)
    // {
    //     $patient = Patients::findOrFail($id);

    //     // Fetch completed service requests for the selected patient handled by medtech
    //     $medtechCompletedResults = ServiceRequest::where('patient_id', $id)
    //                                         ->where('status', 'completed')
    //                                         ->whereHas('receiver', function ($query) {
    //                                             $query->where('role', 'medtech');
    //                                         })
    //                                         ->get();

    //     // Fetch completed service requests for the selected patient handled by radtech
    //     $radtechCompletedResults = ServiceRequest::where('patient_id', $id)
    //                                         ->where('status', 'completed')
    //                                         ->whereHas('receiver', function ($query) {
    //                                             $query->where('role', 'radtech');
    //                                         })
    //                                         ->get();



    //     // Retrieve the authenticated user's ID
    //     $nurseUserId = auth()->user()->id;

    //     // Check if the nurse is authenticated and has submitted medical history for the current patient
    //     if (auth()->check()) {
    //         // Nurse is authenticated
    //         // Retrieve the nurse's information
    //         $nurse = auth()->user(); // Use the authenticated user as the nurse

    //         // If medical history exists and nurse ID is not set, update the medical history with nurse ID
    //         if ($medicalHistory && !$medicalHistory->nurse_id) {
    //             $medicalHistory->update(['nurse_id' => $nurseUserId]);
    //         }
    //     } else {
    //         // If no nurse is authenticated, set nurse information to null
    //         $nurse = null;
    //     }

    //     return view('patients.nurse-edit', compact('nurse', 'patient', 'medtechCompletedResults', 'radtechCompletedResults', 'medicalHistory', 'reviewOfSystems', 'physicalExaminations', 'neurologicalExaminations', 'currentMedication'));
    // }

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
}
