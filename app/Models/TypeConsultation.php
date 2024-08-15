<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConsultation extends Model
{
    use HasFactory;
  protected $table = 'type_consultings';
    protected $fillable = ['name', 'status'];

    // Define relationships if needed
   public function consultations()
    {
        return $this->hasMany(Consultation::class, 'type_consulting_id');
    }

}
