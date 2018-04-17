<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;


class Producto extends Model
{
 protected $table ='productos';
 protected $primaryKey = 'idproducto';
 public $incrementing = false;
 public $timestamps = false;

 protected $casts = [
  'idproducto' => 'int',
  'id_categoria_producto' => 'int',
  'idmarca' => 'int',
  'idmarca_nv_1' => 'int',
  'idmarca_nv_2' => 'int',
  'idpresentacion' => 'int',
  'idgrupo' => 'int',
  'id_agrupacion' => 'int',
  'idescala' => 'int',
  'balquimia_web' => 'bool',
  'idorden_nv_0' => 'int',
  'idorden_nv_1' => 'int',
  'idorden_nv_2' => 'int',
  'idorden_nv_3' => 'int',
  'idorden_nv_4' => 'int',
  'idorden_nv_5' => 'int',
  'obsequio' => 'bool',
  'kit_inicio' => 'bool',
  'cant_kit_inicio' => 'int',
  'peso_gramos' => 'float',
  'tipo_despacho' => 'int',
  'cmv' => 'float',
  'precio_mercado' => 'float',
  'costo_sin_iva' => 'float',
  'iva' => 'float',
  'vrunitario_kit' => 'float',
  'pv_ocasional' => 'float',
  'pv_tron' => 'float',
  'pv_tron_escala_a' => 'float',
  'pv_tron_escala_b' => 'float',
  'pv_tron_escala_c' => 'float',
  'ppto_fletes' => 'float',
  'ppto_fletes_escala_a' => 'float',
  'ppto_fletes_escala_b' => 'float',
  'ppto_fletes_escala_c' => 'float',
  'accesorio_asociado_a_categoria' => 'int',
  'urlAmigable_ok' => 'bool',
  'fabricado_x_ta' => 'bool',
  'inactivo' => 'bool',
  'registro_finalizado' => 'bool',
  'en_oferta' => 'bool',
  'destacado' => 'bool',
  'novedades' => 'bool',
  'idtalla' => 'int',
  'idcolor' => 'int',
  'aplica_proceso_tron' => 'bool',
  'cobrar_flete' => 'bool'
 ];

 protected $dates = [
  'ultima_modificacion'
 ];

 protected $fillable = [
  'codigo_producto',
  'id_categoria_producto',
  'idtipo_producto',
  'idmarca',
  'idmarca_nv_1',
  'idmarca_nv_2',
  'idpresentacion',
  'idgrupo',
  'id_agrupacion',
  'idescala',
  'nom_producto',
  'nom_producto_largo',
  'nom_producto_descripcion',
  'balquimia_descripcion',
  'balquimia_web',
  'tags_busqueda',
  'fragancia',
  'idorden_nv_0',
  'idorden_nv_1',
  'idorden_nv_2',
  'idorden_nv_3',
  'idorden_nv_4',
  'idorden_nv_5',
  'obsequio',
  'kit_inicio',
  'cant_kit_inicio',
  'peso_gramos',
  'tipo_despacho',
  'cmv',
  'precio_mercado',
  'costo_sin_iva',
  'iva',
  'vrunitario_kit',
  'pv_ocasional',
  'pv_tron',
  'pv_tron_escala_a',
  'pv_tron_escala_b',
  'pv_tron_escala_c',
  'ppto_fletes',
  'ppto_fletes_escala_a',
  'ppto_fletes_escala_b',
  'ppto_fletes_escala_c',
  'accesorio_asociado_a_categoria',
  'sku',
  'plu',
  'urlAmigable',
  'urlAmigable_ok',
  'fabricado_x_ta',
  'inactivo',
  'registro_finalizado',
  'ultima_modificacion',
  'en_oferta',
  'destacado',
  'novedades',
  'idtalla',
  'idcolor',
  'aplica_proceso_tron',
  'cobrar_flete',
  'tipo_combo'
 ];




public static function getMenu(){


  $AllCateg   =  DB::select(' call productos_categ() ');

        $menuAll = array();
        $MenuTemp =array();


        foreach ($AllCateg as $Categ) {
            $MenuTemp['idmenu']      = $Categ->idmenu;
            $MenuTemp['menu']        = $Categ->menu;
            $MenuTemp['idsubmenu']   = 0;
            $MenuTemp['submenu']     = '';
            $MenuTemp['idmenuPadre'] = $Categ->idmenu;
            $MenuTemp['cantidad']    = 0;
            array_push( $menuAll,$MenuTemp );
            $SubMenus =  DB::select(' call productos_categ_subcatg(?) ', array( $Categ->idmenu ));

            foreach ( $SubMenus as $SubMenu ) {
                $IdMenuPadre = $SubMenu->idmenu;
                if ( $IdMenuPadre ==$MenuTemp['idmenu'] ){
                    $MenuTemp['idmenu'] = 0;
                    $MenuTemp['menu']   = '';
                }
                 $MenuTemp['idsubmenu']   = $SubMenu->idsubmenu ;
                 $MenuTemp['submenu']     = $SubMenu->submenu ;
                 $MenuTemp['idmenuPadre'] = $Categ->idmenu;
                 $MenuTemp['cantidad']    = $SubMenu->cantidad;
                array_push( $menuAll,$MenuTemp );
            }


        }


  return $menuAll ;
}

}
