<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    /**
     * 角色列表
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.role.index');
    }

    /**
     * 角色列表接口数据
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Request $request)
    {
        $res = Role::orderBy('name','asc')->paginate($request->get('limit', 30));
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => $res->total(),
            'data' => $res->items()
        ];
        return Response::json($data);
    }

    /**
     * 权限数据表格
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function permissionTree($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get()->toTree();
        $data = [];
        foreach ($permissions as $p1){
            $c1 = [];
            if ($p1->children->isNotEmpty()){
                foreach ($p1->children as $p2){
                    $c2 = [];
                    if ($p2->children->isNotEmpty()){
                        foreach ($p2->children as $p3){
                            $c2[] = array(
                                "id" => $p3->id,
                                "title" => $p3->display_name,
                                "parentId" => $p3->parent_id,
                                "checkArr" => array(
                                    'type' => 0,
                                    'checked' => $role->hasDirectPermission($p3->id) ? 1 : 0
                                )
                            );
                        }
                    }
                    $c1[] = array(
                        "id" => $p2->id,
                        "title" => $p2->display_name,
                        "parentId" => $p2->parent_id,
                        "children" => $c2,
                        "checkArr" => array(
                            'type' => 0,
                            'checked' => $role->hasDirectPermission($p2->id) ? 1 : 0
                        )
                    );
                }
            }
            $data[] = array(
                "id" => $p1->id,
                "title" => $p1->display_name,
                "parentId" => $p1->parent_id,
                "children" => $c1,
                "checkArr" => array(
                    'type' => 0,
                    'checked' => $role->hasDirectPermission($p1->id) ? 1 : 0
                ),
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
     * 添加角色
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.role.create');
    }

    /**
     * 添加角色
     * @param RoleCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->only(['name','display_name']);
        try{
            Role::create($data);
            return Response::json(['code' => 200, 'msg' => '添加成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '添加失败']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 更新角色
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return View::make('admin.role.edit',compact('role'));
    }

    /**
     * 更新角色
     * @param RoleUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->only(['name','display_name']);
        try{
            $role->update($data);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }

    /**
     * 删除角色
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        try{
            Role::destroy($ids);
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'删除失败']);
        }
    }

    /**
     * 分配权限
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function permission(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        return View::make('admin.role.permission',compact('role'));
    }

    /**
     * 存储权限
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignPermission(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->get('permissions',[]);
        try{
            $role->syncPermissions($permissions);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }
}
