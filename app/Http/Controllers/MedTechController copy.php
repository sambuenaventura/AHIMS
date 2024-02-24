<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ArchivedPatients;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\ServiceRequest;

class MedTechController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated medtech's ID
        
        // Query for pending service requests assigned to the authenticated medtech
        $requests = ServiceRequest::query()
                                   ->where('status', 'pending')
                                   ->paginate(10); 
        return view('medtech.index', compact('requests'));
    }
    
    
    // public function updateStatus($id, $status)
    // {
    //     // Find the request by ID
    //     $request = ServiceRequest::findOrFail($id);

    //     // Update the status
    //     $request->status = $status;
    //     $request->save();

    //     // Redirect back or to a different route
    //     return redirect()->back()->with('message', 'Request status updated successfully');
    // }

    
    // public function acceptRequest($request_id)
    // {
    //     // Find the request by request_id
    //     $request = ServiceRequest::where('request_id', $request_id)->firstOrFail();
    
    //     // Update the status to accepted
    //     $request->status = 'accepted';
    //     $request->save();
    
    //     // Redirect back or to a different route
    //     return redirect()->back()->with('message', 'Request accepted successfully');
    // }
    
    // public function declineRequest($request_id)
    // {
    //     // Find the request by request_id
    //     $request = ServiceRequest::where('request_id', $request_id)->firstOrFail();
    
    //     // Update the status to declined
    //     $request->status = 'declined';
    //     $request->save();
    
    //     // Redirect back or to a different route
    //     return redirect()->back()->with('message', 'Request declined successfully');
    // }
    

    public function acceptRequest($request_id)
    {
        $request = ServiceRequest::where('request_id', $request_id)->firstOrFail();
        $request->status = 'accepted';
        $request->receiver_id = auth()->id(); // Set the receiver_id to the authenticated user's ID
        $request->save();
    
        return redirect()->back()->with('message', 'Request accepted successfully');
    }
    
    public function declineRequest($request_id)
    {
        $request = ServiceRequest::where('request_id', $request_id)->firstOrFail();
        $request->status = 'declined';
        $request->receiver_id = auth()->id(); // Set the receiver_id to the authenticated user's ID
        $request->save();
    
        return redirect()->back()->with('message', 'Request declined successfully');
    }
    





    
    

    private function getPatients($search)
    {
        $patientsQuery = DB::table('patients');
        
        if ($search) {
            $patientsQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }
        
        return $patientsQuery->paginate(10);
    }

    // public function viewRequests($requestType = 'sent')
    // {
    //     // Fetch requests based on the request type
    //     if ($requestType === 'sent') {
    //         $requests = ServiceRequest::with('patient')->where('sender_id', auth()->id())->paginate(10);
    //     } elseif ($requestType === 'declined') {
    //         $requests = ServiceRequest::with('patient')->where('status', 'rejected')->paginate(10);
    //     } else {
    //         // For other request types, you can implement specific logic as needed
    //     }
    
    //     return view('medtech.requests', compact('requests'));
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
    
        // Retrieve requests and paginate the results
        $requests = $query->paginate(10); // Adjust pagination limit as needed
    
        // Pass request status to the view to maintain consistency
        return view('medtech.requests', compact('requests', 'status'));
    }


    public function viewResults()
    {
        // Retrieve and display the finished service requests for the MedTech
    }

    // public function processResult(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate form data
    //     $request->validate([
    //         'message' => 'required|string',
    //         'image' => 'nullable|image|max:2048', // Max size 2MB
    //         'request_id' => 'required|exists:requests,request_id', // Assuming the name of the id field is 'id' in the service_requests table
    //     ]);

    //     // Handle image upload (if provided)
    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('result_images', 'public');
    //     }

    //     // Update the request with result information
    //     $serviceRequest = ServiceRequest::findOrFail($request->request_id);
    //     $serviceRequest->message = $request->message;
    //     $serviceRequest->image = $imagePath;
    //     $serviceRequest->status = 'completed'; // Update request status
    //     $serviceRequest->save();

    //     // Redirect back or to a different route
    //     return redirect()->back()->with('success', 'Result sent successfully');
    // }
    
    // public function processResult(Request $request)
    // {
    //     // Validate form data including the file
    //     $validatedData = $request->validate([
    //         'message' => 'required|string',
    //         'image' => 'nullable|image|max:2048',
    //         'request_id' => 'required|exists:requests,request_id',
    //     ]);
    
    //     // Handle image upload
    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('result_images', 'public');
    
    //         // Ensure the file was stored successfully
    //         if (!$imagePath) {
    //             return redirect()->back()->withErrors(['image' => 'Failed to upload image']);
    //         }
    //     }
    
    //     // Update the request with result information
    //     $serviceRequest = ServiceRequest::findOrFail($validatedData['request_id']);
    //     $serviceRequest->message = $validatedData['message'];
    //     $serviceRequest->image = $imagePath;
    //     $serviceRequest->status = 'completed';
    //     $serviceRequest->save();
    
    //     // Redirect back or to a different route
    //     return redirect()->back()->with('message', 'Result sent successfully');
    // }
    
    // public function processResult(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'message' => 'required|string',
    //         'patient_id' => 'required|exists:patients,id',
    //     ]);
    
    //     // Create a new entry in the requests table
    //     $requestEntry = new ServiceRequest();
    //     $requestEntry->sender_id = auth()->id(); // Assuming sender is the authenticated MedTech
    //     $requestEntry->receiver_id = $request->input('patient_id'); // Receiver is the patient
    //     $requestEntry->message = $validatedData['message'];
    //     $requestEntry->status = 'completed'; // Assuming status should be completed when result is sent
    //     $requestEntry->save();
    
    //     // Redirect back or to a different route
    //     return redirect()->back()->with('message', 'Result sent successfully');
    // }
    


    public function processResult(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'message' => ['required', 'string'],
            'request_id' => ['required', 'exists:requests,request_id'],
        ]);
    
        // Find the request by request ID
        $requestEntry = ServiceRequest::findOrFail($validatedData['request_id']);
    
        // Update the request information
        $requestEntry->message = $validatedData['message'];
        $requestEntry->status = 'completed';
        $requestEntry->save();
    
        // Redirect back to the previous page after processing the result
        return redirect()->back()->with('message', 'Result sent successfully');
    }
    
    


    

    public function show($id)
    {
        $patient = Patients::findOrFail($id);
        $request = ServiceRequest::where('patient_id', $id)->orderByDesc('created_at')->firstOrFail();
        return view('medtech.view', ['patient' => $patient, 'request' => $request]);
    }
    
    
    
    
}
