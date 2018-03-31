<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;



class ProductosController extends Controller
{

    public function Listado(){
      $Productos = DB::select(' call productos_listado_general() ');
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.listado', compact('form_title','browser_title','Productos'));

    }


    public function Imagenes(){
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.imagenes', compact('form_title','browser_title'));
    }




}
