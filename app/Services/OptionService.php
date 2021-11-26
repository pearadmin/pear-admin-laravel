<?php

namespace App\Services;

use App\Http\Resources\MenuCollection;
use App\Repositories\Models\Menu;
use Illuminate\Http\Request;

class OptionService extends Service
{
    public function menuType(Request $request)
    {
        return [
            [
                'name' => '目录',
                'value' => 0
            ],
            [
                'name' => '菜单',
                'value' => 1
            ],
        ];
    }

    public function menuOpenType(Request $request)
    {
        return [
            [
                'name' => '_iframe',
                'value' => '_iframe'
            ],
        ];
    }

    public function menuTree(Request $request)
    {
        $tree = Menu::with('children')->where(['p_id' => 0])->get();

       return (new MenuCollection($tree))->toArray($request);
    }
}