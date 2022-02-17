<?php

namespace App\Models;

use Eloquent as Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable
{
    use TransformableTrait;
    use HasRoles;
    use SoftDeletes;
    public $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name', 'email', 'password', 'role', 'telephone', 'salt', 'algorithm'];
    public function scopeFilter($query, $input)
    {
        if (isset($input['keyword']))
            $query->where('name', 'like', '%'.$input['keyword'].'%');
       
    }
    public function physicalCondition(){
        return $this->belongsTo('App/Models/PhysicalCondition','physical_condition_id','id');
    }
}
