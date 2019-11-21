@extends('template._main')

@section('title','Product')
@section('page-title','Product')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_product"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_product" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Product Code</th>
								<th>Product Name</th>
								<th>CPN No.</th>
								<th>Product Group</th>
								<th>UOM</th>
								<th>Cust. Code</th>
								<th>Cust. Name</th>
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
	<div id="modal_product" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_product"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>					
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_product">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-danger" id="form_group_product_code">
									<label class="form-control-label" for="product_code">Product Code <span class="text-danger">*</span></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('product_code') }}" id="product_code" name="product_code" class="form-control form-control-danger" autofocus>								
									</div>
									<small class="form-control-feedback" id="product_code_error"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_product_name">
									<label class="form-control-label" for="product_name">Product Name <span class="text-danger">*</span></label>	
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('product_name') }}" id="product_name" name="product_name" class="form-control">
									</div>
									<small class="form-control-feedback" id="product_name_error"></small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_model_project">
									<label class="form-control-label" for="model_project">Model / Project</label>			
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('model_project') }}" id="model_project" name="model_project" class="form-control">	
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_id_product_group">
									<label class="form-control-label" for="id_product_group">Product Group <span class="text-danger">*</span></label>
									<select class="form-control form-control-danger" style="width: 100%" id="id_product_group" name="id_product_group"></select>
									<small class="form-control-feedback" id="id_product_group_error"></small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_id_unit">
									<label class="form-control-label" for="id_unit">Unit <span class="text-danger">*</span></label>							
									<select class="form-control form-control-danger" style="width: 100%" id="id_unit" name="id_unit"></select>
									<small class="form-control-feedback" id="id_unit_error"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_cpn_no">
									<label class="form-control-label" for="cpn_no">CPN No.</label>	
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('cpn_no') }}" id="cpn_no" name="cpn_no" class="form-control">
									</div>
									<small class="form-control-feedback" id="cpn_no_error"></small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_id_customer_product">
									<label class="form-control-label" for="id_customer_product">Customer <span class="text-danger">*</span></label>
									<select class="form-control form-control-danger" style="width: 100%" id="id_customer_product" name="id_customer_product"></select>
									<small class="form-control-feedback" id="id_customer_product_error"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group" id="form_group_life_span_num">
											<label class="form-control-label" for="life_span_num">Mould Code / Life Span </label>			
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="mdi mdi-numeric"></i>
													</span>
												</div>
												<input type="text" value="0" id="life_span_num" name="life_span_num" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group" id="form_group_life_span_time">
											<label class="form-control-label" for="life_span_time">&nbsp;</label>
											<select class="form-control" style="width: 100%" id="life_span_time" name="life_span_time">
												<option value="0">Year</option>
											    <option value="1">Month</option>
											</select>
										</div>
									</div>
								</div>								
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_cavity">
									<label class="form-control-label" for="cavity">Mould / Cavity </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="cavity" name="cavity" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">								
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_machine_tonage">
									<label class="form-control-label" for="machine_tonage">Machine Tonnage </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="machine_tonage" name="machine_tonage" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">								
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_machine_code">
									<label class="form-control-label" for="machine_code">Machine Code</label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('machine_code') }}" id="machine_code" name="machine_code" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_color">
									<label class="form-control-label" for="color">Color</label>	
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('color') }}" id="color" name="color" class="form-control">								
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_type_of_material">
									<label class="form-control-label" for="type_of_material">Type of Material</label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('type_of_material') }}" id="type_of_material" name="type_of_material" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_gross_weight">
									<label class="form-control-label" for="gross_weight">Gross Weight (Kg/pc) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="gross_weight" name="gross_weight" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_net_weight">
									<label class="form-control-label" for="net_weight">Net Weight (Kg/pc) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="net_weight" name="net_weight" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">								
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_mp_net_weight">
									<label class="form-control-label" for="mp_net_weight">MP Net Weight (Kg/pc) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="mp_net_weight" name="mp_net_weight" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_process">
									<label class="form-control-label" for="process">Process</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('process') }}" id="process" name="process" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_cycle_time_num">
									<label class="form-control-label" for="cycle_time_num">Cycle Time (sec) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="cycle_time_num" name="cycle_time_num" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_cycle_time_mp">
									<label class="form-control-label" for="cycle_time_mp">MP CT (persons) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="cycle_time_mp" name="cycle_time_mp" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="form_group_assy_time_num">
									<label class="form-control-label" for="assy_time_num">Assy Time (sec) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="assy_time_num" name="assy_time_num" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group" id="form_group_assy_time_mp">
									<label class="form-control-label" for="assy_time_mp">MP Assy (persons) </label>		
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="mdi mdi-numeric"></i>
											</span>
										</div>
										<input type="text" value="0" id="assy_time_mp" name="assy_time_mp" class="form-control vertical-spin" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								&nbsp;
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_product" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_product" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/products/product.js') }}"></script>
@endsection