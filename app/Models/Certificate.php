<?php
// app/Models/Certificate.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'name',
        'issuer',
        'issue_date',
        'expiry_date',
     
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
