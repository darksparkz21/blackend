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
// Orig Config
// mix.js('resources/assets/js/app.js', 'public/js')
// .sass('resources/assets/sass/app.scss', 'public/css');
/*
mix.setPublicPath('../public')
    .js('resources/assets/js/app.js', 'js')
    .sass('resources/assets/sass/app.scss', 'css');
*/
mix.setPublicPath('..\\public_html');

mix.js('resources/assets/js/app.js', '..\\public_html/js') // Or 'assets/js'
   .sass('resources/assets/sass/app.scss', '..\\public_html/css') // Or 'assets/css'
   .sass('resources/assets/sass/ionicons.scss', '..\\public_html/css')
   .sass('resources/assets/sass/fa.scss', '..\\public_html/css')
   .options({ 
      processCssUrls: false
   });