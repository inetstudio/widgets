<?php

namespace InetStudio\WidgetsPackage\Widgets\Services\Back;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\ItemDataContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Services\ItemsService as BaseItemsService;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract;

class ItemsService extends BaseItemsService implements ItemsServiceContract
{
    public function save(ItemDataContract $data): ?WidgetModelContract
    {
        $item = null;

        $item = DB::transaction(function () use ($data) {
            $item = $this->model::updateOrCreate(
                [
                    'id' => $data->id,
                ],
                $data->except('id')->toArray()
            );

            event(
                app()->make(
                    'InetStudio\WidgetsPackage\Widgets\Contracts\Events\Back\ModifyItemEventContract',
                    compact('item')
                )
            );

            return $item;
        });

        return $item;
    }

    /**
     * Присваиваем виджеты объекту.
     *
     * @param $request
     *
     * @param $item
     */
    public function attachToObject($request, $item)
    {
        if ($request->filled('widgets')) {
            $widgets = explode(',', $request->get('widgets'));
            $item->syncWidgets($this->getItemById((array) $widgets));
        } else {
            $item->detachWidgets($item->widgets);
        }
    }

    /**
     * Присваиваем изображения виджету.
     *
     * @param  int  $widgetId
     *
     * @param  string  $widgetType
     *
     * @throws BindingResolutionException
     */
    public function attachImagesToWidget(int $widgetId, string $widgetType): void
    {
        $widget = $this->getItemById($widgetId);

        $images = (config('widgets.images.conversions.'.$widgetType)) ? array_keys(config('widgets.images.conversions.'.$widgetType)) : [];
        app()->make('InetStudio\Uploads\Contracts\Services\Back\ImagesServiceContract')
            ->attachToObject(request(), $widget, $images, 'widgets', $widgetType);
    }

    /**
     * Возвращаем изображения виджета.
     *
     * @param  int  $widgetId
     * @param  string  $collection
     *
     * @return array
     */
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
