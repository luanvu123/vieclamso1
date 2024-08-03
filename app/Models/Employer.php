<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class Employer extends Authenticatable implements CanResetPassword
{
     use HasFactory, Notifiable;

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
    public function activeJobPostingsCount()
    {
        return $this->jobPostings()->where('status', 0)->count();
    }

      public function totalJobViews()
    {
        return $this->jobPostings()->sum('views');
    }

     public function totalApplications()
    {
        return $this->jobPostings()->withCount('applications')->get()->sum('applications_count');
    }
     public function totalMessages()
    {
        return $this->messages()->count();
    }
}
