<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model // Mục tiêu
{
    use HasFactory;
    protected $fillable = ['name'];
    public $table = 'targets';
    public function diet()
    {
        return $this->hasMany('App\Models\Diet', 'target_id','id');
    }
    public function user()
    {
        return $this->hasMany('App\Models\User', 'target_id','id');
    }
}
