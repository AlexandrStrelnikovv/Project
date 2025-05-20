<?php

use App\Http\Request;
use App\Http\Kernel;

define('BASE_PATH', dirname(__DIR__));
require '../vendor/autoload.php';
require BASE_PATH . '/Routes/web.php';

$container = require BASE_PATH . '/app/Container/Services.php';

$kernel = $container->get('Kernel-class')->handle();
$kernel->send();


