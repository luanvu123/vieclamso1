<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'name',
        'image',
        'logo',
        'scale',
        'address',
        'map',
        'detail',
        'status',
        'url',
        'website',
        'facebook',
        'twitter',
        'linkedin',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }

    public function followers()
    {
        return $this->belongsToMany(Candidate::class, 'company_follower');
    }
}