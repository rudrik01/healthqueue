<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Appointment;

class Payment extends Model
{
    //
    protected $fillable = [
        'amount',
        'patient_id',
        'appointment_id'

    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function  casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
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
     * Get the appointment associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
