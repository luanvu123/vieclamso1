<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailReplyCandidate extends Model
{
    use HasFactory;

    protected $table = 'email_reply_candidates';

    protected $fillable = [
        'candidate_id',
        'user_id',
        'to',
        'subject',
        'message',
        'attachment',
    ];

    /**
     * Mối quan hệ với Candidate.
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Mối quan hệ với User (người gửi email).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
