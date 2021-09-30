<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Backend\Role;
use App\Models\Backend\Permission;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use AuthenticatesUsers;

    /**
     * 用户列表主页
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.user.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     * @author: hongbinwang
     * @time  : 2021/8/9 10:20
     */
    public function data(Request $request)
    {
        $res = User::get();
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => $res->count(),
            'data' => $res
        ];
        return Response::json($data);
    }

    /**
     * 权限数据表格
     * @param int $id
     * @return JsonResponse
     */
    public function permissionTree($id)
    {
        $user = User::findOrFail($id);
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
                                    'checked' => $user->hasDirectPermission($p3->id) ? 1 : 0
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
                            'checked' => $user->hasDirectPermission($p2->id) ? 1 : 0
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
                    'checked' => $user->hasDirectPermission($p1->id) ? 1 : 0
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
     * 添加用户
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.user.create');
    }

    /**
     * 添加用户
     * @param UserCreateRequest $request
     * @return JsonResponse
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        try{
            User::create($data);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return View::make('admin.user.profile',compact('user'));
    }

    /**
     * 更新用户
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return View::make('admin.user.edit',compact('user'));
    }

    /**
     * 更新用户
     * @param UserUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except('password');
        if ($request->get('password')){
            $data['password'] = $request->get('password');
        }
        try{
            $user->update($data);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }

    /**
     * 删除用户
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        try{
            User::destroy($ids);
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'删除失败']);
        }
    }

    /**
     * 恢复用户
     * @param int $id
     * @return JsonResponse
     */
    public function restore(int $id){
        User::onlyTrashed()->where('id', $id)->restore();
        return Response::json(['code'=>200,'msg'=>'恢复成功']);
    }

    /**
     * 分配角色
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function role($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        foreach ($roles as $role){
            $role->own = $user->hasRole($role) ? true : false;
        }
        return View::make('admin.user.role',compact('roles','user'));
    }

    /**
     * 分配角色
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function assignRole(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $roles = $request->get('roles',[]);

        try{
            $user->syncRoles($roles);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }

    /**
     * 分配直接权限
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function permission($id)
    {
        $user = User::findOrFail($id);
        return View::make('admin.user.permission',compact('user'));
    }

    /**
     * 分配直接权限
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function assignPermission(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $permissions = $request->get('permissions',[]);
        try{
            $user->syncPermissions($permissions);
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '更新失败']);
        }
    }

    /**
     * 生成一个Gravatar头像
     * @param string $email
     * @param int $size
     * @return string
     */
    public function makeGravatar(string $email, int $size = 120)
    {
        $hash = md5($email);
        return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=identicon";
    }

    /**
     * 更改密码
     * @return \Illuminate\Contracts\View\View
     */
    public function passwordForm()
    {
        return View::make('admin.user.password');
    }

    /**
     * 修改密码
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function password(ChangePasswordRequest $request)
    {
        $data = $request->all(['old_password','new_password']);
        //验证原密码
        if (!Hash::check($data['old_password'],$request->user()->getAuthPassword())){
            return Response::json(['code' => 500, 'msg' => '原密码不正确']);
        }
        try{
            $request->user()->fill(['password' => $data['new_password']])->save();
            return Response::json(['code' => 200, 'msg' => '密码修改成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '密码修改失败']);
        }
    }
}
