<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentMedication extends Model
{
    use HasFactory;


    protected $fillable = [
        'current_medications',
        'current_dosage',
        'current_medication_image',
        'current_frequency',
        'current_prescribing_physician',
        'nurse_user_id', // Add the new field
    ];

    protected $primaryKey = 'current_medications_id';

    // Define any relationships if necessary
    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id', 'patient_id');
    }

    // Define the relationship with the User model for the nurse_user_id field
    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_user_id', 'id');
    }
}
