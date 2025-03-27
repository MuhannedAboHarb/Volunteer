<?php

// app/Models/VolunteerHistory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerHistory extends Model
{
    protected $fillable = [
        'volunteer_id', 'post_id', 'company_id', 'title', 'location', 'start_date', 'end_date', 'status', 'feedback', 'rating'
    ];

    // علاقة الـ VolunteerHistory مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }

    // علاقة الـ VolunteerHistory مع الـ Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // علاقة الـ VolunteerHistory مع الـ CompanyProfile
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class);
    }
}

