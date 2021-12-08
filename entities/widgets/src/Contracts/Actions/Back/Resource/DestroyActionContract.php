<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\DestroyItemDataContract;

interface DestroyActionContract
{
    public function execute(DestroyItemDataContract $data): int;
}
