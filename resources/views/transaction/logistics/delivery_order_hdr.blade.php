@extends('template._main')

@section('title','Delivery Order')
@section('page-title','Delivery Order')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_do_hdr"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_do_hdr" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Doc. Num.</th>
								<th>Doc. Date</th>
								<th>Vehicle Number</th>
								<th>Driver Name</th>
								<th>Loading Time</th>
								<th>Remarks</th>
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

    <div id="modal_do_hdr" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_do_hdr"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_do_hdr" class="form-horizontal">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}

						<div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_doc_no">
									<label class="control-label text-right col-md-3" for="doc_no">Doc. Num. <span class="text-danger">*</span></label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="{{ old('doc_no') }}" id="doc_no" name="doc_no" class="form-control form-control-danger" disabled>								
										</div>
										<small class="form-control-feedback" id="doc_no_error"></small>
									</div>
								</div>
                            </div>
                        </div>

                        <div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_doc_date">
									<label class="control-label text-right col-md-3" for="doc_date">Doc. Date (y-m-d) <span class="text-danger">*</span></label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon_doc_date">
													<i class="ti-calendar"></i>
												</span>
											</div>
											<input type="text" value="{{ old('doc_date') }}" id="doc_date" name="doc_date" class="form-control form-control-danger">
										</div>
										<small class="form-control-feedback" id="doc_date_error"></small>
									</div>
								</div>
                            </div>
                        </div>
						
						<div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_vehicle_number">
									<label class="control-label text-right col-md-3" for="vehicle_number">Vehicle Number <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="" id="vehicle_number" name="vehicle_number" class="form-control form-control-danger">								
										</div>
										<small class="form-control-feedback" id="vehicle_number_error"></small>
									</div>
								</div>
                            </div>
                        </div>
						
						<div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_driver_name">
									<label class="control-label text-right col-md-3" for="driver_name">Driver Name <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="" id="driver_name" name="driver_name" class="form-control form-control-danger">								
										</div>
										<small class="form-control-feedback" id="driver_name_error"></small>
									</div>
								</div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_loading_time">
									<label class="control-label text-right col-md-3" for="loading_time">Loading Time <span class="text-danger">*</span></label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="" id="loading_time" name="loading_time" class="form-control form-control-danger">								
										</div>
										<small class="form-control-feedback" id="loading_time_error"></small>
									</div>
								</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Remarks</label>
                                    <div class="col-md-9">
                                    	<textarea id="remarks" name="remarks" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_do_hdr" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_do_hdr" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/transaction/logistics/delivery_order_hdr.js') }}"></script>
@endsection