<?php
namespace App\Models\Backend;

use Illuminate\Support\Arr;

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
