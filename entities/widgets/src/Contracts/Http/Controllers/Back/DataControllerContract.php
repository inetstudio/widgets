<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back;

use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Data\GetIndexDataRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract;

interface DataControllerContract
{
    public function getIndexData(GetIndexDataRequestContract $request, GetIndexDataResponseContract $response): GetIndexDataResponseContract;
}
