<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {
Route::get('/', 'Admin\IndexController@index')->name('admin-index');
    Route::get('/articles', 'Admin\ArticlesAdminController@index')->name('admin-articles');

});
