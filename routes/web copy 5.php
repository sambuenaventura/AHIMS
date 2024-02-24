<?php

use App\Http\Controllers\MedTechController;
use App\Http\Controllers\NurseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;

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
        Route::get('/admission-dashboard', 'index')->name('admission.index');
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


    Route::get('/admission/search/inpatient', 'searchInpatient')->name('admission.searchInpatient');
    Route::get('/admission/search/outpatient' ,'searchOutpatient')->name('admission.searchOutpatient');
    Route::get('/admission/search/archived', 'searchArchived')->name('admission.searchArchived');

});

Route::controller(NurseController::class)->group(function() {
    Route::get('/nurse-dashboard', 'index')->middleware('auth')->name('nurse.index');
     Route::get('/nurse-patients', 'nurseView')->name('nurse.view')->middleware('auth');
     Route::get('/nurse-patients/{id}', 'show');
     Route::get('/nurse-patients/edit/{id}', 'editNursePatient');
     Route::put('/nurse-patients/edit/{patient}', 'update');

     Route::get('/nurse-patients/add-remark/{id}', 'viewAddRemarkPatient');
     Route::put('/nurse-patients/update-vital-signs/{patient}', 'updateVitalSigns');
     Route::put('/nurse-patients/update-medication-remark/{patient}', 'updateMedicationRemark')->name('nurse.updateMedication');
     
     Route::get('/nurse-patients/add-progress-note/{id}', 'viewProgressNotesPatient');
     Route::put('/nurse-patients/update-progress-notes/{patient}', 'updateProgressNotes')->name('nurse.updateProgressNotes');
     
     Route::post('/archive-patient/{patient_id}', 'archivePatient')->name('archive.patient');
     Route::post('/unarchive-patient/{patient_id}', [NurseController::class, 'unarchivePatient'])->name('unarchive.patient');


     Route::get('/nurse/search/inpatient', 'searchInpatient')->name('nurse.searchInpatient');
     Route::get('/nurse/search/outpatient' ,'searchOutpatient')->name('nurse.searchOutpatient');
     Route::get('/nurse/search/archived', 'searchArchived')->name('nurse.searchArchived');


    // Route::get('/nurse-laboratory-services', 'laboratoryServices')->name('nurse.laboratoryServices');
    //  Route::post('/nurse-laboratory-services', 'requestLaboratoryServices')->name('nurse.requestLaboratoryServices')->middleware('auth');
     
    //  Route::get('/autocomplete', 'autocomplete');

    //  Route::get('/getPatientGender', 'getPatientGender');
    Route::get('/nurse/lab-services', 'viewRequestLab')->name('nurse.viewRequestLab')->middleware('auth');
    Route::post('/nurse-patients/{id}/request-laboratory-services', 'requestLaboratoryServices')->name('nurse.requestLaboratoryServices');

});

Route::controller(MedTechController::class)->group(function() {
    Route::get('/medtech-dashboard', 'index')->middleware('auth')->name('medtech.index');
    Route::get('/medtech-requests', 'viewRequests')->name('medtech.requests')->middleware('auth');
    Route::get('/medtech-results', 'viewResults')->name('medtech.results')->middleware('auth');
    Route::get('/medtech-patients/{id}', 'show');

    // Route::post('/update-status/{id}/{status}', 'updateStatus')->name('medtech.status');

    Route::post('/medtech/accept/{request_id}', 'acceptRequest')->name('medtech.accept');
    Route::post('/medtech/decline/{request_id}', 'declineRequest')->name('medtech.decline');
    

});