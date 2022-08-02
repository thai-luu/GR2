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
class Lesson extends Model
{
    use TransformableTrait;
   
    public $table = 'lessons';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;

    protected $fillable = ['name','desc'];

    public function trainingSession()
    {
        return $this->belongsToMany('App\Models\TrainingSession', 'lesson_training', 'lesson_id', 'training_id');
    }

    public function mode()
    {
        return $this->belongsToMany('App\Models\Mode', 'lesson_mode', 'lesson_id', 'mode_id');
    }

    public function target()
    {
        return $this->belongsToMany('App\Models\Target', 'lesson_target', 'lesson_id', 'target_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function level(){
        return $this->belongsToMany('App\Models\Level', 'lesson_level', 'lesson_id', 'level_id');
    }
}
