<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User.
 * Thực phẩm
 * @package namespace App\Models;
 */
class Food extends Model 
{
    use TransformableTrait;
  
    public $table = 'foods';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = FALSE;
    protected $fillable = ['name','carb','protein','fat','cenluloza','vitaminA','vitaminB','natri','kali','classify','calo'];

}
