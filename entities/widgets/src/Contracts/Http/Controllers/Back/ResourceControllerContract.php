<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back;

use InetStudio\WidgetsPackage\Widgets\Contracts\Queries\FetchItemsByIdsContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\StoreActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\UpdateActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\DestroyActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Data\Index\GetTableActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\IndexRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

interface ResourceControllerContract
{
    public function index(IndexRequestContract $request, GetTableActionContract $action, IndexResponseContract $response): IndexResponseContract;

    public function show(ShowRequestContract $request, FetchItemsByIdsContract $query, ShowResponseContract $response): ShowResponseContract;

    public function store(StoreRequestContract $request, StoreActionContract $action, StoreResponseContract $response): StoreResponseContract;

    public function update(UpdateRequestContract $request, UpdateActionContract $action, UpdateResponseContract $response): UpdateResponseContract;

    public function destroy(DestroyRequestContract $request, DestroyActionContract $action, DestroyResponseContract $response): DestroyResponseContract;
}
