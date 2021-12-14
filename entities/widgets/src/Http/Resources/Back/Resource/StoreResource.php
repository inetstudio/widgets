<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\StoreResourceContract;

class StoreResource extends JsonResource implements StoreResourceContract
{
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
