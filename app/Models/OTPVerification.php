<?php

// app/Models/OtpVerification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    protected $fillable = ['user_id', 'otp_code', 'expires_at', 'is_used'];

    // علاقة الـ OtpVerification مع الـ User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
