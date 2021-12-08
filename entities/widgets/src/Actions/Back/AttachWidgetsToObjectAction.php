<?php

namespace InetStudio\WidgetsPackage\Widgets\Actions\Back;

use Illuminate\Database\Eloquent\Model;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\AttachWidgetsToObjectActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\AttachWidgetsToObjectDataContract;

class AttachWidgetsToObjectAction implements AttachWidgetsToObjectActionContract
{
    public function __construct(
        protected WidgetModelContract $model
    ) {}

    public function execute(AttachWidgetsToObjectDataContract $data): Model
    {
        if (empty($data->widgets)) {
            $currentWidgets = $data->item->widgets;

            $data->item->detachWidgets($currentWidgets);
        } else {
            $widgets = $this->model::find($data->widgets)->pluck('id')->toArray();

            $data->item->syncWidgets($widgets);
        }

        return $data->item;
    }
}
