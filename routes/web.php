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
Route::get('/'            , 'HomeController@Index')->name('home');
Route::get('/', 'HomeController@Index')->name('index');
Route::get('logout'           , 'TercerosController@getLogOut')->name('cerrar-sistema');
Route::get('modify-image'    , 'TercerosController@ModifyImage')->name('modify-image');
Route::post('modify-image'    , 'TercerosController@UpdateImage')->name('modify-image');













