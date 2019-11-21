$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_gr_hdr').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'goods_receive_h/list_goods_receive',
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
			{ data: 'reff_no', name: 'reff_no' }, // 4
			{ data: 'supplier_code', name: 'supplier_code' }, // 5
			{ data: 'supplier_name', name: 'supplier_name' }, // 6
			{ data: 'remarks', name: 'remarks' }, // 7
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 8
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 5, 8] },
			{ "className": "text-right", "targets": [3] },
			{ "targets": 3, render: function(data) {
      			return moment(data).format('YYYY-MM-DD');
    		}}
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_gr_hdr_wrapper').removeClass('container-fluid');

	/* https://stackoverflow.com/questions/37410117/jquery-datepicker-show-on-input-group-addon-button-click */
	var today = new Date();
    $("#doc_date").datepicker({
       	altField: "#doc_date",
      	altFormat: "yy-mm-dd",
    }).datepicker("setDate", today);
	$("#basic-addon_doc_date").click(function() {
    	$("#doc_date").datepicker('show')
	});

    $('#id_supplier').select2({
    	dropdownParent: $("#modal_gr_hdr"),
    	ajax: {
        	url: 'goods_receive_h/data_supplier',
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
		$('#doc_no').val('AUTO');
		$('#doc_date').val(moment().format('YYYY-MM-DD'));
		
		$('.save_gr_hdr').prop('disabled', false);
		$('.cancel_gr_hdr').prop('disabled', false);
	}
	
	$('#new_gr_hdr').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_gr_hdr').html("Add New Goods Receive Raw Material");
		$('#modal_gr_hdr').modal('show');
	});

	$('.save_gr_hdr').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id = $('#id').val();

		if (state == 'ADD') {
			url = 'goods_receive_h';
			tipe = 'POST';
		} else {
			url = 'goods_receive_h/'+id;
			tipe = 'PUT';
		}
		
		$('.save_gr_hdr').prop('disabled', true);
		$('.cancel_gr_hdr').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_gr_hdr').serialize(),
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
					$('#modal_gr_hdr').modal('hide');
					var oTableGoodsReceiveHdr = $('#data_table_gr_hdr').dataTable();
					oTableGoodsReceiveHdr.fnDraw(false);
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
					window.location.href = "goods_receive_d/edit/"+redirect;									
				} else {
					reset_error();
					if (data.errors.doc_no) {
						$('#form_group_doc_no').addClass('has-danger');
						$('#doc_no').addClass('form-control-danger');
                        $('#doc_no_error').html(data.errors.doc_no[0]);
                    }
                    if (data.errors.doc_date) {
						$('#form_group_doc_date').addClass('has-danger');
						$('#doc_date').addClass('form-control-danger');
                        $('#doc_date_error').html(data.errors.doc_date[0]);
                    }
                    if (data.errors.reff_no) {
						$('#form_group_reff_no').addClass('has-danger');
						$('#reff_no').addClass('form-control-danger');
                        $('#reff_no_error').html(data.errors.reff_no[0]);
                    }
                    if (data.errors.id_supplier) {
						$('#form_group_id_supplier').addClass('has-danger');
						$('#id_supplier').addClass('form-control-danger');
                        $('#id_supplier_error').html(data.errors.id_supplier[0]);
                    }
					$('.save_gr_hdr').prop('disabled', false);
					$('.cancel_gr_hdr').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_gr_hdr').prop('disabled', false);
				$('.cancel_gr_hdr').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_gr_hdr', function (e) {
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
						url : 'goods_receive_h/change_status/'+id,
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
							var oTableGoodsReceiveHdr = $('#data_table_gr_hdr').dataTable();
							oTableGoodsReceiveHdr.fnDraw(false);
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
	
	$('body').on('click', '#edit_gr_hdr', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'goods_receive_h/'+id+'/edit';
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
				$('#reff_no').val(data.reff_no);
				$("#id_supplier").data('select2').trigger('select', {
		            data: {"id": data.id_supplier, "text": data.supplier_code + ' - ' + data.supplier_name }
		        });
		        $('#remarks').val(data.remarks);
				$('#state').val('EDIT');
				$('#modal_title_gr_hdr').html("Edit Goods Receive Raw Material");
				$('#modal_gr_hdr').modal('show');
			}
		});
	});
});