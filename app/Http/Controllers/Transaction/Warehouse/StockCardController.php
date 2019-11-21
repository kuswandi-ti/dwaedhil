<?php

namespace App\Http\Controllers\Transaction\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;
use DB;
use Helper;

class StockCardController extends Controller
{
    public function index()
    {
    	return view("transaction.warehouse.stock_card");
    }

    public function list_stock_card($location)
    {
        $query = DB::table('view_trx_stock_onhand')
        			 ->where('location', $location)
                     ->get();
        return datatables()->of($query)
        				   ->addColumn('action', 
                                '<a href="javascript:void(0)" id="detail_stock_card" data-toggle="tooltip" title="Detail" data-idproductmaterial="{{ $id_product_material }}" data-location="{{ $location }}" data-original-title="Detail" class="detail btn btn-success btn-sm"><i class="ti-layers-alt"></i> Show Detail</a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function list_stock_card_detail($id_product_material, $location)
    {
        $query = DB::table('view_trx_stock')
        			 ->where([
        			 	['id_product_material', '=', $id_product_material],
        			 	['location', '=', $location]
        			 ])
                     ->get();
        return datatables()->of($query)
                           ->addIndexColumn()
                           ->make(true);
    }
}
