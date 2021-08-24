<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Config;
use App\Models\Backend\LoginLog;
use App\Models\Backend\OperateLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class LogController extends Controller
{
    /**
     * 日志主页
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.log.index');
    }

    /**
     * 数据接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function data_login(Request $request)
    {
        $data = $request->all(['created_at_start','created_at_end','username']);
        $res = LoginLog::when($data['username'],function ($query,$data){
            return $query->where('username','like','%'.$data['username'].'%');
        })->when($data['created_at_start']&&!$data['created_at_end'],function ($query,$data){
            return $query->where('created_at','>=',$data['created_at_start']);
        })->when(!$data['created_at_start']&&$data['created_at_end'],function ($query,$data){
            return $query->where('created_at','<=',$data['created_at_end']);
        })->when($data['created_at_start']&&$data['created_at_end'],function ($query,$data){
            return $query->whereBetween('created_at',[$data['created_at_start'],$data['created_at_end']]);
        })->orderBy('id','desc')->paginate($request->get('limit',30));
        $data = [
            'code' => 200,
            'msg'   => '正在请求中...',
            'count' => $res->total(),
            'data'  => $res->items(),
        ];
        return Response::json($data);
    }

    /**
     * 删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy_login(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        //查询配置是否允许删除 0-禁止，1-允许
        $config = Config::where('key','delete_login_log')->where('val',1)->first();
        if ($config==null){
            return Response::json(['code'=>500,'msg'=>'系统已设置禁止删除登录日志']);
        }
        try{
            LoginLog::destroy($ids);
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'删除失败','data'=>$exception->getMessage()]);
        }
    }

    /**
     * 数据接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function data_operate(Request $request)
    {
        $data = $request->all(['created_at_start','created_at_end']);
        $res = OperateLog::when($data['created_at_start']&&!$data['created_at_end'],function ($query,$data){
            return $query->where('created_at','>=',$data['created_at_start']);
        })->when(!$data['created_at_start']&&$data['created_at_end'],function ($query,$data){
            return $query->where('created_at','<=',$data['created_at_end']);
        })->when($data['created_at_start']&&$data['created_at_end'],function ($query,$data){
            return $query->whereBetween('created_at',[$data['created_at_start'],$data['created_at_end']]);
        })->orderBy('id','desc')->paginate($request->get('limit',30));
        foreach ($res->items() as $key => &$val){
            $userName = DB::table('users')->where('id',$val['user_id'])->get()->first();
            $val['username'] = $userName->nickname;
        }
        $data = [
            'code' => 200,
            'msg'   => '正在请求中...',
            'count' => $res->total(),
            'data'  => $res->items(),
        ];
        return Response::json($data);
    }

    /**
     * 删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy_operate(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        //查询配置是否允许删除 0-禁止，1-允许
        $config = Config::where('key','delete_operate_log')->where('val',1)->first();
        if ($config==null){
            return Response::json(['code'=>500,'msg'=>'系统已设置禁止删除操作日志']);
        }
        try{
            OperateLog::destroy($ids);
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'删除失败','data'=>$exception->getMessage()]);
        }
    }

}
