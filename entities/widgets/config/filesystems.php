<?php

return [
    'widgets' => [
        'driver' => 'local',
        'root' => storage_path('app/public/widgets'),
        'url' => env('APP_URL').'/storage/widgets',
        'visibility' => 'public',
    ],

];
