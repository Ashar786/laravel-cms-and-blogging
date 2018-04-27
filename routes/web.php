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

Route::group(['prefix'=> 'admin' , 'middleware' => 'auth' ],function (){
    Route::get('/post/create', [
        'uses' => 'postsController@create',
        'as' => 'post.create'
    ]);

    Route::get('/home', [
        'uses' =>'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post', [
        'uses' => 'postsController@index',
        'as' => 'post.view'
    ]);
    Route::post('/post/store', [
        'uses' => 'postsController@store',
        'as' => 'post.store'
    ]);

    Route::delete('/post/delete/{id}', [
        'uses' => 'postsController@destroy',
        'as' => 'post.delete'
    ]);
    Route::get('/category', [
            'uses' => 'CategoryController@index',
            'as' => 'category'
        ]);

    Route::get('/category/create', [
            'uses' => 'CategoryController@create',
            'as' => 'category.create'
        ]);
    Route::post('/category/store', [
            'uses' => 'CategoryController@store',
            'as' => 'category.store'
        ]);
    Route::get('/category/edit/{id}', [
            'uses' => 'CategoryController@edit',
            'as' => 'category.edit'
        ]);

    Route::post('/category/update/{id}', [
            'uses' => 'CategoryController@update',
            'as' => 'category.update'
        ]);
    Route::get('/category/delete/{id}', [
            'uses' => 'CategoryController@destroy',
            'as' => 'category.delete'
        ]);

});



Auth::routes();


