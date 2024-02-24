<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedPatients extends Model
{
    use HasFactory;

    protected $primaryKey = 'patient_id'; // Make sure this matches your table structure

    protected $table = 'archived_patients';
    

    protected $fillable = [
        'patient_id', // This should be added if it's part of the fillable fields
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'contact_number',
        'address',
        'pic_first_name',
        'pic_last_name',
        'pic_relation',
        'pic_contact_number',
        'ap_first_name',
        'ap_last_name',
        'ap_contact_number',
        'room_number',
        'specialist',
        'discharge_date',
        'admission_type',
        // Add other fields as needed
    ];
}
