<?php

namespace InetStudio\WidgetsPackage\Widgets\Actions\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\DestroyActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\DestroyItemDataContract;

class DestroyAction implements DestroyActionContract
{
    public function __construct(
        protected WidgetModelContract $model
    ) {}

    public function execute(DestroyItemDataContract $data): int
    {
        return $this->model::destroy($data->id);
    }
}
