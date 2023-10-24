<?php

use MyProject\Controllers\ArticlesController;
use MyProject\Controllers\CommentsController;
use MyProject\Controllers\MainController;
use MyProject\Controllers\UsersController;

return [
    '~^/articles/(\d+)$~' => [ArticlesController::class, 'view'],
    '~^/articles/(\d+)/edit$~' => [ArticlesController::class, 'edit'],
    '~^/articles/(\d+)/delete$~' => [ArticlesController::class, 'delete'],
    '~^/articles/create$~' => [ArticlesController::class, 'create'],
    '~^/articles/(\d+)/comments/create$~' => [CommentsController::class, 'create'],
    '~^/articles/comments/(\d+)/edit$~' => [CommentsController::class, 'edit'],
    '~^/users/register$~' => [UsersController::class, 'signUp'],
    '~^/users/login$~' => [UsersController::class, 'login'],
    '~^/users/logout$~' => [UsersController::class, 'logout'],
    '~^/users/(\d+)/activate/(.+)$~' => [UsersController::class, 'activate'],
    '~^/$~' => [MainController::class, 'main'],
];
