<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front\RenderActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\RenderRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\RenderResponseContract;

interface ItemsControllerContract
{
    public function render(RenderRequestContract $request, RenderActionContract $action, RenderResponseContract $response): RenderResponseContract;
}
