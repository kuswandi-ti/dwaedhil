@extends('template._main')

@section('title','Stock Card')
@section('page-title','Stock Card')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">				
				<ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_stock_card_wrm" role="tab"><span><i class="icon-layers"></i></span> Warehouse Raw Material</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_stock_card_wwip" role="tab"><span><i class="icon-grid "></i></span> Warehouse WIP</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_stock_card_wfg" role="tab"><span><i class="icon-drawar"></i></span> Warehouse Finish Goods</a> </li>
                </ul>
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="tab_stock_card_wrm" role="tabpanel">
                        <div class="p-20">
                            <div class="table-responsive">
								<table class="display nowrap table table-hover table-striped table-bordered color-table info-table" id="data_table_stock_card_wrm" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product ID</th>
											<th>Product Code</th>
											<th>Product Desc.</th>
											<th>UOM</th>
											<th>Qty Onhand</th>
											<th>Location</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_stock_card_wwip" role="tabpanel">
                    	<div class="p-20">
                            <div class="table-responsive">
								<table class="display nowrap table table-hover table-striped table-bordered color-table info-table" id="data_table_stock_card_wwip" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product ID</th>
											<th>Product Code</th>
											<th>Product Desc.</th>
											<th>UOM</th>
											<th>Qty Onhand</th>
											<th>Location</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_stock_card_wfg" role="tabpanel">
                    	<div class="p-20">
                            <div class="table-responsive">
								<table class="display nowrap table table-hover table-striped table-bordered color-table info-table" id="data_table_stock_card_wfg" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product ID</th>
											<th>Product Code</th>
											<th>Product Desc.</th>
											<th>UOM</th>
											<th>Qty Onhand</th>
											<th>Location</th>
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
            </div>
        </div>
    </div>

    <div id="modal_stock_card_detail" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title">Stock Card Detail</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" style="overflow: hidden;">
					<div class="table-responsive">
						<table class="display nowrap table table-hover table-striped table-bordered" id="data_table_stock_detail" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>ID</th>
									<th>Date</th>
									<th>Qty Begin</th>
									<th>Qty In</th>
									<th>Qty Out</th>
									<th>Qty Balance</th>
									<th>Reff. No.</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<span class="btn-label"><i class="ti-close"></i></span> Close
                    </button>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/transaction/warehouse/stock_card.js') }}"></script>
@endsection