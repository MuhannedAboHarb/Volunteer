<?php

// app/Models/VolunteerExperience.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerExperience extends Model
{
    protected $fillable = [
        'volunteer_id', 'company_name', 'position', 'description', 'start_date', 'end_date'
    ];

    // علاقة الـ VolunteerExperience مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }
}
