<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\Resource;

use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\DestroyItemDataContract;

class DestroyItemData extends DataTransferObject implements DestroyItemDataContract
{
    public int|string $id;
}
