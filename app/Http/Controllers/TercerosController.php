<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TercerosValidation;

use \App\Models\Frase;
use \App\Models\TercerosUser as Users;

use Auth;
use DB;
use Hash;
use Redirect;
use Session;

class TercerosController extends Controller
{

    public function getLogOut(){
       Auth::logout();
       Session::flush();
      return Redirect('/');
    }


    public function getLogin(){
          $Frases        = DB::select(' call frases_qry_dia() ');
          $Frase         = $Frases[0]->nom_frase;
          $Autor         = $Frases[0]->autor;
          $Usuario       = $Frases[0]->nom_terc;
          $browser_title = 'Login';

          return view('login.index', compact('Frase','Autor','Usuario','browser_title'));


    }

        public function postLogin(TercerosValidation $request){
           $email    = $request->email;
           $password = $request->password;
           $remember = $request->remember_me;
           if (Auth::attempt( [
                  'email'    => $email,
                  'password' => $password,
                  'inactivo' => 0,
                  'empleado' => 1 ],
                  $remember ) ) {

                return Redirect::intended('/productos');
           }
            Session::flash('LoginError','Las credenciales para acceso al sistema no pudieron ser validadas. Intente de Nuevo.');
            return Redirect::intended('/');
          }





}
