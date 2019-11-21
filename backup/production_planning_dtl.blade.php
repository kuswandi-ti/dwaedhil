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

    			<form id="form_gr_dtl">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label" for="customer_code">Customer Code</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="customer_code" name="customer_code" class="form-control" value="{{ $ppl_header->customer_code }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="customer_name">Customer Name</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ $ppl_header->customer_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="product_code">Product Code</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="product_code" name="product_code" class="form-control" value="{{ $ppl_header->product_code }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="product_name">Product Name</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $ppl_header->product_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="model_project">Model / Project</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-file"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="model_project" name="model_project" class="form-control" value="{{ $ppl_header->model_project }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-success" id="new_product_ppl"><span class="btn-label"><i class="ti-plus"></i></span> Add New Product</a>
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
                                            <th>Date (y-m-d)</th>
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group has-danger" id="form_group_qty_ppl">
                                    <label class="control-label" for="qty_ppl">Qty <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="mdi mdi-numeric"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="qty_ppl" name="qty_ppl" value="{{ old('qty_ppl') }}" class="form-control form-control-danger vertical-spin">
                                    </div>
                                    <small class="form-control-feedback" id="qty_ppl_error"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info save_ppl_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-save"></i></span> Save
                    </button>
                    <button type="button" class="btn btn-warning cancel_ppl_dtl" data-dismiss="modal">
                        <span class="btn-label"><i class="ti-power-off "></i></span> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection