<?php

namespace App\Http\Controllers\Admin;

use App\Models\FileStorages;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ServiceRequest;
use App\Models\Backend\Service;
use App\Models\Backend\Category;
use App\Models\Backend\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * 服务列表
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.service.index');
    }

    /**
     * 服务数据接口
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request)
    {
        $model = Service::with(['file']);
        if ($request->get('title')){
            $model = $model->where('title','like','%'.$request->get('title').'%');
        }
        $res = $model->orderBy('id','desc')->paginate($request->get('limit',30));
        $data = [
            'code' => 200,
            'msg'   => '正在请求中...',
            'count' => $res->total(),
            'data'  => $res->items(),
        ];
        return Response::json($data);
    }

    /**
     * 添加服务
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.service.create');
    }

    /**
     * 添加服务
     * @param ServiceRequest $request
     * @return JsonResponse
     */
    public function store(ServiceRequest $request)
    {
        try{
            $model = new Service();
            $model->title     = $request->title;
            $model->sub_title   = $request->sub_title;
            $model->icon   = $request->icon;
            $model->description   = $request->description;
            $model->save();
            if($request->image){
                //存储文件
                $image = unserialize(Redis::get($request->image));
                $image['app_id'] = $model->id;
                $fileStorage[] = FileStorages::saveMain($image);
                Redis::del($request->image);
                $model->file()->saveMany($fileStorage);
            }
            return Response::json(['code'=>200,'msg'=>'更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'更新失败','data'=>$exception->getMessage()]);
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
     * 更新服务
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return View::make('admin.service.edit',compact('service'));
    }

    /**
     * 更新服务
     * @param ServiceRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ServiceRequest $request, $id)
    {
        try{
            $model =  Service::findOrFail($id);
            $model->title     = $request->title;
            $model->sub_title   = $request->sub_title;
            $model->icon   = $request->icon;
            $model->description   = $request->description;
            $model->save();
            if($request->image){
                //删除旧文件
                if (!$model->image==false) FileStorages::deleteOne($model->image);

                //存储新文件
                $image = unserialize(Redis::get($request->image));
                $image['app_id'] = $model->id;
                $fileStorage[] = FileStorages::saveMain($image);
                Redis::del($request->image);
                $model->file()->saveMany($fileStorage);
            }
            return Response::json(['code'=>200,'msg'=>'更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code'=>500,'msg'=>'更新失败','data'=>$exception->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        DB::beginTransaction();
        try{
            DB::table('services')->whereIn('id',$ids)->delete();
            DB::commit();
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            DB::rollback();
            return Response::json(['code'=>500,'msg'=>'删除失败','data'=>$exception->getMessage()]);
        }
    }
}
