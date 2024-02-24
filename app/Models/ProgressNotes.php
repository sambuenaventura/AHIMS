<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressNotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'progress_date',
        'shift',
        'focus',
        'prog_notes',
        'prog_nurse_user_id',
        // Add other fields as needed
    ];
    protected $primaryKey = 'progress_note_id';

    protected $table = 'progress_notes';

    public function nurse_user()
    {
        return $this->belongsTo(User::class, 'prog_nurse_user_id');
    }
    
    // Define any relationships if necessary
    // For example, if you have a patients table, you can define a belongsTo relationship
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
}
