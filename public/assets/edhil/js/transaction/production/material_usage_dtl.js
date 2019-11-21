$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	var id_matusage_hdr = $('#id_matusage_hdr').val();
	$('#data_table_matusage_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_material_usage_detail/'+id_matusage_hdr,
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'material_code', name: 'material_code' }, // 2
			{ data: 'material_name', name: 'material_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_matusage', name: 'qty_matusage' }, // 5
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 6
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6] },
			{ "className": "text-right", "targets": [5] }
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});

	$('#data_table_browse_raw_material_matusage').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'browse_raw_material',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'material_code', name: 'material_code' }, // 2
			{ data: 'material_name', name: 'material_name' }, // 3
			{ data: 'id_unit_usage', name: 'id_unit_usage', 'visible': false }, // 4
			{ data: 'unit_code_usage', name: 'unit_code_usage' }, // 5
			{ data: 'qty_balance', name: 'qty_balance' }, // 6
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 7
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 5, 7] },
			{ "className": "text-right", "targets": [6] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_matusage_dtl_wrapper').removeClass('container-fluid');

	$('#btn-browse-raw-material-matusage').click(function() {
		var oTableBrowseRawMaterial = $('#data_table_browse_raw_material_usage').dataTable();
		oTableBrowseRawMaterial.fnDraw(false);
	});	

	// /* https://jsfiddle.net/ujdbcy3d/36/ */
	// function readonly_select(objs, action) {
	//   	if (action === true)
	//     	objs.prepend('<div class="disabled-select"></div>');
	//   	else
	//     	$(".disabled-select", objs).remove();
	// }

    // $('#id_raw_material_matusage').select2({
    // 	dropdownParent: $("#modal_matusage_dtl"),
    // 	ajax: {
    //     	url: 'data_raw_material',
    //         data: function (params) {
    //         	return {
    //             	search: params.term,
    //                 page: params.page || 1
    //             };
    //         },
    //         dataType: 'json',
    //         processResults: function (data) {
    //             data.page = data.page || 1;
    //             return {
    //                 results: data.items.map(function (item) {
    //                     return {
    //                         id: item.id,
    //                         text: item.material_code + ' - ' + item.material_name
    //                     };
    //                 }),
    //                 pagination: {
    //                     more: data.pagination
    //                 }
    //             }
    //         },
    //         cache: true,
    //         delay: 250
    //    	},
    //     placeholder: 'Select raw material'
    // });

 //    $('#id_raw_material_matusage').on('select2:select', function (e) {
	//     var id = e.params.data.id;
	//     $.ajax({
	//     	url: 'get_data_raw_material/'+id,
	// 		type: 'GET',
	// 		datatype: 'json',
	// 		success: function(data) {
	// 			$('#unit_code_usage').val(data.unit_code_usage);
	// 		},
	// 		error: function (xhr, textStatus, errorThrown) {
	// 			$('.save_matusage_dtl').prop('disabled', false);
	// 			$('.cancel_matusage_dtl').prop('disabled', false);
	// 			alert("Error: " + errorThrown);
	// 		}
	//     });
	// });

	$(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id_matusage_dtl').val('');
		$('#state').val('');

		$('#raw_material_code_matusage').val('');
		$('#raw_material_id_matusage').val('');
		$('#raw_material_name_matusage').val('');
		$('input[name="unit_code_usage"]').val('');
		$('input[name="unit_id_usage"]').val('');
		// $('input[name="stock_onhand_matusage"]').val('0');
		$('input[name="qty_matusage"]').val('0');
		$('#qty_matusage_old').val('0');
		
		$('.save_matusage_dtl').prop('disabled', false);
		$('.cancel_matusage_dtl').prop('disabled', false);
	}
	
	$('#new_raw_material_matusage').click(function () {
		reset_input();
		reset_error();		
		// $("#id_raw_material_matusage").removeAttr('readonly');
		$('#state').val('ADD');
		$('#modal_title_matusage_dtl').html("Add New Raw Material");		
		$('#modal_matusage_dtl').modal('show');
	});

	$('.save_matusage_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id_matusage_hdr = $('#id_matusage_hdr').val();
		var id_matusage_dtl = $('#id_matusage_dtl').val();
		var id_unit = $('#unit_id_usage').val();
		var qty_matusage_old = $('#qty_matusage_old').val();

		if (state == 'ADD') {
			url = 'store';
			tipe = 'POST';
		} else {
			url = 'update';
			tipe = 'POST';
		}
		
		$('.save_matusage_dtl').prop('disabled', true);
		$('.cancel_matusage_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_matusage_dtl').serialize(),
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
				if ($.isEmptyObject(data.errors)) {
					$('#modal_matusage_dtl').modal('hide');
					var oTableMaterialUsageDtl = $('#data_table_matusage_dtl').dataTable();
					oTableMaterialUsageDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					if (data.errors.raw_material_code_matusage) {
						$('#form_group_raw_material_code_matusage').addClass('has-danger');
						$('#raw_material_code_matusage').addClass('form-control-danger');
						$('#raw_material_code_matusage_error').html(data.errors.raw_material_code_matusage[0]);
					}
                    if (data.errors.qty_matusage) {
						$('#form_group_qty_matusage').addClass('has-danger');
						$('#qty_matusage').addClass('form-control-danger');
                        $('#qty_matusage_error').html(data.errors.qty_matusage[0]);
                    }
					$('.save_matusage_dtl').prop('disabled', false);
					$('.cancel_matusage_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_matusage_dtl').prop('disabled', false);
				$('.cancel_matusage_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_matusage_dtl', function (e) {
		var id = $(this).data('id');
		var loading;
		swal({
			title: 'Are you sure?',
			text: "It will permanently deleted !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			confirmButtonClass: "btn-danger",
			showLoaderOnConfirm: true,
			preConfirm: function() {
			  	return new Promise(function(resolve) {
					$.ajax({
						url : 'destroy/'+id,
						type: 'GET',
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
					})
					.done(function(data){
						if (data.success == true) {
							var oTableMaterialRequestDtl = $('#data_table_matusage_dtl').dataTable();
							oTableMaterialRequestDtl.fnDraw(false);
							swal({
								title: "Success!",
								text: "Successfully Deleted.",
								timer: 4000,
								showConfirmButton: true
							});
						}
					})
					.fail(function() {
						swal('Oops...', 'Something went wrong with process !', 'error');
					});
			  	});
			},
			allowOutsideClick: false     
		});
    });

    $('body').on('click', '#select_raw_material_matusage', function (e) {    	
		var id = $(this).data('id');
		var material_code = $(this).data('code');
		var material_name = $(this).data('name');
		var id_unit_usage = $(this).data('idunit');
		var unit_code_usage = $(this).data('unit');
		// var qty_onhand = $(this).data('qty_balance');

		$('#raw_material_id_matusage').val(id);
		$('#raw_material_code_matusage').val(material_code);
		$('#raw_material_name_matusage').val(material_name);
		$('#unit_id_usage').val(id_unit_usage);
		$('#unit_code_usage').val(unit_code_usage);
		// $('#stock_onhand_matusage').val(qty_onhand);

		$('.bs-example-modal-lg').modal('hide');
    });
	
	$('body').on('click', '#edit_matusage_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		$('#btn-browse-raw-material-matusage').hide();
		// $("#id_raw_material_matusage").attr("readonly", "readonly");
		var id = $(this).data('id');
		var url = 'edit/'+id;
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
				$('#id_matusage_hdr').val(data.id_hdr);
				$('#id_matusage_dtl').val(data.id);
				$('#qty_matusage').val(data.qty_matusage);
				$('#qty_matusage_old').val(data.qty_matusage);
				// $("#id_raw_material_matusage").data('select2').trigger('select', {
				// 	data: {"id": data.id_raw_material, "text": data.material_code + ' - ' + data.material_name }
				// });
				$('#raw_material_id_matusage').val(data.id_raw_material);
				$('#raw_material_code_matusage').val(data.material_code);
				$('#raw_material_name_matusage').val(data.material_name);
				$('#unit_id_usage').val(data.id_unit);
				$('#unit_code_usage').val(data.unit_code);
				$('#state').val('EDIT');
				$('#modal_title_matusage_dtl').html("Edit Raw Material");
				$('#modal_matusage_dtl').modal('show');
			}
		});
	});
});