@extends('template._main')

@section('title','Customer')
@section('page-title','Customer')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
				<a href="javascript:void(0)" class="btn btn-success" id="new_customer"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_customer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Customer Code</th>
								<th>Customer Name</th>
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
	
	<div id="modal_customer" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_customer"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>					
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_customer_general" role="tab"><span><i class="ti-file"></i> General</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_customer_address_1" role="tab"><span><i class="ti-home"></i> Address 1</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_customer_address_2" role="tab"><span><i class="ti-map"></i> Address 2</span></a> </li>
					</ul>
					<form id="modal_form_customer" class="form-horizontal">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}
						
						<div class="tab-content tabcontent-border">							
							<div class="tab-pane active" id="tab_customer_general" role="tabpanel">
								<div class="p-20">
									<div class="form-group has-danger" id="form_group_customer_code">
										<label class="form-control-label" for="customer_code">Customer Code <span class="text-danger">*</span></label>								
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="{{ old('customer_code') }}" id="customer_code" name="customer_code" class="form-control form-control-danger" placeholder="AUTO" disabled>								
										</div>
										<small class="form-control-feedback" id="customer_code_error"></small>
									</div>
									<div class="form-group has-danger" id="form_group_customer_name">
										<label class="form-control-label" for="customer_name">Customer Name <span class="text-danger">*</span></label>	
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon2">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="{{ old('customer_name') }}" id="customer_name" name="customer_name" class="form-control form-control-danger" autofocus>
										</div>
										<small class="form-control-feedback" id="customer_name_error"></small>
									</div>
								</div>
							</div>
							
							<div class="tab-pane p-20" id="tab_customer_address_1" role="tabpanel">
								<div class="form-group has-danger" id="form_group_address_title_1">
									<label class="form-control-label" for="address_title_1">Title <span class="text-danger">*</span></label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('address_title_1') }}" id="address_title_1" name="address_title_1" class="form-control form-control-danger">
									</div>
									<small class="form-control-feedback" id="address_title_1_error"></small>
								</div>
								<div class="form-group has-danger" id="form_group_address_address_1">
									<label class="form-control-label" for="address_address_1">Address <span class="text-danger">*</span></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<textarea rows="2" id="address_address_1" name="address_address_1" class="form-control form-control-danger"></textarea>
									</div>
									<small class="form-control-feedback" id="address_address_1_error"></small>
								</div>
								<div class="form-group has-danger" id="form_group_address_city_1">
									<label class="form-control-label" for="address_city_1">City</label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="far fa-hospital"></i>
											</span>
										</div>
										<input type="text" value="{{ old('address_city_1') }}" id="address_city_1" name="address_city_1" class="form-control form-control-danger">
									</div>
									<small class="form-control-feedback" id="address_city_1_error"></small>
								</div>
								<div class="row">
									<div class="form-group col-lg-4 has-danger" id="form_group_address_city_1">
										<label class="control-label" for="address_phone_1">Phone</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="mdi mdi-phone"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_phone_1') }}" id="address_phone_1" name="address_phone_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_phone_1_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_fax_1">
										<label class="control-label" for="address_fax_1">Fax.</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-printer"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_fax_1') }}" id="address_fax_1" name="address_fax_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_fax_1_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_email_1">
										<label class="control-label" for="address_email_1">Email</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-email"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_email_1') }}" id="address_email_1" name="address_email_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_email_1_error"></small>
                                    </div>
                                </div>
								<div class="row">
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_name_1">
										<label class="control-label" for="address_person_name_1">Person Name</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fas fa-user"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_name_1') }}" id="address_person_name_1" name="address_person_name_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_name_1_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_phone_1">
										<label class="control-label" for="address_person_phone_1">Person Phone</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="mdi mdi-phone"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_phone_1') }}" id="address_person_phone_1" name="address_person_phone_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_phone_1_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_email_1">
										<label class="control-label" for="address_person_email_1">Person Email</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-email"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_email_1') }}" id="address_person_email_1" name="address_person_email_1" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_email_1_error"></small>
                                    </div>
                                </div>
							</div>
							
							<div class="tab-pane p-20" id="tab_customer_address_2" role="tabpanel">
								<div class="form-group has-danger" id="form_group_address_title_2">
									<label class="form-control-label" for="address_title_2">Title <span class="text-danger">*</span></label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<input type="text" value="{{ old('address_title_2') }}" id="address_title_2" name="address_title_2" class="form-control form-control-danger">
									</div>
									<small class="form-control-feedback" id="address_title_2_error"></small>
								</div>
								<div class="form-group has-danger" id="form_group_address_address_2">
									<label class="form-control-label" for="address_address_2">Address <span class="text-danger">*</span></label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="ti-file"></i>
											</span>
										</div>
										<textarea rows="2" id="address_address_2" name="address_address_2" class="form-control form-control-danger"></textarea>
									</div>
									<small class="form-control-feedback" id="address_address_2_error"></small>
								</div>
								<div class="form-group has-danger" id="form_group_address_city_2">
									<label class="form-control-label" for="address_city_2">City</label>								
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">
												<i class="far fa-hospital"></i>
											</span>
										</div>
										<input type="text" value="{{ old('address_city_2') }}" id="address_city_2" name="address_city_2" class="form-control form-control-danger">
									</div>
									<small class="form-control-feedback" id="address_city_2_error"></small>
								</div>
								<div class="row">
									<div class="form-group col-lg-4 has-danger" id="form_group_address_city_2">
										<label class="control-label" for="address_phone_2">Phone</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="mdi mdi-phone"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_phone_2') }}" id="address_phone_2" name="address_phone_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_phone_2_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_fax_2">
										<label class="control-label" for="address_fax_2">Fax.</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-printer"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_fax_2') }}" id="address_fax_2" name="address_fax_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_fax_2_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_email_2">
										<label class="control-label" for="address_email_2">Email</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-email"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_email_2') }}" id="address_email_2" name="address_email_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_email_2_error"></small>
                                    </div>
                                </div>
								<div class="row">
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_name_2">
										<label class="control-label" for="address_person_name_2">Person Name</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="fas fa-user"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_name_2') }}" id="address_person_name_2" name="address_person_name_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_name_2_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_phone_2">
										<label class="control-label" for="address_person_phone_2">Person Phone</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="mdi mdi-phone"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_phone_2') }}" id="address_person_phone_2" name="address_person_phone_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_phone_2_error"></small>
                                    </div>
									<div class="form-group col-lg-4 has-danger" id="form_group_address_person_email_2">
										<label class="control-label" for="address_person_email_2">Person Email</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-email"></i>
												</span>
											</div>
											<input type="text" value="{{ old('address_person_email_2') }}" id="address_person_email_2" name="address_person_email_2" class="form-control form-control-danger">
                                        </div>
										<small class="form-control-feedback" id="address_person_email_2_error"></small>
                                    </div>
                                </div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_customer" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_customer" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/partners/customer.js') }}"></script>
@endsection