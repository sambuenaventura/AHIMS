<?php

use App\Http\Controllers\NurseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes
// get(view), post(create), put(update), delete, options()
// match(['']), '/' <-- this block of code is where u can allow if get and post in a path
// any('') <-- tatanggapin niya kung pumasok man is get, post, etc...
// view('/', '') <-- rekta magpapakita kung anong page gusto mong ipakita sa users
// redirect('/welcome', '/') <-- re-redirect niya sa '/' if pumunta siya sa '/welcome
// permanentRedirect() <-- this is for redirecting http to https (pero sa hosting na to mostly cinoconfigure)

// Route::get('/home', function () {
//     #return view('welcome');
//     return 'Home Page';

// });

// Route::get('/about', function () {
//     return 'About Page';

// });

// Route::get('/', function () {
//     return 'Welcome!';

// });

// // Route::get('/users', function(Request $request){
// //     dd($request);
// //     return null;
// // });

// // Route::get('/get-text', function(){
// //     return response('Hello Sam', 200)
// //                     ->header('COntent-Type', 'text/plain');
// // });

// Route::get('/user/{id}/{group}', function($id, $group){
//     return response($id.'-'.$group, 200); // .-. is delimiter
// });

// // Requesting JSON file
// Route::get('/request-json', function() {
//     return response()->json(['name' => 'Sam', 'age' => '21']);
// });

// // Ex. may file kang gustong ipa-download sa user
// Route::get('/request-download', function(){

//     $path = public_path().'/sample.txt';
//     $name = 'sample.txt';
//     $headers = array(
//         'Content-type : application/text-plain',
//     );
//     return response()->download($path, $name, $headers); //path ng file, name ng file, extension ng file
// });

// // This allows get and post in '/' path.
// // route::match(['get', 'post'], '/', function() {
// //     return 'GET and POST is allowed';

// // });

// Route::any('/welcome', function () {
//     return view('welcome');

// });

// // Route::view('/welcome1', 'welcome');
// // Route::redirect('/welcome1', '/');

// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::optjons();


// Route::get('/', function () {
//     return view('welcome');
//     #return 'Home Page';
// });

// Route::get('/', [StudentController::class, 'index']);

// Route::get('/user', [UserController::class, 'index'])->name('login');

// #Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');

// Route::get('/user/{id}', [UserController::class, 'show']);

// Route::get('/students', [StudentController::class, 'index']);

// Route::get('/student/{id}', [StudentController::class, 'show']);

// Common routes naming convention
// index - Show all data or student
// show - Show a single data or student
// create - Show a form to add a new user
// store - Store a data
// edit - Show a form to edit a data
// update - Update a data
// destroy - delete a data

//Route::get('/', [StudentController::class, 'index'])->middleware('auth');



//Non-grouped
// Route::get('/register', [UserController::class, 'register']);
// Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Route::post('/login/process', [UserController::class, 'process']);
// Route::post('/logout', [UserController::class, 'logout']);
// Route::post('/store', [UserController::class, 'store']);

// Route::get('/add/student', [StudentController::class, 'create']);
// Route::post('/add/student', [StudentController::class, 'store']);
// Route::get('/student/{id}', [StudentController::class, 'show']);
// Route::put('/student/{student}', [StudentController::class, 'update']);
// Route::delete('/student/{student}', [StudentController::class, 'destroy']);

Route::get('/', function () {
    return redirect('/login');
});

//Grouped
Route::controller(UserController::class)->group(function() {
    Route::get('/register', 'register');
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');

    Route::post('/logout', 'logout');

    Route::post('/store', 'store');

});
Route::controller(StudentController::class)->group(function() {
    // Route::get('/', 'index')->middleware('auth');

    Route::get('/add/student', 'create');
    Route::post('/add/student', 'store');
    Route::get('/student/{id}', 'show');
    Route::put('/student/{student}', 'update');
    Route::delete('/student/{student}', 'destroy');

});

Route::controller(PatientController::class)->group(function () {


    Route::middleware(['admission'])->group(function () {
        Route::get('/admission-dashboard', 'index');
        Route::get('/admission-patients', 'admissionView')->name('admission.view');
        Route::get('/specialists', 'admissionView');
        Route::get('/add/patient', 'create');
        Route::post('/add/patient', 'store');
        // Route::get('/patient/{id}', 'show');
        // Route::put('/patient/{patient}', 'update');
        // Route::delete('/patient/{patient}', 'destroy');
    });

    Route::get('/patient/{id}', 'show');
    Route::put('/patient/{patient}', 'update');
    Route::delete('/patient/{patient}', 'destroy');

});

Route::controller(NurseController::class)->group(function() {
    Route::get('/nurse-dashboard', 'index')->middleware('auth');
     Route::get('/nurse-patients', 'nurseView')->name('nurse.view')->middleware('auth');
     Route::get('/nurse-patients/{id}', 'show');



    //  Route::put('/nurse-patients/{patient}', 'update');

    // Route::get('/admission', 'admissionView')->name('admission.view');

    // Route::get('/specialists', 'admissionView')->middleware('auth');

    // Route::get('/add/patient', 'create')->middleware('auth');;
    // Route::post('/add/patient', 'store')->middleware('auth');;
    // Route::get('/patient/{id}', 'show')->middleware('auth');
    // Route::put('/patient/{patient}', 'update')->middleware('auth');;
    // Route::delete('/patient/{patient}', 'destroy')->middleware('auth');;

});