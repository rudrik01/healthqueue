<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
class Appointment extends Model
{
    //
    protected $fillable=[
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'reason',
        'token_number',
        'status',
        'consultation_fee',
        'notes',
        
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function payments(){
        return $this->hasMany(Payment::class,'appointment_id');
    }
}
