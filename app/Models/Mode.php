<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Mode.
 * Tạng người
 * @package namespace App\Models;
 */
class Mode extends Model 
{
    use TransformableTrait;
   
    public $table = 'modes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name'];
    public function user(){
        return $this->hasMany('Apps\Models\User','mode_id','id');
    }
    public function physicalCondition(){
        return $this->hasMany('Apps\Models\PhysicalCondition','mode_id','id');
    }
    public function exerciseMode(){
        return $this->hasMany('Apps\Models\ExerciseMode','mode_id','id');
    }
    public function diet()
    {
        return $this->morphToMany('App\Models\Diet', 'dietable');
    }
}
