<?php

namespace App\container;

use App\controllers\ArticleController;
use App\Http\Kernel;
use App\Http\Request;
use App\models\Task;
use App\routing\Router;
use League\Container\Container;
use App\database\db\DB;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\models\UserModel;

$container = new Container();
$dbParam = require BASE_PATH . '/app/config/db.php';

// Core class
$container->add('Kernel-class', kernel::class)->addArguments([Request::getGlobals(), $container]);
$container->add('Router-class', Router::class)->addArgument(Request::getGlobals());

// Controllers
$container->add('ArticleController-class', ArticleController::class)->addArgument($container);

//Models
$container->add('UserModel',UserModel::class)->addArgument($container);
$container->add('Task', Task::class)->addArgument($container);

//Twig
$container->add('Twig-loader', FilesystemLoader::class)->addArgument(BASE_PATH . '/public/views');
$container->add('Twig', Environment::class)->addArgument('Twig-loader');

//RedBean
$container->add('DataBase', DB::class)->addArguments([$dbParam['host'], $dbParam['dbname'], $dbParam['user'], $dbParam['password']]);
return $container;
