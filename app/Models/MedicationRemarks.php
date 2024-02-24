<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationRemarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'medication_date',
        'shift',
        'medication',
        'medication_dosage',
        'treatment',
        'dietary_information',  
        'remarks_notes',
        'med_nurse_user_id', // Add the med_nurse_user_id field to the fillable array
        // Add other fields as needed
    ];
    protected $primaryKey = 'medication_remark_id';

    protected $table = 'medication_remarks';

    public function nurse_user()
    {
        return $this->belongsTo(User::class, 'med_nurse_user_id');
    }
    
    // Define any relationships if necessary
    // For example, if you have a patients table, you can define a belongsTo relationship
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
}
