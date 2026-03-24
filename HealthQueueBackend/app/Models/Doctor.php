<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;
class Doctor extends Model
{
    //
    protected $fillable=[
        'specialization',
        'qualification',
        'status',
        'experience',
        'consultation_fee',
        'available_days',
        'room_number',
        'start_time',
        'end_time',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function  casts():array{
       return [ 
        'experience' => 'integer',
        'consultation_fee' => 'decimal:2',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function appointments() {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}
