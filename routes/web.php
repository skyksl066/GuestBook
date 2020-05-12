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
Route::get('post', 'GusetbookController@index');
Route::get('post/create', 'GusetbookController@create');
Route::post('post', 'GusetbookController@store');
Route::get('post/{id}', 'GusetbookController@show');
Route::get('post/{id}/edit', 'GusetbookController@edit');
Route::put('post/{id}', 'GusetbookController@update');
Route::delete('post/{id}', 'GusetbookController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
