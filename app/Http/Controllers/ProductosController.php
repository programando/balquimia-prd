<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\ProductosImagene         as ProductosImagenes;
use App\Models\ProductosMarca           as Marcas;
use App\Models\ProductosPresentacione   as Presentaciones;

use DB;
use Redirect;
use Storage;
use Image;



class ProductosController extends Controller
{

    public function Listado(){
      $Productos     = DB::select(' call productos_listado_general() ');
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.listado', compact('form_title','browser_title','Productos'));

    }


    public function Imagenes( $NomProducto='', $IdProducto=0){
      //$Presentaciones = Presentaciones::where('idpresentacion','>','0')->OrderBy('nompresentacion')->get();
      //$Marcas         = Marcas::where('idmarca','>','0')->OrderBy('nom_marca')->get();
      //$Nivel_0        = DB::select( ' call orden_menu_nivel_0() ');

      $form_title     = 'Productos';
      $browser_title  = 'Productos';
      return view('productos.imagenes', compact('form_title','browser_title','NomProducto','IdProducto'));
    }


    public function ImagenesSave( Request $FormData ){

        $this->validate( $FormData, ['imagen'=>'required|image' ]);
        $IdProducto = $FormData->idproducto;
        $File      = $FormData->imagen;
        $NomFile   = FileName($File, $IdProducto ) ;

        Storage::disk('public')->putFileAs(FolderImages944x944().'/', $File ,$NomFile);
        //Redimensiona y almacena imagenes
        $this->ImageResize( $File,50,  $NomFile );

        $this->ImageResize( $File,70,  $NomFile );
        $this->ImageResize( $File,150, $NomFile );
        $this->ImageResize( $File,232, $NomFile );
        $this->ImageResize( $File,472, $NomFile );

        $ImagenProducto = ProductosImagenes::where('idproducto',$IdProducto)->first();
        if ( !$ImagenProducto ){
          $ImagenProducto = new ProductosImagenes;
        }
        $ImagenProducto->nombre_imagen = $NomFile;
        $ImagenProducto->update();

         return Redirect('/');

        dd("Finaliza", $IdProducto );

      }

     private function ImageResize( $File, $Tamaño,$NomFile  ){
        $Carpeta       = $Tamaño .'x' .$Tamaño .'/';
        $RutaDestino   = '/opt/lampp/htdocs/tron/public/images/productos/'.$Carpeta .$NomFile;
        $FullPathImage = PublicStorageImages().$Carpeta  .$NomFile ;
        $img           = Image::make($File );
        $img->resize($Tamaño, $Tamaño);
        $img->save(   $FullPathImage );
        copy(  $FullPathImage, $RutaDestino  );

     }



}



