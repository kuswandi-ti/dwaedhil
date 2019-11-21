$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_unit').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'unit/list_unit',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'unit_code', name: 'unit_code' },
			{ data: 'unit_name', name: 'unit_name' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		],
		order: [['0', 'desc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 2, 4] }
		],
		'autoWidth': false,
		'responsive': true
	});

	/* https://datatables.net/forums/discussion/41106/how-to-configure-full-width-resizable-tables */
	$('#data_table_unit_wrapper').removeClass('container-fluid');
	
	function reset_error() {
		$('.modal-body').find('.form-control').removeClass('form-control-danger');
		$('.modal-body').find('.form-group').removeClass('has-danger');
		$('.modal-body').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('input:text').val('');		
		
		$('.save_unit').prop('disabled', false);
		$('.cancel_unit').prop('disabled', false);
	}
	
	$('#new_unit').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_unit').html("Add New Product Unit");
		$('#modal_unit').modal('show');
	});

	$('.save_unit').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();		
		
		if (state == 'ADD') {
			url = 'unit';
			tipe = 'POST';
		} else {
			url = 'unit/'+id;
			tipe = 'PUT';
		}
		
		$('.save_unit').prop('disabled', true);
		$('.cancel_unit').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_unit').serialize(),
			beforeSend: function() {
				loading = new Loading(
					{
						direction: 'hor',
						discription: 'Loading...',
			    		defaultApply: true,
					}
				);
			},
            complete: function(data) {
            	loading.out();
            },
			success: function(data) {
				if ($.isEmptyObject(data.errors)) {
					$('#modal_unit').modal('hide');
					var oTableUnit = $('#data_table_unit').dataTable();
					oTableUnit.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.unit_code) {
						$('#form_group_unit_code').addClass('has-danger');
						$('#unit_code').addClass('form-control-danger');
                        $('#unit_code_error').html(data.errors.unit_code[0]);
                    }
                    if (data.errors.unit_name) {
						$('#form_group_unit_name').addClass('has-danger');
						$('#unit_name').addClass('form-control-danger');
                        $('#unit_name_error').html(data.errors.unit_name[0]);
                    }
					$('.save_unit').prop('disabled', false);
					$('.cancel_unit').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_unit').prop('disabled', false);
				$('.cancel_unit').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_unit', function (e) {
		var loading;
		var id = $(this).data('id');
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
						url : 'unit/change_status',
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
						}
					})
					.done(function(data){
						if (data.success == true) {							
							var oTableUnit = $('#data_table_unit').dataTable();
							oTableUnit.fnDraw(false);							
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
	
	$('body').on('click', '#edit_unit', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'unit/'+id+'/edit';
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
				$('#unit_code').val(data.unit_code);
				$('#unit_name').val(data.unit_name);
				$('#state').val('EDIT');
				$('#modal_title_unit').html("Edit Product Unit");				
				$('#modal_unit').modal('show');
			}
		});
	});
});