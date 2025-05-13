<?php

namespace App\Http;
use App\Core\Routing\Router;

class Kernel
{
    public function __construct(private readonly Request $request)
    {

    }

    public function handle() : Response 
    {
        $routerInfo = (new Router($this->request))->routing();
        extract($routerInfo);
        $route = call_user_func_array([new $controller, $method], $vars);
        return $route; 
    }
        
        

}