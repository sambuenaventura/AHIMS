<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $primaryKey = 'request_id';

    protected $fillable = [
        'sender_id', 'receiver_id', 'procedure_type', 'sender_message', 'message', 'image', 'status',
        'date_needed', 'time_needed', // Add date_needed and time_needed fields
    ];
    protected $casts = [
        'stat' => 'boolean',
    ];

    // Define the relationship with the user who sent the request
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Define the relationship with the user who received the request
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
    public function nurse()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function medtech()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function radtech()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    

    
}
