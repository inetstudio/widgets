<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back;

use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

interface ResourceControllerContract
{
    public function show(ShowRequestContract $request, ShowResponseContract $response): ShowResponseContract;

    public function store(StoreRequestContract $request, StoreResponseContract $response): StoreResponseContract;

    public function update(UpdateRequestContract $request, UpdateResponseContract $response): UpdateResponseContract;

    public function destroy(DestroyRequestContract $request, DestroyResponseContract $response): DestroyResponseContract;
}
