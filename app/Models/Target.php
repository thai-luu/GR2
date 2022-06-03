<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $table = 'targets';
    public function diet()
    {
        return $this->morphToMany('App\Models\Diet', 'dietable');
    }
}
