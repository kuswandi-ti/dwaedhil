@extends('template._main')

@section('title','Production Planning')
@section('page-title','Production Planning')

@section('content')
    <div class="col-lg-12">
    	<div class="card">
    		<div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                        <h3 class="card-title">Add / Edit / Delete Detail Production Planning</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('production_planning.index') }}" class="btn btn-primary"><span class="btn-label"><i class="ti-angle-left"></i></span> Back</a>
                    </div>                    
                </div>

                <hr>

    			<form id="form_ppl_dtl">
                    <input type="hidden" name="id" id="id" value="{{ $ppl_header->id }}">
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
                                    <input type="text" id="doc_no" name="doc_no" class="form-control" value="{{ $ppl_header->doc_no }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="doc_date">Document Date (y-m-d)</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="doc_date" name="doc_date" class="form-control" value="{{ $ppl_header->doc_date }}" readonly>
                                </div>
                            </div>
                        </div>								
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="month_ppl_dtl">Month</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="month_ppl_dtl" name="month_ppl_dtl" class="form-control" value="{{ $ppl_header->month }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="year">Year</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="year" name="year" class="form-control" value="{{ $ppl_header->year }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="remarks">Remarks</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $ppl_header->remarks }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_product_ppl"><span class="btn-label"><i class="ti-plus"></i></span> Add Daily Plan</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_ppl_dtl" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No.</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Date (y-m-d)</th>
                                            <th>Qty</th>
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

    <div id="modal_ppl_dtl" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_ppl_dtl"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <form id="modal_form_ppl_dtl">
                        <input type="hidden" name="state" id="state">
                        <input type="hidden" name="id_ppl_dtl" id="id_ppl_dtl">
                        <input type="hidden" name="id_ppl_hdr" id="id_ppl_hdr" value="{{ $ppl_header->id }}">
                        <input type="hidden" name="qty_ppl_old" id="qty_ppl_old">
                        <input type="hidden" name="month_ppl" id="month_ppl" value="{{ $ppl_header->month }}">
                        <input type="hidden" name="year_ppl" id="year_ppl" value="{{ $ppl_header->year }}">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-danger" id="form_group_product_code_ppl">
                                    <label class="form-control-label" for="product_code_ppl">Product Code <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="product_code_ppl" name="product_code_ppl" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button id="btn_browse_product_ppl" class="btn btn-info" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback" id="product_code_ppl_error"></small>
                                </div>
                            </div>
                            <input type="hidden" name="product_id_ppl" id="product_id_ppl">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_name_ppl">Product Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="product_name_ppl" name="product_name_ppl" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="unit_code_ppl">UOM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-file"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="unit_code_ppl" name="unit_code_ppl" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger" id="form_group_day_ppl">
                                    <label class="control-label" for="day_ppl">Date <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-danger" style="width: 100%" id="day_ppl" name="day_ppl">
                                        @for ($i=1; $i<=$count_day; $i++)
                                            <option value="{!! $i !!}">
                                                {!! $i !!}
                                            </option>
                                        @endfor
                                    </select>
                                    <small class="form-control-feedback" id="day_ppl_error"></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger" id="form_group_qty_ppl">
                                    <label class="control-label" for="qty_ppl">Qty <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_ppl" name="qty_ppl" value="0" class="form-control form-control-danger vertical-spin hitung">
                                    </div>
                                    <small class="form-control-feedback" id="qty_ppl_error"></small>
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
                    <button type="button" class="btn btn-info save_ppl_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> <span class="title_save_ppl_dtl">Add & Save</span>
                    </button>
                    <button type="button" class="btn btn-warning cancel_ppl_dtl" data-dismiss="modal">
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
                                <table class="table display table-hover table-striped table-bordered color-table info-table" id="data_table_browse_product_ppl" cellspacing="0" width="100%">
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
	<script src="{{ asset('assets/edhil/js/transaction/production/production_planning_dtl.js') }}"></script>
@endsection