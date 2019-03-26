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
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    
    Route::get('/posts/create', [
        'uses' => 'PostsController@create',
        'as' => 'posts.blog'
    ]);

    Route::post('/posts/store', [
        'uses' => 'PostsController@store',
        'as' => 'posts.store'
    ]);

    Route::get('/categories/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'categories.create'
    ]);

    Route::post('/categories/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'categories.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/categories/edit{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'categories.edit'
    ]);

     Route::get('/categories/delete{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'categories.delete'
    ]);

    Route::post('/categories/update{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'categories.update'
    ]);
});


