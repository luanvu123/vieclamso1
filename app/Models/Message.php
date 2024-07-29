<?php

// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'candidate_id',
        'employer_id',
        'message',
        'sender_type',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
