<?php
namespace App\Models\Backend;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class Permission extends \Spatie\Permission\Models\Permission
{

    protected $appends = ['type_name'];

    public function getTypeNameAttribute()
    {
        return $this->attributes['type_name'] = Arr::get([1=>'按钮',2=>'菜单',3=>'链接'],$this->type);
    }

    //子权限
    public function childs()
    {
        return $this->hasMany('App\Models\Backend\Permission','parent_id','id')->orderBy('sort','desc');
    }

    //所有子权限递归
    public function allChilds()
    {
        return $this->childs()->with('allChilds')->orderBy('sort','desc');
    }

    /**
     * 处理权限分类
     */
    public function tree($list = [], $pk = 'id', $pid = 'parent_id', $child = '_child', $root = 0)
    {
        if (empty($list)) {
            $list = self::get()->toArray();
        }
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}
