<?php

namespace InetStudio\WidgetsPackage\Widgets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetableModelContract;

/**
 * Class WidgetableModel.
 */
class WidgetableModel extends Model implements WidgetableModelContract
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'widgetables';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'widget_model_id',
        'widgetable_id',
        'widgetable_type',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Обратное отношение "один ко многим" с моделью виджета.
     *
     * @return BelongsTo
     *
     * @throws BindingResolutionException
     */
    public function widget()
    {
        $widgetModel = app()->make('InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract');

        return $this->belongsTo(
            get_class($widgetModel),
            'widget_model_id'
        );
    }
}
