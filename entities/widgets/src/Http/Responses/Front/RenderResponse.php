<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\RenderResponseContract;

class RenderResponse implements RenderResponseContract
{
    public function __construct(
        protected string $result = ''
    ) {}

    public function setResult(string $result): void
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        return response($this->result)->header('Content-Type', 'text/html');
    }
}
