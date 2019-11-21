@extends('template._main')

@section('title','Bill of Material')
@section('page-title','Bill of Material')

@section('content')
    <div class="col-lg-12">
    	<div class="card">
    		<div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add Detail Bill of Material</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('bill_of_material_h.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>
                <hr>
    			<form id="form_bill_of_material_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $bom_header->id }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label"><h4>{{ $bom_header->status_bom }}</h4></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="product_code">Product Code</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="product_code" name="product_code" class="form-control" value="{{ $bom_header->product_code }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="product_name">Product Name</label>   
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $bom_header->product_name }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="prepared_by">Prepared By</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="prepared_by" name="prepared_by" class="form-control" value="{{ $bom_header->prepared_by }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label" for="date_of_issue">Date of Issue</label>   
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="ti-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="date_of_issue" name="date_of_issue" class="form-control" value="{{ $bom_header->date_of_issue }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label" for="revision">Revision</label>   
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="revision" name="revision" class="form-control" value="{{ $bom_header->revision }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_raw_material_bom"><span class="btn-label"><i class="ti-plus"></i></span> Add New Raw Material</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_bill_of_material_dtl" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Material Code</th>
                                            <th>Description</th>
                                            <th>Usage</th>
                                            <th>UOM</th>
                                            <th>% Rejection</th>
                                            <th>Packing / Size</th>
                                            <th>Remark</th>
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

    <div id="modal_bom_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_bom_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_bom_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_bom_dtl" id="id_bom_dtl">
                        <input type="hidden" name="id_bom_hdr" id="id_bom_hdr" value="{{ $bom_header->id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_id_raw_material">
                                    <label class="control-label">Material Code <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-danger" style="width: 100%" id="id_raw_material" name="id_raw_material"></select>
                                    <small class="form-control-feedback" id="id_raw_material_error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_buying">Unit Buying</label>
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
                            <div class="col-md-4">
                                <div class="form-group has-danger" id="form_group_qty_usage">
                                    <label class="form-control-label" for="qty_usage">Usage</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_usage" name="qty_usage" value="0" class="form-control form-control-danger vertical-spin">
                                        <small class="form-control-feedback" id="qty_usage_error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger" id="form_group_percent_rejection">
                                    <label class="form-control-label" for="percent_rejection">% Rejection</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="percent_rejection" name="percent_rejection" value="0" class="form-control form-control-danger vertical-spin">
                                        <small class="form-control-feedback" id="percent_rejection_error"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_usage">Unit Usage</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="unit_code_usage" name="unit_code_usage" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="remarks">Remark</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="remarks" name="remarks" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="qty_conversion">Qty Conversion</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_conversion" name="qty_conversion" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_bom_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
                    <button type="button" class="btn btn-warning cancel_bom_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/master/products/bill_of_material_dtl.js') }}"></script>
@endsection