<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ConfigGroup extends Model
{
    protected $table = 'config_group';
    protected $fillable = ['name','sort'];

    //配置项
    public function configs()
    {
        return $this->hasMany('App\Models\Backend\Config','group_id','id');
    }
}
