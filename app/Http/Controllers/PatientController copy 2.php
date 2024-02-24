<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Patients;

class PatientController extends Controller
{
    public function index() {
            $data = array("patients" => DB::table('patients')->paginate(999));
        return view('patients.index', $data);
        
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
    
        return view('patients.admission', compact('patients'));
    }
    public function show($id) {
        $data = Patients::findOrFail($id);  
        //dd($data);
        return view('patients.edit', ['patient' => $data]); 
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

    public function update(Request $request, Patients $patient) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "specialist" => ['nullable', 'min:1'],
            "room_number" => ['nullable', 'min:1'],
            "discharge_date" => ['nullable', 'min:1'],
            "admission_type" => ['required', 'in:Inpatient,Outpatient'], // Validation for admission_type
        ]);

        $patient->update($validated);
        
        return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission')->with('message', 'Data was successfully deleted');
    }

}
