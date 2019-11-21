$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_product_group').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'product_group/list_product_group',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'product_group_code', name: 'product_group_code' },
			{ data: 'product_group_name', name: 'product_group_name' },
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
	$('#data_table_product_group_wrapper').removeClass('container-fluid');
	
	function reset_error() {
		$('#product_group_code').removeClass('form-control-danger');
		$('#product_group_code_error').html( "" );
		$('#form_group_product_group_code').removeClass('has-danger');
		
		$('#product_group_name').removeClass('form-control-danger');
		$('#product_group_name_error').html( "" );
		$('#form_group_product_group_name').removeClass('has-danger');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('#product_group_code').val('');
		$('#product_group_name').val('');		
		
		$('.save_product_group').prop('disabled', false);
		$('.cancel_product_group').prop('disabled', false);
	}
	
	$('#new_product_group').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_product_group').html("Add New Product Group");
		$('#modal_product_group').modal('show');
	});

	$('.save_product_group').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();
		var product_group_code = $("input[name='product_group_code']").val();
		var product_group_name = $("input[name='product_group_name']").val();		
		
		if (state == 'ADD') {
			url = 'product_group';
			tipe = 'POST';
		} else {
			url = 'product_group/'+id;
			tipe = 'PUT';
		}
		
		$('.save_product_group').prop('disabled', true);
		$('.cancel_product_group').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: {
				id: id,
				product_group_code: product_group_code,
				product_group_name: product_group_name
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
					$('#modal_product_group').modal('hide');
					var oTableProductGroup = $('#data_table_product_group').dataTable();
					oTableProductGroup.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.product_group_code) {
						$('#form_group_product_group_code').addClass('has-danger');
						$('#product_group_code').addClass('form-control-danger');
                        $('#product_group_code_error').html(data.errors.product_group_code[0]);
                    }
                    if (data.errors.product_group_name) {
						$('#form_group_product_group_name').addClass('has-danger');
						$('#product_group_name').addClass('form-control-danger');
                        $('#product_group_name_error').html(data.errors.product_group_name[0]);
                    }
					$('.save_product_group').prop('disabled', false);
					$('.cancel_product_group').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_product_group').prop('disabled', false);
				$('.cancel_product_group').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_product_group', function (e) {
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
						url : 'product_group/change_status',
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
							var oTableProductGroup = $('#data_table_product_group').dataTable();
							oTableProductGroup.fnDraw(false);
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
	
	$('body').on('click', '#edit_product_group', function (e) {
		e.preventDefault();
		var loading;
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'product_group/'+id+'/edit';
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
				$('#product_group_code').val(data.product_group_code);
				$('#product_group_name').val(data.product_group_name);
				$('#state').val('EDIT');
				$('#modal_title_product_group').html("Edit Product Group");				
				$('#modal_product_group').modal('show');
			}
		});
	});
});