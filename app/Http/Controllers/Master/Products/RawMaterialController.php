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

use App\Models\Master\Products\RawMaterial;
use App\Models\Master\Products\Unit;
use App\Models\Master\Partners\Supplier;

class RawMaterialController extends Controller
{
    protected $rules_create = [
        'material_code'             => 'required | unique:tbl_mst_raw_material',
        'material_name'             => 'required',
        'vpn_no'                    => 'required',
        'id_unit_buying'            => 'required',
        'id_unit_usage'             => 'required',
        'id_supplier_raw_material'  => 'required'
    ];
    
    protected $rules_update = [
        'material_code'             => 'required',
        'material_name'             => 'required',
        'vpn_no'                    => 'required',
        'id_unit_buying'            => 'required',
        'id_unit_usage'             => 'required',
        'id_supplier_raw_material'  => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.products.raw_material');
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
            $raw_material                       = new RawMaterial();
            
            $raw_material->material_code        = $request->material_code;
            $raw_material->material_name        = $request->material_name;
            $raw_material->vpn_no               = $request->vpn_no;
            $raw_material->id_unit_buying       = $request->id_unit_buying;
            $raw_material->id_unit_usage        = $request->id_unit_usage;
            $raw_material->id_supplier          = $request->id_supplier_raw_material;
            $raw_material->qty_conversion       = $request->qty_conversion;
            $raw_material->user_created         = \Auth::user()->username;
            $raw_material->datetime_created     = new DateTime();
            $raw_material->user_updated         = \Auth::user()->username;
            $raw_material->datetime_updated     = new DateTime();
            
            $raw_material->save();
            
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
        $query = DB::table('view_mst_raw_material')
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
        $this->rules = $this->rules_update;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }
        else
        {
            $raw_material                       = RawMaterial::findOrFail($id);
            
            $raw_material->material_code        = $request->material_code;
            $raw_material->material_name        = $request->material_name;
            $raw_material->vpn_no               = $request->vpn_no;
            $raw_material->id_unit_buying       = $request->id_unit_buying;
            $raw_material->id_unit_usage        = $request->id_unit_usage;
            $raw_material->id_supplier          = $request->id_supplier_raw_material;
            $raw_material->qty_conversion       = $request->qty_conversion;
            $raw_material->user_updated         = \Auth::user()->username;
            $raw_material->datetime_updated     = new DateTime();
            
            $raw_material->save();
            
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

    public function data_unit(Request $request)
    {
        $search = $request->get('search');
        $data = Unit::select(['id', 'unit_code', 'unit_name'])
                      ->whereRaw(
                            "(active = 1 and (unit_code like '%".$search."%' or unit_name like '%".$search."%'))"
                      )
                      ->orderBy('unit_name')
                      ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    /* https://stackoverflow.com/questions/45359615/laravel-query-builder-where-and-or-where*/
    public function data_supplier(Request $request)
    {
        $search = $request->get('search');
        $data = Supplier::select(['id', 'supplier_code', 'supplier_name'])
                          ->whereRaw(
                            "(active = 1 and (supplier_code like '%".$search."%' or supplier_name like '%".$search."%'))"
                          )
                          ->orderBy('supplier_name')
                          ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function list_raw_material(Request $request)
    {
        $query = DB::table('view_mst_raw_material')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_raw_material" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_raw_material" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function change_status()
    {
        $id                                 = Input::get('id');
        $raw_material                       = RawMaterial::findOrFail($id);
        $raw_material->active               = '0';
        $raw_material->user_updated         = \Auth::user()->username;
        $raw_material->datetime_updated     = new DateTime();
        $raw_material->save();
        
        return response()->json(array('success' => true));
    }
}
