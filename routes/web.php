<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/greeting', function () {
//     return 'Hello World';
// });

// Route::get('/layout', function () {
//     return view('articles/layout');
// });

Route::resource('articles', ArticleController::class);
