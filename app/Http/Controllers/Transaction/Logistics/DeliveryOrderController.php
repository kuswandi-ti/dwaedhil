<?php

namespace App\Http\Controllers\Transaction\Logistics;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;
use DB;
use Helper;

use App\Models\Transaction\Logistics\DeliveryOrderHdr;
use App\Models\Transaction\Logistics\DeliveryOrderDtl;
use App\Models\Master\Products\Product;

class DeliveryOrderController extends Controller
{
    protected $rules_hdr = [
        'doc_date'                  => 'required',
		'vehicle_number'            => 'required',
		'driver_name'               => 'required',
		'loading_time'              => 'required',
    ];

    protected $rules_dtl = [
        'product_code_do'           => 'required',
        'qty_do_do'                 => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.logistics.delivery_order_hdr');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rules = $this->rules_hdr;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);                        
        }
        else
        {
            $do_hdr                                 = new DeliveryOrderHdr();

            $doc_no = Helper::create_doc_no('DO', date('m'), date('Y'), 'DELIVERY_ORDER');
            $do_hdr->doc_no                         = $doc_no;
            $doc_date = date('Y-m-d');
            $do_hdr->doc_date                       = $doc_date;
            $doc_time = date('H:i:s');
            $do_hdr->doc_time                       = $doc_time;
			$do_hdr->vehicle_number                 = $request->vehicle_number;
			$do_hdr->driver_name                    = $request->driver_name;
			$do_hdr->loading_time                   = $request->loading_time;
            $do_hdr->remarks                        = $request->remarks;
            $do_hdr->user_created                   = \Auth::user()->username;
            $do_hdr->datetime_created               = new DateTime();
            $do_hdr->user_updated                   = \Auth::user()->username;
            $do_hdr->datetime_updated               = new DateTime();
            
            $do_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $do_hdr->id;

            return response()->json(['success' => true, 'id' => $id]);
        }
    }

    public function store_detail(Request $request)
    {
        $this->rules = $this->rules_dtl;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);                        
        }
        else
        {
            $do_dtl                             = new DeliveryOrderDtl();
            
            $do_dtl->id_hdr                     = $request->id_do_hdr;
            $do_dtl->id_product                 = $request->product_id_do;
            $do_dtl->qty_do                     = $request->qty_do_do;
            $do_dtl->user_created               = \Auth::user()->username;
            $do_dtl->datetime_created           = new DateTime();
            $do_dtl->user_updated               = \Auth::user()->username;
            $do_dtl->datetime_updated           = new DateTime();
            
            $do_dtl->save();
            
            return response()->json(['success' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = DB::table('view_trx_do_hdr')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function edit_detail($id)
    {
        $query = DB::table('view_trx_do_dtl')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
			'vehicle_number'   	=> $request->vehicle_number,
			'driver_name'       => $request->driver_name,
			'loading_time'      => $request->loading_time,
            'remarks'           => $request->remarks,
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = DeliveryOrderHdr::where('id', $id)->update($data);
    }

    public function update_detail(Request $request)
    {
        $this->rules = $this->rules_dtl;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }
        else
        {
            DB::table('tbl_trx_do_dtl')
                ->where('id', $request->id_do_dtl)
                ->update([
                    'qty_do' => $request->qty_do_do,
                    'user_updated' => \Auth::user()->username,
                    'datetime_updated' => new DateTime()
                ]);
            
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroy_detail($id)
    {
        DB::table('tbl_trx_do_dtl')
                ->where('id', $id)
                ->delete();
            
        return response()->json(['success' => true]);
    }

    public function change_status($id)
    {
        $data = [
            'active'            => '0',
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = DeliveryOrderHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function list_delivery_order_header(Request $request)
    {
        $query = DB::table('view_trx_do_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_do_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_do_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    /* https://www.malasngoding.com/passing-data-controller-ke-view-laravel/ */
    public function delivery_order_header($id)
    {
        $do_header = DB::table('view_trx_do_hdr')
                         ->where('id', $id)
                         ->first();
        return view('transaction.logistics.delivery_order_dtl', [
            'do_header' => $do_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_delivery_order_detail(Request $request)
    {
        $query = DB::table('view_trx_do_dtl')
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_do_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_do_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function browse_product(Request $request)
    {
        /*$query = DB::table('view_mst_product')
                     ->where([['active', '=', 1]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="select_product_do" data-toggle="tooltip" title="Select" data-id="{{ $id }}" data-code="{{ $product_code }}" data-name="{{ $product_name }}" data-unit="{{ $unit_code }}" data-original-title="Select" class="select btn btn-danger btn-sm"><i class="ti-check"></i></a>')
                           ->addIndexColumn()
                           ->make(true);*/
        $query = DB::table('view_mst_product')
                     ->leftJoin('view_trx_stock_onhand', 'view_mst_product.id', '=', 'view_trx_stock_onhand.id_product_material')
                     ->select('view_mst_product.*',
                              DB::raw("coalesce(view_trx_stock_onhand.qty_balance, 0) as qty_balance"),
                              'view_trx_stock_onhand.location')
                     ->where([
                                ['view_mst_product.active', '=', 1],
                                ['view_trx_stock_onhand.qty_balance', '>', 0],
                                ['view_trx_stock_onhand.location', '=', 'WFG'],
                            ])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="select_product_do" data-toggle="tooltip" title="Select" data-id="{{ $id }}" data-code="{{ $product_code }}" data-name="{{ $product_name }}" data-unit="{{ $unit_code }}" data-onhand="{{ $qty_balance }}" data-original-title="Select" class="select btn btn-danger btn-sm"><i class="ti-check"></i></a>')
                           ->addIndexColumn()
                           ->make(true);                           
    }
}
