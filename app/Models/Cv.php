<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'cv_path','cv_name',];

  public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_cv')
                    ->withPivot('is_primary', 'is_active')
                    ->withTimestamps();
    }
}
