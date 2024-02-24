<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'vital_date',
        'vital_time',
        'temperature',
        'heart_rate',
        'pulse',
        'blood_pressure',
        'respiratory_rate',
        'oxygen',
        'nurse_user_id', // Add the nurse_user_id field to the fillable array
        // Add other fields as needed
    ];

    protected $primaryKey = 'vital_signs_id';

    // Define the nurse_user relationship
    public function nurse_user()
    {
        return $this->belongsTo(User::class, 'nurse_user_id');
    }

    // Define any other relationships if necessary
    // For example, if you have a patients table, you can define a belongsTo relationship
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

    // Method to associate nurse user with vital sign entry
    public function associateNurse($userId)
    {
        $this->nurse_user_id = $userId;
        $this->save();
    }

}
