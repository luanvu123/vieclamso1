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
        'avatar',
        'business_license',
        'commission',
        'identification_card',
        'top_point',
        'type_employer_id',
        'credit',
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
 public function slides()
    {
        return $this->hasMany(Slide::class);
    }
     public function totalApplications()
    {
        return $this->jobPostings()->withCount('applications')->get()->sum('applications_count');
    }
     public function totalMessages()
    {
        return $this->messages()->count();
    }
     public function typeEmployer()
    {
        return $this->belongsTo(TypeEmployer::class, 'type_employer_id');
    }
     public function updateTypeEmployer()
    {
        // Fetch all TypeEmployers ordered by top_point descending
        $typeEmployers = TypeEmployer::where('status', 'active')
            ->orderBy('top_point', 'desc')
            ->get();

        // Iterate through the TypeEmployers to find the first one where top_point is less than or equal to the employer's top_point
        foreach ($typeEmployers as $typeEmployer) {
            if ($this->top_point >= $typeEmployer->top_point) {
                // Update the type_employer_id of the employer
                $this->type_employer_id = $typeEmployer->id;
                $this->save();
                break;
            }
        }
    }
}
