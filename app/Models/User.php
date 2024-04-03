<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'name',
        'first_name',
        'last_name',
        'email',
        'student_number',
        'password',
        'pin',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasRole($role)
    {
         return $this->role === $role;
    }
    // public function assignRole($role)
    // {
    //     $this->update(['role' => $role]);
    // }

        
    // Define the relationship with requests sent by this user
    public function sentRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'sender_id');
    }

    // Define the relationship with requests received by this user
    public function receivedRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'receiver_id');
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class, 'patient_id', 'patient_id');
    }
    // public function notifications()
    // {
    //     return $this->hasMany(Notification::class);
    // }
}
