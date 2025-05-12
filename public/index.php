<?php


use App\Http\app;
use App\Http\Request;
use App\Http\Kernel;

define('BASE_PATH', dirname(__DIR__));
require '../vendor/autoload.php';
include BASE_PATH . '/route/web.php'; 


//(new App())->index();
$globals = Request::getGlobals();
$kernel = (new Kernel($globals))->handle();
$kernel->send();


