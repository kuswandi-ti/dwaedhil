$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/* https://datatables.net/forums/discussion/42601/how-to-format-date-in-table-cell */
	var id_alloc_fg_hdr = $('#id_alloc_fg_hdr').val();
	$('#data_table_alloc_fg_dtl').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'list_allocation_fg_detail/'+id_alloc_fg_hdr,
			type: 'GET'
		},
		columns: [
			{ data: 'id', name: 'id', 'visible': false }, // 0
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // 1
			{ data: 'product_code', name: 'product_code' }, // 2
			{ data: 'product_name', name: 'product_name' }, // 3
			{ data: 'unit_code', name: 'unit_code' }, // 4
			{ data: 'qty_alloc', name: 'qty_alloc' }, // 5
			{ data: 'action', name: 'action', orderable: false, searchable: false } // 6
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4, 6] },
			{ "className": "text-right", "targets": [5] }
		],
		'paging': false,
		'searching': false,
		'autoWidth': false,
		'responsive': true
	});
	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_alloc_fg_dtl_wrapper').removeClass('container-fluid');

	$('#data_table_browse_product_alloc_fg').DataTable({
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

	$('#btn_browse_product_alloc_fg').click(function() {
		var oTableBrowseProductAllocationFG = $('#data_table_browse_product_alloc_fg').dataTable();
		oTableBrowseProductAllocationFG.fnDraw(false);
	});

	$('body').on('click', '#select_product_alloc_fg', function (e) {    	
		var id = $(this).data('id');
		var product_code = $(this).data('code');
		var product_name = $(this).data('name');
		var unit_code = $(this).data('unit');

		$('#product_id_alloc_fg').val(id);
		$('#product_code_alloc_fg').val(product_code);
		$('#product_name_alloc_fg').val(product_name);
		$('#unit_code_alloc_fg').val(unit_code);

		$('.bs-example-modal-lg').modal('hide');
    });

	$(".vertical-spin").on("keypress keyup blur",function (event) {
    	$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$(".hitung_alloc_fg").change(function() {
		if ($('#qty_alloc_alloc_fg').val().length == 0) {
      		$('#qty_alloc_alloc_fg').val(0);
		}
  	});
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id_alloc_fg_dtl').val('');
		$('#state').val('');

		$('#product_code_alloc_fg').val('');
		$('#product_id_alloc_fg').val('');
		$('#product_name_alloc_fg').val('');
		$('#unit_code_alloc_fg').val('');
		$('#qty_alloc_alloc_fg').val('0');
		$('#qty_alloc_old').val('0');
		
		$('.save_alloc_fg_dtl').prop('disabled', false);
		$('.cancel_alloc_fg_dtl').prop('disabled', false);
	}
	
	$('#new_product_alloc_fg').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
		$('#modal_title_alloc_fg_dtl').html("Add Product");		
		$('#modal_alloc_fg_dtl').modal('show');
	});

	/* https://stackoverflow.com/questions/43367408/numeric-value-out-of-range-1264-in-mysql?rq=1 */
	$('.save_alloc_fg_dtl').click(function(e) {
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
		
		$('.save_alloc_fg_dtl').prop('disabled', true);
		$('.cancel_alloc_fg_dtl').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_alloc_fg_dtl').serialize(),
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
					$('#modal_alloc_fg_dtl').modal('hide');
					var oTableAllocationFGDtl = $('#data_table_alloc_fg_dtl').dataTable();
					oTableAllocationFGDtl.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});									
				} else {
					reset_error();
					if (data.errors.product_code_alloc_fg) {
						$('#form_group_product_code_alloc_fg').addClass('has-danger');
						$('#product_code_alloc_fg').addClass('form-control-danger');
						$('#product_code_alloc_fg_error').html(data.errors.product_code_alloc_fg[0]);
					}
                    if (data.errors.qty_alloc_alloc_fg) {
						$('#form_group_qty_alloc_alloc_fg').addClass('has-danger');
						$('#qty_alloc_alloc_fg').addClass('form-control-danger');
                        $('#qty_alloc_alloc_fg_error').html(data.errors.qty_alloc_alloc_fg[0]);
                    }
					$('.save_alloc_fg_dtl').prop('disabled', false);
					$('.cancel_alloc_fg_dtl').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_alloc_fg_dtl').prop('disabled', false);
				$('.cancel_alloc_fg_dtl').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_alloc_fg_dtl', function (e) {
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
							var oTableAllocationFGDtl = $('#data_table_alloc_fg_dtl').dataTable();
							oTableAllocationFGDtl.fnDraw(false);
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
	
	$('body').on('click', '#edit_alloc_fg_dtl', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		$('#btn_browse_product_alloc_fg').hide();
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
				$('#id_alloc_fg_hdr').val(data.id_hdr);
				$('#id_alloc_fg_dtl').val(data.id);

				$('#product_id_alloc_fg').val(data.id_product);
				$('#product_code_alloc_fg').val(data.product_code);
				$('#product_name_alloc_fg').val(data.product_name);
				$('#unit_code_alloc_fg').val(data.unit_code);

				$('#qty_alloc_alloc_fg').val(data.qty_alloc);
				$('#qty_alloc_old').val(data.qty_alloc);

				$('#state').val('EDIT');
				$('#modal_title_alloc_fg_dtl').html("Edit Detail Allocation Finish Goods");
				$('#modal_alloc_fg_dtl').modal('show');
			}
		});
	});
});