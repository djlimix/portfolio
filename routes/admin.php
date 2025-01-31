<?php

Route::get('/', 'AdminController@index');

Route::name('admin.')->group(function () {
    Route::resource('articles', 'ArticleController')->except('show');
    Route::resource('links', 'LinkController')->except('show');
    Route::resource('projects', 'ProjectController')->except('show');
    Route::resource('ld', 'LetsDanceController')->except('show');
    Route::get('migrate', 'AdminController@migrate')->name('migrate');
    Route::get('config', 'AdminController@cache')->name('cache');
});
