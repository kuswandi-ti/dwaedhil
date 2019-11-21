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

use App\Models\Transaction\Warehouse\GoodsReceiveHdr;
use App\Models\Master\Partners\Supplier;

class GoodsReceiveHdrController extends Controller
{
    protected $rules_create = [
        'reff_no'               => 'required',
        'id_supplier'           => 'required'
    ];
    
    protected $rules_update = [
        'reff_no'               => 'required',
        'id_supplier'           => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.warehouse.goods_receive_hdr');
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
            $goods_receive_hdr                          = new GoodsReceiveHdr();

            $doc_no = Helper::create_doc_no('GR', date('m'), date('Y'), 'GR_RAW_MATERIAL');
            $goods_receive_hdr->doc_no                  = $doc_no;
            $doc_date = date('Y-m-d');
            $goods_receive_hdr->doc_date                = $doc_date;
            $doc_time = date('H:i:s');
            $goods_receive_hdr->doc_time                = $doc_time;
            $goods_receive_hdr->reff_no                 = $request->reff_no;
            $goods_receive_hdr->id_supplier             = $request->id_supplier;
            $goods_receive_hdr->remarks                 = $request->remarks;
            $goods_receive_hdr->user_created            = \Auth::user()->username;
            $goods_receive_hdr->datetime_created        = new DateTime();
            $goods_receive_hdr->user_updated            = \Auth::user()->username;
            $goods_receive_hdr->datetime_updated        = new DateTime();
            
            $goods_receive_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $goods_receive_hdr->id;

            return response()->json(['success' => true, 'id' => $id]);
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
        $query = DB::table('view_trx_gr_hdr')
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
            $data = [
                'reff_no'           => $request->reff_no,
                'id_supplier'       => $request->id_supplier,
                'remarks'           => $request->remarks,
                'user_updated'      => \Auth::user()->username,
                'datetime_updated'  => new DateTime()
            ];
            $update = GoodsReceiveHdr::where('id', $id)->update($data);

            return response()->json(['success' => true, 'id' => $id]);
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

    public function list_goods_receive(Request $request)
    {
        $query = DB::table('view_trx_gr_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_gr_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_gr_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function data_supplier(Request $request)
    {
        $search = $request->get('search');
        $data = Supplier::select(['id', 'supplier_code', 'supplier_name'])
                          ->whereRaw(
                                "(active = 1 and (supplier_code like '%".$search."%' or supplier_name like '%".$search."%'))"
                          )
                          ->orderBy('supplier_code')
                          ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function change_status($id)
    {
        $data = [
            'active'            => '0',
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = GoodsReceiveHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }
}
