<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/widgets-package',
    ],
    function () {
        Route::any('widgets/data/index', 'DataControllerContract@getIndexData')
            ->name('inetstudio.widgets-package.widgets.back.data.index');

        Route::resource(
            'widgets',
            'ResourceControllerContract'
        )->names([
            'index' => 'inetstudio.widgets-package.widgets.back.resource.index',
            'store' => 'inetstudio.widgets-package.widgets.back.resource.store',
            'show' => 'inetstudio.widgets-package.widgets.back.resource.show',
            'update' => 'inetstudio.widgets-package.widgets.back.resource.update',
            'destroy' => 'inetstudio.widgets-package.widgets.back.resource.destroy',
        ]);

        Route::post('widgets/gallery/save', 'GalleryWidgetsControllerContract@attachImagesToWidget')->name('back.widgets.gallery.save');
        Route::get('widgets/gallery/get', 'GalleryWidgetsControllerContract@getWidgetImages')->name('back.widgets.gallery.get');
    }
);

Route::group(
    [
        'namespace' => 'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Front',
        'middleware' => ['web'],
    ],
    function () {
        Route::post('widgets-package/widgets/{id}/render', 'ItemsControllerContract@render')->name('inetstudio.widgets-package.widgets.front.item.render');
    }
);
