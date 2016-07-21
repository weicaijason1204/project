<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Tumor extends Model
{
    /**
     * 获取该部位的疾病
     */
    public function deseases(){
        return $this->hasMany('App\Http\Models\Desease');
    }
}
