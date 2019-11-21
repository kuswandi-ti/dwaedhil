$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_supplier').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'supplier/list_supplier',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'supplier_code', name: 'supplier_code' },
			{ data: 'supplier_name', name: 'supplier_name' },
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
	$('#data_table_supplier_wrapper').removeClass('container-fluid');
	
	function reset_error() {
		$('#supplier_code').removeClass('form-control-danger');
		$('#supplier_code_error').html( "" );
		$('#form_group_supplier_code').removeClass('has-danger');
		
		$('#supplier_name').removeClass('form-control-danger');
		$('#supplier_name_error').html( "" );
		$('#form_group_supplier_name').removeClass('has-danger');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('#supplier_code').val('');
		$('#supplier_name').val('');		
		
		$('.save_supplier').prop('disabled', false);
		$('.cancel_supplier').prop('disabled', false);
	}
	
	$('#new_supplier').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_supplier').html("Add New Supplier");
		$('#modal_supplier').modal('show');
	});

	$('.save_supplier').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();
		var supplier_code = $("input[name='supplier_code']").val();
		var supplier_name = $("input[name='supplier_name']").val();		
		
		if (state == 'ADD') {
			url = 'supplier';
			tipe = 'POST';
		} else {
			url = 'supplier/'+id;
			tipe = 'PUT';
		}
		
		$('.save_supplier').prop('disabled', true);
		$('.cancel_supplier').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: {
				id: id,
				supplier_code: supplier_code,
				supplier_name: supplier_name
			},
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
					$('#modal_supplier').modal('hide');
					var oTable = $('#data_table_supplier').dataTable();
					oTable.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.supplier_code) {
						$('#form_group_supplier_code').addClass('has-danger');
						$('#supplier_code').addClass('form-control-danger');
                        $('#supplier_code_error').html(data.errors.supplier_code[0]);
                    }
                    if (data.errors.supplier_name) {
						$('#form_group_supplier_name').addClass('has-danger');
						$('#supplier_name').addClass('form-control-danger');
                        $('#supplier_name_error').html(data.errors.supplier_name[0]);
                    }
					$('.save_supplier').prop('disabled', false);
					$('.cancel_supplier').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_supplier').prop('disabled', false);
				$('.cancel_supplier').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_supplier', function (e) {
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
						url : 'supplier/change_status',
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
						},					
					})
					.done(function(data){
						if (data.success == true) {
							var oTable = $('#data_table_supplier').dataTable();
							oTable.fnDraw(false);
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
	
	$('body').on('click', '#edit_supplier', function (e) {
		e.preventDefault();
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'supplier/'+id+'/edit';
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
				$('#supplier_code').val(data.supplier_code);
				$('#supplier_name').val(data.supplier_name);
				$('#state').val('EDIT');
				$('#modal_title_supplier').html("Edit Supplier");				
				$('#modal_supplier').modal('show');
			}
		});
	});
});