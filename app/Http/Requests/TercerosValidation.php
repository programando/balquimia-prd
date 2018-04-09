<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Route;

class TercerosValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $currentRouteName = Route::currentRouteName();

        if ( $currentRouteName == 'login')                  {  return $this->Loginvalidate();       }


    }


    private function Loginvalidate(){
          return [
                'email'       => ['required', 'email','exists:terceros_users'],
                'password'    => ['required'],
        ];
    }






}
