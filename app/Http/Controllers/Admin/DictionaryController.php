<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class DictionaryController extends Controller
{
    protected  $dictionary;

    public function __construct(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * 字典列表
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.dictionary.index');
    }

    /**
     * 字典列表数据接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Request $request)
    {
        $pid = $request->all('pid');
        $keyword = $request->all('keyword');
        $res = $this->dictionary->getDictionaryByPid($pid,$keyword['keyword']);
        // dd($res);
        $data = [
            'code' => 200,
            'msg'   => '正在请求中...',
            'count' => count($res),
            'data'  => $res
        ];
        return Response::json($data);
    }

    /**
     * 添加字典
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $dictionaries = Dictionary::with('allChilds')->where('parent_id',0)->orderBy('sort','asc')->orderBy('id','desc')->get();
        return View::make('admin.dictionary.create',compact('dictionaries'));
    }

    /**
     * 添加字典
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all(['name','code','sort','desc','parent_id']);
        try{
            Dictionary::create($data);
            return Response::json(['code' => 200,'msg'   => '添加成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500,'msg'   => '添加失败']);
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
     * 更新字典
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $dictionaries = Dictionary::with('allChilds')->where('parent_id',0)->orderBy('sort','asc')->orderBy('id','desc')->get();
        return View::make('admin.dictionary.edit',compact('dictionary','dictionaries'));
    }

    /**
     * 更新字典
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $data = $request->all(['name','code','sort','desc','parent_id']);
        try{
            $dictionary->update($data);
            return Response::json(['code' => 200,'msg'   => '更新成功']);
        }catch (\Exception $exception){
            return Response::json(['code' => 500,'msg'   => '更新失败']);
        }
    }

    /**
     * 删除字典
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        $dictionary = Dictionary::with(['childs'])->find($ids[0]);
        if ($dictionary == null){
            return Response::json(['code'=>500,'msg'=>'字典不存在']);
        }
        if ($dictionary->childs->isNotEmpty()){
            return Response::json(['code'=>500,'msg'=>'该字典下有子项，不能删除']);
        }

        DB::beginTransaction();
        try{
            //假删除,修改展示状态
            $res = $this->dictionary->DisabledDictionary($ids);
            DB::commit();
            return Response::json(['code'=>200,'msg'=>'成功删除'.count($ids).'条']);
        }catch (\Exception $exception){
            DB::rollback();
            return Response::json(['code'=>500,'msg'=>'删除失败','data'=>$exception->getMessage()]);
        }

    }
}
