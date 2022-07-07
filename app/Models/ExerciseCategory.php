<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    use HasFactory;

    public $table = 'exercise_categories';
    
    public function exercise() 
    {
        return $this->hasMany('App\Models\Exercise','exercise_categories_id','id');
    }
}
