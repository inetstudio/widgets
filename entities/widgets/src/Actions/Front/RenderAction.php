<?php

namespace InetStudio\WidgetsPackage\Widgets\Actions\Front;

use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front\RenderActionContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract;

class RenderAction implements RenderActionContract
{
    public function __construct(
        protected WidgetModelContract $model
    ) {}

    public function execute(RenderItemDataContract $data): string
    {
        $item = $this->model::find($data->id);

        if ($item) {
            $view = $data->view ?: $item->view;

            if (view()->exists($view)) {
                $params = $item->params;

                return view($view, array_merge(is_array($params) ? $params : [], ['widget' => $item], $data->additionalParams))->render();
            }
        }

        return '';
    }
}
