<?php

namespace App\Controllers;
use App\Http\Response;
use App\Models\Test;
use League\Container\Container;

class ArticleController
{
    public function  __construct(
        public Container $container
    )
    {

    }
    public function index()
    {
        $twig = $this->container->get('Twig');
        //dd($twig->render('index.html.twig', ['test' => 'proverka na 123 {{ }}']));
        return new Response($twig->render('index.html.twig'), '502', 'test');
    }

    public function article()
    {
        dd('test Article');
    }
}