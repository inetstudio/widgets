<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\GetItemContentRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\GetItemContentResponseContract;

interface ItemsControllerContract
{
    public function getItemContent(GetItemContentRequestContract $request, GetItemContentResponseContract $response): GetItemContentResponseContract;
}
