<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Diet.
 * Chế độ ăn 
 * @package namespace App\Models;
 */
class Diet extends Model 
{
    use TransformableTrait;
   
    public $table = 'diets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name','protein','cenluloza','carb','fat','mode_id','user_id','target_id', 'range'];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'user_id','id');
    // }
    public function modeTarget()
    {
        return $this->hasMany('App\Models\ModeTarget', 'diet_id', 'id');
    }

}
