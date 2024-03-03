<?php

namespace App\Http\Controllers;

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

class AdminController extends Controller

{
    public function index(Request $request) {
        $allPatients = $this->getAllPatients();
        $inpatientCount = $this->getInpatientCount($allPatients);
        $outpatientCount = $this->getOutpatientCount($allPatients);
        $physicians = $this->getPhysicians($request);
    
        return view('admin.index', compact('allPatients', 'inpatientCount', 'outpatientCount', 'physicians'));
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






}
