<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalHistory extends Model
{
    use HasFactory;

    protected $table = 'patient_medical_history';

    protected $fillable = [
        'complete_history',
        // Add other fields as needed
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
