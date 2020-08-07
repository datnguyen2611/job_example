const mix = require('laravel-mix');

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

mix.js(
    'resources/js/app.js'
    , 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.styles([
    'resources/css/fonts/all.min.css',
    'resources/css/adminlte.min.css'
], 'public/css/all.css');
mix.scripts([
    'resources/js/jquery.js',
   'resources/js/admin/bootstrap.bundle.min.js',
   'resources/js/admin/adminlte.min.js',
    'resources/js/admin/demo.js'
], 'public/js/all.js');
