<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class StatisticsController extends Controller
{
    //订单统计
    public function order()
    {
        return View::make('admin.statistics.order');
    }

    //物流统计
    public function logistics()
    {
        return View::make('admin.statistics.logistics');
    }

    //交易统计
    public function wallet()
    {
        return View::make('admin.statistics.wallet');
    }

    /**
     * 订单数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderData()
    {
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => 0,
            'data' => []
        ];
        return Response::json($data);
    }

    /**
     * 物流数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function logisticsData()
    {
        $data = [
            'code' => 200,
            'msg' => '正在请求中...',
            'count' => 0,
            'data' => []
        ];
        return Response::json($data);
    }

    /**
     * 交易数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function walletData()
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
