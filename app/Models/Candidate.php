<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number_candidate',
        'fullname_candidate',
        'avatar_candidate',
        'status',
        'cv_path',
        'gender',
        'address',
        'skill',
        'position',
        'is_public',
        'cv_public',
        'linkedin',
        'story',
        'letter_path',
        'cover_image',
        'dob',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function followedCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_follower');
    }
    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }

    public function advisers()
    {
        return $this->hasMany(Adviser::class);
    }
    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
