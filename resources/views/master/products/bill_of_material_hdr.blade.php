@extends('template._main')

@section('title','Bill of Material')
@section('page-title','Bill of Material')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_bill_of_material_hdr"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_bill_of_material_hdr" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Product Code</th>
								<th>Product Name</th>
								<th>Unit</th>
								<th>Date of Issue (y-m-d)</th>
								<th>Revision</th>
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

    <div id="modal_bill_of_material_hdr" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_bill_of_material_hdr"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_bill_of_material_hdr" class="form-horizontal">
						<input type="hidden" name="state" id="state">
						<input type="hidden" name="id" id="id">
						{{ csrf_field() }}

						<div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_status_bom">
									<label class="control-label text-right col-md-3" for="status_bom">&nbsp;</label>
									<div class="col-md-9">
										<input type="radio" name="status_bom" id="NEW_PART" value="NEW PART" />
										<label for="NEW_PART">NEW PART</label>
	                                    <input type="radio" name="status_bom" id="AMENDMENT" value="AMENDMENT" />
	                                    <label for="AMENDMENT">AMENDMENT</label>
									</div>
								</div>
                            </div>
                        </div>

						<div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_prepared_by">
									<label class="control-label text-right col-md-3" for="prepared_by">Prepared By <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="{{ old('prepared_by') }}" id="prepared_by" name="prepared_by" class="form-control form-control-danger" autofocus>
										</div>
										<small class="form-control-feedback" id="prepared_by_error"></small>
									</div>
								</div>
                            </div>
                        </div>

                        <div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_date_of_issue">
									<label class="control-label text-right col-md-3" for="date_of_issue">Date of Issue (y-m-d) <span class="text-danger">*</span></label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon_date_of_issue">
													<i class="ti-calendar"></i>
												</span>
											</div>
											<input type="text" value="{{ old('date_of_issue') }}" id="date_of_issue" name="date_of_issue" class="form-control form-control-danger">
										</div>
										<small class="form-control-feedback" id="date_of_issue_error"></small>
									</div>
								</div>
                            </div>
                        </div>

                        <div class="row">							
                            <div class="col-md-12">
                            	<div class="form-group has-danger row" id="form_group_revision">
									<label class="control-label text-right col-md-3" for="revision">Revision <span class="text-danger">*</span></label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<i class="ti-file"></i>
												</span>
											</div>
											<input type="text" value="{{ old('revision') }}" id="revision" name="revision" class="form-control form-control-danger">								
										</div>
										<small class="form-control-feedback" id="revision_error"></small>
									</div>
								</div>
                            </div>
                        </div>

						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger row" id="form_group_id_product_bom_hdr">
                                    <label class="control-label text-right col-md-3">Product Code <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control form-control-danger" style="width: 100%" id="id_product_bom_hdr" name="id_product_bom_hdr"></select>
                                        <small class="form-control-feedback" id="id_product_bom_hdr_error"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="product_name" name="product_name" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Unit</label>
                                    <div class="col-md-3">
                                        <input type="text" id="unit_code" name="unit_code" class="form-control" readonly>
                                    </div>
                                    <label class="control-label text-right col-md-3">Mould / Cavity</label>
                                    <div class="col-md-3">
                                        <input type="text" id="cavity" name="cavity" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Mould Code/Life Span</label>
                                    <div class="col-md-3">
                                        <input type="text" id="life_span_num" name="life_span_num" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="life_span_time_bill_of_material" name="life_span_time_bill_of_material" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info save_bill_of_material_hdr" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_bill_of_material_hdr" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/products/bill_of_material_hdr.js') }}"></script>
@endsection