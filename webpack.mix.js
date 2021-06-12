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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/nav.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/perfil-header.scss', 'public/css')
    .sass('resources/sass/post-form-style.scss', 'public/css')
    .sass('resources/sass/publication.scss', 'public/css')
    .sass('resources/sass/info-form.scss', 'public/css')
    .sass('resources/sass/info-view.scss', 'public/css')
    .sass('resources/sass/album.scss', 'public/css')
    .sass('resources/sass/friends.scss', 'public/css')
    .sass('resources/sass/comment.scss', 'public/css')
    .sass('resources/sass/news.scss', 'public/css')
    .sass('resources/sass/notifications.scss', 'public/css');



