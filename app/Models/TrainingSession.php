<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * Một buổi tập
 * @package namespace App\Models;
 */
class TrainingSession extends Model
{
    use TransformableTrait;
   
    public $table = 'training_sessions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','linkVd','exercise_id'];
    public function exerciseMode()
    {
        return $this->morphedByMany('App\Models\ExerciseMode', 'train_mode');
    }

    public function exercise()
    {
        return $this->morphedByMany('App\Models\Exercise', 'train_mode');
    }
}
