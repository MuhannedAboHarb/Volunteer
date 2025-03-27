<?php

// app/Models/VolunteerSkill.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerSkill extends Model
{
    protected $fillable = ['volunteer_id', 'skill_name', 'proficiency_level'];

    // علاقة الـ VolunteerSkill مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }
}

