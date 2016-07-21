<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name','phone','password','wechat','appellation','imgs','describe','age',
                                'gender','smoking','city','discovery_time','situation','earnest_money','report'
                            ];
    /**
     * 获取医生对应的预约单
     */
    public function doctors()
    {
        return $this->belongsTo('App\Http\Models\Doctor');
    }
}
