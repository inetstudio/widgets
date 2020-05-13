<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front\ItemsControllerContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\GetItemContentRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\GetItemContentResponseContract;

class ItemsController extends Controller implements ItemsControllerContract
{
    public function getItemContent(GetItemContentRequestContract $request, GetItemContentResponseContract $response): GetItemContentResponseContract
    {
        return $response;
    }
}
