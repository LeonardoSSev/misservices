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
        'resources/assets/js/jquery.min.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/jquery.easing.min.js',
        'resources/assets/js/owl.carousel.js',
        'resources/assets/js/classie.js',
        'resources/assets/js/cbpAnimatedHeader.min.js',
        'resources/assets/js/freelancer.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js')
   .sass('resources/assets/sass/main.scss', 'public/css/')
   .browserSync('localhost:8000');
