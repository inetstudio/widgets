<?php

namespace InetStudio\WidgetsPackage\Widgets\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\Uploads\Models\Traits\HasImages;
use Illuminate\Database\Eloquent\Relations\HasMany;
use InetStudio\AdminPanel\Models\Traits\HasJSONColumns;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;

class WidgetModel extends Model implements WidgetModelContract
{
    use HasImages;
    use SoftDeletes;
    use HasJSONColumns;

    const ENTITY_TYPE = 'widget';
    const BASE_MATERIAL_TYPE = 'widget';

    private array $images = [
        'config' => 'widgets',
        'model' => '',
    ];

    protected $table = 'widgets';

    protected $casts = [
        'params' => 'array',
        'additional_info' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTypeAttribute()
    {
        return self::ENTITY_TYPE;
    }

    public function getMaterialTypeAttribute(): string
    {
        return $this->additional_info['material_type'] ?? self::BASE_MATERIAL_TYPE;
    }

    public function widgetables(): HasMany
    {
        $widgetableModel = resolve('InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetableModelContract');

        return $this->hasMany(
            get_class($widgetableModel),
            'widget_model_id'
        );
    }

    public function __call($method, $parameters)
    {
        $config = implode('.', ['inetstudio.widgets-package.widgets.relationships', $method]);

        if (Config::has($config)) {
            $data = Config::get($config);

            $model = isset($data['model']) ? [app()->make($data['model'])] : [];
            $params = $data['params'] ?? [];

            return call_user_func_array([$this, $data['relationship']], array_merge($model, $params));
        }

        return parent::__call($method, $parameters);
    }

    public function getAttribute($key)
    {
        $config = implode('.', ['inetstudio.widgets-package.widgets.relationships', $key]);

        if (Config::has($config)) {
            return $this->getRelationValue($key);
        }

        return parent::getAttribute($key);
    }

    public function getRelationValue($key)
    {
        if ($this->relationLoaded($key)) {
            return $this->relations[$key];
        }

        $config = implode('.', ['inetstudio.widgets-package.widgets.relationships', $key]);

        if (Config::has($config)) {
            return $this->getRelationshipFromMethod($key);
        }

        return parent::getRelationValue($key);
    }
}
