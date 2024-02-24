<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'receiver_id', 'procedure_type', 'message', 'image', 'status',
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
}
