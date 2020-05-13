<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

class ResourceController extends Controller implements ResourceControllerContract
{
    public function show(ShowRequestContract $request, ShowResponseContract $response): ShowResponseContract
    {
        return $response;
    }

    public function store(StoreRequestContract $request, StoreResponseContract $response): StoreResponseContract
    {
        return $response;
    }

    public function update(UpdateRequestContract $request, UpdateResponseContract $response): UpdateResponseContract
    {
        return $response;
    }

    public function destroy(DestroyRequestContract $request, DestroyResponseContract $response): DestroyResponseContract
    {
        return $response;
    }
}
