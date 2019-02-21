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

Route::get('/users', 'UsersController@index')->name('users');

Route::prefix('/users/{user_id}/projects')->group(function () {
    Route::get('/', 'ProjectsController@index')->name('projects');
    Route::get('/create', 'ProjectsController@create')->name('create_project');
    Route::post('/store', 'ProjectsController@store')->name('store_projects');
});
