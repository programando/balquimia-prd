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

Route::get('/'            , 'TercerosController@getLogin')->name('login');
Route::get('login'            , 'TercerosController@getLogin')->name('login');
Route::post('login'           , 'TercerosController@postLogin')->name('login');
Route::get('logout'           , 'TercerosController@getLogOut')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('productos'  , 'ProductosController@Listado')->name('productos.listado');
    Route::post('imagenes-save'        , 'ProductosController@ImagenesSave')->name('productos.imagenes.save');
    Route::get('imagenes/{producto}'   , 'ProductosController@ImagenesShow')->name('productos.imagenes.show');
    Route::delete('imagenes/{idmagen}' , 'ProductosController@ImagesDelete')->name('tabs.delete');
    Route::get('productos/{idcategoria}'  , 'ProductosController@Categorias')->name('productos.categoria');

    //-------------------------------------------------------------------------------------------
    // TABS
    //-------------------------------------------------------------------------------------------
    Route::delete('tabs/{idtab}'        , 'ProductosTabsController@Delete')->name('tabs.delete');
    Route::get('tabs-detalle/{idtab}'   , 'ProductosTabsController@Detalle')->name('tab.detalle');
    Route::get('tabs/{idproducto}'      , 'ProductosTabsController@Show')->name('tabs.show');
    Route::post('tabs'                  , 'ProductosTabsController@Update')->name('tab.grabar');

});













