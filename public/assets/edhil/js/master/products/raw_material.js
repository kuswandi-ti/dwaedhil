/* https://hdtuto.com/article/undefined-index-dt-row-index-laravel-yajra-datatable */
$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	/* https://stackoverflow.com/questions/27380390/jquery-datatables-format-numbers */
	$('#data_table_raw_material').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'raw_material/list_raw_material',
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
			{ data: 'vpn_no', name: 'vpn_no' }, // 4
			{ data: 'unit_code_buying', name: 'unit_code_buying' }, // 5
			{ data: 'unit_code_usage', name: 'unit_code_usage' }, // 6
			{ data: 'supplier_code', name: 'supplier_code' }, // 7
			{ data: 'supplier_name', name: 'supplier_name' }, // 8
			{ data: 'qty_conversion', name: 'qty_conversion', render: $.fn.dataTable.render.number(',', '.', 2, '') }, // 9
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 10
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 5, 6, 7, 10] },
			{ "className": "text-right", "targets": [9] }
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_raw_material_wrapper').removeClass('container-fluid');

    $(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

    $('#id_unit_buying').select2({
    	ajax: {
        	url: 'raw_material/data_unit',
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
                            text: item.unit_code + ' - ' + item.unit_name
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
        placeholder: 'Select product unit'
    });

    $('#id_unit_usage').select2({
    	ajax: {
        	url: 'raw_material/data_unit',
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
                            text: item.unit_code + ' - ' + item.unit_name
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
        placeholder: 'Select product unit'
    });

    $('#id_supplier_raw_material').select2({
    	ajax: {
        	url: 'raw_material/data_supplier',
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
                            text: item.supplier_code + ' - ' + item.supplier_name
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
        placeholder: 'Select supplier'
    });
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('input:text').val('');
		$('.vertical-spin').val(0);
		
		$('.save_raw_material').prop('disabled', false);
		$('.cancel_raw_material').prop('disabled', false);
	}
	
	$('#new_raw_material').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_raw_material').html("Add New Raw Material");
		$('#modal_raw_material').modal('show');
	});

	$('.save_raw_material').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();		
		
		if (state == 'ADD') {
			url = 'raw_material';
			tipe = 'POST';
		} else {
			url = 'raw_material/'+id;
			tipe = 'PUT';
		}
		
		$('.save_raw_material').prop('disabled', true);
		$('.cancel_raw_material').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_raw_material').serialize(),
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
					$('#modal_raw_material').modal('hide');
					var oTableRawMaterial = $('#data_table_raw_material').dataTable();
					oTableRawMaterial.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.material_code) {
						$('#form_group_material_code').addClass('has-danger');
						$('#material_code').addClass('form-control-danger');
                        $('#material_code_error').html(data.errors.material_code[0]);
                    }
                    if (data.errors.material_name) {
						$('#form_group_material_name').addClass('has-danger');
						$('#material_name').addClass('form-control-danger');
                        $('#material_name_error').html(data.errors.material_name[0]);
                    }
                    if (data.errors.vpn_no) {
						$('#form_group_vpn_no').addClass('has-danger');
						$('#vpn_no').addClass('form-control-danger');
                        $('#vpn_no_error').html(data.errors.vpn_no[0]);
                    }
                    if (data.errors.id_unit_buying) {
						$('#form_group_id_unit_buying').addClass('has-danger');
						$('#id_unit_buying').addClass('form-control-danger');
                        $('#id_unit_buying_error').html(data.errors.id_unit_buying[0]);
                    }
                    if (data.errors.id_unit_usage) {
						$('#form_group_id_unit_usage').addClass('has-danger');
						$('#id_unit_usage').addClass('form-control-danger');
                        $('#id_unit_usage_error').html(data.errors.id_unit_usage[0]);
                    }
                    if (data.errors.id_supplier_raw_material) {
						$('#form_group_id_supplier_raw_material').addClass('has-danger');
						$('#id_supplier_raw_material').addClass('form-control-danger');
                        $('#id_supplier_raw_material_error').html(data.errors.id_supplier_raw_material[0]);
                    }
					$('.save_raw_material').prop('disabled', false);
					$('.cancel_raw_material').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_raw_material').prop('disabled', false);
				$('.cancel_raw_material').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_raw_material', function (e) {
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
						url : 'raw_material/change_status',
						type: 'POST',
						dataType : 'json',
						data : { 'id': id },
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
							var oTableRawMaterial = $('#data_table_raw_material').dataTable();
							oTableRawMaterial.fnDraw(false);
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
	
	$('body').on('click', '#edit_raw_material', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'raw_material/'+id+'/edit';
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
				$('#id').val(data.id);
				$('#material_code').val(data.material_code);
				$('#material_name').val(data.material_name);
				$('#vpn_no').val(data.vpn_no);
		        $("#id_unit_buying").data('select2').trigger('select', {
		            data: {"id": data.id_unit_buying, "text": data.unit_code_buying + ' - ' + data.unit_name_buying }
		        });
		        $("#id_unit_usage").data('select2').trigger('select', {
		            data: {"id": data.id_unit_usage, "text": data.unit_code_usage + ' - ' + data.unit_name_usage }
		        });
		        $("#id_supplier_raw_material").data('select2').trigger('select', {
		            data: {"id": data.id_supplier, "text": data.supplier_code + ' - ' + data.supplier_name }
		        });
		        $('#qty_conversion').val(data.qty_conversion);
				$('#state').val('EDIT');
				$('#modal_title_raw_material').html("Edit Raw Material");				
				$('#modal_raw_material').modal('show');
			}
		});
	});
});