@extends('template._main')

@section('title','User Account')
@section('page-title','User Account')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body pl-0 pr-0">
                <a href="javascript:void(0)" class="btn btn-info mt-2 ml-4" id="new_user"><i class="fas fa-plus"></i> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_user" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>

    {{-- http://chapter31.com/2011/10/27/twitter-bootstrap-modal-not-working-in-firefox/ --}}
    <div id="modal_user" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_user"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_user">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}
						
						<div class="form-group has-danger" id="form_group_name">
							<label class="form-control-label" for="name">Name <span class="text-danger">*</span></label>								
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="ti-file"></i>
									</span>
								</div>
								<input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control form-control-danger" autofocus>								
							</div>
							<small class="form-control-feedback" id="name_error"></small>
						</div>
						
						<div class="form-group has-danger" id="form_group_email">
							<label class="form-control-label" for="email">Email <span class="text-danger">*</span></label>								
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="ti-email"></i>
									</span>
								</div>
								<input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control form-control-danger">								
							</div>
							<small class="form-control-feedback" id="email_error"></small>
						</div>
						
						<div class="form-group has-danger" id="form_group_username">
							<label class="form-control-label" for="username">Username <span class="text-danger">*</span></label>								
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="ti-user"></i>
									</span>
								</div>
								<input type="text" value="{{ old('username') }}" id="username" name="username" class="form-control form-control-danger">								
							</div>
							<small class="form-control-feedback" id="username_error"></small>
						</div>
					</form>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_user" data-dismiss="modal">
                        <i class="far fa-save"></i> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_user" data-dismiss="modal">
						<i class="far fa-window-close"></i> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/sys/user_account.js') }}"></script>
@endsection