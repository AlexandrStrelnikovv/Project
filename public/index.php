<?php


use App\Http\app;
use App\Http\Request;
use App\Http\Kernel;


require '../vendor/autoload.php';


//(new App())->index();
$globals = Request::getGlobals();
$kernel = (new Kernel($globals))->handle();
$kernel->send();


