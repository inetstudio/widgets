<?php

namespace InetStudio\WidgetsPackage\Widgets\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public array $bindings = [
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\ItemDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\ItemData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\WidgetsPackage\Widgets\Events\Back\ModifyItemEvent',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\GalleryWidgetsControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back\GalleryWidgetsController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back\ResourceController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front\ItemsControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Front\ItemsController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\DestroyRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\ShowRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\StoreRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\UpdateRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\UpdateRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\GetItemContentRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Front\GetItemContentRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\StoreResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\UpdateResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\GetItemContentResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Front\GetItemContentResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetableModelContract' => 'InetStudio\WidgetsPackage\Widgets\Models\WidgetableModel',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract' => 'InetStudio\WidgetsPackage\Widgets\Models\WidgetModel',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\Back\ItemsService',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\Front\ItemsService',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\ItemsServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\ItemsService',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return  array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
