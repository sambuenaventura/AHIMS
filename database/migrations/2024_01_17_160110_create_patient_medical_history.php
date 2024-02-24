<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_medical_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained(); // Assuming you have a patients table

            // Complete History
            $table->string('complete_history')->nullable();

            // Past Medical History
            $table->boolean('hypertension')->default(false);
            $table->integer('hypertension_years')->nullable();
            $table->boolean('diabetes')->default(false);
            $table->integer('diabetes_years')->nullable();
            $table->boolean('asthma')->default(false);
            $table->integer('asthma_years')->nullable();
            $table->boolean('previous_hospitalization')->default(false);
            $table->boolean('allergies')->default(false);
            $table->string('allergy_details')->nullable();
            $table->boolean('cvd')->default(false);
            $table->integer('cvd_year')->nullable();
            $table->boolean('stroke')->default(false);
            $table->integer('stroke_year')->nullable();
            $table->boolean('mental_illness')->default(false);
            $table->string('mental_illness_details')->nullable();
            $table->boolean('medications')->default(false);
            $table->string('medications_details')->nullable();
            $table->boolean('other_condition')->default(false);
            $table->string('other_condition_details')->nullable();

            // Family History
            $table->boolean('family_hypertension')->default(false);
            $table->boolean('family_diabetes')->default(false);
            $table->boolean('family_cancer')->default(false);
            $table->boolean('family_asthma')->default(false);
            $table->boolean('family_heart_disease')->default(false);
            $table->string('family_other')->nullable();

            // Personal/Social History
            $table->boolean('smoker')->default(false);
            $table->boolean('alcohol_drinker')->default(false);
            $table->boolean('drug_abuse')->default(false);

            // Review of Systems
            $table->boolean('constitutional_fever')->default(false);
            $table->boolean('constitutional_anorexia')->default(false);
            $table->boolean('constitutional_weight_loss')->default(false);
            $table->boolean('constitutional_fatigue')->default(false);

            // Hematology
            $table->boolean('hematology_bruisability')->default(false);
            $table->boolean('hematology_bleeding')->default(false);

            // EENT
            $table->boolean('eent_blurring_vision')->default(false);
            $table->boolean('eent_hearing_loss')->default(false);
            $table->boolean('eent_tinnitus')->default(false);
            $table->boolean('eent_ear_discharges')->default(false);
            $table->boolean('eent_nose_bleed')->default(false);
            $table->boolean('eent_mouth_snores')->default(false);

            // CNS
            $table->boolean('cns_headache')->default(false);
            $table->boolean('cns_dizziness')->default(false);
            $table->boolean('cns_seizures')->default(false);
            $table->boolean('cns_tremors')->default(false);
            $table->boolean('cns_paralysis')->default(false);
            $table->boolean('cns_numbness_tingling')->default(false);

            // Respiratory
            $table->boolean('respiratory_dyspnea')->default(false);
            $table->boolean('respiratory_cough')->default(false);
            $table->boolean('respiratory_colds')->default(false);
            $table->boolean('respiratory_orthopnea')->default(false);
            $table->boolean('respiratory_shortness_of_breath')->default(false);
            $table->boolean('respiratory_hemoptysis')->default(false);

            // CVS
            $table->boolean('cvs_chest_pain')->default(false);
            $table->boolean('cvs_palpitations')->default(false);
            $table->boolean('cvs_swelling_lower_extremities')->default(false);

            // GIT
            $table->boolean('git_diarrhea')->default(false);
            $table->boolean('git_constipation')->default(false);
            $table->boolean('git_abdominal_pain')->default(false);
            $table->boolean('git_loss_of_appetite')->default(false);
            $table->boolean('git_change_bowel_movement')->default(false);
            $table->boolean('git_nausea')->default(false);
            $table->boolean('git_vomiting')->default(false);
            $table->boolean('git_hematochezia')->default(false);

            // Genitourinary Tract
            $table->boolean('genitourinary_dysuria')->default(false);
            $table->boolean('genitourinary_urgency')->default(false);
            $table->boolean('genitourinary_frequency')->default(false);
            $table->boolean('genitourinary_flank_pain')->default(false);
            $table->boolean('genitourinary_vaginal_discharge')->default(false);

            // Musculoskeletal
            $table->boolean('musculoskeletal_joint_pains')->default(false);
            $table->boolean('musculoskeletal_muscle_weakness')->default(false);
            $table->boolean('musculoskeletal_back_pains')->default(false);
            $table->boolean('musculoskeletal_difficulty_walking')->default(false);

            // Physical Examination - Vital Signs
            $table->string('blood_pressure')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->text('heent')->nullable();
            $table->text('neck')->nullable();
            $table->text('chest')->nullable();
            $table->text('lungs')->nullable();
            $table->text('heart')->nullable();
            $table->text('abdomen')->nullable();
            $table->text('breast')->nullable();
            $table->text('extremities')->nullable();
            $table->text('internal_examination')->nullable();
            $table->text('rectal_examination')->nullable();

            // Neurological Examination
            $table->string('gcs')->nullable();
            $table->string('cn_i')->nullable();
            $table->string('cn_ii')->nullable();
            $table->string('cn_iii_iv_vi')->nullable();
            $table->string('cn_v')->nullable();
            $table->string('cn_vii')->nullable();
            $table->string('cn_viii')->nullable();
            $table->string('cn_ix_x')->nullable();
            $table->string('cn_xi')->nullable();
            $table->string('cn_xii')->nullable();
            $table->boolean('babinski')->default(false);
            $table->text('motor_details')->nullable();
            $table->text('sensory_details')->nullable();

            // Clinical Impression
            $table->text('clinical_impression')->nullable();

            // Work Up
            $table->text('work_up')->nullable();

            // Current Medications
            $table->string('medication_name')->nullable();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('prescribing_physician')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medical_history');
    }
};
