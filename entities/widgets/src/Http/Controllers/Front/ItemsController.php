<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front\RenderActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\RenderRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\RenderResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front\ItemsControllerContract;

class ItemsController extends Controller implements ItemsControllerContract
{
    public function render(RenderRequestContract $request, RenderActionContract $action, RenderResponseContract $response): RenderResponseContract
    {
        return $this->process($request, $action, $response);
    }
}
