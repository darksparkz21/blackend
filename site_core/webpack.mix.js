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
mix.setPublicPath('..\\public');

mix.js('resources/assets/js/app.js', '..\\public/js') // Or 'assets/js'
   .sass('resources/assets/sass/app.scss', '..\\public/css') // Or 'assets/css'
   .options({ 
      processCssUrls: false
   });