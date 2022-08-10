<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeTarget extends Model
{
    use HasFactory;
    public $table = 'mode_target';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = FALSE;
    protected $fillable = ['diet_id', 'mode_id', 'target_id'];
    public function diet()
    {
        return $this->belongsTo('App\Models\Diet', 'diet_id', 'id');
    }
}
