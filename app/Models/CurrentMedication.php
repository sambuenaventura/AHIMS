<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptedAttributes())) {
            $value = Crypt::encryptString($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptedAttributes()) && !empty($value)) {
            $value = Crypt::decryptString($value);
        }

        return $value;
    }

    protected function encryptedAttributes()
    {
        return [
            'current_medications',
            'current_dosage',
            'current_medication_image',
            'current_frequency',
            'current_prescribing_physician',
        ];
    }

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
