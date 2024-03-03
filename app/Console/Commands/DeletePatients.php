<?php

namespace App\Console\Commands;

use App\Models\Patients;
use Illuminate\Console\Command;

class DeletePatients extends Command
{
    protected $signature = 'app:delete-patients';

    protected $description = 'Delete patients whose delete_after timestamp is in the past.';

    public function handle()
    {
        // Retrieve patients whose delete_after timestamp is in the past
        $patientsToDelete = Patients::where('delete_after', '<=', now())->get();

        // Delete the retrieved patients
        foreach ($patientsToDelete as $patient) {
            $patient->delete();
        }

        $this->info('Deleted ' . $patientsToDelete->count() . ' patients.');
    }
}