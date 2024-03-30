<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Patients extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'patient_id';

    protected $dates = [
        'created_at',
        'archived_at',
    ];
    // protected $table = 'patients';


    use HasFactory;


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
            'contact_number',
            'address',
            'pic_contact_number',
            'ap_contact_number',
        ];
    }
    
    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class, 'patient_id', 'patient_id');
    }

    public function reviewOfSystems()
    {
        return $this->hasOne(ReviewOfSystems::class, 'patient_id', 'patient_id');
    }

    public function physicalExamination()
    {
        return $this->hasOne(PhysicalExamination::class, 'patient_id', 'patient_id');
    }

    public function neurologicalExamination()
    {
        return $this->hasOne(NeurologicalExamination::class, 'patient_id', 'patient_id');
    }

    public function currentMedication()
    {
        return $this->hasOne(CurrentMedication::class, 'patient_id', 'patient_id');
    }
    

    public function vitalSigns()
    {
        return $this->hasMany(VitalSigns::class, 'patient_id')->latest();
    }
    
    public function medicationRemarks()
    {
        return $this->hasMany(MedicationRemarks::class, 'patient_id')->latest();
    }

    public function progressNotes()
    {
        return $this->hasMany(ProgressNotes::class, 'patient_id')->latest();
    }
    public function physician()
    {
        return $this->belongsTo(Physicians::class, 'physician_id', 'physician_id');
    }

    public function obstetricalHistories()
    {
        return $this->hasMany(ObstetricalHistory::class, 'patient_id', 'patient_id');
    }

    // public function requests()
    // {
    //     return $this->hasMany(ServiceRequest::class, 'patient_id', 'patient_id');
    // }
    
    // public function nurseHistory()
    // {
    //     return $this->medicalHistory->hasOne(NurseHistory::class, 'medical_history_id', 'history_id');
    // }

    // Define the relationship with NurseHistory
    public function nurseHistories()
    {
        return $this->hasMany(NurseHistory::class, 'patient_id');
    }
}