$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_stock_card_wrm').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'stock_card/list_stock_card/WRM',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 0
			{ data: 'id_product_material', name: 'id_product_material', 'visible': false }, // 1
			{ data: 'product_material_code', name: 'product_material_code' }, // 2
			{ data: 'product_material_name', name: 'product_material_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_balance', name: 'qty_balance' }, // 5
			{ data: 'location', name: 'location', 'visible': false }, // 6
			{ data: 'action', name: 'action', orderable: false, searchable: false }, // 7
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6, 7] },
			{ "className": "text-right", "targets": [5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	$('#data_table_stock_card_wwip').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'stock_card/list_stock_card/WWIP',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 0
			{ data: 'id_product_material', name: 'id_product_material', 'visible': false }, // 1
			{ data: 'product_material_code', name: 'product_material_code' }, // 2
			{ data: 'product_material_name', name: 'product_material_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_balance', name: 'qty_balance' }, // 5
			{ data: 'location', name: 'location', 'visible': false }, // 6
			{ data: 'action', name: 'action', orderable: false, searchable: false }, // 7
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6, 7] },
			{ "className": "text-right", "targets": [5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	$('#data_table_stock_card_wfg').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'stock_card/list_stock_card/WFG',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 0
			{ data: 'id_product_material', name: 'id_product_material', 'visible': false }, // 1
			{ data: 'product_material_code', name: 'product_material_code' }, // 2
			{ data: 'product_material_name', name: 'product_material_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_balance', name: 'qty_balance' }, // 5
			{ data: 'location', name: 'location', 'visible': false }, // 6
			{ data: 'action', name: 'action', orderable: false, searchable: false }, // 7
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6, 7] },
			{ "className": "text-right", "targets": [5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_stock_card_wrm_wrapper').removeClass('container-fluid');
	$('#data_table_stock_card_wwip_wrapper').removeClass('container-fluid');
	$('#data_table_stock_card_wfg_wrapper').removeClass('container-fluid');	

	$('body').on('click', '#detail_stock_card', function (e) {
		e.preventDefault();
		var loading;
		var id_product_material = $(this).data('idproductmaterial');
		var location = $(this).data('location');
		var url = 'stock_card/list_stock_card_detail/'+id_product_material+'/'+location;
		$.ajax({
			url: url,
			type: 'GET',
			datatype: 'json',
			beforeSend: function() {
				loading = new Loading(
					{
						direction: 'hor',
						discription: 'Loading...',
			    		defaultApply: true,
					}
				);
			},
			complete: function() {
				loading.out();
			},
			success: function(data) {
				$('#data_table_stock_detail').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url: url,
						type: 'GET'
					},
					columns: [
						{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 0
						{ data: 'id', name: 'id', 'visible': false }, // 1
						{ data: 'trx_date', name: 'trx_date' }, // 2
						{ data: 'qty_begin', name: 'qty_begin' }, // 3
						{ data: 'qty_in', name: 'qty_in' }, // 4
						{ data: 'qty_out', name: 'qty_out' }, // 5
						{ data: 'qty_balance', name: 'qty_balance' }, // 6
						{ data: 'trx_no', name: 'trx_no' }, // 7
						{ data: 'stock_note', name: 'stock_note' }, // 8
					],
					order: [['2', 'desc'], ['1', 'desc']],
					'columnDefs': [
						{ "className": "text-center", "targets": [0, 7] },
						{ "className": "text-right", "targets": [2, 3, 4, 5, 6] },
					],
					'autoWidth': false,
					'responsive': true,
					'bDestroy': true
				});
				$('#data_table_stock_detail_wrapper').removeClass('container-fluid');
				$('#modal_stock_card_detail').modal('show');
			}
		});		
	});
});