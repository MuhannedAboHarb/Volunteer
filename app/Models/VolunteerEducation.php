<?php

// app/Models/VolunteerEducation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerEducation extends Model
{
    protected $fillable = [
        'volunteer_id', 'institution_name', 'degree', 'field_of_study', 
        'start_year', 'end_year'
    ];

    // علاقة الـ VolunteerEducation مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }
}

