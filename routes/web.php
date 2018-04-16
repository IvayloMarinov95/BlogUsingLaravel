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

Route::get('/posts/index', 'PostController@index')->name('posts.index');
Route::get('/posts/add','PostController@add')->name('posts.add');
Route::get('/posts/addcomment','PostController@add')->name('posts.addcomment');
Route::post('/posts/add','PostController@createPost')->name('posts.store');
Route::post('/posts/addcomment/','PostController@createComment')->name('posts.storecomment');
Route::get('/posts/info/{id}', 'PostController@info')->name('posts.info');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostController@update')->name('posts.update');
Route::post('/posts/delete/{id}', 'PostController@delete')->name('posts.delete');
Route::post('/posts/deletecomment{id}', 'PostController@deleteComment')->name('posts.deletecomment');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
