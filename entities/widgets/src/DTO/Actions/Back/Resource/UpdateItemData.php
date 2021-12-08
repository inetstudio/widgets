<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\Resource;

use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\UpdateItemDataContract;

class UpdateItemData extends DataTransferObject implements UpdateItemDataContract
{
    public string|int $id;

    public ?string $widget_name;

    public ?string $title;

    public ?string $alias;

    public ?string $category;

    public string $view;

    public array $params = [];

    public array $additional_info = [];
}
