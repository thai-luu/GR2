<?php

namespace App\Models;

use Eloquent as Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
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
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = TRUE;
    protected $fillable = ['name', 'email', 'password', 'role', 'sex', 'salt', 'algorithm','weight','height','mode_id','target_id', 'age', 'level_id', 'wrist', 'physical_id'];
    public function scopeFilter($query, $input)
    {
        if (isset($input['keyword']))
            $query->where('name', 'like', '%'.$input['keyword'].'%');
       
    }
    public function physicalCondition(){
        return $this->belongsTo(PhysicalCondition::class,'physical_condition_id','id');
    }
    public function exerciseMode(){
        return $this->hasOne(ExerciseMode::class,'user_id','id');
    }
    public function diet(){
        return $this->hasMany(Diet::class,'user_id','id');
    }
    public function meal(){
        return $this->hasMany(Meal::class,'user_id','id');
    }
    public function mode(){
        return $this->belongsTo(Mode::class,'mode_id','id');
    }
    public function target(){
        return $this->belongsTo(Target::class,'target_id','id');
    }

    public function level(){
        return $this->belongsTo(Level::class,'level_id','id');
    }

    public function food(){
        return $this->hasMany(Food::class, 'user_id', 'id');
    }
}
