<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductosTab extends Model
{

	protected $table      = 'productos_tabs';
	protected $primaryKey = 'idtab';
	protected $hidden     = [ 'idproducto' ];

	public $timestamps = false;

	protected $casts = [
		'idproducto' => 'int',
		'orden_tab' => 'int'
	];

	protected $fillable = [
		'idproducto',
		'nombre_tab',
		'informacion_tab',
		'orden_tab'
	];

}


