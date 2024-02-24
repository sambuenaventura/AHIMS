<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObstetricalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'pregnancy_number',
        'obstetrical_pregnancy_delivered_on',
        'obstetrical_pregnancy_term_preterm',
        'obstetrical_pregnancy_girl_boy',
        'obstetrical_pregnancy_delivery_method',
        'obstetrical_pregnancy_delivery_place',
    ];
    protected $primaryKey = 'obstetrical_history_id';
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id', 'patient_id');
    }
}