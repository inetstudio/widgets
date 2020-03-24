<?php

namespace InetStudio\Widgets\Http\Controllers\Front;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Foundation\Application;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\Widgets\Contracts\Http\Controllers\Front\WidgetsControllerContract;

/**
 * Class WidgetsController.
 */
class WidgetsController extends Controller implements WidgetsControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    private $services;

    /**
     * WidgetsController constructor.
     *
     * @param  Application  $app
     *
     * @throws BindingResolutionException
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->services['widgets'] = app()->make('InetStudio\Widgets\Contracts\Services\Front\WidgetsServiceContract');
    }

    /**
     * Получаем содержимое виджета.
     *
     * @param $id
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function getWidget($id): string
    {
        if (is_numeric($id)) {
            return $this->services['widgets']->getWidgetContent($id);
        } else if (is_string($id)) {
            parse_str($id, $params);

            if (! isset($params['view'])) {
                return '';
            }

            return view($params['view'], Arr::except($params, ['view']))->render();
        }

        return '';
    }
}
