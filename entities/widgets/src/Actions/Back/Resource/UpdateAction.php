<?php

namespace InetStudio\WidgetsPackage\Widgets\Actions\Back\Resource;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\UpdateActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\UpdateItemDataContract;

class UpdateAction implements UpdateActionContract
{
    public function __construct(
        protected WidgetModelContract $model
    ) {}

    public function execute(UpdateItemDataContract $data): ?WidgetModelContract
    {
        $item = $this->model::find($data->id);

        if (! $item) {
            return null;
        }

        $item->widget_name = $data->widget_name;
        $item->title = $data->title;
        $item->alias = $data->alias;
        $item->category = $data->category;
        $item->view = $data->view;
        $item->params = $data->params;
        $item->additional_info = $data->additional_info;

        $item->save();

        return $item;
    }
}
