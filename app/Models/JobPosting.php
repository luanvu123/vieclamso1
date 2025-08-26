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
        'city',
        'isHot',
        'service_type'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'job_posting_order')
                    ->withPivot('order_detail_id')
                    ->withTimestamps();
    }

    // Add a relationship to access order details directly
    public function orderDetails()
    {
        return $this->belongsToMany(OrderDetail::class, 'job_posting_order', 'job_posting_id', 'order_detail_id');
    }

    // Add a method to get the service type of the job posting
 

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

    public function jobReports()
    {
        return $this->hasMany(JobReport::class);
    }
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_job_posting');
    }
    public function salaries()
    {
        return $this->belongsToMany(Salary::class, 'job_posting_salary');
    }
}
