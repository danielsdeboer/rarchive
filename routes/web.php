<?php

use App\Http\Controllers\IndexController;
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */
$router = resolve(Router::class);

$router->get('/', IndexController::class)->name('index');
