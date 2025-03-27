<?php

// app/Models/Request.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['post_id', 'volunteer_id', 'status', 'company_decision'];

    // علاقة الـ Request مع الـ Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // علاقة الـ Request مع الـ VolunteerProfile
    public function volunteer()
    {
        return $this->belongsTo(VolunteerProfile::class);
    }
}
