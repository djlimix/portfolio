<?php

use App\Project;
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

Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\Auth\LoginController@showLoginForm'
]);
Route::post('admin/login', [
    'as' => '',
    'uses' => 'App\Http\Controllers\Auth\LoginController@login'
]);
Route::post('admin/logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout'
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', 'App\Http\Controllers\AdminController@getIndex');

    Route::group(['prefix' => 'articles'], function () {

        Route::get('/', 'App\Http\Controllers\AdminController@getArticles')->name('admin.articles');

        Route::get('/add', 'App\Http\Controllers\AdminController@addArticle')->name('admin.articles.add');
        Route::post('/add', 'App\Http\Controllers\AdminController@addArticlePost');

        Route::get('/{article}/edit', 'App\Http\Controllers\AdminController@editArticle')->name('admin.articles.edit');
        Route::post('/{article}/edit', 'App\Http\Controllers\AdminController@editArticlePost');

        Route::get('/{article}/delete', 'App\Http\Controllers\AdminController@deleteArticle')->name('admin.articles.delete');

    });

    Route::group(['prefix' => 'dj'], function () {
        Route::group(['prefix' => 'production'], function () {

            Route::get('/', 'App\Http\Controllers\AdminController@getProduction')->name('admin.production');

            Route::get('/add', 'App\Http\Controllers\AdminController@addProduction')->name('admin.production.add');
            Route::post('/add', 'App\Http\Controllers\AdminController@addProductionPost');

            Route::get('/{production}/edit', 'App\Http\Controllers\AdminController@editProduction')->name('admin.production.edit');
            Route::post('/{production}/edit', 'App\Http\Controllers\AdminController@editProductionPost');

            Route::get('/{production}/delete', 'App\Http\Controllers\AdminController@deleteProduction')->name('admin.production.delete');

        });

        Route::group(['prefix' => 'links'], function () {

            Route::get('/', 'App\Http\Controllers\AdminController@getDjLinks')->name('admin.dj.links');

            Route::get('/add', 'App\Http\Controllers\AdminController@addLink')->name('admin.dj.links.add');
            Route::post('/add', 'App\Http\Controllers\AdminController@storeLink');

            Route::get('/{link}/edit', 'App\Http\Controllers\AdminController@editLink')->name('admin.dj.links.edit');
            Route::post('/{link}/edit', 'App\Http\Controllers\AdminController@updateLink');

            Route::get('/{link}/delete', 'App\Http\Controllers\AdminController@deleteLink')->name('admin.dj.links.delete');

        });
    });

    Route::group(['prefix' => 'media'], function() {
        Route::group(['prefix' => 'projects'], function () {

            Route::get('/', 'App\Http\Controllers\AdminController@getProjects')->name('admin.projects');

            Route::get('/add', 'App\Http\Controllers\AdminController@addProject')->name('admin.projects.add');
            Route::post('/add', 'App\Http\Controllers\AdminController@addProjectPost');

            Route::get('/{project}/edit', 'App\Http\Controllers\AdminController@editProject')->name('admin.projects.edit');
            Route::post('/{project}/edit', 'App\Http\Controllers\AdminController@editProjectPost');

            Route::get('/{project}/delete', 'App\Http\Controllers\AdminController@deleteProject')->name('admin.projects.delete');

        });

        Route::group(['prefix' => 'links'], function () {

            Route::get('/', 'App\Http\Controllers\AdminController@getMediaLinks')->name('admin.media.links');

            Route::get('/add', 'App\Http\Controllers\AdminController@addLink')->name('admin.media.links.add');
            Route::post('/add', 'App\Http\Controllers\AdminController@storeLink');

            Route::get('/{link}/edit', 'App\Http\Controllers\AdminController@editLink')->name('admin.media.links.edit');
            Route::post('/{link}/edit', 'App\Http\Controllers\AdminController@updateLink');

            Route::get('/{link}/delete', 'App\Http\Controllers\AdminController@deleteLink')->name('admin.media.links.delete');

        });
    });

});

/*Route::group(['domain' => 'blog.limix.eu'], function () {
    Route::get('/', [
        'as'    => 'blog.home',
        'uses'  => App\Http\Livewire\Blog\Home::class
    ]);

    Route::get('{article}', [
        'as'    => 'blog.article',
        'uses'  => \App\Http\Livewire\Blog\Article::class
    ]);

    Route::get('tag/{tag}', [
        'as'    => 'blog.tag',
        'uses'  => \App\Http\Livewire\Blog\Tag::class
    ]);
});*/

/*Route::group(['domain' => 'dj.limix.eu'], function () {
    Route::view('/', 'dj')->name('dj');
    Route::view('/about', 'dj');
    Route::view('/production', 'dj');
    Route::view('/contact', 'dj');
});

Route::group(['domain' => 'limixmedia.com'], function () {
    Route::view('/', 'media')->name('media');
    Route::view('/about', 'media');
    Route::view('/projects', 'media');
    Route::view('/contact', 'media');
    foreach ( Project::all() as $project ) {
        Route::view('/projects/' . $project->slug, 'media');
    }
});*/

Route::group(['domain' => 'links.limix.eu'], function () {
    Route::get('/', 'App\Http\Controllers\LinkController@djIndex');
});

Route::group(['domain' => 'link.limix.eu'], function () {
    Route::get('redirect', [
        'uses'  => 'App\Http\Controllers\LinkController@redirect',
        'as'    => 'redirect.dj'
    ]);
});

Route::group(['domain' => 'links.limixmedia.com'], function () {
    Route::get('/', 'App\Http\Controllers\LinkController@mediaIndex');
});

Route::group(['domain' => 'link.limixmedia.com'], function () {
    Route::get('redirect', [
        'uses'  => 'App\Http\Controllers\LinkController@redirect',
        'as'    => 'redirect.media'
    ]);
});

Route::get('/', [
    'as' => 'home',
    'uses' => 'App\Http\Controllers\PagesController@homepage'
]);

Route::get('/writing/{slug}', [
    'as' => 'writing',
    'uses' => 'App\Http\Controllers\PagesController@writing'
]);

Route::get('sitemap', 'App\Http\Controllers\Controller@sitemap');
