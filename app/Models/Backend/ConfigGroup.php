<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\ConfigGroup
 *
 * @property int $id
 * @property string $name 名称
 * @property int $sort 排序
 * @property string|null $local 配置生效位置
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Backend\Config[] $configs
 * @property-read int|null $configs_count
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
