<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physicians extends Model
{
    use HasFactory;

    protected $table = 'physicians'; // Assuming your table name is 'physicians'
    protected $primaryKey = 'physician_id';

    protected $fillable = [
        'phy_first_name', 
        'phy_last_name', 
        'specialty', 
        'availability', 
        'phy_contact_number' // Add the 'phone_number' field to the fillable array
    ];
    
    // Define any relationships here, such as a hasMany relationship with the Patients model
    public function patients()
    {
        return $this->hasMany(Patients::class, 'physician_id'); // Assuming the foreign key is 'physician_id'
    }
    
    
}
