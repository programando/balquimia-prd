<?php

//composer dump-autoload

if (!function_exists('active_route')) {
    function active_route($route, $output = 'active')
    {
        if (Route::current()->getName() == $route)
            return $output;
    }
}

if (!function_exists('User')) {
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null|App\User
     */
    function User()
    {
        return auth()->user();
    }
}

if (!function_exists('TrimString')) {
    /**
     * MARZO 16 2018
     * Retorna un string sin espacios extenos e internos, con la longitus indicada
     */
    function TrimString( $String, $Long ) {
        $String = trim( $String );
        $String = preg_replace('/\s\s+/', ' ', $String  );
        $String = substr($String, 0, $Long  );
        $String = mb_strtoupper( $String,'UTF-8');
        return $String;
    }
}


if (!function_exists('FileName')) {
    /** * MARZO 18 2018
     * Retorna un nombre unico de archivo*/
    function FileName( $File, $Hach ) {
         return 'file_' . $Hach.'.'.$File->getClientOriginalExtension();
    }
}

if (!function_exists('FileExtension')) {
    /** * MARZO 18 2018
     * Retorna un nombre unico de archivo*/
    function FileExtension( $File ) {
         return $File->getClientOriginalExtension();
    }
}


if (!function_exists('FileUnqName')) {
    /** MARZO 18 2018
     * Retorna un nombre unico de archivo */
    function FileUnqName( $File ) {
        return  'file_' . time().'.'.$File->getClientOriginalExtension();
    }
}

if (!function_exists('FolderImages')) {
    /** * MARZO 18 2018.  Retorna ruta base para el almacenamiento de imagenes */
    function FolderImages(  ) {
        return storage_path("app/public/images/");
    }
}


if (!function_exists('FolderImages50x50')) {
    /** * MARZO 18 2018.  Retorna ruta base para el almacenamiento de imagenes */
    function FolderImages50x50(  ) {
        return   storage_path("app/public/images/50x50/");
    }
}



?>
