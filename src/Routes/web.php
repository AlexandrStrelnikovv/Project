<?php

use App\controllers\ArticleController;
use App\routing\Route;


Route::get('/', [ArticleController::class, 'index']);
Route::get('/createTask', [ArticleController::class, 'createTask']);
