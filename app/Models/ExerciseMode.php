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
class ExerciseMode extends Model
{
    use TransformableTrait;
   
    public $table = 'exercise_modes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','description'];
    public function trainingSession()
    {
        return $this->morphToMany('App\Models\TrainingSession', 'train_mode');
    } 
}
