<?php

// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'candidate_id',
        'employer_id',
        'company_id',
        'message',
        'sender_type',
        'is_read',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
     public function company()
    {
        return $this->belongsTo(Company::class);
    }
     public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }
}
