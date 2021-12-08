<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\StoreResourceContract;

class StoreResource extends JsonResource implements StoreResourceContract
{
    public function toArray($request)
    {
        return [
            'success' => isset($this['id']),
            'data' => [
                'id' => $this['id'],
                'title' => $this['title'] ?? Str::limit($this['content'], '100', '...'),
            ],
        ];
    }
}
