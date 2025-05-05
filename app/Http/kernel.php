<?php

namespace App\Http;
use Symfony\Component\Routing\Attribute\Route;

class Kernel
{
    public function __construct(private readonly Request $request)
    {

    }

    public function handle() : Response 
    {
        $content = '<div>Test</div>';
        $test = new Route('/', 'get',);

        dd($test);
        return new Response($content, '301', '');
    }

}