<?php

namespace App\Http\Controllers\Transaction\Production;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;
use DB;
use Helper;

use App\Models\Transaction\Production\ProductionActualHdr;
use App\Models\Transaction\Production\ProductionActualDtl;
use App\Models\Master\Products\Product;

class ProductionActualController extends Controller
{
    protected $rules_hdr = [
        'doc_date'                  => 'required',
        'prod_actual_date'          => 'required',
    ];

    protected $rules_dtl = [
        'product_code_prodactual'   => 'required',
        'qty_ok_prodactual'         => 'required',
        'qty_reject_prodactual'     => 'required',
        'qty_rework_prodactual'     => 'required',
        'qty_ok_prodactual'         => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.production.production_actual_hdr');
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
            $prod_actual_hdr                        = new ProductionActualHdr();

            $doc_no = Helper::create_doc_no('PAC', date('m'), date('Y'), 'PRODUCTION_ACTUAL');
            $prod_actual_hdr->doc_no                = $doc_no;
            $doc_date = date('Y-m-d');
            $prod_actual_hdr->doc_date              = $doc_date;
            $doc_time = date('H:i:s');
            $prod_actual_hdr->doc_time              = $doc_time;
            $prod_actual_hdr->prod_actual_date      = $request->prod_actual_date;
            $prod_actual_hdr->remarks               = $request->remarks;
            $prod_actual_hdr->user_created          = \Auth::user()->username;
            $prod_actual_hdr->datetime_created      = new DateTime();
            $prod_actual_hdr->user_updated          = \Auth::user()->username;
            $prod_actual_hdr->datetime_updated      = new DateTime();
            
            $prod_actual_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $prod_actual_hdr->id;

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
            $prod_actual_dtl                    = new ProductionActualDtl();
            
            $prod_actual_dtl->id_hdr            = $request->id_prodactual_hdr;
            $prod_actual_dtl->id_product        = $request->product_id_prodactual;
            $prod_actual_dtl->qty_ok            = $request->qty_ok_prodactual;
            $prod_actual_dtl->qty_reject        = $request->qty_reject_prodactual;
            $prod_actual_dtl->qty_rework        = $request->qty_rework_prodactual;            
            $prod_actual_dtl->qty_total         = $request->qty_total_prodactual;
            $prod_actual_dtl->time_start        = $request->time_start_ppl;
            $prod_actual_dtl->time_finish       = $request->time_finish_ppl;
            $prod_actual_dtl->time_total        = $request->time_total_ppl;
            $prod_actual_dtl->user_created      = \Auth::user()->username;
            $prod_actual_dtl->datetime_created  = new DateTime();
            $prod_actual_dtl->user_updated      = \Auth::user()->username;
            $prod_actual_dtl->datetime_updated  = new DateTime();
            
            $prod_actual_dtl->save();
            
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
        $query = DB::table('view_trx_prodactual_hdr')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function edit_detail($id)
    {
        $query = DB::table('view_trx_prodactual_dtl')
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
            'doc_date'          => $request->doc_date,
            'doc_time'          => date('H:i:s'),
            'prod_actual_date'  => $request->prod_actual_date,
            'remarks'           => $request->remarks,
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = ProductionActualHdr::where('id', $id)->update($data);

        return response()->json(['success' => true, 'id' => $id]);
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
            DB::table('tbl_trx_prodactual_dtl')
                ->where('id', $request->id_prodactual_dtl)
                ->update([
                    'qty_ok'            => $request->qty_ok_prodactual,
                    'qty_reject'        => $request->qty_reject_prodactual,
                    'qty_rework'        => $request->qty_rework_prodactual,
                    'qty_total'         => $request->qty_total_prodactual,
                    'time_start'        => $request->time_start_ppl,
                    'time_finish'       => $request->time_finish_ppl,
                    'time_total'        => $request->time_total_ppl,
                    'user_updated'      => \Auth::user()->username,
                    'datetime_updated'  => new DateTime()
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
        DB::table('tbl_trx_prodactual_dtl')
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
        $update = ProductionActualHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function list_production_actual_header(Request $request)
    {
        $query = DB::table('view_trx_prodactual_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_prodactual_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_prodactual_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    /* https://www.malasngoding.com/passing-data-controller-ke-view-laravel/ */
    public function production_actual_header($id)
    {
        $prodactual_header = DB::table('view_trx_prodactual_hdr')
                                 ->where('id', $id)
                                 ->first();
        return view('transaction.production.production_actual_dtl', [
            'prodactual_header' => $prodactual_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_production_actual_detail(Request $request)
    {
        $query = DB::table('view_trx_prodactual_dtl')
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_prodactual_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_prodactual_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function browse_product(Request $request)
    {
        $query = DB::table('view_mst_product')
                     ->where([['active', '=', 1]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="select_product_prodactual" data-toggle="tooltip" title="Select" data-id="{{ $id }}" data-code="{{ $product_code }}" data-name="{{ $product_name }}" data-unit="{{ $unit_code }}" data-original-title="Select" class="select"><i class="fas fa-caret-down"></i> Select</a>')
                           ->addIndexColumn()
                           ->make(true);
    }
}
