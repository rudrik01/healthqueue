<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;

class Appointment extends Model
{
    //
    protected $fillable = [
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
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
            'appointment_time' => 'datetime:H:i',
            'token' => 'number',
            'consultation_fee' => 'decimal:2',
            'password' => 'hashed',
        ];
    }
    /**
     * Get the doctor associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    /**
     * Get the patient associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    /**
     * Get the payments associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'appointment_id');
    }
}
