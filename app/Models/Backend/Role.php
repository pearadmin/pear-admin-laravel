<?php
namespace App\Models\Backend;

use Illuminate\Support\Arr;

/**
 * App\Models\Backend\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string $display_name
 * @property int $sort 排序
 * @property int $type 类型 10页面角色 20数据角色
 * @property int $status 状态 0禁用 10显示 20隐藏
 * @property \datetime $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read string $status_label
 * @property-read string $type_class
 * @property-read string $type_name
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Backend\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends \Spatie\Permission\Models\Role
{
    protected $guarded = [];
    protected $table = 'roles'; //表名
    protected $appends = ['status_label','type_class','type_name'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_ed' => 'datetime:Y-m-d H:i:s'
    ];

    CONST STATUS_DISABLE = 0;  // 禁用
    CONST STATUS_DISPLAY = 10;  // 显示
    CONST STATUS_HIDDEN = 20;  // 隐藏

    /**
     * 状态赋值
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        return self::getStatusLabel($this->status);
    }

    /**
     * 状态赋值
     * @return string
     */
    public function getTypeClassAttribute()
    {
        return $this->attributes['type_class'] = Arr::get([10=>'info',20=>'warning'],$this->type);
    }

    /**
     * 状态赋值
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return $this->attributes['type_name'] = Arr::get([10=>'菜单角色',20=>'数据角色'],$this->type);
    }

    /**
     * 获取状态键值对
     * @return [type] [description]
     */
    public static function getStatus()
    {
        return [
            self::STATUS_DISPLAY => '显示',
            self::STATUS_HIDDEN  => '隐藏',
            self::STATUS_DISABLE => '禁用',
        ];
    }

    /**
     * 获取状态对应标签
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public static function getStatusLabel($value)
    {
        $label = self::getStatus();
        if (isset($label[$value])) {
            return $label[$value];
        }
        return $value;
    }

}
