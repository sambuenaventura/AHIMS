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
        // Add other fields as needed
    ];
    protected $primaryKey = 'vital_signs_id';

    // Define any relationships if necessary
    // For example, if you have a patients table, you can define a belongsTo relationship
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

}
