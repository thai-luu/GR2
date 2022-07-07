<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    use HasFactory;

    public $table = 'muscles';

    public function exercise ()
    {
        return $this->belongsToMany('App\Models\Exercise','exercise_muscles', 'exercise_id', 'muscle_id');
    }
}
