<?php

namespace App\Services;

use App\Repositories\Models\Menu;
use Illuminate\Http\Request;

class MenuService extends Service
{
    public function searchTree()
    {
        return Menu::with('children')->where(['p_id' => 0])->get();
    }

    public function searchPage(Request $request)
    {
        return Menu::paginate($request['limit'] ?? 20);
    }

    public function searchItem($id)
    {
        return Menu::findOrFail($id);
    }

    public function updateItem(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $attributes = $request->except('icon');
        $attributes['icon'] = "layui-icon " . $request['icon'];
        $attributes['updater_id'] = auth()->user()->id;

        if ($request['type'] == 0) {
            $attributes['icon'] = "layui-icon " . $request['icon'];
            $attributes['p_id'] = 0;
        }

        $menu->fill($attributes);

        // todo activity

        return $menu->save();
    }

    public function addItem(Request $request)
    {
        $attributes = $request->except(['icon']);

        if ($request['type'] == 0) {
            $attributes['icon'] = "layui-icon " . $request['icon'];
            $attributes['p_id'] = 0;
        }

        $attributes['creator_id'] = auth()->user()->id;
        $attributes['updater_id'] = auth()->user()->id;

        // todo activity

        Menu::create($attributes);

        return true;
    }

    public function removeItem($id)
    {
        $menu = Menu::findOrFail($id);

        return $menu->delete();
    }
}