<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailReplyEmployer extends Model
{
    use HasFactory;

    protected $table = 'email_reply_employers';

    protected $fillable = [
        'employer_id',
        'user_id',
        'to',
        'subject',
        'message',
        'attachment',
    ];

    /**
     * Mối quan hệ với Employer.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Mối quan hệ với User (người gửi email).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
