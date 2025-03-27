<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'company_id', 'title', 'description', 'location', 'start_date', 'end_date'
    ];

    // علاقة الـ Post مع الـ CompanyProfile
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class);
    }

    // علاقة الـ Post مع الـ PostRequiredSkill
    public function requiredSkills()
    {
        return $this->hasMany(PostRequiredSkill::class);
    }

    // علاقة الـ Post مع الـ PostLearningOpportunity
    public function learningOpportunities()
    {
        return $this->hasMany(PostLearningOpportunity::class);
    }

    // علاقة الـ Post مع الـ Request
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}

