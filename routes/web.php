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

Auth::routes();

Route::get('/', function () {
    return redirect('/tasks');
});



//Route::get('/home', 'HomeController@index');

# Routes for TaskController
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('auth/google', 'Auth\LoginController@redirectToProvider');
Route::get('auth/google-callback', 'Auth\LoginController@handleProviderCallback');