<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * Giáo án tập luyện
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
    protected $fillable = ['name','description','bmi'];
    public function trainingSession()
    {
        return $this->morphToMany('App\Models\TrainingSession', 'train_mode');
    }
    public function mode(){
        return $this->belongsToMany('App\Models\mode','mode_id','id');
    }
    public function physical_conditions(){
        return $this->belongsToMany('App\Models\PhysicalConditions','physical_conditions','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
