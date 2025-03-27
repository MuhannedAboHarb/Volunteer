<?php

// app/Models/CompanyLocation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    protected $fillable = [
        'company_id', 'address_line_1', 'address_line_2', 'city', 'state', 'country', 'postal_code'
    ];

    // علاقة الـ CompanyLocation مع الـ CompanyProfile
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class);
    }
}

