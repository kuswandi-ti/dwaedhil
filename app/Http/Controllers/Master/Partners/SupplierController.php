<?php

namespace App\Http\Controllers\Master\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;

use App\Models\Master\Partners\Supplier;

class SupplierController extends Controller
{
	protected $rules_create = [
		'supplier_name'			=> 'required'
	];
	
	protected $rules_update = [
		'supplier_name'			=> 'required'
	];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.partners.supplier');
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
			/* https://jaranguda.com/membuat-nomor-surat-otomatis-di-laravel/ */
			$noUrutAkhir 						= (int)substr(Supplier::max('supplier_code'), 2, 4) + 1;
			$newCode							= 'S'.substr('0000'.$noUrutAkhir, -4);
			
			$supplier             				= new Supplier();
			$supplier->supplier_code   			= $newCode; //$request->supplier_code;
			$supplier->supplier_name   			= $request->supplier_name;
			$supplier->user_created     		= \Auth::user()->username;
			$supplier->datetime_created 		= new DateTime();
			$supplier->user_updated     		= \Auth::user()->username;
			$supplier->datetime_updated 		= new DateTime();
			
			$supplier->save();
			
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
        $data = Supplier::findOrFail($id);
        return response()->json($data);
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
			$supplier 						= Supplier::findOrFail($id);
			
			$supplier->supplier_code 		= $request->supplier_code;
			$supplier->supplier_name 		= $request->supplier_name;
			$supplier->user_updated     	= \Auth::user()->username;
			$supplier->datetime_updated 	= new DateTime();
			
			$supplier->save();
			
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
	
	public function list_supplier()
    {
        return datatables()->of(Supplier::where('active', '1'))
			               ->addColumn('action', '<a href="javascript:void(0)" id="edit_supplier" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
						                          <a href="javascript:void(0)" id="delete_supplier" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
			               ->addIndexColumn()
        				   ->make(true);
    }

    public function change_status()
    {
		$id 								= Input::get('id');
		$supplier 							= Supplier::findOrFail($id);
        $supplier->active           		= '0';
        $supplier->user_updated     		= \Auth::user()->username;
        $supplier->datetime_updated 		= new DateTime();
        $supplier->save();
		
        return response()->json(array('success' => true));
    }
}
