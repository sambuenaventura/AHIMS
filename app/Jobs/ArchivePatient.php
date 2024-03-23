<?php

namespace App\Jobs;

use App\Models\Patients;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ArchivePatient implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $patient;

    /**
     * Create a new job instance.
     *
     * @param Patients $patient
     */
    public function __construct(Patients $patient)
    {
        $this->patient = $patient;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Update the patient's admission_type to 'archived', set the archived_at timestamp, and clear the room_number
        $this->patient->update([
            'admission_type' => 'archived',
            'archived_at' => now(),
            'room_number' => 'ARCHIVED',
            'delete_after' => now()->addYears(6), // Schedule deletion after 6 years
        ]);
    }
}
