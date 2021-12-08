<?php

namespace InetStudio\WidgetsPackage\Widgets\Actions\Back\Data\Index;

use Yajra\DataTables\Html\Builder;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\DataTables\IndexServiceContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Data\Index\GetTableActionContract;

class GetTableAction implements GetTableActionContract
{
    public function __construct(
        protected IndexServiceContract $datatableService
    ) {}

    public function execute(): Builder
    {
        return $this->datatableService->html();
    }
}
