<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

class ChildController extends Controller
{
    public function create()
    {
    	$child = Child::all();
    	return view('home', compact('child'));
    }

    public function register(Request $request)
    {
    	Child::create($request->all());
    	return back();
    }
}