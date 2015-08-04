var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('admin.scss');
    mix.scripts(['../../../bower_components/jquery/dist/jquery.js','../../../bower_components/bootstrap/dist/js/bootstrap.min.js','app.js','admin.js']);
    mix.copy('bower_components/bootstrap/dist/css/bootstrap.css','public/css/bootstrap.css');
    mix.copy('bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css','public/css/sb-admin-2.css');
});
