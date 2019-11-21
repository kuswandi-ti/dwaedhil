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

use App\Models\Transaction\Warehouse\GoodsReceiveDtl;
use App\Models\Master\Products\RawMaterial;

class GoodsReceiveDtlController extends Controller
{
    protected $rules_create = [
        'id_raw_material_gr'    => 'required',
        'qty_gr'                => 'required'
    ];
    
    protected $rules_update = [
        'id_raw_material_gr'    => 'required',
        'qty_gr'                => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->rules = $this->rules_create;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);                        
        }
        else
        {
            $gr_dtl                         = new GoodsReceiveDtl();
            
            $gr_dtl->id_hdr                 = $request->id_gr_hdr;
            $gr_dtl->id_raw_material        = $request->id_raw_material_gr;
            $gr_dtl->qty_gr                 = $request->qty_gr;
            $gr_dtl->user_created           = \Auth::user()->username;
            $gr_dtl->datetime_created       = new DateTime();
            $gr_dtl->user_updated           = \Auth::user()->username;
            $gr_dtl->datetime_updated       = new DateTime();
            
            $gr_dtl->save();
            
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
        $query = DB::table('view_trx_gr_dtl')
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
    public function update(Request $request)
    {
        $this->rules = $this->rules_update;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }
        else
        {
            DB::table('tbl_trx_gr_dtl')
                ->where('id', $request->id_gr_dtl)
                ->update([
                    'qty_gr' => $request->qty_gr,
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
        DB::table('tbl_trx_gr_dtl')
                ->where('id', $id)
                ->delete();
            
        return response()->json(['success' => true]);
    }

    public function edit_goods_receive($id)
    {
        $gr_header = DB::table('view_trx_gr_hdr')
                         ->where('id', $id)
                         ->first();
        return view('transaction.warehouse.goods_receive_dtl', [
            'gr_header' => $gr_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_goods_receive(Request $request)
    {
        $query = DB::table('view_trx_gr_dtl')
                     ->select('view_trx_gr_dtl.*', 
                              DB::raw("concat(qty_conversion, ' ', unit_code_usage, ' / ', unit_code_buying) as packing_size"))
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_gr_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_gr_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
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
}
