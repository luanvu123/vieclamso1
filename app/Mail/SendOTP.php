<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTP extends Mailable
{
    use Queueable, SerializesModels;

    public $otp_code;

    public function __construct($otp_code)
    {
        $this->otp_code = $otp_code;
    }

    public function build()
    {
        return $this->view('admin.about.send_otp')
                    ->subject('Mã OTP xác thực')
                    ->with('otp_code', $this->otp_code);
    }
}
