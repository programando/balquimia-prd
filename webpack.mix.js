let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

   mix.scripts([
      'resources/assets/js/vendor/toastr.js',
      'resources/assets/js/vendor/vue.js',
      'resources/assets/js/vendor/axios.js',
      'resources/assets/js/vendor/bootstrap-filestyle.js',
      'resources/assets/js/vendor/nicescroll.js',
      'resources/assets/js/vue-instances/tabs.js',                  // Instancia de Vue ( #main)
      'resources/assets/js/app.js',                   // Archivo JS del aplicativo

    ], 'public/js/app.js'    ) // Archivo de salida JS
   .styles ([
        'resources/assets/css/toastr.css',
        'resources/assets/css/app.css',
       ], 'public/css/app.css') ;     // Archivo de salida CSS
