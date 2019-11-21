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

use App\Models\Master\Products\Product;
use App\Models\Master\Products\ProductGroup;
use App\Models\Master\Products\Unit;
use App\Models\Master\Partners\Customer;

class ProductController extends Controller
{
    protected $rules_create = [
        'product_code'          => 'required | unique:tbl_mst_product',
        'product_name'          => 'required',
        'cpn_no'                => 'required',
        'id_product_group'      => 'required',
        'id_unit'               => 'required',
        'id_customer_product'   => 'required'
    ];
    
    protected $rules_update = [
        'product_code'          => 'required',
        'product_name'          => 'required',
        'cpn_no'                => 'required',
        'id_product_group'      => 'required',
        'id_unit'               => 'required',
        'id_customer_product'   => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.products.product');
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
            $product                        = new Product();
            
            $product->product_code          = $request->product_code;
            $product->product_name          = $request->product_name;
            $product->cpn_no                = $request->cpn_no;
            $product->model_project         = $request->model_project;
            $product->id_product_group      = $request->id_product_group;
            $product->id_unit               = $request->id_unit;
            $product->id_customer           = $request->id_customer_product;
            $product->description           = $request->description;
            $product->life_span_num         = $request->life_span_num;
            $product->life_span_time        = $request->life_span_time;
            $product->cavity                = $request->cavity;
            $product->machine_tonage        = $request->machine_tonage;
            $product->machine_code          = $request->machine_code;
            $product->color                 = $request->color;
            $product->type_of_material      = $request->type_of_material;
            $product->gross_weight          = $request->gross_weight;
            $product->net_weight            = $request->net_weight;
            $product->mp_net_weight         = $request->mp_net_weight;
            $product->process               = $request->process;
            $product->cycle_time_num        = $request->cycle_time_num;
            $product->cycle_time_mp         = $request->cycle_time_mp;
            $product->assy_time_num         = $request->assy_time_num;
            $product->assy_time_mp          = $request->assy_time_mp;
            $product->user_created          = \Auth::user()->username;
            $product->datetime_created      = new DateTime();
            $product->user_updated          = \Auth::user()->username;
            $product->datetime_updated      = new DateTime();
            
            $product->save();
            
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
        $query = DB::table('view_mst_product')
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
            $product                        = Product::findOrFail($id);
            
            $product->product_code          = $request->product_code;
            $product->product_name          = $request->product_name;
            $product->cpn_no                = $request->cpn_no;
            $product->model_project         = $request->model_project;
            $product->id_product_group      = $request->id_product_group;
            $product->id_unit               = $request->id_unit;
            $product->id_customer           = $request->id_customer_product;
            $product->description           = $request->description;
            $product->life_span_num         = $request->life_span_num;
            $product->life_span_time        = $request->life_span_time;
            $product->cavity                = $request->cavity;
            $product->machine_tonage        = $request->machine_tonage;
            $product->machine_code          = $request->machine_code;
            $product->color                 = $request->color;
            $product->type_of_material      = $request->type_of_material;
            $product->gross_weight          = $request->gross_weight;
            $product->net_weight            = $request->net_weight;
            $product->mp_net_weight         = $request->mp_net_weight;
            $product->process               = $request->process;
            $product->cycle_time_num        = $request->cycle_time_num;
            $product->cycle_time_mp         = $request->cycle_time_mp;
            $product->assy_time_num         = $request->assy_time_num;
            $product->assy_time_mp          = $request->assy_time_mp;
            $product->user_updated          = \Auth::user()->username;
            $product->datetime_updated      = new DateTime();
            
            $product->save();
            
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

    /* https://www.codovel.com/select2-remote-data-source-and-load-more-function-with-laravel.html */
    public function data_product_group(Request $request)
    {
        $search = $request->get('search');
        $data = ProductGroup::select(['id', 'product_group_code', 'product_group_name'])
                              ->whereRaw(
                                "(active = 1 and (product_group_code like '%".$search."%' or product_group_name like '%".$search."%'))"
                              )
                              ->orderBy('product_group_name')
                              ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
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

    public function data_customer(Request $request)
    {
        $search = $request->get('search');
        $data = Customer::select(['id', 'customer_code', 'customer_name'])
                          ->whereRaw(
                                "(active = 1 and (customer_code like '%".$search."%' or customer_name like '%".$search."%'))"
                          )
                          ->orderBy('customer_name')
                          ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function list_product(Request $request)
    {
        $query = DB::table('view_mst_product')
                     ->where('active', '1')
                     ->get();                     
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_product" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_product" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function change_status()
    {
        $id                             = Input::get('id');
        $product                        = Product::findOrFail($id);
        $product->active                = '0';
        $product->user_updated          = \Auth::user()->username;
        $product->datetime_updated      = new DateTime();
        $product->save();
        
        return response()->json(array('success' => true));
    }
}