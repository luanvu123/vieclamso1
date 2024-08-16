<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_posting_id',
        'candidate_id',
        'cv_id',
        'application_letter',
        'status',
        'rating',
        'note',
        'hidden'  // hidden
    ];

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}

