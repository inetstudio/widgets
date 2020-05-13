<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Front\ItemsServiceContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\GetItemContentResponseContract;

class GetItemContentResponse implements GetItemContentResponseContract
{
    protected ItemsServiceContract $itemsService;

    public function __construct(ItemsServiceContract $itemsService)
    {
        $this->itemsService = $itemsService;
    }

    public function toResponse($request)
    {
        $id = $request->route('id');

        return $this->itemsService->getItemContent($id);
    }
}
