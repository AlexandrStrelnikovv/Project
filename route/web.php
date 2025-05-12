<?php

use App\Http\Routing\Route;
use App\Controllers\ArticleController;


Route::get('/', [ArticleController::class, 'index']);
Route::get('/index/article', [ArticleController::class, 'getArticle']);
Route::get('/article/{id:\d+}', [ArticleController::class, 'artice']);
