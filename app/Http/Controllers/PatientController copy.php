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
    
    public function admissionView()
    {
        $data = array("patients" => DB::table('patients')->paginate(999));
        return view('patients.admission', $data);
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
            "age" => ['required'],
            "gender" => ['required'],
            "contact_number" => ['required'],
            "address" => ['required'],
            "past_conditions" => ['required'],
            "surgical_procedures" => ['required'],
            "allergies" => ['required'],
            "medication_and_dosage" => ['required'],
            "frequency"=> ['required'],
            "prescribing_physician"=> ['required'],
        ]);

        Patients::create($validated);

        return redirect('/')->with('message', 'New patient was added successfully!');
    }

    public function update(Request $request, Patients $patient) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
        ]);

        $patient->update($validated);
        
        return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Patients $patient) {
        $patient->delete();
        return redirect('/admission')->with('message', 'Data was successfully deleted');
    }

}
