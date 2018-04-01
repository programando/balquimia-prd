<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosPresentacione extends Model
{
     protected $table ='productos_presentaciones';
     protected $primaryKey = 'idpresentacion';
     public $incrementing = false;
     public $timestamps = false;

     protected $casts = [
      'idpresentacion' => 'int'
     ];

     protected $fillable = [
      'nompresentacion',
      'descripcion'
     ];
}
