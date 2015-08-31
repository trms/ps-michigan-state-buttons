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
    mix.scripts(['../../../bower_components/jquery/dist/jquery.js','../../../bower_components/bootstrap/dist/js/bootstrap.min.js','app.js']);
    mix.scripts(['../../../bower_components/jquery/dist/jquery.js','../../../bower_components/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js','admin.js'],'public/js/admin.js');
    mix.copy('bower_components/bootstrap/dist/css/bootstrap.css','public/css/bootstrap.css');
    mix.copy('bower_components/font-awesome/css/font-awesome.css','public/css/font-awesome.css');
    mix.copy('bower_components/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.css','public/css/fontawesome-iconpicker.css');
});
