<?php

namespace App\Http\Controllers\Admin;

use App\Models\Backend\ConfigGroup;
use App\Http\Controllers\Controller;
use App\Models\Backend\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AboutusController extends Controller
{
    /**
     * 关于我们
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return View::make('admin.aboutus.index');
    }

    /**
     * 添加项目
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = ConfigGroup::orderBy('sort','asc')->get();
        return View::make('admin.config.create',compact('groups'));
    }

    /**
     * 添加项目
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all(['group_id','label','key','val','type','tips','sort']);
        try{
            Config::create($data);
        }catch (\Exception $exception){
            return Response::json(['code' => 500, 'msg' => '添加失败:'.$exception->errorInfo[2]]);
        }
        //缓存配置信息
        $config = Config::pluck('val','key');
        $request->session()->put('config',$config);
        return Response::json(['code' => 200, 'msg' => '添加成功']);
    }

    /**
     * 更新项目
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $data = $request->except(['_token','id']);
        DB::beginTransaction();
        try{
            foreach ($data as $k => $v){
                DB::table('config')->where('key',$k)->update(['val'=>$v]);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollback();
            return Response::json(['code'=>500,'msg'=>'更新失败']);
        }
        //缓存配置信息
        $config = Config::pluck('val','key');
        $request->session()->put('config',$config);
        return Response::json(['code'=>200,'msg'=>'更新成功']);
    }

}
