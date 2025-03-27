<?php

// app/Models/VolunteerAttachment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerAttachment extends Model
{
    protected $fillable = ['volunteer_id', 'file_name', 'file_url', 'file_type'];

    // علاقة الـ VolunteerAttachment مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }
}

