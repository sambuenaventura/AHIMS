<?php

use App\Http\Controllers\MedTechController;
use App\Http\Controllers\NurseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RadTechController;

Route::get('/', function () {
    return redirect('/login');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/register', 'register');
    Route::get('/login','login')->name('login');
    Route::post('/login/process', 'process');

    Route::post('/logout', 'logout');

    Route::post('/store', 'store');

});

Route::controller(PatientController::class)->group(function () {
    Route::middleware(['auth', 'role:admission'])->group(function () {
        Route::get('/admission-dashboard', 'index')->name('admission.index');
        Route::get('/admission-patients', 'admissionView')->name('admission.view');
        Route::get('/specialists', 'admissionView');
        Route::get('/add/patient', 'create');
        Route::post('/add/patient', 'store');

        Route::get('/patient/{id}', 'show');
        Route::put('/patient/{patient}', 'update');
        Route::delete('/patient/{patient}', 'destroy');


        Route::get('/admission/search/inpatient', 'searchInpatient')->name('admission.searchInpatient');
        Route::get('/admission/search/outpatient' ,'searchOutpatient')->name('admission.searchOutpatient');
        Route::get('/admission/search/archived', 'searchArchived')->name('admission.searchArchived');


    });
});

Route::controller(NurseController::class)->group(function() {
    Route::middleware(['auth', 'role:nurse'])->group(function () {
        Route::get('/nurse-dashboard', 'index')->name('nurse.index');
        Route::get('/nurse-patients', 'nurseView')->name('nurse.view');
        Route::get('/nurse-patients/{id}', 'show')->name('nurse.edit');
        Route::get('/nurse-patients/{id}/medtech-completed-requests', 'showMedtechCompletedRequests')->name('nurse.showMedtechCompletedRequests');
        Route::get('/nurse-patients/{id}/radtech-completed-requests', 'showRadtechCompletedRequests')->name('nurse.showRadtechCompletedRequests');

    
        Route::get('/nurse-patients/edit/{id}', 'editNursePatient');
        Route::put('/nurse-patients/edit/{patient}', 'update');
        Route::post('/patients/{patient_id}/update-discharge-date', 'updateDischargeDate')->name('patients.updateDischargeDate');


        Route::get('/nurse-patients/add-remark/{id}', 'viewAddRemarkPatient')->name('viewAddRemarkPatient');;
        Route::put('/nurse-patients/update-vital-signs/{patient}', 'updateVitalSigns');
        Route::put('/nurse-patients/update-medication-remark/{patient}', 'updateMedicationRemark')->name('nurse.updateMedication');
        
        Route::get('/nurse-patients/add-progress-note/{id}', 'viewProgressNotesPatient');
        Route::put('/nurse-patients/update-progress-notes/{patient}', 'updateProgressNotes')->name('nurse.updateProgressNotes');
        
        Route::post('/archive-patient/{patient_id}', 'archivePatient')->name('archive.patient');
        Route::post('/unarchive-patient/{patient_id}', [NurseController::class, 'unarchivePatient'])->name('unarchive.patient');


        Route::get('/nurse/search/inpatient', 'searchInpatient')->name('nurse.searchInpatient');
        Route::get('/nurse/search/outpatient' ,'searchOutpatient')->name('nurse.searchOutpatient');
        Route::get('/nurse/search/archived', 'searchArchived')->name('nurse.searchArchived');


        Route::get('/nurse/lab-services', 'viewRequests')->name('nurse.viewRequestLab')->defaults('serviceType', 'lab');
        Route::get('/nurse/imaging-services', 'viewRequests')->name('nurse.viewRequestImaging')->defaults('serviceType', 'imaging');
        



        Route::get('/nurse-patients/{patientId}/request/{requestId}', 'viewRequest')->name('nurse.viewRequest');


        Route::get('/nurse-patients/{patientId}/request-service/', 'requestService')->name('requestService');
        Route::get('/nurse-patients/{patientId}/show-results/', 'showResults')->name('showResults');

        Route::get('/nurse-patients/{patientId}/request-service/laboratory', 'requestLaboratory')->name('requestLaboratory');
        Route::get('/nurse-patients/{patientId}/request-service/imaging', 'requestImaging')->name('requestImaging');



        Route::post('/nurse-patients/{id}/request-laboratory-services', 'requestLaboratoryServices')->name('nurse.requestLaboratoryServices');
        Route::post('/nurse-patients/{id}/request-imaging-services', 'requestImagingServices')->name('nurse.requestImagingServices');
    });
});


Route::controller(MedTechController::class)->group(function() {
    Route::middleware(['auth', 'role:medtech'])->group(function () {
        Route::get('/medtech-dashboard', 'index')->name('medtech.index');
        Route::get('/medtech-requests', 'viewRequests')->name('medtech.requests');
        Route::get('/medtech-results', 'viewResults')->name('medtech.results');
        Route::get('/medtech-patients/{id}', 'show');

        // Route::post('/update-status/{id}/{status}', 'updateStatus')->name('medtech.status');

        Route::post('/medtech/accept/{request_id}', 'acceptRequest')->name('medtech.accept');
        Route::post('/medtech/decline/{request_id}', 'declineRequest')->name('medtech.decline');
        
        Route::get('/medtech-patients/{id}/requests/{request_id}', 'show');
        Route::post('/process-laboratory', 'processLabResult')->name('process.lab');

        Route::get('/medtech-patients/{patientId}/request/{requestId}', 'viewRequest')->name('medtech.viewRequest');

    });
});

Route::controller(RadTechController::class)->group(function() {
    Route::middleware(['auth', 'role:radtech'])->group(function () {
        Route::get('/radtech-dashboard', 'index')->name('radtech.index');
        Route::get('/radtech-requests', 'viewRequests')->name('radtech.requests');
        Route::get('/radtech-results', 'viewResults')->name('radtech.results');
        Route::get('/radtech-patients/{id}', 'show');

        // Route::post('/update-status/{id}/{status}', 'updateStatus')->name('radtech.status');

        Route::post('/radtech/accept/{request_id}', 'acceptRequest')->name('radtech.accept');
        Route::post('/radtech/decline/{request_id}', 'declineRequest')->name('radtech.decline');
        
        Route::get('/radtech-patients/{id}/requests/{request_id}', 'show');
        Route::post('/process-imaging', 'processResult')->name('process.imaging');
        
        Route::get('/radtech-patients/{patientId}/request/{requestId}', 'viewRequest')->name('radtech.viewRequest');

    });
});
