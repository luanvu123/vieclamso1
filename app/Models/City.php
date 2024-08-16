<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    // Define relationships if needed
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
     public function jobPostings()
    {
        return $this->belongsToMany(JobPosting::class, 'city_job_posting');
    }
}
