<?php

namespace App\Http\Controllers\Master\Products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

use Datatables;
use Redirect, Response;
use DateTime;
use DB;
use PDF;

use App\Models\Master\Products\BillOfMaterialHdr;
use App\Models\Master\Products\Product;

class BillOfMaterialHdrController extends Controller
{
    /* https://stackoverflow.com/questions/42732857/how-to-add-validation-on-same-database-field-for-different-names-in-laravel */
    protected $rules_create = [
        'id_product_bom_hdr'    => 'required | unique:tbl_mst_bom_hdr,id_product',
        'prepared_by'           => 'required',
        'date_of_issue'         => 'required',
        'revision'              => 'required'
    ];
    
    protected $rules_update = [
        'id_product_bom_hdr'    => 'required',
        'prepared_by'           => 'required',
        'date_of_issue'         => 'required',
        'revision'              => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.products.bill_of_material_hdr');
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
            $bill_of_material_hdr                       = new BillOfMaterialHdr();
            
            //$uuid4 = Uuid::uuid4();
            //$bill_of_material_hdr->uuid                 = $uuid4->toString();
            $bill_of_material_hdr->status_bom           = $request->status_bom;
            $bill_of_material_hdr->id_product           = $request->id_product_bom_hdr;
            $bill_of_material_hdr->prepared_by          = $request->prepared_by;
            //$date_of_issue = date('Y-m-d', strtotime(str_replace('-', '/', $request->date_of_issue)));
            //$bill_of_material_hdr->date_of_issue        = $date_of_issue;
            $bill_of_material_hdr->date_of_issue        = $request->date_of_issue;
            $bill_of_material_hdr->revision             = $request->revision;
            $bill_of_material_hdr->user_created         = \Auth::user()->username;
            $bill_of_material_hdr->datetime_created     = new DateTime();
            $bill_of_material_hdr->user_updated         = \Auth::user()->username;
            $bill_of_material_hdr->datetime_updated     = new DateTime();
            
            $bill_of_material_hdr->save();
            
            /* https://laravelcode.com/post/laravel-55-get-last-inserted-id-with-example */
            $id = $bill_of_material_hdr->id;

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
        $query = DB::table('view_mst_bom_hdr')
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
            //$date_of_issue = date('Y-m-d', strtotime(str_replace('-', '/', $request->date_of_issue)));
            $data = [
                'status_bom'        => $request->status_bom,
                'id_product'        => $request->id_product_bom_hdr,
                'prepared_by'       => $request->prepared_by,
                //'date_of_issue'     => $date_of_issue,
                'date_of_issue'     => $request->date_of_issue,
                'revision'          => $request->revision,
                'user_updated'      => \Auth::user()->username,
                'datetime_updated'  => new DateTime()
            ];
            $update = BillOfMaterialHdr::where('id', $id)->update($data);

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

    public function list_bill_of_material(Request $request)
    {
        $query = DB::table('view_mst_bom_hdr')
                     ->where('active', '1')
                     ->get();
        return datatables()->of($query)
                           ->addColumn('action', 
                                '<a href="javascript:void(0)" id="edit_bill_of_material_hdr" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" id="delete_bill_of_material_hdr" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                <a href="javascript:void(0)" id="print_bill_of_material_hdr" data-toggle="tooltip" title="Print" data-id="{{ $id }}" data-original-title="Print" class="print btn btn-success btn-sm"><i class="fas fa-print"></i></a>')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function data_product(Request $request)
    {
        $search = $request->get('search');
        $data = Product::select(['id', 'product_code', 'product_name'])
                         ->whereRaw(
                            "(active = 1 and (product_code like '%".$search."%' or product_name like '%".$search."%'))"
                         )
                         ->orderBy('product_code')
                         ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function get_data_product($id)
    {
        $query = DB::table('view_mst_product')
                     ->where('id', $id)
                     ->first();
        return response()->json($query);
    }

    public function change_status($id)
    {
        $data = [
            'active'            => '0',
            'user_updated'      => \Auth::user()->username,
            'datetime_updated'  => new DateTime()
        ];
        $update = BillOfMaterialHdr::where('id', $id)->update($data);

        return response()->json(['success' => true]);
    }

    public function print_bill_of_material($id)
    {
        $bom_hdr = DB::table('view_mst_bom_hdr')
                       ->where('id', $id)
                       ->get();
        $bom_dtl = DB::table('view_mst_bom_dtl')
                       ->where('id_hdr', $id)
                       ->get();

        //return view('reports.bill_of_material_print', ['bom_hdr' => $bom_hdr, 'bom_dtl' => $bom_dtl]);

        // $html2pdf = new Html2Pdf('P', 'A4', 'en');
        // $html2pdf->writeHTML(view('reports.bill_of_material_print', ['bom_hdr' => $bom_hdr, 'bom_dtl' => $bom_dtl]));
        // $html2pdf->output('bill_of_material.pdf');

        $pdf = PDF::loadview('reports.bill_of_material_print', ['bom_hdr' => $bom_hdr, 'bom_dtl' => $bom_dtl]);
        return $pdf->stream('Bill of Material');
    }
}
