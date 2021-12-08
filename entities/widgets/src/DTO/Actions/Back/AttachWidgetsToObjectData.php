<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back;

use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\AttachWidgetsToObjectDataContract;

class AttachWidgetsToObjectData extends DataTransferObject implements AttachWidgetsToObjectDataContract
{
    public Model $item;

    public array $widgets = [];
}
