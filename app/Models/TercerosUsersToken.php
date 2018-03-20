<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TercerosUsersToken extends Model
{

 protected $primaryKey = 'id_reg';

 public $timestamps = false;

 protected $casts = [
  'id_reg' => 'int'
 ];

 protected $dates = [
  'expira_en'
 ];


 protected $fillable = [
  'email',
  'token',
  'expira_en'
 ];

}
