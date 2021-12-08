<?php

namespace InetStudio\WidgetsPackage\Widgets\Services\Back;

use InetStudio\WidgetsPackage\Widgets\Services\ItemsService as BaseItemsService;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract;

class ItemsService extends BaseItemsService implements ItemsServiceContract
{
    public function attachImagesToWidget(int $widgetId, string $widgetType): void
    {
        $widget = $this->getItemById($widgetId);

        $images = (config('widgets.images.conversions.'.$widgetType)) ? array_keys(config('widgets.images.conversions.'.$widgetType)) : [];
        app()->make('InetStudio\Uploads\Contracts\Services\Back\ImagesServiceContract')
            ->attachToObject(request(), $widget, $images, 'widgets', $widgetType);
    }

    public function getWidgetImages(int $widgetId, string $collection): array
    {
        $widget = $this->getItemById($widgetId);
        $images = $widget->getMedia($collection);

        $media = [];

        foreach ($images as $mediaItem) {
            $data = [
                'id' => $mediaItem->id,
                'src' => url($mediaItem->getUrl()),
                'thumb' => ($mediaItem->getUrl($collection.'_admin')) ? url($mediaItem->getUrl($collection.'_admin')) : url($mediaItem->getUrl()),
                'properties' => $mediaItem->custom_properties,
            ];

            $media[] = $data;
        }

        return $media;
    }
}
