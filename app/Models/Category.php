<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','image','status','slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function jobPostings()
    {
        return $this->belongsToMany(JobPosting::class, 'category_job_posting');
    }
     public function jobPostingsCount()
    {
        return $this->jobPostings()->count();
    }
}
