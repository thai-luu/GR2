<?php

namespace App\Models;

use Eloquent as Model;
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
   
    public $table = 'exercise';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','linkVd','exercise_mode_id'];

}
