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
    protected $fillable = ['name','protein','cenluloza','carb','fat','mode_id'];
    public function mode()
    {
        return $this->morphedByMany('App\Mode', 'dietable');
    }

    public function target()
    {
        return $this->morphedByMany('App\Target', 'taggdietableable');
    }

}
