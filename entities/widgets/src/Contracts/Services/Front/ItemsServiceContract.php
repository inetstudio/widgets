<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Services\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Services\ItemsServiceContract as BaseItemsServiceContract;

interface ItemsServiceContract extends BaseItemsServiceContract
{
    public function getItemContent($id, string $view = '', array $additionalParams = []): string;
}
