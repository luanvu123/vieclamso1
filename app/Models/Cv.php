<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'cv_path','cv_name',];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
