<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

//     //Specific(kung ano lang gusto mong ipa-fill sa new users)
//     protected $fillable = ['
//     first_name',
//     'last_name'
// ];

    //while yung $guarded is everything u can fill
    protected $guarded = [];


    use HasFactory;
}
