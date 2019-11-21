@extends('template._main')

@section('title','Material Usage')
@section('page-title','Material Usage')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success" id="new_matusage_hdr"><span class="btn-label"><i class="ti-plus"></i></span> Add New</a>
				<hr >
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_matusage_hdr" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>#</th>
								<th>Doc. Num.</th>
								<th>Doc. Date</th>
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

    <div id="modal_matusage_hdr" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title" id="modal_title_matusage_hdr"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<form id="modal_form_matusage_hdr" class="form-horizontal">
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
											<input type="text" value="{{ old('doc_no') }}" id="doc_no" name="prepared_by" class="form-control form-control-danger" disabled>
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
					<button type="button" class="btn btn-info save_matusage_hdr" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
					<button type="button" class="btn btn-warning cancel_matusage_hdr" data-dismiss="modal">
						<span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/transaction/production/material_usage_hdr.js') }}"></script>
@endsection