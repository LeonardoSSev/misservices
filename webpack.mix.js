let mix = require('laravel-mix');

mix.scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
        'node_modules/scrollreveal/dist/scrollreveal.min.js',
        'resources/assets/js/plugins/jquery.easing.min.js',
        'resources/assets/js/plugins/classie.js',
        'resources/assets/js/plugins/cbpAnimatedHeader.min.js',
        'resources/assets/js/plugins/freelancer.js',
        'resources/assets/js/plugins/validacep.js',
        'resources/assets/js/script.js'
    ], 'public/js/main.js')
    .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/main.scss', 'public/css/')
   .copy('resources/assets/img/**/*', 'public/images')
   .browserSync('localhost:8000');