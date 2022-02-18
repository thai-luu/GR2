<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * Chế độ ăn
 * @package namespace App\Models;
 */
class DietMode extends Model
{
    use TransformableTrait;
   
    public $table = 'diet_modes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','protein','cenluloza','carb','fat','mode_id'];
    public function mode(){
        return $this->belongsTo('App\Models\Mode','mode_id','id');
    }
}
