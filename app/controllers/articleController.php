<?php

namespace App\Controllers;

use App\Http\Response;
use App\controllers\Controller;
class ArticleController extends Controller
{
    public function index()
        {
            return new Response('Main page', '301', 'test');
        }

    public function  getArticle()
    {
        return new Response('article', '301', 'test');
    }

    public function artice(int $id)
    {
        return new Response($id, '301', 'test');
    }
}