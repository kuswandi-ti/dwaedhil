@extends('template._main')

@section('title','Material Request')
@section('page-title','Material Request')

@section('content')
    <div class="col-lg-12">
    	<div class="card">
    		<div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add / Edit / Delete Detail Material Request</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('material_request.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>

                <hr>

    			<form id="form_matreq_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $matreq_header->id }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="doc_no">Document Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="doc_no" name="doc_no" class="form-control" value="{{ $matreq_header->doc_no }}" readonly>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="doc_date">Document Date (y-m-d)</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="doc_date" name="doc_date" class="form-control" value="{{ $matreq_header->doc_date }}" readonly>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="form-control-label" for="remarks">Remarks</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $matreq_header->remarks }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_raw_material_matreq"><span class="btn-label"><i class="ti-plus"></i></span> Add New Material</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_matreq_dtl" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Material Code</th>
                                            <th>Description</th>
                                            <th>UOM</th>
                                            <th>Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    			</form>
    		</div>
    	</div>
    </div>

    <div id="modal_matreq_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_matreq_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_matreq_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_matreq_dtl" id="id_matreq_dtl">
                        <input type="hidden" name="id_matreq_hdr" id="id_matreq_hdr" value="{{ $matreq_header->id }}">
                        <input type="hidden" name="qty_matreq_old" id="qty_matreq_old">
                        {{ csrf_field() }}

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_id_raw_material_matreq">
                                    <label class="form-control-label" for="id_raw_material_matreq">Material Code <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-danger" style="width: 100%" id="id_raw_material_matreq" name="id_raw_material_matreq"></select>
                                    <small class="form-control-feedback" id="id_raw_material_matreq_error"></small>
                                </div>                                
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_raw_material_code_matreq">
                                    <label class="form-control-label" for="raw_material_code_matreq">Material Code <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="raw_material_code_matreq" name="raw_material_code_matreq" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button id="btn-browse-raw-material-matreq" class="btn btn-info" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback" id="raw_material_code_matreq_error"></small>
                                </div>
                            </div>
                            <input type="hidden" name="raw_material_id_matreq" id="raw_material_id_matreq">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="raw_material_name_matreq">Material Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="raw_material_name_matreq" name="raw_material_name_matreq" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_buying">UOM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="unit_code_buying" name="unit_code_buying" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="stock_onhand_matreq">Onhand</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="stock_onhand_matreq" name="stock_onhand_matreq" class="form-control" readonly>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_matreq">
                                    <label class="form-control-label" for="qty_matreq">Qty Matreq <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_matreq" name="qty_matreq" value="{{ old('qty_matreq') }}" class="form-control form-control-danger vertical-spin">
                                    </div>
                                    <small class="form-control-feedback" id="qty_matreq_error"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_matreq_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
                    <button type="button" class="btn btn-warning cancel_matreq_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Select Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body pl-0 pr-0 pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_browse_raw_material" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Material Code</th>
                                            <th>Description</th>
                                            <th>UOM</th>
                                            <th>Onhand</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/transaction/production/material_request_dtl.js') }}"></script>
@endsection