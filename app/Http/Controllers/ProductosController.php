<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductosController extends Controller
{

    public function Listado(){
      $Productos = DB::select(' call productos_listado_general() ');
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.listado', compact('form_title','browser_title','Productos'));

    }

    public function Tabs( $IdProducto= null ){
      $Tabs = DB::select(' call productos_tabs_consulta_por_id_producto(?) ', array( $IdProducto));

      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.tabs', compact('form_title','browser_title','Tabs'));

    }

    public function Imagenes(){
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.imagenes', compact('form_title','browser_title'));
    }

    public function TabsDetalle( $Idtab ){
      $form_title    = 'Productos';
      $browser_title = 'Productos';
      $Tab = DB::select(' call productos_tabs_consulta_tab_x_id_tab(?) ', array($Idtab ));
      return view('productos.tabs-detalle', compact('Tab','form_title','browser_title'));

      //return response()->json( $Tab  );

    }

}
