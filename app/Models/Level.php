<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * Bữa ăn
 * @package namespace App\Models;
 */
class Level extends Model 
{
    use TransformableTrait;
   
    public $table = 'levels';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    public function exercise(){
        return $this->hasMany('App\Models\Exercise');
    }

    public function user(){
        return $this->hasMany('App\Models\User', 'level_id', 'id');
    }

    public function lesson(){
        return $this->belongsToMany('App\Models\Lesson','lesson_level', 'level_id', 'lesson_id');
    }

}
