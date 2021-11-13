<?php

namespace App\Http\Controllers;


use App\Http\Resources\MenuCollection;
use App\Repositories\Models\Menu;

class MenusController extends Controller
{
    public function tree()
    {
        $tree = Menu::with('children')->where(['p_id' => 0])->get();

        return new MenuCollection($tree);
    }

}
