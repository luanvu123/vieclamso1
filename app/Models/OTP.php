<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{

    use HasFactory;
     protected $table = 'otps';

    protected $fillable = ['employer_id', 'otp_code', 'expires_at'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
