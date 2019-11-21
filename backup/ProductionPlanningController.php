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

use App\Models\Transaction\Production\ProductionPlanningHdr;
use App\Models\Transaction\Production\ProductionPlanningDtl;
use App\Models\Master\Partners\Customer;
use App\Models\Master\Products\Product;

class ProductionPlanningController extends Controller
{
    protected $rules_hdr = [
        'id_customer'           => 'required',
        'id_product'            => 'required',
        'month'                 => 'required',
        'year'                  => 'required'
    ];

    protected $rules_dtl = [
        'qty_ppl'               => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.production.production_planning_hdr');
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
            $production_planning_hdr                    = new ProductionPlanningHdr();

            $doc_no = Helper::create_doc_no('PPL', date('m'), date('Y'), 'PRODUCTION_PLANNING');
            $production_planning_hdr->doc_no            = $doc_no;
            $doc_date = date('Y-m-d');
            $production_planning_hdr->doc_date          = $doc_date;
            $doc_time = date('H:i:s');
            $production_planning_hdr->doc_time          = $doc_time;
            $production_planning_hdr->id_customer       = $request->id_customer;
            $production_planning_hdr->id_product        = $request->id_product;
            $production_planning_hdr->month             = $request->month;
            $production_planning_hdr->year              = $request->year;
            $production_planning_hdr->remarks           = $request->remarks;
            $production_planning_hdr->user_created      = \Auth::user()->username;
            $production_planning_hdr->datetime_created  = new DateTime();
            $production_planning_hdr->user_updated      = \Auth::user()->username;
            $production_planning_hdr->datetime_updated  = new DateTime();
            
            $production_planning_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $production_planning_hdr->id;

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
            $ppl_dtl                        = new ProductionPlanningDtl();
            
            $ppl_dtl->id_hdr                = $request->id_ppl_hdr;
            $ppl_dtl->day_prodplan          = $request->day_ppl;
            $date_ppl = $request->year_ppl.'-'.
                        $request->month_ppl.'-'.
                        $request->day_ppl; //2019-04-29
            $ppl_dtl->date_prodplan         = $date_ppl;
            $ppl_dtl->qty_prodplan          = $request->qty_ppl;
            $ppl_dtl->user_created          = \Auth::user()->username;
            $ppl_dtl->datetime_created      = new DateTime();
            $ppl_dtl->user_updated          = \Auth::user()->username;
            $ppl_dtl->datetime_updated      = new DateTime();
            
            $ppl_dtl->save();
            
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
        $query = DB::table('view_trx_prodplan_hdr')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function edit_detail($id)
    {
        $query = DB::table('view_trx_prodplan_dtl')
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
        $this->rules = $this->rules_hdr;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }
        else
        {
            $data = [
                'id_customer'       => $request->id_customer,
                'id_product'        => $request->id_product,
                'remarks'           => $request->remarks,
                'user_updated'      => \Auth::user()->username,
                'datetime_updated'  => new DateTime()
            ];
            $update = ProductionPlanningHdr::where('id', $id)->update($data);

            return response()->json(['success' => true, 'id' => $id]);
        }
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
            $date_ppl = $request->year_ppl.'-'.
                        $request->month_ppl.'-'.
                        $request->day_ppl; //2019-04-29
            DB::table('tbl_trx_prodplan_dtl')
                ->where('id', $request->id_ppl_dtl)
                ->update([
                    'day_prodplan' => $request->day_ppl,
                    'date_prodplan' => $date_ppl,
                    'qty_prodplan' => $request->qty_ppl,
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
        DB::table('tbl_trx_prodplan_dtl')
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
        $update = ProductionPlanningHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function list_production_planning_header(Request $request)
    {
        $query = DB::table('view_trx_prodplan_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_ppl_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_ppl_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function data_customer(Request $request)
    {
        $search = $request->get('search');
        $data = Customer::select(['id', 'customer_code', 'customer_name'])
                          ->whereRaw(
                                "(active = 1 and (customer_code like '%".$search."%' or customer_name like '%".$search."%'))"
                          )
                          ->orderBy('customer_code')
                          ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function data_product(Request $request)
    {
        $search = $request->get('search');
        $id_customer = $request->get('id_customer');
        $data = Product::select(['id', 'product_code', 'product_name'])
                         ->whereRaw(
                               "(active = 1 and (product_code like '%".$search."%' or product_name like '%".$search."%') and id_customer='".$id_customer."')"
                         )
                         ->orderBy('product_code')
                         ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    /* https://www.malasngoding.com/passing-data-controller-ke-view-laravel/ */
    public function production_planning_header($id)
    {
        $ppl_header = DB::table('view_trx_prodplan_hdr')
                          ->where('id', $id)
                          ->first();
        $count_day = cal_days_in_month(CAL_GREGORIAN, $ppl_header->month, $ppl_header->year);
        return view('transaction.production.production_planning_dtl', [
            'ppl_header' => $ppl_header,
            'count_day' => $count_day
        ]);
    }

    /* https://itsolutionstuff.com/post/how-to-select-concat-columns-with-laravel-query-builderexample.html */
    public function list_production_planning_detail(Request $request)
    {
        $query = DB::table('view_trx_prodplan_dtl')
                     ->where([['id_hdr', '=', $request->id_hdr]])
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', '<a href="javascript:void(0)" id="edit_ppl_dtl" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                                  <a href="javascript:void(0)" id="delete_ppl_dtl" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }
}
