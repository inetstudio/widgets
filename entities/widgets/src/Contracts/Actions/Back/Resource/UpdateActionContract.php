<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\UpdateItemDataContract;

interface UpdateActionContract
{
    public function execute(UpdateItemDataContract $data): ?WidgetModelContract;
}
