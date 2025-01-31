<?php

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

//Route::group(['domain' => 'links.limix.eu'], function () {
//    Route::get('/', 'App\Http\Controllers\LinkController@djIndex');
//});
//
//Route::group(['domain' => 'link.limix.eu'], function () {
//    Route::get('redirect', [
//        'uses' => 'App\Http\Controllers\LinkController@redirect',
//        'as'   => 'redirect.dj'
//    ]);
//});
//
//Route::group(['domain' => 'links.limixmedia.com'], function () {
//    Route::get('/', 'App\Http\Controllers\LinkController@mediaIndex');
//});
//
//Route::group(['domain' => 'link.limixmedia.com'], function () {
//    Route::get('redirect', [
//        'uses' => 'App\Http\Controllers\LinkController@redirect',
//        'as'   => 'redirect.media'
//    ]);
//});

//Route::group(['domain' => 'letsdance.limix.eu'], function () {
Route::get('/', [
    'uses' => 'App\Http\Controllers\LetsDanceController@index',
    'as'   => 'home'
]);

Route::get('login', [
    'as'   => 'login',
    'uses' => 'App\Http\Controllers\Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as'   => '',
    'uses' => 'App\Http\Controllers\Auth\LoginController@login'
]);
Route::post('logout', [
    'as'   => 'logout',
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout'
]);

Route::get('{ld}', [
    'uses' => 'App\Http\Controllers\LetsDanceController@show',
    'as'   => 'ld.show'
]);
//});

//Route::get('/', [
//    'as'   => 'home',
//    'uses' => 'App\Http\Controllers\PagesController@homepage'
//]);
//
//Route::get('/writing/{slug}', [
//    'as'   => 'writing',
//    'uses' => 'App\Http\Controllers\PagesController@writing'
//]);
//
//Route::get('2022/{redirect?}', 'App\Http\Controllers\PagesController@yearmix2022');
//
//Route::get('sitemap', 'App\Http\Controllers\Controller@sitemap');
