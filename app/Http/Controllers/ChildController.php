<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

class ChildController extends Controller
{
    public function create()
    {
    	$child = Child::paginate(5);
    	return view('home', compact('child'));
    }

    public function register(Request $request)
    {

    	$child = new Child;
    	$child->name = $request->name;
    	$child->birthday = $request->birthday;
    	$child->parent = $request->parent;
    	$child->phone_number = $request->phone_number;
    	$child->barangay = $request->barangay;
    	$child->save();
    	return redirect()->back()->with('message', 'Saved!');
    }

    public function search(Request $request)
    {
    	$child = Child::where('parent', 'LIKE', '%'.$request->parent.'%')->paginate(5);
    	return view('home', compact('child'));
    }

    public function details(Child $children)
    {

    	return view('details', compact('children'));
    }
}