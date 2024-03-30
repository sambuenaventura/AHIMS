<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseHistory extends Model
{
    protected $fillable = ['nurse_id', 'medical_history_id', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id'); // Corrected the model name and added the foreign key
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class, 'medical_history_id'); // Assuming this is correct
    }
}