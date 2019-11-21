@extends('template._main')

@section('title','Allocation Finish Goods')
@section('page-title','Allocation Finish Goods')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add / Edit / Delete Detail Allocation Finish Goods</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('allocation_fg.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>

                <hr>

                <form id="form_alloc_fg_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $alloc_fg_header->id }}">
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
                                    <input type="text" id="doc_no" name="doc_no" class="form-control" value="{{ $alloc_fg_header->doc_no }}" readonly>
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
                                    <input type="text" id="doc_date" name="doc_date" class="form-control" value="{{ $alloc_fg_header->doc_date }}" readonly>
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
                                    <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $alloc_fg_header->remarks }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_product_alloc_fg"><span class="btn-label"><i class="ti-plus"></i></span> Add Product</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_alloc_fg_dtl" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Qty Alloc.</th>
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

    <div id="modal_alloc_fg_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_alloc_fg_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_alloc_fg_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_alloc_fg_dtl" id="id_alloc_fg_dtl">
                        <input type="hidden" name="id_alloc_fg_hdr" id="id_alloc_fg_hdr" value="{{ $alloc_fg_header->id }}">
                        <input type="hidden" name="qty_alloc_old" id="qty_alloc_old">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_product_code_alloc_fg">
                                    <label class="form-control-label" for="product_code_alloc_fg">Product Code <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="product_code_alloc_fg" name="product_code_alloc_fg" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button id="btn_browse_product_alloc_fg" class="btn btn-info" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback" id="product_code_alloc_fg_error"></small>
                                </div>
                            </div>
                            <input type="hidden" name="product_id_alloc_fg" id="product_id_alloc_fg">
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_name_alloc_fg">Product Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="product_name_alloc_fg" name="product_name_alloc_fg" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_alloc_fg">UOM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="unit_code_alloc_fg" name="unit_code_alloc_fg" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-danger" id="form_group_qty_alloc_alloc_fg">
                                    <label class="form-control-label" for="qty_alloc_alloc_fg">Qty Alloc. <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_alloc_alloc_fg" name="qty_alloc_alloc_fg" value="{{ old('qty_alloc') }}" class="form-control form-control-danger vertical-spin hitung_alloc_fg">
                                    </div>
                                    <small class="form-control-feedback" id="qty_alloc_alloc_fg_error"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_alloc_fg_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
                    <button type="button" class="btn btn-warning cancel_alloc_fg_dtl" data-dismiss="modal">
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
                    <h4 class="modal-title" id="myLargeModalLabel">Select Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body pl-0 pr-0 pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_browse_product_alloc_fg" cellspacing="0" width="100%">
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
	<script src="{{ asset('assets/edhil/js/transaction/production/allocation_fg_dtl.js') }}"></script>
@endsection