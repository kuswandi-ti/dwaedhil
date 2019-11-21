<?php

namespace App\Http\Controllers\Sys;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Datatables;
use Redirect, Response;
use DateTime;

use App\Models\Sys\User;

class UserAccountController extends Controller
{
	protected $rules_create = [
		'name' 		=> 'required',
		'email'		=> 'required | email',
		'username' 	=> 'required | unique:tbl_sys_users'
	];
	
	protected $rules_update = [
		'name' 		=> 'required',
		'email'		=> 'required | email',
		'username' 	=> 'required'
	];
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sys.user_account');
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
			$user                   	= new User();
			
			$user->name             	= $request->name;
			$user->email            	= $request->email;
			$user->username         	= $request->username;
			$user->user_created     	= \Auth::user()->username;
			$user->datetime_created 	= new DateTime();
			$user->user_updated     	= \Auth::user()->username;
			$user->datetime_updated 	= new DateTime();
			
			$user->save();
			
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
		$data = User::findOrFail($id);
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
			$user 					= User::findOrFail($id);
			
			$user->name 			= $request->name;
			$user->email 			= $request->email;
			$user->username 		= $request->username;
			$user->user_updated     = \Auth::user()->username;
			$user->datetime_updated = new DateTime();
			
			$user->save();
			
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

    public function list_users()
    {
        return datatables()->of(User::where('active', '1'))
			               ->addColumn('action', '<a href="javascript:void(0)" id="edit_user" data-toggle="tooltip" title="Edit" data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
						                          <a href="javascript:void(0)" id="delete_user" data-toggle="tooltip" title="Delete" data-id="{{ $id }}" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>')
			               ->addIndexColumn()
        				   ->make(true);
    }

    public function change_status()
    {
		$id 							= Input::get('id');
		$user 							= User::findOrFail($id);
        $user->active           		= '0';
        $user->user_updated     		= \Auth::user()->username;
        $user->datetime_updated 		= new DateTime();
        $user->save();
		
        return response()->json(array('success' => true));
    }
}
