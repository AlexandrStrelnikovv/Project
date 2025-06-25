<?php

namespace App\routing;

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

        $info = $dispatcher->dispatch(($this->request)->getMethod(), ($this->request)->getURI());
        [$status, [$controller, $method], $vars] = $info;

        $this->routeCheck($status);
        return ['status' => $status, 'controller' => $controller, 'method' => $method, 'vars' => $vars];
    }

    public function routeCheck(int $status) :void
    {
        switch ($status)
        {
            case 0:
                dd('Страница не найдена');
            case 2:
                dd('Ошибка 405 (Method Not Allowed)');
        }
    }
}