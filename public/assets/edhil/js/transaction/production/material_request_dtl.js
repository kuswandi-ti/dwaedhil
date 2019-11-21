$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	var id_matreq_hdr = $('#id_matreq_hdr').val();
	$('#data_table_matreq_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_material_request_detail/'+id_matreq_hdr,
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
			{ data: 'unit_code_buying', name: 'unit_code_buying' }, // 4
			{ data: 'qty_matreq', name: 'qty_matreq' }, // 5
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

	$('#data_table_browse_raw_material').DataTable({
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
			{ data: 'unit_code_buying', name: 'unit_code_buying' }, // 4
			{ data: 'qty_balance', name: 'qty_balance' }, // 5
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 6
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6] },
			{ "className": "text-right", "targets": [5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_matreq_dtl_wrapper').removeClass('container-fluid');

	$('#btn-browse-raw-material-matreq').click(function() {
		var oTableBrowseRawMaterial = $('#data_table_browse_raw_material').dataTable();
		oTableBrowseRawMaterial.fnDraw(false);
	});	

	// /* https://jsfiddle.net/ujdbcy3d/36/ */
	// function readonly_select(objs, action) {
	//   	if (action === true)
	//     	objs.prepend('<div class="disabled-select"></div>');
	//   	else
	//     	$(".disabled-select", objs).remove();
	// }

    // $('#id_raw_material_matreq').select2({
    // 	dropdownParent: $("#modal_matreq_dtl"),
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

 //    $('#id_raw_material_matreq').on('select2:select', function (e) {
	//     var id = e.params.data.id;
	//     $.ajax({
	//     	url: 'get_data_raw_material/'+id,
	// 		type: 'GET',
	// 		datatype: 'json',
	// 		success: function(data) {
	// 			$('#unit_code_buying').val(data.unit_code_buying);
	// 		},
	// 		error: function (xhr, textStatus, errorThrown) {
	// 			$('.save_matreq_dtl').prop('disabled', false);
	// 			$('.cancel_matreq_dtl').prop('disabled', false);
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
		$('#id_matreq_dtl').val('');
		$('#state').val('');

		$('#raw_material_code_matreq').val('');
		$('#raw_material_id_matreq').val('');
		$('#raw_material_name_matreq').val('');
		$('input[name="unit_code_buying"]').val('');
		// $('input[name="stock_onhand_matreq"]').val('0');
		$('input[name="qty_matreq"]').val('0');
		$('#qty_matreq_old').val('0');
		
		$('.save_matreq_dtl').prop('disabled', false);
		$('.cancel_matreq_dtl').prop('disabled', false);
	}
	
	$('#new_raw_material_matreq').click(function () {
		reset_input();
		reset_error();		
		// $("#id_raw_material_matreq").removeAttr('readonly');
		$('#state').val('ADD');
		$('#modal_title_matreq_dtl').html("Add New Raw Material");		
		$('#modal_matreq_dtl').modal('show');
	});

	$('.save_matreq_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id_matreq_hdr = $('#id_matreq_hdr').val();
		var id_matreq_dtl = $('#id_matreq_dtl').val();		
		var qty_matreq_old = $('#qty_matreq_old').val();

		if (state == 'ADD') {
			url = 'store';
			tipe = 'POST';
		} else {
			url = 'update';
			tipe = 'POST';
		}
		
		$('.save_matreq_dtl').prop('disabled', true);
		$('.cancel_matreq_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_matreq_dtl').serialize(),
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
					$('#modal_matreq_dtl').modal('hide');
					var oTableMaterialRequestDtl = $('#data_table_matreq_dtl').dataTable();
					oTableMaterialRequestDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					// if (data.errors.id_raw_material_matreq) {
					// 	$('#form_group_id_raw_material_matreq').addClass('has-danger');
					// 	$('#id_raw_material_matreq').addClass('form-control-danger');
					// 	$('#id_raw_material_matreq_error').html(data.errors.id_raw_material_matreq[0]);
					// }
					if (data.errors.raw_material_code_matreq) {
						$('#form_group_raw_material_code_matreq').addClass('has-danger');
						$('#raw_material_code_matreq').addClass('form-control-danger');
						$('#raw_material_code_matreq_error').html(data.errors.raw_material_code_matreq[0]);
					}
                    if (data.errors.qty_matreq) {
						$('#form_group_qty_matreq').addClass('has-danger');
						$('#qty_matreq').addClass('form-control-danger');
                        $('#qty_matreq_error').html(data.errors.qty_matreq[0]);
                    }
					$('.save_matreq_dtl').prop('disabled', false);
					$('.cancel_matreq_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_matreq_dtl').prop('disabled', false);
				$('.cancel_matreq_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_matreq_dtl', function (e) {
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
							var oTableMaterialRequestDtl = $('#data_table_matreq_dtl').dataTable();
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

    $('body').on('click', '#select_raw_material_matreq', function (e) {    	
		var id = $(this).data('id');
		var material_code = $(this).data('code');
		var material_name = $(this).data('name');
		var unit_code_buying = $(this).data('unit');
		// var qty_onhand = $(this).data('qty_balance');

		$('#raw_material_id_matreq').val(id);
		$('#raw_material_code_matreq').val(material_code);
		$('#raw_material_name_matreq').val(material_name);
		$('#unit_code_buying').val(unit_code_buying);
		// $('#stock_onhand_matreq').val(qty_onhand);

		$('.bs-example-modal-lg').modal('hide');
    });
	
	$('body').on('click', '#edit_matreq_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		$('#btn-browse-raw-material-matreq').hide();
		// $("#id_raw_material_matreq").attr("readonly", "readonly");
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
				$('#id_matreq_hdr').val(data.id_hdr);
				$('#id_matreq_dtl').val(data.id);
				$('#qty_matreq').val(data.qty_matreq);
				$('#qty_matreq_old').val(data.qty_matreq);
				// $("#id_raw_material_matreq").data('select2').trigger('select', {
				// 	data: {"id": data.id_raw_material, "text": data.material_code + ' - ' + data.material_name }
				// });
				$('#raw_material_id_matreq').val(data.id_raw_material);
				$('#raw_material_code_matreq').val(data.material_code);
				$('#raw_material_name_matreq').val(data.material_name);
				$('#unit_code_buying').val(data.unit_code_buying);				
				$('#state').val('EDIT');
				$('#modal_title_matreq_dtl').html("Edit Raw Material");
				$('#modal_matreq_dtl').modal('show');
			}
		});
	});
});