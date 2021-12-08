<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\DestroyResourceContract;

class DestroyResource extends JsonResource implements DestroyResourceContract
{
    public function toArray($request)
    {
        return [
            'success' => ($this->resource > 0),
        ];
    }
}
