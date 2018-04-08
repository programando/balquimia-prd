<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
class TercerosController extends Controller
{

    public function getLogOut(){
       Session::flush();
      return Redirect('');
    }
}
