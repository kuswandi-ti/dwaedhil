@extends('template._main')

@section('title','Home')
@section('page-title','Dashboard')

@section('content')
  	<div class="col-lg-12">
		<div class="card">			
			<div class="card-body">
				<label class="label label-rounded label-success card-title">Performance Graphic</label>
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/productivity_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_productivity">Productivity</button>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/availability_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_availability">Availability</button>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/part_ok_vs_rework_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_ok_rework">Ok vs Rework</button>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/quality_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_quality">Quality</button>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/scrap_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_scrap">Scrap</button>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="card">
							<img class="card-img-top img-responsive" src="{{ asset('assets/edhil/images/dashboard/coming_soon_small.jpg') }}" alt="Card image cap">
							<div class="card-body">
								<button type="button" class="btn waves-effect waves-light btn-block btn-danger" id="show_modal_coming_soon" disabled>Coming Soon</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- Modal Productivity -->
	<div id="bs-example-modal-lg-1" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!-- https://stackoverflow.com/questions/42896820/modal-width-increase -->
		<div class="modal-dialog modal-lg" style="max-width:100%!important;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">					
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<select class="form-control custom-select" name="bulan" id="bulan">
									<?php
										$bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										$jumlah_bulan = count($bulan);
										for($i=0; $i<$jumlah_bulan; $i++) {
											$selected = date('m') == $i+1 ? 'selected' : '';
											echo "<option value=$i+1 $selected>$bulan[$i]</option>";
										}
									?>
								</select>
								<select class="form-control custom-select" name="tahun" id="tahun">
									<?php
										$tahun_init = 2018;
										$jumlah_tahun = 10;
										for($i=0; $i<$jumlah_tahun; $i++) {
											$set_tahun = $tahun_init+$i;
											$selected = date('Y') == $set_tahun ? 'selected' : '';
											echo "<option value=$set_tahun $selected>$set_tahun</option>";
										}
									?>
								</select>
								<button type="button" class="btn waves-effect waves-light btn-info" id="btn_show_graphic">Process</button>
							</div>
						</div>
					</div>
					<div class="scoll-tree">
						<div id="dashboard_chart" class="scroll_group" style="height:400px;width:1200px;"></div>
						<div id="table_productivity" class="scroll_group"></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Availability -->
	<div id="bs-example-modal-lg-availability" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!-- https://stackoverflow.com/questions/42896820/modal-width-increase -->
		<div class="modal-dialog modal-lg" style="max-width:100%!important;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel_availability">Large modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<select class="form-control custom-select" name="bulan_availability" id="bulan_availability">
									<?php
										$bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										$jumlah_bulan = count($bulan);
										for($i=0; $i<$jumlah_bulan; $i++) {
											$selected = date('m') == $i+1 ? 'selected' : '';
											echo "<option value=$i+1 $selected>$bulan[$i]</option>";
										}
									?>
								</select>
								<select class="form-control custom-select" name="tahun_availability" id="tahun_availability">
									<?php
										$tahun_init = 2018;
										$jumlah_tahun = 10;
										for($i=0; $i<$jumlah_tahun; $i++) {
											$set_tahun = $tahun_init+$i;
											$selected = date('Y') == $set_tahun ? 'selected' : '';
											echo "<option value=$set_tahun $selected>$set_tahun</option>";
										}
									?>
								</select>
								<button type="button" class="btn waves-effect waves-light btn-info" id="btn_show_graphic_availability">Process</button>
							</div>
						</div>
					</div>
					<div class="scoll-tree">
						<div id="dashboard_chart_availability" class="scroll_group" style="height:400px;width:1200px;"></div>
						<div id="table_availability" class="scroll_group"></div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal OK / Rework -->
	<div id="bs-example-modal-lg-ok-rework" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!-- https://stackoverflow.com/questions/42896820/modal-width-increase -->
		<div class="modal-dialog modal-lg" style="max-width:100%!important;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel_ok_rework">Large modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<select class="form-control custom-select" name="bulan_ok_rework" id="bulan_ok_rework">
									<?php
										$bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										$jumlah_bulan = count($bulan);
										for($i=0; $i<$jumlah_bulan; $i++) {
											$selected = date('m') == $i+1 ? 'selected' : '';
											echo "<option value=$i+1 $selected>$bulan[$i]</option>";
										}
									?>
								</select>
								<select class="form-control custom-select" name="tahun_ok_rework" id="tahun_ok_rework">
									<?php
										$tahun_init = 2018;
										$jumlah_tahun = 10;
										for($i=0; $i<$jumlah_tahun; $i++) {
											$set_tahun = $tahun_init+$i;
											$selected = date('Y') == $set_tahun ? 'selected' : '';
											echo "<option value=$set_tahun $selected>$set_tahun</option>";
										}
									?>
								</select>
								<button type="button" class="btn waves-effect waves-light btn-info" id="btn_show_graphic_ok_rework">Process</button>
							</div>
						</div>
					</div>
					<div class="scoll-tree">
						<div id="dashboard_chart_ok_rework" class="scroll_group" style="height:400px;width:1200px;"></div>
						<div id="table_ok_rework" class="scroll_group"></div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Quality -->
	<div id="bs-example-modal-lg-quality" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!-- https://stackoverflow.com/questions/42896820/modal-width-increase -->
		<div class="modal-dialog modal-lg" style="max-width:100%!important;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel_quality">Large modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<select class="form-control custom-select" name="bulan_quality" id="bulan_quality">
									<?php
										$bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										$jumlah_bulan = count($bulan);
										for($i=0; $i<$jumlah_bulan; $i++) {
											$selected = date('m') == $i+1 ? 'selected' : '';
											echo "<option value=$i+1 $selected>$bulan[$i]</option>";
										}
									?>
								</select>
								<select class="form-control custom-select" name="tahun_quality" id="tahun_quality">
									<?php
										$tahun_init = 2018;
										$jumlah_tahun = 10;
										for($i=0; $i<$jumlah_tahun; $i++) {
											$set_tahun = $tahun_init+$i;
											$selected = date('Y') == $set_tahun ? 'selected' : '';
											echo "<option value=$set_tahun $selected>$set_tahun</option>";
										}
									?>
								</select>
								<button type="button" class="btn waves-effect waves-light btn-info" id="btn_show_graphic_quality">Process</button>
							</div>
						</div>
					</div>
					<div class="scoll-tree">
						<div id="dashboard_chart_quality" class="scroll_group" style="height:400px;width:1200px;"></div>
						<div id="table_quality" class="scroll_group"></div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Scrap -->
	<div id="bs-example-modal-lg-scrap" class="modal hide" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!-- https://stackoverflow.com/questions/42896820/modal-width-increase -->
		<div class="modal-dialog modal-lg" style="max-width:100%!important;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel_scrap">Large modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<select class="form-control custom-select" name="bulan_scrap" id="bulan_scrap">
									<?php
										$bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										$jumlah_bulan = count($bulan);
										for($i=0; $i<$jumlah_bulan; $i++) {
											$selected = date('m') == $i+1 ? 'selected' : '';
											echo "<option value=$i+1 $selected>$bulan[$i]</option>";
										}
									?>
								</select>
								<select class="form-control custom-select" name="tahun_scrap" id="tahun_scrap">
									<?php
										$tahun_init = 2018;
										$jumlah_tahun = 10;
										for($i=0; $i<$jumlah_tahun; $i++) {
											$set_tahun = $tahun_init+$i;
											$selected = date('Y') == $set_tahun ? 'selected' : '';
											echo "<option value=$set_tahun $selected>$set_tahun</option>";
										}
									?>
								</select>
								<button type="button" class="btn waves-effect waves-light btn-info" id="btn_show_graphic_scrap">Process</button>
							</div>
						</div>
					</div>
					<div class="scoll-tree">
						<div id="dashboard_chart_scrap" class="scroll_group" style="height:400px;width:1200px;"></div>
						<div id="table_scrap" class="scroll_group"></div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('custom-js')
	<script src="{{ asset('assets/edhil/js/dashboard/home.js') }}"></script>
	<!-- 
		https://stackoverflow.com/questions/30707855/horizontal-scroll-in-bootstrap-modal 
		https://jsfiddle.net/4duq2svh/3/
	-->
	<style>
		.modal-body {
		    max-width: 100%;
		    overflow-x: auto;
		}
	</style>
	<script>
		var totalwidth = 190 * $('.scroll_group').length;
		$('.scoll-tree').css('width', totalwidth);
	</script>
@endsection