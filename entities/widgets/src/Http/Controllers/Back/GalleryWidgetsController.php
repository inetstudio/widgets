<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\GalleryWidgetsControllerContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponseContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponseContract;

class GalleryWidgetsController extends Controller implements GalleryWidgetsControllerContract
{
    public array $services;

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->services['widgets'] = app()->make('InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract');
    }

    /**
     * Загружаем изображения для виджета.
     *
     * @param Request $request
     *
     * @return AttachImagesToWidgetResponseContract
     */
    public function attachImagesToWidget(Request $request): AttachImagesToWidgetResponseContract
    {
        $widgetId = (int) $request->get('widgetId');
        $widgetType = $request->get('material_type');

        $this->services['widgets']->attachImagesToWidget($widgetId, $widgetType);

        return app()->makeWith('InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponseContract', [
            'result' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * Получаем изображения, прикрепленные к виджету.
     *
     * @param Request $request
     *
     * @return GetWidgetImagesResponseContract
     */
    public function getWidgetImages(Request $request): GetWidgetImagesResponseContract
    {
        $widgetId = (int) $request->get('widgetId');
        $collection = $request->get('collection');

        $media = $this->services['widgets']->getWidgetImages($widgetId, $collection);

        return app()->makeWith('InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponseContract', [
            'media' => $media,
        ]);
    }
}
