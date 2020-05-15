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
//首頁
Route::get('/', function () {
    return view('welcome');
});
//顯示留言
Route::get('guestbook', 'GusetbookController@index');
//上傳留言
Route::post('guestbook', 'GusetbookController@store');
//編輯留言
Route::get('guestbook/{id}/edit', 'GusetbookController@edit');
//更新留言
Route::put('guestbook/{id}', 'GusetbookController@update');
//刪除留言
Route::delete('guestbook/{id}', 'GusetbookController@destroy');

Auth::routes();


