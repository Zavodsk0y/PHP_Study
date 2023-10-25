<?php

use MyProject\Controllers\ArticlesController;
use MyProject\Controllers\MainController;

return [
    '~^/articles/(\d+)$~' => [ArticlesController::class, 'view'],
    '~^/articles/(\d+)/edit$~' => [ArticlesController::class, 'edit'],
    '~^/articles/(\d+)/delete$~' => [ArticlesController::class, 'delete'],
    '~^/articles/create$~' => [ArticlesController::class, 'create'],
    '~^/$~' => [MainController::class, 'main'],
];