<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Contacts;
use Validator;
use Response;


class ContactsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        return view('dashboard.phonebook');
    }

    public function show($id)
    {
        return Contacts::findOrFail($id);
    }

    public function index()
    {
        return Contacts::where("user_id", Auth::user()->id)->get()->toJson();
    }

    public function store(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        } 
        
        return Contacts::create($data->all());
    }

    public function update(Request $request, $id)
    {
        Contacts::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }

    public function destroy($id)
    {
        return Contacts::destroy($id);
    }
    
}
