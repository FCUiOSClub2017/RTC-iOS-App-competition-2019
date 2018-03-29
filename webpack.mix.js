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

mix.copy('node_modules/startbootstrap-coming-soon/img/bg-mobile-fallback.jpg', 'public/img/bg-mobile-fallback.jpg');
mix.copy('node_modules/startbootstrap-coming-soon/mp4/bg.mp4', 'public/mp4/bg.mp4');
mix.copy('resources/assets/svg', 'public/svg');

mix.disableNotifications();