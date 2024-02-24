<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedMedicationRemarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'medication_date',
        'shift',
        'medication',
        'medication_dosage',
        'treatment',
        'dietary_information',
        'remarks_notes',
        'med_nurse_user_id',
    ];
}
