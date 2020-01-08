<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {
    Route::get('/', 'Admin\IndexController@index')->name('admin-index');
    Route::get('/articles', 'Admin\ArticlesAdminController@index')->name('admin-articles');
    Route::get('/articles/edit/{id}', 'Admin\ArticlesAdminController@edit')->name('admin-articles-edit');
    Route::get('/articles/remove/{id}', 'Admin\ArticlesAdminController@remove')->name('admin-articles-remove');
});
