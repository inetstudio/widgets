<?php

declare(strict_types=1);

namespace InetStudio\WidgetsPackage\Widgets\Services;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\ItemsServiceContract;

class ItemsService implements ItemsServiceContract
{
    protected WidgetModelContract $model;

    public function __construct(WidgetModelContract $model)
    {
        $this->model = $model;
    }

    public function getModel(): WidgetModelContract
    {
        return $this->model;
    }

    public function create(): WidgetModelContract
    {
        return new $this->model;
    }

    public function getItemById($id = 0, bool $returnNew = true)
    {
        return $this->model::find($id) ?? (($returnNew) ? $this->create() : null);
    }
}
