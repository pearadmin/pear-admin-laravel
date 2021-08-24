<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class DatacenterController extends Controller
{
    //后台布局
    public function index()
    {
        return View::make('admin.index');
    }

    /**
     * 权限数据表格
     * @return \Illuminate\Http\JsonResponse
     */
    public function data1()
    {
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => 0,
            'data' => []
        ];
        return Response::json($data);
    }

}
