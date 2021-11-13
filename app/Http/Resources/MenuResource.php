<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'icon' => $this->icon,
            'type' => $this->type,
            'href' => $this->href,
            'openType' => $this->open_type,
            'parentId' => $this->p_id,
            'sort' => $this->sort,
        ];
    }
}
