<?php

namespace App\Http\Controllers\Master\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;

use App\Models\Master\Partners\Customer;

class CustomerController extends Controller
{
	protected $rules = [
		'customer_name'			=> 'required',
		'address_title_1'		=> 'required',
		'address_title_2'		=> 'required',
		'address_email_1'		=> 'email',
		'address_email_2'		=> 'email'
	];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.partners.customer');
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
		$validator = Validator::make($request->all(), $this->rules);
		if ($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()]);						
		}
		else
		{
			/* https://jaranguda.com/membuat-nomor-surat-otomatis-di-laravel/ */
			$noUrutAkhir 					= (int)substr(Customer::max('customer_code'), 2, 4) + 1;
			$newCode						= 'C'.substr('0000'.$noUrutAkhir, -4);
			/* https://www.5balloons.info/tutorial-simple-crud-operations-in-laravel-5-5/ */
			/* Menggunakan Route Model Binding */
			$customer = Customer::create([
				'customer_code'   			=> $newCode,
				'customer_name'   			=> $request->customer_name,
				'address_title_1'   		=> $request->address_title_1,
				'address_address_1'   		=> $request->address_address_1,
				'address_city_1'   			=> $request->address_city_1,
				'address_phone_1'   		=> $request->address_phone_1,
				'address_fax_1'   			=> $request->address_fax_1,
				'address_email_1'   		=> $request->address_email_1,
				'address_person_name_1'   	=> $request->address_person_name_1,
				'address_person_phone_1'   	=> $request->address_person_phone_1,
				'address_person_email_1'   	=> $request->address_person_email_1,			
				'address_title_2'   		=> $request->address_title_2,
				'address_address_2'   		=> $request->address_address_2,
				'address_city_2'   			=> $request->address_city_2,
				'address_phone_2'   		=> $request->address_phone_2,
				'address_fax_2'   			=> $request->address_fax_2,
				'address_email_2'   		=> $request->address_email_2,
				'address_person_name_2'   	=> $request->address_person_name_2,
				'address_person_phone_2'   	=> $request->address_person_phone_2,
				'address_person_email_2'   	=> $request->address_person_email_2,			
				'user_created'     			=> \Auth::user()->username,
				'datetime_created' 			=> new DateTime(),
				'user_updated'     			=> \Auth::user()->username,
				'datetime_updated' 			=> new DateTime()
			]);
			
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
        $data = Customer::findOrFail($id);
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
		$validator = Validator::make($request->all(), $this->rules);
		if ($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()]);						
		}
		else
		{
			$customer 							= Customer::findOrFail($id);
			
			$customer->customer_name 			= $request->customer_name;
			$customer->address_title_1 			= $request->address_title_1;
			$customer->address_address_1 		= $request->address_address_1;
			$customer->address_city_1 			= $request->address_city_1;
			$customer->address_phone_1 			= $request->address_phone_1;
			$customer->address_fax_1 			= $request->address_fax_1;
			$customer->address_email_1 			= $request->address_email_1;
			$customer->address_person_name_1 	= $request->address_person_name_1;
			$customer->address_person_phone_1 	= $request->address_person_phone_1;
			$customer->address_person_email_1 	= $request->address_person_email_1;
			$customer->address_title_2 			= $request->address_title_2;
			$customer->address_address_2 		= $request->address_address_2;
			$customer->address_city_2 			= $request->address_city_2;
			$customer->address_phone_2 			= $request->address_phone_2;
			$customer->address_fax_2 			= $request->address_fax_2;
			$customer->address_email_2 			= $request->address_email_2;
			$customer->address_person_name_2 	= $request->address_person_name_2;
			$customer->address_person_phone_2 	= $request->address_person_phone_2;
			$customer->address_person_email_2 	= $request->address_person_email_2;
			$customer->user_updated     		= \Auth::user()->username;
			$customer->datetime_updated 		= new DateTime();
			
			$customer->save();
			
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
	
	public function list_customer()
    {
        return datatables()->of(Customer::where('active', '1'))
			               ->addColumn('action', '<a href="javascript:void(0)" id="edit_customer" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
						                          <a href="javascript:void(0)" id="delete_customer" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
			               ->addIndexColumn()
        				   ->make(true);
    }

    public function change_status()
    {
		$id 								= Input::get('id');
		$customer 							= Customer::findOrFail($id);
        $customer->active           		= '0';
        $customer->user_updated     		= \Auth::user()->username;
        $customer->datetime_updated 		= new DateTime();
        $customer->save();
		
        return response()->json(array('success' => true));
    }
}
