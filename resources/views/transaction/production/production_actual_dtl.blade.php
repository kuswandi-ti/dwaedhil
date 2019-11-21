@extends('template._main')

@section('title','Production Actual')
@section('page-title','Production Actual')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add / Edit / Delete Detail Production Actual</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('production_actual.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>

                <hr>

                <form id="form_prodactual_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $prodactual_header->id }}">
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
                                    <input type="text" id="doc_no" name="doc_no" class="form-control" value="{{ $prodactual_header->doc_no }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="prod_actual_date">Prod. Actual Date (y-m-d)</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="prod_actual_date" name="prod_actual_date" class="form-control" value="{{ $prodactual_header->prod_actual_date }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="doc_date">Document Date (y-m-d)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="doc_date" name="doc_date" class="form-control" value="{{ $prodactual_header->doc_date }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="remarks">Remarks</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $prodactual_header->remarks }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_product_prodactual"><span class="btn-label"><i class="ti-plus"></i></span> Add Production Actual</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_prodactual_dtl" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Qty OK</th>
                                            <th>Qty Scrap</th>
                                            <th>Qty Rework</th>
                                            <th>Qty Total</th>
                                            <th>Time Start</th>
                                            <th>Time Finish</th>
                                            <th>Time Total (mnt)</th>
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

    <div id="modal_prodactual_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_prodactual_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_prodactual_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_prodactual_dtl" id="id_prodactual_dtl">
                        <input type="hidden" name="id_prodactual_hdr" id="id_prodactual_hdr" value="{{ $prodactual_header->id }}">
                        <input type="hidden" name="qty_ok_old" id="qty_ok_old">
                        <input type="hidden" name="qty_reject_old" id="qty_reject_old">
                        <input type="hidden" name="qty_rework_old" id="qty_rework_old">
                        <input type="hidden" name="qty_total_old" id="qty_total_old">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_product_code_prodactual">
                                    <label class="form-control-label" for="product_code_prodactual">Product Code <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="product_code_prodactual" name="product_code_prodactual" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button id="btn_browse_product_prodactual" class="btn btn-info" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback" id="product_code_prodactual_error"></small>
                                </div>
                            </div>
                            <input type="hidden" name="product_id_prodactual" id="product_id_prodactual">
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_name_prodactual">Product Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="product_name_prodactual" name="product_name_prodactual" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_prodactual">UOM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="unit_code_prodactual" name="unit_code_prodactual" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_ok_prodactual">
                                    <label class="form-control-label" for="qty_ok_prodactual">Qty OK <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_ok_prodactual" name="qty_ok_prodactual" value="{{ old('qty_ok') }}" class="form-control form-control-danger vertical-spin hitung_prodactual">
                                    </div>
                                    <small class="form-control-feedback" id="qty_ok_prodactual_error"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_reject_prodactual">
                                    <label class="form-control-label" for="qty_reject_prodactual">Qty Scrap <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_reject_prodactual" name="qty_reject_prodactual" value="{{ old('qty_reject') }}" class="form-control form-control-danger vertical-spin hitung_prodactual">
                                    </div>
                                    <small class="form-control-feedback" id="qty_reject_prodactual_error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_rework_prodactual">
                                    <label class="form-control-label" for="qty_rework_prodactual">Qty Rework <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_rework_prodactual" name="qty_rework_prodactual" value="{{ old('qty_rework') }}" class="form-control form-control-danger vertical-spin hitung_prodactual">
                                    </div>
                                    <small class="form-control-feedback" id="qty_rework_prodactual_error"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_reject_prodactual">
                                    <label class="form-control-label" for="qty_total_prodactual">Qty Total <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_total_prodactual" name="qty_total_prodactual" value="{{ old('qty_total') }}" class="form-control form-control-danger vertical-spin" readonly>
                                    </div>
                                    <small class="form-control-feedback" id="qty_total_prodactual_error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="time_start_ppl">Time Start</label>
                                    <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="far fa-clock"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="time_start_ppl" name="time_start_ppl" class="form-control hitung_total_hours">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <label class="form-control-label" for="time_finish_ppl">Time Finish</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="far fa-clock"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="time_finish_ppl" name="time_finish_ppl" class="form-control hitung_total_hours">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger" id="form_group_time_total_ppl">
                                    <label class="control-label" for="time_total_ppl">Time Total (mnt)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="time_total_ppl" name="time_total_ppl" value="0" class="form-control form-control-danger vertical-spin" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_prodactual_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> <span class="title_save_prodactual_dtl">Add & Save</span>
                    </button>
                    <button type="button" class="btn btn-warning cancel_prodactual_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-power-off "></i></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Select Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body pl-0 pr-0 pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_browse_product_prodactual" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
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
	<script src="{{ asset('assets/edhil/js/transaction/production/production_actual_dtl.js') }}"></script>
@endsection