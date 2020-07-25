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

mix.styles([
	'resources/styles/css/bootstrap.css',
	'resources/styles/css/fonts.css',
	'resources/styles/css/style.css'
], 'public/css/principal.css')
.styles([
	'resources/styles/css/material/font-awesome.min.css',
	'resources/styles/css/material/bootstrap.min.css',
	'resources/styles/css/material/material-kit.css'
], 'public/css/frontend.css')
.scripts([
    'resources/styles/js/core.min.js',
    'resources/styles/js/script.js'
], 'public/js/principal.js')
.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');