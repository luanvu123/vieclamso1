<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'name',
        'proficiency',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
