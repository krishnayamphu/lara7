<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'Users\UsersController@index')->name('user.index');
Route::get('/users/{id}/edit','Users\UsersController@edit')->name("user.edit");
Route::match(['put','patch'],'users/{id}','Users\UsersController@update')->name("user.update");
Route::delete('users/{id}', 'Users\UsersController@destroy')->name('user.delete');

Route::resource('/todo','TodoController');