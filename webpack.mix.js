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
    'public/assets/plugins/bootstrap/css/bootstrap.min.css',
	'public/assets/plugins/bootstrap-select/bootstrap-select.min.css',
	'public/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
	'public/assets/plugins/timepicker/bootstrap-timepicker.min.css',
	'public/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css',
	'public/assets/plugins/datatables/dataTables.bootstrap4.min.css',
	'public/assets/plugins/datatables/buttons.bootstrap4.min.css',
	'public/assets/plugins/datatables/responsive.bootstrap4.min.css',
	'public/assets/plugins/sweetalert/sweetalert.css',
	'public/assets/plugins/select2/dist/css/select2.min.css',
	'public/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css',
	'public/assets/plugins/custom_loading_modal/css/modal-loading.css',
	'public/assets/plugins/custom_loading_modal/css/modal-loading-animate.css',
    'public/assets/css/style.css',
    'public/assets/css/colors/blue.css'
], 'public/css/mix-styles.css').version();

mix.scripts([
    'public/assets/plugins/jquery/jquery.min.js',
    'public/assets/plugins/popper/popper.min.js',
	'public/assets/plugins/bootstrap/js/bootstrap.min.js',	
    'public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js',
    'public/assets/plugins/sparkline/jquery.sparkline.min.js',    
    'public/assets/plugins/styleswitcher/jQuery.style.switcher.js',
	'public/assets/plugins/datatables/jquery.dataTables.min.js',
	'public/assets/plugins/datatables/dataTables.bootstrap4.min.js',
	'public/assets/plugins/datatables/dataTables.buttons.min.js',
	'public/assets/plugins/datatables/buttons.bootstrap4.min.js',
	'public/assets/plugins/datatables/jszip.min.js',
	'public/assets/plugins/datatables/pdfmake.min.js',
	'public/assets/plugins/datatables/vfs_fonts.js',
	'public/assets/plugins/datatables/buttons.html5.min.js',
	'public/assets/plugins/datatables/buttons.print.min.js',
	'public/assets/plugins/datatables/dataTables.keyTable.min.js',
	'public/assets/plugins/datatables/dataTables.responsive.min.js',
	'public/assets/plugins/datatables/responsive.bootstrap4.min.js',
	'public/assets/plugins/datatables/dataTables.select.min.js',
	'public/assets/plugins/sweetalert/sweetalert.min.js',
	'public/assets/plugins/select2/dist/js/select2.full.min.js',
	'public/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js',
	'public/assets/plugins/moment/moment.min.js',
	'public/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
	'public/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js',
	'public/assets/plugins/timepicker/bootstrap-timepicker.min.js',
	'public/assets/plugins/handlebars/handlebars-v4.1.2.js',
	'public/assets/plugins/custom_loading_modal/js/modal-loading.js',
	'public/assets/plugins/echarts/echarts-all.js',
	'public/assets/js/jquery.slimscroll.js',
    'public/assets/js/waves.js',	
    'public/assets/js/sidebarmenu.js',
	'public/assets/js/custom.js'
], 'public/js/mix-js.js').version();