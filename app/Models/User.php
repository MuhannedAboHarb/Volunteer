<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'role', 'is_verified',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];

    // علاقة المستخدم مع الـ VolunteerProfile
    public function volunteerProfile()
    {
        return $this->hasOne(VolunteerProfile::class);
    }

    // علاقة المستخدم مع الـ CompanyProfile
    public function companyProfile()
    {
        return $this->hasOne(CompanyProfile::class);
    }
}
