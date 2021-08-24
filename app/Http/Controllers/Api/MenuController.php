<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Backend\User;
use App\Models\Backend\Role;
use App\Models\Backend\Permission;
use Illuminate\Support\Facades\URL;

class MenuController extends Controller
{
    //后台用户菜单
    public function menu()
    {
        $menuData = [];
        $menus = Permission::with(['childs'])->where('parent_id',0)->orderBy('sort','desc')->get();
        foreach ($menus as $menu){
            $data = array(
                "id" => $menu['id'],
                "title" => $menu['display_name'],
                "type" => 0,
                "icon" => "layui-icon {$menu['icon']}",
                "href" => ""
            );
            if (!empty($menu['childs'])) {
                $sunMenus = [];
                foreach($menu['childs'] as $submenu){
                    $sunMenus[] = array(
                        "id" => $submenu['id'],
                        "title" => $submenu['display_name'],
                        "icon" => "layui-icon {$submenu['icon']}",
                        "type" => 1,
                        "openType" => "_iframe",
                        "href" => URL::route($submenu['route'])
                    );
                }
                $data['children'] = $sunMenus;
            }
            $menuData[] = $data;
        }
        return Response::json($menuData);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
