const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/horizontal_scroll.js', 'public/js')
    .js('resources/js/img_upload.js', 'public/js')
    .js('resources/js/slide_filter.js', 'public/js')
    .js('resources/js/slide_menu.js', 'public/js')
    .js('resources/js/connectToWallet', 'public/js')
    .postCss('resources/css/general.css', 'public/css', [
        //
    ]);
