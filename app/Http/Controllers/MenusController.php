<?php

namespace App\Http\Controllers;


use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
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
        $tree = $this->service->searchTree();

        return new MenuCollection($tree);
    }

    public function index(Request $request)
    {
        $menuList = $this->service->searchPage($request);

        return Response::success(new MenuCollection($menuList));
    }

    public function show($id)
    {
        $menu = $this->service->searchItem($id);

        return Response::success(new MenuResource($menu));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'type' => 'required|integer',
            'icon' => 'required_if:type,0',
            'href' => 'required_if:type,1',
            'open_type' => 'required_if:type,1',
            'sort' => 'required|integer',
            'p_id' => 'nullable|integer',
        ]);

        $this->service->updateItem($request, $id);

        return Response::ok('更新成功');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'type' => 'required|integer',
            'icon' => 'required_if:type,0',
            'href' => 'required_if:type,1',
            'open_type' => 'required_if:type,1',
            'sort' => 'required|integer',
            'p_id' => 'nullable|integer',
        ]);

        $this->service->addItem($request);

        return Response::ok('新增成功');
    }

    public function destroy($id)
    {
        $this->service->removeItem($id);

        return Response::ok('删除成功');
    }
}
