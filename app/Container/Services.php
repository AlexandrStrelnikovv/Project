<?php

namespace App\Container;

use App\Controllers\ArticleController;
use App\Http\Kernel;
use App\Http\Request;
use App\Routing\Router;
use League\Container\Container;

$container = new Container();

// Core class
$container->add('Kernel-class', kernel::class)->addArguments([Request::getGlobals(), $container]);
$container->add('Router-class', Router::class)->addArgument(Request::getGlobals());

// Controllers
$container->add('ArticleController-class', ArticleController::class);

return $container;
