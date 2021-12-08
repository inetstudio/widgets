<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

class DestroyResponse implements DestroyResponseContract
{
    public function __construct(
        protected int $result = 0
    ){}

    public function setResult(int $result): void
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $resource = $this->result;

        return resolve(
            'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\DestroyResourceContract',
            compact('resource')
        );
    }
}
