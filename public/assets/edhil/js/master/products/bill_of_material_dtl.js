$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	var id_bom_hdr = $('#id_bom_hdr').val();
	$('#data_table_bill_of_material_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_bill_of_material/'+id_bom_hdr,
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'material_code', name: 'material_code' },
			{ data: 'material_name', name: 'material_name' },			
			{ data: 'qty_usage', name: 'qty_usage' },
			{ data: 'unit_code_usage', name: 'unit_code_usage' },
			{ data: 'percent_rejection', name: 'percent_rejection' },
			{ data: 'packing_size', name: 'packing_size' },
			{ data: 'remarks', name: 'remarks' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 5, 7] },
			{ "className": "text-right", "targets": [4, 6] }
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	//$('#data_table_bill_of_material_dtl_wrapper').removeClass('dataTables_wrapper');
	$('#data_table_bill_of_material_dtl_wrapper').removeClass('container-fluid');

    $('#id_raw_material').select2({
    	dropdownParent: $("#modal_bom_dtl"),
    	ajax: {
        	url: 'bill_of_material_d/data_raw_material',
            data: function (params) {
            	return {
                	search: params.term,
                    page: params.page || 1
                };
            },
            dataType: 'json',
            processResults: function (data) {
                data.page = data.page || 1;
                return {
                    results: data.items.map(function (item) {
                        return {
                            id: item.id,
                            text: item.material_code + ' - ' + item.material_name
                        };
                    }),
                    pagination: {
                        more: data.pagination
                    }
                }
            },
            cache: true,
            delay: 250
       	},
        placeholder: 'Select raw material'
    });

    $('#id_raw_material').on('select2:select', function (e) {
	    var id = e.params.data.id;
	    $.ajax({
	    	url: 'bill_of_material_d/get_data_raw_material/'+id,
			type: 'GET',
			datatype: 'json',
			success: function(data) {
				$('#unit_code_buying').val(data.unit_code_buying);
				$('#unit_code_usage').val(data.unit_code_usage);
		        $('#qty_conversion').val(data.qty_conversion);
			},
			error: function (xhr, textStatus, errorThrown) {
				$('.save_bom_dtl').prop('disabled', false);
				$('.cancel_bom_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
	    });
	});
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id_bom_dtl').val('');
		$('#state').val('');

		//$('input:text').val('');
		$('input[name="unit_code_buying"]').val('');
		$('input[name="unit_code_usage"]').val('');
		$('input[name="remarks"]').val('');
		$('input[name="qty_conversion"]').val('0');
		$('input[name="percent_rejection"]').val('0');
		$('input[name="qty_usage"]').val('0');
		
		$('.save_bom_dtl').prop('disabled', false);
		$('.cancel_bom_dtl').prop('disabled', false);
	}
	
	$('#new_raw_material_bom').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_bom_dtl').html("Add New Raw Material");		
		$('#modal_bom_dtl').modal('show');
	});

	$('.save_bom_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id_bom_hdr = $('#id_bom_hdr').val();
		var id_bom_dtl = $('#id_bom_dtl').val();

		if (state == 'ADD') {
			url = 'store';
			tipe = 'POST';
		} else {
			url = 'update';
			tipe = 'POST';
		}
		
		$('.save_bom_dtl').prop('disabled', true);
		$('.cancel_bom_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_bom_dtl').serialize(),
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
					$('#modal_bom_dtl').modal('hide');
					var oTableBillOfMaterialDtl = $('#data_table_bill_of_material_dtl').dataTable();
					oTableBillOfMaterialDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					if (data.errors.id_raw_material) {
						$('#form_group_id_raw_material').addClass('has-danger');
						$('#id_raw_material').addClass('form-control-danger');
                        $('#id_raw_material_error').html(data.errors.id_raw_material[0]);
                    }
                    if (data.errors.qty_usage) {
						$('#form_group_qty_usage').addClass('has-danger');
						$('#qty_usage').addClass('form-control-danger');
                        $('#qty_usage_error').html(data.errors.qty_usage[0]);
                    }
                    if (data.errors.percent_rejection) {
						$('#form_group_percent_rejection').addClass('has-danger');
						$('#percent_rejection').addClass('form-control-danger');
                        $('#percent_rejection_error').html(data.errors.percent_rejection[0]);
                    }
					$('.save_bom_dtl').prop('disabled', false);
					$('.cancel_bom_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_bom_dtl').prop('disabled', false);
				$('.cancel_bom_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_bill_of_material_dtl', function (e) {
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
							var oTableBillOfMaterialDtl = $('#data_table_bill_of_material_dtl').dataTable();
							oTableBillOfMaterialDtl.fnDraw(false);
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
	
	$('body').on('click', '#edit_bill_of_material_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'detail/'+id;
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
				$('#id_bom_dtl').val(data.id);
				$("#id_raw_material").data('select2').trigger('select', {
		            data: {"id": data.id_raw_material, "text": data.material_code + ' - ' + data.material_name }
		        });
				$('#unit_code_buying').val(data.unit_code_buying);
				$('#qty_usage').val(data.qty_usage);
				$('#percent_rejection').val(data.percent_rejection);
				$('#unit_code_usage').val(data.unit_code_usage);
				$('#remarks').val(data.remarks);
				$('#state').val('EDIT');
				$('#modal_title_bom_dtl').html("Edit Raw Material");
				$('#modal_bom_dtl').modal('show');
			}
		});
	});
});