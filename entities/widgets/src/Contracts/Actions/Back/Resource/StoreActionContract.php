<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\StoreItemDataContract;

interface StoreActionContract
{
    public function execute(StoreItemDataContract $data): ?WidgetModelContract;
}
