$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.clockpicker').clockpicker({
		donetext: 'Done',
		placement: 'top',
		align: 'left',
		autoclose: true,
		'default': 'now'
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	var id_prodactual_hdr = $('#id_prodactual_hdr').val();
	$('#data_table_prodactual_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_production_actual_detail/'+id_prodactual_hdr,
			type: 'GET'
		},
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'product_code', name: 'product_code' }, // 2
			{ data: 'product_name', name: 'product_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_ok', name: 'qty_ok' }, // 5
			{ data: 'qty_reject', name: 'qty_reject' }, // 6
			{ data: 'qty_rework', name: 'qty_rework' }, // 7
			{ data: 'qty_total', name: 'qty_total' }, // 8
			{ data: 'time_start', name: 'time_start' }, // 9
			{ data: 'time_finish', name: 'time_finish' }, // 10
			{ data: 'time_total', name: 'time_total' }, // 11
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 12
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 9, 10, 11, 12] },
			{ "className": "text-right", "targets": [5, 6, 7, 8] },
			{ 
				"targets": [9, 10], render: function(data) { return moment(data, "HH:mm").format("HH:mm"); },
			}
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});
	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_prodactual_dtl_wrapper').removeClass('container-fluid');

	$('#data_table_browse_product_prodactual').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'browse_product',
			type: 'GET'
		},
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'product_code', name: 'product_code' }, // 2
			{ data: 'product_name', name: 'product_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 5
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 5] },
		],
		'autoWidth': false,
		'responsive': true
	});

	$('#btn_browse_product_prodactual').click(function() {
		var oTableBrowseProductProductionActual = $('#data_table_browse_product_prodactual').dataTable();
		oTableBrowseProductProductionActual.fnDraw(false);
	});

	$('body').on('click', '#select_product_prodactual', function (e) {    	
		var id = $(this).data('id');
		var product_code = $(this).data('code');
		var product_name = $(this).data('name');
		var unit_code = $(this).data('unit');

		$('#product_id_prodactual').val(id);
		$('#product_code_prodactual').val(product_code);
		$('#product_name_prodactual').val(product_name);
		$('#unit_code_prodactual').val(unit_code);

		$('.bs-example-modal-lg').modal('hide');
    });

	$(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$(".hitung_prodactual").change(function() {
		if ($('#qty_ok_prodactual').val().length == 0) {
      		$('#qty_ok_prodactual').val(0);
		}
		if ($('#qty_reject_prodactual').val().length == 0) {
      		$('#qty_reject_prodactual').val(0);
		}
		if ($('#qty_rework_prodactual').val().length == 0) {
      		$('#qty_rework_prodactual').val(0);
		}

		var ok = parseFloat($('#qty_ok_prodactual').val());
		var reject = parseFloat($('#qty_reject_prodactual').val());
		var rework = parseFloat($('#qty_rework_prodactual').val());
		var total = ok + reject + rework;
    	$('#qty_total_prodactual').val(total);
  	});

  	$(".hitung_total_hours").change(function() {
		if ($('#time_start_ppl').val().length == 0 || $('#time_finish_ppl').val().length == 0) {
      		$('#time_total_ppl').val(0);
		} else {
			var startTime = moment(moment($('#time_start_ppl').val()+':00', "HH:mm:ss").format("h:mm:ss A"), "HH:mm a");
			var finishTime = moment(moment($('#time_finish_ppl').val()+':00', "HH:mm:ss").format("h:mm:ss A"), "HH:mm a");
			var duration = moment.duration(finishTime.diff(startTime));
			var hours = parseInt(duration.asHours());
			var minutes = parseInt(duration.asMinutes())%60;
			var total_minutes = (hours * 60) + minutes ;
			$('#time_total_ppl').val(total_minutes);
		}
  	});
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id_prodactual_dtl').val('');
		$('#state').val('');

		$('#product_code_prodactual').val('');
		$('#product_id_prodactual').val('');
		$('#product_name_prodactual').val('');
		$('#unit_code_prodactual').val('');
		$('#qty_ok_prodactual').val('0');
		$('#qty_ok_old').val('0');
		$('#qty_reject_prodactual').val('0');
		$('#qty_reject_old').val('0');
		$('#qty_rework_prodactual').val('0');
		$('#qty_rework_old').val('0');
		$('#qty_total_prodactual').val('0');
		$('#qty_total_old').val('0');
		$('#time_start_ppl').val('');
		$('#time_finish_ppl').val('');
		$('#time_total_ppl').val('0');
		
		$('.save_prodactual_dtl').prop('disabled', false);
		$('.cancel_prodactual_dtl').prop('disabled', false);
	}
	
	$('#new_product_prodactual').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_prodactual_dtl').html("Add Production Actual");
		$('.title_save_prodactual_dtl').html("Add & Save");		
		$('#modal_prodactual_dtl').modal('show');
	});

	/* https://stackoverflow.com/questions/43367408/numeric-value-out-of-range-1264-in-mysql?rq=1 */
	$('.save_prodactual_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();

		if (state == 'ADD') {
			url = 'store';
			tipe = 'POST';
		} else {
			url = 'update';
			tipe = 'POST';
		}
		
		$('.save_prodactual_dtl').prop('disabled', true);
		$('.cancel_prodactual_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_prodactual_dtl').serialize(),
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
					$('#modal_prodactual_dtl').modal('hide');
					var oTableProductionActualDtl = $('#data_table_prodactual_dtl').dataTable();
					oTableProductionActualDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					if (data.errors.product_code_prodactual) {
						$('#form_group_product_code_prodactual').addClass('has-danger');
						$('#product_code_prodactual').addClass('form-control-danger');
						$('#product_code_prodactual_error').html(data.errors.product_code_prodactual[0]);
					}
                    if (data.errors.qty_ok_prodactual) {
						$('#form_group_qty_ok_prodactual').addClass('has-danger');
						$('#qty_ok_prodactual').addClass('form-control-danger');
                        $('#qty_ok_prodactual_error').html(data.errors.qty_ok_prodactual[0]);
                    }
                    if (data.errors.qty_reject_prodactual) {
						$('#form_group_qty_reject_prodactual').addClass('has-danger');
						$('#qty_reject_prodactual').addClass('form-control-danger');
                        $('#qty_reject_prodactual_error').html(data.errors.qty_reject_prodactual[0]);
                    }
                    if (data.errors.qty_rework_prodactual) {
						$('#form_group_qty_rework_prodactual').addClass('has-danger');
						$('#qty_rework_prodactual').addClass('form-control-danger');
                        $('#qty_rework_prodactual_error').html(data.errors.qty_rework_prodactual[0]);
                    }
                    if (data.errors.qty_total_prodactual) {
						$('#form_group_qty_total_prodactual').addClass('has-danger');
						$('#qty_total_prodactual').addClass('form-control-danger');
                        $('#qty_total_prodactual_error').html(data.errors.qty_total_prodactual[0]);
                    }
					$('.save_prodactual_dtl').prop('disabled', false);
					$('.cancel_prodactual_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_prodactual_dtl').prop('disabled', false);
				$('.cancel_prodactual_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_prodactual_dtl', function (e) {
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
							var oTableProductionActualDtl = $('#data_table_prodactual_dtl').dataTable();
							oTableProductionActualDtl.fnDraw(false);
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
	
	$('body').on('click', '#edit_prodactual_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		$('#btn_browse_product_prodactual').hide();
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
				$('#id_prodactual_hdr').val(data.id_hdr);
				$('#id_prodactual_dtl').val(data.id);

				$('#product_id_prodactual').val(data.id_product);
				$('#product_code_prodactual').val(data.product_code);
				$('#product_name_prodactual').val(data.product_name);
				$('#unit_code_prodactual').val(data.unit_code);

				$('#qty_ok_prodactual').val(data.qty_ok);
				$('#qty_ok_old').val(data.qty_ok);
				$('#qty_reject_prodactual').val(data.qty_reject);
				$('#qty_reject_old').val(data.qty_reject);
				$('#qty_rework_prodactual').val(data.qty_rework);
				$('#qty_rework_old').val(data.qty_rework);
				$('#qty_total_prodactual').val(data.qty_total);
				$('#qty_total_old').val(data.qty_total);
				$('#time_start_ppl').val(moment(data.time_start, "HH:mm").format("HH:mm"));
				$('#time_finish_ppl').val(moment(data.time_finish, "HH:mm").format("HH:mm"));
				$('#time_total_ppl').val(data.time_total);

				$('#state').val('EDIT');
				$('#modal_title_prodactual_dtl').html("Edit Detail Production Actual");
				$('.title_save_prodactual_dtl').html("Edit & Save");
				$('#modal_prodactual_dtl').modal('show');
			}
		});
	});
});