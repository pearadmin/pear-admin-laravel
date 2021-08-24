<?php

use App\Models\Backend\Tag;
use App\Models\Backend\Role;
use App\Models\Backend\Config;
use App\Models\Backend\Category;
use App\Models\Backend\ConfigGroup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Permission;

class InitializeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空表
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('config_group')->truncate();
        DB::table('configs')->truncate();
        DB::table('categories')->truncate();
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $base_path = public_path('static/insert/');
        $user_data_file_name = $base_path.'users.json';
        $role_data_file_name = $base_path.'roles.json';
        $permission_data_file_name = $base_path.'permissions.json';
        $config_data_file_name = $base_path.'configure.json';
        $category_data_file_name = $base_path.'categories.json';
        $tag_data_file_name = $base_path.'tags.json';

        //用户
        $user = User::create(self::file_to_arr($user_data_file_name));

        //角色
        $role = Role::create(self::file_to_arr($role_data_file_name));

        //权限
        $permissions = self::file_to_arr($permission_data_file_name);
        foreach ($permissions as $pem1) {
            //生成一级权限
            $p1 = Permission::create([
                'name' => $pem1['name'],
                'display_name' => $pem1['display_name'],
                'route' => $pem1['route']??'',
                'icon' => $pem1['icon']??1,
            ]);
            //为角色添加权限
            $role->givePermissionTo($p1);
            //为用户添加权限
            $user->givePermissionTo($p1);
            if (isset($pem1['child'])) {
                foreach ($pem1['child'] as $pem2) {
                    //生成二级权限
                    $p2 = Permission::create([
                        'name' => $pem2['name'],
                        'display_name' => $pem2['display_name'],
                        'parent_id' => $p1->id,
                        'route' => $pem2['route']??1,
                        'icon' => $pem2['icon']??1,
                        'type' => isset($pem2['type']) ? $pem2['type'] : 2,
                    ]);
                    //为角色添加权限
                    $role->givePermissionTo($p2);
                    //为用户添加权限
                    $user->givePermissionTo($p2);
                    if (isset($pem2['child'])) {
                        foreach ($pem2['child'] as $pem3) {
                            //生成三级权限
                            $p3 = Permission::create([
                                'name' => $pem3['name'],
                                'display_name' => $pem3['display_name'],
                                'parent_id' => $p2->id,
                                'route' => $pem3['route']??'',
                                'icon' => $pem3['icon']??1,
                                'type' => isset($pem2['type']) ? $pem2['type'] : 2,
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

        //为用户添加角色
        $user->assignRole($role);

        //配置组
        $configs =  self::file_to_arr($config_data_file_name);
        foreach ($configs as $group) {
            //生成配置组
            $config_group = ConfigGroup::create([
                'name' => $group['name'],
                'local' => $group['local'],
                'sort' => $group['sort'],
            ]);
            if (isset($group['config']) && count($group['config'])>0) {
                foreach ($group['config'] as $conf) {
                    //生成配置
                    $p2 = Config::create([
                        'label' => $conf['label'],
                        'key' => $conf['key'],
                        'val' => $conf['val'],
                        'type' => $conf['type'],
                        'content' => $conf['content'],
                        'tips' => $conf['tips'],
                        'sort' => $conf['sort'],
                        'group_id' => $config_group->id
                    ]);
                }
            }
        }

        //分类
        $categories =  self::file_to_arr($category_data_file_name);
        foreach ($categories as $category) {
            //生成分类
            $p_cate = Category::create([
                'name' => $category['name'],
                'sort' => $category['sort'],
                'type' => $category['type'],
            ]);
            if (isset($category['childs']) && count($category['childs'])>0) {
                foreach ($category['childs'] as $cate) {
                    //生成分类
                    $p_cate_1 = Category::create([
                        'name' => $category['name'],
                        'sort' => $category['sort'],
                        'type' => $category['type'],
                        'parent_id' => $p_cate->id
                    ]);
                }
            }
        }

        //分类
        $tags =  self::file_to_arr($tag_data_file_name);
        foreach ($tags as $tag) {
            //生成分类
            $p_cate = Tag::create([
                'name' => $tag['name'],
                'sort' => $tag['sort'],
                'type' => $tag['type'],
            ]);
        }
    }

    /**
     * @param $filename
     * @return array|mixed
     *
     * @author: hongbinwang
     * @time  : 2021/8/9 17:59
     */
    protected static function file_to_arr($filename){
        $contents = file_get_contents($filename);
        if (strlen($contents)>0){
            return json_decode($contents,true);
        }
        return [];
    }
}
