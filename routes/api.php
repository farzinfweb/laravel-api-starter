<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/** @var $router Illuminate\Routing\Router */

$router->middleware('auth:sanctum')->group(function (Router $router) {
    $router->get('users/self', [\App\Http\Controllers\UserController::class, 'self'])->name('users.self');
});
