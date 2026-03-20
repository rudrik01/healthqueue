<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Role;
class User extends Authenticatable
{

    protected $fillable = [
        'name',
        'email',
        'contact',
        'gender',
        'role_id',
        'password',
        
        

    ];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function doctor(){
        return $this->hasOne(Doctor::class,'doctor_id');
    }
       public function patient(){
        return $this->hasOne(Patient::class,'patient_id');
    }
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
}
