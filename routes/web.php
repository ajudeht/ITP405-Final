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

Route::get('/', 'BoardListController@index');

Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/boards/{id}', ['uses' =>'BoardController@index']);

Route::post('/create-board', 'BoardController@create');
Route::get('/delete-board/{id}', 'BoardController@delete');
Route::post('/share-board', 'BoardController@share');

Route::post('/create-task', 'TaskController@create');
Route::get('/delete-task/{id}', 'TaskController@delete');
Route::post('/update-task-status', 'TaskController@updateStatus');

// Route::get('/boards', 'BoardListController@index');
