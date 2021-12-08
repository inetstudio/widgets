<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource;

use Illuminate\Database\Eloquent\Collection;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract;

class ShowResponse implements ShowResponseContract
{
    public function __construct(
        protected ?WidgetModelContract $result = null
    ) {}

    public function setResult(Collection $result): void
    {
        $this->result = $result->first();
    }

    public function toResponse($request)
    {
        $resource = $this->result;

        if (! $resource) {
            abort(404);
        }

        return resolve(
            'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\ShowResourceContract',
            compact('resource')
        );
    }
}
