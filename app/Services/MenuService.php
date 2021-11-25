<?php

namespace App\Services;

use App\Repositories\Models\Menu;
use Illuminate\Http\Request;

class MenuService extends Service
{
    public function searchMenuTree()
    {
        return Menu::with('children')->where(['p_id' => 0])->get();
    }

    public function searchMenuPage(Request $request)
    {
        return Menu::paginate($request['limit'] ?? 20);
    }
}