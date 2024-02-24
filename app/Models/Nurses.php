<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nurses extends Authenticatable
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
