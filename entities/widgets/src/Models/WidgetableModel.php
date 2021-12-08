<?php

namespace InetStudio\WidgetsPackage\Widgets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetableModelContract;

class WidgetableModel extends Model implements WidgetableModelContract
{

    protected $table = 'widgetables';

    protected $fillable = [
        'widget_model_id',
        'widgetable_id',
        'widgetable_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function widget(): BelongsTo
    {
        $widgetModel = resolve('InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract');

        return $this->belongsTo(
            get_class($widgetModel),
            'widget_model_id'
        );
    }
}
