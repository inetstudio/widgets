<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\WidgetsPackage\Widgets\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back',
    ],
    function () {
        Route::resource(
            'widgets',
            'ResourceControllerContract',
            [
                'only' => [
                    'show', 'store', 'update', 'destroy',
                ],
                'as' => 'back'
            ]
        );

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
        Route::post('widget/{id}', 'ItemsControllerContract@getItemContent')->name('front.widget.get');
    }
);
