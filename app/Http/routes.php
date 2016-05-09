<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'api'],function(){
    Route::group(['prefix'=>'v1'],function(){
        Route::resource('todoList','TodoListController',
            ['except' => ['create', 'edit']]);
        Route::resource('todoList.todo','TodoController',
            ['except' => ['create', 'edit']]);
    });
});