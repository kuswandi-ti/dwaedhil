$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_prodactual_hdr').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'production_actual/list_production_actual_header',
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
			{ data: 'prod_actual_date', name: 'prod_actual_date' }, // 4
			{ data: 'remarks', name: 'remarks' }, // 5
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 6
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 6] },
			{ "className": "text-right", "targets": [3, 4] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_prodactual_hdr_wrapper').removeClass('container-fluid');

	var today = new Date();

	$("#prod_actual_date").datepicker({
       	altField: "#prod_actual_date",
      	altFormat: "yy-mm-dd",
    }).datepicker("setDate", today);
	$("#basic-addon_prod_actual_date").click(function() {
    	$("#prod_actual_date").datepicker('show')
	});
    $("#doc_date").datepicker({
       	altField: "#doc_date",
      	altFormat: "yy-mm-dd",
    }).datepicker("setDate", today);
	$("#basic-addon_doc_date").click(function() {
    	$("#doc_date").datepicker('show')
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
		$('#prod_actual_date').val(moment().format('YYYY-MM-DD'));
		
		$('.save_prodactual_hdr').prop('disabled', false);
		$('.cancel_prodactual_hdr').prop('disabled', false);
	}
	
	$('#new_prodactual_hdr').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_prodactual_hdr').html("Add New Production Actual");		
		$('#modal_prodactual_hdr').modal('show');
	});

	$('.save_prodactual_hdr').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id = $('#id').val();

		if (state == 'ADD') {
			url = 'production_actual';
			tipe = 'POST';
		} else {
			url = 'production_actual/'+id;
			tipe = 'PUT';
		}
		
		$('.save_prodactual_hdr').prop('disabled', true);
		$('.cancel_prodactual_hdr').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_prodactual_hdr').serialize(),
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
					$('#modal_prodactual_hdr').modal('hide');
					var oTableProductionActualHdr = $('#data_table_prodactual_hdr').dataTable();
					oTableProductionActualHdr.fnDraw(false);
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
					window.location.href = "production_actual/d/"+redirect;									
				} else {
					reset_error();
					if (data.errors.doc_date) {
						$('#form_group_doc_date').addClass('has-danger');
						$('#doc_date').addClass('form-control-danger');
                        $('#doc_date_error').html(data.errors.doc_date[0]);
                    }
                    if (data.errors.prod_actual_date) {
						$('#form_group_prod_actual_date').addClass('has-danger');
						$('#prod_actual_date').addClass('form-control-danger');
                        $('#prod_actual_date_error').html(data.errors.prod_actual_date[0]);
                    }
					$('.save_prodactual_hdr').prop('disabled', false);
					$('.cancel_prodactual_hdr').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_prodactual_hdr').prop('disabled', false);
				$('.cancel_prodactual_hdr').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_prodactual_hdr', function (e) {
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
						url : 'production_actual/change_status/'+id,
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
							var oTableProductionActualHdr = $('#data_table_prodactual_hdr').dataTable();
							oTableProductionActualHdr.fnDraw(false);
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
	
	$('body').on('click', '#edit_prodactual_hdr', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'production_actual/'+id+'/edit';
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
				$('#doc_date').val(moment(data.doc_date).format("YYYY-MM-DD"));
				$('#prod_actual_date').val(moment(data.prod_actual_date).format("YYYY-MM-DD"));
		        $('#remarks').val(data.remarks);
				$('#state').val('EDIT');
				$('#modal_title_prodactual_hdr').html("Edit Production Actual");
				$('#modal_prodactual_hdr').modal('show');
			}
		});
	});
});