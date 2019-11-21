<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dashboard extends Model
{
    private static $view_prod_actual 		= 'view_trx_prodactual_qty';
	private static $view_prod_plan 			= 'view_trx_prodplan_qty';
	
	public static function get_data_productivity($bulan, $tahun) {
		$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // jumlah hari
		$target = 90;
		
		$category = [];
		
		$series[0]['name'] = 'Productivity (%)';
		$series[1]['name'] = 'Target (%)';
		$series[2]['name'] = 'Average (%)';

		$arr_data_actual = array();
		$arr_data_plan = array();
		$arr_productivity = array();
		
		$i = 0;
		$count_average = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$category[] = $i;
			
			$data_actual = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_produce');
			$data_plan = DB::table(static::$view_prod_plan)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty');
			
			if ($data_actual == 0 || $data_plan == 0) {
				$data_persen = 0;
				$count_average = $count_average;
			} else {
				$data_persen = ($data_actual / $data_plan) * 100;
				$count_average = $count_average + 1;
			}
			
			$series[0]['data'][] = $data_persen;
			$series[1]['data'][] = $target;

			$arr_data_actual[] = $data_actual;
			$arr_data_plan[] = $data_plan;
			$arr_productivity[] = $data_persen;
		}

		$value_average = 0;
		if (array_sum($arr_productivity) == 0 || $count_average == 0) {
			$value_average = 0;
		} else {
			$value_average = array_sum($arr_productivity) / $count_average;
		}

		$table = "<table class='table table-striped color-table info-table' style='font-size:70%'>";
		$table.= 	"<thead>";
		$table.= 		"<tr>";
		$table.= 			"<th>Date</th>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$table.= 		"<th>$i</th>";
		}
		$table.= 		"</tr>";
		$table.= 	"</thead>";
		$table.= 	"<tbody>";
		$table.= 		"<tr>";
		$table.= 			"<td>Plan Qty (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_data_plan[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Actual Qty (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_data_actual[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Productivity (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_productivity[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Target (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$target</td>";
		}
		$table.= 		"</tr>";
		$table.= 	"</tbody>";
		$table.= "</table>";

		
		return ['category'=>$category, 'series'=>$series, 'table'=>$table, 'value_average'=>$value_average];
	}

	public static function get_data_availability($bulan, $tahun) {
		$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // jumlah hari
		
		$category = [];
		
		$series[0]['name'] = 'Availability (%)';

		$arr_data_plan_hours = array();
		$arr_data_actual_hours = array();
		$arr_data_availability_persen = array();
		
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$category[] = $i;
			
			$data_plan_hours = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('time_total');
			$data_actual_hours = DB::table(static::$view_prod_plan)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('time_total');
			
			if ($data_plan_hours == 0 || $data_actual_hours == 0) {
				$data_availability_persen = 0;
			} else {
				$data_availability_persen = (($data_actual_hours / 60) / ($data_plan_hours / 60)) * 100; // masih dalam satuan menit. jadi dibagi dulu dengan 60 supaya menjadi satuan jam.
			}
			
			$series[0]['data'][] = $arr_data_availability_persen;

			$arr_data_plan_hours[] = $data_plan_hours;
			$arr_data_actual_hours[] = $data_actual_hours;
			$arr_data_availability_persen[] = $data_availability_persen;
		}

		$table = "<table class='table table-striped color-table info-table' style='font-size:70%'>";
		$table.= 	"<thead>";
		$table.= 		"<tr>";
		$table.= 			"<th>Date</th>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$table.= 		"<th>$i</th>";
		}
		$table.= 		"</tr>";
		$table.= 	"</thead>";
		$table.= 	"<tbody>";
		$table.= 		"<tr>";
		$table.= 			"<td>Plan Run Hours</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_data_plan_hours[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Actual Run Hours</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_data_actual_hours[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Availability (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_data_availability_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 	"</tbody>";
		$table.= "</table>";

		
		return ['category'=>$category, 'series'=>$series, 'table'=>$table];
	}

	public static function get_data_ok_rework($bulan, $tahun) {
		$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // jumlah hari
		
		$category = [];
		
		$series[0]['name'] = 'Part OK (%)';
		$series[1]['name'] = 'Part Rework (%)';
		$series[2]['name'] = 'Average (%)';

		$arr_qty_produce = array();
		$arr_part_ok_pcs = array();
		$arr_part_rework_pcs = array();
		$arr_part_ok_persen = array();
		$arr_part_rework_persen = array();
		
		$i = 0;
		$count_average_produce_ok = 0;
		$count_average_produce_rework = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$category[] = $i;
			
			$data_produce = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_produce');
			$data_ok = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_ok');
			$data_rework = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_rework');
			
			if ($data_produce == 0 || $data_ok == 0) {
				$data_persen_ok = 0;
				$count_average_produce_ok = $count_average_produce_ok;
			} else {
				$data_persen_ok = ($data_ok / $data_produce) * 100;
				$count_average_produce_ok = $count_average_produce_ok + 1;
			}

			if ($data_produce == 0 || $data_rework == 0) {
				$data_persen_rework = 0;
				$count_average_produce_rework = $count_average_produce_rework;
			} elseif ($data_produce > 0 && $data_rework == 0) {
				$data_persen_rework = 100;
				$count_average_produce_rework = $count_average_produce_rework + 1;
			} else {
				$data_persen_rework = ($data_rework / $data_produce) * 100;
				$count_average_produce_rework = $count_average_produce_rework + 1;
			}
			
			$series[0]['data'][] = $data_persen_ok;
			$series[1]['data'][] = $data_persen_rework;

			$arr_qty_produce[] = $data_produce;
			$arr_part_ok_pcs[] = $data_ok;
			$arr_part_rework_pcs[] = $data_rework;
			$arr_part_ok_persen[] = $data_persen_ok;
			$arr_part_rework_persen[] = $data_persen_rework;
		}

		$value_average_produce_ok = 0;
		if (array_sum($arr_part_ok_persen) == 0 || $count_average_produce_ok == 0) {
			$value_average_produce_ok = 0;
		} else {
			$value_average_produce_ok = array_sum($arr_part_ok_persen) / $count_average_produce_ok;
		}

		$value_average_produce_rework = 0;
		if (array_sum($arr_part_rework_persen) == 0 || $count_average_produce_rework == 0) {
			$value_average_produce_rework = 0;
		} else {
			$value_average_produce_rework = array_sum($arr_part_rework_persen) / $count_average_produce_rework;
		}

		$table = "<table class='table table-striped color-table info-table' style='font-size:70%'>";
		$table.= 	"<thead>";
		$table.= 		"<tr>";
		$table.= 			"<th>Date</th>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$table.= 		"<th>$i</th>";
		}
		$table.= 		"</tr>";
		$table.= 	"</thead>";
		$table.= 	"<tbody>";
		$table.= 		"<tr>";
		$table.= 			"<td>Tot. Qty Prod. (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_qty_produce[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Qty OK (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_part_ok_pcs[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Qty Rework (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_part_rework_pcs[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Part OK (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_part_ok_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Part Rework (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_part_rework_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 	"</tbody>";
		$table.= "</table>";
		
		return ['category'=>$category, 'series'=>$series, 'table'=>$table];
	}

	public static function get_data_quality($bulan, $tahun) {
		$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // jumlah hari
		
		$category = [];
		
		$series[0]['name'] = 'Quality (%)';

		$arr_qty_produce = array();
		$arr_qty_rework = array();
		$arr_quality_persen = array();
		
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$category[] = $i;
			
			$data_produce = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_produce');
			$data_rework = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_rework');
			
			if ($data_produce == 0 || $data_rework == 0) {
				$data_persen_quality = 0;
			} else {
				$data_persen_quality = (($data_produce - $data_rework) / $data_produce) * 100;
			}
			
			$series[0]['data'][] = $data_persen_quality;

			$arr_qty_produce[] = $data_produce;
			$arr_qty_rework[] = $data_rework;
			$arr_quality_persen[] = $data_persen_quality;
		}

		$table = "<table class='table table-striped color-table info-table' style='font-size:70%'>";
		$table.= 	"<thead>";
		$table.= 		"<tr>";
		$table.= 			"<th>Date</th>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$table.= 		"<th>$i</th>";
		}
		$table.= 		"</tr>";
		$table.= 	"</thead>";
		$table.= 	"<tbody>";
		$table.= 		"<tr>";
		$table.= 			"<td>Tot. Qty Prod. (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_qty_produce[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Qty Rework (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_qty_rework[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Quality (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_quality_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 	"</tbody>";
		$table.= "</table>";
		
		return ['category'=>$category, 'series'=>$series, 'table'=>$table];
	}

	public static function get_data_scrap($bulan, $tahun) {
		$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // jumlah hari
		$target = 5;
		
		$category = [];
		
		$series[0]['name'] = 'Scrap (%)';
		$series[1]['name'] = 'Target (%)';

		$arr_qty_produce = array();
		$arr_qty_scrap = array();
		$arr_scrap_persen = array();
		$arr_target_persen = array();
		
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$category[] = $i;
			
			$data_produce = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_produce');
			$data_scrap = DB::table(static::$view_prod_actual)->where(['tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$i])->sum('qty_reject');
			
			if ($data_produce == 0 || $data_scrap == 0) {
				$data_persen_scrap = 0;
			} else {
				$data_persen_scrap = ($data_scrap / $data_produce) * 100;
			}
			
			$series[0]['data'][] = $data_persen_scrap;
			$series[1]['data'][] = $target;

			$arr_qty_produce[] = $data_produce;
			$arr_qty_scrap[] = $data_scrap;
			$arr_scrap_persen[] = $data_persen_scrap;
			$arr_target_persen[] = $target;
		}

		$table = "<table class='table table-striped color-table info-table' style='font-size:70%'>";
		$table.= 	"<thead>";
		$table.= 		"<tr>";
		$table.= 			"<th>Date</th>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$table.= 		"<th>$i</th>";
		}
		$table.= 		"</tr>";
		$table.= 	"</thead>";
		$table.= 	"<tbody>";
		$table.= 		"<tr>";
		$table.= 			"<td>Tot. Qty Prod. (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_qty_produce[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Scrap (Pcs)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>$arr_qty_scrap[$j]</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Scrap (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_scrap_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 		"<tr>";
		$table.= 			"<td>Target (%)</td>";
		$i = 0;
		for ($i=1; $i<$tanggal+1; $i++) {
			$j = $i-1;
			$table.= 		"<td>".round($arr_target_persen[$j], 2)."</td>";
		}
		$table.= 		"</tr>";
		$table.= 	"</tbody>";
		$table.= "</table>";
		
		return ['category'=>$category, 'series'=>$series, 'table'=>$table];
	}
}
