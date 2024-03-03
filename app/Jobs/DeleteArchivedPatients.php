<?php

namespace App\Jobs;

use App\Models\Patients;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteArchivedPatients implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $patientId;

    public function __construct($patientId)
    {
        $this->patientId = $patientId;
    }

    public function handle()
    {
        // Check if the patient is still archived
        $archivedPatient = Patients::where('patient_id', $this->patientId)
            ->where('admission_type', 'archived')
            ->first();

        if ($archivedPatient) {
            // Delete the patient
            $archivedPatient->delete();
        }
    }
}
