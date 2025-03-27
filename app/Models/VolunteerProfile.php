<?php

// app/Models/VolunteerProfile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'second_name', 'third_name', 'fourth_name', 
        'national_id', 'social_status', 'gender', 'date_of_birth', 'address', 
        'phone_number', 'emergency_contact_name', 'emergency_contact_phone'
    ];

    // علاقة الـ VolunteerProfile مع الـ User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الـ VolunteerProfile مع الـ VolunteerSkill
    public function skills()
    {
        return $this->hasMany(VolunteerSkill::class);
    }

    // علاقة الـ VolunteerProfile مع الـ VolunteerEducation
    public function education()
    {
        return $this->hasMany(VolunteerEducation::class);
    }

    // علاقة الـ VolunteerProfile مع الـ VolunteerExperience
    public function experiences()
    {
        return $this->hasMany(VolunteerExperience::class);
    }

    // علاقة الـ VolunteerProfile مع الـ VolunteerAttachment
    public function attachments()
    {
        return $this->hasMany(VolunteerAttachment::class);
    }
}

