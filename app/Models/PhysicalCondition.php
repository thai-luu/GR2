<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class PhysicalCondition extends Model
{
    use TransformableTrait;
   
    public $table = 'physical_conditions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    public function user(){
        return $this->hasMany('App\Models\User','physical_condition_id','id');
    }
    public function exerciseMode(){
        return $this->hasMany('App\Models\ExerciseMode','exercise_mode_id','id');
    }
    public function dietMode(){
        return $this->hasMany('App\Models\DietMode','diet_mode_id','id');
    }

}
