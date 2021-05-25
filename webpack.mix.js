const mix = require('laravel-mix');
const fs = require("fs");

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

mix
/*.styles([
    'resources/css/template/A.css',
    'resources/css/template/css'
], 'public/css/template/main.css')*/
.styles([
    'resources/css/custom.css'
], 'public/css/custom.css')
.postCss('resources/css/app.css', 'public/css', [
        //
]);
//.js('resources/js/template/common.js', 'public/js/template/common.js')
//.js('resources/js/template/util.js', 'public/js/template/util.js')