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

Route::get('logout'           , 'TercerosController@getLogOut')->name('logout');


Route::get('/'             , 'ProductosController@Listado')->name('productos.listado');
Route::get('imagenes/{producto}/{idimagen}'      , 'ProductosController@Imagenes')->name('productos.imagenes');
Route::post('imagenes-save'      , 'ProductosController@ImagenesSave')->name('productos.imagenes.save');

//-------------------------------------------------------------------------------------------
// TABS
//-------------------------------------------------------------------------------------------
Route::delete('tabs/{idtab}'        , 'ProductosTabsController@Delete')->name('tabs.delete');
Route::get('tabs-detalle/{idtab}'   , 'ProductosTabsController@Detalle')->name('tab.detalle');
Route::get('tabs/{idproducto}'      , 'ProductosTabsController@Show')->name('tabs.show');
Route::post('tabs'                  , 'ProductosTabsController@Update')->name('tab.grabar');











