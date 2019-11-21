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

// public/assets/js/custom/user_account.js
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
	'public/assets/plugins/handlebars/handlebars-v4.1.2.js',
	'public/assets/plugins/custom_loading_modal/js/modal-loading.js',
	'public/assets/js/jquery.slimscroll.js',
    'public/assets/js/waves.js',
    'public/assets/js/sidebarmenu.js',
	'public/assets/js/custom.js',
	'public/assets/edhil/js/sys/user_account.js',
	'public/assets/edhil/js/master/products/product.js',
	'public/assets/edhil/js/master/products/product_group.js',
	'public/assets/edhil/js/master/products/unit.js',
	'public/assets/edhil/js/master/products/raw_material.js',
	'public/assets/edhil/js/master/products/bill_of_material_hdr.js',
	'public/assets/edhil/js/master/products/bill_of_material_dtl.js',
	'public/assets/edhil/js/master/partners/supplier.js',
	'public/assets/edhil/js/master/partners/customer.js',
	'public/assets/edhil/js/transaction/warehouse/goods_receive_hdr.js',
	'public/assets/edhil/js/transaction/warehouse/goods_receive_dtl.js',
	'public/assets/edhil/js/transaction/warehouse/stock_card.js',
	'public/assets/edhil/js/transaction/production/production_planning_hdr.js',
	'public/assets/edhil/js/transaction/production/production_planning_dtl.js',
	'public/assets/edhil/js/transaction/production/material_request_hdr.js',
	'public/assets/edhil/js/transaction/production/material_request_dtl.js',
	'public/assets/edhil/js/transaction/production/material_usage_hdr.js',
	'public/assets/edhil/js/transaction/production/material_usage_dtl.js',
	'public/assets/edhil/js/transaction/production/production_actual_hdr.js',
	'public/assets/edhil/js/transaction/production/production_actual_dtl.js',
	'public/assets/edhil/js/transaction/production/allocation_fg_hdr.js',
	'public/assets/edhil/js/transaction/production/allocation_fg_dtl.js',
	'public/assets/edhil/js/transaction/logistics/delivery_order_hdr.js',
	'public/assets/edhil/js/transaction/logistics/delivery_order_dtl.js'
], 'public/js/mix-js.js').version();