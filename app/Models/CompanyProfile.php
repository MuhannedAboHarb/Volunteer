<?php

// app/Models/CompanyProfile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id', 'company_name', 'contact_email', 'contact_phone', 'description', 'logo_url'
    ];

    // علاقة الـ CompanyProfile مع الـ User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الـ CompanyProfile مع الـ CompanyLocation
    public function locations()
    {
        return $this->hasMany(CompanyLocation::class);
    }

    // علاقة الـ CompanyProfile مع الـ Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

