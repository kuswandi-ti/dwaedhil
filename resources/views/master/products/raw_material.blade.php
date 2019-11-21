@extends('template._main')

@section('title','Raw Material')
@section('page-title','Raw Material')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_raw_material"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_raw_material" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Material Code</th>
								<th>Material Name</th>
								<th>VPN Code</th>								
								<th>Unit (Buying)</th>
								<th>Unit (Usage)</th>
								<th>Supplier Code</th>
								<th>Supplier Name</th>
								<th>Qty (Conversion)</th>
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
	<div id="modal_raw_material" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_raw_material"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>					
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_raw_material">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-5">
								<div class="form-group has-danger" id="form_group_material_code">
									<label class="form-control-label" for="material_code">Material Code <span class="text-danger">*</span></label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('material_code') }}" id="material_code" name="material_code" class="form-control form-control-danger" autofocus>
									</div>
									<small class="form-control-feedback" id="material_code_error"></small>
								</div>
							</div>
							<div class="col-md-7">
								<div class="form-group" id="form_group_material_name">
									<label class="form-control-label" for="material_name">Material Name <span class="text-danger">*</span></label>	
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('material_name') }}" id="material_name" name="material_name" class="form-control form-control-danger">								
									</div>
									<small class="form-control-feedback" id="material_name_error"></small>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-5">
								<div class="form-group" id="form_group_vpn_no">
									<label class="form-control-label" for="vpn_no">VPN No <span class="text-danger">*</span></label>	
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('vpn_no') }}" id="vpn_no" name="vpn_no" class="form-control form-control-danger">
									</div>
									<small class="form-control-feedback" id="vpn_no_error"></small>
								</div>
							</div>
							<div class="col-md-7">
								<div class="form-group" id="form_group_id_supplier_raw_material">
									<label class="form-control-label" for="id_supplier_raw_material">Supplier <span class="text-danger">*</span></label>
									<select class="form-control form-control-danger" style="width: 100%" id="id_supplier_raw_material" name="id_supplier_raw_material"></select>
									<small class="form-control-feedback" id="id_supplier_raw_material_error"></small>
								</div>
							</div>
						</div>						

						<div class="row">
							<div class="col-md-4">
								<div class="form-group" id="form_group_id_unit_buying">
									<label class="form-control-label" for="id_unit_buying">Unit (Buying) <span class="text-danger">*</span></label>
									<select class="form-control form-control-danger" style="width: 100%" id="id_unit_buying" name="id_unit_buying"></select>	
									<small class="form-control-feedback" id="id_unit_buying_error"></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group" id="form_group_id_unit_usage">
									<label class="form-control-label" for="id_unit_usage">Unit (Usage) <span class="text-danger">*</span></label>
									<select class="form-control form-control-danger" style="width: 100%" id="id_unit_usage" name="id_unit_usage"></select>
									<small class="form-control-feedback" id="id_unit_usage_error"></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group" id="form_group_qty_conversion">
									<label class="form-control-label" for="qty_conversion">Qty Conversion </label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="qty_conversion" name="qty_conversion" class="form-control form-control-danger vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">				
									</div>
									<small class="form-control-feedback" id="qty_conversion_error"></small>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_raw_material" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_raw_material" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/products/raw_material.js') }}"></script>
@endsection