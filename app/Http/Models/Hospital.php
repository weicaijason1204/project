<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name','grading'];
    /**
     * 获取医院所在的城市
     */
    public function city()
    {
        return $this->belongsTo('App\Http\Models\City');
    }

    /**
     * 获取医院的医生
     */
    public function doctors(){
        return $this->hasMany('App\Http\Models\Doctor');
    }
}
