<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WebsitesController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ArticleController;
use App\Models\Article;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view(
        'website.index',
        [
            'controller'    => 'websites',
            'title'         => 'website',
            'articles'      => Article::all()
        ]
    );
});

Route::resource('websites', WebsitesController::class)->scoped(['websites' => 'slug']);

Route::resource('category', CategoryController::class)->scoped(['category' => 'slug']);

Route::resource('article', ArticleController::class)->scoped(['article' => 'slug']);
