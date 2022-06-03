<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Meal.
 * Lịch sử bữa ăn của user 
 * @package namespace App\Models;
 */
class HistoryMeal extends Model 
{
    use TransformableTrait;
   
    public $table = 'history_meals';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['food','vegetable','fruit','diet_mode_id'];

}
