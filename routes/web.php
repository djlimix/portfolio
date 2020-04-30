<?php

use App\Article;
use App\Project;
use App\Tag;
use Illuminate\Support\Facades\Route;

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

Route::group(['domain' => 'blog.limix.eu'], function () {
    Route::view('/', 'blog');

    // blog posts
    foreach ( Article::select( 'slug' )->get() as $article ) {
        Route::view('/' . $article->slug, 'blog');
    }

    // tagy
    foreach ( Tag::select( 'slug' )->get() as $tag ) {
        Route::view('/tag/' . $tag->slug, 'blog');
    }
});

Route::group(['domain' => 'dj.limix.eu'], function () {
    Route::view('/', 'dj');
    Route::view('/about', 'dj');
    Route::view('/production', 'dj');
    Route::view('/contact', 'dj');
});

Route::group(['domain' => 'limixmedia.com'], function () {
    Route::view('/', 'media');
    Route::view('/about', 'media');
    Route::view('/projects', 'media');
    Route::view('/contact', 'media');
    foreach ( Project::all() as $project ) {
        Route::view('/projects/' . $project->slug, 'media');
    }
});

Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('admin/login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('admin/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', 'AdminController@getIndex');

    Route::group(['prefix' => 'articles'], function () {

        Route::get('/', 'AdminController@getArticles')->name('admin.articles');

        Route::get('/add', 'AdminController@addArticle')->name('admin.articles.add');
        Route::post('/add', 'AdminController@addArticlePost');

        Route::get('/{article}/edit', 'AdminController@editArticle')->name('admin.articles.edit');
        Route::post('/{article}/edit', 'AdminController@editArticlePost');

        Route::get('/{article}/delete', 'AdminController@deleteArticle')->name('admin.articles.delete');

    });

    Route::group(['prefix' => 'dj/production'], function () {

        Route::get('/', 'AdminController@getProduction')->name('admin.production');

        Route::get('/add', 'AdminController@addProduction')->name('admin.production.add');
        Route::post('/add', 'AdminController@addProductionPost');

        Route::get('/{production}/edit', 'AdminController@editProduction')->name('admin.production.edit');
        Route::post('/{production}/edit', 'AdminController@editProductionPost');

        Route::get('/{production}/delete', 'AdminController@deleteProduction')->name('admin.production.delete');

    });

    Route::group(['prefix' => 'media/projects'], function () {

        Route::get('/', 'AdminController@getProjects')->name('admin.projects');

        Route::get('/add', 'AdminController@addProject')->name('admin.projects.add');
        Route::post('/add', 'AdminController@addProjectPost');

        Route::get('/{project}/edit', 'AdminController@editProject')->name('admin.projects.edit');
        Route::post('/{project}/edit', 'AdminController@editProjectPost');

        Route::get('/{project}/delete', 'AdminController@deleteProject')->name('admin.projects.delete');

    });

});
