<?php

use App\Controllers\ArticleController;
use App\Core\Routing\Route;


Route::get('/', [ArticleController::class, 'index']);
Route::get('/index/article', [ArticleController::class, 'getArticle']);
Route::get('/article/{id:\d+}', [ArticleController::class, 'artice']);
