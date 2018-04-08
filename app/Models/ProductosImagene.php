<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosImagene extends Model
{

  protected $table ='productos_imagenes';
   protected $primaryKey = 'idimagen';
   public $timestamps = false;

 protected $casts = [
  'idproducto' => 'int',
  'zoom' => 'bool'
 ];

 protected $fillable = [
  'idproducto',
  'nombre_imagen',
  'zoom'
 ];

}



