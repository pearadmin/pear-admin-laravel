<?php
namespace App\Models\Backend;

use Illuminate\Support\Arr;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\URL;

/**
 * App\Models\Backend\Permission
 *
 * @property int $id
 * @property int $_rgt
 * @property int $_lft
 * @property int|null $parent_id
 * @property string $name
 * @property string $guard_name
 * @property string $display_name
 * @property string|null $route 路由名称
 * @property string|null $icon 图标class
 * @property int $sort 排序
 * @property int $type 类型：10按钮，20菜单
 * @property int $status 状态 0禁用 10显示 20隐藏
 * @property \datetime $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|Permission[] $children
 * @property-read int|null $children_count
 * @property-read Permission|null $parent
 * @property-read string $status_label
 * @property-read string $type_class
 * @property-read string $type_name
 * @property-read \Kalnoy\Nestedset\Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Backend\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission permission($permissions)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission role($roles, $guard = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereDisplayName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereGuardName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereIcon($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereRoute($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereSort($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereStatus($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereType($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permission withoutRoot()
 * @mixin \Eloquent
 */
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
