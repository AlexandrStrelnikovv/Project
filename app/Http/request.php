<?php

namespace App\Http;

class Request 
{
    public function __construct
    (
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $session,
        private readonly array $coockie,
        private readonly array $files
    )
    {

    }

    public static function getGlobals() : static
    {
        return new static($_GET, $_POST, $_SERVER, $_SESSION = [], $_COOKIE, $_FILES);
    }
    
    public function get()
    {
        return self::$get;
    }
}