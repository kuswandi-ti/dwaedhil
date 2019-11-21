<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Authentication */
Auth::routes();

Route::group(['middleware' => ['auth']], function(){
	/* Home */
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('/home', 'HomeController@index')->name('home');
	
	/* Dashboard */
	Route::get('/dashboard/show_graphic_productivity', 'Dashboard\DashboardController@show_graphic_productivity');
	Route::get('/dashboard/show_graphic_availability', 'Dashboard\DashboardController@show_graphic_availability');
	Route::get('/dashboard/show_graphic_ok_rework', 'Dashboard\DashboardController@show_graphic_ok_rework');
	Route::get('/dashboard/show_graphic_quality', 'Dashboard\DashboardController@show_graphic_quality');
	Route::get('/dashboard/show_graphic_scrap', 'Dashboard\DashboardController@show_graphic_scrap');

	/* User Account */
	Route::group(['prefix' => 'user_account'], function() {
		Route::get('list_users', 'Sys\UserAccountController@list_users');
		Route::post('change_status', 'Sys\UserAccountController@change_status');
	});	
	Route::resource('user_account', 'Sys\UserAccountController');

	/* BEGIN PRODUCTS */
	/* Unit */
	Route::group(['prefix' => 'unit'], function() {
		Route::get('list_unit', 'Master\Products\UnitController@list_unit');
		Route::post('change_status', 'Master\Products\UnitController@change_status');
	});
	Route::resource('unit', 'Master\Products\UnitController');
	/* Product Group */
	Route::group(['prefix' => 'product_group'], function() {
		Route::get('list_product_group', 'Master\Products\ProductGroupController@list_product_group');
		Route::post('change_status', 'Master\Products\ProductGroupController@change_status');
	});	
	Route::resource('product_group', 'Master\Products\ProductGroupController');
	/* Product */
	Route::group(['prefix' => 'product'], function() {
		Route::get('list_product', 'Master\Products\ProductController@list_product');
		Route::post('change_status', 'Master\Products\ProductController@change_status');
		Route::get('data_product_group', 'Master\Products\ProductController@data_product_group');
		Route::get('data_unit', 'Master\Products\ProductController@data_unit');
		Route::get('data_customer', 'Master\Products\ProductController@data_customer');
	});	
	Route::resource('product', 'Master\Products\ProductController');
	/* Raw Material */
	Route::group(['prefix' => 'raw_material'], function() {
		Route::get('list_raw_material', 'Master\Products\RawMaterialController@list_raw_material');
		Route::post('change_status', 'Master\Products\RawMaterialController@change_status');
		Route::get('data_unit', 'Master\Products\RawMaterialController@data_unit');
		Route::get('data_supplier', 'Master\Products\RawMaterialController@data_supplier');
	});	
	Route::resource('raw_material', 'Master\Products\RawMaterialController');
	/* Bill of Material */
	Route::group(['prefix' => 'bill_of_material_h'], function() {
		Route::get('data_product', 'Master\Products\BillOfMaterialHdrController@data_product');
		Route::get('get_data_product/{id}', 'Master\Products\BillOfMaterialHdrController@get_data_product');
		Route::get('list_bill_of_material', 'Master\Products\BillOfMaterialHdrController@list_bill_of_material');
		Route::post('change_status/{id}', 'Master\Products\BillOfMaterialHdrController@change_status');
	});	
	Route::get('bill_of_material_h/print/{id_hdr}', 'Master\Products\BillOfMaterialHdrController@print_bill_of_material');
	Route::resource('bill_of_material_h', 'Master\Products\BillOfMaterialHdrController');	
	Route::group(['prefix' => 'bill_of_material_d'], function() {
		Route::get('edit/{id}', 'Master\Products\BillOfMaterialDtlController@edit_bill_of_material');
		Route::get('edit/list_bill_of_material/{id_hdr}', 'Master\Products\BillOfMaterialDtlController@list_bill_of_material');
		Route::get('edit/bill_of_material_d/data_raw_material', 'Master\Products\BillOfMaterialDtlController@data_raw_material');
		Route::get('edit/bill_of_material_d/get_data_raw_material/{id}', 'Master\Products\BillOfMaterialDtlController@get_data_raw_material');
		Route::post('edit/store', 'Master\Products\BillOfMaterialDtlController@store');
		Route::post('edit/update', 'Master\Products\BillOfMaterialDtlController@update');
		Route::get('edit/destroy/{id}', 'Master\Products\BillOfMaterialDtlController@destroy');
		Route::get('edit/detail/{id}', 'Master\Products\BillOfMaterialDtlController@edit');
	});	
	/* END PRODUCTS */

	/* BEGIN PARTNERS */
	/* Supplier */
	Route::group(['prefix' => 'supplier'], function() {
		Route::get('list_supplier', 'Master\Partners\SupplierController@list_supplier');
		Route::post('change_status', 'Master\Partners\SupplierController@change_status');		
	});	
	Route::resource('supplier', 'Master\Partners\SupplierController');
	/* Customer */
	Route::group(['prefix' => 'customer'], function() {
		Route::get('list_customer', 'Master\Partners\CustomerController@list_customer');
		Route::post('change_status', 'Master\Partners\CustomerController@change_status');
	});	
	Route::resource('customer', 'Master\Partners\CustomerController');
	/* END PARTNERS */

	/* BEGIN WAREHOUSE */
	/* Stock Card */
	Route::get('stock_card', 'Transaction\Warehouse\StockCardController@index')->name('stock_card.index');
	/* Goods Receive */
	Route::group(['prefix' => 'goods_receive_h'], function() {
		Route::get('list_goods_receive', 'Transaction\Warehouse\GoodsReceiveHdrController@list_goods_receive');
		Route::get('data_supplier', 'Transaction\Warehouse\GoodsReceiveHdrController@data_supplier');
		Route::post('change_status/{id}', 'Transaction\Warehouse\GoodsReceiveHdrController@change_status');
	});
	Route::resource('goods_receive_h', 'Transaction\Warehouse\GoodsReceiveHdrController');
	Route::group(['prefix' => 'goods_receive_d'], function() {
		Route::get('edit/{id}', 'Transaction\Warehouse\GoodsReceiveDtlController@edit_goods_receive');
		Route::get('edit/list_goods_receive/{id_hdr}', 'Transaction\Warehouse\GoodsReceiveDtlController@list_goods_receive');
		Route::get('edit/goods_receive_d/data_raw_material', 'Transaction\Warehouse\GoodsReceiveDtlController@data_raw_material');
		Route::get('edit/goods_receive_d/get_data_raw_material/{id}', 'Transaction\Warehouse\GoodsReceiveDtlController@get_data_raw_material');
		Route::post('edit/store', 'Transaction\Warehouse\GoodsReceiveDtlController@store');
		Route::post('edit/update', 'Transaction\Warehouse\GoodsReceiveDtlController@update');
		Route::get('edit/destroy/{id}', 'Transaction\Warehouse\GoodsReceiveDtlController@destroy');
		Route::get('edit/detail/{id}', 'Transaction\Warehouse\GoodsReceiveDtlController@edit');
	});
	/* Stock Card */
	Route::group(['prefix' => 'stock_card'], function() {
		Route::get('list_stock_card/{location}', 'Transaction\Warehouse\StockCardController@list_stock_card');
		Route::get('list_stock_card_detail/{id_raw_material}/{location}', 'Transaction\Warehouse\StockCardController@list_stock_card_detail');
	});
	/* END WAREHOUSE */

	/* BEGIN PRODUCTION */
	/* Production Planning */
	Route::group(['prefix' => 'production_planning'], function() {
		Route::get('list_production_planning_header', 'Transaction\Production\ProductionPlanningController@list_production_planning_header');		
		Route::post('change_status/{id_hdr}', 'Transaction\Production\ProductionPlanningController@change_status');
		Route::get('d/browse_product', 'Transaction\Production\ProductionPlanningController@browse_product');
		Route::get('d/{id_hdr}', 'Transaction\Production\ProductionPlanningController@production_planning_header');
		Route::get('d/list_production_planning_detail/{id_hdr}', 'Transaction\Production\ProductionPlanningController@list_production_planning_detail');
		Route::post('d/store', 'Transaction\Production\ProductionPlanningController@store_detail');
		Route::post('d/update', 'Transaction\Production\ProductionPlanningController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Production\ProductionPlanningController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Production\ProductionPlanningController@edit_detail');
	});
	Route::resource('production_planning', 'Transaction\Production\ProductionPlanningController');	
	/* Material Request */
	Route::group(['prefix' => 'material_request'], function() {
		Route::get('list_material_request_header', 'Transaction\Production\MaterialRequestController@list_material_request_header');		
		Route::post('change_status/{id_hdr}', 'Transaction\Production\MaterialRequestController@change_status');
		Route::get('d/browse_raw_material', 'Transaction\Production\MaterialRequestController@browse_raw_material');
		Route::get('d/data_raw_material', 'Transaction\Production\MaterialRequestController@data_raw_material');
		Route::get('d/get_data_raw_material/{id}', 'Transaction\Production\MaterialRequestController@get_data_raw_material');
		Route::get('d/{id_hdr}', 'Transaction\Production\MaterialRequestController@material_request_header');
		Route::get('d/list_material_request_detail/{id_hdr}', 'Transaction\Production\MaterialRequestController@list_material_request_detail');		
		Route::post('d/store', 'Transaction\Production\MaterialRequestController@store_detail');
		Route::post('d/update', 'Transaction\Production\MaterialRequestController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Production\MaterialRequestController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Production\MaterialRequestController@edit_detail');
	});
	Route::resource('material_request', 'Transaction\Production\MaterialRequestController');
	/* Material Usage */
	Route::group(['prefix' => 'material_usage'], function() {
		Route::get('list_material_usage_header', 'Transaction\Production\MaterialUsageController@list_material_usage_header');		
		Route::post('change_status/{id_hdr}', 'Transaction\Production\MaterialUsageController@change_status');
		Route::get('d/browse_raw_material', 'Transaction\Production\MaterialUsageController@browse_raw_material');
		Route::get('d/data_raw_material', 'Transaction\Production\MaterialUsageController@data_raw_material');
		Route::get('d/get_data_raw_material/{id}', 'Transaction\Production\MaterialUsageController@get_data_raw_material');
		Route::get('d/{id_hdr}', 'Transaction\Production\MaterialUsageController@material_usage_header');
		Route::get('d/list_material_usage_detail/{id_hdr}', 'Transaction\Production\MaterialUsageController@list_material_usage_detail');		
		Route::post('d/store', 'Transaction\Production\MaterialUsageController@store_detail');
		Route::post('d/update', 'Transaction\Production\MaterialUsageController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Production\MaterialUsageController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Production\MaterialUsageController@edit_detail');
	});
	Route::resource('material_usage', 'Transaction\Production\MaterialUsageController');
	/* Production Actual */
	Route::group(['prefix' => 'production_actual'], function() {
		Route::get('list_production_actual_header', 'Transaction\Production\ProductionActualController@list_production_actual_header');
		Route::post('change_status/{id_hdr}', 'Transaction\Production\ProductionActualController@change_status');
		Route::get('d/browse_product', 'Transaction\Production\ProductionActualController@browse_product');
		Route::get('d/{id_hdr}', 'Transaction\Production\ProductionActualController@production_actual_header');
		Route::get('d/list_production_actual_detail/{id_hdr}', 'Transaction\Production\ProductionActualController@list_production_actual_detail');
		Route::post('d/store', 'Transaction\Production\ProductionActualController@store_detail');
		Route::post('d/update', 'Transaction\Production\ProductionActualController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Production\ProductionActualController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Production\ProductionActualController@edit_detail');
	});
	Route::resource('production_actual', 'Transaction\Production\ProductionActualController');
	/* Allocation FG */
	Route::group(['prefix' => 'allocation_fg'], function() {
		Route::get('list_allocation_fg_header', 'Transaction\Production\AllocationFGController@list_allocation_fg_header');
		Route::post('change_status/{id_hdr}', 'Transaction\Production\AllocationFGController@change_status');
		Route::get('d/browse_product', 'Transaction\Production\AllocationFGController@browse_product');
		Route::get('d/{id_hdr}', 'Transaction\Production\AllocationFGController@allocation_fg_header');
		Route::get('d/list_allocation_fg_detail/{id_hdr}', 'Transaction\Production\AllocationFGController@list_allocation_fg_detail');
		Route::post('d/store', 'Transaction\Production\AllocationFGController@store_detail');
		Route::post('d/update', 'Transaction\Production\AllocationFGController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Production\AllocationFGController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Production\AllocationFGController@edit_detail');
	});
	Route::resource('allocation_fg', 'Transaction\Production\AllocationFGController');
	/* END PRODUCTION */

	/* BEGIN LOGISTICS */
	/* Delivery Order */
	Route::group(['prefix' => 'delivery_order'], function() {
		Route::get('list_delivery_order_header', 'Transaction\Logistics\DeliveryOrderController@list_delivery_order_header');
		Route::post('change_status/{id_hdr}', 'Transaction\Logistics\DeliveryOrderController@change_status');
		Route::get('d/browse_product', 'Transaction\Logistics\DeliveryOrderController@browse_product');
		Route::get('d/{id_hdr}', 'Transaction\Logistics\DeliveryOrderController@delivery_order_header');
		Route::get('d/list_delivery_order_detail/{id_hdr}', 'Transaction\Logistics\DeliveryOrderController@list_delivery_order_detail');
		Route::post('d/store', 'Transaction\Logistics\DeliveryOrderController@store_detail');
		Route::post('d/update', 'Transaction\Logistics\DeliveryOrderController@update_detail');
		Route::get('d/destroy/{id_dtl}', 'Transaction\Logistics\DeliveryOrderController@destroy_detail');
		Route::get('d/edit/{id_dtl}', 'Transaction\Logistics\DeliveryOrderController@edit_detail');
	});
	Route::resource('delivery_order', 'Transaction\Logistics\DeliveryOrderController');
	/* END PRODUCTION */
});




