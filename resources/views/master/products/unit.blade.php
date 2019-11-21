@extends('template._main')

@section('title','Product Unit')
@section('page-title','Product Unit')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_unit"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_unit" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Unit Code</th>
								<th>Unit Name</th>
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
	<div id="modal_unit" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_unit"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>					
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_unit">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}
						
						<div class="form-group has-danger" id="form_group_unit_code">
							<label class="form-control-label" for="unit_code">Unit Code <span class="text-danger">*</span></label>								
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="ti-file"></i>
									</span>
								</div>
								<input type="text" value="{{ old('unit_code') }}" id="unit_code" name="unit_code" class="form-control form-control-danger" autofocus>
							</div>
							<small class="form-control-feedback" id="unit_code_error"></small>
						</div>
						<div class="form-group" id="form_group_unit_name">
							<label class="form-control-label" for="unit_name">Unit Name <span class="text-danger">*</span></label>	
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon2">
										<i class="ti-file"></i>
									</span>
								</div>
								<input type="text" value="{{ old('unit_name') }}" id="unit_name" name="unit_name" class="form-control">								
							</div>
							<small class="form-control-feedback" id="unit_name_error"></small>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_unit" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_unit" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/products/unit.js') }}"></script>
@endsection