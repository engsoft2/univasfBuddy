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
	mix.scripts([
    	'/../../../node_modules/jquery/dist/jquery.js',
    	'/../../../node_modules/bootstrap/dist/js/bootstrap.js',
       'app.js'
   	], 'public/js/app.js');

   	mix.styles([
    	'/../../../node_modules/bootstrap/dist/css/bootstrap.css',
    	'app.css'
   	], 'public/css/app.css');

    //mix.sass('app.scss');
});
