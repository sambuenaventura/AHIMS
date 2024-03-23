<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class NeurologicalExamination extends Model
{
    use HasFactory;

    protected $primaryKey = 'neurological_examination_id';

    protected $fillable = [
        'neuro_gcs',
        'neuro_cn_i',
        'neuro_cn_ii',
        'neuro_cn_iii_iv_vi',
        'neuro_cn_v',
        'neuro_cn_vii',
        'neuro_cn_viii',
        'neuro_cn_ix_x',
        'neuro_cn_xi',
        'neuro_cn_xii',
        'neuro_babinski',
        'neuro_motor',
        'neuro_sensory',
        'clinical_impression',
        'work_up',
    ];

    protected $casts = [
        'neuro_babinski' => 'boolean',
    ];

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
            'neuro_gcs',
            'neuro_cn_i',
            'neuro_cn_ii',
            'neuro_cn_iii_iv_vi',
            'neuro_cn_v',
            'neuro_cn_vii',
            'neuro_cn_viii',
            'neuro_cn_ix_x',
            'neuro_cn_xi',
            'neuro_cn_xii',
            'neuro_motor',
            'neuro_sensory',
            'clinical_impression',
            'work_up',
        ];
    }
}
