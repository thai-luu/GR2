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
class Exercise extends Model
{
    use TransformableTrait;
   
    public $table = 'exercises';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','time','note','calories','linkVd'];
    public function partmini(){
        return $this->belongsToMany('App\Models\PartMini','id','id');
    }
    public function trainingSession()
    {
        return $this->morphToMany('App\Models\TrainingSession', 'train_mode');
    } 
}
