<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Data;

use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\DataTables\IndexServiceContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract;

class GetIndexDataResponse implements GetIndexDataResponseContract
{
    public function __construct(
        protected IndexServiceContract $dataService
    ) {}

    public function toResponse($request)
    {
        return $this->dataService->ajax();
    }
}
