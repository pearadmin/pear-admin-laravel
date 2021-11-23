<?php

namespace Database\Seeders;

use App\Repositories\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'title' => '工作空间',
                'icon' => 'layui-icon layui-icon-console',
                'type' => 0,
                'href' => '',
                'children' => [
                    [
                        "title" => "控制后台",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "console",
                    ],
                ],
            ],
            [
                "title" => "组织架构",
                "icon" => "layui-icon layui-icon-user",
                "type" => 0,
                "href" => "",
                "children" => [
                    [
                        "title" => "权限管理",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "org/permission/index",
                    ],
                    [
                        "title" => "角色管理",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "org/role/index",
                    ],
                    [
                        "title" => "用户管理",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "org/user/index",
                    ],
                ],
            ],
            [
                "title" => "系统管理",
                "icon" => "layui-icon layui-icon-set-fill",
                "type" => 0,
                "href" => "",
                "children" => [
                    [
                        "title" => "菜单管理",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "system/menu/index",
                    ],
                    [
                        "title" => "日志管理",
                        "icon" => "",
                        "type" => 1,
                        "open_type" => "_iframe",
                        "href" => "system/log/index",
                    ],
                ],
            ],
        ];

        Menu::truncate();
        foreach ($menus as $menu) {
            $children = $menu['children'] ?? [];
            unset($menu['children']);

            $menu['creator_id'] = 1;
            $menu['updater_id'] = 1;
            $item = Menu::firstOrCreate($menu);

            foreach ($children as $child) {
                $child['creator_id'] = 1;
                $child['updater_id'] = 1;
                $child['p_id'] = $item['id'];
                Menu::firstOrCreate($child);
            }
        }
    }
}
