$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	$('#data_table_matusage_hdr').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'material_usage/list_material_usage_header',
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
			{ data: 'remarks', name: 'remarks' }, // 4
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 5
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 4, 5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_matusage_hdr_wrapper').removeClass('container-fluid');

	/* https://stackoverflow.com/questions/37410117/jquery-datepicker-show-on-input-group-addon-button-click */
	var today = new Date();
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
		
		$('.save_matusage_hdr').prop('disabled', false);
		$('.cancel_matusage_hdr').prop('disabled', false);
	}
	
	$('#new_matusage_hdr').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_matusage_hdr').html("Add New Material Usage");		
		$('#modal_matusage_hdr').modal('show');
	});

	$('.save_matusage_hdr').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id = $('#id').val();

		if (state == 'ADD') {
			url = 'material_usage';
			tipe = 'POST';
		} else {
			url = 'material_usage/'+id;
			tipe = 'PUT';
		}
		
		$('.save_matusage_hdr').prop('disabled', true);
		$('.cancel_matusage_hdr').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_matusage_hdr').serialize(),
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
					$('#modal_matusage_hdr').modal('hide');
					var oTableMaterialUsageHdr = $('#data_table_matusage_hdr').dataTable();
					oTableMaterialUsageHdr.fnDraw(false);
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
					window.location.href = "material_usage/d/"+redirect;									
				} else {
					reset_error();
					if (data.errors.doc_date) {
						$('#form_group_doc_date').addClass('has-danger');
						$('#doc_date').addClass('form-control-danger');
                        $('#doc_date_error').html(data.errors.doc_date[0]);
                    }
					$('.save_matusage_hdr').prop('disabled', false);
					$('.cancel_matusage_hdr').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_matusage_hdr').prop('disabled', false);
				$('.cancel_matusage_hdr').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_matusage_hdr', function (e) {
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
						url : 'material_request/change_status/'+id,
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
							var oTableMaterialUsageHdr = $('#data_table_matusage_hdr').dataTable();
							oTableMaterialUsageHdr.fnDraw(false);
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
	
	$('body').on('click', '#edit_matusage_hdr', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'material_usage/'+id+'/edit';
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
		        $('#remarks').val(data.remarks);
				$('#state').val('EDIT');
				$('#modal_title_matusage_hdr').html("Edit Material Usage");
				$('#modal_matusage_hdr').modal('show');
			}
		});
	});
});