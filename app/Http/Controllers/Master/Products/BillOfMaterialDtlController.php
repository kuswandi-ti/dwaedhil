<?php

namespace App\Http\Controllers\Master\Products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;
use DB;

use App\Models\Master\Products\BillOfMaterialDtl;
use App\Models\Master\Products\RawMaterial;

class BillOfMaterialDtlController extends Controller
{
    protected $rules_create = [
        'id_raw_material'       => 'required',
        'qty_usage'             => 'required',
        'percent_rejection'     => 'required'
    ];
    
    protected $rules_update = [
        'id_raw_material'       => 'required',
        'qty_usage'             => 'required',
        'percent_rejection'     => 'required'
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
            $bom_dtl                        = new BillOfMaterialDtl();
            
            $bom_dtl->id_hdr                = $request->id_bom_hdr;
            $bom_dtl->id_raw_material       = $request->id_raw_material;
            $bom_dtl->qty_usage             = $request->qty_usage;
            $bom_dtl->remarks               = $request->remarks;
            $bom_dtl->percent_rejection     = $request->percent_rejection;
            $bom_dtl->user_created          = \Auth::user()->username;
            $bom_dtl->datetime_created      = new DateTime();
            $bom_dtl->user_updated          = \Auth::user()->username;
            $bom_dtl->datetime_updated      = new DateTime();
            
            $bom_dtl->save();
            
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
        $query = DB::table('view_mst_bom_dtl')
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
            DB::table('tbl_mst_bom_dtl')
                ->where('id', $request->id_bom_dtl)
                ->update([
                    'id_raw_material' => $request->id_raw_material,
                    'qty_usage' => $request->qty_usage,
                    'remarks' => $request->remarks,
                    'percent_rejection' => $request->percent_rejection,
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
        DB::table('tbl_mst_bom_dtl')
                ->where('id', $id)
                ->delete();
            
        return response()->json(['success' => true]);
    }

    public function edit_bill_of_material($id)
    {
        $bom_header = DB::table('view_mst_bom_hdr')
                          ->where('id', $id)
                          ->first();
        return view('master.products.bill_of_material_dtl', [
            'bom_header' => $bom_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_bill_of_material(Request $request)
    {
        $query = DB::table('view_mst_bom_dtl')
                     ->select('view_mst_bom_dtl.*',
                              DB::raw("concat(qty_conversion, ' ', unit_code_usage, ' / ', unit_code_buying) as packing_size"))
                     ->where([['id_hdr', '=', $request->id_hdr], ['active', '=', '1']])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_bill_of_material_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_bill_of_material_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
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
