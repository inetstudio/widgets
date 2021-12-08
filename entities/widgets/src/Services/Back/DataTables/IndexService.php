<?php

namespace InetStudio\WidgetsPackage\Widgets\Services\Back\DataTables;

use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\DataTables\IndexServiceContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Data\IndexResourceContract;

class IndexService extends DataTable implements IndexServiceContract
{
    protected WidgetModelContract $model;

    protected IndexResourceContract $resource;

    public function __construct(WidgetModelContract $model)
    {
        $this->model = $model;
        $this->resource = resolve(
            IndexResourceContract::class,
            [
                'resource' => null,
            ]
        );
    }

    public function ajax(): JsonResponse
    {
        return DataTables::of($this->query())
            ->setTransformer(function ($item) {
                return $this->resource::make($item)->resolve();
            })
            ->make();
    }

    public function query()
    {
        return $this->model->query();
    }

    public function html(): Builder
    {
        /** @var Builder $table */
        $table = app('datatables.html');

        return $table
            ->columns($this->getColumns())
            ->ajax($this->getAjaxOptions())
            ->parameters($this->getParameters());
    }

    protected function getColumns(): array
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'ID', 'className' => 'widget-id'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Название', 'className' => 'widget-title'],
            ['data' => 'category', 'name' => 'category', 'title' => 'Категория', 'className' => 'widget-category'],
            ['data' => 'view', 'name' => 'view', 'title' => 'Представление', 'className' => 'widget-view'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Дата создания', 'className' => 'widget-created_at'],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Дата обновления', 'className' => 'widget-updated_at'],
            [
                'data' => 'actions',
                'name' => 'actions',
                'title' => 'Действия',
                'orderable' => false,
                'searchable' => false,
                'className' => 'widget-actions vue-component',
            ],
        ];
    }

    protected function getAjaxOptions(): array
    {
        return [
            'url' => route('inetstudio.widgets-package.widgets.back.data.index'),
            'type' => 'POST',
        ];
    }

    protected function getParameters(): array
    {
        $translation = trans('admin::datatables');

        return [
            'order' => [4, 'desc'],
            'paging' => true,
            'pagingType' => 'full_numbers',
            'searching' => true,
            'info' => false,
            'searchDelay' => 350,
            'language' => $translation,
        ];
    }
}
