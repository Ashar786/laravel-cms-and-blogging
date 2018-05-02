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
Route::get('/test', function (){
    return view('test');
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);
Route::get('/posts/current/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::group(['prefix'=> 'admin' , 'middleware' => 'auth' ],function (){
    Route::get('/post/create', [
        'uses' => 'postsController@create',
        'as' => 'post.create'
    ]);
    Route::get('/post/edit/{id}', [
        'uses' => 'postsController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/post/update/{id}', [
        'uses' => 'postsController@update',
        'as' => 'post.update'
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

    Route::get('/post/delete/{id}', [
        'uses' => 'postsController@destroy',
        'as' => 'post.delete'
    ]);
    Route::get('/post/trashed', [
        'uses' => 'postsController@trash',
        'as' => 'post.trash'
    ]);
    Route::get('/post/deleted/{id}', [
        'uses' => 'postsController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restored/{id}', [
        'uses' => 'postsController@restore',
        'as' => 'post.restore'
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

    //Tags
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);
    Route::post('/tags/Create', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);
    Route::get('/tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('/tags/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tags/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    //User
    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);
    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);
    Route::Post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);
    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);
    Route::get('/user/permission/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);
    //Profile
    Route::get('/user/profile', [
        'uses' => 'ProfileController@index',
        'as' => 'profile'
    ]);
    Route::post('/user/profile/update', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
    ]);

    //settings
    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);
    Route::post('/setting/update', [
        'uses' => 'SettingsController@update',
        'as' => 'setting.update'
    ]);
});



Auth::routes();


