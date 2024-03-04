<?php

namespace App\Http\Controllers;

use App\Imports\MedtechImport;
use App\Imports\NurseImport;
use App\Imports\PhysicianImport;
use Illuminate\Http\Request;
use App\Models\ServiceRequest; // Import the Request model
use App\Models\ArchivedPatients;
use App\Models\CurrentMedication;
use App\Models\MedicalHistory;
use App\Models\NeurologicalExamination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;
use App\Models\PhysicalExamination;
use App\Models\Physicians;
use App\Models\ProgressNotes;
use App\Models\ReviewOfSystems;
use App\Models\User;
use App\Models\VitalSigns;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller

{
    public function index(Request $request) {
        // Count the number of physicians
        $physicianCount = Physicians::count();
    
        // Count the number of nurses
        $nurseCount = User::where('role', 'nurse')->count();
    
        // Count the number of medical technologists
        $medtechCount = User::where('role', 'medtech')->count();
    
        // Count the number of radiologic technologists
        $radtechCount = User::where('role', 'radtech')->count();
    
        return view('admin.index', compact('physicianCount', 'nurseCount', 'medtechCount', 'radtechCount'));
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
            $physicians->where(function ($query) use ($search) {
                $query->where('phy_first_name', 'like', '%' . $search . '%')
                    ->orWhere('phy_last_name', 'like', '%' . $search . '%');
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


    public function doctorsView(Request $request)
    {
        $allPatients = $this->getAllPatients();

        // Retrieve physicians with optional specialty and search parameters
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
            $physicians->where(function ($query) use ($search) {
                $query->where('phy_first_name', 'like', '%' . $search . '%')
                    ->orWhere('phy_last_name', 'like', '%' . $search . '%')
                    ->orWhere('specialty', 'like', '%' . $search . '%');
            });
        }

        // Fetch the physicians with their patient counts
        $physicians = $physicians->withCount('patients');

        // Paginate the results
        $physicians = $physicians->paginate(10);
        // Append existing query parameters to pagination links
        $physicians->appends(request()->query());

        // Append the specialty and search parameters to the pagination links
        $physicians->appends(['specialty' => $specialty, 'search' => $search]);

        // Pass the retrieved physicians to the view
        return view('admin.doctors-list', compact('physicians', 'allPatients'));
    }


    public function admissionsView(Request $request)
    {
        // Retrieve users with the role "admission"
        $admissions = User::where('role', 'admission');

        // Apply search filter if provided
        $search = $request->input('search');
        if ($search) {
            $admissions->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%');
            });
        }
        
        // Paginate the results
        $admissions = $admissions->paginate(10);
        // Append existing query parameters to pagination links
        $admissions->appends(request()->query());

        // Pass the retrieved admissions to the view
        return view('admin.admissions-list', compact('admissions'));
    }


    public function nursesView(Request $request)
    {
        // Retrieve nurses with the role "nurse"
        $nurses = User::where('role', 'nurse');

        // Fetch the nurses with any additional conditions or filters as needed
        // For example, you might want to filter nurses based on certain criteria

        // Paginate the results
        $nurses = $nurses->paginate(10);
        // Append existing query parameters to pagination links
        $nurses->appends(request()->query());

        // Pass the retrieved nurses to the view
        return view('admin.nurses-list', compact('nurses'));
    }



    public function medtechsView(Request $request)
    {
        // Retrieve medtechs with the role "medtech"
        $medtechs = User::where('role', 'medtech');
    
        // Fetch the medtechs with any additional conditions or filters as needed
        // For example, you might want to filter medtechs based on certain criteria
    
        // Paginate the results
        $medtechs = $medtechs->paginate(10);
        // Append existing query parameters to pagination links
        $medtechs->appends(request()->query());
    
        // Pass the retrieved medtechs to the view
        return view('admin.medtechs-list', compact('medtechs'));
    }

    public function radtechsView(Request $request)
    {
        // Retrieve radtechs with the role "radtech"
        $radtechs = User::where('role', 'radtech');
    
        // Fetch the radtechs with any additional conditions or filters as needed
        // For example, you might want to filter radtechs based on certain criteria
    
        // Paginate the results
        $radtechs = $radtechs->paginate(10);
        // Append existing query parameters to pagination links
        $radtechs->appends(request()->query());
    
        // Pass the retrieved radtechs to the view
        return view('admin.radtechs-list', compact('radtechs'));
    }


    public function register() {
        return view('admin.admin-create');
    }



    public function store(Request $request) {
        $validated = $request->validate([
            //"name" => ['required', 'min:1', 'max:255'],
            "first_name" => ['required', 'min:1', 'max:255'],
            "last_name" => ['required', 'min:1', 'max:255'],
            'role' => 'required|string|in:admission,nurse,radtech,medtech,admin',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6|max:255'
        ]);
        //dd($validated);
        $validated['password'] = bcrypt($validated['password']);
        //$validated['password'] = Hash::make($validated['password']);
        
        $user = User::create($validated);

        //return $user;

        // auth()->login($user);
        // return redirect('/')->with('message', 'Successfuly registered!');
        return redirect()->back()->with('message', 'Successfuly registered!');

    }


    public function addDoctor() {
        return view('admin.create-doctor');
    }

    public function storeDoctor(Request $request)
    {

       // Validate the request data
       $request->validate([
        'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }


        $validatedData = $request->validate([
            'phy_first_name' => 'required|string|max:255',
            'phy_last_name' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
            'specialty' => 'required|string|in:Internal_Medicine,Gastroenterology,Neurology,Cardiology,Pulmonology,Pediatrics,Endocrinology,Otolaryngology', // Validate against the provided specialties
            // Add validation rules for other fields as needed
        ]);

        // Create a new physician instance
        $physician = new Physicians(); // Use Physicians instead of Doctor
        $physician->phy_first_name = $validatedData['phy_first_name'];
        $physician->phy_last_name = $validatedData['phy_last_name'];
        $physician->availability = $validatedData['availability'];
        $physician->specialty = $validatedData['specialty']; // Assign selected specialty
        // Set other fields as needed
        $physician->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Physician registered successfully!');
    }

    public function importDoctor(Request $request)
    {

        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }

        $request->validate([
            'import_file' => [
                'required',
                'file'
            ]
            ]);

            Excel::import(new PhysicianImport, $request->file('import_file'));

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Physicians imported successfully!');
    }

    public function addNurse() {
        return view('admin.create-nurse');
    }

    public function storeNurse(Request $request) {
        // Validate the request data
        $request->validate([
            'admin_password' => 'required|string', // Validate the admin's password
            "first_name" => ['required', 'min:1', 'max:255'],
            "last_name" => ['required', 'min:1', 'max:255'],
            "student_number" => ['required', 'min:1', 'max:255'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'] // Add password validation rules as needed
        ]);
        
        // Check if the admin password matches the user's password
        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect admin password. Please try again.');
        }
    
        // Create a new nurse instance
        $nurse = new User();
        $nurse->role = 'nurse'; // Set the role to 'nurse'
        $nurse->first_name = $request->first_name;
        $nurse->last_name = $request->last_name;
        $nurse->student_number = $request->student_number;
        $nurse->email = $request->email;
        $nurse->password = Hash::make($request->password); // Hash and store the nurse's password
        $nurse->save();
    
        return redirect()->back()->with('message', 'Nurse registered successfully!');
    }

    public function importNurse(Request $request)
    {

        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }

        $request->validate([
            'import_file' => [
                'required',
                'file'
            ]
            ]);

            Excel::import(new NurseImport, $request->file('import_file'));

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Nurses imported successfully!');
    }

    public function addMedtech() {
        return view('admin.create-medtech');
    }

    public function storeMedtech(Request $request) {
        // Validate the request data
        $request->validate([
            'admin_password' => 'required|string', // Validate the admin's password
            "first_name" => ['required', 'min:1', 'max:255'],
            "last_name" => ['required', 'min:1', 'max:255'],
            "student_number" => ['required', 'min:1', 'max:255'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'] // Add password validation rules as needed
        ]);
        
        // Check if the admin password matches the user's password
        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect admin password. Please try again.');
        }
    
        // Create a new nurse instance
        $medtech = new User();
        $medtech->role = 'medtech'; // Set the role to 'medtech'
        $medtech->first_name = $request->first_name;
        $medtech->last_name = $request->last_name;
        $medtech->student_number = $request->student_number;
        $medtech->email = $request->email;
        $medtech->password = Hash::make($request->password); // Hash and store the medtech's password
        $medtech->save();
    
        return redirect()->back()->with('message', 'Medical Technologist registered successfully!');
    }

    public function importMedtech(Request $request)
    {

        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }

        $request->validate([
            'import_file' => [
                'required',
                'file'
            ]
            ]);

            Excel::import(new MedtechImport, $request->file('import_file'));

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Medical Technologists imported successfully!');
    }

    public function addRadtech() {
        return view('admin.create-radtech');
    }

    public function storeRadtech(Request $request) {
        // Validate the request data
        $request->validate([
            'admin_password' => 'required|string', // Validate the admin's password
            "first_name" => ['required', 'min:1', 'max:255'],
            "last_name" => ['required', 'min:1', 'max:255'],
            "student_number" => ['required', 'min:1', 'max:255'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'] // Add password validation rules as needed
        ]);
        
        // Check if the admin password matches the user's password
        if (!Hash::check($request->admin_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect admin password. Please try again.');
        }
    
        // Create a new nurse instance
        $radtech = new User();
        $radtech->role = 'radtech'; // Set the role to 'radtech'
        $radtech->first_name = $request->first_name;
        $radtech->last_name = $request->last_name;
        $radtech->student_number = $request->student_number;
        $radtech->email = $request->email;
        $radtech->password = Hash::make($request->password); // Hash and store the radtech's password
        $radtech->save();
    
        return redirect()->back()->with('message', 'Radiologic Technologist registered successfully!');
    }

    public function importRadtech(Request $request)
    {

        // Validate the request data
        $request->validate([
            'password' => 'required|string', // Add any additional validation rules for the password
        ]);

        // Check if the password matches the user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. Please try again.'); // Redirect back with an error message
        }

        $request->validate([
            'import_file' => [
                'required',
                'file'
            ]
            ]);

            Excel::import(new MedtechImport, $request->file('import_file'));

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Radiologic Technologists imported successfully!');
    }



}
