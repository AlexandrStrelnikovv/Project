<?php

namespace App\controllers;
use App\Http\Response;
use League\Container\Container;


class ArticleController
{
    public function  __construct(
        public Container $container,
    )
    {

    }
    public function index()
    {
        $task = $this->container->get('Task')->init();
        $twig = $this->container->get('Twig');
        return new Response($twig->render('taskList.html.twig'), '502', 'test');
    }

    public function createTask()
    {
        $task = $this->container->get('Task')->init();
        $twig = $this->container->get('Twig');
        return new Response($twig->render('taskForm.html.twig'), '502', 'test');
    }

    public function article()
    {
        dd('test Article');
    }
}