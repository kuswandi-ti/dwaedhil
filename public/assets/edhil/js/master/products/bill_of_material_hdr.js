$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_bill_of_material_hdr').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'bill_of_material_h/list_bill_of_material',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'product_code', name: 'product_code' },
			{ data: 'product_name', name: 'product_name' },			
			{ data: 'unit_name', name: 'unit_name' },
			{ data: 'date_of_issue', name: 'date_of_issue' },
			{ data: 'revision', name: 'revision' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6, 7] },
			{ "className": "text-right", "targets": [5] },
			{ "targets": 5, render: function(data) {
      			return moment(data).format('YYYY-MM-DD');
    		}}
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_bill_of_material_hdr_wrapper').removeClass('container-fluid');

	/* https://stackoverflow.com/questions/37410117/jquery-datepicker-show-on-input-group-addon-button-click */
	var today = new Date();
    $("#date_of_issue").datepicker({
       	altField: "#date_of_issue",
      	altFormat: "yy-mm-dd",
    }).datepicker("setDate", today);
	$("#basic-addon_date_of_issue").click(function() {
    	$("#date_of_issue").datepicker('show')
	});

    $('#id_product_bom_hdr').select2({
    	dropdownParent: $("#modal_bill_of_material_hdr"),
    	ajax: {
        	url: 'bill_of_material_h/data_product',
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
                            text: item.product_code + ' - ' + item.product_name
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
        placeholder: 'Select product'
    });

    $('#id_product_bom_hdr').on('select2:select', function (e) {
	    var id = e.params.data.id;
	    $.ajax({
	    	url: 'bill_of_material_h/get_data_product/'+id,
			type: 'GET',
			datatype: 'json',
			success: function(data) {
				$('#product_name').val(data.product_name);
				$('#unit_code').val(data.unit_code);
		        $('#cavity').val(data.cavity);
		        $('#life_span_num').val(data.life_span_num);
		        $('#life_span_time_bill_of_material').val(data.life_span_time);
			},
			error: function (xhr, textStatus, errorThrown) {
				$('.save_bill_of_material_hdr').prop('disabled', false);
				$('.cancel_bill_of_material_hdr').prop('disabled', false);
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
		$('#id').val('');
		$('#state').val('');

		$('input:text').val('');
		$('input[name=revision]').val('0');
		$('#date_of_issue').val(moment().format('YYYY-MM-DD'));
		$("#NEW_PART").prop("checked", true);
		
		$('.save_bill_of_material_hdr').prop('disabled', false);
		$('.cancel_bill_of_material_hdr').prop('disabled', false);
	}
	
	$('#new_bill_of_material_hdr').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_bill_of_material_hdr').html("Add New Bill of Material");		
		$('#modal_bill_of_material_hdr').modal('show');
	});

	$('.save_bill_of_material_hdr').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id = $('#id').val();

		if (state == 'ADD') {
			url = 'bill_of_material_h';
			tipe = 'POST';
		} else {
			url = 'bill_of_material_h/'+id;
			tipe = 'PUT';
		}
		
		$('.save_bill_of_material_hdr').prop('disabled', true);
		$('.cancel_bill_of_material_hdr').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_bill_of_material_hdr').serialize(),
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
					$('#modal_bill_of_material_hdr').modal('hide');
					var oTableBillOfMaterialHdr = $('#data_table_bill_of_material_hdr').dataTable();
					oTableBillOfMaterialHdr.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});
					if (state == 'ADD') {
						redirect = data.id;
					} else {
						redirect = id;
					}
					window.location.href = "bill_of_material_d/edit/"+redirect;									
				} else {
					reset_error();
					if (data.errors.id_product_bom_hdr) {
						$('#form_group_id_product_bom_hdr').addClass('has-danger');
						$('#id_product_bom_hdr').addClass('form-control-danger');
                        $('#id_product_bom_hdr_error').html(data.errors.id_product_bom_hdr[0]);
                    }
                    if (data.errors.prepared_by) {
						$('#form_group_prepared_by').addClass('has-danger');
						$('#prepared_by').addClass('form-control-danger');
                        $('#prepared_by_error').html(data.errors.prepared_by[0]);
                    }
                    if (data.errors.date_of_issue) {
						$('#form_group_date_of_issue').addClass('has-danger');
						$('#date_of_issue').addClass('form-control-danger');
                        $('#date_of_issue_error').html(data.errors.date_of_issue[0]);
                    }
                    if (data.errors.revision) {
						$('#form_group_revision').addClass('has-danger');
						$('#revision').addClass('form-control-danger');
                        $('#revision_error').html(data.errors.revision[0]);
                    }
					$('.save_bill_of_material_hdr').prop('disabled', false);
					$('.cancel_bill_of_material_hdr').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_bill_of_material_hdr').prop('disabled', false);
				$('.cancel_bill_of_material_hdr').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_bill_of_material_hdr', function (e) {
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
						url : 'bill_of_material_h/change_status/'+id,
						type: 'POST',
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
							var oTableBillOfMaterialHdr = $('#data_table_bill_of_material_hdr').dataTable();
							oTableBillOfMaterialHdr.fnDraw(false);
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
	
	$('body').on('click', '#edit_bill_of_material_hdr', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'bill_of_material_h/'+id+'/edit';
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
				$("#"+data.status_bom).prop("checked", true);
				$('#prepared_by').val(data.prepared_by);
				/* https://flaviocopes.com/momentjs/ */
				$('#date_of_issue').val(moment(data.date_of_issue).format("YYYY-MM-DD"));
				$('#revision').val(data.revision);
				$("#id_product_bom_hdr").data('select2').trigger('select', {
		            data: {"id": data.id_product, "text": data.product_code + ' - ' + data.product_name }
		        });
				$('#state').val('EDIT');
				$('#modal_title_bill_of_material_hdr').html("Edit Bill of Material");
				$('#modal_bill_of_material_hdr').modal('show');
			}
		});
	});

	$('body').on('click', '#print_bill_of_material_hdr', function (e) {
		var id = $(this).data('id');
		window.open('bill_of_material_h/print/'+id, '_blank');
    });
});