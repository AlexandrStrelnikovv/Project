<?php

namespace App\Http;
use App\Http\Routing\Route;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function __construct(private readonly Request $request)
    {

    }

    public function handle() : Response 
    {
             
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) 
        {
            
            foreach (Route::$routes as $route)
            {   
                $method = $route[0];
                $collector->$method($route[1], $route[2]);
            }
            // $collector->get('/', function () 
            //     {
            //         return new Response('test', '401', 'test');
            //     });
        });
        
        $info = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
        [$status, [$controller, $method], $vars] = $info;
        $route = call_user_func_array([new $controller, $method], $vars);
        return $route;
        
    }
        
        

}