<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'p_id' => $item->p_id,
                'title' => $item->title,
                'icon' => "layui-icon $item->icon",
                'type' => $item->type,
                'href' => $item->href,
                'openType' => $item->open_type,
                'children' => MenuResource::collection($item->children),

                'parentId' => $item->p_id,
                'last' => $item->children->count() ? false : true,
                'sort' => $item->sort,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });
    }
}
