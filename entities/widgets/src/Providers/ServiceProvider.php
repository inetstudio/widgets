<?php

namespace InetStudio\WidgetsPackage\Widgets\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Загрузка сервиса.
     */
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerFormComponents();
        $this->registerBladeDirectives();
    }

    /**
     * Регистрация команд.
     */
    protected function registerConsoleCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            'InetStudio\WidgetsPackage\Widgets\Console\Commands\SetupCommand',
            'InetStudio\WidgetsPackage\Widgets\Console\Commands\CreateFoldersCommand',
        ]);
    }

    /**
     * Регистрация ресурсов.
     */
    protected function registerPublishes(): void
    {
        $this->publishes(
            [
                __DIR__.'/../../config/widgets.php' => config_path('widgets.php'),
            ],
            'config'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../../config/filesystems.php',
            'filesystems.disks'
        );

        if (Schema::hasTable('widgets')) {
            return;
        }

        $timestamp = date('Y_m_d_His', time());
        $this->publishes(
            [
                __DIR__.'/../../database/migrations/create_widgets_tables.php.stub' => database_path(
                    'migrations/'.$timestamp.'_create_widgets_tables.php'
                ),
            ],
            'migrations'
        );
    }

    /**
     * Регистрация путей.
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Регистрация представлений.
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.widgets');
    }

    /**
     * Регистрация компонентов форм.
     */
    protected function registerFormComponents()
    {
        FormBuilder::component(
            'widgets',
            'admin.module.widgets::back.forms.fields.widgets',
            [
                'name' => null,
                'value' => null,
                'attributes' => null
            ]
        );
    }

    /**
     * Регистрация директив blade.
     */
    protected function registerBladeDirectives()
    {
        Blade::directive('widget', function ($expression) {
            $widgetsService = app()->make('InetStudio\WidgetsPackage\Widgets\Contracts\Services\Front\ItemsServiceContract');

            return $widgetsService->getItemContent($expression);
        });
    }
}
