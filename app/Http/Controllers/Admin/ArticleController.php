<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\ArticleRequest;
use App\Models\FileStorages;
use App\Models\Backend\Article;
use App\Models\Backend\Category;
use App\Models\Backend\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * 资讯列表
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::with('allChilds')->where('parent_id',0)->orderBy('sort','asc')->get();
        $tagss = Tag::orderBy('name','asc')->get();
        return View::make('admin.article.index',compact('categories','tagss'));
    }

    /**
     * 资讯数据接口
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request)
    {
        $model = Article::with(['tags','category']);
        if ($request->get('category')){
            $model = $model->where('category',$request->get('category'));
        }
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
     * 添加资讯
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        //分类
        $categories = Category::with('allChilds')->where('parent_id',0)->orderBy('sort','desc')->get();
        //标签
        $tagss = Tag::orderBy('name','asc')->get();
        return View::make('admin.article.create',compact('tagss','categories'));
    }

    /**
     * 添加资讯
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        try {
            $model = new Article();
            $model->title     = $request->title;
            $model->category   = $request->category;
            $model->content   = $request->content;
            $model->description   = $request->description;
            $model->save();
            $tags = explode(',',$request->get('tags'));
            if (!empty($tags)) $article->tags()->sync($tags);

            if($request->album){
                //存储文件
                $album = unserialize(Redis::get($request->album));
                $album['app_id'] = $model->id;
                $fileStorage[] = FileStorages::saveMain($album);
                Redis::del($request->album);
                $model->file()->saveMany($fileStorage);
            }
            return Response::json(['code' => 200, 'msg' => '添加成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '添加失败:'.$exception->getMessage()]);
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
     * 更新资讯
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = Article::with('tags')->findOrFail($id);
        //分类
        $categories = Category::with('allChilds')->where('parent_id',0)->orderBy('sort','asc')->get();
        //标签
        $tagss = Tag::orderBy('name','asc')->get();
        foreach ($tagss as &$tag){
            $tag->checked = $article->tags->contains($tag) ? 'checked' : '';
        }
        return View::make('admin.article.edit',compact('article','categories','tagss'));
    }

    /**
     * 更新资讯
     * @param ArticleRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::with('tags')->findOrFail($id);
        $data = $request->all();
        try {
            $model = Article::with('tags')->findOrFail($id);
            $model->title     = $request->title;
            $model->category   = $request->category;
            $model->content   = $request->content;
            $model->description   = $request->description;
            $model->save();
            $model->tags()->sync($request->get('tags',[]));
            
            if($request->album){
                if (!$model->album==false) FileStorages::deleteOne($model->album);

                //存储文件
                $album = unserialize(Redis::get($request->album));
                $album['app_id'] = $model->id;
                $fileStorage[] = FileStorages::saveMain($album);
                Redis::del($request->album);
                $model->file()->saveMany($fileStorage);
            }
            return Response::json(['code' => 200, 'msg' => '更新成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '更新失败:'.$exception->errorInfo[2]]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     * @author: hongbinwang
     * @time  : 2021/8/7 16:13
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (!is_array($ids) || empty($ids)){
            return Response::json(['code'=>500,'msg'=>'请选择删除项']);
        }
        DB::beginTransaction();
        try{
            //删除中间表article_tag
            DB::table('article_tag')->whereIn('article_id',$ids)->delete();
            //删除主表tag
            DB::table('articles')->whereIn('id',$ids)->delete();
            DB::commit();
            return Response::json(['code'=>200,'msg'=>'删除成功']);
        }catch (\Exception $exception){
            DB::rollback();
            return Response::json(['code'=>500,'msg'=>'删除失败','data'=>$exception->getMessage()]);
        }
    }
}
