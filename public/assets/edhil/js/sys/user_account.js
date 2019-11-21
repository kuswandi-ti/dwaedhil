$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#data_table_user').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'user_account/list_users',
			type: 'GET'
		},
		'fnCreatedRow': function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
		},
		columns: [
			{ data: 'id', name: 'id', 'visible': false },
			{ data: null, name: null, orderable: false, searchable: false },
			{ data: 'name', name: 'name' },
			{ data: 'username', name: 'username' },
			{ data: 'email', name: 'email' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
		],
		order: [['2', 'asc']],
		'columnDefs': [
			{ "className": "text-center", "targets": [0, 1, 5] }
		],
		'autoWidth': false,
		'responsive': true
	});
	
	function reset_error() {
		$('#name').removeClass('form-control-danger');
		$('#name_error').html( "" );
		$('#form_group_name').removeClass('has-danger');
		
		$('#email').removeClass('form-control-danger');
		$('#email_error').html( "" );
		$('#form_group_email').removeClass('has-danger');
		
		$('#username').removeClass('form-control-danger');
		$('#username_error').html( "" );
		$('#form_group_username').removeClass('has-danger');
	}
	
	function reset_input() {
		$('#id').val('');
		$('#state').val('');
		
		$('#name').val('');
		$('#email').val('');
		$('#username').val('');
		
		$('.save_user').prop('disabled', false);
		$('.cancel_user').prop('disabled', false);
	}
	
	$('#new_user').click(function () {
		reset_input();
		reset_error();
		$('#state').val('ADD');
        $('#modal_title_user').html("Add New User");
		$('#modal_user').modal('show');
	});
	
	$('.save_user').click(function(e) {
		e.preventDefault();
		
		var state = $('#state').val();
		var id = $('#id').val();
		var name = $("input[name='name']").val();
		var email = $("input[name='email']").val();
		var username = $("input[name='username']").val();
		
		if (state == 'ADD') {
			url = 'user_account';
			tipe = 'POST';
		} else {
			url = 'user_account/'+id;
			tipe = 'PUT';
		}
		
		$('.save_user').prop('disabled', true);
		$('.cancel_user').prop('disabled', true);
		
		$.ajax({
			type: tipe,
			url: url,
			data: {
				id: id,
				name: name,
				email: email,
				username: username
			},
			success: function(data) {
				if ($.isEmptyObject(data.errors)) {
					$('#modal_user').modal('hide');
					var oTable = $('#data_table_user').dataTable();
					oTable.fnDraw(false);
					swal({
						title: "Success!",
						text: "Successfully Saved.",
						timer: 4000,
						showConfirmButton: true
					});					
				} else {
					reset_error();
					if (data.errors.name) {
						$('#form_group_name').addClass('has-danger');
						$('#name').addClass('form-control-danger');
                        $('#name_error').html(data.errors.name[0]);
                    }
                    if (data.errors.email) {
						$('#form_group_email').addClass('has-danger');
						$('#email').addClass('form-control-danger');
                        $('#email_error').html(data.errors.email[0]);
                    }
					if (data.errors.username) {
						$('#form_group_username').addClass('has-danger');
						$('#username').addClass('form-control-danger');
                        $('#username_error').html(data.errors.username[0]);
                    }
					$('.save_user').prop('disabled', false);
					$('.cancel_user').prop('disabled', false);
                }
            },
			error: function (xhr, textStatus, errorThrown) {
				alert("Error: " + errorThrown);
			}
		});
	});
	
	$('body').on('click', '#delete_user', function (e) {
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
						url : 'user_account/change_status',
						type: 'POST',
						dataType : 'json',
						data : { 'id': id }						
					})
					.done(function(data){
						if (data.success == true) {
							var oTable = $('#data_table_user').dataTable();
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
	
	$('body').on('click', '#edit_user', function (e) {
		e.preventDefault();
		reset_input();
		reset_error();
		var id = $(this).data('id');
		var url = 'user_account/'+id+'/edit';
		$.ajax({
			url: url,
			type: 'GET',
			datatype: 'json',
			success: function(data) {	
				$('#id').val(data.id);
				$('#name').val(data.name);
				$('#email').val(data.email);
				$('#username').val(data.username);
				$('#state').val('EDIT');
				$('#modal_title_user').html("Edit User");				
				$('#modal_user').modal('show');
			}
		});
	});
});