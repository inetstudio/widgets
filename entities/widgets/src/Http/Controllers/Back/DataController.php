<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\DataControllerContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Data\GetIndexDataRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract;

class DataController extends Controller implements DataControllerContract
{
    public function getIndexData(GetIndexDataRequestContract $request, GetIndexDataResponseContract $response): GetIndexDataResponseContract
    {
        return $response;
    }
}
