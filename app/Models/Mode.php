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
 *
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
    public function dietMode(){
        return $this->hasMany('Apps/Models/DietMode','mode_id','id');
    }
}
