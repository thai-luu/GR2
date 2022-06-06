<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    use HasFactory;
    public $table = 'classifies';
    public function food()
    {
        return $this->hasMany('App\Models\Food', 'classify_id','id');
    }
}
