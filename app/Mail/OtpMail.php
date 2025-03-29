<?php

// app/Mail/OtpMail.php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use SerializesModels;

    public $otpCode;

    // تمرير OTP إلى الـ Mail
    public function __construct($otpCode)
    {
        $this->otpCode = $otpCode;
    }

    public function build()
    {
        return $this->subject('Your OTP Code')
                    ->view('emails.otp')  // تحميل الـ View الخاص بالبريد الإلكتروني
                    ->with(['otpCode' => $this->otpCode]);
    }
}
