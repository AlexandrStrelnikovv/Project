<?php

namespace App\Http\Routing;

Class Route
{
    public static $routes = [];
    public static function get(string $uri, array $controller)
    {
        self::$routes[] = ['get' ,$uri, $controller];
    }
}