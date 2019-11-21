$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
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
			{ data: 'date_prodplan', name: 'date_prodplan' }, // 2
			{ data: 'qty_prodplan', name: 'qty_prodplan' }, // 3
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 4
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 4] },
			{ "className": "text-right", "targets": [2, 3] },
			{ "targets": 2, render: function(data) {
      			return moment(data).format('YYYY-MM-DD');
    		}}
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_ppl_dtl_wrapper').removeClass('container-fluid');

	$('#day_ppl').select2({});

	$(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
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

		$('input[name="qty_ppl"]').val('0');
		$('#qty_ppl_old').val('0');
		
		$('.save_ppl_dtl').prop('disabled', false);
		$('.cancel_ppl_dtl').prop('disabled', false);
	}
	
	$('#new_product_ppl').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_ppl_dtl').html("Add New Product");		
		$('#modal_ppl_dtl').modal('show');
	});

	$('.save_ppl_dtl').click(function(e) {
		e.preventDefault();
		var loading;

		var state = $('#state').val();
		var id_ppl_hdr = $('#id_ppl_hdr').val();
		var id_ppl_dtl = $('#id_ppl_dtl').val();
		var qty_ppl_old = $('#qty_ppl_old').val();

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
					//$('#modal_ppl_dtl').modal('hide');
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
				$("#day_ppl").data('select2').trigger('select', {
		            data: {"id": data.day_prodplan, "text": data.day_prodplan }
		        });
				$('#qty_ppl_old').val(data.qty_prodplan);
				$('#qty_ppl').val(data.qty_prodplan);
				$('#month_ppl').val(data.month);
				$('#year_ppl').val(data.year);
				$('#state').val('EDIT');
				$('#modal_title_ppl_dtl').html("Edit Product");
				$('#modal_ppl_dtl').modal('show');
			}
		});
	});
});