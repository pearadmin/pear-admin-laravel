<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('admin.message.index');
    }

    /**
     * 数据接口
     * @param Request $request
     * @return JsonResponse
     */
    public function panel(Request $request)
    {
        $model = new Messages();
        if ($request->subject) {
            $model = $model->where('subject', $request->subject);
        }
        if ($request->keyword) {
            $model = $model->where(function ($query) use ($request) {
                $query->whereRaw(
                    "MATCH(`name`,`email`,`subject`,`context`) AGAINST(?)",
                    [$request->key_word]
                );
            });
        }
        if ($request->status && $request->status != 0) {
            $model = $model->where('status', $request->status);
        }

        $messages = $model->orderBy('id', 'desc')->get()->toArray();
        $children = [];
        foreach ($messages as $message) {
            $children[] = array(
                'id' => $message['id'],
                'form' => $message['name'],
                // 'title' => $message['subject'],
                'title' => '一条新的留言',
                'avatar' => $message['album'],
                'context' => $message['context'],
                'time' => date('Y-m-d',strtotime($message['created_at'])),
            );
        }
        $data = array(
            array(
                'id' => 10,
                'title' => '留言',
                'children' => $children
            ),
            array(
                'id' => 20,
                'title' => '提醒',
                'children' => $children
            ),
            array(
                'id' => 30,
                'title' => '通知',
                'children' => $children
            )
        );
        return Response::json($data);
    }

    /**
     * 数据接口
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request)
    {
        $model = new Messages();
        if ($request->subject){
            $model = $model->where('subject',$request->subject);
        }
        if ($request->keyword){
            $model = $model->where(function($query) use ($request){
                $query->whereRaw(
                    "MATCH(`name`,`email`,`subject`,`context`) AGAINST(?)",
                    [$request->key_word]
                );
            });
        }
        if ($request->status && $request->status!=0){
            $model = $model->where('status',$request->status);
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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $message = new Messages();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->subject = $request->subject;
            $message->context = $request->get('context');
            $message->album = (new Avatar(config('laravolt.avatar')))->create($request->name)->toBase64();
            $message->save();
            return Response::json(['code' => 200, 'msg' => '添加成功']);
        } catch (\Exception $exception) {
            return Response::json(['code' => 500, 'msg' => '添加失败:'.$exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function read(Request $request)
    {
        //
    }
}
