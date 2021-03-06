<?php

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
    return view('welcome/welcome');
})->name('welcome');

Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/view/{id}', 'ArticlesController@view')->name('article-view');
Route::get('/comments', 'CommentsController@index');
//Route::get('/auth/state', 'AuthStateController@state');
//Route::get('/register', 'AuthController@register');
//Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/comments/create', 'CommentsController@create')->name('comment-add')->middleware('checkAuth');



Auth::routes();

// для избежания ошибки post при logout
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');
