<?php

Route::get('/', 'AdminController@index');

Route::name('admin.')->group(function () {
    Route::resource('ld', 'LetsDanceController')->except('show');
});
