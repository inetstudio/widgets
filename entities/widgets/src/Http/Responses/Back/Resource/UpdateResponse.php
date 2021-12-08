<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;

class UpdateResponse implements UpdateResponseContract
{
    public function __construct(
        protected ?WidgetModelContract $result = null
    ) {}

    public function setResult(?WidgetModelContract $result): void
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $resource = $this->result;

        if (! $resource) {
            abort(404);
        }

        return resolve(
            'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\UpdateResourceContract',
            compact('resource')
        );
    }
}
