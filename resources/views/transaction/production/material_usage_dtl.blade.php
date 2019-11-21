@extends('template._main')

@section('title','Material Usage')
@section('page-title','Material Usage')

@section('content')
    <div class="col-lg-12">
    	<div class="card">
    		<div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add / Edit / Delete Detail Material Usage</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('material_usage.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>

                <hr>

    			<form id="form_matusage_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $matusage_header->id }}">
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
                                    <input type="text" id="doc_no" name="doc_no" class="form-control" value="{{ $matusage_header->doc_no }}" readonly>
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
                                    <input type="text" id="doc_date" name="doc_date" class="form-control" value="{{ $matusage_header->doc_date }}" readonly>
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
                                    <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $matusage_header->remarks }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_raw_material_matusage"><span class="btn-label"><i class="ti-plus"></i></span> Add New Material</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_matusage_dtl" cellspacing="0" width="100%">
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

    <div id="modal_matusage_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_matusage_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_matusage_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_matusage_dtl" id="id_matusage_dtl">
                        <input type="hidden" name="id_matusage_hdr" id="id_matusage_hdr" value="{{ $matusage_header->id }}">
                        <input type="hidden" name="qty_matusage_old" id="qty_matusage_old">
                        {{ csrf_field() }}

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_id_raw_material_matusage">
                                    <label class="form-control-label" for="id_raw_material_matusage">Material Code <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-danger" style="width: 100%" id="id_raw_material_matusage" name="id_raw_material_matusage"></select>
                                    <small class="form-control-feedback" id="id_raw_material_matusage_error"></small>
                                </div>                                
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_raw_material_code_matusage">
                                    <label class="form-control-label" for="raw_material_code_matusage">Material Code <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="raw_material_code_matusage" name="raw_material_code_matusage" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button id="btn-browse-raw-material-matusage" class="btn btn-info" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback" id="raw_material_code_matusage_error"></small>
                                </div>
                            </div>
                            <input type="hidden" name="raw_material_id_matusage" id="raw_material_id_matusage">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="raw_material_name_matusage">Material Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="raw_material_name_matusage" name="raw_material_name_matusage" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_usage">UOM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="hidden" id="unit_id_usage" name="unit_id_usage" class="form-control" readonly>
                                        <input type="text" id="unit_code_usage" name="unit_code_usage" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="stock_onhand_matusage">Onhand</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="stock_onhand_matusage" name="stock_onhand_matusage" class="form-control" readonly>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_matusage">
                                    <label class="form-control-label" for="qty_matusage">Qty Matuse <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_matusage" name="qty_matusage" value="{{ old('qty_matusage') }}" class="form-control form-control-danger vertical-spin">
                                    </div>
                                    <small class="form-control-feedback" id="qty_matusage_error"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_matusage_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
                    <button type="button" class="btn btn-warning cancel_matusage_dtl" data-dismiss="modal">
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
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_browse_raw_material_matusage" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Material Code</th>
                                            <th>Description</th>
                                            <th>UOM ID</th>
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
	<script src="{{ asset('assets/edhil/js/transaction/production/material_usage_dtl.js') }}"></script>
@endsection