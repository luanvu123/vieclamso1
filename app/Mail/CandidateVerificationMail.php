<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CandidateVerificationMail extends Mailable
{
    public $candidate;

    public function __construct($candidate)
    {
        $this->candidate = $candidate;
    }

    public function build()
    {
        return $this->subject('Xác thực tài khoản')
            ->view('admin.candidates.candidate_verification')
            ->with([
                'verificationLink' => route('candidate.verify', ['token' => $this->candidate->verification_token]),
            ]);
    }
}
