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
	var id_ppl_hdr = $('#id_ppl_hdr').val();
	$('#data_table_ppl_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_production_planning_detail/'+id_ppl_hdr,
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
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'date_prodplan', name: 'date_prodplan' }, // 5
			{ data: 'qty_prodplan', name: 'qty_prodplan' }, // 6
			{ data: 'time_start', name: 'time_start' }, // 7
			{ data: 'time_finish', name: 'time_finish' }, // 8
			{ data: 'time_total', name: 'time_total' }, // 9
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 10
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 7, 8, 9, 10] },
			{ "className": "text-right", "targets": [5, 6] },
			{ 
				"targets": 5, render: function(data) { return moment(data).format('YYYY-MM-DD'); },
				"targets": [7, 8], render: function(data) { return moment(data, "HH:mm").format("HH:mm"); },
			}
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_ppl_dtl_wrapper').removeClass('container-fluid');

	$('#data_table_browse_product_ppl').DataTable({
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

	$('#btn_browse_product_ppl').click(function() {
		var oTableBrowseProductProductionPlanning = $('#data_table_browse_product_ppl').dataTable();
		oTableBrowseProductProductionPlanning.fnDraw(false);
	});

	$('body').on('click', '#select_product_ppl', function (e) {    	
		var id = $(this).data('id');
		var product_code = $(this).data('code');
		var product_name = $(this).data('name');
		var unit_code = $(this).data('unit');

		$('#product_id_ppl').val(id);
		$('#product_code_ppl').val(product_code);
		$('#product_name_ppl').val(product_name);
		$('#unit_code_ppl').val(unit_code);

		$('.bs-example-modal-lg').modal('hide');
    });

	$('#day_ppl').select2({});

	$(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$(".hitung").change(function() {
		if ($('#qty_ppl').val().length == 0) {
      		$('#qty_ppl').val(0);
		}
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
		$('#id_ppl_dtl').val('');
		$('#state').val('');

		$('#product_code_ppl').val('');
		$('#product_id_ppl').val('');
		$('#product_name_ppl').val('');
		$('#unit_code_ppl').val('');
		$('input[name="qty_ppl"]').val('0');
		$('#qty_ppl_old').val('0');
		$('#time_start_ppl').val('');
		$('#time_finish_ppl').val('');
		$('#time_total_ppl').val('0');
		
		$('.save_ppl_dtl').prop('disabled', false);
		$('.cancel_ppl_dtl').prop('disabled', false);
	}
	
	$('#new_product_ppl').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_ppl_dtl').html("Add Daily Plan");
		$('.title_save_ppl_dtl').html("Add & Save");
		$('#modal_ppl_dtl').modal('show');
	});

	$('.save_ppl_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id_ppl_hdr = $('#id_ppl_hdr').val();
		var id_ppl_dtl = $('#id_ppl_dtl').val();
		var qty_ppl_old = $('#qty_ppl_old').val();
		var time_start_ppl = $('#time_start_ppl').val();
		var time_finish_ppl = $('#time_finish_ppl').val();
		var time_total_ppl = $('#time_total_ppl').val();

		if (state == 'ADD') {
			url = 'store';
			tipe = 'POST';
		} else {
			url = 'update';
			tipe = 'POST';
		}
		
		$('.save_ppl_dtl').prop('disabled', true);
		$('.cancel_ppl_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_ppl_dtl').serialize(),
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
					$('#modal_ppl_dtl').modal('hide');
					$('.save_ppl_dtl').prop('disabled', false);
					$('.cancel_ppl_dtl').prop('disabled', false);
					var oTableProductionPlanningDtl = $('#data_table_ppl_dtl').dataTable();
					oTableProductionPlanningDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					if (data.errors.product_code_ppl) {
						$('#form_group_product_code_ppl').addClass('has-danger');
						$('#product_code_ppl').addClass('form-control-danger');
                        $('#product_code_ppl_error').html(data.errors.product_code_ppl[0]);
                    }
                    if (data.errors.qty_ppl) {
						$('#form_group_qty_ppl').addClass('has-danger');
						$('#qty_ppl').addClass('form-control-danger');
                        $('#qty_ppl_error').html(data.errors.qty_ppl[0]);
                    }
					$('.save_ppl_dtl').prop('disabled', false);
					$('.cancel_ppl_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_ppl_dtl').prop('disabled', false);
				$('.cancel_ppl_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_ppl_dtl', function (e) {
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
							var oTableProductionPlanningDtl = $('#data_table_ppl_dtl').dataTable();
							oTableProductionPlanningDtl.fnDraw(false);
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
	
	$('body').on('click', '#edit_ppl_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
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
				$('#id_ppl_hdr').val(data.id_hdr);
				$('#id_ppl_dtl').val(data.id);

				$('#product_id_ppl').val(data.id_product);
				$('#product_code_ppl').val(data.product_code);
				$('#product_name_ppl').val(data.product_name);
				$('#unit_code_ppl').val(data.unit_code);

				$("#day_ppl").data('select2').trigger('select', {
		            data: {"id": data.day_prodplan, "text": data.day_prodplan }
		        });
				$('#qty_ppl_old').val(data.qty_prodplan);
				$('#qty_ppl').val(data.qty_prodplan);
				$('#month_ppl').val(data.month);
				$('#year_ppl').val(data.year);
				$('#time_start_ppl').val(moment(data.time_start, "HH:mm").format("HH:mm"));
				$('#time_finish_ppl').val(moment(data.time_finish, "HH:mm").format("HH:mm"));
				$('#time_total_ppl').val(data.time_total);
				$('#state').val('EDIT');
				$('#modal_title_ppl_dtl').html("Edit Daily Plan");
				$('.title_save_ppl_dtl').html("Edit & Save");
				$('#modal_ppl_dtl').modal('show');
			}
		});
	});
});