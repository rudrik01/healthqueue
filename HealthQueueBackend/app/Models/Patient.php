<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Payment;
class Patient extends Model
{
    //
    protected $fillable=[
        'date_of_birth',
        'blood',
        'emergency_contact_name',
        'emergency_contact_number',
        'medical_history',
        
    ];
     public function  casts():array{
       return [ 
        'data_of_birth' => 'date',
        
        
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,'patient_id');
    }
     public function appointments() {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
     public function payments() {
        return $this->hasMany(Payment::class, 'patient_id');
    }
    
}
