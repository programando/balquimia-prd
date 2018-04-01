<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosMarca extends Model
{

 protected $table ='productos_marcas';
 protected $primaryKey = 'idmarca';
 public $incrementing = false;
 public $timestamps = false;

 protected $casts = [
  'idmarca' => 'int',
  'inactiva' => 'bool',
  'uso_domestico' => 'bool',
  'banner' => 'bool'
 ];

 protected $fillable = [
  'nom_marca',
  'inactiva',
  'uso_domestico',
  'logo',
  'banner'
 ];

}
