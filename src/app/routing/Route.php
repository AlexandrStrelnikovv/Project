<?php

namespace App\routing;
Class Route
{
    public static array $routes = [];
    public static function get(string $uri, array $controller) :void
    {
        self::$routes[] = ['get' ,$uri, $controller];
    }
}