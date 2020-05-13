<?php

declare(strict_types=1);

namespace InetStudio\WidgetsPackage\Widgets\Services\Front;

use InetStudio\WidgetsPackage\Widgets\Services\ItemsService as BaseItemsService;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Front\ItemsServiceContract;

class ItemsService extends BaseItemsService implements ItemsServiceContract
{
    public function getItemContent($id): string
    {
        $widget = $this->getItemById($id);

        if ($widget['id']) {
            $view = $widget['view'];

            if (view()->exists($view)) {
                $params = $widget['params'];

                return view($view, array_merge(is_array($params) ? $params : [], ['widget' => $widget]))->render();
            }
        }

        return '';
    }
}
