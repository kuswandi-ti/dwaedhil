$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_customer').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'customer/list_customer',
			type: 'GET'
		},
		// 'fnCreatedRow': function (row, data, index) {
		// 	$('td', row).eq(0).html(index + 1);
		// },
		columns: [
			{ data: 'uuid', name: 'uuid', 'visible': false },
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
			{ data: 'customer_code', name: 'customer_code' },
			{ data: 'customer_name', name: 'customer_name' },
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
	$('#data_table_customer_wrapper').removeClass('container-fluid');
	
	function reset_error() {
		$('.tab-content').find('.form-control').removeClass('form-control-danger');
		$('.tab-content').find('.form-group').removeClass('has-danger');
		$('.tab-content').find('.form-control-feedback').html('');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('input:text').val('');
		$(':input[name="address_address_1"]').val(null);
		$(':input[name="address_address_2"]').val(null);
		
		$('.save_customer').prop('disabled', false);
		$('.cancel_customer').prop('disabled', false);
	}
	
	$('#new_customer').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_customer').html("Add New Customer");
		$('#modal_customer').modal('show');
	});

	$('.save_customer').click(function(e) {
		e.preventDefault();
		var loading;
		
		var state = $('#state').val();
		var id = $('#id').val();
		
		if (state == 'ADD') {
			url = 'customer';
			tipe = 'POST';
		} else {
			url = 'customer/'+id;
			tipe = 'PUT';
		}
		
		$('.save_customer').prop('disabled', true);
		$('.cancel_customer').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: $('#modal_form_customer').serialize(),
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
					$('#modal_customer').modal('hide');
					var oTableCustomer = $('#data_table_customer').dataTable();
					oTableCustomer.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.customer_name) {
						$('#form_group_customer_name').addClass('has-danger');
						$('#customer_name').addClass('form-control-danger');
                        $('#customer_name_error').html(data.errors.customer_name[0]);
                    }
                    if (data.errors.address_title_1) {
						$('#form_group_address_title_1').addClass('has-danger');
						$('#address_title_1').addClass('form-control-danger');
                        $('#address_title_1_error').html(data.errors.address_title_1[0]);
                    }
					if (data.errors.address_email_1) {
						$('#form_group_address_email_1').addClass('has-danger');
						$('#address_email_1').addClass('form-control-danger');
                        $('#address_email_1_error').html(data.errors.address_email_1[0]);
                    }
					if (data.errors.address_title_2) {
						$('#form_group_address_title_2').addClass('has-danger');
						$('#address_title_2').addClass('form-control-danger');
                        $('#address_title_2_error').html(data.errors.address_title_2[0]);
                    }					
					if (data.errors.address_email_2) {
						$('#form_group_address_email_2').addClass('has-danger');
						$('#address_email_2').addClass('form-control-danger');
                        $('#address_email_2_error').html(data.errors.address_email_2[0]);
                    }
					$('.save_customer').prop('disabled', false);
					$('.cancel_customer').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				$('.save_customer').prop('disabled', false);
				$('.cancel_customer').prop('disabled', false);
				alert("Error: " + errorThrown);
			}
		});
	});

	$('body').on('click', '#delete_customer', function (e) {
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
						url : 'customer/change_status',
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
							var oTableCustomer = $('#data_table_customer').dataTable();
							oTableCustomer.fnDraw(false);
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
	
	$('body').on('click', '#edit_customer', function (e) {
		e.preventDefault();
		var loading;

		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'customer/'+id+'/edit';
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
				$('#customer_code').val(data.customer_code);
				$('#customer_name').val(data.customer_name);
				
				$('#address_title_1').val(data.address_title_1);
				$('#address_address_1').val(data.address_address_1);
				$('#address_city_1').val(data.address_city_1);
				$('#address_phone_1').val(data.address_phone_1);
				$('#address_fax_1').val(data.address_fax_1);
				$('#address_email_1').val(data.address_email_1);
				$('#address_person_name_1').val(data.address_person_name_1);
				$('#address_person_phone_1').val(data.address_person_phone_1);
				$('#address_person_email_1').val(data.address_person_email_1);
				
				$('#address_title_2').val(data.address_title_2);
				$('#address_address_2').val(data.address_address_2);
				$('#address_city_2').val(data.address_city_2);
				$('#address_phone_2').val(data.address_phone_2);
				$('#address_fax_2').val(data.address_fax_2);
				$('#address_email_2').val(data.address_email_2);
				$('#address_person_name_2').val(data.address_person_name_2);
				$('#address_person_phone_2').val(data.address_person_phone_2);
				$('#address_person_email_2').val(data.address_person_email_2);
				
				$('#state').val('EDIT');
				$('#modal_title_customer').html("Edit Customer");				
				$('#modal_customer').modal('show');
			}
		});
	});
});