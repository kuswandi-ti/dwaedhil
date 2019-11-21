<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Models\Dashboard\Dashboard;

class DashboardController extends Controller
{
	public function show_graphic_productivity() {
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		$data = Dashboard::get_data_productivity($bulan, $tahun);
		echo json_encode($data);
	}

	public function show_graphic_availability() {
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		$data = Dashboard::get_data_availability($bulan, $tahun);
		echo json_encode($data);
	}

	public function show_graphic_ok_rework() {
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		$data = Dashboard::get_data_ok_rework($bulan, $tahun);
		echo json_encode($data);
	}

	public function show_graphic_quality() {
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		$data = Dashboard::get_data_quality($bulan, $tahun);
		echo json_encode($data);
	}

	public function show_graphic_scrap() {
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		$data = Dashboard::get_data_scrap($bulan, $tahun);
		echo json_encode($data);
	}
}
