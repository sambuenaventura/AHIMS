<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nurse_id',
        'complete_history',
        'hypertension',
        'hypertension_years',
        'cvd',
        'cvd_year',
        'diabetes',
        'diabetes_years',
        'stroke',
        'stroke_year',
        'asthma',
        'asthma_years',
        'mental_neuropsychiatric_illness',
        'mental_neuropsychiatric_illness_details',
        'previous_hospitalization',
        'hospitalization_details',
        'medications',
        'medications_details',
        'allergies',
        'allergies_details',
        'others_checkbox',
        'others_details',
        'family_hypertension',
        'family_diabetes',
        'family_cancer',
        'family_asthma',
        'family_heart_disease',
        'family_others_checkbox',
        'family_others_details',
        'personal_smoker',
        'personal_alcohol_drinker',
        'personal_drug_abuse',
        'menstrual_interval',
        'menstrual_duration',
        'menstrual_dysmenorrhea',
        'obstetrical_lmp',
        'obstetrical_aog',
        'obstetrical_pmp',
        'obstetrical_edc',
        'obstetrical_prenatal_checkups',
        'obstetrical_gravida',
        'obstetrical_para',
        'obstetrical_first_pregnancy_delivered_on',
        'obstetrical_first_pregnancy_term_preterm',
        'obstetrical_first_pregnancy_girl_boy',
        'obstetrical_first_pregnancy_delivery_method',
        'obstetrical_first_pregnancy_delivery_place',
        'pediatric_term',
        'pediatric_preterm',
        'pediatric_postterm',
        'pediatric_birth_by',
        'pediatric_nsd_cs',
        'pediatric_age_of_mother_at_pregnancy',
        'pediatric_no_of_pregnancy_first',
        'pediatric_no_of_pregnancy_second',
        'pediatric_no_of_pregnancy_third',
        'pediatric_no_of_pregnancy_others',
        'pediatric_no_of_pregnancy',
        'pediatric_complications_during_pregnancy',
        'pediatric_immunizations',
        // 'mh_clinical_impression',
        // 'mh_work_up',
        // Add other boolean columns here
    ];

    protected $casts = [
        'hypertension' => 'boolean',
        'cvd' => 'boolean',
        'diabetes' => 'boolean',
        'stroke' => 'boolean',
        'asthma' => 'boolean',
        'mental_neuropsychiatric_illness' => 'boolean',
        'previous_hospitalization' => 'boolean',
        'medications' => 'boolean',
        'allergies' => 'boolean',
        'others_checkbox' => 'boolean',
        'family_hypertension' => 'boolean',
        'family_diabetes' => 'boolean',
        'family_cancer' => 'boolean',
        'family_asthma' => 'boolean',
        'family_heart_disease' => 'boolean',
        'family_others_checkbox' => 'boolean',
        'personal_smoker' => 'boolean',
        'personal_alcohol_drinker' => 'boolean',
        'personal_drug_abuse' => 'boolean',
        // Add other boolean columns here
    ];

    protected $primaryKey = 'patient_id';

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
            'complete_history',
            'others_details',
            'family_others_details',
            'menstrual_interval',
            'menstrual_duration',
            'menstrual_dysmenorrhea',
            'obstetrical_lmp',
            'obstetrical_aog',
            'obstetrical_pmp',
            'obstetrical_edc',
            'obstetrical_prenatal_checkups',
            'obstetrical_gravida',
            'obstetrical_para',
            // 'obstetrical_first_pregnancy_delivered_on',
            // 'obstetrical_first_pregnancy_term_preterm',
            // 'obstetrical_first_pregnancy_girl_boy',
            // 'obstetrical_first_pregnancy_delivery_method',
            'obstetrical_first_pregnancy_delivery_place',
            'pediatric_term',
            'pediatric_preterm',
            'pediatric_postterm',
            'pediatric_birth_by',
            'pediatric_nsd_cs',
            'pediatric_age_of_mother_at_pregnancy',
            // 'pediatric_no_of_pregnancy_first',
            // 'pediatric_no_of_pregnancy_second',
            // 'pediatric_no_of_pregnancy_third',
            // 'pediatric_no_of_pregnancy_others',
            'pediatric_no_of_pregnancy',
            'pediatric_complications_during_pregnancy',
            'pediatric_immunizations',
            // Add other attributes here that you want to encrypt
        ];
    }
    
    

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id', 'patient_id');
    }
    public function nurse_user()
    {
        return $this->belongsTo(User::class, 'nurse_id', 'id');
    }
}
