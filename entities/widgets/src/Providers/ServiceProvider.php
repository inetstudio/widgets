<?php

namespace InetStudio\WidgetsPackage\Widgets\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerFormComponents();
        $this->registerBladeDirectives();
    }

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

    protected function registerPublishes(): void
    {
        $this->publishes(
            [
                __DIR__.'/../../config/inetstudio.widgets-package.widgets.php' => config_path('inetstudio.widgets-package.widgets.php'),
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
                __DIR__.'/../../database/migrations/create_widgets_package_widgets_tables.php.stub' => database_path(
                    'migrations/'.$timestamp.'_create_widgets_package_widgets_tables.php'
                ),
            ],
            'migrations'
        );
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'inetstudio.widgets-package.widgets');
    }

    protected function registerFormComponents(): void
    {
        FormBuilder::component(
            'widgets',
            'inetstudio.widgets-package.widgets::back.forms.fields.widgets',
            [
                'name' => null,
                'value' => null,
                'attributes' => null
            ]
        );
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('widget', function ($expression) {
            $renderAction = resolve('InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Front\RenderActionContract');
            $renderData = resolve(
                'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract',
                [
                    'args' => [
                        'id' => $expression,
                    ],
                ]
            );

            return $renderAction->execute($renderData);
        });
    }
}
