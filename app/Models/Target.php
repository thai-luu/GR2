<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model // Mục tiêu
{
    use HasFactory;
    protected $fillable = ['name'];
    public $table = 'targets';

    public function user()
    {
        return $this->hasMany('App\Models\User', 'target_id','id');
    }

    public function lesson()
    {
        return $this->belongsToMany('App\Models\Lesson', 'lesson_target', 'target_id', 'lesson_id');
    }

    public function mode()
    {
        return $this->belongsToMany('App\Models\Mode', 'mode_target', 'target_id', 'mode_id');
    }

    public function modeTarget()
    {
        return $this->hasMany('App\Models\ModeTarget', 'target_id', 'id');
    }
}
