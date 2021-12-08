<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO\Actions\Front;

use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract;

class RenderItemData extends DataTransferObject implements RenderItemDataContract
{
    public int|string $id;

    public string $view = '';

    public array $additionalParams = [];
}
