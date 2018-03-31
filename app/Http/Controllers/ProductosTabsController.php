<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//=========================================================
use App\Models\ProductosTab as Tabs;
//=========================================================
use DB;
use Redirect;
//=========================================================

class ProductosTabsController extends Controller
{

    public function Show( $IdProducto= null ){
      $Tabs = DB::select(' call productos_tabs_consulta_por_id_producto(?) ', array( $IdProducto));
      $form_title    = 'Productos';
      $browser_title = 'Tabs';
      return view('productos-tabs.listado', compact('form_title','browser_title','Tabs','IdProducto'));
    }

    public function Delete( $IdTab ){
      $Tab        = Tabs::where('idtab', $IdTab)->first();
      $IdProducto = $Tab->idproducto;
      $Tab->delete();
      return response()->json( $IdProducto ) ;
    }

    public function Detalle( $Idtab ){
      $form_title    = 'Productos';
      $browser_title = 'Tabs';
      $Tab = DB::select(' call productos_tabs_consulta_tab_x_id_tab(?) ', array($Idtab ));
      return response()->json( $Tab  );
    }

    public function Update(Request $FormData ){
      $this->validate( $FormData , ['nombre_tab'=>'required', 'orden_tab' => 'required|numeric|min:1' ]);
      if ( $FormData->NuevoRegistro){
         $Tab = new Tabs;
       }else{
        $Tab                = Tabs::where('idtab', $FormData->idtab)->first();
      }
      $Tab->idproducto      = $FormData->idproducto;
      $Tab->nombre_tab      = $FormData->nombre_tab;
      $Tab->informacion_tab = $FormData->informacion_tab;
      $Tab->orden_tab       = $FormData->orden_tab;
      $Tab->save();
      return response()->json( $FormData->idtab ) ;
    }





}
