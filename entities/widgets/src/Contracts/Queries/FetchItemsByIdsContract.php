<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Queries;

use Illuminate\Database\Eloquent\Collection;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Queries\FetchItemsByIdsDataContract;

interface FetchItemsByIdsContract
{
    public function execute(FetchItemsByIdsDataContract $data): Collection;
}
