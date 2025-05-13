<?php

namespace App\Core\Routing;

use App\Http\Request;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Router
{
    public function __construct(private readonly Request $request)
    {
    }

    public function routing() :array
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) 
        {
            
            foreach (Route::$routes as $route)
            {   
                $method = $route[0];
                $collector->$method($route[1], $route[2]);
            }
        });

        $info = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
        [$status, [$controller, $method], $vars] = $info;
        return ['status' => $status, 'controller' => $controller, 'method' => $method, 'vars' => $vars];
    }
}