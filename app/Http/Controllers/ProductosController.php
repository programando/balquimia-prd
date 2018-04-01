<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductosMarca           as Marcas;
use App\Models\ProductosPresentacione   as Presentaciones;

use DB;
use Redirect;



class ProductosController extends Controller
{

    public function Listado(){
      $Productos     = DB::select(' call productos_listado_general() ');
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.listado', compact('form_title','browser_title','Productos'));

    }


    public function Imagenes(){
      $Presentaciones = Presentaciones::where('idpresentacion','>','0')->OrderBy('nompresentacion')->get();
      $Marcas         = Marcas::where('idmarca','>','0')->OrderBy('nom_marca')->get();
      $Nivel_0        = DB::select( ' call orden_menu_nivel_0() ');

      $form_title     = 'Productos';
      $browser_title  = 'Productos';
      return view('productos.imagenes', compact('form_title','browser_title','Presentaciones','Marcas','Nivel_0'));
    }




}



