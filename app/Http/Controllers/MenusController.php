<?php

namespace App\Http\Controllers;


use App\Http\Resources\MenuCollection;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Jiannei\Response\Laravel\Support\Facades\Response;

class MenusController extends Controller
{
    /**
     * @var MenuService
     */
    private $service;

    public function __construct(MenuService $service)
    {
        $this->service = $service;
    }

    public function tree()
    {
        $tree = $this->service->searchMenuTree();

        return new MenuCollection($tree);
    }

    public function index(Request $request)
    {
        $menuList = $this->service->searchMenuPage($request);

        return Response::success($menuList);
    }
}
