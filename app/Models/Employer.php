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
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'employer_id');
    }
}
