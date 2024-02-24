<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index() {
        //$data = Students::all(); shows all data in table

        //$data = Students::where('id', 1)->get(); //gets the first id
        //$data = Students::where('first_name', 'like', '%er%')->get(); //wildcad (where=)
        //$data = Students::where('age', '>', 21)->orderBy('first_name', 'asc')->limit(5)->get(); //wildcad (greater or less than or g/lorequal) //also includes ascending or desc order //also includes limit

        // $data = DB::table('students')
        // ->select(DB::raw('count(*) as gender_count, gender'))
        // ->groupBy('gender')
        // ->get(); // CUSTOM QUERY GROUPING

        // $data = Students::where('id', 100)->firstOrFail()->get(); //exception (firstOrFailnot not existing)

        // return view('students.index', ['students' => $data]);

        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->paginate(10));
        return view('students.index', $data);
    }

    // without composer, it passes the data to studentcontroller and displays it in students
    public function show($id) {
        $data = Students::findOrFail($id);
        //dd($data);
        return view('students.edit', ['student' => $data]); 
    }
    // public function show($id) {
    //    return view('students.index'); 
    //
    //}

    public function create() {
        return view('students.create')->with('title', 'Add New');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "gender" => ['required', 'min:1'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')], //the 'students' is the stduents table in the database then checks the 'email'
        ]);
        
        if($request->hasFile('student_image')) {
            $request->validate([
                "student_image" => 'mimes:jpeg,png,bmp,tiff |max:4096'
            ]);

            $filenameWithExtension = $request->file("student_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("student_image")->getClientOriginalExtension();
            
            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);
            
            $request->file('student_image')->storeAs('public/student/thumbnail/', $smallThumbnail);

            $thumbnail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbnail, 150, 93);

            $validated['student_image'] = $filenameToStore;

        };

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function update(Request $request, Students $student) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:1'],
            "last_name" => ['required', 'min:1'],
            "gender" => ['required', 'min:1'],
            "age" => ['required'],
            "email" => ['required', 'email'], //the 'students' is the stduents table in the database then checks the 'email'
        ]);

        //dd($request);
        if($request->hasFile('student_image')) { // JUST REMOVE THIS IF STATEMENT IF U WANT TO REQUIRE THE USER TO HAVE IMAGE
            $request->validate([
                "student_image" => 'mimes:jpeg,png,bmp,tiff |max:4096'
            ]);

            $filenameWithExtension = $request->file("student_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("student_image")->getClientOriginalExtension();
            
            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);
            
            $request->file('student_image')->storeAs('public/student/thumbnail/', $smallThumbnail);

            $thumbnail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbnail, 150, 93);

            //$formField (USE FORMFIELD INSTEAD OF VALIDATED NEXT TIME)
            $validated['student_image'] = $filenameToStore; //this will store it to the database

        };

        $student->update($validated);
        
        return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Students $student) {
        $student->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }

    public function createThumbnail($path, $width, $height) {
        $img = Image::make($path)->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    // public function createThumbnail($path, $width, $height) {
    //     // Create image manager with desired driver
    //     $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

    //     // Read image from file system
    //     $path = 'storage/public/student/thumbnail';
    //     $img = $manager->read($path);

    //     // Resize image proportionally to specified width and height
    //     $img->resize($width, $height, function ($constraint) {
    //         $constraint->aspectRatio();
    //     });

    //     // Save modified image
    //     $img->save($path);
    // }
    

}