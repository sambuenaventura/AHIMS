<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'vitals_blood_pressure',
        'vitals_respiratory_rate',
        'vitals_pulse_rate',
        'vitals_temperature',
        'vitals_weight',
        'pe_heent',
        'pe_neck',
        'pe_chest_left',
        'pe_chest_right',
        'pe_lungs',
        'pe_heart',
        'pe_abdomen',
        'pe_breast',
        'pe_extremities',
        'pe_internal_examination',
        'pe_rectal_examination',
    ];
    //protected $table = 'physical_examination'; // PLURALIZATION

    protected $primaryKey = 'physical_examination_id'; 

    public function physicalExamination() 
    {
        return $this->hasOne(PhysicalExamination::class);
    }
}
