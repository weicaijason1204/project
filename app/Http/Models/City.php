<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * 获取城市的医院
     */

    public function hospitals()
    {
        return $this->hasMany('App\Http\Models\Hospital');
    }
}
