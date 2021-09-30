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
    public function data(Request $request)
    {
	    $models = Permission::query();
	    if ($request->keyword) {
		    $models = $models->where(function($query) use ($request){
			    $query->where('name', 'like', '%' . $request->keyword . '%' )
				    ->orWhere('display_name', 'like', '%' . $request->keyword . '%');
		    });
	    }
	    if ($request->name){
		    $models->where('name', $request->name);
	    }
	    if ($request->display_name){
		    $models->where('display_name', $request->display_name);
	    }
	    // $models->where('type', 'view');
	    $permissions = $models->orderBy("sort","asc")->get()->toTree();
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => $permissions->count(),
            'data' => $permissions
        ];
        return Response::json($data);
    }

    /**
     * 添加权限
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permissions = Permission::get()->toTree();
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
        if(Permission::where("name",$data['name'])->count()){
            return Response::json(["code"=>500,"msg"=>"该Key已经存在一个了,请换一个Key"]);
        }

        try {
            $inputData = array(
                'name' => $data['name'],
                'icon' => $data['icon']??'layui-icon-circle',
                'display_name' => $data['display_name'],
                'guard_name' => 'web',
                'status' => $data['status']??10,
                'description' => $data['description'],
                'sort' => $data['sort'],
                'type' => $data['type'],
            );
            if ($data['parent_id'] && $data['parent_id']>0) {
                $parent = Permission::find($data['parent_id'] );
                $parent->children()->create($inputData);
            }else {
                Permission::create($inputData);
            }
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
        $permissions = Permission::get()->toTree();
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
        $permission = Permission::find($ids[0]);
        if (!$permission) {
            return Response::json(['code' => 500, 'msg' => '权限不存在']);
        }
        //如果有子权限，则禁止删除
        if ($permission->children->isNotEmpty()) {
            return Response::json(['code' => 500, 'msg' => '存在子权限禁止删除']);
        }
        try {
            $permission->delete();
            return Response::json(['code' => 200, 'msg' => '删除成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '存在子权限禁止删除']);
        }
    }
}
