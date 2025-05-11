<?php

namespace App\Http;
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
            $collector->get('/', function () 
                {
                    return new Response('test', '401', 'test');
                });
        });

        $info = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
        [$status, $handler, $vars] = $info;
        return $handler($vars);
        //
        //
    }

}