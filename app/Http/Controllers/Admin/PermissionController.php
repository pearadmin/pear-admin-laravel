<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Models\Backend\PermissionGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Backend\Permission;

class PermissionController extends Controller
{
    /**
     * 权限列表
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.permission.index');
    }

    /**
     * 权限数据表格
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        $permissions = Permission::all();
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => $permissions->count(),
            'data' => $permissions
        ];
        return Response::json($data);
    }

    /**
     * 权限数据表格
     * @return \Illuminate\Http\JsonResponse
     */
    public function dtree()
    {
        $permissions = Permission::with(['childs'])->where('parent_id',0)->orderBy('sort','desc')->get();
        $data[] = array("id" => 0, "title" => '顶级权限', "parentId" => 0);
        foreach ($permissions as $permission){
            $children = [];
            if($permission->childs->isNotEmpty()){
                foreach ($permission->childs as $subPermission){
                    $children[] = array(
                        "id" => $subPermission->id,
                        "title" => $subPermission->display_name,
                        "last" => true,
                        "parentId" => $subPermission->parent_id
                    );
                }
            }
            $data[] = array(
                "id" => $permission->id,
                "title" => $permission->display_name,
                "parentId" => $permission->parent_id,
                "children" => $children
            );
        }
        $datas = array(
            "status" => [
                "code" => 200,
                "message" => "操作成功"
            ],
            "data" => $data
        );
        return Response::json($datas);
    }

    /**
     * 添加权限
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permissions = Permission::with('allChilds')->where('parent_id', 0)->get();
        return View::make('admin.permission.create', compact('permissions'));
    }

    /**
     * 添加权限
     * @param PermissionCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PermissionCreateRequest $request)
    {
        $data = $request->all();
//        $data['parent_id'] = $data['parent_id_select_nodeId'];
//        unset($data['parent_id_select_nodeId']);
        unset($data['parent_id_select_input']);
        $data['icon'] = $data['icon']??'layui-icon-circle';//默认图标

        try {
            Permission::create($data);
            return Response::json(['code' => 200, 'msg' => '添加成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '添加失败:'.$exception->errorInfo[2]]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 更新权限
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $permissions = Permission::with('allChilds')->where('parent_id', 0)->get();
        return View::make('admin.permission.edit', compact('permission', 'permissions'));
    }

    /**
     * 更新权限
     * @param PermissionUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $data = $request->all();
        unset($data['parent_id_select_input']);

        try {
            $permission->update($data);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }

    /**
     * 删除权限
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)) {
            return Response::json(['code' => 500, 'msg' => '请选择删除项']);
        }
        $permission = Permission::with('childs')->find($ids[0]);
        if (!$permission) {
            return Response::json(['code' => 500, 'msg' => '权限不存在']);
        }
        //如果有子权限，则禁止删除
        if ($permission->childs->isNotEmpty()) {
            return Response::json(['code' => 500, 'msg' => '存在子权限禁止删除']);
        }
        try {
            $permission->delete();
            return Response::json(['code' => 200, 'msg' => '删除成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '存在子权限禁止删除']);
        }
    }

    /**
     * 更新菜单
     */
    public function menu() {
        header('content-type:application/json');
        $menus = Permission::with(['childs'])->where('parent_id',0)->orderBy('sort','asc')->get();
        // dd($menus->toArray());
        $guard = Auth::guard('web')->user();
        $menuArr = [];
        foreach ($menus as $menu){
            $children = [];
            if ($guard->hasPermissionTo($menu->id)) {
                if ($menu->childs->isNotEmpty()) {
                    $sorts = [];
                    foreach ($menu->childs as $subMenu) {
                        $children[] = array(
                            "id" => $subMenu->id,
                            "sort" => $subMenu->sort,
                            "title" => $subMenu->display_name,
                            "icon" => 'layui-icon ' . ($subMenu->icon ?? 'layui-icon-face-cry'),
                            "type" => 1,
                            "openType" => ($subMenu->type == 3 ? "_blank" : "_iframe"),
                            "href" => ($subMenu->type == 3 ? $subMenu->link : route($subMenu->route))
                        );
                        $sorts[] = $subMenu->sort;
                    }
                    array_multisort($sorts, SORT_DESC, $children);
                }
                $menuArr[] = array(
                    "id" => $menu->id,
                    "title" => $menu->display_name,
                    "type" => ($menu->route != '' ? 1 : 0),
                    "icon" => 'layui-icon ' . ($menu->icon ?? 'layui-icon-face-cry'),
                    "openType" => ($menu->route != '' ? "_iframe" : ""),
                    "href" => ($menu->route != '' ? route($menu->route) : ''),
                    "children" => $children
                );
            }
        }

        $menuJson  = \json_encode( $menuArr,JSON_UNESCAPED_UNICODE);
        // 写入文件
        //file_put_contents ( public_path(_ADMIN_SOURCE_.'/data/menu.json') ,  $menuJson );
        exit($menuJson);
    }
}
