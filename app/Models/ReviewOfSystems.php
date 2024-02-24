<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewOfSystems extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_of_systems_id';

    protected $fillable = [
        'consti_fever',
        'consti_anorexia',
        'consti_weight_loss',
        'consti_fatigue',
        'hema_easy_bruisability',
        'hema_abnormal_bleeding',
        'eent_blurring_of_vision',
        'eent_hearing_loss',
        'eent_tinnitus',
        'eent_ear_discharges',
        'eent_nose_bleed',
        'eent_mouth_snores',
        'cns_headache',
        'cns_dizziness',
        'cns_seizures',
        'cns_tremors',
        'cns_paralysis',
        'cns_numbness_or_tingling_of_sensations',
        'respi_dyspnea',
        'respi_cough',
        'respi_colds',
        'respi_orthopnea',
        'respi_shortness_of_breath',
        'respi_hemoptysis',
        'cvs_chest_pain',
        'cvs_palpitations',
        'cvs_swelling_of_lower_extremities',
        'git_diarrhea',
        'git_constipation',
        'git_abdominal_pain',
        'git_loss_of_appetite',
        'git_change_in_bowel_movement',
        'git_nausea',
        'git_vomiting',
        'git_hematochezia',
        'genittract_dysuria',
        'genittract_urgency',
        'genittract_frequency',
        'genittract_flank_pain',
        'genittract_vaginal_discharge',
        'musculo_joint_pains',
        'musculo_muscle_weakness',
        'musculo_back_pains',
        'musculo_difficulty_in_walking',
    ];

    protected $casts = [
        'consti_fever',
        'consti_anorexia',
        'consti_weight_loss',
        'consti_fatigue',
        'hema_easy_bruisability',
        'hema_abnormal_bleeding',
        'eent_blurring_of_vision',
        'eent_hearing_loss',
        'eent_tinnitus',
        'eent_ear_discharges',
        'eent_nose_bleed',
        'eent_mouth_snores',
        'cns_headache',
        'cns_dizziness',
        'cns_seizures',
        'cns_tremors',
        'cns_paralysis',
        'cns_numbness_or_tingling_of_sensations',
        'respi_dyspnea',
        'respi_cough',
        'respi_colds',
        'respi_orthopnea',
        'respi_shortness_of_breath',
        'respi_hemoptysis',
        'cvs_chest_pain',
        'cvs_palpitations',
        'cvs_swelling_of_lower_extremities',
        'git_diarrhea',
        'git_constipation',
        'git_abdominal_pain',
        'git_loss_of_appetite',
        'git_change_in_bowel_movement',
        'git_nausea',
        'git_vomiting',
        'git_hematochezia',
        'genittract_dysuria',
        'genittract_urgency',
        'genittract_frequency',
        'genittract_flank_pain',
        'genittract_vaginal_discharge',
        'musculo_joint_pains',
        'musculo_muscle_weakness',
        'musculo_back_pains',
        'musculo_difficulty_in_walking',
    ];

    public function reviewOfSystems() 
    {
        return $this->hasOne(ReviewOfSystems::class);
    }

}
