<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Appointment;
class Payment extends Model
{
    //
    protected $fillable=[
        'amount',
        'patient_id',
        'appointment_id'

    ];
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id');
    }
}
