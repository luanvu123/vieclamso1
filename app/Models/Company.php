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
        'featured',
        'slug', // Thêm cột slug
        'top',  // Thêm cột top
        'top-home',
        'mst'
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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_company');
    }
    public function notifications()
{
    return $this->hasMany(Notification::class);
}

}
