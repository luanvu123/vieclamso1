<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['name', 'status', 'count'];
    public function jobPostings()
    {
        return $this->belongsToMany(JobPosting::class, 'job_posting_salary');
    }
}
