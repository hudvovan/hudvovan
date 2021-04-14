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

Route::get('/news', '\App\Http\Controllers\NewsController@allData') -> name('news-form');

Route::get('/news/all', '\App\Http\Controllers\NewsController@allData') -> name('news-form');

Route::post('/news/insert', '\App\Http\Controllers\NewsController@submitInsert') -> name('news-form-insert');

Route::post('/news/update', '\App\Http\Controllers\NewsController@submitUpdate') -> name('news-form-update');

Route::get('/news/delete/{str_id}', '\App\Http\Controllers\NewsController@submitDelete') -> name('news-form-delete');

