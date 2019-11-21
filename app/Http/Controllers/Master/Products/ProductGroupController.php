<?php

namespace App\Http\Controllers\Master\Products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;

use App\Models\Master\Products\ProductGroup;

class ProductGroupController extends Controller
{
	protected $rules_create = [
		'product_group_code'	=> 'required | unique:tbl_mst_product_group',
		'product_group_name'	=> 'required'
	];
	
	protected $rules_update = [
		'product_group_code'	=> 'required',
		'product_group_name'	=> 'required'
	];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.products.product_group');
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
			$product_group             				= new ProductGroup();
			
			$product_group->product_group_code   	= $request->product_group_code;
			$product_group->product_group_name   	= $request->product_group_name;
			$product_group->user_created     		= \Auth::user()->username;
			$product_group->datetime_created 		= new DateTime();
			$product_group->user_updated     		= \Auth::user()->username;
			$product_group->datetime_updated 		= new DateTime();
			
			$product_group->save();
			
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
        $data = ProductGroup::findOrFail($id);
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
			$product_group 						= ProductGroup::findOrFail($id);
			
			$product_group->product_group_code 	= $request->product_group_code;
			$product_group->product_group_name 	= $request->product_group_name;
			$product_group->user_updated     	= \Auth::user()->username;
			$product_group->datetime_updated 	= new DateTime();
			
			$product_group->save();
			
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
	
	public function list_product_group()
    {
        return datatables()->of(ProductGroup::where('active', '1'))
			               ->addColumn('action', '<a href="javascript:void(0)" id="edit_product_group" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
						                          <a href="javascript:void(0)" id="delete_product_group" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
			               ->addIndexColumn()
        				   ->make(true);
    }

    public function change_status()
    {
		$id 								= Input::get('id');
		$product_group 						= ProductGroup::findOrFail($id);
        $product_group->active           	= '0';
        $product_group->user_updated     	= \Auth::user()->username;
        $product_group->datetime_updated 	= new DateTime();
        $product_group->save();
		
        return response()->json(array('success' => true));
    }
}
