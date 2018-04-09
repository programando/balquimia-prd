<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\ProductosImagene         as ProductosImagenes;


use DB;
use Redirect;
use Storage;
use Image;
use Session;



class ProductosController extends Controller
{


    public function Listado(){
      $Productos     = DB::select(' call productos_listado_general() ');
      $form_title    = 'Productos';
      $browser_title = 'Productos';
     return view('productos.listado', compact('form_title','browser_title','Productos'));
    }




    public function ImagesDelete( $IdImagen ) {

      $Imagen        = ProductosImagenes::where('idimagen', $IdImagen)->first();

      $IdProducto = $Imagen->idproducto;
      $Imagen->delete();
      return response()->json( $IdProducto ) ;

    }

    public function ImagenesShow( $IdProducto ){

        $form_title     = 'Productos';
        $browser_title  = 'Productos';
        $Imagenes       = DB::select(' call productos_imagenes_consulta_por_idproducto(?)', array( $IdProducto) );
        $IdProducto     = $Imagenes[0]->idproducto;
        $NomProducto    = $Imagenes[0]->nom_producto;
        return view('productos.imagenes', compact('Imagenes','form_title','browser_title','IdProducto','NomProducto'));
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
        $ImagenProducto = new ProductosImagenes;
        $ImagenProducto->nombre_imagen = $NomFile;
        $ImagenProducto->idproducto    = $IdProducto;
        $ImagenProducto->zoom          = 0;
        $ImagenProducto->save();

         return Redirect('/imagenes/'.$IdProducto);


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



