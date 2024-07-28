<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'email',
        'title',
        'type',
        'category',
        'location',
        'tags',
        'description',
        'application_email_url',
        'closing_date',
        'salary',
        'place',
        'experience',
        'rank',
        'number_of_recruits',
        'sex',
        'status',
        'skills_required',
        'area',
        'slug',
        'status',
        'city'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_job_posting');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
