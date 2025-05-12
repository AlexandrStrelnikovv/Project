<?php

namespace App\Controllers;

use App\Http\Response;

class ArticleController 
{
    public function index()
        {
            return new Response('test1', '301', 'test');
        }

    public function  getArticle()
    {
        return new Response('test2', '301', 'test');
    }

    public function artice(int $id)
    {
        return new Response($id, '301', 'test');
    }
}