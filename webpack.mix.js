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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/coming-soon.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/coming-soon.scss', 'public/css');

mix.combine([
        'resources/assets/sass/apple/css/styles.css',
        'resources/assets/sass/apple/css/font.css',
    ], 'public/fonts/font.css');

mix.copyDirectory('resources/assets/sass/apple/font', 'public/fonts'); 
mix.copyDirectory('resources/assets/svg', 'public/svg');
mix.copyDirectory('resources/assets/ckeditor', 'public/ckeditor');

mix.scripts([
    'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
    'resources/assets/js/bell/waypoints.min.js',
    'resources/assets/js/bell/counterup.min.js',
],'public/js/plugin.js');


mix.copy('resources/assets/img/fcu.png', 'public/images/fcu.png');
mix.copy('resources/assets/img/banner.png', 'public/images/banner.png');
mix.copy('resources/assets/img/banner-desktop.png', 'public/images/banner-desktop.png');
mix.copy('resources/assets/img/banner-mobile.png', 'public/images/banner-mobile.png');
mix.copy('node_modules/startbootstrap-coming-soon/img/bg-mobile-fallback.jpg', 'public/images/bg-mobile-fallback.jpg');
mix.copy('node_modules/startbootstrap-coming-soon/mp4/bg.mp4', 'public/mp4/bg.mp4');

mix.disableNotifications();
