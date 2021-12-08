<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract;

interface RenderActionContract
{
    public function execute(RenderItemDataContract $data): string;
}
