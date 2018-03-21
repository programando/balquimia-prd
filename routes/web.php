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


Route::get('listado'             , 'ProductosController@Listado')->name('productos.listado');

Route::get('imagenes'            , 'ProductosController@Imagenes')->name('productos.imagenes');

Route::get('tabs/{idproducto}'   , 'ProductosController@Tabs')->name('productos.tabs');
Route::get('tabs-detalle/{idtab}'   , 'ProductosController@TabsDetalle')->name('productos.tab.detalle');










