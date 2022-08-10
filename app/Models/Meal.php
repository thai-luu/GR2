<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    public $table = 'diaries';
    /**
     * The attributes that are mass assignable.
     * Thực đơn 1 bữa
     * @var array
     */

    protected $fillable = ['breakfast','lunch','dinner','user_id','snacks', 'day_use', 'time_in_day', 'calories', 'training', 'user_id'];
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function historyMeal(){
        return $this->hasOne('App\Models\HistoryMeal', 'meal_id');
    }
}
