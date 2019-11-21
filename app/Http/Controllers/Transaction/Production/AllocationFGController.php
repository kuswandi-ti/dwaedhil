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

use App\Models\Transaction\Production\AllocationFGHdr;
use App\Models\Transaction\Production\AllocationFGDtl;
use App\Models\Master\Products\Product;

class AllocationFGController extends Controller
{
    protected $rules_hdr = [
        'doc_date'                  => 'required',
    ];

    protected $rules_dtl = [
        'product_code_alloc_fg'     => 'required',
        'qty_alloc_alloc_fg'        => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.production.allocation_fg_hdr');
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
            $alloc_fg_hdr                           = new AllocationFGHdr();

            $doc_no = Helper::create_doc_no('AFG', date('m'), date('Y'), 'ALLOCATION_FINISH_GOODS');
            $alloc_fg_hdr->doc_no                   = $doc_no;
            $doc_date = date('Y-m-d');
            $alloc_fg_hdr->doc_date                 = $doc_date;
            $doc_time = date('H:i:s');
            $alloc_fg_hdr->doc_time                 = $doc_time;
            $alloc_fg_hdr->remarks                  = $request->remarks;
            $alloc_fg_hdr->user_created             = \Auth::user()->username;
            $alloc_fg_hdr->datetime_created         = new DateTime();
            $alloc_fg_hdr->user_updated             = \Auth::user()->username;
            $alloc_fg_hdr->datetime_updated         = new DateTime();
            
            $alloc_fg_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $alloc_fg_hdr->id;

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
            $alloc_fg_dtl                       = new AllocationFGDtl();
            
            $alloc_fg_dtl->id_hdr               = $request->id_alloc_fg_hdr;
            $alloc_fg_dtl->id_product           = $request->product_id_alloc_fg;
            $alloc_fg_dtl->qty_alloc            = $request->qty_alloc_alloc_fg;
            $alloc_fg_dtl->user_created         = \Auth::user()->username;
            $alloc_fg_dtl->datetime_created     = new DateTime();
            $alloc_fg_dtl->user_updated         = \Auth::user()->username;
            $alloc_fg_dtl->datetime_updated     = new DateTime();
            
            $alloc_fg_dtl->save();
            
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
        $query = DB::table('view_trx_allocfg_hdr')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function edit_detail($id)
    {
        $query = DB::table('view_trx_allocfg_dtl')
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
        $update = AllocationFGHdr::where('id', $id)->update($data);

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
            DB::table('tbl_trx_allocfg_dtl')
                ->where('id', $request->id_alloc_fg_dtl)
                ->update([
                    'qty_alloc' => $request->qty_alloc_alloc_fg,
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
        DB::table('tbl_trx_allocfg_dtl')
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
        $update = AllocationFGHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function list_allocation_fg_header(Request $request)
    {
        $query = DB::table('view_trx_allocfg_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_alloc_fg_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_alloc_fg_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    /* https://www.malasngoding.com/passing-data-controller-ke-view-laravel/ */
    public function allocation_fg_header($id)
    {
        $alloc_fg_header = DB::table('view_trx_allocfg_hdr')
                               ->where('id', $id)
                               ->first();
        return view('transaction.production.allocation_fg_dtl', [
            'alloc_fg_header' => $alloc_fg_header
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_allocation_fg_detail(Request $request)
    {
        $query = DB::table('view_trx_allocfg_dtl')
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_alloc_fg_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_alloc_fg_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function browse_product(Request $request)
    {
        $query = DB::table('view_mst_product')
                     ->where([['active', '=', 1]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="select_product_alloc_fg" data-toggle="tooltip" title="Select" data-id="{{ $id }}" data-code="{{ $product_code }}" data-name="{{ $product_name }}" data-unit="{{ $unit_code }}" data-original-title="Select" class="select btn btn-danger btn-sm"><i class="ti-check"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }
}
