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

Route::get('/test', function(){
    return App\Tag::find(4)->post;
});

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

     Route::get('/posts/delete{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'
    ]);

     Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/posts/kill{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'
    ]);

     Route::get('/posts/restore{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

     Route::get('/posts/edit{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);

    Route::post('/posts/update{id}',[
        'uses' => 'PostsController@update',
        'as' => 'posts.update'
    ]);

     Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
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

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);
    
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

     Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);
});


