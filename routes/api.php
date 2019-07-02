<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::resource('artikel', 'ArtikelController');
 Route::group(['prefix' => 'artikel'], function(){
 Route::get('/', 'ArtikelController@index');
 Route::get('/create', 'ArtikelController@create');
 Route::post('/store', 'ArtikelController@store');
 Route::get('/show/{kode_barang}', 'ArtikelController@show');
 Route::patch('/destroy/{kode_barang}', 'ArtikelController@destroy');
 Route::patch('/update/{kode_barang}', 'ArtikelController@update');
 Route::get('/search', 'ArtikelController@search');
 });