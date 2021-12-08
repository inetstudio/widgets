<?php

namespace InetStudio\WidgetsPackage\Widgets\Queries;

use Illuminate\Database\Eloquent\Collection;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Queries\FetchItemsByIdsContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Queries\FetchItemsByIdsDataContract;

class FetchItemsByIds implements FetchItemsByIdsContract
{
    public function __construct(
        protected WidgetModelContract $model
    ) {}

    public function execute(FetchItemsByIdsDataContract $data): Collection
    {
        return $this->model::find($data->ids);
    }
}
