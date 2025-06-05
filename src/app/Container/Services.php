<?php

namespace App\Container;

use App\Controllers\ArticleController;
use App\Http\Kernel;
use App\Http\Request;
use App\Routing\Router;
use League\Container\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

$container = new Container();
//test
$dbParam = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'test',
    'host' => 'localhost',
];
$entityPath = BASE_PATH . '/app/Entity';

// Core class
$container->add('Kernel-class', kernel::class)->addArguments([Request::getGlobals(), $container]);
$container->add('Router-class', Router::class)->addArgument(Request::getGlobals());

// Controllers
$container->add('ArticleController-class', ArticleController::class)->addArgument($container);

//Twig
$container->add('Twig-loader', FilesystemLoader::class)->addArgument(BASE_PATH . '/views');
$container->add('Twig', Environment::class)->addArgument('Twig-loader');

//Doctrine
$container->add('DoctrineConfig', ORMSetup::createAttributeMetadataConfiguration($dbParam));
$container->add('DoctrineDbConnection', DriverManager::getConnection($dbParam));
$container->add('EntityManager',  EntityManager::class)->addArguments([$container->get('DoctrineDbConnection'), $container->get('DoctrineConfig')]);

return $container;
