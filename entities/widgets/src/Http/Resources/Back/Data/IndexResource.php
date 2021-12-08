<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Data;

use Illuminate\Http\Resources\Json\JsonResource;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Data\IndexResourceContract;

class IndexResource extends JsonResource implements IndexResourceContract
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category,
            'view' => $this->view,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'actions' => view(
                'inetstudio.widgets-package.widgets::back.partials.datatables.actions',
                [
                    'componentProps' => [
                        'itemProp' => parent::toArray($request),
                    ],
                ]
            )->render(),
        ];
    }
}
