<?php

// app/Models/Employer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'status',
        'avatar'
    ];

    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }
}

