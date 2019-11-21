$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_product').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'product/list_product',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'product_code', name: 'product_code' }, // 2
			{ data: 'product_name', name: 'product_name' }, // 3
			{ data: 'cpn_no', name: 'cpn_no' }, // 4
			{ data: 'product_group_name', name: 'product_group_name' }, // 5
			{ data: 'unit_name', name: 'unit_name' }, // 6
			{ data: 'customer_code', name: 'customer_code' }, // 7
			{ data: 'customer_name', name: 'customer_name' }, // 8
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 9
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 5, 6, 7, 9] }
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_product_wrapper').removeClass('container-fluid');

	/* https://jsfiddle.net/Behseini/ue8gj52t/ */
    $(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$('#life_span_time').select2({
		//dropdownParent: $("#modal_product"),
	});

    $('#id_product_group').select2({
    	dropdownParent: $("#modal_product"),
    	ajax: {
        	url: 'product/data_product_group',
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
                            text: item.product_group_code + ' - ' + item.product_group_name
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
        placeholder: 'Select product group'
    });

    $('#id_unit').select2({
    	dropdownParent: $("#modal_product"),
    	ajax: {
        	url: 'product/data_unit',
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

    $('#id_customer_product').select2({
    	dropdownParent: $("#modal_product"),
    	ajax: {
        	url: 'product/data_customer',
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
                            text: item.customer_code + ' - ' + item.customer_name
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
        placeholder: 'Select customer'
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
		
		$('.save_product').prop('disabled', false);
		$('.cancel_product').prop('disabled', false);
	}
	
	$('#new_product').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_product').html("Add New Product");
		$('#modal_product').modal('show');
	});

	$('.save_product').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();		
		
		if (state == 'ADD') {
			url = 'product';
			tipe = 'POST';
		} else {
			url = 'product/'+id;
			tipe = 'PUT';
		}
		
		$('.save_product').prop('disabled', true);
		$('.cancel_product').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_product').serialize(),
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
					$('#modal_product').modal('hide');
					var oTableProduct = $('#data_table_product').dataTable();
					oTableProduct.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.product_code) {
						$('#form_group_product_code').addClass('has-danger');
						$('#product_code').addClass('form-control-danger');
                        $('#product_code_error').html(data.errors.product_code[0]);
                    }
                    if (data.errors.product_name) {
						$('#form_group_product_name').addClass('has-danger');
						$('#product_name').addClass('form-control-danger');
                        $('#product_name_error').html(data.errors.product_name[0]);
                    }
                    if (data.errors.cpn_no) {
						$('#form_group_cpn_no').addClass('has-danger');
						$('#cpn_no').addClass('form-control-danger');
                        $('#cpn_no_error').html(data.errors.cpn_no[0]);
                    }
                    if (data.errors.id_product_group) {
						$('#form_group_id_product_group').addClass('has-danger');
						$('#id_product_group').addClass('form-control-danger');
                        $('#id_product_group_error').html(data.errors.id_product_group[0]);
                    }
                    if (data.errors.id_unit) {
						$('#form_group_id_unit').addClass('has-danger');
						$('#id_unit').addClass('form-control-danger');
                        $('#id_unit_error').html(data.errors.id_unit[0]);
                    }
                    if (data.errors.id_customer_product) {
						$('#form_group_id_customer_product').addClass('has-danger');
						$('#id_customer_product').addClass('form-control-danger');
                        $('#id_customer_product_error').html(data.errors.id_customer_product[0]);
                    }
					$('.save_product').prop('disabled', false);
					$('.cancel_product').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_product').prop('disabled', false);
				$('.cancel_product').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_product', function (e) {
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
						url : 'product/change_status',
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
							var oTableProduct = $('#data_table_product').dataTable();
							oTableProduct.fnDraw(false);
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
	
	$('body').on('click', '#edit_product', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'product/'+id+'/edit';
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
				$('#product_code').val(data.product_code);
				$('#product_name').val(data.product_name);
				$('#cpn_no').val(data.cpn_no);
				$('#model_project').val(data.model_project);
				/* https://github.com/select2/select2/issues/5003 */				
				$("#id_product_group").data('select2').trigger('select', {
		            data: {"id": data.id_product_group, "text": data.product_group_code + ' - ' + data.product_group_name }
		        });
		        $("#id_unit").data('select2').trigger('select', {
		            data: {"id": data.id_unit, "text": data.unit_code + ' - ' + data.unit_name }
		        });
		        $("#id_customer_product").data('select2').trigger('select', {
		            data: {"id": data.id_customer, "text": data.customer_code + ' - ' + data.customer_name }
		        });
		        $('#description').val(data.description);
		        $('#life_span_num').val(data.life_span_num);
		        $('#life_span_time').val(data.life_span_time);
		        $('#cavity').val(data.cavity);
		        $('#machine_tonage').val(data.machine_tonage);
		        $('#machine_code').val(data.machine_code);
		        $('#color').val(data.color);
		        $('#type_of_material').val(data.type_of_material);
		        $('#gross_weight').val(data.gross_weight);
		        $('#net_weight').val(data.net_weight);
		        $('#mp_net_weight').val(data.mp_net_weight);
		        $('#process').val(data.process);
		        $('#cycle_time_num').val(data.cycle_time_num);
		        $('#cycle_time_mp').val(data.cycle_time_mp);
		        $('#assy_time_num').val(data.assy_time_num);
		        $('#assy_time_mp').val(data.assy_time_mp);
				$('#state').val('EDIT');
				$('#modal_title_product').html("Edit Product");				
				$('#modal_product').modal('show');
			}
		});
	});
});