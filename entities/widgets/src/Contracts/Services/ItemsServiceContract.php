<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Services;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;

interface ItemsServiceContract
{
    public function getModel(): WidgetModelContract;

    public function getItemById($id = 0, bool $returnNew = true);
}
