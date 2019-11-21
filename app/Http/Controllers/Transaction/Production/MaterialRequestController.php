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

use App\Models\Transaction\Production\MaterialRequestHdr;
use App\Models\Transaction\Production\MaterialRequestDtl;
use App\Models\Master\Products\RawMaterial;

class MaterialRequestController extends Controller
{

    protected $rules_dtl = [
        'raw_material_code_matreq'  => 'required',
        'qty_matreq'  => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.production.material_request_hdr');
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
        $material_request_hdr                       = new MaterialRequestHdr();

        $doc_no = Helper::create_doc_no('MRQ', date('m'), date('Y'), 'MATERIAL_REQUEST');
        $material_request_hdr->doc_no               = $doc_no;
        $doc_date = date('Y-m-d');
        $material_request_hdr->doc_date             = $doc_date;
        $doc_time = date('H:i:s');
        $material_request_hdr->doc_time             = $doc_time;
        $material_request_hdr->remarks              = $request->remarks;
        $material_request_hdr->user_created         = \Auth::user()->username;
        $material_request_hdr->datetime_created     = new DateTime();
        $material_request_hdr->user_updated         = \Auth::user()->username;
        $material_request_hdr->datetime_updated     = new DateTime();
        
        $material_request_hdr->save();
        
        /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
        $id = $material_request_hdr->id;

        return response()->json(['success' => true, 'id' => $id]);
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
            $material_request_dtl                   = new MaterialRequestDtl();
            
            $material_request_dtl->id_hdr           = $request->id_matreq_hdr;
            $material_request_dtl->id_raw_material  = $request->raw_material_id_matreq;
            $material_request_dtl->qty_matreq       = $request->qty_matreq;
            $material_request_dtl->user_created     = \Auth::user()->username;
            $material_request_dtl->datetime_created = new DateTime();
            $material_request_dtl->user_updated     = \Auth::user()->username;
            $material_request_dtl->datetime_updated = new DateTime();
            
            $material_request_dtl->save();
            
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
        $query = DB::table('view_trx_matreq_hdr')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function edit_detail($id)
    {
        $query = DB::table('view_trx_matreq_dtl')
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
            'remarks'           => $request->remarks,
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = MaterialRequestHdr::where('id', $id)->update($data);

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
            DB::table('tbl_trx_matreq_dtl')
                ->where('id', $request->id_matreq_dtl)
                ->update([
                    'qty_matreq' => $request->qty_matreq,
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
        DB::table('tbl_trx_matreq_dtl')
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
        $update = MaterialRequestHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function list_material_request_header(Request $request)
    {
        $query = DB::table('view_trx_matreq_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_matreq_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_matreq_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function data_raw_material(Request $request)
    {
        $search = $request->get('search');
        $data = RawMaterial::select(['id', 'material_code', 'material_name'])
                         ->whereRaw(
                               "(active = 1 and (material_code like '%".$search."%' or material_name like '%".$search."%'))"
                         )
                         ->orderBy('material_code')
                         ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function get_data_raw_material($id)
    {
        $query = DB::table('view_mst_raw_material')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    /* https://www.malasngoding.com/passing-data-controller-ke-view-laravel/ */
    public function material_request_header($id)
    {
        $matreq_header = DB::table('view_trx_matreq_hdr')
                             ->where('id', $id)
                             ->first();
        return view('transaction.production.material_request_dtl', [
            'matreq_header' => $matreq_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_material_request_detail(Request $request)
    {
        $query = DB::table('view_trx_matreq_dtl')
                     ->select('view_trx_matreq_dtl.*', 
                              DB::raw("concat(qty_conversion, ' ', unit_code_usage, ' / ', unit_code_buying) as packing_size"))
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_matreq_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_matreq_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function browse_raw_material(Request $request)
    {
        $query = DB::table('view_mst_raw_material')
                     ->leftJoin('view_trx_stock_onhand', 'view_mst_raw_material.id', '=', 'view_trx_stock_onhand.id_product_material')
                     ->select('view_mst_raw_material.*',
                              DB::raw("coalesce(view_trx_stock_onhand.qty_balance, 0) as qty_balance"),
                              'view_trx_stock_onhand.location',
                              DB::raw("concat(qty_conversion, ' ', unit_code_usage, ' / ', unit_code_buying) as packing_size"))
                     ->where([['view_mst_raw_material.active', '=', 1],
                              ['view_trx_stock_onhand.qty_balance', '>', 0],
                              ['view_trx_stock_onhand.location', '=', 'WRM']])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="select_raw_material_matreq" data-toggle="tooltip" title="Select" data-id="{{ $id }}" data-code="{{ $material_code }}" data-name="{{ $material_name }}" data-unit="{{ $unit_code_buying }}" data-onhand="{{ $qty_balance }}" data-original-title="Select" class="select btn btn-danger btn-sm"><i class="ti-check"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }
}
