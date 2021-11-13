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
                'title' => $item->title,
                'icon' => $item->icon,
                'type' => $item->type,
                'href' => $item->href,
                'openType' => $item->open_type,
                'children' => MenuResource::collection($item->children),

                'parentId' => $item->p_id,
                'last' => $item->children->count() ? false : true,
                'sort' => $item->sort,
            ];
        });
    }
}
