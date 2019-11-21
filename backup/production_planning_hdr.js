$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_ppl_hdr').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'production_planning/list_production_planning_header',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'doc_no', name: 'doc_no' }, // 2
			{ data: 'doc_date', name: 'doc_date' }, // 3			
			{ data: 'customer_code', name: 'customer_code' }, // 4
			{ data: 'customer_name', name: 'customer_name' }, // 5
			{ data: 'product_code', name: 'product_code' }, // 6
			{ data: 'product_name', name: 'product_name' }, // 7
			{ data: 'model_project', name: 'model_project' }, // 8
			{ data: 'month', name: 'month' }, // 9
			{ data: 'year', name: 'year' }, // 10
			{ data: 'remarks', name: 'remarks' }, // 11
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 12
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6, 8, 9, 10, 12] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_ppl_hdr_wrapper').removeClass('container-fluid');

	/* https://stackoverflow.com/questions/37410117/jquery-datepicker-show-on-input-group-addon-button-click */
	var today = new Date();
    $("#doc_date").datepicker({
       	altField: "#doc_date",
      	altFormat: "yy-mm-dd",
    }).datepicker("setDate", today);
	$("#basic-addon_doc_date").click(function() {
    	$("#doc_date").datepicker('show')
	});

	$('#month').select2({});

	/* https://jsfiddle.net/ujdbcy3d/36/ */
	function readonly_select(objs, action) {
	  	if (action === true)
	    	objs.prepend('<div class="disabled-select"></div>');
	  	else
	    	$(".disabled-select", objs).remove();
	}

	$('#id_customer').select2({
    	dropdownParent: $("#modal_ppl_hdr"),
    	ajax: {
        	url: 'production_planning/data_customer',
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

    $('#id_product').select2({
    	dropdownParent: $("#modal_ppl_hdr"),
    	ajax: {
    		type: 'GET',
        	url: 'production_planning/data_product',
            data: function (params) {
            	return {
                	search: params.term,
                    page: params.page || 1,
                    id_customer: $('#id_customer').val()
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
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');

		$('input:text').val('');
		$('#doc_no').val('AUTO');
		$('#doc_date').val(moment().format('YYYY-MM-DD'));
		$('#year').val(new Date().getFullYear()); // https://jqueryhouse.com/jquery-snippets-getting-the-current-year/
		
		$('.save_ppl_hdr').prop('disabled', false);
		$('.cancel_ppl_hdr').prop('disabled', false);
	}
	
	$('#new_ppl_hdr').click(function () {
		reset_input();
		reset_error();
		$("#month").removeAttr('readonly');
		$("#year").removeAttr('readonly');
		$('#state').val('ADD');
		$('#modal_title_ppl_hdr').html("Add New Production Planning");		
		$('#modal_ppl_hdr').modal('show');
	});

	$('.save_ppl_hdr').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id = $('#id').val();

		if (state == 'ADD') {
			url = 'production_planning';
			tipe = 'POST';
		} else {
			url = 'production_planning/'+id;
			tipe = 'PUT';
		}
		
		$('.save_ppl_hdr').prop('disabled', true);
		$('.cancel_ppl_hdr').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_ppl_hdr').serialize(),
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
					$('#modal_ppl_hdr').modal('hide');
					var oTableProductionPlanningHdr = $('#data_table_ppl_hdr').dataTable();
					oTableProductionPlanningHdr.fnDraw(false);
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
					window.location.href = "production_planning/d/"+redirect;									
				} else {
					reset_error();
					if (data.errors.id_customer) {
						$('#form_group_id_customer').addClass('has-danger');
						$('#id_customer').addClass('form-control-danger');
                        $('#id_customer_error').html(data.errors.id_customer[0]);
                    }
                    if (data.errors.id_product) {
						$('#form_group_id_product').addClass('has-danger');
						$('#id_product').addClass('form-control-danger');
                        $('#id_product_error').html(data.errors.id_product[0]);
                    }
                    if (data.errors.month) {
						$('#form_group_month').addClass('has-danger');
						$('#month').addClass('form-control-danger');
                        $('#month_error').html(data.errors.month[0]);
                    }
                    if (data.errors.year) {
						$('#form_group_year').addClass('has-danger');
						$('#year').addClass('form-control-danger');
                        $('#year_error').html(data.errors.year[0]);
                    }
					$('.save_ppl_hdr').prop('disabled', false);
					$('.cancel_ppl_hdr').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_ppl_hdr').prop('disabled', false);
				$('.cancel_ppl_hdr').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_ppl_hdr', function (e) {
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
						url : 'production_planning/change_status/'+id,
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
							var oTableProductionPlanningHdr = $('#data_table_ppl_hdr').dataTable();
							oTableProductionPlanningHdr.fnDraw(false);
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
	
	$('body').on('click', '#edit_ppl_hdr', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		$("#month").attr("readonly", "readonly");
		$("#year").attr("readonly", "readonly");
		var id = $(this).data('id');
		var url = 'production_planning/'+id+'/edit';
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
				$('#doc_no').val(data.doc_no);
				/* https://flaviocopes.com/momentjs/ */
				$('#doc_date').val(moment(data.doc_date).format("YYYY-MM-DD"));
				$("#id_customer").data('select2').trigger('select', {
		            data: {"id": data.id_customer, "text": data.customer_code + ' - ' + data.customer_name }
		        });
		        $("#id_product").data('select2').trigger('select', {
		            data: {"id": data.id_product, "text": data.product_code + ' - ' + data.product_name }
		        });
		        $("#month").data('select2').trigger('select', {
		            data: {"id": data.month, "text": month }
		        });
				$('#year').val(data.year);
		        $('#remarks').val(data.remarks);
				$('#state').val('EDIT');
				$('#modal_title_ppl_hdr').html("Edit Production Planning");
				$('#modal_ppl_hdr').modal('show');
			}
		});
	});
});