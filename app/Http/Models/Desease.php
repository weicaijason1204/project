<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Desease extends Model
{
    protected $fillable = ['name'];

    /**
     * 获取疾病对应的部位
     */
    public function tumors()
    {
        return $this->belongsTo('App\Http\Models\Tumor');
    }

    /**
     * 获取疾病对应的医生
     */
    public function doctors()
    {
        return $this->belongsToMany('App\Http\Models\Doctor');
    }
}
