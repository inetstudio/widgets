<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Data\Index;

use Yajra\DataTables\Html\Builder;

interface GetTableActionContract
{
    public function execute(): Builder;
}
