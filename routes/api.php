<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['domain' => 'blog.limix.eu'], function () {
    Route::get('/articles', 'ArticleController@getArticles');
    Route::get('/article/{slug}', 'ArticleController@getArticle');
    Route::get('/tag/{slug}', 'TagController@getTagArticles');
});

Route::group(['domain' => 'dj.limix.eu'], function () {
    Route::post('contact', 'PagesController@contactDJ');
    Route::get('ig', 'PagesController@ig');
    Route::get('production', 'ProductionController@getAll');
});

Route::group(['domain' => 'limixmedia.com'], function () {
    Route::get('projects', 'ProjectsController@getProjects');
    Route::get('project/{slug}', 'ProjectsController@getProject');
    Route::post('contact', 'PagesController@contactMedia');
});
