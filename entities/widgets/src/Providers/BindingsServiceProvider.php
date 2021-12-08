<?php

namespace InetStudio\WidgetsPackage\Widgets\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class BindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Data\Index\GetTableActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Back\Data\Index\GetTableAction',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\DestroyActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Back\Resource\DestroyAction',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\StoreActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Back\Resource\StoreAction',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\Resource\UpdateActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Back\Resource\UpdateAction',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back\AttachWidgetsToObjectActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Back\AttachWidgetsToObjectAction',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front\RenderActionContract' => 'InetStudio\WidgetsPackage\Widgets\Actions\Front\RenderAction',

        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\DestroyItemDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\Resource\DestroyItemData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\StoreItemDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\Resource\StoreItemData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\UpdateItemDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\Resource\UpdateItemData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\AttachWidgetsToObjectDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Actions\Back\AttachWidgetsToObjectData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Actions\Front\RenderItemData',
        'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Queries\FetchItemsByIdsDataContract' => 'InetStudio\WidgetsPackage\Widgets\DTO\Queries\FetchItemsByIdsData',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\WidgetsPackage\Widgets\Events\Back\ModifyItemEvent',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back\DataController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\GalleryWidgetsControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back\GalleryWidgetsController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Back\ResourceController',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front\ItemsControllerContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Controllers\Front\ItemsController',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Data\GetIndexDataRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Data\GetIndexDataRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\DestroyRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\IndexRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\IndexRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\ShowRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\StoreRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\UpdateRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource\UpdateRequest',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\RenderRequestContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Requests\Front\RenderRequest',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Data\IndexResourceContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Data\IndexResource',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\DestroyResourceContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource\DestroyResource',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\ShowResourceContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource\ShowResource',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\StoreResourceContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource\StoreResource',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Resource\UpdateResourceContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Resources\Back\Resource\UpdateResource',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Data\GetIndexDataResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\GalleryWidgets\AttachImagesToWidgetResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\GalleryWidgets\GetWidgetImagesResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\StoreResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\UpdateResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource\UpdateResponse',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Front\RenderResponseContract' => 'InetStudio\WidgetsPackage\Widgets\Http\Responses\Front\RenderResponse',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetableModelContract' => 'InetStudio\WidgetsPackage\Widgets\Models\WidgetableModel',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract' => 'InetStudio\WidgetsPackage\Widgets\Models\WidgetModel',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Queries\FetchItemsByIdsContract' => 'InetStudio\WidgetsPackage\Widgets\Queries\FetchItemsByIds',

        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\DataTables\IndexServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\Back\DataTables\IndexService',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\Back\ItemsService',
        'InetStudio\WidgetsPackage\Widgets\Contracts\Services\ItemsServiceContract' => 'InetStudio\WidgetsPackage\Widgets\Services\ItemsService',
    ];

    public function provides()
    {
        return array_keys($this->bindings);
    }
}
