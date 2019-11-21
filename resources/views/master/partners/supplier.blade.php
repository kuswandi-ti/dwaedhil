@extends('template._main')

@section('title','Supplier')
@section('page-title','Supplier')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_supplier"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_supplier" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Supplier Code</th>
								<th>Supplier Name</th>
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
	<div id="modal_supplier" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_supplier"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>					
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_supplier">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}
						
						<div class="form-group has-danger" id="form_group_supplier_code">
							<label class="form-control-label" for="supplier_code">Supplier Code <span class="text-danger">*</span></label>								
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="ti-file"></i>
									</span>
								</div>
								<input type="text" value="{{ old('supplier_code') }}" id="supplier_code" name="supplier_code" class="form-control form-control-danger" placeholder="AUTO" disabled>								
							</div>
							<small class="form-control-feedback" id="supplier_code_error"></small>
						</div>
						<div class="form-group" id="form_group_supplier_name">
							<label class="form-control-label" for="supplier_name">Supplier Name <span class="text-danger">*</span></label>	
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon2">
										<i class="ti-file"></i>
									</span>
								</div>
								<input type="text" value="{{ old('supplier_name') }}" id="supplier_name" name="supplier_name" class="form-control" autofocus>								
							</div>
							<small class="form-control-feedback" id="supplier_name_error"></small>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_supplier" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_supplier" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/partners/supplier.js') }}"></script>
@endsection