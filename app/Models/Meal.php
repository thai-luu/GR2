<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    public $table = 'meals';
    /**
     * The attributes that are mass assignable.
     * Thực đơn 1 bữa
     * @var array
     */

    protected $fillable = ['meat','vegetable','fruit','user_id','history_use', 'day_use', 'time_in_day', 'calories'];
    public $timestamps = TRUE;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function historyMeal(){
        return $this->hasOne('App\Models\HistoryMeal', 'meal_id');
    }
}
