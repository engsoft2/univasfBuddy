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
      '/../../../bower_components/moment/min/moment.min.js',
      '/../../../bower_components/moment/locale/pt-br.js',
      '/../../../bower_components/jquery/dist/jquery.min.js',
    	'/../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
      '/../../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
      '/../../../bower_components/handsontable/dist/handsontable.full.js',
      '/../../../bower_components/handsontable-unicode/dist/handsontable-unicode.min.js',
      '/../../../bower_components/form.validation/dist/js/formValidation.min.js',
      '/../../../bower_components/jsgrid/dist/jsgrid.min.js',
      '/../../../bower_components/jsgrid/src/i18n/pt-br.js',
      '/../../../bower_components/form.validation/dist/js/framework/bootstrap.min.js',
       'app.js'
   	], 'public/js/app.js');

   	mix.styles([
    	'/../../../bower_components/bootstrap/dist/css/bootstrap.min.css',
      '/../../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
      '/../../../bower_components/handsontable/dist/handsontable.full.css',
      '/../../../bower_components/jsgrid/dist/jsgrid.min.css',
      '/../../../bower_components/jsgrid/dist/jsgrid-theme.min.css',
      '/../../../bower_components/form.validation/dist/css/formValidation.min.css',
    	'app.css'
   	], 'public/css/app.css');

    mix.copy('bower_components/bootstrap/dist/fonts', 'public/fonts');

    //mix.sass('app.scss');
});

