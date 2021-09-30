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
        header('content-type:application/json');
        $permissions = Permission::get()->toTree();
        $guard = Auth::guard('web')->user();
        $permissionArr = [];
        foreach ($permissions as $permission){
            $children = [];
            if ($guard->hasPermissionTo($permission->id)) {
                if ($permission->children->isNotEmpty()) {
                    $sorts = [];
                    foreach ($permission->children as $sub_permission) {
                        $children[] = array(
                            "id" => $sub_permission->id,
                            "sort" => $sub_permission->sort,
                            "title" => $sub_permission->display_name,
                            "icon" => 'layui-icon ' . ($sub_permission->icon ?? 'layui-icon-face-cry'),
                            "type" => 1,
                            "openType" => ($sub_permission->type == 30 ? "_blank" : "_iframe"),
                            "href" => ($sub_permission->type == 30 ? $sub_permission->link : route($sub_permission->route))
                        );
                        $sorts[] = $sub_permission->sort;
                    }
                    array_multisort($sorts, SORT_DESC, $children);
                }
                $permissionArr[] = array(
                    "id" => $permission->id,
                    "title" => $permission->display_name,
                    "type" => ($permission->route != '' ? 1 : 0),
                    "icon" => 'layui-icon ' . ($permission->icon ?? 'layui-icon-face-cry'),
                    "openType" => ($permission->route != '' ? "_iframe" : ""),
                    "href" => ($permission->route != '' ? route($permission->route) : ''),
                    "children" => $children
                );
            }
        }

        return Response::json($permissionArr);
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
