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
    mix.sass('app.scss')
    	.scripts([
    		//'bootstrap/js/bootstrap.js',
    		//'bootstrap/js/bootstrap.min.js',
    		//'bootstrap/js/npm.js',
    		'scripts.js',
            'search_script.js',
            'admin/admin_adding_items_script.js',
            'DateTimePicker/bootstrap-datetimepicker.js',
            'Dropzone/dropzone.js',
            'Swipebox/jquery.swipebox.js',
            'SweetAlert/sweetalert-dev.js',
            'SweetAlert/sweetalert.min.js',
            'jScroll/jScroll.min.js',
           // 'SiteScripts/comments.js'
            //'DateTimePicker/bootstrap-datetimepicker.fr.js',
            //'amcharts/amcharts.js',
            //'amcharts/serial.js',
            //'amcharts/pie.js'
            //'TinyMCE/tinymce.min.js',
            //'TinyMCE/themes/'
            //'jQuery_countdown/jquery.countdown.js',
            //'jQuery_countdown/jquery.plugin.js'
            
    	], './public/js/scripts.js')
    	.styles([
            'DateTimePicker/bootstrap-datetimepicker.min.css',
            'Swipebox/swipebox.css',
            //'bootstrap/css/bootstrap.css',
            //'bootstrap/css/bootstrap-theme.css'
            //'SweetAlert/sweetalert.css',
    	],'./public/css/styles.css');
});

