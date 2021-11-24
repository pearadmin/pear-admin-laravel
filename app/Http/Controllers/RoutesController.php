<?php

namespace App\Http\Controllers;

use App\Services\RouteService;
use Illuminate\Http\Request;
use Jiannei\Response\Laravel\Support\Facades\Response;

class RoutesController extends Controller
{
    /**
     * @var RouteService
     */
    private $service;

    public function __construct(RouteService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $routeList = $this->service->searchPage($request);

        return Response::success($routeList);
    }

    public function sync()
    {
        $this->service->syncRoutes();

        return Response::ok('同步路由到数据库成功');
    }
}
