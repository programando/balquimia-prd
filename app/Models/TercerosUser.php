<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//FACADES
use Hash;

class TercerosUser extends Authenticatable
{
    protected $table      = 'terceros_users';
     protected $primaryKey = 'id_terc';
     protected $fillable   = [ 'email', 'nom_usua', 'password', 'remember_token','imagen' ];
     protected $hidden     = [ 'password', 'remember_token' ];
     protected $casts      = [ 'id_terc' => 'int'    ];
     protected $dates      = [ 'created_at', 'updated_at', 'deleted_at' ];



     /***********************************************************************
        MUTATORS:  Modifican datos antes de que lleguen a la base de datos
    ***********************************************************************/

    public function setPasswordAttribute ( $value ){
        $this->attributes['password'] = Hash::make( $value );
    }//

    public function setEmailAttribute ( $value ){
        $this->attributes['email']          = mb_strtolower( $value,'UTF-8');
    }//



}
