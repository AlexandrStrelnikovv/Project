<?php

namespace App\Http;
use App\routing\Router;
use League\Container\Container;

class Kernel
{
    public Container $container;
    public function __construct(private readonly Request $request, Container $container)
    {
        $this->container = $container;
    }

    public function handle() : Response 
    {
        $routerInfo = $this->container->get('Router-class')->routing();
        extract($routerInfo);
        return $this->container->get('ArticleController-class')->$method();
    }
}