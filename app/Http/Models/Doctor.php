<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['avatar','name','summary','content','appellation','phone','password'];
    /**
     * 获取医生对应的医院
     */
    public function hospitals()
    {
        return $this->belongsTo('App\Http\Models\Hospital');
    }
    /**
     * 获取医生能治疗的疾病
     */
    public function deseases()
    {
        return $this->belongsToMany('App\Http\Models\Desease');
    }
    /**
     * 获取该医生的预约单
     */
    public function reservations(){
        return $this->hasMany('App\Http\Models\Reservation');
    }
}
