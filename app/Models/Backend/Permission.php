<?php
namespace App\Models\Backend;

use Illuminate\Support\Arr;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\URL;

class Permission extends \Spatie\Permission\Models\Permission
{

    use NodeTrait;
    protected $guarded = [];
    protected $table = 'permissions'; //表名
    protected $appends = ['parent','status_label','type_class','type_name'];
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
        return $this->attributes['type_class'] = Arr::get([10=>'info',20=>'warning',30=>'info'],$this->type);
    }

    /**
     * 状态赋值
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return $this->attributes['type_name'] = Arr::get([10=>'按钮',20=>'菜单',30=>'链接'],$this->type);
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

    /**
     * 获取父级
     * @return [type]        [description]
     */
    public function getParentAttribute()
    {
        if ($this->parent_id>0) {
            $permission = self::find($this->parent_id);
            return $permission->display_name;
        }
        return '顶级菜单';
    }

    /**
     * 批量写入权限
     * @param $data
     * @param $user
     * @param $role
     * @return bool
     *
     * @author: hongbinwang
     * @time  : 2021/9/30 11:05
     */
    public static function batchCreate($data,$user,$role)
    {
        $sort = 0;
        foreach ($data as $pem1) {
            //生成一级权限
            $p1 = Permission::create([
                'name' => $pem1['name'],
                'display_name' => $pem1['display_name'],
                'route' => $pem1['route']??'',
                'icon' => $pem1['icon']??1,
                'sort' => $sort++,
            ]);
            $role->givePermissionTo($p1);
            $user->givePermissionTo($p1);

            if (isset($pem1['children'])) {
                foreach ($pem1['children'] as $pem2) {
                    //生成二级权限
                    $p2 =$p1->children()->create([
                        'name' => $pem2['name'],
                        'display_name' => $pem2['display_name'],
                        'route' => $pem2['route']??1,
                        'icon' => $pem2['icon']??1,
                        'type' => isset($pem2['type']) ? $pem2['type'] : 20,
                        'sort' => $sort++,
                    ]);
                    //为角色添加权限
                    $role->givePermissionTo($p2);
                    //为用户添加权限
                    $user->givePermissionTo($p2);
                    if (isset($pem2['children'])) {
                        foreach ($pem2['children'] as $pem3) {
                            //生成三级权限
                            $p3 = $p2->children()->create([
                                'name' => $pem3['name'],
                                'display_name' => $pem3['display_name'],
                                'route' => $pem3['route']??'',
                                'icon' => $pem3['icon']??1,
                                'type' => isset($pem2['type']) ? $pem2['type'] : 20,
                                'sort' => $sort++,
                            ]);
                            //为角色添加权限
                            $role->givePermissionTo($p3);
                            //为用户添加权限
                            $user->givePermissionTo($p3);
                        }
                    }

                }
            }
        }
        Permission::fixTree();
        return true;
    }
}
