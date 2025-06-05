<?php

namespace App\Http;
class Response
{
    public function __construct
    (
        private mixed $content,
        private int $responseCode,
        private string $title
    )
    {

    }

    public function send()
    {      
        echo $this->content; 
    }
}