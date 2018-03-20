<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Route;

class HomeController extends Controller
{
    public function Index(){
       $form_title    = trans('_app.perfil_form_title');
       $browser_title = trans('_app.perfil_form_title');

       return view('welcome',compact('form_title','browser_title'));
    }
}
