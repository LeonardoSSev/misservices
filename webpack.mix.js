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
        'resources/assets/js/plugins/jquery.min.js',
        'resources/assets/js/plugins/bootstrap.min.js',
        'resources/assets/js/plugins/jquery.easing.min.js',
        'resources/assets/js/plugins/jquery.mask.min.js',
        'resources/assets/js/plugins/scrollreveal.min.js',
        'resources/assets/js/plugins/owl.carousel.js',
        'resources/assets/js/plugins/classie.js',
        'resources/assets/js/plugins/cbpAnimatedHeader.min.js',
        'resources/assets/js/plugins/freelancer.js',
        'resources/assets/js/plugins/validacep.js',
        'resources/assets/js/app.js',
        'resources/assets/js/script.js'
    ], 'public/js/app.js')
   .sass('resources/assets/sass/main.scss', 'public/css/')
   .copy('resources/assets/img/**/*', 'public/images')
   .browserSync('localhost:8000');
